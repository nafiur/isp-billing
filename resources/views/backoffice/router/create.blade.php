@extends('backoffice.template')
@section('content')
@section('title')
{{ 'Package' }}
@endsection
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card mb-0">
            <div class="card-body">

                <div class="page-header">
                    <div class="content-page-header">
                        <h5>New Package</h5>
                    </div>
                </div>

                <div class="card-body">
                    <form action="#">
                        <h5 class="card-title">Details Information</h5>
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-6">
                                <div class="input-block mb-3">
                                    <label>Username</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="input-block mb-3">
                                    <label>Email</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="input-block mb-3">
                                    <label>Password</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="input-block mb-3">
                                    <label>Repeat Password</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
