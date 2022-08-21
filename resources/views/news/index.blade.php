@extends('layouts.dashboard')

@section('title', 'News')

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
                    <strong>News</strong>
                </h3>
                <div class="card-tools">
                    <a href="{{ route('news.create') }}" class="btn btn-sm btn-success">
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
                            <th>Date</th>
                            <th>Title</th>
                            <th>Source</th>
                            <th width="50"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($news as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->date->format('d/m/Y') }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->source->name }}</td>
                            <td class="text-center">
                                <a href=""
                                    class="btn btn-primary btn-xs">
                                    <span class="fas fa-list"></span>
                                    Detail
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
