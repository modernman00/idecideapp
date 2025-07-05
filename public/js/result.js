"use strict";
(self["webpackChunkidecide"] = self["webpackChunkidecide"] || []).push([["result"],{

/***/ "./resources/assets/js/background-sync.js":
/*!************************************************!*\
  !*** ./resources/assets/js/background-sync.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   queuePostRequest: () => (/* binding */ queuePostRequest),
/* harmony export */   sendQueuedRequests: () => (/* binding */ sendQueuedRequests)
/* harmony export */ });
function _createForOfIteratorHelper(r, e) { var t = "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (!t) { if (Array.isArray(r) || (t = _unsupportedIterableToArray(r)) || e && r && "number" == typeof r.length) { t && (r = t); var _n = 0, F = function F() {}; return { s: F, n: function n() { return _n >= r.length ? { done: !0 } : { done: !1, value: r[_n++] }; }, e: function e(r) { throw r; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var o, a = !0, u = !1; return { s: function s() { t = t.call(r); }, n: function n() { var r = t.next(); return a = r.done, r; }, e: function e(r) { u = !0, o = r; }, f: function f() { try { a || null == t["return"] || t["return"](); } finally { if (u) throw o; } } }; }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { if (r) i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n;else { var o = function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); }; o("next", 0), o("throw", 1), o("return", 2); } }, _regeneratorDefine2(e, r, n, t); }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
// background-sync.js

// 🔐 Module-wide constants
var DB_NAME = 'idecide-sync'; // The name of your local mini-database
var STORE_NAME = 'queued-posts'; // A place to store POST requests
var SYNC_TAG = 'sync-idecide-data';

// 🧰 Open or upgrade the local IndexedDB queue
function openDB() {
  return new Promise(function (resolve, reject) {
    var request = indexedDB.open(DB_NAME, 1);
    // This only runs the first time (or if you bump version)
    request.onupgradeneeded = function () {
      // Create an object store to save queued data with auto-incremented IDs
      request.result.createObjectStore(STORE_NAME, {
        keyPath: 'id',
        autoIncrement: true
      });
    };
    request.onsuccess = function () {
      return resolve(request.result);
    }; // DB opened successfully
    request.onerror = function () {
      return reject(request.error);
    }; // Something went wrong
  });
}

// 💾 Add a POST request to the queue
function queuePostRequest(_x, _x2) {
  return _queuePostRequest.apply(this, arguments);
}

// 📤 Send all queued requests
function _queuePostRequest() {
  _queuePostRequest = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee(url, body) {
    var db, tx, reg;
    return _regenerator().w(function (_context) {
      while (1) switch (_context.n) {
        case 0:
          _context.n = 1;
          return openDB();
        case 1:
          db = _context.v;
          tx = db.transaction(STORE_NAME, 'readwrite');
          tx.objectStore(STORE_NAME).add({
            url: url,
            body: body
          });
          _context.n = 2;
          return tx.complete;
        case 2:
          _context.n = 3;
          return navigator.serviceWorker.ready;
        case 3:
          reg = _context.v;
          if (!('sync' in reg)) {
            _context.n = 5;
            break;
          }
          _context.n = 4;
          return reg.sync.register(SYNC_TAG);
        case 4:
          _context.n = 6;
          break;
        case 5:
          _context.n = 6;
          return sendQueuedRequests();
        case 6:
          return _context.a(2);
      }
    }, _callee);
  }));
  return _queuePostRequest.apply(this, arguments);
}
function sendQueuedRequests() {
  return _sendQueuedRequests.apply(this, arguments);
}

// 🔔 Lightweight toast for visual feedbackNow every time a saved request syncs in the background, your user gets:

// A melodic chime 🔔

// A stylish toast bubble 💬

// Whimsical emoji confetti 🎈✨🧠
function _sendQueuedRequests() {
  _sendQueuedRequests = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee2() {
    var showToast,
      db,
      tx,
      store,
      requests,
      _iterator,
      _step,
      entry,
      res,
      _args2 = arguments,
      _t,
      _t2;
    return _regenerator().w(function (_context2) {
      while (1) switch (_context2.n) {
        case 0:
          showToast = _args2.length > 0 && _args2[0] !== undefined ? _args2[0] : true;
          _context2.n = 1;
          return openDB();
        case 1:
          db = _context2.v;
          tx = db.transaction(STORE_NAME, 'readwrite');
          store = tx.objectStore(STORE_NAME);
          _context2.n = 2;
          return store.getAll();
        case 2:
          requests = _context2.v;
          _iterator = _createForOfIteratorHelper(requests);
          _context2.p = 3;
          _iterator.s();
        case 4:
          if ((_step = _iterator.n()).done) {
            _context2.n = 11;
            break;
          }
          entry = _step.value;
          _context2.p = 5;
          _context2.n = 6;
          return fetch(entry.url, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify(entry.body)
          });
        case 6:
          res = _context2.v;
          if (!res.ok) {
            _context2.n = 7;
            break;
          }
          store["delete"](entry.id); // 👋 Clean up if it worked
          if (showToast) showSyncToast('✅ Sent saved data to server');
          _context2.n = 8;
          break;
        case 7:
          throw new Error('Bad response');
        case 8:
          _context2.n = 10;
          break;
        case 9:
          _context2.p = 9;
          _t = _context2.v;
        case 10:
          _context2.n = 4;
          break;
        case 11:
          _context2.n = 13;
          break;
        case 12:
          _context2.p = 12;
          _t2 = _context2.v;
          _iterator.e(_t2);
        case 13:
          _context2.p = 13;
          _iterator.f();
          return _context2.f(13);
        case 14:
          _context2.n = 15;
          return tx.complete;
        case 15:
          return _context2.a(2);
      }
    }, _callee2, null, [[5, 9], [3, 12, 13, 14]]);
  }));
  return _sendQueuedRequests.apply(this, arguments);
}
function showSyncToast(message) {
  // Create and play success chime
  var audio = new Audio('/sounds/success-chime.mp3');
  audio.volume = 0.4;
  audio.play()["catch"](function () {}); // Prevent errors if user hasn’t interacted yet

  // Create the visual toast
  var toast = document.createElement('div');
  toast.innerHTML = "<span>\uD83D\uDCAC</span> ".concat(message);
  toast.style = "\n    position: fixed;\n    bottom: 1.5rem;\n    right: 1.5rem;\n    background: linear-gradient(135deg, #00695c, #26a69a);\n    color: #fff;\n    padding: 1rem 1.5rem;\n    border-radius: 8px;\n    font-size: 0.95rem;\n    font-family: system-ui, sans-serif;\n    display: flex;\n    align-items: center;\n    gap: 0.5rem;\n    box-shadow: 0 8px 16px rgba(0,0,0,0.2);\n    z-index: 10000;\n    opacity: 0;\n    transform: translateY(20px);\n    transition: opacity 0.4s ease, transform 0.4s ease;\n  ";
  document.body.appendChild(toast);

  // Animate in
  requestAnimationFrame(function () {
    toast.style.opacity = '1';
    toast.style.transform = 'translateY(0)';
  });

  // Fade out after delay
  setTimeout(function () {
    toast.style.opacity = '0';
    toast.style.transform = 'translateY(20px)';
    setTimeout(function () {
      return toast.remove();
    }, 400);
  }, 4000);

  // 🌟 Add floating confetti emojis!
  var _loop = function _loop() {
    var emoji = document.createElement('div');
    emoji.textContent = ['🎈', '✨', '🪄', '🎉', '🧠'][Math.floor(Math.random() * 5)];
    emoji.style = "\n      position: fixed;\n      left: ".concat(Math.random() * 100, "vw;\n      bottom: 0;\n      font-size: 1.5rem;\n      animation: float-up 2.5s ease-out forwards;\n      z-index: 9999;\n    ");
    document.body.appendChild(emoji);
    setTimeout(function () {
      return emoji.remove();
    }, 3000);
  };
  for (var i = 0; i < 10; i++) {
    _loop();
  }

  // Floating animation
  var style = document.createElement('style');
  style.textContent = "\n    @keyframes float-up {\n      0% { transform: translateY(0); opacity: 1; }\n      100% { transform: translateY(-150px); opacity: 0; }\n    }\n  ";
  document.head.appendChild(style);
}

/***/ }),

/***/ "./resources/assets/js/include/result/confetti.js":
/*!********************************************************!*\
  !*** ./resources/assets/js/include/result/confetti.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   triggerConfetti: () => (/* binding */ triggerConfetti)
/* harmony export */ });
var triggerConfetti = function triggerConfetti() {
  try {
    __webpack_require__.e(/*! import() */ "/js/vendor").then(__webpack_require__.bind(__webpack_require__, /*! canvas-confetti */ "./node_modules/canvas-confetti/dist/confetti.module.mjs")).then(function (module) {
      var confetti = module["default"] || module; // Handle both ES module and CommonJS
      confetti({
        particleCount: 100,
        // Number of confetti particles
        spread: 120,
        // Spread angle in degrees
        origin: {
          y: 0.1
        },
        // Start near top of screen
        ticks: 300 // Longer duration
      });
    })["catch"](function (error) {
      console.error("Failed to load canvas-confetti:", error);
    });
  } catch (error) {
    console.error("Error triggering confetti:", error);
  }
};

/***/ }),

/***/ "./resources/assets/js/include/result/influences.js":
/*!**********************************************************!*\
  !*** ./resources/assets/js/include/result/influences.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   renderInfluences: () => (/* binding */ renderInfluences)
/* harmony export */ });
var renderInfluences = function renderInfluences(data) {
  var container = document.getElementById('influenceBreakdown');
  container.innerHTML = '';
  data.forEach(function (item) {
    var emoji, levelClass;
    if (item.impact >= 70) {
      emoji = '🔥'; // High impact
      levelClass = 'influence-high';
    } else if (item.impact >= 50) {
      emoji = '🌤️'; // Medium impact
      levelClass = 'influence-medium';
    } else {
      emoji = '🧊'; // Low impact
      levelClass = 'influence-low';
    }
    var bar = document.createElement('div');
    bar.className = 'influence-bar';
    bar.innerHTML = "\n      <div class=\"influence-label\">".concat(emoji, " ").concat(item.label, "</div>\n      <div class=\"influence-progress\">\n        <div class=\"influence-fill ").concat(levelClass, "\" style=\"width: ").concat(item.impact, "%\">\n          ").concat(item.impact, "%\n        </div>\n      </div>\n    ");
    container.appendChild(bar);
  });
};

/***/ }),

/***/ "./resources/assets/js/result.js":
/*!***************************************!*\
  !*** ./resources/assets/js/result.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! axios */ "./node_modules/axios/lib/axios.js");
/* harmony import */ var _global_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./global.js */ "./resources/assets/js/global.js");
/* harmony import */ var _background_sync_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./background-sync.js */ "./resources/assets/js/background-sync.js");
/* harmony import */ var _include_result_confetti_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./include/result/confetti.js */ "./resources/assets/js/include/result/confetti.js");
/* harmony import */ var _include_result_influences_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./include/result/influences.js */ "./resources/assets/js/include/result/influences.js");
function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { if (r) i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n;else { var o = function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); }; o("next", 0), o("throw", 1), o("return", 2); } }, _regeneratorDefine2(e, r, n, t); }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }





try {
  (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.log)("Session storage data:", sessionStorage.getItem("scoreData"));
  // 1. Safely retrieve and parse sessionStorage data
  var savedScoreData = JSON.parse(sessionStorage.getItem("scoreData")) || {};
  (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.log)("Saved score data:", savedScoreData);
  if (!savedScoreData || Object.keys(savedScoreData).length === 0) {
    throw new Error("No score data found in session storage");
  }

  // 2. Set defaults for missing data
  var score = parseInt(savedScoreData.score, 10);
  var decision = savedScoreData.decision || "Unknown";
  var color = savedScoreData.color || "text-primary";
  var comment = savedScoreData.comment || "No comments provided";
  var badgeText = savedScoreData.badgeText || "";
  var badgeClass = savedScoreData.badgeClass || "";
  var itemToBuy = savedScoreData.itemToBuy || "item";
  var personalisedAdvice = savedScoreData.advices || "No personalized advice available";
  var itemImage = savedScoreData.resultImage || "default-image.png";

  // Define the decision triggers for confetti
  var confettiTriggers = ["WORTH CONSIDERING!", "STRONG BUY"];

  // Trigger confetti if decision includes any trigger
  if (confettiTriggers.some(function (trigger) {
    return decision.includes(trigger);
  })) {
    (0,_include_result_confetti_js__WEBPACK_IMPORTED_MODULE_2__.triggerConfetti)();
  }

  // 3. Advice options object
  var adviceOptions = {
    option1: {
      high: "Great decision to buy the ".concat(itemToBuy, "! This purchase aligns well with your needs and budget. To maximize value, consider setting aside a small savings buffer for future expenses."),
      medium: "This purchase of the ".concat(itemToBuy, " might be tempting, but take a moment to compare alternatives or save up a bit more to avoid financial strain."),
      low: "Holding off on buying the ".concat(itemToBuy, " is wise. Focus on paying down any debts or building an emergency fund to strengthen your financial position.")
    },
    option2: {
      high: "You're ready to buy the ".concat(itemToBuy, "! Ensure it supports your long-term goals, like enhancing your lifestyle or productivity."),
      medium: "Pause and reflect: Does buying the ".concat(itemToBuy, " align with your priorities? Consider delaying until you\u2019re certain it\u2019s a need, not just a want."),
      low: "Skipping buying the ".concat(itemToBuy, " is a smart move. Redirect your funds toward a goal that brings lasting value, like savings or skill-building.")
    },
    option3: {
      high: "Buying the ".concat(itemToBuy, " looks solid! Double-check your budget to ensure it fits comfortably, and enjoy the benefits it brings."),
      medium: "You\u2019re on the fence. Try researching cheaper alternatives or waiting for a sale to make buying the ".concat(itemToBuy, " more affordable."),
      low: "Great choice to hold off. Reassess your needs in a month or explore free alternatives to meet your goals without spending."
    },
    option4: {
      high: "Awesome choice! buying the ".concat(itemToBuy, " is well thought out. Keep up your smart financial habits to stay on track."),
      medium: "Take a step back. Could you save up for this or find a similar item at a lower cost? Your wallet will thank you!",
      low: "You\u2019re making a savvy decision by passing on this. Focus on your financial priorities, like saving for a bigger goal."
    }
  };

  // 4. DOM Element Safety Checks
  var _scoreEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("score");
  var decisionEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("decision");
  var commentsEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("comments");
  var badgeEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("badge");
  var sliderEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("scoreSlider");
  var imgEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("image");
  var _adviceEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("personalisedAdvice");
  var influencesEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("influenceBreakdown");
  if (!_scoreEl || !decisionEl || !commentsEl || !badgeEl || !sliderEl || !imgEl || !_adviceEl) {
    throw new Error("Required DOM elements not found");
  }

  // 5. Animated score counter with safety
  var i = 0;
  var interval = setInterval(function () {
    try {
      if (i <= score) {
        _scoreEl.textContent = i + "%";
        sliderEl.value = i; // Update slider value during animation
        i++;
      } else {
        clearInterval(interval);
      }
    } catch (e) {
      clearInterval(interval);
      console.error("Score animation error:", e);
    }
  }, 20);

  // 6. Set DOM content with fallbacks
  decisionEl.textContent = decision;
  decisionEl.classList.add(color);
  commentsEl.textContent = comment;
  imgEl.src = savedScoreData.resultImage;
  imgEl.alt = savedScoreData.resultImageAlt;
  if (badgeText) badgeEl.textContent = badgeText;
  if (badgeClass) badgeEl.classList.add(badgeClass);

  // 7. Personalized advice using option1
  var advice = "";
  if (score >= 75) {
    advice = adviceOptions.option1.high;
  } else if (score >= 50) {
    advice = adviceOptions.option1.medium;
  } else {
    advice = adviceOptions.option1.low;
  }
  _adviceEl.textContent = advice;

  // Populate advice list
  var adviceList = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("advice-list");
  if (savedScoreData.advice && Array.isArray(savedScoreData.advice)) {
    savedScoreData.advice.forEach(function (tip) {
      var li = document.createElement("li");
      li.classList.add('list-group-items');
      li.textContent = tip;
      adviceList.appendChild(li);
    });
  } else {
    var li = document.createElement("li");
    li.textContent = "No specific advice available. Review your answers for better insights.";
    adviceList.appendChild(li);
  }

  // 8. Set slider value
  sliderEl.value = score;

  // 9. Sharing features with safety checks
  try {
    var pageUrl = encodeURIComponent(window.location.href);
    var shareText = "I got a ".concat(score, "% decision score using iDecide! ").concat(pageUrl);
    var twitterShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("twitterShare");
    if (twitterShare) {
      twitterShare.href = "https://twitter.com/intent/tweet?text=".concat(shareText);
    }
    var whatsappShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("whatsappShare");
    if (whatsappShare) {
      whatsappShare.href = "https://api.whatsapp.com/send?text=".concat(shareText);
    }
    var facebookShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("facebookShare");
    if (facebookShare) {
      facebookShare.href = "https://www.facebook.com/sharer/sharer.php?u=".concat(pageUrl, "&quote=").concat(shareText);
    }
    var truthSocialShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("truthSocialShare");
    if (truthSocialShare) {
      truthSocialShare.href = "https://truthsocial.com/share?text=".concat(shareText, "%20").concat(pageUrl);
    }
    var linkedinShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("linkedinShare");
    if (linkedinShare) {
      linkedinShare.href = "https://www.linkedin.com/sharing/share-offsite/?url=".concat(pageUrl, "&title=").concat(shareText);
    }
    var redditShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("redditShare");
    if (redditShare) {
      redditShare.href = "https://www.reddit.com/submit?url=".concat(pageUrl, "&title=").concat(shareText);
    }
  } catch (shareError) {
    console.error("Share feature error:", shareError);
  }

  // 10. PDF download feature
  try {
    var downloadBtn = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("downloadPDF");
    if (downloadBtn && window.jspdf) {
      downloadBtn.addEventListener("click", function () {
        try {
          var jsPDF = window.jspdf.jsPDF;
          var doc = new jsPDF();
          doc.text("Decision Matrix Result", 10, 10);
          doc.text("Decision: ".concat(decision), 10, 20);
          doc.text("Score: ".concat(score, "%"), 10, 30);
          doc.text("Comments: ".concat(comment), 10, 40);
          doc.save("decision_matrix_result.pdf");
        } catch (pdfError) {
          (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.showError)("Failed to generate PDF");
          console.error("PDF generation error:", pdfError);
        }
      });
    }
  } catch (pdfInitError) {
    console.error("PDF button initialization error:", pdfInitError);
  }

  // 11. make the submit button bigger by adding a class btn-lg and btn-block 
  var submitBtn = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("button");
  if (submitBtn) {
    submitBtn.classList.add("btn-lg", "btn-block");
  }

  // 12. Render influences using the imported function

  if (influencesEl && savedScoreData.influences && Array.isArray(savedScoreData.influences)) {
    var _document$getElementB;
    (_document$getElementB = document.getElementById('toggleInfluences')) === null || _document$getElementB === void 0 || _document$getElementB.addEventListener('click', function () {
      var breakdown = document.getElementById('influenceBreakdown');
      var isVisible = breakdown.style.display === 'block';
      breakdown.style.display = isVisible ? 'none' : 'block';
      this.textContent = isVisible ? 'Show Influencing Factors' : 'Hide Influencing Factors';
      if (!isVisible) {
        setTimeout(function () {
          breakdown.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }, 300);
      }
      if (!isVisible && savedScoreData !== null && savedScoreData !== void 0 && savedScoreData.influences) {
        (0,_include_result_influences_js__WEBPACK_IMPORTED_MODULE_3__.renderInfluences)(savedScoreData.influences); // only render once visible
      }
    });
  }

  //13. email result to the user 
  var emailBtn = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("submitResult");
  if (emailBtn) {
    emailBtn.addEventListener("click", /*#__PURE__*/function () {
      var _ref = _asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee(e) {
        var email, emailRegex, emailModal, resultData, response, emailHelp, _t;
        return _regenerator().w(function (_context) {
          while (1) switch (_context.n) {
            case 0:
              e.preventDefault();
              email = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("email").value;
              emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              emailModal = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("emailModal");
              if (!(!email || !emailRegex.test(email))) {
                _context.n = 1;
                break;
              }
              (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.showError)("Please enter a valid email address");
              return _context.a(2);
            case 1:
              resultData = {
                email: email,
                score: score,
                decision: decision,
                comment: comment,
                itemToBuy: itemToBuy,
                advice: advice,
                personalisedAdvice: personalisedAdvice,
                itemImage: itemImage,
                influencesEl: influencesEl
              };
              _context.p = 2;
              if (!navigator.onLine) {
                _context.n = 6;
                break;
              }
              _context.n = 3;
              return axios__WEBPACK_IMPORTED_MODULE_4__["default"].post("/emailResult", resultData);
            case 3:
              response = _context.v;
              if (!(response.data && response.data.status === "success")) {
                _context.n = 4;
                break;
              }
              // Show success message
              emailHelp = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("emailHelp");
              if (emailHelp) {
                emailHelp.textContent = response.data.message || "Email sent successfully!";
                emailHelp.classList.add("text-success");
              }

              // set timer for 3 seconds to hide the modal
              setTimeout(function () {
                var modal = bootstrap.Modal.getInstance(emailModal);
                if (modal) modal.hide();
              }, 3000);
              _context.n = 5;
              break;
            case 4:
              throw new Error(response.data.error || "Failed to send email. Please try again later.");
            case 5:
              _context.n = 7;
              break;
            case 6:
              _context.n = 7;
              return (0,_background_sync_js__WEBPACK_IMPORTED_MODULE_1__.queuePostRequest)("/emailResult", resultData);
            case 7:
              _context.n = 9;
              break;
            case 8:
              _context.p = 8;
              _t = _context.v;
              console.error("Email sending error:", _t);
            case 9:
              return _context.a(2);
          }
        }, _callee, null, [[2, 8]]);
      }));
      return function (_x) {
        return _ref.apply(this, arguments);
      };
    }());
  }
} catch (mainError) {
  console.error("Main execution error:", mainError);
  (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.showError)(mainError);

  // Fallback UI state
  // const scoreEl = id("score");
  if (scoreEl) scoreEl.textContent = "0%";
  var _decisionEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("decision");
  if (_decisionEl) _decisionEl.textContent = "Error";

  // const adviceEl = id("personalisedAdvice");
  if (adviceEl) adviceEl.textContent = "Unable to provide advice due to an error.";

  // Hide optional elements
  var _sliderEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_0__.id)("scoreSlider");
  if (_sliderEl) _sliderEl.style.display = "none";
}

/***/ })

}]);
//# sourceMappingURL=result.js.map