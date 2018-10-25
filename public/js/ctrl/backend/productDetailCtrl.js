ngApp.controller('productDetailCtrl', function($scope,$myLoader, $myNotify, $myBootbox,$apply, $routeParams){
	var id = $routeParams.id;
	if(id > 0){
		console.log('trang sua');
	}else{
		console.log('trang them');
	}
});