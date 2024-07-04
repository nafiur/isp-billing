@extends('backoffice.template')
@section('content')
@section('title')
{{ 'Add Router' }}
@endsection
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card mb-0">
            <div class="card-body">

                <div class="page-header">
                    <div class="content-page-header">
                        <h5>New Router</h5>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('router.store') }}" method="POST">
                        @csrf
                        <h5 class="card-title">Details Information</h5>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <div class="input-block mb-3">
                                    <label>Router Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="input-block mb-3">
                                    <label>Location</label>
                                    <input type="text" name="location" class="form-control" required>
                                </div>
                                <div class="input-block mb-3">
                                    <label>Router IP</label>
                                    <input type="text" name="ip" class="form-control" required>
                                </div>
                                <div class="input-block mb-3">
                                    <label>Router Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="input-block mb-3">
                                    <label>Router Password</label>
                                    <input type="text" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="text-end">
                                    <a href="{{ route('router.index') }}" class="btn btn-dark">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
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
