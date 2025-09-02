import { acctMgtRoutes } from '../routes';
import {  createCodeSubmitHandler } from '@modernman00/shared-js-lib';

const fromForgot = sessionStorage.getItem('fromForgot');
let redirectTo;

// Determine redirect target based on session flag


if(fromForgot){
  redirectTo = acctMgtRoutes.changePassword;
}else {
  redirectTo = acctMgtRoutes.adminHome;
}

if (fromForgot) sessionStorage.removeItem('fromForgot');


createCodeSubmitHandler({
  formId: 'code', 
  route: acctMgtRoutes.code, 
  redirect: redirectTo
});