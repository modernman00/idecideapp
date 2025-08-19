export const id = (x) => document.getElementById(x);
export const qSelAll = (x) => document.querySelectorAll(x);
export const qSel = (x) => document.querySelector(x);
export const showError = (e) => {
  
    log(e.message, ' ERROR MESSAGE'); // "null has no properties"
    log(e.name, ' ERROR NAME'); // "TypeError"
    log(e.fileName,  ' ERROR FILENAME'); // "Scratchpad/1"
    log(e.lineNumber, ' ERROR LINENUMBER'); // 2

    log(e.stack);
};

export const log = (x, describe = null) => console.log(x, describe);

export function bindEvent({ id, event = 'click', handler }) {
  const el = document.getElementById(id);
  if (el && typeof handler === 'function') {
    el.addEventListener(event, handler);
  }
}