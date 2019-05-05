ngApp.factory('$postBusinessService', function ($http, $httpParamSerializer)
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
            perPage: perPage || "",
        }
    }
    service.data.update = function(name, description, content, avatar, businessId){
        var params = new FormData();
        params.append('name', name || "");
        params.append('description', description || "");
        params.append('content', content || "");
        params.append('avatar', avatar || "");
        params.append('business_id', businessId || "");
        
        return params;
    };

    //action
    service.action.list = function (data) {
        var url = SiteUrl + '/backend/rest/postBusiness?' + $httpParamSerializer(data);
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
        var url = SiteUrl + '/backend/rest/postBusiness';
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
        var url = SiteUrl + '/backend/rest/postBusiness/' + id;
        return $http.post(url, data, config);
    };

    service.action.delete = function(id){       
        var url = SiteUrl + '/backend/rest/postBusiness/' + id;
        return $http.delete(url);
    };

    service.action.info = function (id) {
        var url = SiteUrl + '/backend/rest/postBusiness/' + id;
        return $http.get(url);
    }; 

    return service;
});