ngApp.directive('businessModal', function ($apply, $myLoader, $businessService, $myAvatar) {
    var templateUrl = SiteUrl + "/modal/businessModal";
    var restrict = 'E';
    var scope = {
        retFunc: "&",
        modalDom: '=',
        modalData:'=singleData',
        formData:'=formData',
        domAvatar: '=domAvatar',
        listParent: '=parent'
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
                    var parentId = scope.getData.parent_id;
                    var id = scope.modalData.id || 0;
                    var params = $businessService.data.update(name, parentId);
                    if(id > 0){                        
                        $businessService.action.update(params, id).then(function(resp){
                            scope.retFunc({ data: true , id: id});
                            $myLoader.hide();
                        }).catch(function(err){
                            scope.retFunc({ data: false });
                            scope.errors = err.status;
                            $myLoader.hide();
                        });
                    }else{
                        $businessService.action.insert(params).then(function(resp){
                            scope.retFunc({ data: true });
                            $myLoader.hide();
                        }).catch(function(err){
                            scope.retFunc({ data: false });
                            scope.errors = err.data;
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
                    scope.title = "Sửa chuyên mục";
                    scope.getData = angular.copy(newVal);
                    if(scope.getData.parent_id == 0){
                        scope.getData.parent_id = "";
                    }
                }else{
                    scope.title = "Thêm chuyên mục";
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