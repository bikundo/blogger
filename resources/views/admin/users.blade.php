@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-block">
                <table class="table table-bordered" id="users-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Joined on</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('footer-scripts')
    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.all.users') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'company', name: 'company'},
                    {data: 'date', name: 'date', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@stop
