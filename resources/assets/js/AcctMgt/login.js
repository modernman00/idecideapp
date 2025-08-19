import { loginSubmission} from './processAll.js';
import { id, bindEvent } from '../global.js';
import { appTestRoutes } from '../routes';
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
    appTestRoutes.appTest, 
    appTestRoutes.redirect, 
    'bootstrap', 
    lengthLimit);

};

bindEvent({ id: 'button', handler: LoginToAdmin });

bindEvent({ id: 'showPassword_id', handler: () => showPassword('password_id') });

const currentPs = id('password_id');
const passwordLabel = id('showPassword_id');
currentPs.setAttribute('autocomplete', 'current-password');
passwordLabel.setAttribute('aria-label', 'Warning: this will display your password on the screen.');

