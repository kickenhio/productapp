var productApp = angular.module('productApp', ['ngRoute', 'ngAnimate', 'ngResource']);

	productApp.config(function($routeProvider, $locationProvider, $httpProvider) {
		$locationProvider.html5Mode(true).hashPrefix('!');
		$httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';

		$routeProvider.when('/', {
			 templateUrl: '/lista',
			 controller: 'ListController'
		}).when('/login', {
			 templateUrl: '/login',
			 controller: 'LoginController'
		}).when('/register', {
			 templateUrl: '/register',
			 controller: 'ListController'
		}).when('/product/:id', {
			templateUrl: function(parameters){ return '/product/' + parameters.id; },
			controller: 'ProductController'
		}).when('/logout', {
			 templateUrl: '/logout',
			 controller: 'ListController'
		}).otherwise({
			redirectTo: '/'
		});
	});

	productApp.run(function($rootScope, $location, $route, $templateCache) {
		$rootScope.$on('$viewContentLoaded', function() {
		   $templateCache.removeAll();
		});
	});

	productApp.controller('ProductController', function ($scope, $http, $routeParams){
		$scope.product = {};
		$http.get("/product/" + $routeParams.id).then(function(response) {
			$scope.product = response.data;
			console.log($scope.product);
		});
	});

	productApp.controller('ListController', function ($scope, $http){
		$scope.list = [];

		$http.get("/product").then(function(response) {
			$scope.list = response.data;
			console.log($scope.list);
		});
	});

	productApp.controller('LoginController', function ($scope, $http, $location){
		$scope.user = {};
		$scope.processForm = function() {
			$http.post('/login', {
					email :  $scope.user.email,
					password: $scope.user.password,
					remember: $scope.user.remember
				}).success(function(data) {
					$location.path('/');
				}).error(function(errors) {
					$scope.errorEmail = errors.email;
					$scope.errorPassword = errors.password;
			});
		};
	});
