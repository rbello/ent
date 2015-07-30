(function() {
    'use strict';
    console.log("Go");

    var app = angular.module('StarterApp', ['ngMaterial']);
    
    app.controller('AppCtrl', function($scope) {
      console.log("AppCtrl");
      $scope.demo = {
        topDirections: ['left', 'up'],
        bottomDirections: ['down', 'right'],
        availableModes: ['md-fling', 'md-scale'],
        availableDirections: ['up', 'down', 'left', 'right'],
        
        selectedMode: 'md-scale',
        isOpen: false,
        selectedDirection: 'down'
      };
    });
    

})();