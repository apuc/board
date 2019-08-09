'use strict';

(function ($) {
  $.fn.removeClassWild = function (mask) {
    return this.removeClass(function (index, cls) {
      var re = mask.replace(/\*/g, '\\S+');
      return (cls.match(new RegExp('\\b' + re + '', 'g')) || []).join(' ');
    });
  };
})(jQuery);

$(function () {
  var container = 0;
  var heightMenu = $('.header-nav').height();
  if (document.querySelector('.tab')) {
    var tabs = document.querySelectorAll('.tab');
    for (var i = 0; i < tabs.length; i++) {
      var tab = tabs[i];
      tab.onclick = function () {
        var id = this.dataset.id;
        var target = document.getElementById(id);
        var tabParent = this.closest('.tabs');
        var targetParent = target.closest('.tab-content');
        var tabActive = tabParent.querySelector('.tab-active');
        var targetActive = targetParent.querySelector('.tab-item-active');
        if (this !== tabActive) {
          tabActive.classList.remove('tab-active');
          this.classList.add('tab-active');
        }
        if (target !== targetActive) {
          targetActive.classList.remove('tab-item-active');
          target.classList.add('tab-item-active');
        }
      };
    }
  }
  $('.container').each(function (index, value) {
    if ($(value).css('height') !== '0px') {
      container = $(value);
      return false;
    }
  });
  var containerWidth = parseInt(container.css('width')) - parseInt(container.css('paddingLeft')) - parseInt(container.css('paddingRight'));
  var offsetNormal = container.offset().left + parseInt(container.css('paddingLeft'));
  $(document).on('click', '.js-openModal', function (e) {
    e.preventDefault();
    var href = $(this).data('modal');
    var modal = $(href);
    $('.modal-js').not(modal).fadeOut(300);
    $(modal).fadeIn({
      start: function start() {
        if (!$(this).hasClass('done')) {
          if ($('.single-card__slider', this).length > 0) {
            $('.single-card__slider', this).slick({
              slidesToShow: 5,
              nextArrow: '<button class="single-card__next" style="display: flex; width: 20px"><img style="width: 100%" src="/theme/images/svg/arrow.svg" alt=""></button>',
              prevArrow: '<button class="single-card__prev" style="display: flex; width: 20px"><img style="width: 100%" src="/theme/images/svg/arrow.svg" alt=""></button>',
              responsive: [{
                breakpoint: 1200,
                settings: {
                  slidesToShow: 4
                }
              }, {
                breakpoint: 992,
                settings: {
                  slidesToShow: 5
                }
              }, {
                breakpoint: 768,
                settings: {
                  slidesToShow: 4
                }
              }, {
                breakpoint: 576,
                settings: {
                  slidesToShow: 3
                }
              }, {
                breakpoint: 420,
                settings: {
                  slidesToShow: 2
                }
              }]
            });
            $(this).addClass('done');
          }
        }
      }
    });
    $('.modal__overlay').addClass('modal__overlay-active');
  });

  $(document).on('click', '.js-modalClose', function () {
    $('.modal').fadeOut(300);
    $('.modal__overlay').removeClass('modal__overlay-active');
  });

  $(document).on('click', '.js-modalClose', function () {
    $('.modal').fadeOut(300);
    $('.modal__overlay').removeClass('modal__overlay-active');
  });
  $(document).on('mouseenter', '.js-showCategoryList', function () {
    var drop = $(this).find('.header-nav__dropdown');
    drop.slideDown({
      duration: 0,
      start: function start() {
        $(this).css('display', 'flex');
        if (!$(this).hasClass('done')) {
          if ($(this).offset().left - offsetNormal + $(this).width() > containerWidth - 29) {
            $(this).css({
              left: containerWidth - $(this).width() - 29
            });
          }
          $(this).addClass('done');
        }
      }
    });
    $(this).find('.header-nav__link').addClass('header-nav__link-hover');
    $(this).closest('.header-nav__wrap').css('zIndex', 100);
  });

  $(document).on('mouseleave', '.js-showCategoryList', function () {
    $(this).find('.header-nav__dropdown').slideUp(0);
    $(this).find('.header-nav__link').removeClass('header-nav__link-hover');
    $(this).closest('.header-nav__wrap').css('zIndex', 0);
  });
  if ($('.header-nav__wrap')) {
    $('.header-nav__wrap').on('afterChange', function (event, slick, currentSlide) {
      if (slick.slideCount / currentSlide < 2) {
        slick.$nextArrow.css('display', 'none');
      } else if (currentSlide === 0) {
        slick.$nextArrow.css('display', 'flex');
      }
    }).slick({
      variableWidth: true,
      infinite: false,
      slidesToScroll: 7,
      nextArrow: '<button class="header-nav__next">\n' + '            <svg>\n' + '              <use xlink:href="../images/svg.svg#arrow">\n' + '              </use>\n' + '            </svg>\n' + '          </button>',
      prevArrow: '<button class="header-nav__next rotateCategoryBtn">\n' + '            <svg>\n' + '              <use xlink:href="../images/svg.svg#arrow">\n' + '              </use>\n' + '            </svg>\n' + '          </button>'
    });
    if (document.documentElement.clientWidth < 1200) {
      $('.header-nav__wrap').slick('unslick');
    }
  }
  $(document).on('click', '.js-btn-menu', function () {
    if ($('.nav-mobile__list--active').length > 0) {
      $('.js-nav-mobile').removeClass('nav-mobile__list--active');
      $('.js-menu-close').removeClass('menu__overlay--active');
      $('.js-btn-menu').removeClass('mobile-btn-menu-close');
      $('#overlay').removeClass('nav-mobile__list--active');
    } else {
      $('#main-menu').addClass('nav-mobile__list--active');
      $('#overlay').addClass('nav-mobile__list--active');
      $('.js-menu-close').addClass('menu__overlay--active');
      $('.js-btn-menu').addClass('mobile-btn-menu-close');
    }
  });
  $(document).on('click', '.js-menu-close', function () {
    $('.js-nav-mobile').removeClass('nav-mobile__list--active');
    $('.js-menu-close').removeClass('menu__overlay--active');
    $('.js-btn-menu').removeClass('mobile-btn-menu-close');
  });
  $(document).on('click', '.js-menu-link', function () {
    var list = $(this).data("menulink");
    $(list).addClass('nav-mobile__list--active');
    $(this).closest('.nav-mobile__list').removeClass('nav-mobile__list--active');
  });

  if ($('.js-detail').length > 0) {
    $('.js-detail').css('width', containerWidth + 'px');
    $(document).on('click', '.js-btn-detail', function (e) {
      e.preventDefault();
      var item = $(this).parents('.js-detail-wrap').find('.js-detail');
      $('.js-detail').not(item).slideUp();
      if (!item.hasClass('done')) {
        item.slideToggle({
          start: function start() {
            var thisOffset = $(this).offset().left - offsetNormal;
            var marginLeft = thisOffset * -1 + 'px';
            var parentWidth = parseInt($(this).parents('.js-detail-wrap').css('width'));
            $(this).css('marginLeft', marginLeft);
            $(this).addClass('done');
            $('.single-card__detail-tr', this).css('left', thisOffset + parentWidth / 2 - 12 + 'px');
            if ($('.single-card__slider', this).length > 0) {
              $('.single-card__slider', this).slick({
                slidesToShow: 5,
                nextArrow: '<button class="single-card__next">\n' + '            <svg>\n' + '              <use xlink:href="../images/svg.svg#arrow">\n' + '              </use>\n' + '            </svg>\n' + '          </button>',
                prevArrow: '<button class="single-card__prev">\n' + '            <svg>\n' + '              <use xlink:href="../images/svg.svg#arrow">\n' + '              </use>\n' + '            </svg>\n' + '          </button>',
                responsive: [{
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 4
                  }
                }, {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 5
                  }
                }, {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 4
                  }
                }, {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 3
                  }
                }, {
                  breakpoint: 420,
                  settings: {
                    slidesToShow: 2
                  }
                }]
              });
            }
          },
          done: function done() {
            var top = item.offset().top - 100;
            $("HTML, BODY").animate({ scrollTop: top }, 1000);
          }
        });
      } else {
        item.slideToggle({
          done: function done() {
            if (item.is(':visible')) {
              var top = item.offset().top - 100;
              $("HTML, BODY").animate({ scrollTop: top }, 1000);
            }
          }
        });
      }
    });
  }

  if ($('.js-detail-close').length > 0) {
    $(document).on('click', '.js-detail-close', function () {
      $(this).parents('.js-detail').slideUp();
    });
  }
  $(document).on('click', '.gifer-play-button', function () {
    $('.gifffer-play-button').trigger('click');
  });

  if ($('.gif').length > 0) {
    Gifffer();
  }

  $(document).on('click', '.gifffer-play-button', function (e) {
    $('.gif').each(function (index, value) {
      if ($(value).children(this)) {
        $(value).parents('.single-card__top').find('.single-card__overlay').addClass('event-none');
      }
    });
  });

  $(document).on('click', function (e) {
    if (!e.target.classList.contains('gifffer-play-button') && e.target.closest('.gifffer-play-button') === null) {
      $('.gif canvas').parents('.single-card__top').find('.single-card__overlay').removeClass('event-none');
    }
  });

  $(document).on('click', '.js-search-open', function () {
    $('.js-mobile-search').addClass('mobile-search-active');
  });

  $(document).on('click', '.js-search-close', function () {
    $('.js-mobile-search').removeClass('mobile-search-active');
  });

  if ($('.single-adv__slider-main').length > 0) {
    $('.single-adv__slider-main').slick({
      arrows: false,
      asNavFor: '.single-adv__slider-second',
      fade: true,
      responsive: [{
        breakpoint: 576,
        settings: {
          dots: true
        }
      }]
    });
  }
  if ($('.single-adv__slider-second').length > 0) {
    $('.single-adv__slider-second').slick({
      arrows: false,
      asNavFor: '.single-adv__slider-main',
      slidesToShow: 3,
      focusOnSelect: true,
      vertical: true,
      verticalSwiping: true,
      responsive: [{
        breakpoint: 576,
        settings: {
          variableWidth: true,
          vertical: false,
          verticalSwiping: false
        }
      }]
    });
  }

  $(".fancybox").fancybox({
    thumbs: false
  });

  if ($('.js-btn-category.header__category-none').length > 0) {
    $(document).scroll(function () {
      if ($(document).scrollTop() > heightMenu) {
        $('.js-btn-category').removeClass('header__category-none');
      } else {
        $('.js-btn-category').addClass('header__category-none');
        $('.nav-open').slideUp();
      }
    });
  }

  $(document).on('click', '.js-btn-category', function () {
    $('.nav-open').slideToggle();
    $('.jsCategoryClose').toggleClass('active-category-close');
    $('.nav-open-js').first().addClass('active-category');
    let firstCategory = $('.nav-open-js').first().attr('href');
    $('.nav-open__detail').not(firstCategory).addClass('d-none');
    $(firstCategory).removeClass('d-none');
  });

  $(document).click(function (e) {
    // событие клика по веб-документу
    var menu = $('.js-btn-category'); // тут указываем ID элемента
    var menuBlock = $('.nav-open');
    if (!menu.is(e.target) // если клик был не по нашему блоку
    && menu.has(e.target).length === 0 && !menuBlock.is(e.target) && menuBlock.has(e.target).length === 0) {
      // и не по его дочерним элементам
      $('.nav-open').slideUp(); // скрываем его
      $('.jsCategoryClose').removeClass('active-category-close');
    }
  });

  $('.nav-open-js').hover(function () {
    $('.nav-open-js').first().removeClass('active-category');
    var item = $($(this).attr('href'));
    $('.nav-open__detail').not(item).addClass('d-none');
    $(item).removeClass('d-none');
  }, function () {});
  if ($('.select2-js').length > 0) {
    var flag = true;
    $.each($('.select2-js'), function (index, value) {
      var placeholder = value.dataset.placeholder;
      $(value).on('select2:select', function (e) {
        // $('.select2-results__options').scrollbar().parent().addClass('scrollbar-inner');
        // $('.select2-dropdown').addClass('select2-dropdown-open');
      }).select2({
        placeholder: placeholder
      });
      $(value).on('select2:open', function (e) {
        $('.select2-results__options').scrollbar().parent().addClass('scrollbar-inner');
        $('.select2-dropdown').removeClass('select2-dropdown-close');
        $('.select2-dropdown').addClass('select2-dropdown-open');
      });
      $(value).on('select2:closing', function (e) {
        if (flag) {
          $('.select2-dropdown').removeClass('select2-dropdown-open');
          $('.select2-dropdown').addClass('select2-dropdown-close');
          flag = false;
          e.preventDefault();
          setTimeout(function () {
            $('.select2-js').select2('close');
          }, 400);
        } else {
          flag = true;
        }
      });
    });
  }

  if (window.innerWidth < 993) {
    $('.jsSort').click(function () {
      $('.jsShowSort').fadeIn();
      $('body').addClass('body-overflow');
    });

    $('.jsCloseSort').click(function () {
      $('.jsShowSort').fadeOut();
      $('body').removeClass('body-overflow');
    });
  }

  $('.jsActivePrivateDealers').click(function () {
    $('.jsActivePrivateDealers').removeClass('active-private-dealers');
    $(this).addClass('active-private-dealers');
  });

  $('.jsFilter').click(function () {
    $('.jsMobileFilter').fadeIn(100);
    $('body').addClass('body-overflow');
  });

  $('.jsCloseFilter').click(function () {
    $('.jsMobileFilter').fadeOut(100);
    $('body').removeClass('body-overflow');
  });

  $(document).on('click' ,'.jsShowFilterOpen',function () {
    $(this).next().fadeIn(100);
    $('.jsMobileFilter').css({ 'overflow-y': 'hidden' });
  });

  $(document).on('click' ,'.jsCloseFilterAll', function () {
    $('.jsHideFilterOpen').fadeOut(100);
    $('.jsMobileFilter').css({ 'overflow-y': 'scroll' });
  });

  // filter mobile


  $(document).on('click', '.jsShowFlag', function (e) {

    var attrFilterText = e.target.innerText;
    var htmlFilter = void 0;
    var attrFilter = void 0;
    var findHtmlBlock = void 0;
    attrFilter = $(this).closest('.jsSearchFlag').attr('data-flag');
    var flagClass = 'flag-' + attrFilter;
    $(this).closest('.jsSearchFlag').children('.jsShowFlag').removeClass('selected-filter').removeClass(flagClass);
    htmlFilter = $(this).html();
    $(this).addClass('selected-filter').addClass(flagClass);
    var attrSetHtml = document.querySelectorAll('.jsShowFilterOpen');
    for (var _i = 0; _i < attrSetHtml.length; _i++) {
      findHtmlBlock = attrSetHtml[_i].getAttribute('data-sethtml');
      if (attrFilter === findHtmlBlock) {
        $(attrSetHtml[_i]).children('.jsSetFlag').text(attrFilterText);
      }
    }
    $('.jsHideFilterOpen').fadeOut(100);
    var filled = $('.jsShowFilterOpen').next().children('.jsSearchFlag').children('.jsShowFlag');
    var list = $('.selected-filter').closest('.jsSearchFlag').closest('.jsHideFilterOpen').prev();
    if (filled.hasClass('selected-filter')) {
      $(list).addClass('filled-filter');
    }
  });

  // filter mobile price on load page
  $(document).ready(function(){

    var fronPrice = $('.jsFromPrice').val();
    var toPrice = $('.jsToPrice').val();

    if(fronPrice !== '' || toPrice !== ''){
      $('.jsSetPrice').html('От ' + fronPrice + ' до ' + toPrice + ' руб');
    }

    if($.cookie('mobile-main-cat')){

      let mainCatID = $.cookie('mobile-main-cat');
      $('#parentCategoryMobile').val(mainCatID);

      let mainCatName = $(`.parentCategoryMobile[data-id=${mainCatID}]`).text();

      if(mainCatName !== ''){
        $('#main-cat-name').text(mainCatName);

        $.ajax({
          url: '/filter/get-sub-categories',
          type: 'POST',
          data: {id: mainCatID},
          success: function (data) {
            $('.children-select-section').empty().append(data);
          }
        });

      }//if name is not empty

    }//if mainCatID is in cookie

  });

  $('.jsGetPrice').click(function (e) {

    e.preventDefault();

    var fronPrice = $('.jsFromPrice').val();
    var toPrice = $('.jsToPrice').val();

    $('.jsSetPrice').html('От ' + fronPrice + ' до ' + toPrice + ' руб');
    var listPrice = $('.jsSearchPrice').closest('.jsHideFilterOpen').prev();
    $(listPrice).addClass('filled-filter');
    $('.jsHideFilterOpen').fadeOut(100);
  });

  $('.jsShowAllProducts').click(function () {
    $('.jsMobileFilter').fadeOut(100);
    $('body').removeClass('body-overflow');
  });


  //reset mobile filter
  $('.jsResetFilter').click(function () {
    var defaultFilter = ['Все', 'Все', 'Любой', 'Любая', 'Любой'];
    $('.jsSetFlag').each(function (i, item) {

      $(this).html(defaultFilter[i]);

      // $('.children-select-section').empty();
      // $('.parentCategoryMobile').val('');
      $.removeCookie('mobile-main-cat');
      window.location.search = '';

      // $('.jsFromPrice').val(null);
      // $('.jsToPrice').val(null);
    });
    $('.jsSetPrice').html('Любая');
    $('.jsShowFilterOpen').removeClass('filled-filter');
    $('.jsShowFlag').removeClass('selected-filter');
    $('.jsShowFlag').removeClassWild("flag-*");
  });

  if ($('#sidebar-filter-pc').length > 0 && window.innerWidth > 993) {
    var stickySidebar = new StickySidebar('#sidebar-filter-pc', {
      topSpacing: 100,
      bottomSpacing: 20,
      containerSelector: '.category-block',
      innerWrapperSelector: '.sidebar-inner'
    });
  }

  if ($('#singleAdd').length > 0 && window.innerWidth > 993) {
    var stickySidebar = new StickySidebar('#singleAdd', {
      topSpacing: 100,
      bottomSpacing: 20,
      containerSelector: '.single-adv__wrap',
      innerWrapperSelector: '.sidebar-inner'
    });
  }

  if (window.innerWidth < 1200 && window.innerWidth > 993) {
    $('.jsStickyFilter .sidebar-inner').addClass('active-sidebar-filter');
  }

  $(window).resize(function () {
    if (window.innerWidth < 1200 && window.innerWidth > 993) {
      $('.jsStickyFilter .sidebar-inner').addClass('active-sidebar-filter');
    } else {
      $('.jsStickyFilter .sidebar-inner').removeClass('active-sidebar-filter');
    }
  });

  $(document).scroll(function () {
    if ($('.jsStickyFilter').hasClass('is-affixed')) {
      $('.jsStickyFilter .sidebar-inner').addClass('active-sidebar-filter');
    } else {
      $('.jsStickyFilter .sidebar-inner').removeClass('active-sidebar-filter');
    }
  });

  // if (window.innerWidth < 993) {
  if ($('.sidebar-filter').length > 0) {
    var body = $('.body');
    var filter = $('.sidebar-filter');
    var position = filter.offset().top;
    var mypos = $(window).scrollTop();
    $(document).scroll(function () {
      var block_position = filter.offset().top; // расположение блока, от которого и зависит фиксированность хэдера
      if (window.scrollY + 60 < position) {
        // если позиция скролла страницы больше, то ставим фикс
        filter.removeClass('filter-fixed');
      } else if (window.scrollY + 60 >= block_position) {
        filter.addClass('filter-fixed');
      }
      if (window.scrollY > 200 && window.scrollY > mypos) {
        $('.filter-fixed').css({ 'top': '0' });
      } else if (window.scrollY < 200) {
        $('.filter-fixed').css({ 'top': '0' });
      } else {
        $('.filter-fixed').css({ 'top': '60px' });
      }
      mypos = $(window).scrollTop();
    });
  }

  $('.jsOpenDropdown').mouseenter(function () {
    $('.jsShowDropdown').fadeIn().css('display', 'flex');
  });

  $('.jsBlockDropdown').mouseleave(function (e) {
    if (!$('.jsShowDropdown').is(e.target) || !$('.jsOpenDropdown').is(e.target)) {
      $('.jsShowDropdown').fadeOut();
    }
  });
















});

document.addEventListener("DOMContentLoaded", function () {
  var width = window.innerWidth > 0 ? window.innerWidth : screen.width;
  var cols = 4;
  var gapRight = 24;
  var gapBottom = 40;
  if (width < 1200) {
    cols = 3;
  }
  if (width < 992) {
    var _cols = 3;
    gapRight = 20;
    gapBottom = 20;
  }
  if (width < 576) {
    cols = 2;
  }
  if ($('.masonry').length > 0) {
    $cg('.masonry').masonry({
      cols: cols,
      template: TEMPLATE_FIXED_SIZE,
      width: 'auto',
      height: 'auto',
      columnGapBottom: gapBottom,
      columnGapRight: gapRight
    });
  }
});
//# sourceMappingURL=script.js.map




$(document).ready(function () {

  //ПОКАЗАТЬ НОМЕР ТЕЛЕФОНА
  $(document).on('click', '.showPhone', function () {
    //alert(123);
    var obj = $(this);
    var id = $(this).data('id');
    obj.removeClass('showPhone');
    $.ajax({
      type: 'POST',
      url: "/site/show_phone",
      data: {id:id, _csrf: yii.getCsrfToken()},
      success: function (data) {
        obj.html(data);
      }
    });

    return false;
  });

  $(document).on('keyup', '#citySearch', function(e) {
    var text = $(this).val();
    $.ajax({
      type: 'POST',
      url: "/site/get-city",
      data: {text: text, _csrf: yii.getCsrfToken()},
      success: function (data) {
        // console.log(data);
        $('#cityList').html(data);
      }
    });
  });

  //Подгрузка объявлений
  $(document).on('click', '#load-c', function () {
    let page = $(this).attr('data-page');
    // console.log(page);
    $.ajax({
      type: 'GET',
      url: "/mainpage/mainpage/load-cards",
      data: {p:page},
      success: (data) =>  {
        if(data) {
          // console.log(data);
          $('.cards').append(data);
          $cg('.masonry').masonry().reInit();
          $(this).attr('data-page', Number(page) + 1);
        }else{
          $(this).css('pointer-events', 'none');
        }
      }
    });

    return false;
  });

  //Добавление в Favourites
  $(document).on('click', '.add-in-fav',function (e) {

    let gistId = $(this).data('gistid');
    //Если не пользователь не авторизован
    if(gistId === -1){
      $('a[data-modal="#modalEnter"]').click();
      return false;
    }

    let itemType = $(this).data('gist');
    let url = '';

    if($(this).hasClass('in-fav')){
      $(this).removeClass('in-fav');
      $(this).children('i').removeClass('fa-heart');
      $(this).children('i').addClass('fa-heart-o');
      url = '/favorites/default/del_favorites';
    }else{
      $(this).addClass('in-fav');
      $(this).children('i').removeClass('fa-heart-o');
      $(this).children('i').addClass('fa-heart');
      url = '/favorites/default/add_favorites';
    }

    $.ajax({
      url: url,
      type: 'POST',
      data: {gist:itemType,gistId:gistId,_csrf: yii.getCsrfToken()},
      success: function (data) {

      }//success
    });
  });

  //Выбор radio button порядка сортировки
  $(document).on('change', '.filter-order__radio', function (e) {
    let type =  e.target.value;
    $.cookie('sortTypeRadio', type);
    $('[name=sortTypeRadio]').val(type);
  });


  //Отправка формы поиска
  $(document).on('click', '#send-filter', function (e) {
    e.preventDefault();

    if(window.innerWidth > 991) {
      let searchTextInput = $('#global-search').val();
      $('[name=textFilter]').val(searchTextInput);
      let mainCat = $('#main_select').val();
      $('input[name=mainCat]').val(mainCat);

      $('#filterForm').submit();
    }else{

      let mobileSearchInputString = $('#mobile-global-search').val();
      $('#mobile-text-search').val(mobileSearchInputString);

      if($.cookie('mobile-main-cat')){
        $('#parentCategoryMobile').val($.cookie('mobile-main-cat'));
      }

      $('#filterMobileForm').submit();
    }

    // return false;
  });

  //Выбор категорий для мобильного фильтра
  $(document).on('click', '.parentCategoryMobile', function (e) {

    let mainCatID = e.target.dataset.id;
    $('#parentCategoryMobile').val(mainCatID);
    $.cookie('mobile-main-cat', mainCatID);

    $.ajax({
      url: '/filter/get-sub-categories',
      type: 'POST',
      data: {id: mainCatID},
      success: function (data) {
          $('.children-select-section').empty().append(data);
      }
    });

  });
  $(document).on('click', '.childrenCategoryMobile', function (e) {

    let categoryId = e.target.dataset.id;

    $.ajax({
      url: '/filter/get-sub-categories',
      type: 'POST',
      data: {id: categoryId},
      success: function (data) {
        $('.children-select-section').append(data);
      }
    });

    $('.children-select-section input').last().val(e.target.dataset.id);
  });

  //------------------------------------GIF PLAYBACK--------------------------------------

  let thumbName = '/img/video-play.jpg';

  $('img').each(function () {
    let src = $(this).attr('src');
    if(src.includes('.gif')){
      $(this).data('gif_src', src);
      $(this).attr('src', thumbName);
      $(this).hover(
          function(){
            $(this).attr('src', src);
          },
          function () {
            $(this).attr('src', thumbName)
          }
      );//hover
    }

  });

  $('.single-card__top').each(function () {
    let bg = $(this).find('.bg-img');
    if($(bg).attr('src').includes(thumbName)){
      $(this).hover(
          function() {
              $(bg).attr('src', $(bg).data('gif_src'));
          },
          function () {
            $(bg).attr('src', thumbName);
          }
      );//hover
    }//if
  });

});
