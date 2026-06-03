"use strict";
(self["webpackChunkidecide"] = self["webpackChunkidecide"] || []).push([["result"],{

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

/***/ "./resources/assets/js/include/result/confetti.js":
/*!********************************************************!*\
  !*** ./resources/assets/js/include/result/confetti.js ***!
  \********************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   triggerConfetti: function() { return /* binding */ triggerConfetti; }
/* harmony export */ });
const triggerConfetti = () => {
  try {
    __webpack_require__.e(/*! import() */ "/js/vendor").then(__webpack_require__.bind(__webpack_require__, /*! canvas-confetti */ "./node_modules/canvas-confetti/dist/confetti.module.mjs")).then(module => {
      const confetti = module.default || module; // Handle both ES module and CommonJS
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
    }).catch(error => {
      console.error('Failed to load canvas-confetti:', error);
    });
  } catch (error) {
    console.error('Error triggering confetti:', error);
  }
};

/***/ }),

/***/ "./resources/assets/js/include/result/influences.js":
/*!**********************************************************!*\
  !*** ./resources/assets/js/include/result/influences.js ***!
  \**********************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   renderInfluences: function() { return /* binding */ renderInfluences; }
/* harmony export */ });
const renderInfluences = data => {
  const container = document.getElementById('influenceBreakdown');
  container.innerHTML = '';
  data.forEach(item => {
    let emoji, levelClass;
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
    const bar = document.createElement('div');
    bar.className = 'influence-bar';
    bar.innerHTML = `
      <div class="influence-info">
        <span>${emoji} ${item.label}</span>
        <span>${item.impact}%</span>
      </div>
      <div class="influence-progress">
        <div class="influence-fill ${levelClass}" style="width: ${item.impact}%"></div>
      </div>
    `;
    container.appendChild(bar);
  });
};

/***/ }),

/***/ "./resources/assets/js/result.js":
/*!***************************************!*\
  !*** ./resources/assets/js/result.js ***!
  \***************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/lib/axios.js");
/* harmony import */ var _global_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./global.js */ "./resources/assets/js/global.js");
/* harmony import */ var _background_sync_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./background-sync.js */ "./resources/assets/js/background-sync.js");
/* harmony import */ var _include_result_confetti_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./include/result/confetti.js */ "./resources/assets/js/include/result/confetti.js");
/* harmony import */ var _include_result_influences_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./include/result/influences.js */ "./resources/assets/js/include/result/influences.js");





try {
  // 1. Safely retrieve and parse sessionStorage data
  const savedScoreData = JSON.parse(sessionStorage.getItem('scoreData')) || {};
  if (!savedScoreData || Object.keys(savedScoreData).length === 0) {
    throw new Error('No score data found in session storage');
  }

  // 2. Set defaults for missing data
  const score = parseInt(savedScoreData.score, 10);
  const decision = savedScoreData.decision || 'Unknown';
  const color = savedScoreData.color || 'text-primary';
  const comment = savedScoreData.comment || 'No comments provided';
  const badgeText = savedScoreData.badgeText || '';
  const badgeClass = savedScoreData.badgeClass || '';
  const itemToBuy = savedScoreData.itemToBuy || 'item';
  const personalisedAdvice = savedScoreData.advice || 'No personalized advice available';
  const itemImage = savedScoreData.resultImage || 'default-image.png';

  // Define the decision triggers for confetti
  const confettiTriggers = ['WORTH CONSIDERING!', 'STRONG BUY'];

  // Trigger confetti if decision includes any trigger
  if (confettiTriggers.some(trigger => decision.includes(trigger))) {
    (0,_include_result_confetti_js__WEBPACK_IMPORTED_MODULE_3__.triggerConfetti)();
  }

  // 3. Advice options object
  const adviceOptions = {
    option1: {
      high: `Great decision to buy the ${itemToBuy}! This purchase aligns well with your needs and budget. To maximize value, consider setting aside a small savings buffer for future expenses.`,
      medium: `This purchase of the ${itemToBuy} might be tempting, but take a moment to compare alternatives or save up a bit more to avoid financial strain.`,
      low: `Holding off on buying the ${itemToBuy} is wise. Focus on paying down any debts or building an emergency fund to strengthen your financial position.`
    },
    option2: {
      high: `You're ready to buy the ${itemToBuy}! Ensure it supports your long-term goals, like enhancing your lifestyle or productivity.`,
      medium: `Pause and reflect: Does buying the ${itemToBuy} align with your priorities? Consider delaying until you’re certain it’s a need, not just a want.`,
      low: `Skipping buying the ${itemToBuy} is a smart move. Redirect your funds toward a goal that brings lasting value, like savings or skill-building.`
    },
    option3: {
      high: `Buying the ${itemToBuy} looks solid! Double-check your budget to ensure it fits comfortably, and enjoy the benefits it brings.`,
      medium: `You’re on the fence. Try researching cheaper alternatives or waiting for a sale to make buying the ${itemToBuy} more affordable.`,
      low: 'Great choice to hold off. Reassess your needs in a month or explore free alternatives to meet your goals without spending.'
    },
    option4: {
      high: `Awesome choice! buying the ${itemToBuy} is well thought out. Keep up your smart financial habits to stay on track.`,
      medium: 'Take a step back. Could you save up for this or find a similar item at a lower cost? Your wallet will thank you!',
      low: 'You’re making a savvy decision by passing on this. Focus on your financial priorities, like saving for a bigger goal.'
    }
  };

  // 4. DOM Element Safety Checks
  const scoreEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('score');
  const decisionEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('decision');
  const commentsEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('comments');
  const badgeEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('badge');
  const sliderEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('scoreSlider');
  const imgEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('image');
  const adviceEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('personalisedAdvice');
  const influencesEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('influenceBreakdown');
  if (!scoreEl || !decisionEl || !commentsEl || !badgeEl || !sliderEl || !imgEl || !adviceEl) {
    throw new Error('Required DOM elements not found');
  }

  // 5. Animated score counter and gauge
  let i = 0;
  const gaugeProgress = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('gaugeProgress');
  const circumference = 2 * Math.PI * 90; // r=90

  const interval = setInterval(() => {
    try {
      if (i <= score) {
        if (scoreEl) scoreEl.textContent = i + '%';
        if (sliderEl) sliderEl.value = i;

        // Update gauge
        if (gaugeProgress) {
          const offset = circumference - i / 100 * circumference;
          gaugeProgress.style.strokeDashoffset = offset;
        }

        // Highlight smiley
        document.querySelectorAll('.smiley').forEach(s => {
          const sScore = parseInt(s.dataset.score);
          if (i >= sScore && i < sScore + 20) {
            s.classList.add('active');
          } else {
            s.classList.remove('active');
          }
        });
        i++;
      } else {
        clearInterval(interval);
      }
    } catch (e) {
      clearInterval(interval);
    }
  }, 20);

  // 6. Set DOM content with fallbacks
  decisionEl.textContent = decision;
  decisionEl.classList.add(color);
  if (commentsEl) {
    commentsEl.textContent = comment;
    const commentsCard = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('commentsCard');
    if (commentsCard && comment && comment !== 'No comments provided') {
      commentsCard.style.display = 'block';
    }
  }
  if (imgEl) {
    imgEl.src = savedScoreData.resultImage || '';
    imgEl.alt = savedScoreData.resultImageAlt || '';
  }
  if (badgeText) badgeEl.textContent = badgeText;
  if (badgeClass) badgeEl.classList.add(badgeClass);

  // 7. Personalized advice using option1
  let advice = '';
  if (score >= 75) {
    advice = adviceOptions.option1.high;
  } else if (score >= 50) {
    advice = adviceOptions.option1.medium;
  } else {
    advice = adviceOptions.option1.low;
  }
  adviceEl.textContent = advice;

  // AI Advice Display
  const aiAdviceEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('aiAdvice');
  if (aiAdviceEl) {
    aiAdviceEl.textContent = savedScoreData.aiAdvice || 'The Budget Boss AI is reflecting on your decision...';
  }

  // Populate advice list
  const adviceList = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('advice-list');
  if (savedScoreData.advice && Array.isArray(savedScoreData.advice)) {
    savedScoreData.advice.forEach(tip => {
      const li = document.createElement('li');
      li.classList.add('list-group-items');
      li.textContent = tip;
      adviceList.appendChild(li);
    });
  } else {
    const li = document.createElement('li');
    li.textContent = 'No specific advice available. Review your answers for better insights.';
    adviceList.appendChild(li);
  }

  // 8. Set slider value
  sliderEl.value = score;

  // 9. Sharing features with safety checks
  try {
    const pageUrl = encodeURIComponent(window.location.href);
    const shareText = `I got a ${score}% decision score using iDecide! ${pageUrl}`;
    const twitterShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('twitterShare');
    if (twitterShare) {
      twitterShare.href = `https://twitter.com/intent/tweet?text=${shareText}`;
    }
    const whatsappShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('whatsappShare');
    if (whatsappShare) {
      whatsappShare.href = `https://api.whatsapp.com/send?text=${shareText}`;
    }
    const facebookShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('facebookShare');
    if (facebookShare) {
      facebookShare.href = `https://www.facebook.com/sharer/sharer.php?u=${pageUrl}&quote=${shareText}`;
    }
    const truthSocialShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('truthSocialShare');
    if (truthSocialShare) {
      truthSocialShare.href = `https://truthsocial.com/share?text=${shareText}%20${pageUrl}`;
    }
    const linkedinShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('linkedinShare');
    if (linkedinShare) {
      linkedinShare.href = `https://www.linkedin.com/sharing/share-offsite/?url=${pageUrl}&title=${shareText}`;
    }
    const redditShare = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('redditShare');
    if (redditShare) {
      redditShare.href = `https://www.reddit.com/submit?url=${pageUrl}&title=${shareText}`;
    }
  } catch (shareError) {
    console.error('Share feature error:', shareError);
  }

  // 10. PDF download feature
  try {
    const downloadBtn = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('downloadPDF');
    if (downloadBtn) {
      downloadBtn.addEventListener('click', () => {
        try {
          const jsPDFLib = window.jspdf || window.window && window.window.jspdf;
          if (!jsPDFLib) {
            alert('PDF generator library is still loading. Please try again in a moment.');
            return;
          }
          const {
            jsPDF
          } = jsPDFLib;
          const doc = new jsPDF();

          // Helper to clean emojis and high-unicode layout-breakers to prevent horizontal spacing glitches in Helvetica
          const stripEmojis = str => {
            if (!str) return '';
            return str.replace(/[\u2700-\u27BF]|[\uE000-\uF8FF]|\uD83C[\uDC00-\uDFFF]|\uD83D[\uDC00-\uDFFF]|[\u2011-\u26FF]|\uD83E[\uDC00-\uDFFF]/g, '').replace(/[\uD800-\uDBFF][\uDC00-\uDFFF]/g, '').replace(/[^\x00-\x7F]/g, '') // Clean ASCII guarantees normal Helvetica spacing & zero corrupted characters
            .replace(/\s+/g, ' ').trim();
          };
          const cleanItem = stripEmojis(itemToBuy);
          const cleanDecision = stripEmojis(decision);
          const cleanAdvice = stripEmojis(personalisedAdvice || advice || 'No advice available.');
          const cleanComment = stripEmojis(comment);
          const cleanAI = stripEmojis(savedScoreData.aiAdvice);

          // Brand Accent Color & Fonts
          doc.setTextColor(27, 94, 32); // #1B5E20 Green
          doc.setFont('Helvetica', 'bold');
          doc.setFontSize(22);
          doc.text('iDecide', 15, 20);
          doc.setFontSize(10);
          doc.setTextColor(100, 116, 139); // Subtle Slate
          doc.setFont('Helvetica', 'normal');
          doc.text('RATIONAL BUYING DECISION REPORT', 15, 25);
          doc.text(`Generated on: ${new Date().toLocaleDateString()}`, 130, 20);

          // Divider Line
          doc.setDrawColor(226, 232, 240); // Lighter border
          doc.setLineWidth(0.5);
          doc.line(15, 30, 195, 30);

          // Details Section
          doc.setTextColor(15, 23, 42); // Primary Slate
          doc.setFont('Helvetica', 'bold');
          doc.setFontSize(13);
          doc.text('Purchase Overview', 15, 42);
          doc.setFont('Helvetica', 'normal');
          doc.setFontSize(11);
          doc.text('Evaluated Item:', 15, 50);
          doc.setFont('Helvetica', 'bold');
          doc.text(cleanItem, 50, 50);
          doc.setFont('Helvetica', 'normal');
          doc.text('Decision Score:', 15, 57);
          doc.setFont('Helvetica', 'bold');
          if (score >= 70) {
            doc.setTextColor(34, 197, 94); // Green
          } else if (score >= 50) {
            doc.setTextColor(245, 158, 11); // Amber
          } else {
            doc.setTextColor(239, 68, 68); // Red
          }
          doc.text(`${score}%`, 50, 57);
          doc.setTextColor(15, 23, 42);
          doc.setFont('Helvetica', 'normal');
          doc.text('Verdict:', 15, 64);
          doc.setFont('Helvetica', 'bold');
          doc.text(cleanDecision, 50, 64);

          // Divider
          doc.setDrawColor(226, 232, 240);
          doc.line(15, 72, 195, 72);

          // Personal Guidance Section
          doc.setTextColor(15, 23, 42);
          doc.setFont('Helvetica', 'bold');
          doc.setFontSize(13);
          doc.text('Personalized Guidance', 15, 84);
          doc.setFont('Helvetica', 'normal');
          doc.setFontSize(10.5);
          doc.setTextColor(51, 65, 85);
          const wrappedAdvice = doc.splitTextToSize(cleanAdvice, 175);
          doc.text(wrappedAdvice, 15, 92);

          // Get the Y position after the advice text to avoid overlap
          let currentY = 92 + wrappedAdvice.length * 5 + 8;

          // Reviewer Comments Section
          if (comment && comment !== 'No comments provided') {
            doc.setDrawColor(226, 232, 240);
            doc.line(15, currentY, 195, currentY);
            currentY += 12;
            doc.setTextColor(15, 23, 42);
            doc.setFont('Helvetica', 'bold');
            doc.setFontSize(13);
            doc.text("Reviewer's Comments", 15, currentY);
            currentY += 8;
            doc.setFont('Helvetica', 'normal');
            doc.setFontSize(10.5);
            doc.setTextColor(51, 65, 85);
            const wrappedComments = doc.splitTextToSize(cleanComment, 175);
            doc.text(wrappedComments, 15, currentY);
            currentY += wrappedComments.length * 5 + 8;
          }

          // AI Expert Verdict Section
          if (cleanAI && cleanAI !== 'Consulting the financial experts...') {
            doc.setDrawColor(226, 232, 240);
            doc.line(15, currentY, 195, currentY);
            currentY += 12;
            doc.setTextColor(15, 23, 42);
            doc.setFont('Helvetica', 'bold');
            doc.setFontSize(13);
            doc.text("Budget Boss AI Verdict", 15, currentY);
            currentY += 8;
            doc.setFont('Helvetica', 'italic');
            doc.setFontSize(10.5);
            doc.setTextColor(51, 65, 85);
            const wrappedAI = doc.splitTextToSize(cleanAI, 175);
            doc.text(wrappedAI, 15, currentY);
            currentY += wrappedAI.length * 5 + 8;
          }

          // Footer branding
          doc.setDrawColor(226, 232, 240);
          doc.line(15, 275, 195, 275);
          doc.setFont('Helvetica', 'normal');
          doc.setFontSize(9);
          doc.setTextColor(148, 163, 184);
          doc.text('iDecide - Smart and Rational Consumer Purchase Assistant', 15, 282);
          doc.text('https://idecide.app', 160, 282);
          doc.save(`iDecide_Result_${cleanItem.replace(/\s+/g, '_')}.pdf`);
        } catch (pdfError) {
          (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.showError)('Failed to generate PDF');
          console.error('PDF generation error:', pdfError);
        }
      });
    }
  } catch (pdfInitError) {
    console.error('PDF button initialization error:', pdfInitError);
  }

  // 11. make the submit button bigger by adding a class btn-lg and btn-block 
  const submitBtn = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('button');
  if (submitBtn) {
    submitBtn.classList.add('btn-lg', 'btn-block');
  }

  // 12. Render influences using the imported function

  if (influencesEl && savedScoreData.influences && Array.isArray(savedScoreData.influences)) {
    // Render the breakdown immediately on load as the default state
    (0,_include_result_influences_js__WEBPACK_IMPORTED_MODULE_4__.renderInfluences)(savedScoreData.influences);
    document.getElementById('toggleInfluences')?.addEventListener('click', function () {
      const breakdown = document.getElementById('influenceBreakdown');
      const isVisible = breakdown.style.display === 'block' || breakdown.style.display === '';
      breakdown.style.display = isVisible ? 'none' : 'block';
      this.innerHTML = isVisible ? '<i class="fas fa-chart-simple"></i> Show Influencing Factors' : '<i class="fas fa-chart-simple"></i> Hide Influencing Factors';
      if (!isVisible) {
        setTimeout(() => {
          breakdown.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }, 300);
      }
    });
  }

  // 13. Render Recommendations (Affiliate Links)
  const recsContainer = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('affiliateSection');
  const recsList = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('recommendationsList');
  if (recsContainer && recsList && savedScoreData.recommendations && Array.isArray(savedScoreData.recommendations)) {
    recsContainer.style.display = 'block';
    recsList.innerHTML = ''; // Clear previous

    savedScoreData.recommendations.forEach(rec => {
      const col = document.createElement('div');
      col.className = 'col-md-4';

      // Construct affiliate search link (Example: Amazon search)
      // You can replace 'your-tag-20' with your actual affiliate ID
      const affiliateId = 'your-tag-20';
      const searchUrl = `https://www.amazon.com/s?k=${encodeURIComponent(rec.model)}&tag=${affiliateId}`;
      col.innerHTML = `
        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
          <div class="card-body p-3 text-center">
            <span class="badge bg-light text-primary mb-2 rounded-pill small">${rec.category}</span>
            <h6 class="fw-bold mb-2">${rec.model}</h6>
            <p class="text-muted smallest mb-3" style="font-size: 0.75rem;">${rec.reason}</p>
            <a href="${searchUrl}" target="_blank" class="btn btn-sm btn-primary w-100 rounded-pill fw-bold">
              <i class="fas fa-shopping-cart me-1"></i> Buy Now
            </a>
          </div>
        </div>
      `;
      recsList.appendChild(col);
    });
  }

  //13. email result to the user 
  const emailBtn = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('submitResult');
  if (emailBtn) {
    emailBtn.addEventListener('click', async e => {
      e.preventDefault();
      const email = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('email').value;
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      const emailModal = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('emailModal');
      if (!email || !emailRegex.test(email)) {
        (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.showError)('Please enter a valid email address');
        return;
      }
      const resultData = {
        email,
        score,
        decision,
        comment,
        itemToBuy,
        advice,
        personalisedAdvice,
        itemImage,
        influencesEl,
        aiAdvice: savedScoreData.aiAdvice || ''
      };
      try {
        if (navigator.onLine) {
          const response = await axios__WEBPACK_IMPORTED_MODULE_0__["default"].post('/emailResult', resultData);
          if (response.data && response.data.status === 'success') {
            // Show success message
            const emailHelp = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('emailHelp');
            if (emailHelp) {
              emailHelp.textContent = response.data.message || 'Email sent successfully!';
              emailHelp.classList.add('text-success');
            }

            // set timer for 3 seconds to hide the modal
            setTimeout(() => {
              const modal = bootstrap.Modal.getInstance(emailModal);
              if (modal) modal.hide();
            }, 3000);
          } else {
            throw new Error(response.data.error || 'Failed to send email. Please try again later.');
          }
        } else {
          await (0,_background_sync_js__WEBPACK_IMPORTED_MODULE_2__.queuePostRequest)('/emailResult', resultData);
        }
      } catch (emailError) {
        console.error('Email sending error:', emailError);
      }
    });
  }
} catch (mainError) {
  console.error('Main execution error:', mainError);
  (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.showError)(mainError);

  // Fallback UI state
  // const scoreEl = id("score");
  if (scoreEl) scoreEl.textContent = '0%';
  const decisionEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('decision');
  if (decisionEl) decisionEl.textContent = 'Error';

  // const adviceEl = id("personalisedAdvice");
  if (adviceEl) adviceEl.textContent = 'Unable to provide advice due to an error.';

  // Hide optional elements
  const sliderEl = (0,_global_js__WEBPACK_IMPORTED_MODULE_1__.id)('scoreSlider');
  if (sliderEl) sliderEl.style.display = 'none';
}

/***/ })

}]);
//# sourceMappingURL=result.js.map