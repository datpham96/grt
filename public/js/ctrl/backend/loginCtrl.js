ngApp.controller('loginCtrl', function ($myNotify,$scope, $productInfo, $myLoader, $myBootbox, $userService)
{
    $scope.data = {
        params: {
            account: "",
            password: "",
            _token: $("input[name*='_token']").val()
        },
        checks: {
            checkAccount: false,
            checkPassword: false
        }

    };
    $scope.actions = {
        login: function (){   
            $myLoader.show();
            if ($scope.data.params.account == "" || $scope.data.params.password == "")
            {
                $myLoader.hide();
                $scope.data.checks.checkAccount = $scope.data.params.account == "" ? true : false;
                $scope.data.checks.checkPassword = $scope.data.params.password == "" ? true : false;
            } else{
                var params = $userService.data.dateLogin($scope.data.params.account, $scope.data.params.password); 
                $userService.action.login(params).then(function (resp) {
                    if (resp.data.status == true) {
                        window.location.href = $productInfo.redirectProduct;
                    } else {
                        $scope.data.errorMsg = resp.data.status;
                    }
                    $myLoader.hide();
                }, function (err) {
                    $myLoader.hide();
                    $scope.data.errorMsg = err.data.status;
                });
            }

        }
    };
});
