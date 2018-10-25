ngApp.controller('loginCtrl', function ($myNotify,$scope, $productInfo, $myLoader, $myBootbox, $userService)
{
    $scope.data = {
        params: {
            email: "",
            password: "",
            _token: $("input[name*='_token']").val()
        },
        checks: {
            checkEmail: false,
            checkPassword: false
        }

    };
    $scope.actions = {
        login: function (){   
            $myLoader.show();
            if ($scope.data.params.email == "" || $scope.data.params.password == "")
            {
                $myLoader.hide();
                $scope.data.checks.checkEmail = $scope.data.params.email == "" ? true : false;
                $scope.data.checks.checkPassword = $scope.data.params.password == "" ? true : false;
            } else{
                var params = $userService.data.dateLogin($scope.data.params.email, $scope.data.params.password); 
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
