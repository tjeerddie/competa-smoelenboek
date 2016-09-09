$(document).ready(function () {
  "use strict";

  var $search = $('.form__control--search');
  var rows = $('.grid__row');
  var href = window.location.href.split("/");
  href = href[href.length-1].split("&")[0];
  $search.on('input', function (e) {
    e.preventDefault();
    rows.empty();
    $.ajax({url: href+"&action=search&name="+$search[0].value, success: function(result){
      rows.append(result);
    }});
  });
});
