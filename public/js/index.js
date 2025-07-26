"use strict";
(self["webpackChunkidecide"] = self["webpackChunkidecide"] || []).push([["/js/index"],{

/***/ "./resources/assets/js/global.js":
/*!***************************************!*\
  !*** ./resources/assets/js/global.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   id: () => (/* binding */ id),
/* harmony export */   log: () => (/* binding */ log),
/* harmony export */   qSel: () => (/* binding */ qSel),
/* harmony export */   qSelAll: () => (/* binding */ qSelAll),
/* harmony export */   showError: () => (/* binding */ showError)
/* harmony export */ });
var id = function id(x) {
  return document.getElementById(x);
};
var qSelAll = function qSelAll(x) {
  return document.querySelectorAll(x);
};
var qSel = function qSel(x) {
  return document.querySelector(x);
};
var showError = function showError(e) {
  log(e.message, ' ERROR MESSAGE'); // "null has no properties"
  log(e.name, ' ERROR NAME'); // "TypeError"
  log(e.fileName, ' ERROR FILENAME'); // "Scratchpad/1"
  log(e.lineNumber, ' ERROR LINENUMBER'); // 2

  log(e.stack);
};
var log = function log(x) {
  var describe = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
  return console.log(x, describe);
};

/***/ }),

/***/ "./resources/assets/js/index.js":
/*!**************************************!*\
  !*** ./resources/assets/js/index.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _global__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./global */ "./resources/assets/js/global.js");


// do lazy loading of the app based on the current URL
document.addEventListener('DOMContentLoaded', function () {
  (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('themeSwitch').addEventListener('change', function () {
    document.body.dataset.theme = this.checked ? 'dark' : 'light';

    // SET THE FONT TO WHITE IF THE THEME IS DARK
    document.body.style.color = this.checked ? 'white' : 'black';
  });
  if (window.location.pathname === '/') {
    Promise.all(/*! import() | main */[__webpack_require__.e("/js/vendor"), __webpack_require__.e("main")]).then(__webpack_require__.bind(__webpack_require__, /*! ./main */ "./resources/assets/js/main.js")).then(function (module) {
      return module["default"];
    })["catch"](function (err) {
      return (0,_global__WEBPACK_IMPORTED_MODULE_0__.showError)(err);
    });
  } else if (window.location.pathname === '/result') {
    Promise.all(/*! import() | result */[__webpack_require__.e("/js/vendor"), __webpack_require__.e("result")]).then(__webpack_require__.bind(__webpack_require__, /*! ./result */ "./resources/assets/js/result.js")).then(function (module) {
      return module["default"];
    })["catch"](function (err) {
      return (0,_global__WEBPACK_IMPORTED_MODULE_0__.showError)(err);
    });
  } else if (window.location.pathname === '/createBlog') {
    Promise.all(/*! import() | blog */[__webpack_require__.e("/js/vendor"), __webpack_require__.e("blog")]).then(__webpack_require__.bind(__webpack_require__, /*! ./blog */ "./resources/assets/js/blog.js")).then(function (module) {
      return module["default"];
    })["catch"](function (err) {
      return (0,_global__WEBPACK_IMPORTED_MODULE_0__.showError)(err);
    });
  } else if (window.location.pathname === '/managed') {
    Promise.all(/*! import() | managed */[__webpack_require__.e("/js/vendor"), __webpack_require__.e("managed")]).then(__webpack_require__.bind(__webpack_require__, /*! ./blog/login */ "./resources/assets/js/blog/login.js")).then(function (module) {
      return module["default"];
    })["catch"](function (err) {
      return (0,_global__WEBPACK_IMPORTED_MODULE_0__.showError)(err);
    });
  } else if (window.location.pathname === '/blogMgt') {
    (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('signout').style.display = 'block';
    __webpack_require__.e(/*! import() | blogMgt */ "blogMgt").then(__webpack_require__.t.bind(__webpack_require__, /*! ./blog/show */ "./resources/assets/js/blog/show.js", 23)).then(function (module) {
      return module["default"];
    })["catch"](function (err) {
      return (0,_global__WEBPACK_IMPORTED_MODULE_0__.showError)(err);
    });
  }
});

/***/ }),

/***/ "./resources/assets/sass/main.scss":
/*!*****************************************!*\
  !*** ./resources/assets/sass/main.scss ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ /* webpack/runtime/startup prefetch */
/******/ (() => {
/******/ 	__webpack_require__.O(0, ["/js/index"], () => {
/******/ 		["/js/vendor","main","result","blog","managed","blogMgt"].map(__webpack_require__.E);
/******/ 	}, 5);
/******/ })();
/******/ 
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["css/main"], () => (__webpack_exec__("./resources/assets/js/index.js"), __webpack_exec__("./resources/assets/sass/main.scss")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=index.js.map