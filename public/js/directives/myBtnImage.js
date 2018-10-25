ngApp.directive('myBtnImage', function($apply) {
    return {
        restrict: 'C',
        link: function(scope, element, attrs) {
            $apply(function () {
                var domain = SiteUrl + "/laravel-filemanager";
                $('#lfm').filemanager('image', {prefix: domain});
            });
        }
    };
});