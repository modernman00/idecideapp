import { id} from "../../global";
/**
 *
 * @param {string} inputId
 * @param {Array} arr
 */

const autocomplete = (inputId, arr) => {
  const whatToBuyInput = id(inputId); // Get the text input
  if (whatToBuyInput) {
    // Create a <ul> for autocomplete suggestions
    const suggestionList = document.createElement("ul");
    suggestionList.classList.add("autocomplete-suggestions");
    suggestionList.id = "suggestions"; // For accessibility
    whatToBuyInput.parentElement.appendChild(suggestionList); // Append to input's parent

    // Function to show matching suggestions based on user input
    const showSuggestions = (inputValue) => {
      suggestionList.innerHTML = ""; // Clear previous suggestions
      if (!inputValue) return; // Exit if input is empty

      // Filter items that match the input (case-insensitive), limit to 8
      const matches = arr
        .filter((item) => item.toLowerCase().includes(inputValue.toLowerCase()))
        .slice(0, 8);

      // Create <li> for each match
      matches.forEach((item, index) => {
        const li = document.createElement("li");
        li.textContent = item;
        li.setAttribute("tabindex", "0"); // Make focusable for keyboard
        li.setAttribute("data-index", index); // Store index for navigation
        li.addEventListener("click", () => {
          whatToBuyInput.value = item; // Set input value on click
          suggestionList.innerHTML = ""; // Clear suggestions
        });
        li.addEventListener("keypress", (e) => {
          if (e.key === "Enter") {
            whatToBuyInput.value = item; // Set input value on Enter
            suggestionList.innerHTML = ""; // Clear suggestions
          }
        });
        suggestionList.appendChild(li);
      });
    };

    // Show suggestions as user types
    whatToBuyInput.addEventListener("input", (e) => {
      showSuggestions(e.target.value);
    });

    // Clear suggestions on blur (with delay for click to register)
    whatToBuyInput.addEventListener("blur", () => {
      setTimeout(() => (suggestionList.innerHTML = ""), 200);
    });

    // Handle keyboard navigation for suggestions
    whatToBuyInput.addEventListener("keydown", (e) => {
      const suggestions = suggestionList.querySelectorAll("li");
      if (!suggestions.length) return; // Exit if no suggestions

      let focusedIndex = Array.from(suggestions).findIndex(
        (li) => li === document.activeElement
      );
      if (e.key === "ArrowDown") {
        e.preventDefault(); // Prevent cursor movement
        focusedIndex = (focusedIndex + 1) % suggestions.length; // Loop to start
        suggestions[focusedIndex].focus();
      } else if (e.key === "ArrowUp") {
        e.preventDefault();
        focusedIndex =
          (focusedIndex - 1 + suggestions.length) % suggestions.length; // Loop to end
        suggestions[focusedIndex].focus();
      } else if (e.key === "Enter" && focusedIndex >= 0) {
        e.preventDefault();
        whatToBuyInput.value = suggestions[focusedIndex].textContent; // Select item
        suggestionList.innerHTML = ""; // Clear suggestions
      } else if (e.key === "Escape") {
        suggestionList.innerHTML = ""; // Clear suggestions
      }
    });
  }
};

export default autocomplete;
