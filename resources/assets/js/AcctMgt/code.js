import { acctMgtRoutes } from '../routes';
import {  createCodeSubmitHandler } from '@modernman00/shared-js-lib';


createCodeSubmitHandler({
  formId: 'code', 
  route: acctMgtRoutes.code, 
  redirect: acctMgtRoutes.codeRedirect
});