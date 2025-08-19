// import { showError, id } from './global';
import { log, showError } from '@modernman00/shared-js-lib';

log('index.js');

document.addEventListener('DOMContentLoaded', () => {
  const routeMap = {
    '/': () => import(/* webpackChunkName: 'main' */ './main'),
    '/result': () => import(/* webpackChunkName: 'result' */ './result'),
    '/createBlog': () => import(/* webpackChunkName: 'blog' */ './blog'),
    '/adminlogin': () => import(/* webpackChunkName: 'adminlogin' */ './acctMgt/login'),
    '/forgot': () => import(/* webpackChunkName: 'forgot' */ './acctMgt/forgot'),
    '/code': () => import(/* webpackChunkName: 'code' */ './acctMgt/code'),
    '/changePassword': () => import(/* webpackChunkName: 'change' */ './acctMgt/changePassword')

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


