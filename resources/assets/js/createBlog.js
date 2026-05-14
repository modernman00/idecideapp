//import axios 
import {  showFileName, registerHandler } from "@modernman00/shared-js-lib"; 


  registerHandler({
    formId: "createBlog",
    route: 'createBlog',
    redirect: 'blogs',
    optionalFields: ['blogImg'],
    theme: 'bulma'

  })



showFileName('blogImg_div');