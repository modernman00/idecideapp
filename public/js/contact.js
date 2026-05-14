"use strict";
(self["webpackChunkidecide"] = self["webpackChunkidecide"] || []).push([["contact"],{

/***/ "./resources/assets/js/contact.js"
/*!****************************************!*\
  !*** ./resources/assets/js/contact.js ***!
  \****************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @modernman00/shared-js-lib */ "./node_modules/@modernman00/shared-js-lib/index.js");


// Submission handler
var handleSubmit = function handleSubmit(e) {
  e.preventDefault();
  (0,_modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_0__.loginSubmission)('contact', 'contact', '', 'bootstrap');
};

// Bind events
(0,_modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_0__.bindEvent)({
  id: 'button',
  handler: handleSubmit
});

/***/ }

}]);
//# sourceMappingURL=contact.js.map