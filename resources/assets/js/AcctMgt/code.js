import { acctMgtRoutes } from "../routes";
import { createCodeSubmitHandler } from "@modernman00/shared-js-lib";

const fromForgot = sessionStorage.getItem("fromForgot");
let redirectTo;
const from = sessionStorage.getItem("from");

// Determine redirect target based on session flag

if (fromForgot) {
  redirectTo = acctMgtRoutes.changePassword;
} else {
  redirectTo = acctMgtRoutes.adminHome;
}

if (from === "userLogin") {
  redirectTo = acctMgtRoutes.userLoginCodeRedirect;
  sessionStorage.removeItem("from");
}

if (fromForgot) sessionStorage.removeItem("fromForgot");

createCodeSubmitHandler({
  formId: "code",
  route: acctMgtRoutes.code,
  redirect: redirectTo,
});

const initOtp = () => {
  const otpForm = document.getElementById("code");
  const otpInputs = document.querySelectorAll(".otp-input");
  const hiddenCodeInput = document.getElementById("codeHidden"); // Fixed ID to match Blade change
  const pasteBtn = document.getElementById("pasteBtn");
  const resendBtn = document.getElementById("resendBtn");

  if (!otpInputs.length) {
    setTimeout(initOtp, 100);
    return;
  }

  // Failsafe: Prevent default submission if the library handler hasn't kicked in
  if (otpForm) {
    otpForm.addEventListener("submit", (e) => {
      if (
        !hiddenCodeInput ||
        !hiddenCodeInput.value ||
        hiddenCodeInput.value.length < 6
      ) {
        // If it's not ready, don't let it submit as a GET request
        e.preventDefault();
        console.warn("Form submission blocked: Code incomplete.");
      }
    });
  }

  console.log("OTP Script Active - Version 7.0 (ID Sync)");

  const updateHiddenInput = () => {
    if (hiddenCodeInput) {
      hiddenCodeInput.value = Array.from(otpInputs)
        .map((i) => i.value)
        .join("");
    }
  };

  otpInputs.forEach((input, index) => {
    // Auto-jump logic
    input.addEventListener("input", (e) => {
      if (e.target.value.length >= 1) {
        e.target.value = e.target.value.slice(-1);
        if (index < otpInputs.length - 1) {
          otpInputs[index + 1].focus();
        }
      }
      updateHiddenInput();
    });

    input.addEventListener("keydown", (e) => {
      if (e.key === "Backspace" && !e.target.value && index > 0) {
        otpInputs[index - 1].focus();
      }
    });

    // Universal Paste Fix
    input.addEventListener("paste", (e) => {
      e.preventDefault();
      const pasteData = (e.clipboardData || window.clipboardData)
        .getData("text")
        .trim();
      const code = pasteData.replace(/[^a-zA-Z0-9]/g, "").substring(0, 6);

      if (code.length > 0) {
        code.split("").forEach((char, i) => {
          if (otpInputs[i]) otpInputs[i].value = char;
        });
        updateHiddenInput();
        otpInputs[Math.min(code.length - 1, 5)].focus();
      }
    });
  });

  // One-Tap Paste Button Logic
  if (pasteBtn) {
    pasteBtn.addEventListener("click", async () => {
      try {
        const text = await navigator.clipboard.readText();
        const code = text
          .trim()
          .replace(/[^a-zA-Z0-9]/g, "")
          .substring(0, 6);
        if (code.length === 6) {
          code.split("").forEach((char, i) => {
            if (otpInputs[i]) otpInputs[i].value = char;
          });
          updateHiddenInput();
          otpInputs[5].focus();
        }
      } catch (err) {
        console.error("Clipboard access denied");
      }
    });
  }

  // Resend Code Logic
  if (resendBtn) {
    resendBtn.addEventListener("click", async (e) => {
      e.preventDefault();
      const originalText = resendBtn.innerHTML;
      resendBtn.innerHTML =
        '<span class="spinner-border spinner-border-sm me-2"></span>Sending...';
      resendBtn.style.pointerEvents = "none";

      try {
        const response = await fetch("/resendCode", {
          method: "POST",
          headers: {
            "X-Requested-With": "XMLHttpRequest",
            "X-XSRF-TOKEN": document.getElementById("token")?.value || "",
          },
        });

        const result = await response.json();

        if (response.ok) {
          alert(result.message || "Code resent! Please check your email.");
        } else {
          alert(result.message || "Failed to resend code. Please try again.");
        }
      } catch (error) {
        console.error("Resend error:", error);
        alert("An error occurred. Please try again.");
      } finally {
        resendBtn.innerHTML = originalText;
        resendBtn.style.pointerEvents = "auto";
      }
    });
  }
};

initOtp();