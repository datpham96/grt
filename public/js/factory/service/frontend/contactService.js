ngApp.factory('$contactService', function ($http)
{
    var service = {
        action: {},
        data: {}
    };

    service.data.update = function (name,email,title,content,captcha) {
        return {
            name: name || "",
            email: email || "",
            title: title || "",
            content: content || "",
            captcha: captcha || "",
        }
    };

    service.action.sendMail = function(params) {
        var url = SiteUrl + '/frontend/rest/sendMail';
        return $http.post(url, params);
    };
    
    service.action.refreshCaptcha = function () {
        var url = SiteUrl + '/frontend/rest/refereshcapcha';
        return $http.get(url);
    };
    
    return service;
});