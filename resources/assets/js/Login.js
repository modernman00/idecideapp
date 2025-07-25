'use strict';
import { postFormData } from './helper/http.js';
import { showLoader, clearLoader } from './helper/Loader.js';
import { showError, qSelAll, qSel, id } from './global.js';
import FormHelper from './helper/FormHelper.js';
import { handleRecaptcha } from './helper/recaptcha.js';

// block the setLoader div

/**
 * Handles the submission of the login form.
 * @param {string} formId - The ID of the form to submit.
 * @param {string} loginURL - The URL to make the POST request to.
 * @param {string} redirect - The URL to redirect the user to after the submission is complete.
 * @param {string} [css=null] - The CSS class to add to the notification element if the submission is successful.
 * @returns {void}
 * @throws {Error} - If there is an error with the submission
 */
export const loginSubmission = async (formId, loginURL, redirect, css = null, lengthLimit = null
) => {

  try {

    const formInput = qSel(`#${formId}`)

    if (!formInput) {
      console.error(`Form ${formId} not found`);
      return;
    }

    const recaptchaSiteKey = process.env.MIX_RECAPTCHA_KEY

  

    const formInputArr = Array.from(formInput.elements)

    const formData = new FormHelper(formInputArr)

    formData.clearError();

    if (lengthLimit) {
      formData.realTimeCheckLen(lengthLimit.maxLength.id, lengthLimit.maxLength.max);
    }
    // formData.validateLoginField('password_id', 'password');
    // formData.validateLoginField('email_id', 'email');

    formData.massValidate([], { email: 'email', password: 'password' })

    if (formData.result === 1) {
        // for recaptcha - create a hidden element to store the token
   try {
            await handleRecaptcha(formId, process.env.MIX_RECAPTCHA_KEY, 'login');
        } catch (err) {
         
            console.error('reCAPTCHA error:', err);
            return;
        }

      showLoader();
      localStorage.setItem('redirect', redirect);

      await postFormData(loginURL, formId, redirect, css);
    } else {

      alert('The form cannot be submitted. Please check the errors');
    }
  } catch (err) {
    showError(err);
  } finally {
    clearLoader();
  }
};
