@extends('layouts.master')
@push('head-script')
    
@endpush
@section('content')
<div class="page-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <button class="reload btn btn-sm btn-warning">Reload Data</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped dataTable-table table-responsive" id="myTable" style="width:100%">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Email</td>
                                    <td>Name</td>
                                    <td>Honda ID</td>
                                    <td>Is Admin</td>
                                    <td>Is Active</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('foot-script')
<script>
    $( document ).ready(function() {
        var table = $('#myTable').DataTable({
            searching: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url:  "{{route('admin.user-management')}}",
                type: 'GET',
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false },
                { data: 'email', name: 'email' },
                { data: 'name', name: 'name' },
                { data: 'honda_id', name: 'honda_id' },
                { data: 'is_admin', name: 'is_admin', render: function (data, type, row) {
                    if (row.is_admin == 1) {
                        return '<span class="badge bg-light-success">True</span>';
                    } else {
                        return '<span class="badge bg-light-danger">False</span>';
                    }
                }},
                { data: 'is_active', name: 'is_active', render: function (data, type, row) {
                    if (row.is_active == 1) {
                        return '<span class="badge bg-light-success">True</span>';
                    } else {
                        return '<span class="badge bg-light-danger">False</span>';
                    }
                }},
                {render: function (data, type, row) {                    
                    return `<a href="${baseURL}/details/${row.id}" class="btn btn-success btn-sm">Details</a>`;
                }},
            ]
        });

        $(".reload").click(function() {
            table.ajax.reload();
        });
    });

</script>
@endpush