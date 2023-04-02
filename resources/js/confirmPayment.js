const popUp = document.getElementById('popup')

if (popUp) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Payment sent successfully',
        showConfirmButton: false,
        timer: 1500
    })
}