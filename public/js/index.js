"use strict";
(self["webpackChunkidecide"] = self["webpackChunkidecide"] || []).push([["/js/index"],{

/***/ "./resources/assets/js/index.js":
/*!**************************************!*\
  !*** ./resources/assets/js/index.js ***!
  \**************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @modernman00/shared-js-lib */ "./node_modules/@modernman00/shared-js-lib/index.js");
// import { showError, id } from './global';

document.addEventListener('DOMContentLoaded', () => {
  const routeMap = {
    '/': () => __webpack_require__.e(/*! import() | main */ "main").then(__webpack_require__.bind(__webpack_require__, /*! ./main */ "./resources/assets/js/main.js")),
    '/result': () => __webpack_require__.e(/*! import() | result */ "result").then(__webpack_require__.bind(__webpack_require__, /*! ./result */ "./resources/assets/js/result.js")),
    '/adminlogin': () => __webpack_require__.e(/*! import() | login */ "login").then(__webpack_require__.bind(__webpack_require__, /*! ./acctMgt/login */ "./resources/assets/js/acctMgt/login.js")),
    '/forgot': () => __webpack_require__.e(/*! import() | forgot */ "forgot").then(__webpack_require__.bind(__webpack_require__, /*! ./acctMgt/forgot */ "./resources/assets/js/acctMgt/forgot.js")),
    '/code': () => __webpack_require__.e(/*! import() | code */ "code").then(__webpack_require__.bind(__webpack_require__, /*! ./acctMgt/code */ "./resources/assets/js/acctMgt/code.js")),
    '/createBlog': () => __webpack_require__.e(/*! import() | createBlog */ "createBlog").then(__webpack_require__.bind(__webpack_require__, /*! ./createBlog */ "./resources/assets/js/createBlog.js")),
    '/testPost': () => __webpack_require__.e(/*! import() | testPost */ "testPost").then(__webpack_require__.bind(__webpack_require__, /*! ./acctMgt/testPost */ "./resources/assets/js/acctMgt/testPost.js")),
    '/changePassword': () => __webpack_require__.e(/*! import() | changePassword */ "changePassword").then(__webpack_require__.bind(__webpack_require__, /*! ./acctMgt/changePassword */ "./resources/assets/js/acctMgt/changePassword.js")),
    '/contact': () => __webpack_require__.e(/*! import() | contact */ "contact").then(__webpack_require__.bind(__webpack_require__, /*! ./contact */ "./resources/assets/js/contact.js")),
    '/login': () => __webpack_require__.e(/*! import() | user_login */ "user_login").then(__webpack_require__.bind(__webpack_require__, /*! ./acctMgt/user_login */ "./resources/assets/js/acctMgt/user_login.js")),
    '/register': () => __webpack_require__.e(/*! import() | register */ "register").then(__webpack_require__.bind(__webpack_require__, /*! ./acctMgt/register */ "./resources/assets/js/acctMgt/register.js"))
  };
  try {
    const loadModule = routeMap[window.location.pathname];
    if (!loadModule) {
      throw new Error(`Unhandled route: ${window.location.pathname}`);
    }
    loadModule().then(module => module.default).catch(err => {
      (0,_modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_0__.showError)(err);
      throw new Error(`Failed to load module for ${window.location.pathname}: ${err.message}`);
    });
  } catch (error) {
    (0,_modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_0__.showError)(error);
    throw error;
  }
});

/***/ }),

/***/ "./resources/assets/sass/main.scss":
/*!*****************************************!*\
  !*** ./resources/assets/sass/main.scss ***!
  \*****************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ function(__webpack_require__) { // webpackRuntimeModules
/******/ var __webpack_exec__ = function(moduleId) { return __webpack_require__(__webpack_require__.s = moduleId); }
/******/ __webpack_require__.O(0, ["css/main","/js/vendor"], function() { return __webpack_exec__("./resources/assets/js/index.js"), __webpack_exec__("./resources/assets/sass/main.scss"); });
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=index.js.map