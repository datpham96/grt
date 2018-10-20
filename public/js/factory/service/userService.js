ngApp.factory('$userService', function ($rootScope, $http, $httpParamSerializer)
{
    var service = {
        action: {},
        data: {}
    };
    //chuan bi du lieu
    service.data.list = function (keyword, role, page,
        perPage,minPort,maxPort,minVMR,maxVMR,minMaterial,
        maxMaterial,minSIP,maxSIP,endDate) {
        return {
            keyword: keyword,
            role: role || '',
            page: page,
            perPage: perPage,
            minPort: minPort || '',
            maxPort: maxPort || '',
            minVMR: minVMR || '',
            maxVMR: maxVMR || '',
            minMaterial: minMaterial || '',
            maxMaterial: maxMaterial || '',
            minSIP: minSIP || '',
            maxSIP: maxSIP || '', 
            endDate: endDate || ''
        };
    };
    //chuan bi du lieu join meeting
    service.data.updateJoinManual = function (confId, password, name) {
        var params = new FormData();
        params.append('confId', confId);
        params.append('password', password);
        params.append('name', name);
        return params;
    };
    
    service.data.listInserMeeting = function (keyword, page, perPage, isAdmin, adminDep, withOut) {
        return {
            keyword: keyword,
            page: page,
            perPage: perPage,
            isAdmin: isAdmin,
            adminDep: adminDep,
            withOut: withOut || []
        };
    };

    service.data.update = function (
        name, email,
        phone, avatar, role,
        status, port, vmr, recordingSize, 
        materialsSize, sip, maxTimeDuration, 
        endTime
        ) {
        var params = new FormData();
        params.append('name', name);
        params.append('email', email);
        params.append('phone', phone);
        params.append('avatar', avatar);
        params.append('role', role);
        params.append('status', status);
        params.append('port', port);
        params.append('vmr', vmr);
        params.append('recordingSize', recordingSize);
        params.append('materialsSize', materialsSize);
        params.append('sip', sip);
        params.append('maxTimeDuration', maxTimeDuration);
        params.append('endTime', endTime);
        return params;
    };

    service.action.login = function(params) {
        var url = SiteUrl + '/login';
        return $http.post(url, params);
    };
    
    

    //action
    service.action.list = function (data) {
        var url = SiteUrl + '/rest/user?' + $.param( data );
        return $http.get(url);
    };
    
    service.action.create = function (data) {
        var config = {
            headers: {
                'Content-Type': undefined,
                'processData': false,
                'contentType': false
            }
        };
        var url = SiteUrl + '/rest/user';
        return $http.post(url, data, config);
    };

    service.action.update = function (data, userId) {
        var config = {
            headers: {
                'Content-Type': undefined,
                'processData': false,
                'contentType': false
            }
        };

        var url = SiteUrl + '/rest/user/' + userId;
        return $http.post(url, data, config);
    };

    service.action.changePassword = function (id, newPassword) {
        var url = SiteUrl + '/rest/user/password/' + id;
        var data = {
            newPassword: newPassword
        };
        return $http.put(url, data);
    };

    // service.action.delete = function (id) {
    //     var url = SiteUrl + '/rest/user/' + id;
    //     return $http.delete(url);
    // };

    service.action.deleteVideomost = function (id) {
        var url = SiteUrl + '/rest/user/' + id;
        return $http.delete(url);
    };

    service.action.info = function (id) {
        var url = SiteUrl + '/rest/user/' + id;
        return $http.get(url);
    };

    service.action.authUser = function () {
        var url = SiteUrl + '/rest/user/auth/info';
        return $http.get(url);
    };

    service.action.resetPass = function (userId)
    {
        var url = SiteUrl + '/rest/password/reset/' + userId;
        return $http.put(url);
    };

    service.action.usersZone = function (hasCurDep) {
        var params = {
            hasCurDep: hasCurDep || 0
        }
        var url = SiteUrl + '/rest/user/zone?' + $httpParamSerializer(params);
        return $http.get(url);
    };

    // User Role
    service.action.listRole = function () {
        var url = SiteUrl + '/rest/user/role';
        return $http.get(url);
    };

    //join manual 
    service.action.joinManual = function(data){       
        var config = {
            headers : {
                'Content-Type': undefined,
                'processData': false,
                'contentType': false
            }
        };
        
        var url = SiteUrl + '/joinManual';
        return $http.post(url, data, config);
    };

    return service;
});