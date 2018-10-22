ngApp.directive('chossePasswordModal', function ($userService, $apply, $myLoader) {
    var templateUrl = SiteUrl + "/modal/chossePasswordModal";
    var restrict = 'E';
    var scope = {
        retFunc: "&",
        modalDom: '=',
        data:'=data',
        formUpdatePassword:'=formUpdatePassword'
    };

    var link = function (scope) {       

        scope.actions = {
            changePassword: function () {
                if ($(scope.formUpdatePassword).parsley().validate()) {//validate
                    $myLoader.show();
                    $userService.action.changePassword(scope.data.currentPassword, scope.data.newPassword).then(function (resp) {
                        if (resp.data.status) {
                            scope.retFunc({data: true});
                        } else {
                            scope.retFunc({data: false});
                        }
                    }).catch(function (err) {
                        $myLoader.hide();
                        console.log(err);
                        scope.retFunc({data: false});
                    });
                }
            }
        };
    };
    
    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link
    };
});