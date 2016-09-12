var app = angular.module('fav', ['ngSanitize','ngAnimate','ui.bootstrap','ui.checkbox']);
   app.filter('replaceStr', function () {
		return function (str) {
			return str.replace(/ /gi,"-" );
		};
	});
   app.controller('FavController', function($scope,$rootScope,$log,$http,$timeout,$uibModal,$log,$q) {
	   	$rootScope.base_url=siteUrl;
		$scope.cityname='Select City';
		$scope.localityname='Select locality';
		//$scope.aminitieschk=[];
		$scope.amenities=[];
		 $http({method: 'JSON', url: siteUrl+'Api/amenities'}).
              success(function(data, status) {
               $scope.amenities = data.amenities;
              }).
              error(function(data, status) {
                console.log(data || "Request failed");
           });  
		
		if(cities){
			$rootScope.cities=cities;
		}
		$scope.noevent=function($event) {
			$event.preventDefault();
			$event.stopPropagation();
     	};
		
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
					$rootScope.pageLoader=false;
			});
		}
		$scope.selectlocation=function(id,name){
			$scope.localityname=name;
		}
	});