app.controller('NavCtrl', function ($scope,$rootScope, $uibModal,$log) {
	if(user){
		user=JSON.parse(user);
		$rootScope.loginUser=user.User;
	}
  $rootScope.mobClass='';
  $rootScope.base_url=siteUrl;
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
  if(userLogin){
  	$rootScope.lmodalInstance = $uibModal.open({
      animation: true,
      templateUrl: siteUrl+'users/login',
      controller: 'LoginCtrl',
      resolve: {
        
      }
    });
  }
  
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
	  delete $rootScope.alerts[index];
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
				  data:{email:$scope.email,password:$scope.password,remember:$scope.remember}
				}
	$http(request).then(function successCallback(response) {
			$rootScope.pageLoader=false;
			$rootScope.alerttype=response.data.type;
			$rootScope.alerts=response.data.msg;
			if(response.data.type=='success'){
				$rootScope.loginUser=response.data.user;
			  if($rootScope.lmodalInstance){
				$rootScope.lmodalInstance.close();
			  }
			}
		}, function errorCallback(response) {
			$rootScope.pageLoader=false;
	});
  };
});

app.controller('RegisterCtrl', function ($scope,$rootScope, $uibModal, $uibModalInstance,$http,$window) {
	$scope.options = [{ name: "+91 (IND)", value: "91" }, { name: "+44 (GBR)", value:"44"},{name:"+1 (USA)",value:"1"},{name:"+61 (AUS)",value:"61"},{name:"+60 (MYS)",value:"60"},{name:"+971 (ARE)",value:"971"}];
	$scope.selectedOption = $scope.options[0];
	$scope.setusertype=function(value){
    $scope.currentVal=value;
	
  };
	 $rootScope.userRegister = function () {
		
	  $rootScope.pageLoader=true;
	  $rootScope.alerts='';
	  var request={
				  method: 'POST',
				  url:  siteUrl+'users/ajaxRegister/',
				  headers: {'X-CSRF-TOKEN': token},
				  data:{name:$scope.name,email:$scope.email,password:$scope.password,prefix:$scope.selectedOption,phone:$scope.mobile,usertype:$scope.currentVal}
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