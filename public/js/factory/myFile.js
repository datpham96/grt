ngApp.factory('$myFile', function ($rootScope, $httpParamSerializer) {
    var myFile = {
        avatar: function (file) {
            var params = {
                data: file
            };
            return url = SiteUrl + "/file/avatar?" + $httpParamSerializer(params);
        }
    };
    return myFile;
});