'use strict'
export default class FormHelper {
    constructor(data) {
        if (!Array.isArray(data)) throwError('data must be an array of form elements');
        this.data = data;
        this.error = [];
        this.result = 0;
    }

    id(x) {
        return document.getElementById(x)
    }

    /**
     * general validation; check empty status, at least a single input, mobile length, white space
     */

    getData() {
        return this.data;
    }


    /**
     * Validate a single form field
     * @param {string} value - the value of the field to validate
     * @param {string} [type='general'] - the type of validation to perform. Currently only 'email' is supported
     * @returns {boolean} - true if the field is valid, false otherwise
     */
    validateLoginField(inputId, type = 'general') {
        const inputEl = this.id(inputId);
        const value = inputEl.value.trim();
        let msg = '';
        let isValid = true;

        if (type === 'email') {
            const emailRegex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
            if (!emailRegex.test(value)) {
                msg = `<li>Please enter a valid email</li>`;
                isValid = false;
            }
        }

        else if (type === 'password') {
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
            if (!passwordRegex.test(value)) {
                msg = `<li>Please enter a valid password (min 8 chars, upper & lowercase, number, special char)</li>`;
                isValid = false;
            }
        }

        else if (type === 'general') {
            const generalRegex = /[\w\d\s.,'"!?@#&()\-]/;
            if (!generalRegex.test(value)) {
                msg = `<li>Invalid entry — special characters may not be allowed</li>`;
                isValid = false;
            }
        }

        // Set error if invalid
        const errorEl = this.id(`${type}_error`);
        if (!isValid) {
            if (errorEl) {
                errorEl.innerHTML = msg;
                errorEl.style.color = 'red';
            }
            this.error.push(msg);
        } else {
            if (errorEl) errorEl.innerHTML = ''; // Clear error on success
        }

        return isValid;
    }


    matchRegex(value, type) {
        const regexPatterns = {
            email: /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/,
            password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/,
            general: /[\w\d\s.,'"!?@#&()\-]/,
        };

        return regexPatterns[type]?.test(value);
    }

    /**
     * 
     * @param {*} optionalFields ["spouseName", "spouseMobile", "fatherEmail"];
     * @param {*} typeMap Create a validation map if certain fields need special types (email, password, etc). const types = {
      email_id: "email",
      password_id: "password",
      custom_text_id: "general"
    };
     * formHelper.massValidate(optional, types);
     */



    massValidate(optionalFields = [], typeMap = {}) {
        this.clearError(); // Reset errors
        this.result = 0;

        for (let input of this.data) {
            const { name, value, id, type, placeholder } = input;
            const errorEl = this.id(`${name}_error`);
           

            // Skip non-input elements
            if (
                ['submit', 'button', 'g-recaptcha-response', 'cancel'].includes(name) ||
                ['button', 'showPassword_id', 'token', 'g-recaptcha-response'].includes(id) ||
                type === 'button' ||
                name === 'checkbox_id'
            ) continue;

     

            let label = name.replace(/_/g, ' '); // For readable error text
            let val = value.trim();

            // Handle optional fields
            if (optionalFields.includes(name) && val === "") {
                input.value = "Not Provided";
                continue;
            }

            // Required field check
            if (val === "" || val === "select") {
                if (errorEl) errorEl.innerHTML = `<li style="color:red;">${label} cannot be left empty.</li>`;
                this.error.push(`${label.toUpperCase()} cannot be left empty.`);
                continue;
            }

            // Determine field type for regex
            let validateType = typeMap[name] || (
                name.toLowerCase().includes("email") ? "email" :
                    name.toLowerCase().includes("password") ? "password" : "general"
            );

            if (!this.matchRegex(val, validateType)) {
                const msg = `There is a problem with your entry for ${label.toUpperCase()}`;
                if (errorEl) errorEl.innerHTML = `<li style="color:red;">${msg}</li>`;
                this.error.push(msg);
                continue;
            }

            if (errorEl) errorEl.innerHTML = ""; // Clear if all good
        }

        this.result = this.error.length === 0 ? 1 : 0;
    }



    emailVal() {
        const emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        let msg = `<li style=color:'red';> Please enter a valid email</li>`
        const email = this.id('email_id').value
        if (email.match(emailExp) === null) {
            this.id('email_error').innerHTML = msg
            this.id('email_error').style.color = "red"
            this.error.push(msg)
        }
    }

    /**
     * Clears all error messages and empties the error array.
     * Sets up event listeners to clear error messages for each input element.
     * Keyup event listener: for non-select inputs
     * Change event listener: for all inputs
     * @returns {void}
     */
    clearError() {
        this.error = []; // Empty the error array

        // Function to clear error messages for a given input element
        const clearErrorForElement = (elementName) => {
            const errorElement = this.id(`${elementName}_error`);
            if (errorElement) errorElement.innerHTML = '';
        };

        this.data.flat().forEach(({ id, name, value }) => {
            if (['submit', 'button', 'token', 'checkbox'].includes(id) || ['token', 'submit'].includes(name)) return;

            const element = this.id(id);
            if (!element) {
                console.error(`Element with ID '${id}' and post name '${name}' not found.`);
                return;
            }

            // Add event listeners to clear errors
            const clearErrorHandler = () => clearErrorForElement(name);
            if (value !== 'select') element.addEventListener('keyup', clearErrorHandler);
            element.addEventListener('change', clearErrorHandler);
        });
    }

    /**
     * Clears the values of all input elements in the form, excluding checkboxes and the submit button
     */
    clearHtml() {
        this.data.flat().forEach(post => {
            if (!['submit', 'checkbox'].includes(post.name) && post.type !== 'submit') {
                post.value = "";
            }
        });
    }
    /**
     * Check the length of the input in real time and display an error message if it exceeds the maximum length
     * @param {array of strings} input - the IDs of the input elements to check
     * @param {array of numbers} maxi - the maximum lengths for each input element
     */

    realTimeCheckLen(input, maxi) {
        input.forEach((id, i) => {

            const theData = this.id(`${id}`);
            if (!theData) {
                console.error(`Element with ID '${id}' not found`);
                return;
            }
            const max = maxi[i];
            theData.maxLength = parseInt(max) + 1;
            theData.addEventListener('input', () => {
                const error = this.id(`${id}_error`);
                error.innerHTML = (theData.value.length > max) ? `You have reached the maximum limit` : "";
                this.id(`${id}_help`).style.display = theData.value.length > max ? '' : 'none';
            });
        });
    }



    /**
     * Match the value of the second input to the value of the first input in real time
     * @param {string} first - the id of the first input
     * @param {string} second - the id of the second input
     */
    matchInput(first, second) {
        const firstInput = this.id(first + '_id');
        const secondInput = this.id(second + '_id');
        const error = this.id(`${second}_error`);

        const checkMatch = () => error.innerHTML = (firstInput.value !== secondInput.value) ? 'Your passwords do not match' : "";

        firstInput.addEventListener('input', checkMatch);
        secondInput.addEventListener('input', checkMatch);
    }


    /**
     * Injects the values in the html array to the elements with the IDs in the idArray
     * @param {array of strings} idArray - the IDs of the elements to inject the values to
     * @param {array of strings} html - the values to inject to the elements
     */
    injectData(idArray, html) {
        idArray.forEach((id, i) => this.id(id).innerHTML = html[i]);
    }

    /**
     *
     * @param {this is an id and its value is for duplication} firstInput
     * @param {* another id that accepts the value of the firstInput} takeFirstInput
     */
    duplicate(giveInput, takeInput) {
        let giver, taker;
        giver = this.id(giveInput)
        taker = this.id(takeInput)
        giver.addEventListener('keyup', () => {
            taker.value = giver.value;
        })
    }




    /**
     * Sends a get request to the server as the user types in the specified input element
     * and updates the content of the specified output element with the response from the server
     * @param {string} input - the id of the input element to listen to
     * @param {string} url - the url of the get request to send, the value of the input element will be appended to the end of the url
     * @param {string} outputId - the id of the element to update with the response from the server
     */
    realTimeServer(input, url, outputId) {
        const theInput = this.id(input)
        const output = this.id(outputId)
        theInput.addEventListener('keyup', async () => {
            const inputVal = theInput.value

            if (inputVal === "") {
                output.innerHTML = "";
                return;
            }

            try {
                const response = await axios.get(`${url}=${inputVal}`)
                output.innerHTML = response.data
            } catch (error) {
                console.error(error)
            }
        })
    }

    /**
     * Check if a yes/no radio button is checked and display "checked" in a hidden input field.
     * @param {string} yesId - the id of the yes radio button
     * @param {string} noId - the id of the no radio button
     * @param {string} hiddenInput - the id of the hidden input field to display the result
     */
    isChecked(yesId, noId, hiddenInput) {
        const checked = () => {
            if (this.id(yesId).checked) {
                alert('check')
                this.id(hiddenInput).innerHTML = 'checked';
            } else if (this.id(noId).checked) {
                this.id(hiddenInput).innerHTML = 'checked';
            }
        }

        this.id(yesId).addEventListener('click', checked)
        this.id(noId).addEventListener('click', checked)

    }


}