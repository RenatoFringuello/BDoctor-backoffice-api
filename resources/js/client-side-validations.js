const myForm = document.getElementById('form');
myForm.addEventListener("submit", (event) => {
    if(myForm.classList.contains('hasPassword') || myForm.classList.contains('hasCheckbox')){
        event.preventDefault();
        let pass1 = document.getElementById('password').value;
        let pass2 = document.getElementById('password-confirm').value;
        const checkbox = document.querySelectorAll('input[type=checkbox].checkbox__trigger:checked')
        console.log(checkbox.length)
        if (checkbox.length >= 1 && pass1 == pass2) {
            myForm.submit();
        }
    }
});