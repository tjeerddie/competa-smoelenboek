$(document).ready(function () {
  "use strict";

  var $header = $('.header');
  var $main = $('.main');
  var $navigation = $('.navigation');
  var $navigationListItem = $('.navigation__list-item');
  var $navigationImage = $('.navigation__image');
  var $navigationLinkTitle = $('.navigation__link__title');
  var $navigationHamburger = $('.navigation__hamburger');

  $navigationHamburger.on('click', function (e) {
    $header.toggleClass('is-enlarged');
    $main.toggleClass('is-enlarged');
    $navigationHamburger.toggleClass('is-open');
    $navigation.toggleClass('is-ensmalled');
    $navigationListItem.toggleClass('is-ensmalled');
    $navigationImage.toggleClass('is-ensmalled');
    $navigationLinkTitle.toggleClass('is-ensmalled');
    e.preventDefault();
  });
});
