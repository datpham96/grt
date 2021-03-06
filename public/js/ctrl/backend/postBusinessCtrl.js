ngApp.controller('postBusinessCtrl', function (
    $timeout,$postInfo,$window,$myAvatar,$apply,
    $scope,$myLoader, $myNotify, $postBusinessService,
    $myBootbox, $routeParams, $businessService){   
    $scope.formData;
    $scope.domAvatar;
    $scope.title = "Thêm sản phẩm";
    $scope.data = {
        list: [],
        info: {},
        errors: {}
    }
    $scope.getData = {
        name: "",
        description: "",
        content: "",
        avatar:""
    };
    $scope.filter = {
        page: 1,
        perPage: 10,
        freeText:''
    }
    var id = $routeParams.id || 0; 
    var processData = {
        getList: function(){
            var params = $postBusinessService.data.list($scope.filter.freeText, $scope.filter.page, $scope.filter.perPage);
            $postBusinessService.action.list(params).then(function(resp){
                $scope.data.list = resp.data.data;
                $scope.paging = resp.data;
            }).catch(function(err){
                console.log(err);
            })
            
        },
        getInfo: function(id){
            $postBusinessService.action.info(id).then(function(resp){
                $apply(function(){
                    $scope.getData = resp.data;
                    $("#holder").attr('src',$myAvatar.image($scope.getData.avatar));
                }, 400);                
            }).catch(function(err){
                console.log(err);
            })
        },
        getCateBusiness: function(){
            $businessService.action.listAllCateByParent().then(function(resp){
                $scope.listCateBusiness = resp.data;
            }).catch(function(err){
                console.log(err);
            })
        }
    }
    $scope.actions = {
        isSTT: function(key){
            return (($scope.filter.perPage * ($scope.filter.page - 1))+key);
        },
        changePage: function(page){
            $scope.filter.page = page;
            processData.getList();
        },
        filter: function(){
            processData.getList();
        },
        update: function(){
            var name = $scope.getData.name;
            var description = $scope.getData.description;
            var content = $scope.getData.content;
            var businessId = $scope.getData.business_id;
            var avatar = $scope.getData.avatar || "/images/image-default.png";
            var params = $postBusinessService.data.update(name,description,content,avatar, businessId);
            if(id > 0){
                if($($scope.formData).parsley().validate()){
                    $myLoader.show();
                    $postBusinessService.action.update(params,id).then(function(resp){
                        if(resp.data.status){
                            $myNotify.success("Sửa sản phẩm thành công");
                            $timeout(function(){
                                $window.location.href= $postInfo.redirectProduct;
                            }, 1000);
                            $myLoader.hide();
                        }                        
                    }).catch(function(err){
                        $myLoader.hide();
                        console.log(err);
                        $myNotify.err("Sửa sản phẩm thất bại");
                        $scope.data.errors = err.data;
                    });
                }
            }else{
                if($($scope.formData).parsley().validate()){
                    $myLoader.show();
                    $postBusinessService.action.insert(params).then(function(resp){
                        if(resp.data.status){
                            $myNotify.success("Thêm sản phẩm thành công");
                            $timeout(function(){
                                $window.location.href= $postInfo.redirectProduct;
                            }, 1000);
                            $myLoader.hide();
                        }   
                        
                    }).catch(function(err){
                        $myLoader.hide();
                        console.log(err);
                        $myNotify.err("Thêm sản phẩm thất bại");
                        $scope.data.errors = err.data;
                    });
                }
            }
        },
        delete: function(id){
            $myBootbox.confirm('Bạn có muốn xóa không?', function (result) {
                if (result) {
                    $postBusinessService.action.delete(id).then(function(resp){
                        if(resp.status){
                            $myNotify.success('Xóa sản phẩm thành công!');
                        }else{
                            $myNotify.err('Xóa sản phẩm thất bại!');
                        }
                        $myLoader.hide();
                        $($scope.domData).modal('hide');
                        processData.getList();
                    }).catch(function(err){
                        $($scope.domData).modal('hide');
                        $myNotify.err('Xóa sản phẩm thất bại');
                        $myLoader.hide();
                    });
                }
            })
        }
        
    }

    $scope.$watch('filter.freeText', function(newVal, oldVal){
        processData.getList();
    });
    if(id > 0){
        processData.getInfo(id);
        $scope.title = "Sửa sản phầm";
    }else{
        $("#holder").attr('src',$myAvatar.imageDefault());
    }
    // processData.getList();
    processData.getCateBusiness();
});

ngApp.config(['$routeProvider','$locationProvider',
    function($routeProvider, $locationProvider) {
        var mainPostBusiness = SiteUrl + "/admin/mainPostBusiness";
        var postDetailBusiness = SiteUrl + "/admin/postDetailBusiness";

        $routeProvider.
        when('/', {
            templateUrl: mainPostBusiness,
            controller: 'postBusinessCtrl'
        }).
        when('/update/:id', {
            templateUrl: postDetailBusiness,
            controller: 'postBusinessCtrl'
        }).
        when('/insert', {
            templateUrl: postDetailBusiness,
            controller: 'postBusinessCtrl'
        }).
        otherwise({
            redirectTo: '/'
        });
        $locationProvider.hashPrefix('');

    }]);