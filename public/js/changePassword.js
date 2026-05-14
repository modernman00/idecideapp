"use strict";
(self["webpackChunkidecide"] = self["webpackChunkidecide"] || []).push([["changePassword"],{

/***/ "./resources/assets/js/AcctMgt/changePassword.js"
/*!*******************************************************!*\
  !*** ./resources/assets/js/AcctMgt/changePassword.js ***!
  \*******************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _routes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../routes */ "./resources/assets/js/routes.js");
/* harmony import */ var _modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @modernman00/shared-js-lib */ "./node_modules/@modernman00/shared-js-lib/index.js");


(0,_modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_1__.setupPasswordChange)({
  route: _routes__WEBPACK_IMPORTED_MODULE_0__.acctMgtRoutes.changePassword,
  redirect: _routes__WEBPACK_IMPORTED_MODULE_0__.acctMgtRoutes.changePasswordRedirect
});

/***/ },

/***/ "./resources/assets/js/routes.js"
/*!***************************************!*\
  !*** ./resources/assets/js/routes.js ***!
  \***************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   acctMgtRoutes: () => (/* binding */ acctMgtRoutes),
/* harmony export */   blogRoutes: () => (/* binding */ blogRoutes)
/* harmony export */ });
var blogRoutes = {
  showEdit: function showEdit(id) {
    return "/showEditBlog/".concat(id);
  },
  create: function create() {
    return '/createBlog';
  },
  "delete": function _delete(id) {
    return "/deleteBlog/".concat(id);
  },
  blogMgt: '/blogMgt'
};
var acctMgtRoutes = {
  login: '/adminlogin',
  loginRedirect: '/code',
  adminHome: '/adminhome',
  forgot: '/forgot',
  forgotRedirect: '/code',
  code: '/code',
  codeRedirect: 'changePassword',
  changePassword: '/changePassword',
  changePasswordRedirect: '/adminlogin'
};

/***/ }

}]);
//# sourceMappingURL=changePassword.js.map