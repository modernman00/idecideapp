import { acctMgtRoutes } from '../routes';
import {  createAdminLoginHandler } from '@modernman00/shared-js-lib';


createAdminLoginHandler({
  formId: 'adminlogin',
  route: acctMgtRoutes.login,
  redirect: acctMgtRoutes.loginRedirect
});

