<div class="clear-both"></div>

@php
    $alertTypes = [
        'success' => 'alert-success',
        'error' => 'alert-danger',
        'payment_error' => 'alert-danger',
        'warning' => 'alert-warning',
        'info' => 'alert-info',
        'secondary' => 'alert-secondary',
        'primary' => 'alert-primary',
        'light' => 'alert-light',
    ];
@endphp

@foreach ($alertTypes as $key => $alertClass)
    @if(session()->has($key))
        <div class="alert {{ $alertClass }} alert-dismissible fade show" role="alert">
            {{ session($key) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
@endforeach
