
var app = angular.module('EntClientApp', ['ngMaterial', 'angular-storage', 'auth0', 'angular-jwt']);

(function() {
    
    console.log("Go");

    app.controller('MenuCtrl', function($scope) {
        console.log("Init MenuCtrl");
        /*$scope.demo = {
          selectedMode: 'md-scale',
          isOpen: false,
          selectedDirection: 'down'
        };*/
    });
    
    app.controller('SideNavCtrl', function ($scope, $timeout, $mdSidenav, $log) {
        console.log("Init MenuCtrl");
      });
      
  app.controller('VisiteTuteurView', function ($scope, $timeout, $mdSidenav, $log) {
    
    var sessionStages = {
      title:    "RILA 2014",
      code:     "TL4X4204",
      begin:    new Date('2014-10-19'), // YYYY-MM-DD
      end:      new Date('2016-10-21'),
      visites:  [4, 5, 6, 7, 8, 13, 14, 15, 16, 17, 18, 19],
      axePeda:  [
        {name: "Gestion de projet", color: "orange", periodes: {
          6: "Theorie",
          7: "Planning"
        }},
        {name: "Programmation", color: "blue", periodes: {
          1: "Java",
          2: "POO"
        }},
        {name: "Projets", color: "green", sequences: [
          {name: "Java", periodes: {
            5: "",
            6: "",
            7: "",
            8: "Soutenance"
          }},
          {name: "Web", periodes: {
            5: "",
            6: "",
            7: "",
            8: "Soutenance"
          }},
          {name: "C#", periodes: {
            5: "",
            6: "",
            7: "",
            8: "Soutenance"
          }},
          {name: "Fil Rouge", periodes: {
            5: "",
            6: "",
            7: "",
            8: "Soutenance"
          }}
        ]}
      ],
      lat:      "43.599208",
      lng:      "1.440394"
    }
    
    var periodes = getSessionPeriodes(sessionStages.begin, sessionStages.end);
    
    var stagePeriodes = (function() {
        var r =  [], i = 0, now = new Date();
        for (var title in periodes) {
          var date = periodes[title];
          var classes = "";
          if (now.getFullYear() == date.getFullYear() && now.getMonth()+1 == date.getMonth()) classes = "today";
          else if (sessionStages.visites.indexOf(i) != -1) classes = "mark";
          r.push({title: title, classes: classes});
          i++;
        }
        return r;
      })();
      
    var axesPeriodes = (function() {
        var r =  [], i = 0, now = new Date();
        for (var title in periodes) {
          var date = periodes[title];
          var classes = "";
          if (now.getFullYear() == date.getFullYear() && now.getMonth()+1 == date.getMonth()) classes = "today";
          else if (sessionStages.visites.indexOf(i) != -1) classes = "mark";
          r.push({title: title, classes: classes});
          i++;
        }
        return r;
      })();
    
    $scope.sessionStages = {
      getStagePeriodes: function () { return stagePeriodes; },
      getAxesPeda: function () {
        return sessionStages.axePeda;
      },
      getAxePeriodes: function(axe) {
        if (axe.tmp) return axe.tmp;
        var r = [];
        for (var periode in axe.periodes) {
          var name = axe.periodes[periode];
          r.push({title: name});
        }
        axe.tmp = r;
        return r;
      }
    };
    
    angular.extend($scope.sessionStages, sessionStages);
    
  });

})();