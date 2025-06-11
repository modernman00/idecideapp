import { showError } from "./global";

// do lazy loading of the app based on the current URL
     document.addEventListener("DOMContentLoaded", function () {

       if (window.location.pathname === "/") {
         import(
           /* webpackChunkName: 'main' */
           /* webpackPrefetch: true */
           "./main"
         )
           .then((module) => module.default)
           .catch((err) => showError(err));
           
       } else if (window.location.pathname === "/result") {
         import(
           /* webpackChunkName: 'result' */
           /* webpackPrefetch: true */
           "./result"
         )
           .then((module) => module.default)
           .catch((err) => showError(err));
       }
     });



