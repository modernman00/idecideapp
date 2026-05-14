"use strict";
(self["webpackChunkidecide"] = self["webpackChunkidecide"] || []).push([["main"],{

/***/ "./resources/assets/js/background-sync.js"
/*!************************************************!*\
  !*** ./resources/assets/js/background-sync.js ***!
  \************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   queuePostRequest: () => (/* binding */ queuePostRequest),
/* harmony export */   sendQueuedRequests: () => (/* binding */ sendQueuedRequests)
/* harmony export */ });
function _createForOfIteratorHelper(r, e) { var t = "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (!t) { if (Array.isArray(r) || (t = _unsupportedIterableToArray(r)) || e && r && "number" == typeof r.length) { t && (r = t); var _n = 0, F = function F() {}; return { s: F, n: function n() { return _n >= r.length ? { done: !0 } : { done: !1, value: r[_n++] }; }, e: function e(r) { throw r; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var o, a = !0, u = !1; return { s: function s() { t = t.call(r); }, n: function n() { var r = t.next(); return a = r.done, r; }, e: function e(r) { u = !0, o = r; }, f: function f() { try { a || null == t["return"] || t["return"](); } finally { if (u) throw o; } } }; }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); } r ? i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n : (o("next", 0), o("throw", 1), o("return", 2)); }, _regeneratorDefine2(e, r, n, t); }
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
      while (1) switch (_context2.p = _context2.n) {
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

/***/ },

/***/ "./resources/assets/js/global.js"
/*!***************************************!*\
  !*** ./resources/assets/js/global.js ***!
  \***************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

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

/***/ },

/***/ "./resources/assets/js/include/main/autocomplete.js"
/*!**********************************************************!*\
  !*** ./resources/assets/js/include/main/autocomplete.js ***!
  \**********************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _global__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../global */ "./resources/assets/js/global.js");

/**
 *
 * @param {string} inputId
 * @param {Array} arr
 */

var autocomplete = function autocomplete(inputId, arr) {
  var whatToBuyInput = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)(inputId); // Get the text input
  if (whatToBuyInput) {
    // Create a <ul> for autocomplete suggestions
    var suggestionList = document.createElement('ul');
    suggestionList.classList.add('autocomplete-suggestions');
    suggestionList.id = 'suggestions'; // For accessibility
    whatToBuyInput.parentElement.appendChild(suggestionList); // Append to input's parent

    // Function to show matching suggestions based on user input
    var showSuggestions = function showSuggestions(inputValue) {
      suggestionList.innerHTML = ''; // Clear previous suggestions
      if (!inputValue) return; // Exit if input is empty

      // Filter items that match the input (case-insensitive), limit to 8
      var matches = arr.filter(function (item) {
        return item.toLowerCase().includes(inputValue.toLowerCase());
      }).slice(0, 8);

      // Create <li> for each match
      matches.forEach(function (item, index) {
        var li = document.createElement('li');
        li.textContent = item;
        li.setAttribute('tabindex', '0'); // Make focusable for keyboard
        li.setAttribute('data-index', index); // Store index for navigation
        li.addEventListener('click', function () {
          whatToBuyInput.value = item; // Set input value on click
          suggestionList.innerHTML = ''; // Clear suggestions
        });
        li.addEventListener('keypress', function (e) {
          if (e.key === 'Enter') {
            whatToBuyInput.value = item; // Set input value on Enter
            suggestionList.innerHTML = ''; // Clear suggestions
          }
        });
        suggestionList.appendChild(li);
      });
    };

    // Show suggestions as user types
    whatToBuyInput.addEventListener('input', function (e) {
      showSuggestions(e.target.value);
    });

    // Clear suggestions on blur (with delay for click to register)
    whatToBuyInput.addEventListener('blur', function () {
      setTimeout(function () {
        return suggestionList.innerHTML = '';
      }, 200);
    });

    // Handle keyboard navigation for suggestions
    whatToBuyInput.addEventListener('keydown', function (e) {
      var suggestions = suggestionList.querySelectorAll('li');
      if (!suggestions.length) return; // Exit if no suggestions

      var focusedIndex = Array.from(suggestions).findIndex(function (li) {
        return li === document.activeElement;
      });
      if (e.key === 'ArrowDown') {
        e.preventDefault(); // Prevent cursor movement
        focusedIndex = (focusedIndex + 1) % suggestions.length; // Loop to start
        suggestions[focusedIndex].focus();
      } else if (e.key === 'ArrowUp') {
        e.preventDefault();
        focusedIndex = (focusedIndex - 1 + suggestions.length) % suggestions.length; // Loop to end
        suggestions[focusedIndex].focus();
      } else if (e.key === 'Enter' && focusedIndex >= 0) {
        e.preventDefault();
        whatToBuyInput.value = suggestions[focusedIndex].textContent; // Select item
        suggestionList.innerHTML = ''; // Clear suggestions
      } else if (e.key === 'Escape') {
        suggestionList.innerHTML = ''; // Clear suggestions
      }
    });
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (autocomplete);

/***/ },

/***/ "./resources/assets/js/include/main/dataToAutoComplete.js"
/*!****************************************************************!*\
  !*** ./resources/assets/js/include/main/dataToAutoComplete.js ***!
  \****************************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var purchaseItems = ['Acoustic guitar', 'Air conditioner', 'AirPods', 'Apple Watch', 'Bicycle', 'Blender (high-end)', 'Camera (DSLR/mirrorless)', 'Camping gear', 'Car (new or used)', 'Car seat (premium)', 'Coffee maker (espresso)', 'Cooling mattress', 'Designer handbag', 'Desktop computer', 'Dishwasher', 'Drone', 'Holiday', 'Electric guitar', 'Electric scooter', 'Electric toothbrush', 'Espresso machine', 'Exercise bike', 'Eyeglasses (designer)', 'Fitness tracker', 'Gaming console', 'Gaming chair', 'Gold jewelry', 'Golf clubs', 'Grill (outdoor)', 'Headphones (noise-canceling)', 'Home gym equipment', 'Home security system', 'Hot tub', 'iPad', 'Jeans (premium)', 'Kayak', 'Kitchen mixer (stand)', 'Laptop', 'Leather jacket', 'Luggage set', 'Luxury watch (Rolex, Casio)', 'Massage chair', 'Mattress', 'Microwave (smart)', 'Motorcycle', 'Mountain bike', 'Music production software', 'Noise-canceling earbuds', 'Oven (convection)', 'Patio furniture', 'Pet insurance', 'Photography lighting kit', 'Piano (digital)', 'Power tools (drill set)', 'Printer (3D)', 'Projector', 'Ray-Ban sunglasses', 'Refrigerator', 'Robot vacuum', 'Running shoes (premium)', 'Ski equipment', 'Smart doorbell', 'Smart garage door opener', 'Smart speaker', 'Smartphone', 'Smartwatch', 'Sneakers (designer)', 'Snowboard', 'Sofa', 'Soundbar', 'Streaming subscription (Netflix, Disney+)', 'Surfboard', 'Tablet', 'Television (4K)', 'Tent (backpacking)', 'Treadmill', 'Vacuum cleaner (cordless)', 'Vacation package', 'Video camera', 'Video game (AAA title)', 'Vinyl record player', 'VR headset', 'Washing machine', 'Wedding ring', 'Weighted blanket', 'Wireless charger', 'Yoga retreat', 'Home theater system', 'Diving gear', 'Electric car charger', 'Telescope', 'Designer suit', 'Art print (original)', 'Collectible figurine', 'Gym membership', 'Smart thermostat', 'E-reader (Kindle)', 'Portable generator', 'Skateboard (electric)', 'Leather boots', 'Craft supplies (sewing machine)', 'Snooker table', 'Gym membership', 'Smart thermostat', 'E-reader (Kindle)', 'Gym bag', 'Snooker table', 'Plane tickets', 'Train tickets', 'Bus passes', 'Taxi rides', 'Rideshares', 'Fuel', 'Motor oil', 'Car tyres', 'Car battery', 'Car accessories', 'Helmet', 'Motorbike gear', 'Travel insurance', 'Hotel stay', 'Hostel stay', 'Holiday rental', 'Camping pitch', 'Luggage', 'Suitcase', 'Backpack', 'Travel pillow', 'Eye mask', 'Ear plugs', 'Maps', 'Guidebook', 'Camping stove', 'Cooler box', 'Hiking poles', 'Surfboard', 'Ski equipment'];
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (purchaseItems);

/***/ },

/***/ "./resources/assets/js/include/main/intersection.js"
/*!**********************************************************!*\
  !*** ./resources/assets/js/include/main/intersection.js ***!
  \**********************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   intersection: () => (/* binding */ intersection)
/* harmony export */ });
/* harmony import */ var _global__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../global */ "./resources/assets/js/global.js");

var intersection = function intersection() {
  // Set up an IntersectionObserver to animate cards when they enter the viewport
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        // When the card is visible
        entry.target.classList.remove('hidden');
        entry.target.classList.add('visible'); // Add 'visible' class for animation
        observer.unobserve(entry.target); // Stop observing once animated
      }
    });
  });

  // Apply the observer to all hidden cards
  (0,_global__WEBPACK_IMPORTED_MODULE_0__.qSelAll)('.card').forEach(function (card) {
    observer.observe(card); // Watch each card for visibility
  });
};

/***/ },

/***/ "./resources/assets/js/include/main/toolTips.js"
/*!******************************************************!*\
  !*** ./resources/assets/js/include/main/toolTips.js ***!
  \******************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   tooltips: () => (/* binding */ tooltips)
/* harmony export */ });
function _slicedToArray(r, e) { return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(r) { if (Array.isArray(r)) return r; }
var tooltips = function tooltips() {
  var tips = {
    whatToBuy: 'This question personalizes your advice by identifying the item you’re considering.',
    cost: 'This evaluates how the item’s cost aligns with your budget.',
    buyingFeeling: 'This explores your emotional response to making the purchase.',
    notImpulsive: 'This assesses how long you’ve been considering this purchase.',
    necessity: 'This determines whether the item is a need or a want.',
    option: 'This checks if you’ve explored other options or alternatives.',
    paymentSource: 'This identifies the funding source for your purchase.',
    affordability: 'This evaluates if the purchase fits comfortably within your financial situation.',
    concerns: 'This gauges any financial concerns, such as debt or job stability.',
    checkbox: 'This confirms your agreement to the terms to proceed.',
    submitButton: 'Please submit your responses to generate a purchase decision.'
  };
  Object.entries(tips).forEach(function (_ref) {
    var _ref2 = _slicedToArray(_ref, 2),
      key = _ref2[0],
      value = _ref2[1];
    var tipElement = document.getElementById("".concat(key, "_help"));
    if (tipElement) {
      tipElement.innerHTML = value;
    }
  });
};

/***/ },

/***/ "./resources/assets/js/main.js"
/*!*************************************!*\
  !*** ./resources/assets/js/main.js ***!
  \*************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _global__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./global */ "./resources/assets/js/global.js");
/* harmony import */ var _include_main_dataToAutoComplete__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./include/main/dataToAutoComplete */ "./resources/assets/js/include/main/dataToAutoComplete.js");
/* harmony import */ var _include_main_autocomplete__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./include/main/autocomplete */ "./resources/assets/js/include/main/autocomplete.js");
/* harmony import */ var _background_sync__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./background-sync */ "./resources/assets/js/background-sync.js");
/* harmony import */ var _include_main_toolTips__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./include/main/toolTips */ "./resources/assets/js/include/main/toolTips.js");
/* harmony import */ var _include_main_intersection__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./include/main/intersection */ "./resources/assets/js/include/main/intersection.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! axios */ "./node_modules/axios/lib/axios.js");
function _regenerator() { /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ var e, t, r = "function" == typeof Symbol ? Symbol : {}, n = r.iterator || "@@iterator", o = r.toStringTag || "@@toStringTag"; function i(r, n, o, i) { var c = n && n.prototype instanceof Generator ? n : Generator, u = Object.create(c.prototype); return _regeneratorDefine2(u, "_invoke", function (r, n, o) { var i, c, u, f = 0, p = o || [], y = !1, G = { p: 0, n: 0, v: e, a: d, f: d.bind(e, 4), d: function d(t, r) { return i = t, c = 0, u = e, G.n = r, a; } }; function d(r, n) { for (c = r, u = n, t = 0; !y && f && !o && t < p.length; t++) { var o, i = p[t], d = G.p, l = i[2]; r > 3 ? (o = l === n) && (u = i[(c = i[4]) ? 5 : (c = 3, 3)], i[4] = i[5] = e) : i[0] <= d && ((o = r < 2 && d < i[1]) ? (c = 0, G.v = n, G.n = i[1]) : d < l && (o = r < 3 || i[0] > n || n > l) && (i[4] = r, i[5] = n, G.n = l, c = 0)); } if (o || r > 1) return a; throw y = !0, n; } return function (o, p, l) { if (f > 1) throw TypeError("Generator is already running"); for (y && 1 === p && d(p, l), c = p, u = l; (t = c < 2 ? e : u) || !y;) { i || (c ? c < 3 ? (c > 1 && (G.n = -1), d(c, u)) : G.n = u : G.v = u); try { if (f = 2, i) { if (c || (o = "next"), t = i[o]) { if (!(t = t.call(i, u))) throw TypeError("iterator result is not an object"); if (!t.done) return t; u = t.value, c < 2 && (c = 0); } else 1 === c && (t = i["return"]) && t.call(i), c < 2 && (u = TypeError("The iterator does not provide a '" + o + "' method"), c = 1); i = e; } else if ((t = (y = G.n < 0) ? u : r.call(n, G)) !== a) break; } catch (t) { i = e, c = 1, u = t; } finally { f = 1; } } return { value: t, done: y }; }; }(r, o, i), !0), u; } var a = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} t = Object.getPrototypeOf; var c = [][n] ? t(t([][n]())) : (_regeneratorDefine2(t = {}, n, function () { return this; }), t), u = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(c); function f(e) { return Object.setPrototypeOf ? Object.setPrototypeOf(e, GeneratorFunctionPrototype) : (e.__proto__ = GeneratorFunctionPrototype, _regeneratorDefine2(e, o, "GeneratorFunction")), e.prototype = Object.create(u), e; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, _regeneratorDefine2(u, "constructor", GeneratorFunctionPrototype), _regeneratorDefine2(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = "GeneratorFunction", _regeneratorDefine2(GeneratorFunctionPrototype, o, "GeneratorFunction"), _regeneratorDefine2(u), _regeneratorDefine2(u, o, "Generator"), _regeneratorDefine2(u, n, function () { return this; }), _regeneratorDefine2(u, "toString", function () { return "[object Generator]"; }), (_regenerator = function _regenerator() { return { w: i, m: f }; })(); }
function _regeneratorDefine2(e, r, n, t) { var i = Object.defineProperty; try { i({}, "", {}); } catch (e) { i = 0; } _regeneratorDefine2 = function _regeneratorDefine(e, r, n, t) { function o(r, n) { _regeneratorDefine2(e, r, function (e) { return this._invoke(r, n, e); }); } r ? i ? i(e, r, { value: n, enumerable: !t, configurable: !t, writable: !t }) : e[r] = n : (o("next", 0), o("throw", 1), o("return", 2)); }, _regeneratorDefine2(e, r, n, t); }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }








// 🔹 UI Enhancements
(0,_include_main_intersection__WEBPACK_IMPORTED_MODULE_5__.intersection)();
(0,_include_main_autocomplete__WEBPACK_IMPORTED_MODULE_2__["default"])('whatToBuy', _include_main_dataToAutoComplete__WEBPACK_IMPORTED_MODULE_1__["default"]);
(0,_include_main_toolTips__WEBPACK_IMPORTED_MODULE_4__.tooltips)();

// 🔹 Validate button presence
var initBtn = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('button');
if (!initBtn) {
  throw new Error('Button not found');
}

// prompt PWA features for users to install the app from browser
// PWA install prompt
var deferredPrompt;
window.addEventListener('beforeinstallprompt', function (e) {
  e.preventDefault();
  deferredPrompt = e;
  var installButton = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('installButton');
  if (installButton) {
    installButton.style.display = 'block';
    installButton.addEventListener('click', function () {
      installButton.style.display = 'none';
      deferredPrompt.prompt();
      deferredPrompt.userChoice.then(function (choiceResult) {
        if (choiceResult.outcome === 'accepted') {
          console.log('User installed the PWA');
        }
        deferredPrompt = null;
      });
    });
  }
});

// 🔹 Form handler
initBtn.addEventListener('click', /*#__PURE__*/_asyncToGenerator(/*#__PURE__*/_regenerator().m(function _callee() {
  var whatToBuyInput, selects, whatToBuy, scores, incomplete, formData, _response$data, response, scoreData, syncBadge, _t;
  return _regenerator().w(function (_context) {
    while (1) switch (_context.p = _context.n) {
      case 0:
        whatToBuyInput = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('whatToBuy');
        selects = (0,_global__WEBPACK_IMPORTED_MODULE_0__.qSelAll)('select');
        whatToBuy = whatToBuyInput === null || whatToBuyInput === void 0 ? void 0 : whatToBuyInput.value.trim();
        scores = {};
        incomplete = false; // 🔹 Validate purchase input
        if (whatToBuy) {
          _context.n = 1;
          break;
        }
        alert('Please enter what you want to buy.');
        return _context.a(2);
      case 1:
        // 🔹 Collect dropdown values
        selects.forEach(function (select) {
          var attribute = select.getAttribute('id');
          var selected = select.options[select.selectedIndex];
          if (select.selectedIndex === 0) {
            incomplete = true;
          }
          var score = parseInt(selected === null || selected === void 0 ? void 0 : selected.getAttribute('value'));
          scores[attribute] = Number.isNaN(score) ? null : score;
        });
        if (!incomplete) {
          _context.n = 2;
          break;
        }
        alert('Please answer all dropdown questions.');
        return _context.a(2);
      case 2:
        formData = {
          whatToBuy: whatToBuy,
          scores: scores
        };
        _context.p = 3;
        if (!navigator.onLine) {
          _context.n = 6;
          break;
        }
        _context.n = 4;
        return axios__WEBPACK_IMPORTED_MODULE_6__["default"].post('/calculateResult', formData);
      case 4:
        response = _context.v;
        scoreData = response === null || response === void 0 || (_response$data = response.data) === null || _response$data === void 0 ? void 0 : _response$data.message;
        if (scoreData) {
          _context.n = 5;
          break;
        }
        throw new Error('No result returned.');
      case 5:
        sessionStorage.setItem('scoreData', JSON.stringify(scoreData));

        // Wait briefly to ensure PHP processes the session
        setTimeout(function () {
          window.location.href = 'result';
        }, 100); // Small delay to allow session to be set
        _context.n = 8;
        break;
      case 6:
        syncBadge = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('syncStatus');
        alert('You\'re offline. Your decision has been saved and will be sent when you\'re back online.');
        _context.n = 7;
        return (0,_background_sync__WEBPACK_IMPORTED_MODULE_3__.queuePostRequest)('/calculateResult', formData);
      case 7:
        // Show badge
        syncBadge.classList.remove('hidden');

        // Hide after 4 seconds (optional)
        setTimeout(function () {
          syncBadge.classList.add('hidden');
        }, 4000);
      case 8:
        _context.n = 10;
        break;
      case 9:
        _context.p = 9;
        _t = _context.v;
        console.error('Error submitting form:', _t);
        alert('An error occurred while processing your request. Please try again.');
      case 10:
        return _context.a(2);
    }
  }, _callee, null, [[3, 9]]);
})));

/***/ }

}]);
//# sourceMappingURL=main.js.map