ngApp.controller('productCtrl', function($scope,$myLoader, $myNotify, $myBootbox,$apply){

});

ngApp.config(['$routeProvider','$locationProvider',
    function($routeProvider, $locationProvider) {
        var mainProducts = SiteUrl + "/admin/mainProducts";
        var productDetail = SiteUrl + "/admin/productDetail";

        $routeProvider.
        when('/', {
            templateUrl: mainProducts,
            controller: 'productCtrl'
        }).
        when('/update/:id', {
            templateUrl: productDetail,
            controller: 'productDetailCtrl'
        }).
        when('/insert', {
            templateUrl: productDetail,
            controller: 'productDetailCtrl'
        }).
        otherwise({
            redirectTo: '/'
        });
        $locationProvider.hashPrefix('');

    }]);