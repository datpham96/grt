ngApp.controller('postCtrl', function (
    $timeout,$postInfo,$window,$myAvatar,$apply,
    $scope,$myLoader, $myNotify, $postService,
    $myBootbox, $routeParams){   
    $scope.formData;
    $scope.domAvatar;
    $scope.title = "Thêm bài viết";
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
        perPage: 2,
        freeText:''
    }
    var id = $routeParams.id || 0; 
    var processData = {
        getList: function(){
            var params = $postService.data.list($scope.filter.freeText, $scope.filter.page, $scope.filter.perPage);
            $postService.action.list(params).then(function(resp){
                $scope.data.list = resp.data.data;
                $scope.paging = resp.data;
            }).catch(function(err){
                console.log(err);
            })
            
        },
        getInfo: function(id){
            $postService.action.info(id).then(function(resp){
                $apply(function(){
                    $scope.getData = resp.data;
                    $("#holder").attr('src',$myAvatar.image($scope.getData.avatar));
                }, 400);                
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
            var params = $postService.data.update(name,description,content,avatar);
            if(id > 0){
                if($($scope.formData).parsley().validate()){
                    $myLoader.show();
                    $postService.action.update(params,id).then(function(resp){
                        if(resp.data.status){
                            $myNotify.success("Sửa bài viết thành công");
                            $timeout(function(){
                                $window.location.href= $postInfo.redirectProduct;
                            }, 1000);
                            $myLoader.hide();
                        }                        
                    }).catch(function(err){
                        $myLoader.hide();
                        console.log(err);
                        $myNotify.err("Sửa bài viết thất bại");
                        $scope.data.errors = err.data;
                    });
                }
            }else{
                if($($scope.formData).parsley().validate()){
                    $myLoader.show();
                    $postService.action.insert(params).then(function(resp){
                        if(resp.data.status){
                            $myNotify.success("Thêm bài viết thành công");
                            $timeout(function(){
                                $window.location.href= $postInfo.redirectProduct;
                            }, 1000);
                            $myLoader.hide();
                        }   
                        
                    }).catch(function(err){
                        $myLoader.hide();
                        console.log(err);
                        $myNotify.err("Thêm bài viết thất bại");
                        $scope.data.errors = err.data;
                    });
                }
            }
        },
        delete: function(id){
            $myBootbox.confirm('Bạn có muốn xóa không?', function (result) {
                if (result) {
                    $postService.action.delete(id).then(function(resp){
                        if(resp.status){
                            $myNotify.success('Xóa bài viết thành công!');
                        }else{
                            $myNotify.err('Xóa bài viết thất bại!');
                        }
                        $myLoader.hide();
                        $($scope.domData).modal('hide');
                        processData.getList();
                    }).catch(function(err){
                        $($scope.domData).modal('hide');
                        $myNotify.err('Xóa bài viết thành công!');
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
        $scope.title = "Sửa bài viết";
    }else{
        $("#holder").attr('src',$myAvatar.imageDefault());
    }
    processData.getList();
});

ngApp.config(['$routeProvider','$locationProvider',
    function($routeProvider, $locationProvider) {
        var mainPosts = SiteUrl + "/admin/mainPosts";
        var postDetail = SiteUrl + "/admin/postDetail";

        $routeProvider.
        when('/', {
            templateUrl: mainPosts,
            controller: 'postCtrl'
        }).
        when('/update/:id', {
            templateUrl: postDetail,
            controller: 'postCtrl'
        }).
        when('/insert', {
            templateUrl: postDetail,
            controller: 'postCtrl'
        }).
        otherwise({
            redirectTo: '/'
        });
        $locationProvider.hashPrefix('');

    }]);