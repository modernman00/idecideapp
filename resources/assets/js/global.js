export const id = (x) => document.getElementById(x);
export const qSelAll = (x) => document.querySelectorAll(x);
export const qSel = (x) => document.querySelector(x);
export const showError = (err) => {
  throw new Error(err);

};

export const log = (x, describe = null) => console.log(x, describe)