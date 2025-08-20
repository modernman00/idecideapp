import { acctMgtRoutes } from '../routes';
import {  forgotSubmitHandler } from '@modernman00/shared-js-lib';

sessionStorage.setItem('fromForgot', 'true');

forgotSubmitHandler({
  formId: 'forgot',
  route: acctMgtRoutes.forgot,
  redirect: acctMgtRoutes.forgotRedirect,
 
});

// Set autocomplete and accessibility attributes

