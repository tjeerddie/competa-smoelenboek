$(document).ready(function () {
  "use strict";

  var $main = $('.main');
  var $navigationImage = $('.navigation__image');
  var $navigation = $('.navigation');
  var $navigationButton = $('.navigation__button');

  $navigationButton.on('click', function (e) {
    $navigationButton.toggleClass('is-active');
    $navigation.toggleClass('is-ensmalled');
    $main.toggleClass('is-enlarged');
    $navigationImage.toggleClass('is-ensmalled');
    e.preventDefault();
  });
});
