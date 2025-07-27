'use strict';
import { postFormData } from './helper/http.js';
import { showLoader, clearLoader } from './helper/Loader.js';
import { showError, qSel} from './global.js';
import FormHelper from './helper/FormHelper.js';


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

    const formInput = qSel(`#${formId}`);

    if (!formInput) {
      throw new Error(`Form ${formId} not found`);
      return;
    }


    const formInputArr = Array.from(formInput.elements);

    const formData = new FormHelper(formInputArr);

    formData.clearError();

    if (lengthLimit) {
      formData.realTimeCheckLen(lengthLimit.maxLength.id, lengthLimit.maxLength.max);
    }

    formData.massValidate([], { email: 'email', password: 'password' });

    if (formData.result === 1) {
 

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
