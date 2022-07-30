@extends('layouts.master')
@push('head-script')
    
@endpush
@section('content')
<div class="page-content">
    <section class="section">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Details User</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{route('admin.user-management-update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$details->id}}">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" value="{{$details->name}}" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{$details->email}}" required readonly>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Personal Token</label>
                                            <input type="text" class="form-control" value="{{$details->personal_token}}" name="personal_token">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Device Limit</label>
                                            <input type="text" class="form-control" value="{{$details->device_limit}}" name="device_limit" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Honda ID</label>
                                            <input type="number" class="form-control" value="{{$details->honda_id}}" name="honda_id" required>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-3 col-3">
                                        <div class="form-group">
                                            <label>Is Administrator ?</label>
                                            <select name="is_admin" class="form-select" required>
                                                <option value="1" {{$details->is_admin ? '1' : 'selected'}}>Yes</option>
                                                <option value="0" {{$details->is_admin ? '0' : 'selected'}}>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-3">
                                        <div class="form-group">
                                            <label>Is Active ?</label>
                                            <select name="is_active" class="form-select" required>
                                                <option value="1" {{$details->is_active ? '1' : 'selected'}}>Yes</option>
                                                <option value="0" {{$details->is_active ? '0' : 'selected'}}>No</option>
                                            </select>
                                        </div>
                                    </div>                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" id="deleteConfirm" class="btn btn-danger me-1 mb-1">Delete</button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<form action="{{route('admin.user-management-delete')}}" id="form-delete" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{$details->id}}" required>
</form>

@endsection
@push('foot-script')
<script>
    $('#deleteConfirm').on('click',function(e){
        e.preventDefault();
        var form = $('#form-delete');
        Swal.fire({
            text: 'Are you sure, delete this user?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {        
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

</script>
@endpush