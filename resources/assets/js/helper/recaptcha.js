export async function handleRecaptcha(formId, siteKey, action) {
  const form = document.getElementById(formId);
  if (!form) throw new Error(`Form with ID "${formId}" not found`);

  if (typeof grecaptcha === 'undefined' || !grecaptcha.ready) {
    throw new Error('reCAPTCHA not initialized yet.');
  }

  return new Promise((resolve, reject) => {
    grecaptcha.ready(() => {
      grecaptcha.execute(siteKey, { action }).then(token => {
        let tokenField = form.querySelector('input[name="g-recaptcha-response"]');
        if (!tokenField) {
          tokenField = document.createElement('input');
          tokenField.type = 'hidden';
          tokenField.name = 'g-recaptcha-response';
          form.appendChild(tokenField);
        }
        tokenField.value = token;
        resolve(token);
      }).catch(reject);
    });
  });
}

