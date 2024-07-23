@extends('layouts.app')

@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3 class="mb-0">{{ __('messages.admin_list') }}, ({{ __('messages.total_record') }} : {{$getRecord->total()}})</h3>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header-->

    <!--begin::App Content-->
    @include('_message')
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row mb-4">
                <div class="col-12 col-md-4 mb-2 mb-md-0">
                    <a href="{{ url('admin/admin/add') }}" class="btn btn-primary w-100">
                        {{ __('messages.addAdmin') }}
                    </a>
                </div>
                <div class="col-12 col-md-8 mb-2 mb-md-0">
                    <form class="d-flex flex-column flex-md-row" action="" method="get" style="direction: ltr;">
                        <input 
                            type="text" 
                            class="form-control me-md-2 mb-2 mb-md-0" 
                            placeholder="{{ __('messages.search') }}.." 
                            name="search" 
                            id="searchInput" 
                            value="{{ Request::get('search') }}"
                        >
                        <button type="submit" class="btn btn-outline-secondary me-md-2 mb-2 mb-md-0">
                            <i class="fa fa-search"></i>
                        </button>
                        <a style="margin-left:2px;" href="{{ url()->current() }}" class="btn btn-success">
                            {{ __('messages.default') }}
                        </a>
                    </form>
                </div>
            </div> <!--end::Row-->
            
            <div class="row">
                @foreach ($getRecord as $record)
                @php
                    $photo = \App\Models\UserPhoto::where('user_id', $record->id)->first();
                    $photoSrc = $photo
                        ? asset('storage/' . $photo->photo_path)
                        : asset('dist/assets/img/659651.svg');
                @endphp
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card mb-4 w-100">
                        <div class="card-header text-center">
                            <img class="card-img-top rounded-circle" style="width: 80px; height: 80px;" src="{{ $photoSrc }}" alt="admin_photo">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $record->name }}</h5>
                            <hr>
                            <p class="card-text">
                                <strong>{{ __('messages.email') }}:</strong> <a class="anchor" href="mailto:{{ $record->email }}">{{ $record->email }}</a>
                            </p>
                            @php
                            $date = \Carbon\Carbon::parse($record->created_at);
                            @endphp
                            <p class="card-text"><strong>{{ __('messages.created_at') }}:</strong> {{ $date->format('Y-m-d') }}</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between">
                                    <button data-id="{{ $record->id }}" class="btn btn-warning btn-sm btn-edit w-45">
                                        {{ __('messages.edit') }}
                                    </button>
                                    <button data-id="{{ $record->id }}" class="btn btn-danger btn-sm btn-delete w-45">
                                        {{ __('messages.delete') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> <!--end::Row-->

            <div class="card-tools col-sm-12">
                {!! $getRecord->appends(\Illuminate\Support\Facades\Request::except('page'))->links() !!}
            </div>
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
</main>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <form id="editForm" method="POST" enctype="multipart/form-data" action="{{ url('admin/admin/update') }}">
                @csrf
                
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">{{ __('messages.editAdmin') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <div class="mt-3 text-center">
                        <img id="current_photo" src="" alt="admin_photo" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <input type="hidden" name="id" id="admin_id">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('messages.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('messages.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('messages.change_password') }}</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="admin_photo" class="form-label">{{ __('messages.photo') }}</label>
                        <input type="file" class="form-control" id="admin_photo" name="admin_photo">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('messages.saveChanges') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
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

    const messages = {
        areYouSure: @json(__('messages.are_you_sure')),
        youWontBeAbleToRevertThis: @json(__('messages.you_wont_be_able_to_revert_this')),
        yesDeleteIt: @json(__('messages.yes_delete_it')),
        cancel: @json(__('messages.cancel')),
        mainAdminCannotBeDeleted: @json(__('messages.main_admin_cannot_be_deleted')),
        networkError: @json(__('messages.network_error'))
    };

    const errorSound = new Audio('/dist/sounds/error.mp3');
    const successSound = new Audio('/dist/sounds/success.mp3');

    const editButtons = document.querySelectorAll('.btn-edit');
    const deleteButtons = document.querySelectorAll('.btn-delete');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const adminId = this.getAttribute('data-id');

            fetch(`/admin/admin/${adminId}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('admin_id').value = data.id;
                    document.getElementById('name').value = data.name;
                    document.getElementById('email').value = data.email;
                    document.getElementById('current_photo').src = data.photo_url ? `/storage/${data.photo_url}` : '/dist/assets/img/659651.svg';
                    const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                    editModal.show();
                })
                .catch(error => console.error('Error:', error));
        });
    });

    document.getElementById('editForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);
        const adminId = document.getElementById('admin_id').value;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', `/admin/admin/update/${adminId}`, true);
        xhr.setRequestHeader('X-CSRF-TOKEN', form.querySelector('input[name=_token]').value);

        // Show toastr with progress bar
        toastr.info('Uploading image...', { timeOut: 0, extendedTimeOut: 0 });

        xhr.upload.addEventListener('progress', function (e) {
            if (e.lengthComputable) {
                const percentComplete = (e.loaded / e.total) * 100;
                toastr.info(`Uploading image... ${Math.round(percentComplete)}%`, { timeOut: 0, extendedTimeOut: 0, progressBar: true, progress: percentComplete });
            }
        });

        xhr.onload = function () {
            toastr.clear();
            if (xhr.status >= 200 && xhr.status < 300) {
                const data = JSON.parse(xhr.responseText);
                if (data.success) {
                    successSound.play();
                    toastr.success(data.success);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else if (data.error) {
                    errorSound.play();
                    toastr.error(data.error);
                }
            } else {
                const error = JSON.parse(xhr.responseText);
                let errorMessage = 'حدث خطأ. الرجاء المحاولة مرة أخرى.';
                if (error.errors) {
                    errorMessage = Object.values(error.errors).flat().join('<br>');
                }
                errorSound.play();
                toastr.error(errorMessage);
            }
        };

        xhr.onerror = function () {
            toastr.clear();
            errorSound.play();
            toastr.error(messages.networkError);
        };

        xhr.send(formData);
    });

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            const adminId = event.target.getAttribute('data-id');

            if (adminId == 1) {
                errorSound.play();
                toastr.error(messages.mainAdminCannotBeDeleted);
                return;
            }

            Swal.fire({
                title: messages.areYouSure,
                text: messages.youWontBeAbleToRevertThis,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: messages.yesDeleteIt,
                cancelButtonText: messages.cancel
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/admin/${adminId}/delete`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            successSound.play();
                            toastr.success(data.success);
                            setTimeout(() => {
                                window.location.reload();
                            }, 1500);
                        } else {
                            errorSound.play();
                            toastr.error(data.error);
                        }
                    })
                    .catch(error => {
                        errorSound.play();
                        toastr.error(messages.networkError);
                    });
                }
            });
        });
    });
});
</script>
@endsection
