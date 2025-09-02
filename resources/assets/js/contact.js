import { loginSubmission, bindEvent, showFileName } from "@modernman00/shared-js-lib"; 


  // Submission handler
  const handleSubmit = (e) => {
    e.preventDefault();
    loginSubmission(
      'contact', 
      'contact', 
      '', 
      'bootstrap');
  };

  // Bind events
  bindEvent({ id: 'button', handler: handleSubmit });
