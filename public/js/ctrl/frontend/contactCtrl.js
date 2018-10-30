ngApp.controller('contactCtrl', function ($myNotify,$scope, $myLoader, $myBootbox, $myNotifyClient, $contactService)
{
    $scope.formData;
    $scope.data = {
        name: "",
        email: "",
        title: "",
        content: "",
        captcha: ""
    };
    $scope.actions = {
        sendMail: function (){   
            $myLoader.show();
            $scope.errors = {};
            var name = $scope.data.name;
            var email = $scope.data.email;
            var title = $scope.data.title;
            var content = $scope.data.content;
            var captcha = $scope.data.captcha;
            var params = $contactService.data.update(name,email,title,content,captcha);
                $contactService.action.sendMail(params).then(function(resp){
                    if (resp.data.status == true) {
                            $myNotifyClient.success('Gửi email thành công');
                            $scope.actions.refreshCaptcha();
                            $scope.data = {};
                            $myLoader.hide();
                        }else{
                            $myLoader.hide();
                            $scope.actions.refreshCaptcha();
                            $myNotifyClient.err('Gửi email thất bại');
                        }
                }).catch(function(err){
                    console.log(err);
                    $scope.errors = err;
                    $myLoader.hide();
                });
        },
        refreshCaptcha: function(){
            console.log(1);
            $contactService.action.refreshCaptcha().then(function(resp){
                $('#refereshrecapcha').html(resp.data);
            }, function(err){
                console.log(err);
            })
        }
    };
});
