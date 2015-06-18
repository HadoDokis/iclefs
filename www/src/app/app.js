angular.module( 'iClefs', [
  'templates-app',
  'templates-common',
  'iClefs.form',
  'iClefs.about',
  'ui.router',
  'monospaced.qrcode'
])

.config( function myAppConfig ( $stateProvider, $urlRouterProvider ) {
  $urlRouterProvider.otherwise( '/form' );
})

.run( function run () {
})

.controller( 'AppCtrl', function AppCtrl ( $scope, $location ) {
  $scope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams){
    if ( angular.isDefined( toState.data.pageTitle ) ) {
      $scope.pageTitle = toState.data.pageTitle + ' | iClefs';
    }
  });
})

;

