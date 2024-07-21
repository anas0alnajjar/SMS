document.addEventListener('DOMContentLoaded', function () {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    
    const errorSound = new Audio('dist/sounds/error.mp3');

    document.getElementById('loginForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const form = event.target;

        fetch(form.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': form.querySelector('input[name=_token]').value
            },
            body: JSON.stringify({
                email: form.email.value,
                password: form.password.value,
                remember: form.remember.checked
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.redirect) {
                    window.location.href = data.redirect;
            } else if (data.error) {
                errorSound.play();
                toastr.error(data.error);
            }
        })
        .catch(error => {
            errorSound.play();
            toastr.error('حدث خطأ. الرجاء المحاولة مرة أخرى.');
        });
    });
});
