ngApp.factory('$postService', function ($http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {}
    };

    //data
    service.data.update = function(title, description, content, avatar){
        var params = new FormData();
        params.append('title', title || "");
        params.append('description', description || "");
        params.append('content', content || "");
        params.append('avatar', avatar || "");
        
        return params;
    };

    //action
    service.action.list = function (data) {
        var url = SiteUrl + '/backend/rest/post?' + $httpParamSerializer(data);
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
        var url = SiteUrl + '/backend/rest/post';
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
        var url = SiteUrl + '/backend/rest/post/' + id;
        return $http.post(url, data, config);
    };

    service.action.delete = function(id){       
        var url = SiteUrl + '/backend/rest/post/' + id;
        return $http.delete(url);
    };

    service.action.info = function (id) {
        var url = SiteUrl + '/backend/rest/post/' + id;
        return $http.get(url);
    }; 

    return service;
});