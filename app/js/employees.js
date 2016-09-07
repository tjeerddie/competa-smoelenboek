$(document).ready(function () {
  "use strict";

  var $next = $('.next-page');
  $next.on('click', function (e) {
    e.preventDefault();
    $.ajax({url: "?page=2", success: function(result){
       console.log("done");
    }});
  });
});
