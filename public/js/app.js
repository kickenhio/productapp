var $routeProviderReference;
var scorpicoreApp = angular.module('countryApp', ['ngRoute']);
	scorpicoreApp.config(function($routeProvider) {
		$routeProviderReference = $routeProvider;
		$routeProvider. 
		   when('/', {
			 templateUrl: '/aktualnosci/angular.html',
			 controller: 'WelcomeController'
		   }).
		   otherwise({
			 redirectTo: '/'
		   });
	});

	scorpicoreApp.run(['$route', '$http', '$rootScope',
		function ($route, $http, $rootScope) {
		
		$http.get("/allroutes.json").success(function (data) {
			angular.forEach(data, function(value, key) {
				$routeProviderReference.when(key, {
					templateUrl: key,
					controller: value
				});
			});
		});
			
		$route.reload();
	}]);

scorpicoreApp.run(['$route', '$http', '$rootScope',
	function ($route, $http, $rootScope) {
		console.log($route);
}]);

scorpicoreApp.controller('WelcomeController', function ($scope){
	
});

scorpicoreApp.controller('NewsController', function ($scope){
	
});