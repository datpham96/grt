ngApp.factory('$userService', function ($http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {}
    };

    //data

    service.data.update = function(
        name, email, phone, avatar
    ){
        var params = new FormData();
        params.append('name', name);
        params.append('email', email);
        params.append('phone', phone);
        params.append('avatar', avatar);
        return params;
    };

    service.data.dateLogin = function (email, password) {
        var params = new FormData();
        params.append('email', email);
        params.append('password', password);

        return params;
    };

    //action

    service.action.authUser = function() {
        var url = SiteUrl + '/rest/user/auth/info';
        return $http.get(url);
    };

    service.action.update = function(data){       
        var config = {
            headers : {
                'Content-Type': undefined,
                'processData': false,
                'contentType': false
            }
        };
        
        var url = SiteUrl + '/rest/userInfo';
        return $http.post(url, data, config);
    };

    service.action.changePassword = function(currentPassword, newPassword){
        var url = SiteUrl + '/rest/userInfo/password';
        var data = {
            currentPassword: currentPassword,
            newPassword: newPassword
        };
        return $http.put(url, data);
    };
   
    service.action.login = function(params) {
        var config = {
            headers: {
                'Content-Type': undefined,
                'processData': false,
                'contentType': false
            }
        };
        var url = SiteUrl + '/login';
        return $http.post(url, params, config);
    };
    
    service.action.list = function (data) {
        var url = SiteUrl + '/rest/user?' + $httpParamSerializer(data);
        return $http.get(url);
    };

    return service;
});