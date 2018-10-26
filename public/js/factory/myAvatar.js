ngApp.factory('$myAvatar', function ($rootScope) {
    var myFile = {
        avatarDefault: function () {
            return url = SiteUrl + "/images/new-user-image-default.jpg";
        },
        imageDefault: function () {
            return url = SiteUrl + "/images/image-default.png";
        },
        image: function(image){
        	return url = SiteUrl + image;
        },
        avatar: function(avatar){
        	return url = SiteUrl + avatar;
        }
    };
    return myFile;
});