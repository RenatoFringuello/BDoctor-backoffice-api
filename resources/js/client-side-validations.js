const myForm = document.getElementById('form');
const send = document.getElementById('send');


myForm.addEventListener("submit", (event) => {
    event.preventDefault();
    let pass1 = document.getElementById('password').value;
    let pass2 = document.getElementById('password-confirm').value;

    /*  console.log(pass1, pass2) */

    const checkbox = document.querySelectorAll('input[type=checkbox].checkbox__trigger:checked')
    /* console.log(checkbox) */
    console.log(checkbox.length)

    if (checkbox.length >= 1 && pass1 == pass2) {
        myForm.submit()
    }
});





















