$(document).ready(function () {
  "use strict";

  var $search = $('.form__control--search');
  var rows = $('.grid__row');
  $search.on('input', function (e) {
    e.preventDefault();
    rows.empty();
    $.ajax({url: "?control=Visitor&action=search&name="+$search[0].value, success: function(result){
      rows.append(result);
    }});
  });
});
