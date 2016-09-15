var app = angular.module('fav', ['ngMaterial','ngSanitize','ngAnimate','ui.bootstrap','ngMessages','ngMap']);
   app.filter('replaceStr', function () {
		return function (str) {
			return str.replace(/ /gi,"-" );
		};
	});
	app.filter('floorOn', function() {
		  return function(input, total) {
			total = parseInt(total);
			for (var i=0; i<total; i++) {
			  input.push(i+1);
			}
			return input;
		  };
		});
	
   app.controller('FavController', function($scope,$rootScope,$log,$http,$timeout,$uibModal,$q, $sce,$compile) {
	   $rootScope.pageLoader=false;
	   	$rootScope.base_url=siteUrl;
		$scope.cityname='Select City';
		$scope.localityname='Select locality';
		$scope.selectedAmenities = [];
		$scope.selectedOtherRoom = [];
		$scope.selectedParking = [];
		$scope.selectedPriceInc = [];
		$scope.amenities=[];
		$scope.totalFloors=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,'+20']; 
		   //************** For CheckBox********************* // 
			  $scope.toggle = function (item, list) {
				var idx = list.indexOf(item);
				if (idx > -1) {
				  list.splice(idx, 1);
				}
				else {
				  list.push(item);
				}
			  };
			  $scope.exists = function (item, list) {
				return list.indexOf(item) > -1;
			  };
		  //************** For CheckBox********************* //
		/*$scope.noevent=function($event) {
			$event.preventDefault();
			$event.stopPropagation();
     	};*/
		$rootScope.cities=[];
		$scope.loadCity=function(){
				var request={
							  method: 'get',
							  url:  siteUrl+'Api/cities/'
							}
				$http(request).then(function successCallback(response) {
						$rootScope.pageLoader=false;
						$rootScope.alerttype=response.data.type;
						$rootScope.alerts=response.data.msg;
						if(response.data.type=='success'){
							$timeout(function() {
								$rootScope.cities=response.data.cities;
							},600);
						}
					}, function errorCallback(response) {
						console.log(data || "Request failed");
				});
			
			}
		
		
		$scope.location=function(id,name){
			$rootScope.pageLoader=true;
			$rootScope.alerts='';
			$scope.cityname=name;
			var request={
						  method: 'get',
						  url:  siteUrl+'Api/locations/'+id
						}
			$http(request).then(function successCallback(response) {
					$rootScope.pageLoader=false;
					$rootScope.alerttype=response.data.type;
					$rootScope.alerts=response.data.msg;
					$scope.proCity=id;
					if(response.data.type=='success'){
						$scope.locations=response.data.locations;
					}
				}, function errorCallback(response) {
					console.log(data || "Request failed");
			});
			
			var prequest={
						  method: 'get',
						  url:  siteUrl+'Api/allProject/'+id
						}
			$http(prequest).then(function successCallback(response) {
					$rootScope.pageLoader=false;
					if(response.data.type=='success'){
						var allNewProjects=response.data.projects;
						$scope.projects= allNewProjects.map( function (project) {
							return {
							 value: project.value,
							 searchR:project.display.toLowerCase(),
							 display: project.display
							};
						  });
					}
				}, function errorCallback(response) {
					console.log(data || "Request failed");
			});			
		}
		
		//********************* Google Map****************************//
				$scope.lat=28.4142764;
				$scope.long=77.0422422;
		 		$scope.mzoom=14;
		//********************* Google Map****************************//
		
		//******************************** Property Side Tab *********************************//
		$scope.basicInfo=true;
		$scope.amenit=false;
		$scope.propDetail=false;
		$scope.compAddr=false;
		$scope.pricing=false;
		$scope.photos=false;
		$scope.activeIndx=0;
		$scope.showprpmenu=['BasicInfo'];
		$scope.propmenu=function(menu){
			if($scope.showprpmenu.indexOf(menu) !== -1){
				$scope.activeIndx=$scope.showprpmenu.indexOf(menu);
				if(menu==='BasicInfo'){
					$scope.basicInfo=true;
					$scope.amenit=false;
					$scope.propDetail=false;
					$scope.compAddr=false;
					$scope.pricing=false;
					$scope.photos=false;
				}
				if(menu==='Amenities'){
					$scope.basicInfo=false;
					$scope.amenit=true;
					$scope.propDetail=false;
					$scope.compAddr=false;
					$scope.pricing=false;
					$scope.photos=false;
				}
				if(menu==='PropertyDetail'){
					$scope.basicInfo=false;
					$scope.amenit=false;
					$scope.propDetail=true;
					$scope.compAddr=false;
					$scope.pricing=false;
					$scope.photos=false;
				}
				if(menu==='CompleteAddress'){
					$scope.basicInfo=false;
					$scope.amenit=false;
					$scope.propDetail=false;
					$scope.compAddr=true;
					$scope.pricing=false;
					$scope.photos=false;
				}
				if(menu==='Pricing'){
					$scope.basicInfo=false;
					$scope.amenit=false;
					$scope.propDetail=false;
					$scope.compAddr=false;
					$scope.pricing=true;
					$scope.photos=false;
				}
				if(menu==='Photos'){
					$scope.basicInfo=false;
					$scope.amenit=false;
					$scope.propDetail=false;
					$scope.compAddr=false;
					$scope.pricing=false;
					$scope.photos=true;
				}
			}
		}
		//******************************** Property Side Tab [END]*********************************//
		
		//******************************** Save Basic Info*********************************//
		$scope.saveInfo=function(){
			$rootScope.pageLoader=true;
			var request={
						  method: 'post',
						  url:  siteUrl+'Postproperty/saveinfo',
						  headers: {'X-CSRF-TOKEN': token},
						  data:{title:$scope.title}
						}
			$http(request).then(function successCallback(response) {
					$rootScope.pageLoader=false;
					if(response.data.type=='success'){
						$scope.basicInfo=false;
						$scope.amenit=true;
						$scope.propDetail=false;
						$scope.compAddr=false;
						$scope.pricing=false;
						$scope.photos=false;
						$scope.activeIndx=1;
						$scope.showprpmenu.push('Amenities');
						$http({method: 'JSON', url: siteUrl+'Api/amenities'}).success(function(data, status) {
						   $scope.amenities = data.amenities;
						  }).error(function(data, status) {
							console.log(data || "Request failed");
					   });
					}
				}, function errorCallback(response) {
					$rootScope.pageLoader=false;
			});
		}
		
	//******************************** Save Basic Info [End]*********************************//
		
	//******************************** Save Amenities *********************************//
		$scope.saveAmenities=function(){
			$rootScope.pageLoader=true;
			var request={
						  method: 'post',
						  url:  siteUrl+'Postproperty/saveamenities',
						  headers: {'X-CSRF-TOKEN': token},
						  data:{title:$scope.title}
						}
			$http(request).then(function successCallback(response) {
					$rootScope.pageLoader=false;
					if(response.data.type=='success'){
						$scope.basicInfo=false;
						$scope.amenit=false;
						$scope.propDetail=true;
						$scope.compAddr=false;
						$scope.pricing=false;
						$scope.photos=false;
						$scope.activeIndx=2;
						$scope.showprpmenu.push('PropertyDetail');
					}
				}, function errorCallback(response) {
					$rootScope.pageLoader=false;
			});
		}
		
	//******************************** Save Amenities [End]*********************************//
	
	//******************************** Save Property Details *********************************//
		$scope.saveDetails=function(){
			$rootScope.pageLoader=true;
			var request={
						  method: 'post',
						  url:  siteUrl+'Postproperty/savedetails',
						  headers: {'X-CSRF-TOKEN': token},
						  data:{title:$scope.title}
						}
			$http(request).then(function successCallback(response) {
					$rootScope.pageLoader=false;
					if(response.data.type=='success'){
						$scope.basicInfo=false;
						$scope.amenit=false;
						$scope.propDetail=false;
						$scope.compAddr=true;
						$scope.pricing=false;
						$scope.photos=false;
						$scope.activeIndx=3;
						$scope.showprpmenu.push('CompleteAddress');
					}
				}, function errorCallback(response) {
					$rootScope.pageLoader=false;
			});
		}
		
	//******************************** Save Property Details [End]*********************************//
	
	//******************************** Save Complete Address *********************************//
	
		//******** Auto Complete ************//
			 
    		$scope.simulateQuery = false;
    		$scope.isDisabled    = false;
   			$scope.projects = '';
    		$scope.querySearch   = querySearch;
    		$scope.selectedItemChange = selectedItemChange;
			$scope.contacts = [$scope.projects[0]];
   			$scope.allProjects=[];
    // ******************************
    // Internal methods
    // ******************************
			function querySearch (query) {
			  var results = query ? $scope.projects.filter( createFilterFor(query) ) : $scope.projects,
				  deferred;
			  if ($scope.simulateQuery) {
				deferred = $q.defer();
				$timeout(function () { deferred.resolve( results ); }, Math.random() * 1000, false);
				return deferred.promise;
			  } else {
				return results;
			  }
			}
			function selectedItemChange(item) {
				if(item){
					var request={
							  method: 'get',
							  url:  siteUrl+'Api/projectDetails/'+$scope.proCity+'/'+item.value
							}
					$http(request).then(function successCallback(response) {
						$rootScope.pageLoader=false;
						if(response.data.type=='success'){
							$scope.lat=response.data.project.lat;
							$scope.long=response.data.project.long;
						}
					}, function errorCallback(response) {
						console.log(data || "Request failed");
					});
				}else{
					$log.info('No Item.');
				}
			 
			  
			}
			function createFilterFor(query) {
			  var lowercaseQuery = angular.lowercase(query);
			  return function filterFn(project) {
				return (project.searchR.indexOf(lowercaseQuery) === 0);
			  };
			}
			
		//******** Auto Complete [End] ************//
	
		
		$scope.saveAddress=function(){
			$rootScope.pageLoader=true;
			var request={
						  method: 'post',
						  url:  siteUrl+'Postproperty/saveaddress',
						  headers: {'X-CSRF-TOKEN': token},
						  data:{title:$scope.title}
						}
			$http(request).then(function successCallback(response) {
					$rootScope.pageLoader=false;
					if(response.data.type=='success'){
						$scope.basicInfo=false;
						$scope.amenit=false;
						$scope.propDetail=false;
						$scope.compAddr=false;
						$scope.pricing=true;
						$scope.photos=false;
						$scope.activeIndx=4;
						$scope.showprpmenu.push('Pricing');
					}
				}, function errorCallback(response) {
					$rootScope.pageLoader=false;
			});
		}
		
	//******************************** Save Complite Address [End]*********************************//
	
	//******************************** Save Pricing *********************************//
		$scope.savePricing=function(){
			$rootScope.pageLoader=true;
			var request={
						  method: 'post',
						  url:  siteUrl+'Postproperty/savepricing',
						  headers: {'X-CSRF-TOKEN': token},
						  data:{title:$scope.title}
						}
			$http(request).then(function successCallback(response) {
					$rootScope.pageLoader=false;
					if(response.data.type=='success'){
						$scope.basicInfo=false;
						$scope.amenit=false;
						$scope.propDetail=false;
						$scope.compAddr=false;
						$scope.pricing=false;
						$scope.photos=true;
						$scope.activeIndx=5;
						$scope.showprpmenu.push('Photos');
					}
				}, function errorCallback(response) {
					$rootScope.pageLoader=false;
			});
		}
		
	//******************************** Save Pricing [End]*********************************//
	//******************************** Save Photos *********************************//
		$scope.savePhotos=function(){
			$rootScope.pageLoader=true;
			var request={
						  method: 'post',
						  url:  siteUrl+'Postproperty/savephotos',
						  headers: {'X-CSRF-TOKEN': token},
						  data:{title:$scope.title}
						}
			$http(request).then(function successCallback(response) {
					$rootScope.pageLoader=false;
					if(response.data.type=='success'){
						
					}
				}, function errorCallback(response) {
					$rootScope.pageLoader=false;
			});
		}
		
	//******************************** Save Photos [End]*********************************//
	
	});