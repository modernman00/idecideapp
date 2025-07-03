import { qSelAll, id, log } from "./global";
import purchaseItems from "./include/main/dataToAutoComplete";
import autocomplete from "./include/main/autocomplete";
import { queuePostRequest } from "./background-sync";
import { tooltips } from "./include/main/toolTips"
import { intersection } from "./include/main/intersection";
import axios from "axios";


autocomplete('whatToBuy_id', purchaseItems)
// Define tooltips for each form question to explain their purpose
tooltips();


// Set up an IntersectionObserver to animate cards when they enter the viewport
intersection(".card.hidden")


// Get the submit button
const initBtn = id("button");

// Add event listener to the button to process the form
if (!initBtn) {
  console.error("Button with ID 'button' not found."); // Log error if button is missing
} else {
  initBtn.addEventListener("click", async () => {
    // Collect form data
    const whatToBuy = id("whatToBuy_id").value;
    const selects = qSelAll("select");
    let incomplete = false;
    const scores = {};

    selects.forEach((select) => {
      const attribute = select.getAttribute("name"); // Get the question's attribute (e.g., 'cost')
      const selected = select.options[select.selectedIndex]; // Get the selected option
      const score = parseInt(selected.getAttribute("value")) || 0; // Get the score (default to 0)

      // Check if the user skipped a question (selected the default option)

      if (select.selectedIndex === 0) {
        incomplete = true;
      }
      scores[attribute] = score;
    });

    if (incomplete) {
      alert("Please answer all dropdown questions.");
      return;
    }

    // Prepare data to send to backend
    const formData = {
      whatToBuy,
      scores
    };

    try {
      if (navigator.onLine) {
        const response = await axios.post('/calculateResult', formData);

        const scoreData = response.data.message;


        // Save results to sessionStorage
        sessionStorage.setItem("scoreData", JSON.stringify(scoreData));

        // Redirect to result page
        window.location.href = "result";
      }
      else {
        await queuePostRequest('/calculateResult', formData);
      }
    } catch (error) {
      console.error("Error submitting form:", error);
      alert("An error occurred while processing your request. Please try again.");
    }
  });
}

