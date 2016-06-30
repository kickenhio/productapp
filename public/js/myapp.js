vex.defaultOptions.className = 'vex-theme-os';
var productApp = angular.module('productApp', ['ngRoute', 'ngAnimate', 'ngResource']);

	productApp.config(function($routeProvider, $locationProvider, $httpProvider) {
		$locationProvider.html5Mode(true).hashPrefix('!');
		$httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';

		$routeProvider.when('/', {
			 templateUrl: '/products',
			 controller: 'ListController'
		}).when('/attributes', {
			 templateUrl: '/attributes',
			 controller: 'AttributesController'
		}).when('/login', {
			 templateUrl: '/login',
			 controller: 'LoginController'
		}).when('/register', {
			 templateUrl: '/register',
			 controller: 'ListController'
		}).when('/logout', {
			 templateUrl: '/logout',
			 controller: 'LogoutController'
		}).otherwise({
			redirectTo: '/'
		});
	});

	productApp.run(function($rootScope, $location, $route, $templateCache) {
		$rootScope.$on('$viewContentLoaded', function() {
		   $templateCache.removeAll();
		});
	});

	productApp.controller('ListController', function ($scope, $http, $compile){
		$scope.list = [];

		$http.get("/product").then(function(response) {
			$scope.list = response.data;
		});

		$scope.toggleExpanded = function(product){
			product.expanded = !product.expanded;
		}

		$scope.calcSum = function(price, attributes){
			var sum = parseFloat(price);
			if(attributes){
				angular.forEach(attributes, function(value) {
				  console.log(value);
				  sum += parseFloat(value.price);
				});
			}
			return sum;
		}

		$scope.create = function(){
			$scope.error = {};
			$scope.product = { 'id' : '' };
			$http.get('/product/create').then(function(response) {
				vex.open({
					content: '',
					afterOpen: function($vexContent) {
						$content = $vexContent.append(response.data);
						$compile($vexContent)($scope);
						return $content;
					}
				});
			});
		};

		$scope.edit = function(product){
			$scope.error = {};
			$scope.product_old = product;
			$scope.product = angular.copy(product);
			$http.get('/product/' + product.id + '/edit').then(function(response) {
				vex.open({
					content: '',
					afterOpen: function($vexContent) {
						$content = $vexContent.append(response.data);
						$compile($vexContent)($scope);
						return $content;
					}
				});
			});
		};

		$scope.save = function(){
			if ($scope.product.id){
				$http.put('/product/' + $scope.product.id , $scope.product).success(function(response) {
					$scope.list.splice($scope.list.indexOf($scope.product_old), 1);
					$scope.list.push(response);
					vex.close();
				}).error(function(errors) {
					$scope.error = errors;
				});
			} else {
				$http.post('/product', $scope.product).success(function(response) {
					$scope.list.push(response);
					vex.close();
				}).error(function(errors) {
					$scope.error = errors;
				});
			}
		};

		$scope.delete = function(product) {
			vex.dialog.confirm({
			  message: 'Are you sure?',
			  callback: function(accept) {
				if(accept){
					$http.delete("/product/" + product.id).success(function(response) {
						$scope.list.splice($scope.list.indexOf(product), 1);
					}).error(function(errors) {

					});
				}
			}});
		};

		$scope.addAttribute = function(){
			$scope.attribute = {};
			$scope.edition = false;
			$http.get('/attribute/create').then(function(response) {
				vex.open({
					content: '',
					afterOpen: function($vexContent) {
						$content = $vexContent.append(response.data);
						$compile($vexContent)($scope);
						return $content;
					}
				});
			});
		};

		$scope.editAttribute = function(attribute){
			$scope.attribute = angular.copy(attribute);
			$scope.attribute_old = attribute;
			$scope.edition = true;
			$scope.form_error = {};
			$http.get('/attribute/create').then(function(response) {
				vex.open({
					content: '',
					afterOpen: function($vexContent) {
						$content = $vexContent.append(response.data);
						$compile($vexContent)($scope);
						return $content;
					}
				});
			});
		};

		$scope.saveAttribute = function($edit) {
			console.log($scope.attribute);
			$http.post('/attribute', $scope.attribute).success(function(response) {
				if(!$scope.product.attributes){
					$scope.product.attributes = [];
				}

				if ($edit){
					$scope.product.attributes.splice($scope.product.attributes.indexOf($scope.attribute_old), 1);
					$scope.product.attributes.push($scope.attribute);
				} else {
					$scope.product.attributes.push($scope.attribute);
				}

				$scope.attribute = {};
				$scope.attribute_old = {};
				vex.close();
			}).error(function(errors) {
				$scope.form_error = errors;
			});
		};

		$scope.deleteAttribute = function(option) {
			vex.dialog.confirm({
			  message: 'Are you sure?',
			  callback: function(accept) {
				if(accept){
					$scope.product.attributes.splice($scope.product.attributes.indexOf(option), 1);
					$scope.$apply();
				}
			}});
		};
	});

	productApp.controller('LoginController', function ($scope, $http, $location){
		$scope.user = {
			'email' : 'okrolikowski@gmail.com',
			'password' : 'admin'
		};
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

	productApp.controller('LogoutController', function ($location, $templateCache){
		$templateCache.removeAll();
		$location.path('/');
	});
