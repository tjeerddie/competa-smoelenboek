$(document).ready(function () {
  "use strict";

  var $main = $('.main');
  var $navigation = $('.navigation');
  var $navigationList = $('.navigation__list');
  var $navigationImage = $('.navigation__image');
  var $navigationLink = $('.navigation__link');
  var $navigationHamburger = $('.navigation__hamburger');

  $navigationHamburger.on('click', function (e) {
    // $navigationHamburger.toggleClass('is-active');
    $navigation.toggleClass('is-ensmalled');
    $navigationList.toggleClass('is-ensmalled');
    $main.toggleClass('is-enlarged');
    $navigationImage.toggleClass('is-ensmalled');
    $navigationLink.toggleClass('is-ensmalled');
    e.preventDefault();
  });
});
