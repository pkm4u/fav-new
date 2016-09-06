app.controller('NavCtrl', function ($scope,$rootScope, $uibModal,$log) {
  $rootScope.mobClass='';
   $rootScope.navmenu=function(obj){
	  
	  if($rootScope.mobClass==='menu-show'){
	  	$rootScope.mobClass='';
	  }else{
	  	$rootScope.mobClass='menu-show';
	  }
	};
  $rootScope.rmodalInstance='';
  $rootScope.lmodalInstance='';
  $rootScope.lopen = function (size) {
	  $rootScope.alerts='';
	  if($rootScope.rmodalInstance){
	 		$rootScope.rmodalInstance.close();
	  }
	  if($rootScope.rpmodalInstance){
	 		$rootScope.rpmodalInstance.close();
	  }
    $rootScope.lmodalInstance = $uibModal.open({
      animation: true,
      templateUrl: siteUrl+'users/login',
      controller: 'LoginCtrl',
      size: size,
      resolve: {
        
      }
    });
  };
 $rootScope.cancel = function () {
	 $rootScope.alerts='';
    if($rootScope.rmodalInstance){
	 		$rootScope.rmodalInstance.close();
	  }
	if($rootScope.lmodalInstance){
		$rootScope.lmodalInstance.close();
	  }
	if($rootScope.rpmodalInstance){
		$rootScope.rpmodalInstance.close();
	  }  
  }; 
 if(resetLink){
  	 $rootScope.rpmodalInstance = $uibModal.open({
      animation: true,
      templateUrl: siteUrl+'users/resetpassword',
      controller: 'ResetCtrl',
      size: 'sm',
      resolve: {
		  
      }
    });
  }
  
  $rootScope.closeAlert = function(index) {
    $rootScope.alerts.splice(index, 1);
  };
});

app.controller('LoginCtrl', function ($scope,$rootScope, $uibModal, $uibModalInstance,$http) {
	
  $rootScope.ropen = function (size) {
	  $rootScope.alerts='';
	  if($rootScope.lmodalInstance){
		$rootScope.lmodalInstance.close();
	  }
  $rootScope.rmodalInstance = $uibModal.open({
      animation: true,
      templateUrl: siteUrl+'users/register',
      controller: 'RegisterCtrl',
      size: size,
      resolve: {
        
      }
    });
  };
  
  $rootScope.forgotpass = function (size) {
	  $rootScope.alerts='';
	  if($rootScope.lmodalInstance){
		$rootScope.lmodalInstance.close();
	  }
  $rootScope.rpmodalInstance = $uibModal.open({
      animation: true,
      templateUrl: siteUrl+'users/resetpassword',
      controller: 'ResetCtrl',
      size: size,
      resolve: {
        
      }
    });
  };
  
  
  $rootScope.userLogin = function () {
	  $rootScope.pageLoader=true;
	  $rootScope.alerts='';
	  var request={
				  method: 'POST',
				  url:  siteUrl+'users/ajaxLogin/',
				  headers: {'X-CSRF-TOKEN': token},
				  data:{username:$scope.username,password:$scope.password}
				}
	$http(request).then(function successCallback(response) {
			$rootScope.pageLoader=false;
			$rootScope.alerttype=response.data.type;
			$rootScope.alerts=response.data.msg;
			if(response.data.type=='success'){
				
			}
		}, function errorCallback(response) {
			$rootScope.pageLoader=false;
	});
  };
});

app.controller('RegisterCtrl', function ($scope,$rootScope, $uibModal, $uibModalInstance,$http) {
	
});

app.controller('ResetCtrl', function ($scope,$rootScope, $uibModal, $uibModalInstance,$http) {
	$rootScope.resetpassword = function () {
	$rootScope.pageLoader=true;
	$rootScope.alerts='';
	  var request={
				  method: 'POST',
				  url:  siteUrl+'users/resetstepone/',
				  headers: {'X-CSRF-TOKEN': token},
				  data:{username:$scope.username}
				}
	$http(request).then(function successCallback(response) {
			$rootScope.pageLoader=false;
			$rootScope.alerttype=response.data.type;
			$rootScope.alerts=response.data.msg;
			if(response.data.type==='success'){
				$scope.username='';
			}
		}, function errorCallback(response) {
			$rootScope.pageLoader=false;
	});
  };
  
  $rootScope.setnewpassword = function () {
	  $rootScope.pageLoader=true;
	  $rootScope.alerts='';
	  var request={
				  method: 'POST',
				  url:  siteUrl+'users/setnewpassword',
				  headers: {'X-CSRF-TOKEN': token},
				  data:{password:$scope.newpassword,repassword:$scope.renewpassword}
				}
	$http(request).then(function successCallback(response) {
			$rootScope.pageLoader=false;
			$rootScope.alerttype=response.data.type;
			$rootScope.alerts=response.data.msg;
		}, function errorCallback(response) {
			$rootScope.pageLoader=false;
	});
  };
});