//import axios 
import { loginSubmission, bindEvent, showFileName } from "@modernman00/shared-js-lib"; 


  // Submission handler
  const handleSubmit = (e) => {
    e.preventDefault();
    loginSubmission('createBlog', 'createBlog', 'blogs', 'bulma');
  };

  // Bind events
  bindEvent({ id: 'button', handler: handleSubmit });



showFileName('blogImg_div');