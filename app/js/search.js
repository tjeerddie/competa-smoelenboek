$(document).ready(function () {
  "use strict";

  var $search = $('.form__control--search');
  $search.on('input', function (e) {
    e.preventDefault();
    $.ajax({url: "?control=Visitor&action=employees&name=boop", success: function(result){
       console.log(result);
       console.log("done");
    }});
  });
});
