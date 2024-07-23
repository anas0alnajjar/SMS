@extends('layouts.app')

@section('content')
<main class="app-main">
    <div class="card card-primary card-outline m-4">
        <div class="card-header">
            <div class="card-title">{{ __('messages.addClass') }}</div>
        </div>
        <form id="addForm" method="post" action="">
            {{ csrf_field() }}
            <div class="card-body">
                @include('_message')
                <div class="mb-3">
                    <label for="class_name" class="form-label">{{ __('messages.name') }}</label>
                    <input type="text" class="form-control" id="class_name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">{{ __('messages.status') }}</label>
                    <select class="form-select" name="status" id="status">
                        <option value="0">
                            {{ __('messages.active') }}
                        </option>
                        <option value="1">
                            {{ __('messages.inactive') }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('messages.add') }}</button>
            </div>
        </form>
    </div>
</main>
<script src="{{ asset('dist/js/addClass.js') }}"></script>
@endsection


