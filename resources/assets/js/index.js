// import { showError, id } from './global';
import { showError } from '@modernman00/shared-js-lib';


document.addEventListener('DOMContentLoaded', () => {
  const routeMap = {
    '/': () => import(/* webpackChunkName: 'main' */ './main'),

    '/result': () => import(/* webpackChunkName: 'result' */ './result'),

    '/adminlogin': () => import(/* webpackChunkName: 'login' */ './AcctMgt/login'),

    '/forgot': () => import(/* webpackChunkName: 'forgot' */ './AcctMgt/forgot'),
    
    '/code': () => import(/* webpackChunkName: 'code' */ './AcctMgt/code'),
    
    '/createBlog': () => import(/* webpackChunkName: 'createBlog' */ './createBlog'),
    
    '/testPost': () => import(/* webpackChunkName: 'testPost' */ './AcctMgt/testPost'),
    
    '/changePassword': () => import(/* webpackChunkName: 'changePassword' */ './AcctMgt/changePassword'),
    
    '/contact': () => import(/* webpackChunkName: 'contact' */ './contact'),

    '/login': () => import(/* webpackChunkName: 'user_login' */ './AcctMgt/user_login'),

    '/register': () => import(/* webpackChunkName: 'register' */ './AcctMgt/register'),

  };

  try {
    const loadModule = routeMap[window.location.pathname];

    if (!loadModule) {
      throw new Error(`Unhandled route: ${window.location.pathname}`);
    }

    loadModule()
      .then((module) => module.default)
      .catch((err) => {
        showError(err);
        throw new Error(`Failed to load module for ${window.location.pathname}: ${err.message}`);
      });
  } catch (error) {
    showError(error);
    throw error;
  }
});


