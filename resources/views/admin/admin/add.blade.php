@extends('layouts.app')

@section('content')
<main class="app-main">
    <div class="card card-primary card-outline m-4">
        <div class="card-header">
            <div class="card-title">{{ __('messages.addAdmin') }}</div>
        </div>
        <form id="addAdminForm" method="post" action="" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                @include('_message')
                <div class="mb-3">
                    <label for="admin_name" class="form-label">{{ __('messages.name') }}</label>
                    <input type="text" class="form-control" id="admin_name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('messages.email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('messages.password') }}</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="input-group mb-3" style="direction: ltr">
                    <input type="file" class="form-control" id="admin_photo" name="admin_photo">
                    <label class="input-group-text" for="admin_photo">{{ __('messages.upload') }}</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('messages.add') }}</button>
            </div>
        </form>
    </div>
</main>
<script src="{{ asset('dist/js/addAdmin.js') }}"></script>
@endsection


