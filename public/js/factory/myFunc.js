ngApp.factory('$myFunc', ['$rootScope', function ($rootScope) {
        var privateFunc = {
            calDate: function (date, format) {
                var tmp;
                if (date || format) {
                    tmp = moment();
                }
                else {
                    tmp = moment(date, format);
                }
                return tmp;
            }
        }
        var myFunc = {
            date: {
                getBeginOfWeek: function (date, format) {
                    var myDate = privateFunc.calDate(date, format);
                    return myDate.startOf('week');
                },
                getEndOfWeek: function (date, format) {
                    var myDate = privateFunc.calDate(date, format);
                    return myDate.endOf('week');
                },
                getBeginOfMonth: function (date, format) {
                    var myDate = privateFunc.calDate(date, format);
                    return myDate.startOf('month');
                },
                getEndOfMonth: function (date, format) {
                    var myDate = privateFunc.calDate(date, format);
                    return myDate.endOf('month');
                },
                getBeginOfYear: function (date, format) {
                    var myDate = privateFunc.calDate(date, format);
                    return myDate.startOf('year');
                },
                getEndOfYear: function (date, format) {
                    var myDate = privateFunc.calDate(date, format);
                    return myDate.endOf('year');
                },
                convertDate: function (date, to, format) {
                    return moment(date, format).format(to);
                },
                convertMinuesToHM: function (minutes) {
                    var hour = Math.floor(minutes / 60);
                    var minutes = minutes - (hour * 60);

                    var result = minutes + ' phút';
                    if (hour > 0) {
                        result = hour + 'h ' + result;
                    }
                    return result;
                }
            },
            isEmpty: function (val) {
                if (!val)
                    return true;
                var typeOfVal = typeof val;
                var retVal = false;
                switch (typeOfVal) {
                    case 'array':
                        retVal = (val.length < 1) ? true : false;
                        break;
                    case 'object':
                        var arrKey = Object.keys(val);
                        retVal = (arrKey.length < 1) ? true : false;
                        break;
                    case 'string':
                        retVal = (val.length < 1) ? true : false;
                        break;
                }

                return retVal;
            },
            processErr: function (err) {
                var listErr = err.data;
                var result = [];
                if (typeof listErr != 'object' && typeof listErr != 'array') {
                    return result;
                }
                for (var key in listErr) {
                    if (typeof listErr[key] == 'string') {
                        result.push(listErr[key]);
                    }
                    else {
                        for (var i in listErr[key]) {
                            result.push(listErr[key][i]);
                        }
                    }
                }

                return result;
            },
            trimWord: function (input, length, ellipses){
                
                ellipses = ellipses || true;
                var arrWord = input.split(" ");
                
                if(arrWord.length <= length){
                    return input;
                }
                
                arrWord = arrWord.slice(0, length);
                return ellipses? arrWord.join(" ") + '...': arrWord.join(" ");
            }
        };

        return myFunc;
    }]);