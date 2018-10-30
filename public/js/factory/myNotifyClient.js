ngApp.factory('$myNotifyClient', ['$rootScope', function ($rootScope) {
        var myNotify = {
            
            success: function(message){
                var type = 'success';
                myNotify.showNotify(message, type);
            },
            err: function(message){
                var type = 'error';
                myNotify.showNotify(message, type);
            },
            showNotify: function(message, type){
                $.notify(message,type);
            }
        };
        
        return myNotify;
}]);