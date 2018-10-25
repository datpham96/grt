ngApp.factory('$categoryService', function ($http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {}
    };

    //data
    service.data.update = function(name, parent_id, avatar){
        var params = new FormData();
        params.append('name', name || "");
        params.append('parent_id', parentId || "");
        params.append('avatar', avatar || "");
        
        return params;
    };

    //action
    service.action.list = function (data) {
        var url = SiteUrl + '/backend/rest/category?' + $httpParamSerializer(data);
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
        var url = SiteUrl + '/backend/rest/category';
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
        var url = SiteUrl + '/backend/rest/category/' + id;
        return $http.post(url, data, config);
    };

    service.action.delete = function(id){       
        var url = SiteUrl + '/backend/rest/category/' + id;
        return $http.delete(url);
    };

    return service;
});