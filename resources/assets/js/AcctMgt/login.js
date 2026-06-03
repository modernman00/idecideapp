import { acctMgtRoutes } from '../routes';
import { createAdminLoginHandler } from '@modernman00/shared-js-lib';

// remove fromForgot
sessionStorage.removeItem('fromForgot');

createAdminLoginHandler({
  formId: 'adminlogin',
  route: acctMgtRoutes.login,
  redirect: acctMgtRoutes.loginRedirect,
  recaptchaAction: 'LOGIN'
  
});

