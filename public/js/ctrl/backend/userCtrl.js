ngApp.controller('userCtrl', function ($managerVmrService,$filter,$myNotify, $scope, $userService, $apply, $myBootbox, $myLoader, $myFile, $userRole, $typeConfig)
{
    $scope.userModalReloadDep = false;
    $scope.chosseUserModal;
    $scope.chosseUserForm;
    $scope.showFilter;
    var $translate = $filter('translate');
    $scope.singleUser = {};
    $scope.filter={
        minPort:'',
        maxPort:'',
        minVMR:'',
        maxVMR:'',
        minMaterial:'',
        maxMaterial:'',
        minSIP:'',
        maxSIP:'',
        endDate: ''
    };
    $scope.data = {
        totalUser: 0,
        totalPort: 0,
        totalVmr: 0,
        totalMaterialSize: 0,
        totalSip: 0,
        listUser: {},
        listDep: [],
        paging: {},
        userVideomost: [],
        getRoleName: function (roles) {
            var roleName = '';
            var tmpRole = '';
            _.each(roles, function(role, key){
                tmpRole = $userRole.getRoleName(role.role);
                if(key != 0){
                    tmpRole = ', ' + tmpRole
                }
                roleName += tmpRole;
            });
            
            return roleName;
        },
        getPackageName: function(status){
            var packName = '';
            packName = $userRole.getPackageName(status);
           
            return packName;
        },
        getTotalVmr: function(){
            $managerVmrService.action.listTotalVmr().then(function(resp){
                $scope.data.totalUser = resp.data.totalAccount;
                $scope.data.totalPort = resp.data.totalPort;
                $scope.data.totalVmr = resp.data.totalVmr;
                $scope.data.totalMaterialSize = resp.data.totalMaterialSize;
                $scope.data.totalSip = resp.data.totalSip;
            }, function(err){
                console.log(err);
            })
        }
    };

    $scope.actions = {
        showFilter:function(){
         $scope.showFilter = ! $scope.showFilter;
     },
     formatDate: function (date) {
        var reVal = "";
        var now = moment();
        if (now.isBefore(date)) {

            reVal = moment(date).format('DD-MM-Y HH:mm');
        }


        return reVal;
    },
    filter: function () {
        $scope.actions.listUser();
    },
    resetFilter: function () {
        $scope.data.keyword = '';
        $scope.filter={
            minPort:'',
            maxPort:'',
            minVMR:'',
            maxVMR:'',
            minMaterial:'',
            maxMaterial:'',
            minSIP:'',
            maxSIP:'',     
        };
        $scope.actions.listUser();
    },
    page: function (page) {
        $scope.data.paging.current_page = page;
        $scope.actions.listUser();
    },
    listUser: function () {
        var searchDate = '';
        if($scope.filter.endDate){
            searchDate = moment($scope.filter.endDate).format('YYYY-MM-DD H:m:s');
        }else{
            searchDate = '';
        }
        var params = $userService.data.list(
            $scope.data.keyword, 
            '',
            $scope.data.paging.current_page, 
            10,
            $scope.filter.minPort,
            $scope.filter.maxPort,
            $scope.filter.minVMR,
            $scope.filter.maxVMR,
            $scope.filter.minMaterial,
            $scope.filter.maxMaterial,
            $scope.filter.minSIP,
            $scope.filter.maxSIP,
            searchDate
            );  
        $userService.action.list(params).then(function (resp) {
            $scope.data.listUser = resp.data.data;
            $scope.TotalAccout = resp.data.total;
            $scope.data.paging = resp.data;            
        }, function (err) {
            console.log(err);
        });
    },
    
        // deleteUser: function (userId) {
        //     var func = function (result) {
        //         if (result) {
        //             $myLoader.show();
        //             $userService.action.delete(userId).then(function (resp) {
        //                 $myLoader.hide();
        //                 $myNotify.success('Thao tác thành công');
        //                 $scope.actions.listUser();
        //                 $scope.userModalReloadDep = true;
        //             }, function (error) {
        //                 $myLoader.hide();
        //                 $myNotify.err('Xảy ra sự cố, bạn hãy thử lại sau');
        //                 console.log(error);
        //             });
        //         }
        //     };
        //     $myBootbox.confirm('Bạn có chắc chắn muốn xoá tài khoản này không?', func);
        // },

        deleteUserVideomost: function (userId) {
            var func = function (result) {
                if (result) {
                    $myLoader.show();
                    $userService.action.deleteVideomost(userId).then(function (resp) {
                        $myLoader.hide();
                        $myNotify.success($translate('NOTIFY.DELETE_SUCCESS'));
                        $scope.actions.listUser();
                        $scope.userModalReloadDep = true;
                    }, function (error) {
                        $myLoader.hide();
                        $myNotify.err($translate('NOTIFY.SYSTEM_ERROR'));
                        console.log(error);
                    });
                }
            };
            $myBootbox.confirm($translate('USER.ConfirmDelete'), func);
        },

        loadImage: function (params) {
            return $myFile.avatar(params);
        },
        successUpdate: function (data, id) {
            $myLoader.hide();
            if (data == true) {//hien thi cap nhat thanh cong
                if (!id) {
                    $myNotify.success($translate('NOTIFY.UPDATE_SUCCESS'));
                } else {
                    $myNotify.success($translate('NOTIFY.INSERT_SUCCESS'));
                }
                
                $scope.actions.listUser();
                $($scope.chosseUserModal).modal('hide');
            } else {//hien thi cap nhat that bai
                $myLoader.hide();
                if (data.email == 'emailExists') {
                    $myNotify.err($translate('NOTIFY.EmailExists'));
                }else{
                    $myNotify.err($translate('NOTIFY.UPDATE_ERROR'));
                }
                $scope.singleUser.errors = data;//lay danh sach error
            }
        },
        showInsertModal: function () {
            $($scope.chosseUserForm).parsley().reset();
            $apply(function () {
                $scope.singleUser = {};
                $scope.radioChecked = true;
                $scope.singleUser.roles = [$userRole.CONST_ROLE_USER];
                $scope.actions.showModal();
            });

        },
        showUpdateModal: function (item) {
            item = angular.copy(item);
            $($scope.chosseUserForm).parsley().reset();
            var listRole = _.pluck(item.roles, 'role');
            $apply(function () {
                $scope.singleUser = {};
                $scope.singleUser = item;
                $scope.singleUser.roles = _.pluck(item.roles, 'role');
                $scope.actions.showModal();
            });
        },
        showModal: function () {
            $scope.checkLdap = '';
            $($scope.chosseUserModal).modal('show');
        },
        resetPassword: function (clientId) {
            var func = function (result) {
                if (result) {
                    $userService.action.resetPass(clientId).then(function (resp) {
                        if (resp)
                            {
                                $myNotify.success($translate('NOTIFY.UPDATE_SUCCESS'));
                                $scope.actions.listUser();
                            }
                        }, function (error) {
                            $myNotify.err($translate('NOTIFY.SYSTEM_ERROR'));
                            console.log(error);
                        });
                }
            }
            $myBootbox.confirm($translate('USER.ConfirmChangePassword'), func);
        },
        isCurUser: function (id) {
            return $userRole.isCurUser(id);
        },
        checkIsSuperAdmin: function (userInfo) {
            return (parseInt(userInfo.is_admin) == 1) ? true : false;
        }
    };

    $scope.$watch('data.keyword', function (newVal, oldVal) {
        $scope.actions.listUser();
    });
    
    $scope.actions.listUser();
    $scope.data.getTotalVmr();
});