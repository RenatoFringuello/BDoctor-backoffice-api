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

// const myForm = document.getElementById('form');

// myForm.addEventListener("submit", (event) => {
//     if(myForm.classList.contains('hasPassword') || myForm.classList.contains('hasCheckbox')){
//         event.preventDefault();

//         if(myForm.classList.contains('hasPassword')){
//             //password check
//             let pass = document.getElementById('password').value;
//             let passConfirm = document.getElementById('password-confirm').value;

//             if (pass == passConfirm) {
//                 console.log('pw 3');
//                 myForm.submit();
//             }
//         }

//         if(myForm.classList.contains('hasCheckbox')){
//             // checkboxes validation
//             let checkboxes = document.querySelectorAll('input[type=checkbox].checkbox__trigger:checked');

//             console.log(checkboxes);
            
//             if (checkboxes.length >= 1) {
//                 console.log('done 3');
//                 myForm.submit();
//             }
//         }
//     }
// });