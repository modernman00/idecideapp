import { id } from '../global.js';

export const loaderIconBootstrap = () => {

    return `<div class="spinner-grow text-primary" role="status">
        <span class="sr-only">Loading...</span>
        </div>`;
};

export const loaderIcon = () => {

    return '<div class="loader"></div>';
};

export const loaderIconBulma = () => {

    return '<div class="is-loading"></div>';
};

export const clearLoader = (elementId = 'setLoader', loaderClass = 'loader') => {
    const loader = id(elementId);
    if (!loader) {
        throw new Error('Element not found');
    }

    loader.style.display = 'none';
    loader.classList.remove(loaderClass);

};
export const showLoader = (elementId ='setLoader', loaderClass = 'loader') => {
    const loader = id(elementId);
    if (!loader) {
        throw new Error('Element  not found');
    }
    loader.classList.add(loaderClass);
    loader.style.display = 'block';
};
