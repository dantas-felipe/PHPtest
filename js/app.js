// Variables
const $zipcode = document.querySelector('#zipcode');
const $output = document.querySelector('#output');
const $result = document.querySelector('#result-body');
const $box = document.getElementsByClassName('message');

// Apply mask
// VMasker($zipcode).maskPattern("99999-999");

// Listen for button close output
document.querySelector("body").addEventListener("click", closeOutput);

// Zipcode validation
function zipcodeValidation(value) {
  return /(^[0-9]{5}-[0-9]{3}$|^[0-9]{8}$)/.test(value) ? true : false;
}

// Close Output Container
function closeOutput(event) {
  if (event.target.className == 'delete') {
    $output.innerHTML = '';
    $result.innerHTML = '';
    $zipcode.value = '';
    $zipcode.focus();
  }
}

