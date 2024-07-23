@extends('layouts.app')

@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">{{ __('messages.class_list') }}, ({{ __('messages.total_record') }} :
                        {{ $getRecord->total() }})</h3>
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
                    <a href="{{ url('admin/class/add') }}" class="btn btn-primary w-100">
                        {{ __('messages.addClass') }}
                    </a>
                </div>
                <div class="col-12 col-md-8">
                    <form class="d-flex flex-column flex-md-row" id="searchForm" action="" method="get" style="direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};">
                        <input 
                            type="text" 
                            class="form-control me-md-2 mb-2 mb-md-0" 
                            placeholder="{{ __('messages.search') }}.." 
                            name="search" 
                            value="{{ request()->get('search') }}"
                        >
                        <select class="form-control me-md-2 mb-2 mb-md-0" name="status">
                            <option value="">{{ __('messages.all_statuses') }}</option>
                            <option value="0" {{ request()->get('status') == '0' ? 'selected' : '' }}>{{ __('messages.active') }}</option>
                            <option value="1" {{ request()->get('status') == '1' ? 'selected' : '' }}>{{ __('messages.inactive') }}</option>
                        </select>
                        <button type="submit" class="btn btn-outline-primary me-md-2 mb-2 mb-md-0">
                            <i class="fa fa-search"></i>
                        </button>
                        <a href="{{ url()->current() }}" class="btn btn-secondary">
                            {{ __('messages.default') }}
                        </a>
                    </form>
                </div>
            </div>

            <!--begin::Row-->
            <div class="row">
                @foreach ($getRecord as $record)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $record->name }}</h5>
                                <br>
                                <p class="card-text mt-2">
                                    {{ __('messages.status') }}: 
                                    @if ($record->status == 0)
                                        <span class="badge bg-success">{{ __('messages.active') }}</span>
                                    @else
                                        <span class="badge bg-danger">{{ __('messages.inactive') }}</span>
                                    @endif
                                </p>
                                @php
                                    $date = \Carbon\Carbon::parse($record->created_at);
                                @endphp
                                <p class="card-text">{{ __('messages.created_date') }}: {{ $date->format('Y-m-d') }}</p>
                                <p class="card-text">{{ __('messages.created_by') }}: <a class="anchor" href="#">{{ $record->created_by_name }}</a></p>
                                <div class="d-flex justify-content-between">
                                    <button data-id="{{ $record->id }}" class="btn btn-warning btn-sm btn-edit flex-grow-1 me-1">
                                        {{ __('messages.edit') }}
                                    </button>
                                    <button data-id="{{ $record->id }}" class="btn btn-danger btn-sm btn-delete flex-grow-1 ms-1">
                                        {{ __('messages.delete') }}
                                    </button>
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

                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">{{ __('messages.editClass') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="id" id="class_id">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('messages.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="statusEdit" class="form-label">{{ __('messages.status') }}</label>
                            <select class="form-select" name="status" id="statusEdit">
                                <option value="0">{{ __('messages.active') }}</option>
                                <option value="1">{{ __('messages.inactive') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('messages.saveChanges') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            // تعديل الكود للتعديل
            const editButtons = document.querySelectorAll('.btn-edit');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const classId = this.getAttribute('data-id');

                    fetch(`/admin/class/${classId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('class_id').value = data.id;
                            document.getElementById('name').value = data.name;
                            document.getElementById('statusEdit').value = data.status;
                            const editModal = new bootstrap.Modal(document.getElementById(
                                'editModal'));
                            editModal.show();
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            document.getElementById('editForm').addEventListener('submit', function(event) {
                event.preventDefault();

                const form = event.target;
                const formData = new FormData(form);
                const classId = document.getElementById('class_id').value;

                fetch(`/admin/class/update/${classId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        toastr.clear();
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
                    })
                    .catch(error => {
                        toastr.clear();
                        errorSound.play();
                        toastr.error(messages.networkError);
                    });
            });

            // إضافة الكود للحذف
            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    const classId = event.target.getAttribute('data-id');

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
                            fetch(`/admin/class/${classId}/delete`, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute(
                                            'content'),
                                        'Content-Type': 'application/json'
                                    },
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
