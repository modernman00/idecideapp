import { loginSubmission} from './processAll.js';
import {bindEvent } from '../global.js';
import { appTestRoutes } from '../routes';



const forgotSubmitFn = (e) => {

  e.preventDefault();

  // creeate a object for length limit
  const lengthLimit = {
    maxLength: {
      id: ['email_id'],
      max: [50] // max length for password and email
    }
  };

  loginSubmission(
    'forgotPassword', 
    appTestRoutes.appTestForgot, 
    appTestRoutes.appTestForgotRedirect, 
    'bulma', 
    lengthLimit
  );

};

bindEvent({ id: 'button', handler: forgotSubmitFn });

