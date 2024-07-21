<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Meta tags and other links -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.reset_password_title') }}</title>

    <!-- Fonts and other CSS links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@fontsource/amiri@1.0.4/index.css" rel="stylesheet"
        integrity="sha384-Vfzt2z3w/9P/C4Um2+QNF1jvT1D5+JoQPB7O6/+E9+0/qOj2zNEw7vA/8tGVtTkm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
        integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
        integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        body {
            direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};
        }
    </style>
</head>

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('index2.html') }}"><b>Hope</b>School</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                @include('_message')
                <form id="resetForm" method="post" action="{{ url('reset/' . $user->remember_token) }}">
                    {{ csrf_field() }}
                    <div class="input-group mb-3" style="direction: ltr">
                        <input type="password" name="password" class="form-control"
                            placeholder="{{ __('messages.newpassword') }}" required>
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3" style="direction: ltr">
                        <input type="password" name="confirm_password" class="form-control"
                            placeholder="{{ __('messages.confirm_password') }}" required>
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">{{ __('messages.recoveryNow') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="mt-2 mx-auto text-center">
                    <a id="forget_pass" href="{{ url('/') }}">{{ __('messages.loginPage') }}</a>
                </p>
                <div class="language-switcher">
                    <a href="?lang=en">
                        <img src="https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg"
                            alt="English">
                    </a>
                    <a href="?lang=ar">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Flag_of_Saudi_Arabia.svg/800px-Flag_of_Saudi_Arabia.svg.png?20230323235445"
                            alt="Arabic">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('dist/js/reset.js') }}"></script>
</body>

</html>
