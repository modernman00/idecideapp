"use strict";
(self["webpackChunkidecide"] = self["webpackChunkidecide"] || []).push([["testPost"],{

/***/ "./resources/assets/js/AcctMgt/testPost.js":
/*!*************************************************!*\
  !*** ./resources/assets/js/AcctMgt/testPost.js ***!
  \*************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @modernman00/shared-js-lib */ "./node_modules/@modernman00/shared-js-lib/index.js");

const handler = e => {
  e.preventDefault();
  const lengthLimit = {
    maxLength: {
      id: ['occupation', 'age'],
      max: [10, 10]
    }
  };
  (0,_modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_0__.loginSubmission)('testPost', '/testPost', '', 'bulma', lengthLimit);
};
(0,_modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_0__.bindEvent)({
  id: 'button',
  handler
});
(0,_modernman00_shared_js_lib__WEBPACK_IMPORTED_MODULE_0__.showFileName)('children_div');

/***/ })

}]);
//# sourceMappingURL=testPost.js.map