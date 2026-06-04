"use strict";
(self["webpackChunkidecide"] = self["webpackChunkidecide"] || []).push([["forgot"],{

/***/ "./resources/assets/js/acctMgt/forgot.js":
/*!***********************************************!*\
  !*** ./resources/assets/js/acctMgt/forgot.js ***!
  \***********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _routes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../routes */ "./resources/assets/js/routes.js");
/* harmony import */ var _modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @modernman00/shared-js-lib */ "./node_modules/@modernman00/shared-js-lib/index.js");


sessionStorage.setItem('fromForgot', 'true');
(0,_modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_1__.forgotSubmitHandler)({
  formId: 'forgot',
  route: _routes__WEBPACK_IMPORTED_MODULE_0__.acctMgtRoutes.forgot,
  redirect: _routes__WEBPACK_IMPORTED_MODULE_0__.acctMgtRoutes.forgotRedirect,
  recaptchaAction: 'FORGOT'
});

// Set autocomplete and accessibility attributes

/***/ }),

/***/ "./resources/assets/js/routes.js":
/*!***************************************!*\
  !*** ./resources/assets/js/routes.js ***!
  \***************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   acctMgtRoutes: function() { return /* binding */ acctMgtRoutes; },
/* harmony export */   blogRoutes: function() { return /* binding */ blogRoutes; }
/* harmony export */ });
const blogRoutes = {
  showEdit: id => `/showEditBlog/${id}`,
  create: () => '/createBlog',
  delete: id => `/deleteBlog/${id}`,
  blogMgt: '/blogMgt'
};
const acctMgtRoutes = {
  login: '/adminlogin',
  loginRedirect: '/code',
  adminHome: '/adminhome',
  forgot: '/forgot',
  forgotRedirect: '/code',
  code: '/code',
  codeRedirect: 'changePassword',
  changePassword: '/changePassword',
  changePasswordRedirect: '/adminlogin',
  userLogin: '/login',
  userLoginRedirect: 'code',
  userLoginCodeRedirect: 'history'
};

/***/ })

}]);
//# sourceMappingURL=forgot.js.map