ngApp.directive('updateUserModal', function ($filter,$userService, $apply, $myLoader, $userRole, $myFile, $typeConfig, $myBootbox, $myNotify) {
    var templateUrl = SiteUrl + "/modal/userModal";
    var restrict = 'E';
    var scope = {
        retFunc: "&",
        updateData: "=userData",
        modalDom: '=',
        formUpdateUser: "=formUpdateUser",
        radioChecked: "=radioChecked"
    };
    var $translate = $filter('translate');

    var link = function (scope) {
        scope.domChosseDeviceModal;
        scope.showOnlyAvaiable = true;

        scope.formUpdateUser;
        scope.modalData = {
            endTime: '',
            vmr: '',
            port: '',
            sip: '',
            recordingSize: '',
            materialsSize: '',
            maxTimeDuration: ''
        };
        scope.modalTrialData = {
            endTime: '',
            vmr: 1,
            port: 5,
            sip: 0,
            recordingSize: 1,
            materialsSize: 10,
            maxTimeDuration: 45
        };
        scope.disableEmail = false;
        scope.radioChecked = true;
        scope.serviceDisable = true;
        scope.errFullName = false;
        scope.actions = {
            serviceChecked: function(){
                scope.radioChecked = false;                
            },
            trialChecked: function(){
                scope.radioChecked = true;
                scope.serviceDisable = true;
                scope.modalTrialData.endTime = '';
            },
            formatEndTime: function(data){
                return moment(scope.modalData.endTime, 'DD/MM/YYYY').set('hour', moment().hours())
                .set('hour', moment().hours()).set('minute', moment().minutes()).set('second', moment().seconds()).format('YYYY-MM-DD H:m:s')
            },
            update: function () {
                $myLoader.show();
                if ($(scope.formUpdateUser).parsley().validate()) {//validate
                    var name = scope.modalData.name.split(" ");
                    var recordingSize = '';
                    var materialsSize = '';
                    if(!scope.checkRecord){
                        recordingSize = scope.modalData.recordingSize
                    }else{
                        recordingSize = -1;
                    }
                    if(!scope.checkMater){
                        materialsSize = scope.modalData.materialsSize;
                    }else{
                        materialsSize = -1;
                    }
                    if(name.length > 1) {
                        if(!scope.radioChecked){                            
                            var params = $userService.data.update(scope.modalData.name,
                                scope.modalData.email, scope.modalData.phone, scope.modalData.avatar,
                                $typeConfig.CONST_CUSTOMER_ROLE,$typeConfig.CONST_STATUS_SERVICE,scope.modalData.port,
                                scope.modalData.vmr,recordingSize,materialsSize,
                                scope.modalData.sip,scope.modalData.maxTimeDuration,
                                scope.actions.formatEndTime(scope.modalData.endTime)
                            );                       
                        }else{                            
                            var params = $userService.data.update(scope.modalData.name,
                                scope.modalData.email, scope.modalData.phone, scope.modalData.avatar,
                                $typeConfig.CONST_CUSTOMER_ROLE,$typeConfig.CONST_STATUS_TRIAL,scope.modalTrialData.port,
                                scope.modalTrialData.vmr,scope.modalTrialData.recordingSize,scope.modalTrialData.materialsSize,
                                scope.modalTrialData.sip,scope.modalTrialData.maxTimeDuration,
                                scope.actions.formatEndTime(scope.modalData.endTime)
                            );
                        }
                        var id = scope.modalData.id || 0;
                        if (id > 0) { //thuc hien update
                            $userService.action.update(params, id).then(function (resp) {
                                $apply(function () {
                                    //tra lai thong bao cho controller
                                    scope.retFunc({ data: true });
                                });
    
                            }).catch(function (err) {
                                $myLoader.hide();
                                scope.retFunc({ data: err.data });
                            });
                        }
                        else //thuc hien insert
                        {
                            $userService.action.create(params).then(function (resp) {
                                //tra lai thong bao cho controller
                                scope.retFunc({ data: true, id: resp.data.userId });
                            }).catch(function (err) {
                                $myLoader.hide();
                                scope.retFunc({ data: err.data });
                                // console.log(err.data);
                            });
                        }
                    } else {
                        $myLoader.hide();
                        scope.errFullName = true;
                    } 
                    
                } else {
                    $myLoader.hide();
                }
            },
            loadImage: function (params) {
                return $myFile.avatar(params);

            },
            addNewPhone: function(){
                scope.modalData.phone.push("");
            },
            removePhone: function(index){
                scope.modalData.phone.splice(index, 1);
            }
        };

        scope.$watch('updateData', function (newVal, oldVal) {
            scope.checkRecord = false;
            scope.checkMater = false;
            scope.errFullName = false;
            scope.addPhone = false;
            var id = (newVal.id) ? parseInt(newVal.id) : 0;
            scope.deviceInfo = {};
            scope.infoDisabled = false;
            $apply(function () {
                scope.modalData = {};
                if(id > 0){
                    scope.addPhone = true;
                    scope.infoDisabled = true;
                    scope.modalData = angular.copy(newVal); 
                    if(newVal.user_zone.length > 0){
                        scope.modalData.port = newVal.user_zone[0].port;
                        scope.modalData.vmr = newVal.user_zone[0].vmr;
                        scope.modalData.sip = newVal.user_zone[0].sip_num;
                        
                        scope.modalData.maxTimeDuration = newVal.user_zone[0].max_time;
                        scope.modalData.endTime = moment(newVal.user_zone[0].end_date).format('DD/MM/YYYY');

                        scope.checkRecord = (newVal.user_zone[0].recording_size == -1) ? true : false;
                        scope.checkMater = (newVal.user_zone[0].material_size == -1) ? true : false;
                        scope.modalData.recordingSize = (newVal.user_zone[0].recording_size == -1) ? '' : newVal.user_zone[0].recording_size;
                        scope.modalData.materialsSize = (newVal.user_zone[0].material_size == -1) ? '' : newVal.user_zone[0].material_size;

                    }    

                    if(newVal.status == $typeConfig.CONST_STATUS_SERVICE){
                        scope.radioChecked = false;
                    }else{
                        scope.radioChecked = true;
                    }                                   
                }else{
                    var date = new Date()
                    scope.modalData.endTime = moment(date).format('DD/MM/YYYY');

                }
                // console.log(scope.modalData);
                scope.title = (id > 0) ? $translate('USER.UPDATE_TITLE') : $translate('USER.INSERT_TITLE');
                scope.disableEmail = (id > 0) ? true : false;
                
                try {
                    scope.modalData.phone = JSON.parse(newVal.phone);
                    
                    if(typeof scope.modalData.phone == 'string' || typeof scope.modalData.phone == 'number'){
                        scope.modalData.phone = [newVal.phone];
                    }
                    
                } catch (error) {
                    scope.modalData.phone = [newVal.phone];
                }
            });
            
        });
    };

    return {
        restrict: restrict,
        scope: scope,
        templateUrl: templateUrl,
        link: link
    };
});