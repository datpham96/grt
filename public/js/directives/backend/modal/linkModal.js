ngApp.directive('linkModal', function ($apply, $myLoader, $linkService, $myAvatar) {
    var templateUrl = SiteUrl + "/modal/linkModal";
    var restrict = 'E';
    var scope = {
        retFunc: "&",
        modalDom: '=',
        modalData:'=singleData',
        formData:'=formData',
        domAvatar: '=domAvatar'
    };

    var link = function (scope) {       
        scope.getData = {
            name: "",
            link: "",
            avatar: ""
        };
        scope.data = {
            errors: {}
        };
        scope.actions = {
            update: function () {
                if ($(scope.formData).parsley().validate()) {
                    $myLoader.show();
                    var name = scope.getData.name;
                    var email = scope.getData.link;
                    var avatar = scope.getData.avatar || "/images/image-default.png";
                    var id = scope.modalData.id || 0;
                    var params = $linkService.data.update(name,email,avatar);
                    if(id > 0){                        
                        $linkService.action.update(params, id).then(function(resp){
                            scope.retFunc({ data: true , id: id});
                            $myLoader.hide();
                        }).catch(function(err){
                            scope.retFunc({ data: false });
                            scope.errors = err.status;
                            $myLoader.hide();
                        });
                    }else{
                        $linkService.action.insert(params).then(function(resp){
                            scope.retFunc({ data: true });
                            $myLoader.hide();
                        }).catch(function(err){
                            scope.retFunc({ data: false });
                            scope.errors = err.data;
                            console.log(scope.errors);
                            $myLoader.hide();
                        });
                    }
                }               
            }
        };

        scope.$watch('modalData', function (newVal, oldVal) {
            $(scope.domAvatar).attr('src',$myAvatar.imageDefault());
            var id = (newVal.id) ? parseInt(newVal.id) : 0;
            $apply(function () {
                scope.getData = {};
                if(id > 0){
                    scope.title = "Sửa đối tác";
                    scope.getData = angular.copy(newVal)
                }else{
                    scope.title = "Thêm đối tác";
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