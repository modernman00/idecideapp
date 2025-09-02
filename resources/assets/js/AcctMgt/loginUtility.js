import { id } from '@modernman00/shared-js-lib';

export const showPassword = (inputId) => {
    const y = id(inputId);
    if (y.type === 'password') {

        y.type = 'text';
    } else {
        y.type = 'password';
    }
};