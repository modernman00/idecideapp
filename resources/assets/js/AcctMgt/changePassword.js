import { loginSubmission } from './processAll.js';
import { id, bindEvent } from '../global.js';
import { appTestRoutes } from '../routes';
import { showPassword } from '../helper/security';
import { matchInput } from '../helper/general.js';


const changePasswordFn = (e) => {
  e.preventDefault();
  // creeate a object for length limit
  const lengthLimit = {
    maxLength: { id: ['password_id', 'confirm_password_id'], max: [50, 50] } // max length for password and email
  };

  loginSubmission(
    'changePassword',
    appTestRoutes.appTestChange,
    appTestRoutes.appTestChangeRedirect,
    'bulma',
    lengthLimit
  );

};

bindEvent({ id: 'button', handler: changePasswordFn });
bindEvent({ id: 'showPassword_id', handler: () => showPassword('password_id') });
matchInput('password_id', 'confirm_password_id', 'confirm_password_error');

const currentPs = id('password_id');
const passwordLabel = id('showPassword_id');
currentPs.setAttribute('autocomplete', 'current-password');
passwordLabel.setAttribute('aria-label', 'Warning: this will display your password on the screen.');
const passwordHelper = id('password_help');
passwordHelper.setAttribute('aria-live', 'polite');
passwordHelper.textContent = 'password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character.';



