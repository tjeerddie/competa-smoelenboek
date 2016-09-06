$(document).ready(function () {
  "use strict";

  var $main = $('.main');
  var $navigation = $('.navigation');
  var $navigationListItem = $('.navigation__list-item');
  var $navigationImage = $('.navigation__image');
  var $navigationLinkTitle = $('.navigation__link__title');
  var $navigationHamburger = $('.navigation__hamburger');

  $navigationHamburger.on('click', function (e) {
    $navigationHamburger.toggleClass('is-open');
    $navigation.toggleClass('is-ensmalled');
    $navigationListItem.toggleClass('is-ensmalled');
    $main.toggleClass('is-enlarged');
    $navigationImage.toggleClass('is-ensmalled');
    $navigationLinkTitle.toggleClass('is-ensmalled');
    e.preventDefault();
  });
});
