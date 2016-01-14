$(function(){
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
  var querystring = window.location.querystring;
  var caseId = getUrlParameter('case_id');
  var caseName = getUrlParameter("case_title");

  $.getJSON('data_access/pull_case.php?id='+caseId, function(data) {
    console.log(data);
    $('.case_header_image').html("<img src='"+data.cover+"'>")
    $('.case_header_title h1').html(data.client);

    $('.case_header_title .campaign').html(data.campaign);
    $('.case_header_title .date').html(data.date);

    $('.objective').html(data.objective);
    $('.challenges').html(data.challenges);
    $('.execution').html(data.execution);
  });
});
