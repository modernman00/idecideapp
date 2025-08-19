import { loginSubmission} from './processAll.js';
import { bindEvent } from '../global.js';
import { appTestRoutes } from '../routes';



const codeSubmitFn = (e) => {

  e.preventDefault();

  // creeate a object for length limit
  const lengthLimit = {
    maxLength: {
      id: ['code_id'],
      max: [50] // max length for password and email
    }
  };

  loginSubmission(
    'codeForm', 
    appTestRoutes.appTestCode, 
    appTestRoutes.appTestCodeRedirect, 
    'bulma', 
    lengthLimit
  );

};

bindEvent({ id: 'button', handler: codeSubmitFn });
