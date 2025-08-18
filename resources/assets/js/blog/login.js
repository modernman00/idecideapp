import { loginSubmission} from '../Login.js';
import { id } from '../global.js';
import { blogRoutes } from '../routes';
import { showPassword } from '../helper/security';


const LoginToAdmin = (e) => {

  e.preventDefault();

  // creeate a object for length limit
  const lengthLimit = {
    maxLength: {
      id: ['password_id', 'email_id'],
      max: [30, 50] // max length for password and email
    }
  };

  loginSubmission(
    'managed', 
    blogRoutes.url, 
    blogRoutes.blogMgt, 
    'bootstrap', 
    lengthLimit
  );

};

id('button').addEventListener('click', LoginToAdmin);
id('showPassword_id').addEventListener('click', () => showPassword('password_id'));

const currentPs = id('password_id');
const passwordLabel = id('showPassword_id');
currentPs.setAttribute('autocomplete', 'current-password');
passwordLabel.setAttribute('aria-label', 'Warning: this will display your password on the screen.');
const passwordHelper = id('password_help');
passwordHelper.setAttribute('aria-live', 'polite');
passwordHelper.textContent = 'password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.';


