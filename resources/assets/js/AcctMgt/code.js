import { acctMgtRoutes } from '../routes';
import {  createCodeSubmitHandler } from '@modernman00/shared-js-lib';

const fromForgot = sessionStorage.getItem('fromForgot');
const fromLogin = sessionStorage.getItem('fromLogin');
let redirectTo;

if(fromForgot){
  redirectTo = acctMgtRoutes.changePassword;
}else if(fromLogin){
  redirectTo = acctMgtRoutes.adminHome;
}

createCodeSubmitHandler({
  formId: 'code', 
  route: acctMgtRoutes.code, 
  redirect: redirectTo
});