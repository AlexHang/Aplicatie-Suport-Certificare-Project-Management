var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
	  $http.get("../../Back-end/GetFiles/getUserFiles.php")
	  .then(function(response) {
		$scope.UserFiles=response.data;
		console.log($scope.UserFiles);
	  });
});