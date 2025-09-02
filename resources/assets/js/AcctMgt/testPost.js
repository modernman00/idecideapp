import {  loginSubmission, bindEvent, showFileName } from '@modernman00/shared-js-lib';





  const handler = (e) => {
    e.preventDefault();

    const lengthLimit = {
      maxLength: {
        id: ['occupation', 'age'],
        max: [10, 10]
      }
    };

    loginSubmission('testPost', '/testPost', '', 'bulma', lengthLimit);
  };

  bindEvent({ id: 'button', handler });

  showFileName('children_div');

