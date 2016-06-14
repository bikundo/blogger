@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-block">
                <table class="table table-bordered" id="users-table">
                    <thead>
                    <tr>
                        <th>Ref</th>
                        <th>Downloaded by</th>
                        <th>File Downloaded</th>
                        <th>Company</th>
                        <th>Date/TIme</th>
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
                ajax: '{!! route('datatables.all.downloads') !!}',
                columns: [
                    {data: 'ref', name: 'ref'},
                    {data: 'user.name', name: 'user.name', orderable: false, searchable: false},
                    {data: 'file.name', name: 'file.name', orderable: false, searchable: false},
                    {data: 'user.company', name: 'company', orderable: false, searchable: false},
                    {data: 'date', name: 'date', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@stop
