ngApp.controller('productCtrl', function (
    $timeout,$productInfo,$window,$myAvatar,$apply,
    $scope,$myLoader, $myNotify, $productService, 
    $categoryService, $myBootbox, $routeParams){   
    $scope.formData;
    $scope.domAvatar;
    $scope.title = "Thêm sản phẩm";
    $scope.data = {
        list: [],
        info: {},
        listCategory: {},
        errors: {}
    }
    $scope.getData = {
        name: "",
        description: "",
        content: "",
        category_id:"",
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
            var params = $productService.data.list($scope.filter.freeText, $scope.filter.page, $scope.filter.perPage);
            $productService.action.list(params).then(function(resp){
                $scope.data.list = resp.data.data;
                $scope.paging = resp.data;
            }).catch(function(err){
                console.log(err);
            })
            
        },
        getInfo: function(id){
            $productService.action.info(id).then(function(resp){
                $apply(function(){
                    $scope.getData = resp.data;
                    $("#holder").attr('src',$myAvatar.image($scope.getData.avatar));
                }, 400);                
            }).catch(function(err){
                console.log(err);
            })
        },
        getCategory: function(){
            var params = $categoryService.data.list($scope.filter.freeText);       
            $categoryService.action.list(params).then(function(resp){
                $scope.data.listCategory = resp.data;
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
            var avatar = $scope.getData.avatar || "/images/image-default.png";
            var categoryId = $scope.getData.category_id;
            var params = $productService.data.update(name,description,content,categoryId,avatar);
            if(id > 0){
                if($($scope.formData).parsley().validate()){
                    $myLoader.show();
                    $productService.action.update(params,id).then(function(resp){
                        if(resp.data.status){
                            $myNotify.success("Sửa sản phẩm thành công");
                            $timeout(function(){
                                $window.location.href= $productInfo.redirectProduct;
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
                    $productService.action.insert(params).then(function(resp){
                        if(resp.data.status){
                            $myNotify.success("Thêm sản phẩm thành công");
                            $timeout(function(){
                                $window.location.href= $productInfo.redirectProduct;
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
                    $productService.action.delete(id).then(function(resp){
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
                        $myNotify.err('Xóa sản phẩm thất bại!');
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
        $scope.title = "Sửa sản phẩm";
    }else{
        $("#holder").attr('src',$myAvatar.imageDefault());
    }
    processData.getList();
    processData.getCategory();
});

ngApp.config(['$routeProvider','$locationProvider',
    function($routeProvider, $locationProvider) {
        var mainProducts = SiteUrl + "/admin/mainProducts";
        var productDetail = SiteUrl + "/admin/productDetail";

        $routeProvider.
        when('/', {
            templateUrl: mainProducts,
            controller: 'productCtrl'
        }).
        when('/update/:id', {
            templateUrl: productDetail,
            controller: 'productCtrl'
        }).
        when('/insert', {
            templateUrl: productDetail,
            controller: 'productCtrl'
        }).
        otherwise({
            redirectTo: '/'
        });
        $locationProvider.hashPrefix('');

    }]);