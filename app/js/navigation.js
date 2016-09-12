$(document).ready(function () {
  "use strict";

  var $header = $('.header');
  var $main = $('.main');
  var $navigation = $('.navigation');
  var $navigationListItem = $('.navigation__list-item');
  var $navigationImage = $('.navigation__image');
  var $navigationLinkTitle = $('.navigation__link__title');
  var $navigationHamburger = $('.navigation__hamburger');

  var add = function () {
    $header.addClass('is-enlarged');
    $main.addClass('is-enlarged');
    $navigationHamburger.addClass('is-open');
    $navigation.addClass('is-ensmalled');
    $navigationListItem.addClass('is-ensmalled');
    $navigationImage.addClass('is-ensmalled');
    $navigationLinkTitle.addClass('is-ensmalled');
  }

  if ($(window).width() <= 544){
    add();
  }

  $(window).resize(function(){
     if ($(window).width() <= 544){
       add();
     } else {
       $header.removeClass('is-enlarged');
       $main.removeClass('is-enlarged');
       $navigationHamburger.removeClass('is-open');
       $navigation.removeClass('is-ensmalled');
       $navigationListItem.removeClass('is-ensmalled');
       $navigationImage.removeClass('is-ensmalled');
       $navigationLinkTitle.removeClass('is-ensmalled');
     }
   });

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
