ngApp.factory('$linkService', function ($http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {}
    };

    //data
    service.data.list = function(freeText, page, perPage){
       return {
            freeText: freeText || "",
            page: page || "",
            perPage: perPage || ""
       }
    };
    service.data.update = function(name, link, avatar){
        var params = new FormData();
        params.append('name', name || "");
        params.append('link', link || "");
        params.append('avatar', avatar || "");
        
        return params;
    };

    //action
    service.action.list = function (data) {
        var url = SiteUrl + '/backend/rest/link?' + $httpParamSerializer(data);
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
        var url = SiteUrl + '/backend/rest/link';
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
        var url = SiteUrl + '/backend/rest/link/' + id;
        return $http.post(url, data, config);
    };

    service.action.delete = function(id){       
        var url = SiteUrl + '/backend/rest/link/' + id;
        return $http.delete(url);
    };

    return service;
});