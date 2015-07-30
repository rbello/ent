<!DOCTYPE html>
<html lang="en" ng-app="StarterApp" class="StarterApp">
<head>
    <title>title</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Angular Material -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/angular_material/0.9.4/angular-material.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body ng-controller="AppCtrl" layout="column" layout-fill>

<md-toolbar md-scroll-shrink>
  <div class="md-toolbar-tools">
    <h3><span>Gestion des stages</span></h3>
    <span flex=""></span>
    <!--<md-button class="md-fab md-primary" aria-label="Profile">
      <md-icon md-font-icon="fa-lock" class="fa s32 md-primary md-hue-2"></md-icon>
    </md-button>-->
    <!-- TODO Insert menu here -->
  </div>
</md-toolbar>

<md-card>
  <md-card-content>
    <h1>Stages</h1>
    <?php var_dump($_REQUEST);?>
  </md-card-content>
</md-card>



<div>
  <md-content class="md-padding" layout="column">
    <p>
      You may supply a direction of <code>left</code>, <code>up</code>, <code>down</code>, or
      <code>right</code> through the <code>md-direction</code> attribute.
    </p>
    <div class="lock-size" layout="row" layout-align="center center">
      <md-fab-speed-dial md-open="demo.isOpen" md-direction="{{demo.selectedDirection}}"
                         ng-class="demo.selectedMode">
        <md-fab-trigger>
          <md-button aria-label="menu" class="md-fab md-warn">
            <md-icon md-font-icon="fa-lock" class="fa s32 md-primary md-hue-2"></md-icon>
          </md-button>
        </md-fab-trigger>
        <md-fab-actions>
          <md-button aria-label="twitter" class="md-fab md-raised md-mini">
            <md-icon md-font-icon="fa-lock" class="fa s32 md-primary md-hue-2"></md-icon>
          </md-button>
          <md-button aria-label="facebook" class="md-fab md-raised md-mini">
            <md-icon md-font-icon="fa-lock" class="fa s32 md-primary md-hue-2"></md-icon>
          </md-button>
          <md-button aria-label="Google hangout" class="md-fab md-raised md-mini">
            <md-icon md-font-icon="fa-lock" class="fa s32 md-primary md-hue-2"></md-icon>
          </md-button>
        </md-fab-actions>
      </md-fab-speed-dial>
    </div>
    <div layout="row" layout-align="space-around">
      <div layout="column">
        <b>Direction</b>
        <md-radio-group ng-model="demo.selectedDirection">
          <md-radio-button ng-repeat="direction in demo.availableDirections"
                           ng-value="direction" class="text-capitalize">
            {{direction}}
          </md-radio-button>
        </md-radio-group>
      </div>
      <div layout="column">
        <b>Open/Closed</b>
        <md-radio-group ng-model="demo.isOpen">
          <md-radio-button ng-value="true">Open</md-radio-button>
          <md-radio-button ng-value="false">Closed</md-radio-button>
        </md-radio-group>
      </div>
      <div layout="column">
        <b>Animation Modes</b>
        <md-radio-group ng-model="demo.selectedMode">
          <md-radio-button ng-repeat="mode in demo.availableModes" ng-value="mode">
            {{mode}}
          </md-radio-button>
        </md-radio-group>
      </div>
    </div>
    <p class="note">
      Note that you can also hover over the directive's area or tab through each button to open and
      activate the speed dial menu.
    </p>
  </md-content>
</div>



<!-- Angular Material Dependencies -->
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angular_material/0.9.4/angular-material.min.js"></script>
<!-- Custom -->
<script src="js/ctrl.js"></script>

</body>
</html>