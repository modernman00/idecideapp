//import axios 
import axios from "axios";
import { id, log, showError } from "./global.js";



id('button').addEventListener('click', async (e) => {
  e.preventDefault();

  const form = id('createPostForm');
  const formData = new FormData(form);
  const titleError = id('title_error');
  const contentError = id('content_error');

  try {
    const response = await axios.post('/createBlog', formData, {
      headers: {
        'X-CSRF-TOKEN': formData.get('csrf_token'),
        'Accept': 'application/json'
      }
    });

    id('notification').textContent = response.data.message;
    // background color
    id('notification').style.backgroundColor = 'green';

    // hide notification after 3 seconds
    setTimeout(() => {
       id('notification').textContent = response.data.message;
    // background color
    id('notification').style.backgroundColor = 'green';

    }, 3000);

    // redirect to blog page
    window.location.href = '/blogs';

    
   
  } catch (error) {
    const errorMsg = error.response?.data?.message || error.response?.data?.error || 'An error occurred';
    if (errorMsg.includes('title')) {
      titleError.textContent = errorMsg;
      titleError.style.display = 'block';
    } else if (errorMsg.includes('content')) {
      contentError.textContent = errorMsg;
      contentError.style.display = 'block';
    } else {
       id('notification').textContent = response.data.message;
    // background color
    id('notification').style.backgroundColor = 'red';
    }
  }
});

const textarea = id('content_id')
textarea.rows = 10;
textarea.style.resize = 'vertical';
textarea.style.width = '100%';
textarea.style.minHeight = '150px';
textarea.style.maxHeight = '500px';
textarea.style.fontSize = '1rem';
textarea.style.padding = '0.5rem';
textarea.style.border = '1px solid #ced4da';
textarea.style.borderRadius = '0.25rem';
textarea.style.boxShadow = '0 0 0 0 rgba(0, 0, 0, 0.125)';
textarea.style.transition = 'border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out';
textarea.addEventListener('focus', () => {
  textarea.style.borderColor = '#80bdff';
  textarea.style.boxShadow = '0 0 0 0.2rem rgba(0, 123, 255, 0.25)';
});
textarea.addEventListener('blur', () => {
  textarea.style.borderColor = '#ced4da';
  textarea.style.boxShadow = '0 0 0 0 rgba(0, 0, 0, 0.125)';
});


