ngApp.directive('supportModal', function ($apply, $myLoader, $supportService) {
    var templateUrl = SiteUrl + "/modal/supportModal";
    var restrict = 'E';
    var scope = {
        retFunc: "&",
        modalDom: '=',
        modalData:'=singleDataSupport',
        formSupport:'=formSupport'
    };

    var link = function (scope) {       
        scope.getData = {
            name: "",
            email: "",
            phone: "",
            avatar: ""
        };

        scope.actions = {
            update: function () {
                if ($(scope.formSupport).parsley().validate()) {
                    $myLoader.show();
                    var name = scope.getData.name;
                    var email = scope.getData.email;
                    var phone = scope.getData.phone;
                    var avatar = scope.getData.avatar;

                    var id = scope.modalData.id || 0;
                    var params = $supportService.data.update(name,email,phone,avatar);
                    if(id > 0){                        
                        $supportService.action.update(params, id).then(function(resp){
                            scope.retFunc({ data: true , id: id});
                            $myLoader.hide();
                        }).catch(function(err){
                            scope.retFunc({ data: false });
                            scope.errors = err.status;
                            $myLoader.hide();
                        });
                    }else{
                        $supportService.action.insert(params).then(function(resp){
                            scope.retFunc({ data: true });
                            $myLoader.hide();
                        }).catch(function(err){
                            scope.retFunc({ data: false });
                            scope.errors = err.status;
                            $myLoader.hide();
                        });
                    }
                }
                
            }
        };

        scope.$watch('modalData', function (newVal, oldVal) {
            var id = (newVal.id) ? parseInt(newVal.id) : 0;
            $apply(function () {
                scope.getData = {};
                if(id > 0){
                    scope.getData = angular.copy(newVal)
                }else{
                    scope.getData = {};
                }
            });
        });
    };

    
    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link
    };
});