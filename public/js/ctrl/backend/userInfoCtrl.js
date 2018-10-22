ngApp.controller('userInfoCtrl', function ($myNotify, $scope, $apply, $myFile, $myLoader, $userService){   
    $scope.formUpdatePassword;
    $scope.chossePasswordModal;
    $scope.formUpdateUser;
    $scope.singleUser = {};
    $scope.data = {
        dataPassword: {}
    };

    $scope.actions = {

        update: function () {
            $myLoader.show();
            if ($($scope.formUpdateUser).parsley().validate()) {//validate
                $myLoader.show();
                if ($('input[name*=avatar]')[0].files[0] == undefined)
                {
                    $scope.data.checkValidate = false;
                }else {
                    $scope.data.avatar = $('input[name*=avatar]')[0].files[0];
                }
                var params = $userService.data.update(
                    $scope.data.name, $scope.data.email, $scope.data.phone, $scope.data.avatar
                    );

                $userService.action.update(params).then(function (resp) {
                    $myLoader.hide();
                    $scope.actions.userInfo();
                    $myNotify.success("Cập nhật thông tin thành công");
                }).catch(function (err) {
                    $myLoader.hide();
                    $myNotify.err('Cập nhật thông tin thất bại');
                    console.log(err);
                });
            }
        },
        
        successUpdate: function (data) {
            $($scope.chossePasswordModal).modal('hide');
            $myLoader.hide();
            if (data) {//hien thi cap nhat thanh cong
                $myNotify.success("Cập nhật thông tin thành công");
                $scope.actions.userInfo();//lay lai danh sach department
            }
            else {//hien thi cap nhat that bai
                $myNotify.err('Cập nhật thông tin thất bại');
            }

        },
        
        showModal: function () {
            $($scope.formUpdatePassword).parsley().reset();
            $scope.data.dataPassword = {};
            $($scope.chossePasswordModal).modal('show');
        },

        loadImage: function (params) {           
            if(params){
                return $myFile.avatar(params);
            }else{
                return SiteUrl + '/images/new-user-image-default.jpg';
            }

        },

        userInfo: function() {
            $userService.action.authUser().then(function (resp) {
                $apply(function(){
                    $scope.data = resp.data;   
                });         
            }, function(err) {
                console.log(err);
            });
        }

    };

    $scope.actions.userInfo();

});