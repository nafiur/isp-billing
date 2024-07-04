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
                        <h5>Add Customer</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf
                            <div class="form-group-item">
                                <h5 class="form-title">Basic Details</h5>
                                {{-- <div class="profile-picture">
                                    <div class="upload-profile">
                                        <div class="profile-img">
                                            <img id="blah" class="avatar" src="assets/img/profiles/avatar-14.jpg" alt="profile-img">
                                        </div>
                                        <div class="add-profile">
                                            <h5>Upload a New Photo</h5>
                                            <span>Profile-pic.jpg</span>
                                        </div>
                                    </div>
                                    <div class="img-upload">
                                        <label class="btn btn-upload">
                                            Upload <input type="file">
                                        </label>
                                        <a class="btn btn-remove">Remove</a>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Enter Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Date of Birth</label>
                                            <div class="cal-icon cal-icon-info">
                                                <input type="date" class="datetimepicker form-control" id="datetimepicker" name="dob" placeholder="Select Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>NID</label>
                                            <input type="text" name="pin" class="form-control" placeholder="Enter NID">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-customer customer-additional-form">
                                <div class="row">
                                    <h5 class="form-title">Subscription Details</h5>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Router Name</label>
                                            <select class="select" name="router_name" id="routerSelect">
                                                <option>Select Mikrotik Router</option>
                                                @foreach ($router as $router)
                                                <option value="{{ $router->id }}">{{ $router->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Package</label>
                                            <select class="select" name="package_name" id="packageSelect">
                                                <option>Select Package</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-customer customer-additional-form">
                                <div class="row">
                                    <h5 class="form-title">Password</h5>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Password</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Confirm Password</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-customer-btns text-end">
                                <a href="{{ route('customer.index') }}" class="btn customer-btn-cancel">Cancel</a>
                                <button type="submit" class="btn customer-btn-save">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
    });

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#routerSelect').change(function() {
            var routerId = $(this).val();
            if (routerId) {
                $.ajax({
                    url: '/packages/' + routerId
                    , type: 'GET'
                    , dataType: 'json'
                    , success: function(data) {
                        $('#packageSelect').empty();
                        $('#packageSelect').append('<option>Select Package</option>');
                        $.each(data, function(key, value) {
                            $('#packageSelect').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#packageSelect').empty();
                $('#packageSelect').append('<option>Select Package</option>');
            }
        });
    });

</script>
@endsection
