import { qSelAll, id, log } from "./global";
import purchaseItems from "./include/main/dataToAutoComplete";
import autocomplete from "./include/main/autocomplete";
import { queuePostRequest } from "./background-sync";
import { tooltips } from "./include/main/toolTips"
import { intersection } from "./include/main/intersection";
import axios from "axios";


// 🔹 UI Enhancements
autocomplete("whatToBuy_id", purchaseItems);
tooltips();
intersection(".card.hidden");

// 🔹 Validate button presence
const initBtn = id("button");
if (!initBtn) {
  console.error("Button with ID 'button' not found.");
  throw new Error("Button not found");
}

// prompt PWA features for users to install the app from browser
// PWA install prompt
let deferredPrompt;
window.addEventListener('beforeinstallprompt', (e) => {
  e.preventDefault();
  deferredPrompt = e;
  const installButton = id('installButton');
  if (installButton) {
    installButton.style.display = 'block';
    installButton.addEventListener('click', () => {
      installButton.style.display = 'none';
      deferredPrompt.prompt();
      deferredPrompt.userChoice.then((choiceResult) => {
        if (choiceResult.outcome === 'accepted') {
          console.log('User installed the PWA');
        }
        deferredPrompt = null;
      });
    });
  }
});

// 🔹 Form handler
initBtn.addEventListener("click", async () => {
  const whatToBuyInput = id("whatToBuy_id");
  const selects = qSelAll("select");

  const whatToBuy = whatToBuyInput?.value.trim();
  const scores = {};
  let incomplete = false;

  // 🔹 Validate purchase input
  if (!whatToBuy) {
    alert("Please enter what you want to buy.");
    return;
  }

  // 🔹 Collect dropdown values
  selects.forEach((select) => {
    const attribute = select.getAttribute("name");
    const selected = select.options[select.selectedIndex];

    if (select.selectedIndex === 0) {
      incomplete = true;
    }

    const score = parseInt(selected?.getAttribute("value"));
    scores[attribute] = Number.isNaN(score) ? null : score;
  });

  if (incomplete) {
    alert("Please answer all dropdown questions.");
    return;
  }

  const formData = { whatToBuy, scores };
 

  try {
    if (navigator.onLine) {
      const response = await axios.post("/calculateResult", formData);
      const scoreData = response?.data?.message;

      if (!scoreData) {
        throw new Error("No result returned.");
      }

      sessionStorage.setItem("scoreData", JSON.stringify(scoreData));

      // Optional redirect (uncomment when ready)
      window.location.href = "result";
    } else {
      const syncBadge = id("syncStatus");
      alert("You're offline. Your decision has been saved and will be sent when you're back online.");
      await queuePostRequest('/calculateResult', formData);
      // Show badge
      syncBadge.classList.remove("hidden");

      // Hide after 4 seconds (optional)
      setTimeout(() => {
        syncBadge.classList.add("hidden");
      }, 4000);
    }
  } catch (error) {
    console.error("Error submitting form:", error);
    alert("An error occurred while processing your request. Please try again.");
  }
});


