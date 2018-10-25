ngApp.controller('supportCtrl', function ($scope, $myLoader, $myNotify, $supportService, $myBootbox){   
	$scope.domSupport;
	$scope.formSupport;
	$scope.dataSupport = {
		info: {}
	};
	$scope.data = {
		list: []
	}
	$scope.filter={
        page: 1,
        perPage: 10,
        freeText:''
    } 
    var processData = {
    	getList: function(){
            var params = {
                freeText: $scope.filter.freeText
            }
    		$supportService.action.list(params).then(function(resp){
    			$scope.data.list = resp.data;
    		}).catch(function(err){
    			console.log(err);
    		})
    	}
    }
    $scope.actions = {
        filter: function(){
            processData.getList();
        },
    	modalInsert: function(){
    		$scope.dataSupport = {};
    		$($scope.domSupport).modal('show');
    		$($scope.formSupport).parsley().reset();
    	},
    	modalUpdate: function(data){
            $scope.dataSupport = {};
    		$scope.dataSupport = data;
    		$($scope.domSupport).modal('show');
    		$($scope.formSupport).parsley().reset();
    	},
    	saveData: function(data, id){
    		if(data){
    			if(id){
    				$myNotify.success('Sửa người hỗ trợ thành công!');
    			}else{
    				$myNotify.success('Thêm người hỗ trợ thành công!');
    			}
                $($scope.domSupport).modal('hide');
                processData.getList();    			
    		}else{
                $myNotify.err('Thao tác thất bại!');
            }   		
    	},
        delete: function(id){
            $myBootbox.confirm('Bạn có muốn xóa không?', function (result) {
                if (result) {
                    $supportService.action.delete(id).then(function(resp){
                        if(resp.data){
                            $myNotify.success('Xóa người hỗ trợ thành công!');
                        }else{
                            $myNotify.err('Xóa người hỗ trợ thất bại!');
                        }
                        $myLoader.hide();
                        $($scope.domSupport).modal('hide');
                        processData.getList();
                    }).catch(function(err){
                        $($scope.domSupport).modal('hide');
                        $myNotify.err('Xóa người hỗ trợ thất bại!');
                        $myLoader.hide();
                    });
                }
            })
        }
        
    }

    $scope.$watch('filter.freeText', function(newVal, oldVal){
        processData.getList();
    });	

    processData.getList();
});