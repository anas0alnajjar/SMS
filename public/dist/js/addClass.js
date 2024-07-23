document.addEventListener('DOMContentLoaded', function () {
    console.log("JavaScript is running...");

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
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

    const errorSound = new Audio('/dist/sounds/error.mp3');
    const successSound = new Audio('/dist/sounds/success.mp3');

    document.getElementById('addForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': form.querySelector('input[name=_token]').value
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(json => { throw json });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                successSound.play();
                toastr.success(data.success);
                setTimeout(() => {
                    window.location.href = '/admin/class/list';
                }, 1500);
            } else if (data.error) {
                errorSound.play();
                toastr.error(data.error);
            }
        })
        .catch(error => {
            let errorMessage = 'حدث خطأ. الرجاء المحاولة مرة أخرى.';
            if (error.errors) {
                errorMessage = Object.values(error.errors).flat().join('<br>');
            }
            errorSound.play();
            toastr.error(errorMessage);
        });
    });
});