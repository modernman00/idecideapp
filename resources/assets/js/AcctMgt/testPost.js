import {  loginSubmission, bindEvent } from '@modernman00/shared-js-lib';





  const handler = (e) => {
    e.preventDefault();

    const lengthLimit = {
      maxLength: {
        id: ['occupation_id', 'age_id'],
        max: [10, 10]
      }
    };

    loginSubmission('testPost', '/testPost', '/testPost', 'bulma', lengthLimit);
  };

  bindEvent({ id: 'button', handler });

