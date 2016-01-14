(function(){
  var app = angular.module("casestudy",[]);
  app.controller('caseController', ['$scope','$templateRequest', '$sce', '$compile', function($scope,$templateRequest, $sce, $compile) {

    $scope.add_case = function(){

      var client = $("#client").val();
      var campaign = $("#campaign").val();
      var time = $("#time").val();

      $.ajax({
        method: "POST",
        url: "data_access/add_case.php",
        data: { client: client, campaign: campaign,time:time }
      })
      .done(function( msg ) {
        if(msg == "succeed"){
          updateCases();
        }else
        {
            alert(msg);
        }

      });
    }

    $scope.save =function(){

      var id = $scope.current.id;
      var cover = $("#cover_input").val();
      var client = $("#client_input").val();
      var campaign = $("#campaign_input").val();
      var time = $("#date_input").val();
      var objective = $("#objective_input").val();
      var challenges = $("#challenges_input").val();
      var execution = $("#execution_input").val();
      $.ajax({
        method: "POST",
        url: "data_access/save_case.php",
        data: { id:id, cover:cover, client: client, campaign: campaign,time:time, objective:objective, challenges:challenges, execution:execution}
      })
      .done(function( msg ) {
        if(msg == "succeed"){
          alert("succeed");
        }else
        {
            alert(msg);
        }

      });
    }

    $scope.select_case = function(id){
      for(var i=0; i<$scope.cases.length;i++){
        if(id==$scope.cases[i].id){
          $scope.current=$scope.cases[i];
        }
      }

      var templateUrl = $sce.getTrustedResourceUrl('nameOfTemplate.html');

    $templateRequest("template/content.html").then(function(template) {
        // template is the HTML template as a string

        // Let's put it into an HTML element and parse any directives and expressions
        // in the code. (Note: This is just an example, modifying the DOM from within
        // a controller is considered bad style.)
        $compile($(".right_area").html(template).contents())($scope);
    }, function() {
        // An error has occurred here
    });

    }

  function updateCases(){
    $.getJSON('data_access/pull_case_all.php', function(data) {
      console.log(data);
      $scope.cases = data;
      $scope.$digest();

    });
  }

  updateCases();

}]);

})();
