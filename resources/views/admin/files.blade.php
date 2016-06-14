@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-block">
                <table class="table table-bordered" id="users-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>DOWNLOADS</th>
                        <th>uploaded on</th>
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
                ajax: '{!! route('datatables.all.files') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'downloads', name: 'downloads', searchable: false, orderable: false,},
                    {data: 'date', name: 'date', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@stop
