"use strict";
(self["webpackChunkidecide"] = self["webpackChunkidecide"] || []).push([["blog"],{

/***/ "./resources/assets/js/blog.js":
/*!*************************************!*\
  !*** ./resources/assets/js/blog.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/lib/axios.js");
/* harmony import */ var _global_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./global.js */ "./resources/assets/js/global.js");
function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); } r ? i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n : (o("next", 0), o("throw", 1), o("return", 2)); }, _regeneratorDefine2(e, r, n, t); }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
//import axios 


(0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('button').addEventListener('click', /*#__PURE__*/function () {
  var _ref = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee(e) {
    var form, formData, titleError, contentError, _response, _error$response, _error$response2, errorMsg, _t;
    return _regenerator().w(function (_context) {
      while (1) switch (_context.p = _context.n) {
        case 0:
          e.preventDefault();
          form = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('createPostForm');
          formData = new FormData(form);
          titleError = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('title_error');
          contentError = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('content_error');
          _context.p = 1;
          _context.n = 2;
          return axios__WEBPACK_IMPORTED_MODULE_0__["default"].post('/createBlog', formData, {
            headers: {
              'X-CSRF-TOKEN': formData.get('csrf_token'),
              'Accept': 'application/json'
            }
          });
        case 2:
          _response = _context.v;
          (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('notification').textContent = _response.data.message;
          // background color
          (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('notification').style.backgroundColor = 'green';

          // hide notification after 3 seconds
          setTimeout(function () {
            (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('notification').textContent = _response.data.message;
            // background color
            (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('notification').style.backgroundColor = 'green';
          }, 3000);

          // redirect to blog page
          window.location.href = '/blogs';
          _context.n = 4;
          break;
        case 3:
          _context.p = 3;
          _t = _context.v;
          errorMsg = ((_error$response = _t.response) === null || _error$response === void 0 || (_error$response = _error$response.data) === null || _error$response === void 0 ? void 0 : _error$response.message) || ((_error$response2 = _t.response) === null || _error$response2 === void 0 || (_error$response2 = _error$response2.data) === null || _error$response2 === void 0 ? void 0 : _error$response2.error) || 'An error occurred';
          if (errorMsg.includes('title')) {
            titleError.textContent = errorMsg;
            titleError.style.display = 'block';
          } else if (errorMsg.includes('content')) {
            contentError.textContent = errorMsg;
            contentError.style.display = 'block';
          } else {
            (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('notification').textContent = response.data.message;
            // background color
            (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('notification').style.backgroundColor = 'red';
          }
        case 4:
          return _context.a(2);
      }
    }, _callee, null, [[1, 3]]);
  }));
  return function (_x) {
    return _ref.apply(this, arguments);
  };
}());
var textarea = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('content_id');
textarea.rows = 10;
textarea.style.resize = 'vertical';
textarea.style.width = '100%';
textarea.style.minHeight = '150px';
textarea.style.maxHeight = '500px';
textarea.style.fontSize = '1rem';
textarea.style.padding = '0.5rem';
textarea.style.border = '1px solid #ced4da';
textarea.style.borderRadius = '0.25rem';
textarea.style.boxShadow = '0 0 0 0 rgba(0, 0, 0, 0.125)';
textarea.style.transition = 'border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out';
textarea.addEventListener('focus', function () {
  textarea.style.borderColor = '#80bdff';
  textarea.style.boxShadow = '0 0 0 0.2rem rgba(0, 123, 255, 0.25)';
});
textarea.addEventListener('blur', function () {
  textarea.style.borderColor = '#ced4da';
  textarea.style.boxShadow = '0 0 0 0 rgba(0, 0, 0, 0.125)';
});

/***/ }),

/***/ "./resources/assets/js/global.js":
/*!***************************************!*\
  !*** ./resources/assets/js/global.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   bindEvent: () => (/* binding */ bindEvent),
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
function bindEvent(_ref) {
  var id = _ref.id,
    _ref$event = _ref.event,
    event = _ref$event === void 0 ? 'click' : _ref$event,
    handler = _ref.handler;
  var el = document.getElementById(id);
  if (el && typeof handler === 'function') {
    el.addEventListener(event, handler);
  }
}

/***/ })

}]);
//# sourceMappingURL=blog.js.map