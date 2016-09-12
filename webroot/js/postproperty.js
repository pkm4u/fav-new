var app = angular.module('fav', ['ngMaterial','ngSanitize','ngAnimate','ui.bootstrap','ngMessages']);
   app.filter('replaceStr', function () {
		return function (str) {
			return str.replace(/ /gi,"-" );
		};
	});
   app.controller('FavController', function($scope,$rootScope,$log,$http,$timeout,$uibModal,$log,$q) {
	   	$rootScope.base_url=siteUrl;
		$scope.cityname='Select City';
		$scope.localityname='Select locality';
		$scope.selectedAmenities = [];
		$scope.selectedOtherRoom = [];
		$scope.selectedParking = [];
		$scope.amenities=[];
		 $http({method: 'JSON', url: siteUrl+'Api/amenities'}).
              success(function(data, status) {
               $scope.amenities = data.amenities;
              }).
              error(function(data, status) {
                console.log(data || "Request failed");
           }); 
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
						$rootScope.cities=response.data.cities;
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
					if(response.data.type=='success'){
						$scope.locations=response.data.locations;
					}
				}, function errorCallback(response) {
					console.log(data || "Request failed");
			});
		}
		
		
		$scope.postProp=function(){
			var request={
						  method: 'post',
						  url:  siteUrl+'Postproperty/post/',
						   headers: {'X-CSRF-TOKEN': token},
						  data:{amenities:$scope.selectedAmenities}
						}
			$http(request).then(function successCallback(response) {
					$rootScope.pageLoader=false;
					$rootScope.alerttype=response.data.type;
					$rootScope.alerts=response.data.msg;
					if(response.data.type=='success'){
						$scope.locations=response.data.locations;
					}
				}, function errorCallback(response) {
					$rootScope.pageLoader=false;
			});
		}
		
	});