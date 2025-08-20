import { acctMgtRoutes } from '../routes';
import { createAdminLoginHandler } from '@modernman00/shared-js-lib';

// create a session for login

// SessionStorage
sessionStorage.setItem('fromLogin', 'true');

createAdminLoginHandler({
  formId: 'adminlogin',
  route: acctMgtRoutes.login,
  redirect: acctMgtRoutes.loginRedirect
});

