import { qSelAll, id } from "./global";
import purchaseItems from "./dataToAutoComplete";
import autocomplete from "./autocomplete";




autocomplete('whatToBuy_id', purchaseItems)



// Define tooltips for each form question to explain their purpose
// Keys match the 'name' attributes of form elements (e.g., select, input)
const tooltips = {
  whatToBuy: "This question personalizes your advice by identifying the item you’re considering.",
  cost: "This evaluates how the item’s cost aligns with your budget.",
  buyingFeeling: "This explores your emotional response to making the purchase.",
  notImpulsive: "This assesses how long you’ve been considering this purchase.",
  necessity: "This determines whether the item is a need or a want.",
  option: "This checks if you’ve explored other options or alternatives.",
  paymentSource: "This identifies the funding source for your purchase.",
  affordability: "This evaluates if the purchase fits comfortably within your financial situation.",
  concerns: "This gauges any financial concerns, such as debt or job stability.",
  checkbox: "This confirms your agreement to the terms to proceed.",
  submitButton: "This submits your responses to generate a purchase decision."
};

Object.entries(tooltips).forEach(([key, value]) => {
  const tipElement = id(`${key}_help`);
  if (tipElement) {
    tipElement.innerHTML = value;
  }
});



// Set up an IntersectionObserver to animate cards when they enter the viewport
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) { // When the card is visible
      entry.target.classList.add("visible"); // Add 'visible' class for animation
      observer.unobserve(entry.target); // Stop observing once animated
    }
  });
});

// Define advice for high and low scores per question
const adviceConfig = {
  cost: {
    high: (item) => `Great job ensuring the ${item} fits comfortably within your budget! Keep prioritizing affordable purchases.`,
    low: (item) => `The ${item} may strain your budget. Consider cheaper alternatives or saving up to reduce financial pressure.`
  },
  buyingFeeling: {
    high: (item) => `Your enthusiasm for the ${item} is a good sign! Ensure it aligns with your financial goals.`,
    low: (item) => `If the ${item} doesn’t excite you, reflect on whether it’s worth the cost or if another option might be more fulfilling.`
  },
  notImpulsive: {
    high: (item) => `You’ve thought about the ${item} for a while, which shows great decision-making. Keep planning carefully.`,
    low: (item) => `Buying the ${item} impulsively could be risky. Take time to evaluate if it’s truly necessary.`
  },
  necessity: {
    high: (item) => `The ${item} seems essential, which supports your decision. Ensure it’s the best option available.`,
    low: (item) => `Since the ${item} is more of a want, explore if you can delay the purchase or find a more budget-friendly option.`
  },
  option: {
    high: (item) => `You’ve researched alternatives for the ${item}, which is smart! Double-check for any last-minute deals.`,
    low: (item) => `Not exploring other options for the ${item} could cost you. Shop around to find the best value.`
  },
  paymentSource: {
    high: (item) => `Using savings or a gift for the ${item} is a solid choice! This keeps your finances stable.`,
    low: (item) => `Borrowing or unclear funding for the ${item} is risky. Try saving up or using existing funds instead.`
  },
  affordability: {
    high: (item) => `You can afford the ${item} without strain—well done! Confirm it fits your long-term budget.`,
    low: (item) => `The ${item} may stretch your finances. Build a savings plan or consider a less expensive alternative.`
  },
  concerns: {
    high: (item) => `With no financial concerns, you’re in a strong position to buy the ${item}. Stay mindful of future expenses.`,
    low: (item) => `Your financial concerns suggest caution with the ${item}. Address debt or job stability before buying.`
  }
};

// Apply the observer to all hidden cards
qSelAll(".card.hidden").forEach((card) => {
  observer.observe(card); // Watch each card for visibility
});

// Function to trigger confetti animation for 'Strong BUY' results
const triggerConfetti = () => {
  try {

    import('canvas-confetti').then(confetti => {
      confetti.default(); // runs the confetti animation
      confetti({
      particleCount: 100, // Number of confetti particles
      spread: 120, // Spread angle in degrees
      origin: { y: 0.1 }, // Start near top of screen

      ticks: 300 // Longer duration
    });

    });
    // Check if confetti is available (loaded via CDN)

    
  } catch (error) {
    console.error("Error triggering confetti:", error);
  }
};


// Get the submit button
const initBtn = id("button");

// Add event listener to the button to process the form
if (!initBtn) {
  console.error("Button with ID 'button' not found."); // Log error if button is missing
} else {
  initBtn.addEventListener("click", function () {
    // Initialize variables for scoring
    let totalScore = 0; // Sum of scores from all questions
    let noQuestions = 9; // Number of scored questions
    let maxScore = 44; // Max possible score (4 for feelings, 5 for each of 8 others)

    // Get all <select> elements (dropdowns)
    const selects = qSelAll("select");
    let incomplete = false; // Flag to check if all questions are answered

    // Store scores for each question in an object
    const scores = {};
    selects.forEach((select) => {
      const attribute = select.getAttribute("name"); // Get the question's attribute (e.g., 'cost')
      const selected = select.options[select.selectedIndex]; // Get the selected option
      const score = parseInt(selected.getAttribute("value")) || 0; // Get the score (default to 0)

      // Check if the user skipped a question (selected the default option)
      if (select.selectedIndex === 0) {
        incomplete = true;
      }
      scores[attribute] = score; // Store the score
    });

    // If any question is unanswered, alert the user and stop
    if (incomplete) {
      alert("Please answer all dropdown questions.");
      return;
    }

    // Create a copy of scores for adjustments
    let adjustedScores = { ...scores };

    if (scores.paymentSource <= 2) {
      adjustedScores.affordability = Math.min(scores.affordability, 2);
    }
    if (scores.cost <= 2) {
      adjustedScores.affordability = Math.min(scores.affordability, 3);
    }
    if (scores.concerns <= 1) {
      adjustedScores.paymentSource = Math.min(scores.paymentSource, 3);
    }
    if (scores.notImpulsive === 0) {
      adjustedScores.necessity = Math.max(scores.necessity - 1, 1);
    }

    totalScore = Object.values(adjustedScores).reduce((sum, score) => sum + score, 0);
    const score = (totalScore / maxScore) * 100;

    // Generate personalized advice based on scores
    const generateAdvice = (scores, item) => {
      const advice = [];
      // Prioritize low scores (≤2) for improvement areas
      Object.entries(scores).forEach(([attr, score]) => {
        if (score <= 2 && adviceConfig[attr]?.low) {
          advice.push(adviceConfig[attr].low(item));
        }
      });
      // Add one high score (≥4) if available and advice length < 3
      if (advice.length < 3) {
        const highScore = Object.entries(scores).find(([attr, score]) => score >= 4 && adviceConfig[attr]?.high);
        if (highScore) {
          advice.push(adviceConfig[highScore[0]].high(item));
        }
      }
      // Fallback advice if none generated
      if (!advice.length) {
        advice.push(`Reflect on whether the ${item} aligns with your financial priorities and long-term goals.`);
      }
      return advice.slice(0, 3); // Limit to 3 tips
    };
    // Define decision tiers with thresholds and outputs
    const decisions = [
      {
        minScore: 85, // 85% (~37.4 points)
        decision: "STRONG BUY ✅",
        comment: "This purchase aligns perfectly with your financial goals and needs.",
        color: "success", // Green styling
        badgeText: "💰 Conscious Spender",
        badgeClass: "badge-success", // Badge styling
        resultImage: "public/images/THUMBS_UP.jpg",
        resultImageAlt: "Happy Thumbs Up",
        action: triggerConfetti // Use defined function
      },
      {
        minScore: 70, // 70% (~30.8 points)
        decision: "LIKELY BUY 👍",
        comment: "This purchase seems reasonable, but double-check your budget and priorities.",
        color: "success-light", // Lighter green for caution
        badgeText: "🧠 Savvy Planner",
        badgeClass: "badge-success-light",
        resultImage: "public/images/standing_scales.jpg",
        resultImageAlt: "Balanced Decision"
      },
      {
        minScore: 50, // 50% (~22 points)
        decision: "RECONSIDER ⚖️",
        comment: "Weigh needs versus wants carefully; consider alternatives or saving more.",
        color: "warning", // Yellow for caution
        badgeText: "🧠 Budget Boss",
        badgeClass: "badge-warning",
        resultImage: "public/images/standing_scales.jpg",
        resultImageAlt: "Neutral Balance"
      },
      {
        minScore: 0, // <50%
        decision: "DON’T BUY ❌",
        comment: "Hold off to avoid financial strain or reassess your priorities.",
        color: "danger", // Red for warning
        badgeText: "🚫 Frugal Friend",
        badgeClass: "badge-danger",
        resultImage: "public/images/disapproval.jpg",
        resultImageAlt: "Disapproval"
      }
    ];

    // Find the appropriate decision tier based on score
    // Fallback to the lowest tier if no match (shouldn't happen)
    const { decision, comment, color, badgeText, badgeClass, resultImage, resultImageAlt, action } =
      decisions.find((d) => score >= d.minScore) || decisions[decisions.length - 1];

    // Execute any special action (e.g., confetti for Strong BUY)
    if (action) action();


    // Sanitize whatToBuy input to prevent XSS
    const sanitize = (str) => str.replace(/[<>]/g, "");
    const whatToBuy = id("whatToBuy_id") ? sanitize(id("whatToBuy_id").value) : "item";

    // Generate advice
    const advice = generateAdvice(adjustedScores, whatToBuy);

    // Create an object to store all result data
    const scoreData = {
      decision, // e.g., "STRONG BUY ✅"
      score, // Percentage score
      color, // Styling class
      comment, // Feedback message
      badgeText, // Badge label
      badgeClass, // Badge styling
      resultImage, // Image path
      resultImageAlt, // Image alt text
      itemToBuy: whatToBuy, // Item name for advice
      advice // Add advice array
    };

    // Save results to sessionStorage for the result page
    sessionStorage.setItem("scoreData", JSON.stringify(scoreData));

    // Redirect to the result page
    window.location.href = "result";
  });
}

