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

                <div class="row">
                    <div class="col-md-12">
                        <form action={{ route('package.store') }} method="POST">
                            @csrf
                            <div class=" form-group-item">
                                {{-- <h5 class="form-title">Basic Details</h5> --}}

                                <div class="row">

                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Router</label>
                                            <select class="select" name="router_id">
                                                <option>Select Mikrotik Router</option>
                                                <option>₹</option>
                                                <option>$</option>
                                                <option>£</option>
                                                <option>€</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Package Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Package Name">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="input-block mb-3">
                                            <label>Price</label>
                                            <input type="number" name="price" class="form-control" placeholder="Enter Your Notes">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-customer-btns text-end">
                                <a href="{{ route('package.index') }}" class="btn customer-btn-cancel">Cancel</a>
                                <button type="submit" class="btn customer-btn-save">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@endsection
