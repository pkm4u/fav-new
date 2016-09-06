var app = angular.module('fav', ['ngSanitize','ngAnimate','ui.bootstrap']);
   app.filter('replaceStr', function () {
		return function (str) {
			return str.replace(/ /gi,"-" );
		};
	});
   app.controller('favController', function($scope,$rootScope,$log,$http,$timeout,$uibModal,$log,$q) {
	   	$rootScope.base_url=siteUrl;
		
		
	});