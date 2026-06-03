"use strict";
(self["webpackChunkidecide"] = self["webpackChunkidecide"] || []).push([["main"],{

/***/ "./resources/assets/js/background-sync.js":
/*!************************************************!*\
  !*** ./resources/assets/js/background-sync.js ***!
  \************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   queuePostRequest: function() { return /* binding */ queuePostRequest; },
/* harmony export */   sendQueuedRequests: function() { return /* binding */ sendQueuedRequests; }
/* harmony export */ });
// background-sync.js

// 🔐 Module-wide constants
const DB_NAME = 'idecide-sync'; // The name of your local mini-database
const STORE_NAME = 'queued-posts'; // A place to store POST requests
const SYNC_TAG = 'sync-idecide-data';

// 🧰 Open or upgrade the local IndexedDB queue
function openDB() {
  return new Promise((resolve, reject) => {
    const request = indexedDB.open(DB_NAME, 1);
    // This only runs the first time (or if you bump version)
    request.onupgradeneeded = () => {
      // Create an object store to save queued data with auto-incremented IDs
      request.result.createObjectStore(STORE_NAME, {
        keyPath: 'id',
        autoIncrement: true
      });
    };
    request.onsuccess = () => resolve(request.result); // DB opened successfully
    request.onerror = () => reject(request.error); // Something went wrong
  });
}

// 💾 Add a POST request to the queue
async function queuePostRequest(url, body) {
  const db = await openDB();
  const tx = db.transaction(STORE_NAME, 'readwrite');
  tx.objectStore(STORE_NAME).add({
    url,
    body
  });
  await tx.complete;

  // 📡 Ask the Service Worker to sync when online
  const reg = await navigator.serviceWorker.ready;
  if ('sync' in reg) {
    await reg.sync.register(SYNC_TAG);
  } else {
    // fallback sync attempt
    await sendQueuedRequests();
  }
}

// 📤 Send all queued requests
async function sendQueuedRequests(showToast = true) {
  const db = await openDB();
  const tx = db.transaction(STORE_NAME, 'readwrite');
  const store = tx.objectStore(STORE_NAME);
  const requests = await store.getAll();
  for (const entry of requests) {
    try {
      const res = await fetch(entry.url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(entry.body)
      });
      if (res.ok) {
        store.delete(entry.id); // 👋 Clean up if it worked
        if (showToast) showSyncToast('✅ Sent saved data to server');
      } else {
        throw new Error('Bad response');
      }
    } catch (err) {
      // Still offline? Quietly keep in queue
    }
  }
  await tx.complete;
}

// 🔔 Lightweight toast for visual feedbackNow every time a saved request syncs in the background, your user gets:

// A melodic chime 🔔

// A stylish toast bubble 💬

// Whimsical emoji confetti 🎈✨🧠
function showSyncToast(message) {
  // Create and play success chime
  const audio = new Audio('/sounds/success-chime.mp3');
  audio.volume = 0.4;
  audio.play().catch(() => {}); // Prevent errors if user hasn’t interacted yet

  // Create the visual toast
  const toast = document.createElement('div');
  toast.innerHTML = `<span>💬</span> ${message}`;
  toast.style = `
    position: fixed;
    bottom: 1.5rem;
    right: 1.5rem;
    background: linear-gradient(135deg, #00695c, #26a69a);
    color: #fff;
    padding: 1rem 1.5rem;
    border-radius: 8px;
    font-size: 0.95rem;
    font-family: system-ui, sans-serif;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    z-index: 10000;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.4s ease, transform 0.4s ease;
  `;
  document.body.appendChild(toast);

  // Animate in
  requestAnimationFrame(() => {
    toast.style.opacity = '1';
    toast.style.transform = 'translateY(0)';
  });

  // Fade out after delay
  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateY(20px)';
    setTimeout(() => toast.remove(), 400);
  }, 4000);

  // 🌟 Add floating confetti emojis!
  for (let i = 0; i < 10; i++) {
    const emoji = document.createElement('div');
    emoji.textContent = ['🎈', '✨', '🪄', '🎉', '🧠'][Math.floor(Math.random() * 5)];
    emoji.style = `
      position: fixed;
      left: ${Math.random() * 100}vw;
      bottom: 0;
      font-size: 1.5rem;
      animation: float-up 2.5s ease-out forwards;
      z-index: 9999;
    `;
    document.body.appendChild(emoji);
    setTimeout(() => emoji.remove(), 3000);
  }

  // Floating animation
  const style = document.createElement('style');
  style.textContent = `
    @keyframes float-up {
      0% { transform: translateY(0); opacity: 1; }
      100% { transform: translateY(-150px); opacity: 0; }
    }
  `;
  document.head.appendChild(style);
}

/***/ }),

/***/ "./resources/assets/js/global.js":
/*!***************************************!*\
  !*** ./resources/assets/js/global.js ***!
  \***************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   bindEvent: function() { return /* binding */ bindEvent; },
/* harmony export */   id: function() { return /* binding */ id; },
/* harmony export */   log: function() { return /* binding */ log; },
/* harmony export */   qSel: function() { return /* binding */ qSel; },
/* harmony export */   qSelAll: function() { return /* binding */ qSelAll; },
/* harmony export */   showError: function() { return /* binding */ showError; }
/* harmony export */ });
const id = x => document.getElementById(x);
const qSelAll = x => document.querySelectorAll(x);
const qSel = x => document.querySelector(x);
const showError = e => {
  log(e.message, ' ERROR MESSAGE'); // "null has no properties"
  log(e.name, ' ERROR NAME'); // "TypeError"
  log(e.fileName, ' ERROR FILENAME'); // "Scratchpad/1"
  log(e.lineNumber, ' ERROR LINENUMBER'); // 2

  log(e.stack);
};
const log = (x, describe = null) => console.log(x, describe);
function bindEvent({
  id,
  event = 'click',
  handler
}) {
  const el = document.getElementById(id);
  if (el && typeof handler === 'function') {
    el.addEventListener(event, handler);
  }
}

/***/ }),

/***/ "./resources/assets/js/include/main/autocomplete.js":
/*!**********************************************************!*\
  !*** ./resources/assets/js/include/main/autocomplete.js ***!
  \**********************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _global__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../global */ "./resources/assets/js/global.js");

/**
 *
 * @param {string} inputId
 * @param {Array} arr
 */

const autocomplete = (inputId, arr) => {
  const whatToBuyInput = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)(inputId); // Get the text input
  if (whatToBuyInput) {
    // Create a <ul> for autocomplete suggestions
    const suggestionList = document.createElement('ul');
    suggestionList.classList.add('autocomplete-suggestions');
    suggestionList.id = 'suggestions'; // For accessibility
    whatToBuyInput.parentElement.appendChild(suggestionList); // Append to input's parent

    // Function to show matching suggestions based on user input
    const showSuggestions = inputValue => {
      suggestionList.innerHTML = ''; // Clear previous suggestions
      if (!inputValue) return; // Exit if input is empty

      // Filter items that match the input (case-insensitive), limit to 8
      const matches = arr.filter(item => item.toLowerCase().includes(inputValue.toLowerCase())).slice(0, 8);

      // Create <li> for each match
      matches.forEach((item, index) => {
        const li = document.createElement('li');
        li.textContent = item;
        li.setAttribute('tabindex', '0'); // Make focusable for keyboard
        li.setAttribute('data-index', index); // Store index for navigation
        li.addEventListener('click', () => {
          whatToBuyInput.value = item; // Set input value on click
          suggestionList.innerHTML = ''; // Clear suggestions
        });
        li.addEventListener('keypress', e => {
          if (e.key === 'Enter') {
            whatToBuyInput.value = item; // Set input value on Enter
            suggestionList.innerHTML = ''; // Clear suggestions
          }
        });
        suggestionList.appendChild(li);
      });
    };

    // Show suggestions as user types
    whatToBuyInput.addEventListener('input', e => {
      showSuggestions(e.target.value);
    });

    // Clear suggestions on blur (with delay for click to register)
    whatToBuyInput.addEventListener('blur', () => {
      setTimeout(() => suggestionList.innerHTML = '', 200);
    });

    // Handle keyboard navigation for suggestions
    whatToBuyInput.addEventListener('keydown', e => {
      const suggestions = suggestionList.querySelectorAll('li');
      if (!suggestions.length) return; // Exit if no suggestions

      let focusedIndex = Array.from(suggestions).findIndex(li => li === document.activeElement);
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
/* harmony default export */ __webpack_exports__["default"] = (autocomplete);

/***/ }),

/***/ "./resources/assets/js/include/main/dataToAutoComplete.js":
/*!****************************************************************!*\
  !*** ./resources/assets/js/include/main/dataToAutoComplete.js ***!
  \****************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
const purchaseItems = ['Acoustic guitar', 'Air conditioner', 'AirPods', 'Apple Watch', 'Bicycle', 'Blender (high-end)', 'Camera (DSLR/mirrorless)', 'Camping gear', 'Car (new or used)', 'Car seat (premium)', 'Coffee maker (espresso)', 'Cooling mattress', 'Designer handbag', 'Desktop computer', 'Dishwasher', 'Drone', 'Holiday', 'Electric guitar', 'Electric scooter', 'Electric toothbrush', 'Espresso machine', 'Exercise bike', 'Eyeglasses (designer)', 'Fitness tracker', 'Gaming console', 'Gaming chair', 'Gold jewelry', 'Golf clubs', 'Grill (outdoor)', 'Headphones (noise-canceling)', 'Home gym equipment', 'Home security system', 'Hot tub', 'iPad', 'Jeans (premium)', 'Kayak', 'Kitchen mixer (stand)', 'Laptop', 'Leather jacket', 'Luggage set', 'Luxury watch (Rolex, Casio)', 'Massage chair', 'Mattress', 'Microwave (smart)', 'Motorcycle', 'Mountain bike', 'Music production software', 'Noise-canceling earbuds', 'Oven (convection)', 'Patio furniture', 'Pet insurance', 'Photography lighting kit', 'Piano (digital)', 'Power tools (drill set)', 'Printer (3D)', 'Projector', 'Ray-Ban sunglasses', 'Refrigerator', 'Robot vacuum', 'Running shoes (premium)', 'Ski equipment', 'Smart doorbell', 'Smart garage door opener', 'Smart speaker', 'Smartphone', 'Smartwatch', 'Sneakers (designer)', 'Snowboard', 'Sofa', 'Soundbar', 'Streaming subscription (Netflix, Disney+)', 'Surfboard', 'Tablet', 'Television (4K)', 'Tent (backpacking)', 'Treadmill', 'Vacuum cleaner (cordless)', 'Vacation package', 'Video camera', 'Video game (AAA title)', 'Vinyl record player', 'VR headset', 'Washing machine', 'Wedding ring', 'Weighted blanket', 'Wireless charger', 'Yoga retreat', 'Home theater system', 'Diving gear', 'Electric car charger', 'Telescope', 'Designer suit', 'Art print (original)', 'Collectible figurine', 'Gym membership', 'Smart thermostat', 'E-reader (Kindle)', 'Portable generator', 'Skateboard (electric)', 'Leather boots', 'Craft supplies (sewing machine)', 'Snooker table', 'Gym membership', 'Smart thermostat', 'E-reader (Kindle)', 'Gym bag', 'Snooker table', 'Plane tickets', 'Train tickets', 'Bus passes', 'Taxi rides', 'Rideshares', 'Fuel', 'Motor oil', 'Car tyres', 'Car battery', 'Car accessories', 'Helmet', 'Motorbike gear', 'Travel insurance', 'Hotel stay', 'Hostel stay', 'Holiday rental', 'Camping pitch', 'Luggage', 'Suitcase', 'Backpack', 'Travel pillow', 'Eye mask', 'Ear plugs', 'Maps', 'Guidebook', 'Camping stove', 'Cooler box', 'Hiking poles', 'Surfboard', 'Ski equipment'];
/* harmony default export */ __webpack_exports__["default"] = (purchaseItems);

/***/ }),

/***/ "./resources/assets/js/include/main/intersection.js":
/*!**********************************************************!*\
  !*** ./resources/assets/js/include/main/intersection.js ***!
  \**********************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   intersection: function() { return /* binding */ intersection; }
/* harmony export */ });
/* harmony import */ var _global__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../global */ "./resources/assets/js/global.js");

const intersection = () => {
  // Set up an IntersectionObserver to animate cards when they enter the viewport
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // When the card is visible
        entry.target.classList.remove('hidden');
        entry.target.classList.add('visible'); // Add 'visible' class for animation
        observer.unobserve(entry.target); // Stop observing once animated
      }
    });
  });

  // Apply the observer to all hidden cards
  (0,_global__WEBPACK_IMPORTED_MODULE_0__.qSelAll)('.card').forEach(card => {
    observer.observe(card); // Watch each card for visibility
  });
};

/***/ }),

/***/ "./resources/assets/js/include/main/toolTips.js":
/*!******************************************************!*\
  !*** ./resources/assets/js/include/main/toolTips.js ***!
  \******************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   tooltips: function() { return /* binding */ tooltips; }
/* harmony export */ });
const tooltips = () => {
  const tips = {
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
  Object.entries(tips).forEach(([key, value]) => {
    const tipElement = document.getElementById(`${key}_help`);
    if (tipElement) {
      tipElement.innerHTML = value;
    }
  });
};

/***/ }),

/***/ "./resources/assets/js/main.js":
/*!*************************************!*\
  !*** ./resources/assets/js/main.js ***!
  \*************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _global__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./global */ "./resources/assets/js/global.js");
/* harmony import */ var _include_main_dataToAutoComplete__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./include/main/dataToAutoComplete */ "./resources/assets/js/include/main/dataToAutoComplete.js");
/* harmony import */ var _include_main_autocomplete__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./include/main/autocomplete */ "./resources/assets/js/include/main/autocomplete.js");
/* harmony import */ var _background_sync__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./background-sync */ "./resources/assets/js/background-sync.js");
/* harmony import */ var _include_main_toolTips__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./include/main/toolTips */ "./resources/assets/js/include/main/toolTips.js");
/* harmony import */ var _include_main_intersection__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./include/main/intersection */ "./resources/assets/js/include/main/intersection.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! axios */ "./node_modules/axios/lib/axios.js");








// 🔹 UI Enhancements
(0,_include_main_intersection__WEBPACK_IMPORTED_MODULE_5__.intersection)();
(0,_include_main_autocomplete__WEBPACK_IMPORTED_MODULE_2__["default"])('whatToBuy', _include_main_dataToAutoComplete__WEBPACK_IMPORTED_MODULE_1__["default"]);
(0,_include_main_toolTips__WEBPACK_IMPORTED_MODULE_4__.tooltips)();

// 🔹 Validate button presence
const initBtn = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('button');
if (!initBtn) {
  throw new Error('Button not found');
}

// prompt PWA features for users to install the app from browser
// PWA install prompt
let deferredPrompt;
window.addEventListener('beforeinstallprompt', e => {
  e.preventDefault();
  deferredPrompt = e;
  const installButton = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('installButton');
  if (installButton) {
    installButton.style.display = 'block';
    installButton.addEventListener('click', () => {
      installButton.style.display = 'none';
      deferredPrompt.prompt();
      deferredPrompt.userChoice.then(choiceResult => {
        if (choiceResult.outcome === 'accepted') {
          console.log('User installed the PWA');
        }
        deferredPrompt = null;
      });
    });
  }
});

// 🔹 Form handler
initBtn.addEventListener('click', async () => {
  const whatToBuyInput = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('whatToBuy');
  const notesInput = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('notes');
  const isPublicInput = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('isPublic');
  const selects = (0,_global__WEBPACK_IMPORTED_MODULE_0__.qSelAll)('select');
  const whatToBuy = whatToBuyInput?.value.trim();
  const notes = notesInput?.value.trim();
  const isPublic = isPublicInput ? isPublicInput.checked : false;
  const scores = {};
  let incomplete = false;

  // 🔹 Validate purchase input
  if (!whatToBuy) {
    alert('Please enter what you want to buy.');
    return;
  }

  // 🔹 Collect dropdown values
  selects.forEach(select => {
    const attribute = select.getAttribute('id');
    const selected = select.options[select.selectedIndex];
    if (select.selectedIndex === 0 && attribute !== 'notes') {
      incomplete = true;
    }
    const score = parseInt(selected?.getAttribute('value'));
    if (attribute !== 'notes') {
      scores[attribute] = Number.isNaN(score) ? null : score;
    }
  });
  if (incomplete) {
    alert('Please answer all dropdown questions.');
    return;
  }
  const formData = {
    whatToBuy,
    scores,
    notes,
    isPublic
  };
  try {
    if (navigator.onLine) {
      const response = await axios__WEBPACK_IMPORTED_MODULE_6__["default"].post('/calculateResult', formData);
      const scoreData = response?.data?.message;
      if (!scoreData) {
        throw new Error('No result returned.');
      }
      sessionStorage.setItem('scoreData', JSON.stringify(scoreData));

      // Wait briefly to ensure PHP processes the session
      setTimeout(() => {
        window.location.href = 'result';
      }, 100); // Small delay to allow session to be set
    } else {
      const syncBadge = (0,_global__WEBPACK_IMPORTED_MODULE_0__.id)('syncStatus');
      alert('You\'re offline. Your decision has been saved and will be sent when you\'re back online.');
      await (0,_background_sync__WEBPACK_IMPORTED_MODULE_3__.queuePostRequest)('/calculateResult', formData);
      // Show badge
      syncBadge.classList.remove('hidden');

      // Hide after 4 seconds (optional)
      setTimeout(() => {
        syncBadge.classList.add('hidden');
      }, 4000);
    }
  } catch (error) {
    console.error('Error submitting form:', error);
    alert('An error occurred while processing your request. Please try again.');
  }
});

/***/ })

}]);
//# sourceMappingURL=main.js.map