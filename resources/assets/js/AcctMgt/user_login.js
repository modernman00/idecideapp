import { acctMgtRoutes } from '../routes';
import { createAdminLoginHandler } from '@modernman00/shared-js-lib';

// remove fromForgot
sessionStorage.removeItem('fromForgot');

// set a session  to remember user in code page
sessionStorage.setItem('from', 'userLogin');

createAdminLoginHandler({
  formId: 'loginForm',
  route: acctMgtRoutes.userLogin,
  redirect: acctMgtRoutes.userLoginRedirect,
  recaptchaAction: 'LOGIN'
  
});

