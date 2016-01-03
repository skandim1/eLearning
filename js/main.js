var app = angular.module('myApp', ['ngRoute']);

app.config(function($routeProvider) {
	
	$routeProvider
		.when('/index',{
			templateUrl: 'index.html'
		})
		.when('/login',{
			templateUrl: 'login.html'
		})
		.when('/signup',{
			templateUrl: 'signup.html'
		})
		.otherwise({
			redirectTo: '/index'
		});
});