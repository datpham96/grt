ngApp.factory('$categoryService', function ($http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {}
    };

    //data
    service.data.list = function(freeText){
        return {
            freeText: freeText || ""
        }
    }
    service.data.update = function(name, parentId){
        var params = new FormData();
        params.append('name', name || "");
        params.append('parent_id', parentId || "");
        
        return params;
    };

    //action
    service.action.list = function (data) {
        var url = SiteUrl + '/backend/rest/category?' + $httpParamSerializer(data);
        return $http.get(url);
    };

    service.action.listParent = function () {
        var url = SiteUrl + '/backend/rest/categoryParent';
        return $http.get(url);
    };

    service.action.listAllCateByParent = function () {
        var url = SiteUrl + '/backend/rest/categoryAllParent';
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