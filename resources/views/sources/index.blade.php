@extends('layouts.dashboard')

@section('title', 'Sources')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">

        @if (session('status'))
        <div class="alert alert-success">
            <i class="icon fa fa-check"></i>
            {{ session('status') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong>Sources</strong>
                </h3>
                <div class="card-tools">
                    <a href="{{ route('source.create') }}" class="btn btn-sm btn-success">
                        <i class="nav-icon fas fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-sm text-nowrap" width="100%" id="dynamic-table">
                    <thead>
                        <tr>
                            <th width="4%">#</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th width="100"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($sources as $source)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $source->name }}</td>
                            <td>{{ $source->type->type }}</td>
                            <td>{{ $source->active == 1 ? 'Active' : 'Disabled' }}</td>
                            <td class="text-center">
                                <a href="{{ route('source.edit', ['source' => $source->id]) }}"
                                    class="btn btn-primary btn-xs">
                                    <span class="fas fa-edit"></span>
                                    Edit
                                </a>
                                <a href="{{ route('source.destroy', ['source' => $source->id]) }}"
                                    class="btn btn-danger btn-xs">
                                    <span class="fas fa-trash"></span>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
</div>
@stop

@section('plugins.Datatables', true)

@section('js')
<script>
    var p = $('#dynamic-table').DataTable({
        lengthMenu: [
            [7, 50, 100],
            [7, 50, 100]
        ],
        displayLength: 7,
        columnDefs: [{
            targets: -1,
            orderable: false
        }]
    });

</script>
@stop
