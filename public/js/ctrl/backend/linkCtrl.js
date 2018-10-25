ngApp.controller('linkCtrl', function ($scope, $myLoader, $myNotify, $linkService, $myBootbox){   
	$scope.domData;
	$scope.formData;
	
	$scope.data = {
		list: []
	}
    $scope.dataSingle = {};
	$scope.filter = {
        page: 1,
        perPage: 10,
        freeText:''
    } 
    var processData = {
    	getList: function(){
            var params = $linkService.data.list($scope.filter.freeText, $scope.filter.page, $scope.filter.perPage);
    		$linkService.action.list(params).then(function(resp){
    			$scope.data.list = resp.data.data;
                $scope.paging = resp.data;
    		}).catch(function(err){
    			console.log(err);
    		})
    	}
    }
    $scope.actions = {
        isSTT: function(key){
            return (($scope.filter.perPage * ($scope.filter.page - 1))+key);
        },
        changePage: function(page){
            $scope.filter.page = page;
            processData.getList();
        },
        filter: function(){
            processData.getList();
        },
    	modalInsert: function(){
    		$scope.dataSingle = {};
    		$($scope.domData).modal('show');
    		$($scope.formData).parsley().reset();
    	},
    	modalUpdate: function(data){
            $scope.dataSingle = {};
    		$scope.dataSingle = data;
    		$($scope.domData).modal('show');
    		$($scope.formData).parsley().reset();
    	},
    	saveData: function(data, id){
    		if(data){
    			if(id){
    				$myNotify.success('Sửa đối tác thành công!');
    			}else{
    				$myNotify.success('Thêm đối tác thành công!');
    			}
                $($scope.domData).modal('hide');
                processData.getList();    			
    		}else{
                $myNotify.err('Thao tác thất bại!');
            }   		
    	},
        delete: function(id){
            $myBootbox.confirm('Bạn có muốn xóa không?', function (result) {
                if (result) {
                    $linkService.action.delete(id).then(function(resp){
                        if(resp.status){
                            $myNotify.success('Xóa đối tác thành công!');
                        }else{
                            $myNotify.err('Xóa đối tác thất bại!');
                        }
                        $myLoader.hide();
                        $($scope.domData).modal('hide');
                        processData.getList();
                    }).catch(function(err){
                        $($scope.domData).modal('hide');
                        $myNotify.err('Xóa đối tác thành công!');
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