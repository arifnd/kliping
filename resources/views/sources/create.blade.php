@extends('layouts.dashboard')

@section('title', 'New Source')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong>New Source</strong>
                </h3>
            </div>

            <form action="{{ route('source.store') }}" method="POST">
                @csrf

                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}" placeholder="Name">
                                @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="url">Url <span class="text-danger">*</span></label>
                                <input type="text" name="url" id="url" class="form-control"
                                    value="{{ old('url') }}" placeholder="Url">
                                @error('url')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="no_ijazah">Type</label>
                                <select name="type" id="type" class="form-control">
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="active" value="1" />

                    <span class="text-danger">(*) Required.</span>

                </div>

                <div class="card-footer">
                    <a href="{{ route('sources.index') }}" class="btn btn-outline-danger btn-sm">CANCEL</a>

                    <button class="btn btn-success btn-sm" type="submit">
                        <span class="fas fa-save"></span> SAVE
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>
@stop