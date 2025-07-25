import { showError, id } from "./global";

// do lazy loading of the app based on the current URL
     document.addEventListener("DOMContentLoaded", function () {

        id('themeSwitch').addEventListener('change', function() {
            document.body.dataset.theme = this.checked ? 'dark' : 'light';

            // SET THE FONT TO WHITE IF THE THEME IS DARK
            document.body.style.color = this.checked ? 'white' : 'black';

        });

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

       }else if (window.location.pathname === "/createBlog") {
  
         import(
           /* webpackChunkName: 'blog' */
           /* webpackPrefetch: true */
           "./blog"
         )
           .then((module) => module.default)
           .catch((err) => showError(err));

       } else if (window.location.pathname === "/managed") {
         
         import(
           /* webpackChunkName: 'managed' */
           /* webpackPrefetch: true */
           "./blog/login"
         )
           .then((module) => module.default)
           .catch((err) => showError(err));
       }
     });



