$(document).ready(function () {
  "use strict";

  var $search = $('.form__control--search');
  $search.on('input', function (e) {
    e.preventDefault();
    $('.grid__row').empty();
    $.ajax({url: "?control=Visitor&action=employees&name="+$('.form__control--search')[0].value, success: function(result){
       console.log(result);
        $('.grid__row').append(result);
       console.log("done");
    }});
  });
});
