ngApp.factory('$myBootbox', ['$rootScope','$filter', function ($rootScope,$filter) {
    var myBootbox = {
        confirm: function(message, callBack){

            callBack = callBack || function(){};
            bootbox.confirm({ 
                message: message, 
                buttons: {
                    'cancel': {
                        label: "Không",
                        className: 'btn-default'
                    },
                    'confirm': {
                        label: "Có",
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

            callBack = callBack || function(){};
            bootbox.prompt({
                title: title, 
                buttons: {
                    'cancel': {
                        label: "Không",
                        className: 'btn-default'
                    },
                    'confirm': {
                        label: "Có",
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