ngApp.factory('$supportService', function ($http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {}
    };

    //data

    service.data.update = function(name, email, phone, avatar){
        var params = new FormData();
        params.append('name', name || "");
        params.append('email', email || "");
        params.append('phone', phone || "");
        params.append('avatar', avatar || "");
        
        return params;
    };

    //action
    service.action.list = function (data) {
        var url = SiteUrl + '/backend/rest/support?' + $httpParamSerializer(data);
        return $http.get(url);
    };

    service.action.insert = function(data){       
        var config = {
            headers : {
                'Content-Type': undefined,
                'processData': false,
                'contentType': false
            }
        };       
        var url = SiteUrl + '/backend/rest/support';
        return $http.post(url, data, config);
    };

    service.action.update = function(data, id){       
        var config = {
            headers : {
                'Content-Type': undefined,
                'processData': false,
                'contentType': false
            }
        };       
        var url = SiteUrl + '/backend/rest/support/' + id;
        return $http.post(url, data, config);
    };

    service.action.delete = function(id){       
        var url = SiteUrl + '/backend/rest/support/' + id;
        return $http.delete(url);
    };

    return service;
});