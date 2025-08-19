import { acctMgtRoutes } from '../routes';
import {  setupPasswordChange} from '@modernman00/shared-js-lib';


setupPasswordChange({
  route: acctMgtRoutes.changePassword,
  redirect: acctMgtRoutes.changePasswordRedirect
});