ngApp.factory('$userService', function ($http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {}
    };

    service.data.dateLogin = function (email, password) {
        var params = new FormData();
        params.append('email', email);
        params.append('password', password);

        return params;
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
    
    //action
    service.action.list = function (data) {
        var url = SiteUrl + '/rest/user?' + $httpParamSerializer(data);
        return $http.get(url);
    };

    return service;
});