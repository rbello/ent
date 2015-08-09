/**
 * @param Date begin
 * @param Date end
 * @return struct[] {title:string,date:Date}
 */
function getSessionPeriodes(begin, end) {
    begin = new Date(begin);
    var names = [];
    names[0] = "Jan";
    names[1] = "Fev";
    names[2] = "Mar";
    names[3] = "Avr";
    names[4] = "Mai";
    names[5] = "Jun";
    names[6] = "Jui";
    names[7] = "Aou";
    names[8] = "Sep";
    names[9] = "Oct";
    names[10] = "Nov";
    names[11] = "Dec";
    var periodes = {};
    while (begin < end) {
      periodes[names[begin.getMonth()] + "-" + begin.getFullYear()] = begin;
      begin = new Date(begin.setMonth(begin.getMonth() + 1));
    }
    return periodes;
}

(function() {
    'use strict';
    console.log("Go");

    var app = angular.module('EntClientApp', ['ngMaterial'/*, 'ngTable'*/]);
    
    app.controller('AppCtrl', function($scope, $timeout, $mdSidenav, $mdUtil, $log) {
        
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
    });
    
    app.controller('MenuCtrl', function($scope) {
        console.log("Init MenuCtrl");
        $scope.demo = {
          selectedMode: 'md-scale',
          isOpen: false,
          selectedDirection: 'down'
        };
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
        var r = [];
        for (var periode in axe.periodes) {
          var name = axe.periodes[periode];
          r.push({title: name});
        }
        return r;
      }
    };
    
    angular.extend($scope.sessionStages, sessionStages);
    
  });

})();