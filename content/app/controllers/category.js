var URL = "http://localhost/group1/content/";

var app = angular.module('category', ['ngRoute']);
app.controller('categoryController', function($scope,$http){
    $scope.category = [];
    category();
    function category() {
        $http({
            url: URL + "api/interview/category.php",
            method: 'GET'
          }).then(function(res){
            $scope.category = res.data.category;
            console.log($scope.category);
          });
    }
})