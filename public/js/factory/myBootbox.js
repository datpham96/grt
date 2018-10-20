ngApp.factory('$myBootbox', ['$rootScope','$filter', function ($rootScope,$filter) {
    var myBootbox = {
        confirm: function(message, callBack){
            var $translate = $filter('translate');

            callBack = callBack || function(){};
            bootbox.confirm({ 
                message: message, 
                buttons: {
                    'cancel': {
                        label: $translate('Button.No'),
                        className: 'btn-default'
                    },
                    'confirm': {
                        label: $translate('Button.Yes'),
                        className: 'btn-primary'
                    }
                },
                callback: callBack,
            });
        },
        alert: function(message, callBack){
            callBack = callBack || function(){};
            bootbox.confirm({
                message: message, 
                callback: callBack
            });
        },
        prompt: function(title, callBack){
            var $translate = $filter('translate');

            callBack = callBack || function(){};
            bootbox.prompt({
                title: title, 
                buttons: {
                    'cancel': {
                        label: $translate('Button.No'),
                        className: 'btn-default'
                    },
                    'confirm': {
                        label: $translate('Button.Yes'),
                        className: 'btn-primary'
                    }
                },
                callback: callBack
            });
        },

        confirmLogin: function(message, callBack) {
            callBack = callBack || function(){};
            bootbox.confirm({ 
                message: message, 
                buttons: {
                    'cancel': {
                        label: 'Thử lại',
                        className: 'btn-default'
                    },
                    'confirm': {
                        label: 'Nhập mã xác nhận',
                        className: 'btn-primary'
                    }
                },
                callback: callBack
            });
        }
    };

    return myBootbox;
}]);