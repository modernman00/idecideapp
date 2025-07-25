export async function handleRecaptcha(formId, siteKey, action ) {
  const form = document.getElementById(formId);
  if (!form) throw new Error(`Form with ID "${formId}" not found`);

  // Check if grecaptcha is loaded
    if (typeof grecaptcha === 'undefined' || !grecaptcha.ready) {
  throw new Error('reCAPTCHA not initialized yet.');
}


  // return new Promise((resolve, reject) => {
  //   // Wait for grecaptcha to be ready, but do NOT wrap in window.onload here
  //   grecaptcha.ready(() => {
  //     grecaptcha.execute(siteKey, { action }).then(token => {
  //       let tokenField = form.querySelector('input[name="g-recaptcha-response"]');

  //       if (!tokenField) {
  //         tokenField = document.createElement('input');
  //         tokenField.type = 'hidden';
  //         tokenField.name = 'g-recaptcha-response';
  //         form.appendChild(tokenField);
  //       }

  //       tokenField.value = token;
  //       resolve();
  //     }).catch(reject);
  //   });
  // });

  grecaptcha.ready(function() {
    grecaptcha.execute(siteKey, {action}).then(function(token) {
      document.getElementById('g-recaptcha-response').value = token;
    });
  });
}

