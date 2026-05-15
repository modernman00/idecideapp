//import axios 
import {  showFileName, registerHandler } from "@modernman00/shared-js-lib"; 


  registerHandler({
    formId: "regForm",
    route: 'register',
    redirect: 'login',
    optionalFields: ['confirm_password']

  })
