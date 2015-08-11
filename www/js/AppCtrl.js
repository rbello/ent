app.controller('AppCtrl', function($scope, $timeout, $mdSidenav, $mdUtil, $log, auth, store, $location) {
    
    console.log("Init AppCtrl");
    
    $scope.toggleRight = buildToggler('sidenav');
    
    function buildToggler(navID) {
      var debounceFn =  $mdUtil.debounce(function(){
            $mdSidenav(navID)
              .toggle()
              .then(function () {
                $log.debug("toggle " + navID + " is done");
              });
          },300);
      return debounceFn;
    }
    
    $scope.auth = {
      login: function () {
        auth.signin({}, function (profile, token) {
          // Success callback
          store.set('profile', profile);
          store.set('token', token);
          $location.path('/');
        }, function () {
          // Error callback
        });
      }
    };
    
});