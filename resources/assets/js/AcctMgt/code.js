import { acctMgtRoutes } from '../routes';
import {  createCodeSubmitHandler } from '@modernman00/shared-js-lib';

const fromForgot = sessionStorage.getItem('fromForgot');
let redirectTo;
const from = sessionStorage.getItem('from');

// Determine redirect target based on session flag


if(fromForgot){
  redirectTo = acctMgtRoutes.changePassword;
}else {
  redirectTo = acctMgtRoutes.adminHome;
}

if(from === 'userLogin'){
  redirectTo = acctMgtRoutes.userLoginCodeRedirect;
  sessionStorage.removeItem('from');
}

if (fromForgot) sessionStorage.removeItem('fromForgot');


createCodeSubmitHandler({
  formId: 'code', 
  route: acctMgtRoutes.code, 
  redirect: redirectTo
});