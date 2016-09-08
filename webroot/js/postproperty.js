var app = angular.module('fav', ['ngSanitize','ngAnimate','ui.bootstrap']);
   app.filter('replaceStr', function () {
		return function (str) {
			return str.replace(/ /gi,"-" );
		};
	});
   app.controller('FavController', function($scope,$rootScope,$log,$http,$timeout,$uibModal,$log,$q) {
	   	$rootScope.base_url=siteUrl;
		$scope.post=function(){
			$rootScope.pageLoader=true;
	  $rootScope.alerts='';
	  var request={
				  method: 'POST',
				  url:  siteUrl+'Postproperty/post/',
				  headers: {'X-CSRF-TOKEN': token},
				  data:{data:'hello'}
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
		}
		
	});