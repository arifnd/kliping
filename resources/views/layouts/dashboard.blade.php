@extends('adminlte::page')

@section('footer')
    <strong>&copy; 2022{{ date('Y') > 2022 ? ' - '.date('Y') : '' }} by <a href="http://github.com/arifnd">arifnd</a></strong>
    <div class="float-right d-none d-sm-inline-block">
        Version 0.1.0
    </div>
@stop