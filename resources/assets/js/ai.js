// USE CHAT GPT API TO PROVIDE PERSONALISED ADVICE

// const chatAdvice = id("personalisedAdvice");
// const api =
//   "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";
// const deepSeek = "sk-64a9ea85bfce414da3291d3282f1ab7c";
// const testOpenApi =
//   "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";
// console.log(score);
// console.log(decision);

//  fetch("https://api.openai.com/v1/chat/completions", {
//    method: "POST",
//    headers: {
//      "Content-Type": "application/json",
//      Authorization: `Bearer ${testOpenApi}`, // Get from OpenAI
//    },
//    body: JSON.stringify({
//      model: "gpt-4o-mini",
//      store: true,
//      messages: [{ role: "user", content: "Give financial tips" }],
//    }),
//  })
//    .then((res) => res.json())
//    .then((data) => {
//      const advice =
//        data.choices[0]?.message?.content ||
//        "Based on your score, consider reviewing your financial priorities.";
//      chatAdvice.textContent = advice;
//    })
//    .catch((err) => {
//      console.error("API Error:", err);
//      chatAdvice.textContent =
//        "Here's a default tip: Always review your budget before making purchases.";
//      // Fallback advice that doesn't rely on the API
//    });

//   // ========== CACHE SYSTEM ========== //
//   const CACHE_PREFIX = "fin_advice_";
//   const CACHE_EXPIRY_HOURS = 6;

//   const getCacheKey = (score, decision) =>
//     `${CACHE_PREFIX}${Math.floor(score / 10)}_${decision.replace(/\s+/g, "_")}`;

//   const getCachedAdvice = (score, decision) => {
//     const cacheKey = getCacheKey(score, decision);
//     const cached = localStorage.getItem(cacheKey);

//     if (!cached) return null;

//     const { advice, timestamp } = JSON.parse(cached);
//     const isFresh =
//       Date.now() - timestamp < CACHE_EXPIRY_HOURS * 60 * 60 * 1000;

//     return isFresh ? advice : null;
//   };

//   const cacheAdvice = (score, decision, advice) => {
//     const cacheKey = getCacheKey(score, decision);
//     localStorage.setItem(
//       cacheKey,
//       JSON.stringify({
//         advice,
//         timestamp: Date.now(),
//       })
//     );
//   };

//   // ========== ADVICE ENGINE ========== //
//   const generateFallbackAdvice = (score) => {
//     const tips = {
//       high: [
//         "• Proceed but review monthly budget",
//         "• Allocate 20% of this cost to savings",
//         "• Track similar purchases quarterly",
//       ],
//       medium: [
//         "• Wait 48 hours before deciding",
//         "• Compare with 3 alternative options",
//         "• Set a monthly spending cap",
//       ],
//       low: [
//         "• Postpone this purchase for 30 days",
//         "• Revisit your financial goals this week",
//         "• Try a no-spend challenge for this category",
//       ],
//     };

//     const tier = score >= 75 ? "high" : score >= 50 ? "medium" : "low";
//     return tips[tier].join("\n");
//   };

//   const getScoreTier = (score) =>
//     score >= 75
//       ? "High Confidence"
//       : score >= 50
//       ? "Moderate Confidence"
//       : "Low Confidence";

//   // ========== API SERVICE ========== //
//   const fetchLiveAdvice = async (score, decision) => {
//     const PROMPT_TEMPLATE = `
//   As a robo-advisor, provide EXACTLY 3 bullet points for a user with:
//   - Score: ${score}% (${getScoreTier(score)})
//   - Verdict: ${decision}

//   Format:
//   1. Immediate action (max 50 chars)
//   2. Medium-term strategy (max 40 chars)
//   3. Long-term habit (max 30 chars)
//   `;

//     try {
//       const response = await axios.post(
//         "https://api.deepseek.com/v1/chat/completions",
//         {
//           model: "deepseek-chat",
//           messages: [
//             {
//               role: "system",
//               content:
//                 "You are a concise financial assistant. Only respond with 3 bullet points.",
//             },
//             { role: "user", content: PROMPT_TEMPLATE },
//           ],
//           temperature: 0.2,
//           max_tokens: 150,
//         },
//         {
//           headers: {
//             "Content-Type": "application/json",
//             Authorization: `Bearer ${deepSeek}`, // Set your key
//           },
//         }
//       );

//       console.log(response, "deep")

//       id("chatAdvice").textContent = response.data.choices[0]?.message?.content ||
//         generateFallbackAdvice(score)

//     } catch (error) {
//       console.error("API Error:", error);
//       return null;
//     }
//   };

//   // ========== MAIN FUNCTION ========== //
//    const getFinancialAdvice = async (score, decision) => {
//     // 1. Try cache first
//     const cachedAdvice = getCachedAdvice(score, decision);
//     if (cachedAdvice) return cachedAdvice;

//     // 2. Fetch fresh advice
//     const liveAdvice = await fetchLiveAdvice(score, decision);
//     const advice = liveAdvice || generateFallbackAdvice(score);

//     // 3. Cache and return
//     cacheAdvice(score, decision, advice);
//     return advice;
//   };

//   // ========== UI INTEGRATION ========== //
// const initAdviceWidget = () => {
//   const adviceBtn = document.getElementById("advice-btn");
//   const adviceContainer = document.getElementById("advice-container");

//   if (!adviceBtn || !adviceContainer) return;

//   adviceBtn.addEventListener("click", async () => {
//     const score = parseFloat(sessionStorage.getItem("score")) || 0;
//     const decision = sessionStorage.getItem("decision") || "Unknown";

//     // UI Loading state
//     adviceContainer.innerHTML = `
//       <div class="advice-loading">
//         <svg class="spinner" viewBox="0 0 50 50">
//           <circle cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
//         </svg>
//         <p>Generating personalized advice...</p>
//       </div>
//     `;

//     try {
//       const advice = await getFinancialAdvice(score, decision);
//       renderAdvice(advice, adviceContainer);
//     } catch (error) {
//       adviceContainer.innerHTML = `
//         <div class="advice-error">
//           <p>⚠️ Couldn't connect to advisor</p>
//           <button onclick="retryAdvice()">Try Again</button>
//           <div class="fallback-advice">
//             ${formatAdvice(generateFallbackAdvice(score))}
//           </div>
//         </div>
//       `;
//     }
//   });
// };

// const renderAdvice = (advice, container) => {
//   container.innerHTML = `
//     <div class="advice-result">
//       <h3>Your Action Plan</h3>
//       <div class="advice-bullets">${formatAdvice(advice)}</div>
//       <p class="cache-note">Tip: Advice updates every ${CACHE_EXPIRY_HOURS} hours</p>
//     </div>
//   `;
// };

// const formatAdvice = (text) =>
//   text
//     .split("\n")
//     .map((item) => `<div class="advice-item">${item}</div>`)
//     .join("");

// // Initialize on DOM load
// document.addEventListener("DOMContentLoaded", initAdviceWidget);
// 8. PDF Download with error handling
