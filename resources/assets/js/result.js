import axios from "axios";
import { id, log, showError } from "./global.js";
import { queuePostRequest } from "./background-sync.js";
import {triggerConfetti} from "./include/result/confetti.js"

try {
  // 1. Safely retrieve and parse sessionStorage data
  const savedScoreData = JSON.parse(sessionStorage.getItem("scoreData")) || {};

  log("Saved score data:", savedScoreData);
  log("Session storage data:", sessionStorage.getItem("scoreData"));


  if (!savedScoreData || Object.keys(savedScoreData).length === 0) {
    throw new Error("No score data found in session storage");
  }

  // 2. Set defaults for missing data
  const score = parseInt(savedScoreData.score, 10);
  const decision = savedScoreData.decision || "Unknown";
  const color = savedScoreData.color || "text-primary";
  const comment = savedScoreData.comment || "No comments provided";
  const badgeText = savedScoreData.badgeText || "";
  const badgeClass = savedScoreData.badgeClass || "";
  const itemToBuy = savedScoreData.itemToBuy || "item";
  const personalisedAdvice = savedScoreData.advice || "No personalized advice available";
  const itemImage = savedScoreData.resultImage || "default-image.png";

          // Define the decision triggers for confetti
        const confettiTriggers = ["WORTH CONSIDERING!", "STRONG BUY"];

        // Trigger confetti if decision includes any trigger
        if (confettiTriggers.some(trigger => decision.includes(trigger))) {
          triggerConfetti();
        }


  // 3. Advice options object
  const adviceOptions = {
    option1: {
      high: `Great decision to buy the ${itemToBuy}! This purchase aligns well with your needs and budget. To maximize value, consider setting aside a small savings buffer for future expenses.`,
      medium: `This purchase of the ${itemToBuy} might be tempting, but take a moment to compare alternatives or save up a bit more to avoid financial strain.`,
      low: `Holding off on buying the ${itemToBuy} is wise. Focus on paying down any debts or building an emergency fund to strengthen your financial position.`,
    },
    option2: {
      high: `You're ready to buy the ${itemToBuy}! Ensure it supports your long-term goals, like enhancing your lifestyle or productivity.`,
      medium:
        `Pause and reflect: Does buying the ${itemToBuy} align with your priorities? Consider delaying until you’re certain it’s a need, not just a want.`,
      low: `Skipping buying the ${itemToBuy} is a smart move. Redirect your funds toward a goal that brings lasting value, like savings or skill-building.`,
    },
    option3: {
      high: `Buying the ${itemToBuy} looks solid! Double-check your budget to ensure it fits comfortably, and enjoy the benefits it brings.`,
      medium:
        `You’re on the fence. Try researching cheaper alternatives or waiting for a sale to make buying the ${itemToBuy} more affordable.`,
      low: `Great choice to hold off. Reassess your needs in a month or explore free alternatives to meet your goals without spending.`,
    },
    option4: {
      high: `Awesome choice! buying the ${itemToBuy} is well thought out. Keep up your smart financial habits to stay on track.`,
      medium:
        `Take a step back. Could you save up for this or find a similar item at a lower cost? Your wallet will thank you!`,
      low: `You’re making a savvy decision by passing on this. Focus on your financial priorities, like saving for a bigger goal.`,
    },
  };

  // 4. DOM Element Safety Checks
  const scoreEl = id("score");
  const decisionEl = id("decision");
  const commentsEl = id("comments");
  const badgeEl = id("badge");
  const sliderEl = id("scoreSlider");
  const imgEl = id("image");
  const adviceEl = id("personalisedAdvice");

  if (
    !scoreEl ||
    !decisionEl ||
    !commentsEl ||
    !badgeEl ||
    !sliderEl ||
    !imgEl ||
    !adviceEl
  ) {
    throw new Error("Required DOM elements not found");
  }

  // 5. Animated score counter with safety
  let i = 0;
  const interval = setInterval(() => {
    try {
      if (i <= score) {
        scoreEl.textContent = i + "%";
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
  let advice = "";
  if (score >= 75) {
    advice = adviceOptions.option1.high;
  } else if (score >= 50) {
    advice = adviceOptions.option1.medium;
  } else {
    advice = adviceOptions.option1.low;
  }
  adviceEl.textContent = advice;

  // Populate advice list
  const adviceList = id("advice-list");
  if (savedScoreData.advice && Array.isArray(savedScoreData.advice)) {
    savedScoreData.advice.forEach((tip) => {
      const li = document.createElement("li");
      li.classList.add('list-group-items');
      li.textContent = tip;
      adviceList.appendChild(li);
    });
  } else {
    const li = document.createElement("li");
    li.textContent = "No specific advice available. Review your answers for better insights.";
    adviceList.appendChild(li);
  }

  // 8. Set slider value
  sliderEl.value = score;

  // 9. Sharing features with safety checks
  try {
    const pageUrl = encodeURIComponent(window.location.href);
    const shareText = `I got a ${score}% decision score using iDecide! ${pageUrl}`;


    const twitterShare = id("twitterShare");

    if (twitterShare) {
      twitterShare.href = `https://twitter.com/intent/tweet?text=${shareText}`;
    }
    const whatsappShare = id("whatsappShare");
    if (whatsappShare) {
      whatsappShare.href = `https://api.whatsapp.com/send?text=${shareText}`;
    }
    const facebookShare = id("facebookShare");
    if (facebookShare) {
      facebookShare.href = `https://www.facebook.com/sharer/sharer.php?u=${pageUrl}&quote=${shareText}`;
    }

    const truthSocialShare = id("truthSocialShare");
    if (truthSocialShare) {
      truthSocialShare.href = `https://truthsocial.com/share?text=${shareText}%20${pageUrl}`;
    }

    const linkedinShare = id("linkedinShare");
    if (linkedinShare) {
      linkedinShare.href = `https://www.linkedin.com/sharing/share-offsite/?url=${pageUrl}&title=${shareText}`;
    }

    const redditShare = id("redditShare");
    if (redditShare) {
      redditShare.href = `https://www.reddit.com/submit?url=${pageUrl}&title=${shareText}`;
    }
  } catch (shareError) {
    console.error("Share feature error:", shareError);
  }

  // 10. PDF download feature
  try {
    const downloadBtn = id("downloadPDF");
    if (downloadBtn && window.jspdf) {
      downloadBtn.addEventListener("click", () => {
        try {
          const { jsPDF } = window.jspdf;
          const doc = new jsPDF();
          doc.text("Decision Matrix Result", 10, 10);
          doc.text(`Decision: ${decision}`, 10, 20);
          doc.text(`Score: ${score}%`, 10, 30);
          doc.text(`Comments: ${comment}`, 10, 40);
          doc.save("decision_matrix_result.pdf");
        } catch (pdfError) {
          showError("Failed to generate PDF");
          console.error("PDF generation error:", pdfError);
        }
      });
    }
  } catch (pdfInitError) {
    console.error("PDF button initialization error:", pdfInitError);
  }

  // 11. make the submit button bigger by adding a class btn-lg and btn-block 
  const submitBtn = id("button");
  if (submitBtn) {
    submitBtn.classList.add("btn-lg", "btn-block");
  }

  //12. email result to the user 
  const emailBtn = id("submitResult");

  if (emailBtn) {
    emailBtn.addEventListener("click", async (e) => {

        e.preventDefault();

      const email = id("email").value;

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      const emailModal = id("emailModal");

      if (!email || !emailRegex.test(email)) {
        showError("Please enter a valid email address");
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
        itemImage
       
       
      };

      try {

      if (navigator.onLine) {
        const response = await axios.post("/emailResult", resultData);
    
        if (response.data && response.data.status === "success") {
          // Show success message
          const emailHelp = id("emailHelp");
          if (emailHelp) {
            emailHelp.textContent = response.data.message || "Email sent successfully!";
            emailHelp.classList.add("text-success");
          }

          // set timer for 3 seconds to hide the modal
          setTimeout(() => {
            const modal = bootstrap.Modal.getInstance(emailModal);
            if (modal) modal.hide();
          }, 3000);
        } else {
          throw new Error(response.data.error || "Failed to send email. Please try again later.");
        }
      } else {
        await queuePostRequest("/emailResult", resultData);
      }
      } catch (emailError) {
        console.error("Email sending error:", emailError);
      }
       
    });
  }

} catch (mainError) {
  console.error("Main execution error:", mainError);
  showError(mainError);

  // Fallback UI state
  // const scoreEl = id("score");
  if (scoreEl) scoreEl.textContent = "0%";

  const decisionEl = id("decision");
  if (decisionEl) decisionEl.textContent = "Error";

  // const adviceEl = id("personalisedAdvice");
  if (adviceEl)
    adviceEl.textContent = "Unable to provide advice due to an error.";

  // Hide optional elements
  const sliderEl = id("scoreSlider");
  if (sliderEl) sliderEl.style.display = "none";
}
