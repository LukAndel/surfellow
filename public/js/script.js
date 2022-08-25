/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

var StickyNavigation = /*#__PURE__*/function () {
  function StickyNavigation() {
    var _this = this;

    _classCallCheck(this, StickyNavigation);

    this.currentId = null;
    this.currentTab = null;
    this.tabContainerHeight = 70;
    var self = this;
    $('.et-hero-tab').click(function () {
      self.onTabClick(event, $(this));
    });
    $(window).scroll(function () {
      _this.onScroll();
    });
    $(window).resize(function () {
      _this.onResize();
    });
  }

  _createClass(StickyNavigation, [{
    key: "onTabClick",
    value: function onTabClick(event, element) {
      event.preventDefault();
      var scrollTop = $(element.attr('href')).offset().top - this.tabContainerHeight + 1;
      $('html, body').animate({
        scrollTop: scrollTop
      }, 600);
    }
  }, {
    key: "onScroll",
    value: function onScroll() {
      this.checkTabContainerPosition();
      this.findCurrentTabSelector();
    }
  }, {
    key: "onResize",
    value: function onResize() {
      if (this.currentId) {
        this.setSliderCss();
      }
    }
  }, {
    key: "checkTabContainerPosition",
    value: function checkTabContainerPosition() {
      var offset = $('.et-hero-tabs').offset().top + $('.et-hero-tabs').height() - this.tabContainerHeight;

      if ($(window).scrollTop() > offset) {
        $('.et-hero-tabs-container').addClass('et-hero-tabs-container--top');
      } else {
        $('.et-hero-tabs-container').removeClass('et-hero-tabs-container--top');
      }
    }
  }, {
    key: "findCurrentTabSelector",
    value: function findCurrentTabSelector(element) {
      var newCurrentId;
      var newCurrentTab;
      var self = this;
      $('.et-hero-tab').each(function () {
        var id = $(this).attr('href');
        var offsetTop = $(id).offset().top - self.tabContainerHeight;
        var offsetBottom = $(id).offset().top + $(id).height() - self.tabContainerHeight;

        if ($(window).scrollTop() > offsetTop && $(window).scrollTop() < offsetBottom) {
          newCurrentId = id;
          newCurrentTab = $(this);
        }
      });

      if (this.currentId != newCurrentId || this.currentId === null) {
        this.currentId = newCurrentId;
        this.currentTab = newCurrentTab;
        this.setSliderCss();
      }
    }
  }, {
    key: "setSliderCss",
    value: function setSliderCss() {
      var width = 0;
      var left = 0;

      if (this.currentTab) {
        width = this.currentTab.css('width');
        left = this.currentTab.offset().left;
      }

      $('.et-hero-tab-slider').css('width', width);
      $('.et-hero-tab-slider').css('left', left);
    }
  }]);

  return StickyNavigation;
}();

new StickyNavigation();
/******/ })()
;
//# sourceMappingURL=script.js.map