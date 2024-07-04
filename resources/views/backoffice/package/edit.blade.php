@extends('backoffice.template')
@section('content')
@section('title')
{{ 'Edit Package' }}
@endsection
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card mb-0">
            <div class="card-body">

                <div class="page-header">
                    <div class="content-page-header">
                        <h5>Edit Package</h5>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('package.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $package->id }}">
                        <h5 class="card-title">Details Information</h5>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="input-block mb-3">
                                    <label>Router Name</label>
                                    <select class="select" name="router_id">
                                        <option>Select Mikrotik Router</option>
                                        @foreach ($router as $router)
                                        <option value="{{ $router->id }}" {{ $package->router_id == $router->id ? 'selected' : '' }}>{{ $router->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-block mb-3">
                                    <label>Package Name</label>
                                    <input type="text" name="name" value="{{ $package->name }}" class="form-control" required>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-block mb-3">
                                    <label>Price</label>
                                    <input type="text" name="price" value="{{ $package->price }}" class="form-control" required>
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="text-end">
                                    <a href="{{ route('package.index') }}" class="btn btn-light">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
