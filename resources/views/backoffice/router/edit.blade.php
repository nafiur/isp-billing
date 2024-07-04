@extends('backoffice.template')
@section('content')
@section('title')
{{ 'Edit Router' }}
@endsection
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card mb-0">
            <div class="card-body">

                <div class="page-header">
                    <div class="content-page-header">
                        <h5>Edit Router</h5>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('router.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $router->id }}">
                        <h5 class="card-title">Details Information</h5>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="input-block mb-3">
                                    <label>Router Name</label>
                                    <input type="text" name="name" value="{{ $router->name }}" class="form-control" required>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-block mb-3">
                                    <label>Location</label>
                                    <input type="text" name="location" value="{{ $router->location }}" class="form-control" required>
                                    @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-block mb-3">
                                    <label>Router IP</label>
                                    <input type="text" name="ip" value="{{ $router->ip }}" class="form-control" required>
                                    @error('ip')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-block mb-3">
                                    <label>Router Username</label>
                                    <input type="text" name="username" value="{{ $router->username }}" class="form-control" required>
                                    @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-block mb-3">
                                    <label>Router Password</label>
                                    <input type="text" name="password" value="{{ $router->password }}" class="form-control" required>
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="text-end">
                                    <a href="{{ route('router.index') }}" class="btn btn-light">Cancel</a>
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
