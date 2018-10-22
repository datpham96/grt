ngApp.controller('headerCtrl', function ($scope, $myFile)
{   
    $scope.loadImage = function(){
    	if(curUserInfo.avatar){
    		return $myFile.avatar(curUserInfo.avatar);
    	}else{
    		return SiteUrl + '/images/new-user-image-default.jpg';
    	}
        
    }
});