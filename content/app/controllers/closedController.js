
app.controller('closedController', function($scope,$http){
    $scope.closedauction = [];
    closedauction();
    function closedauction() {
        $http({
            url: URL + "api/interview/closedauction.php",
            method: 'GET'
          }).then(function(res){
            $scope.closedauction = res.data.closedauction;
          });
    }
})