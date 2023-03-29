const myForm = document.getElementById('form');
const send = document.getElementById('send');


myForm.addEventListener("submit", (event) => {
    event.preventDefault();
    let pass1 = document.getElementById('password').value;
    let pass2 = document.getElementById('password-confirm').value;
    console.log(pass1, pass2)
    if (pass1 != pass2) {
        alert("the pass and repeat pass must be equal")


    } else {

        myForm.submit()
    }


});
