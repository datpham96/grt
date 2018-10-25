ngApp.controller('postCtrl', function($scope,$myLoader, $myNotify, $myBootbox,$apply){

});

ngApp.config(['$routeProvider','$locationProvider',
    function($routeProvider, $locationProvider) {
        var mainPosts = SiteUrl + "/admin/mainPosts";
        var postDetail = SiteUrl + "/admin/postDetail";

        $routeProvider.
        when('/', {
            templateUrl: mainPosts,
            controller: 'postCtrl'
        }).
        when('/update/:id', {
            templateUrl: postDetail,
            controller: 'postDetailCtrl'
        }).
        when('/insert', {
            templateUrl: postDetail,
            controller: 'postDetailCtrl'
        }).
        otherwise({
            redirectTo: '/'
        });
        $locationProvider.hashPrefix('');

    }]);