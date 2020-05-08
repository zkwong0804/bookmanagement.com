let inputDivs = document.querySelectorAll('.input-div');
let buttons = document.querySelectorAll('input[type="submit"]');
let labels = document.querySelectorAll('label');
let inputTexts = document.querySelectorAll('input[type="text"]');
let inputPass = document.querySelectorAll('input[type="password"]');

const inputDivsClass = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label";
const buttonClass = "mdl-button mdl-js-button mdl-button--raised mdl-button--colored";
const labelClass = "mdl-textfield__label";
const inputClass = "mdl-textfield__input";

for (let e of inputDivs) e.className = inputDivsClass;
for (let e of buttons) e.className = e.className+buttonClass;
for (let e of labels) e.className = e.className+labelClass;
for (let e of inputTexts) e.className = e.className+inputClass;
for (let e of inputPass) e.className = e.className+inputClass;