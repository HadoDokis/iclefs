/**
 * Each section of the site has its own module. It probably also has
 * submodules, though this boilerplate is too simple to demonstrate it. Within
 * `src/app/home`, however, could exist several additional folders representing
 * additional modules that would then be listed as dependencies of this one.
 * For example, a `note` section could have the submodules `note.create`,
 * `note.delete`, `note.edit`, etc.
 *
 * Regardless, so long as dependencies are managed correctly, the build process
 * will automatically take take of the rest.
 *
 * The dependencies block here is also where component dependencies should be
 * specified, as shown below.
 */
angular.module( 'iClefs.form', [
  'ui.router'
])

/**
 * Each section or module of the site can also have its own routes. AngularJS
 * will handle ensuring they are all available at run-time, but splitting it
 * this way makes each module more "self-contained".
 */
.config(function config( $stateProvider ) {
  $stateProvider.state( 'form', {
    url: '/form',
    views: {
      "main": {
        controller: 'FormCtrl',
        templateUrl: 'form/form.tpl.html'
      }
    },
    data:{ pageTitle: 'Création de formulaire' }
  });
})

/**
 * And of course we define a controller for our route.
 */
.controller( 'FormCtrl', function FormController( $scope, $http, $location, $sce ) {

      var context = $location.absUrl().substr(0, $location.absUrl().lastIndexOf("#"));
      $scope.formSent = false;
      $scope.formBack = false;
      $scope.btnUrl = "";

      $scope.formulaire = {
        name: "",
        description: "",
        email: "",
        urlCallback: document.referrer || (context + "#/valid")
      };

      $scope.filterData = "";

      $scope.selectedData = {};

      var initCtrl = function() {
        $http.get(context + 'listData.php').then(function(response) {
          $scope.dataAvailable = response.data;
        });
      };

      initCtrl();

      $scope.hasKey = function(obj, data) {
        return obj[data];
      };

      $scope.isEmpty = function(obj) {
        return angular.equals({}, obj);
      };

      $scope.removeData = function(fdId, dataId) {
          if($scope.isDataSelectedWithFd(fdId, dataId)) {
              $scope.selectedData[fdId].splice($scope.selectedData[fdId].indexOf(dataId), 1);
              if ($scope.selectedData[fdId].length === 0) {
                  delete $scope.selectedData[fdId];
              }
          }
      };

      $scope.selectFd = function(data) {
        $scope.selectedFd = data;
      };

      $scope.isDataSelectedWithFd = function(fdId, key) {
          return $scope.selectedData[fdId] && $scope.selectedData[fdId].indexOf(key) != -1;
      };

      $scope.isDataSelected = function(data) {
        return $scope.selectedData[$scope.selectedFd.fd_id] && $scope.selectedData[$scope.selectedFd.fd_id].indexOf(data) != -1;
      };

      $scope.selectData = function(data) {
        if(!$scope.isDataSelected(data)) {
          if(!$scope.selectedData[$scope.selectedFd.fd_id]) {
            $scope.selectedData[$scope.selectedFd.fd_id] = [];
          }
          $scope.selectedData[$scope.selectedFd.fd_id].push(data);
        } else {
          $scope.selectedData[$scope.selectedFd.fd_id].splice($scope.selectedData[$scope.selectedFd.fd_id].indexOf(data), 1);
          if($scope.selectedData[$scope.selectedFd.fd_id].length === 0) {
            delete $scope.selectedData[$scope.selectedFd.fd_id];
          }
        }
      };

      $scope.postData = function() {
        $scope.formSent = true;
        $scope.formulaire.data = $scope.selectedData;
        $http.post(context + 'createButton.php', $scope.formulaire).success(function(data) {
          $scope.buttonCreated = data;
          $scope.formBack = true;
        }).error(function(data) {
          $scope.buttonCreated = data;
          $scope.formBack = true;
        });
      };

      $scope.generateButtonCode = function(addHref) {
          return $sce.trustAsHtml('<a target="_blank" '+(addHref ? 'href="'+$scope.buttonCreated.response.url_btn+'" ' : ' ') +
          'style="padding: 6px 10px; color:black; text-decoration: none; border: 1px solid lightgray; font-size:14px;" ' +
          'onmouseover="this.style.background=\'rgba(0, 0, 255, 0.06)\';this.style.cursor=\'pointer\';" ' +
          'onmouseout="this.style.background=\'\';">' +
          '<img style="width:35px; vertical-align: middle;" src="https://iclefs.test.adullact.org/assets/logo-short.png">' +
          $scope.formulaire.name +
          '</a>');
      };
})

;

