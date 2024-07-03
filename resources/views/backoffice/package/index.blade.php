@extends('backoffice.template')
@section('content')
@section('title')
{{ 'Package' }}
@endsection
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="content-page-header">
                <h5>Customers</h5>
                <div class="list-btn">
                    <ul class="filter-list">
                        <li>
                            <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter"><span class="me-2"><img src="{{ asset('backoffice/assets/img/icons/filter-icon.svg') }}" alt="filter"></span>Filter </a>
                        </li>
                        <li>
                            <div class="dropdown dropdown-action" data-bs-toggle="tooltip" data-bs-placement="top" title="Download">
                                <a href="#" class="btn-filters" data-bs-toggle="dropdown" aria-expanded="false"><span><i class="fe fe-download"></i></span></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="d-block">
                                        <li>
                                            <a class="d-flex align-items-center download-item" href="javascript:void(0);" download><i class="far fa-file-pdf me-2"></i>PDF</a>
                                        </li>
                                        <li>
                                            <a class="d-flex align-items-center download-item" href="javascript:void(0);" download><i class="far fa-file-text me-2"></i>CVS</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="btn-filters" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Print"><span><i class="fe fe-printer"></i></span> </a>
                        </li>
                        <li>
                            <a class="btn btn-import" href="javascript:void(0);"><span><i class="fe fe-check-square me-2"></i>Import Customer</span></a>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="{{ route('package.create') }}"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Customer</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div id="filter_inputs" class="card filter-card">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3">
                            <label>Email</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center table-hover datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Balance </th>
                                        <th>Total Invoice </th>
                                        <th>Created</th>
                                        <th>Status</th>
                                        <th class="no-sort">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-md me-2"><img class="avatar-img rounded-circle" src="{{ asset('backoffice/assets/img/profiles/avatar-14.jpg') }}" alt="User Image"></a>
                                                <a href="profile.html">John Smith <span><span class="__cf_email__" data-cfemail="1a707572745a7f627b776a767f34797577">[email&#160;protected]</span></span></a>
                                            </h2>
                                        </td>
                                        <td>+1 989-438-3131</td>
                                        <td>$4,220</td>
                                        <td>2</td>
                                        <td>19 Dec 2023, 06:12 PM</td>
                                        <td><span class="badge bg-success-light">Active</span></td>
                                        <td class="d-flex align-items-center">
                                            <a href="add-invoice.html" class="btn btn-greys me-2"><i class="fa fa-plus-circle me-1"></i> Invoice</a>
                                            <a href="customers-ledger.html" class="btn btn-greys me-2"><i class="fa-regular fa-eye me-1"></i> Ledger</a>
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul>
                                                        <li>
                                                            <a class="dropdown-item" href="edit-customer.html"><i class="far fa-edit me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="customer-details.html"><i class="far fa-eye me-2"></i>View</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="active-customers.html"><i class="fa-solid fa-power-off me-2"></i>Activate</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="deactive-customers.html"><i class="far fa-bell-slash me-2"></i>Deactivate</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-md me-2"><img class="avatar-img rounded-circle" src="{{ asset('backoffice/assets/img/profiles/avatar-15.jpg')}}" alt="User Image"></a>
                                                <a href="profile.html">Johnny Charles <span><span class="__cf_email__" data-cfemail="cba1a4a3a5a5b28baeb3aaa6bba7aee5a8a4a6">[email&#160;protected]</span></span></a>
                                            </h2>
                                        </td>
                                        <td>+1 843-443-3282</td>
                                        <td>$1,862</td>
                                        <td>1</td>
                                        <td>15 Dec 2023, 04:35 PM</td>
                                        <td><span class="badge bg-success-light">Active</span></td>
                                        <td class="d-flex align-items-center">
                                            <a href="add-invoice.html" class="btn btn-greys me-2"><i class="fa fa-plus-circle me-1"></i> Invoice</a>
                                            <a href="customers-ledger.html" class="btn btn-greys me-2"><i class="fa-regular fa-eye me-1"></i> Ledger</a>
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul>
                                                        <li>
                                                            <a class="dropdown-item" href="edit-customer.html"><i class="far fa-edit me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="customer-details.html"><i class="far fa-eye me-2"></i>View</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="active-customers.html"><i class="fa-solid fa-power-off me-2"></i>Activate</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="deactive-customers.html"><i class="far fa-bell-slash me-2"></i>Deactivate</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-md me-2"><img class="avatar-img rounded-circle" src="{{ asset('backoffice/assets/img/profiles/avatar-16.jpg') }}" alt="User Image"></a>
                                                <a href="profile.html">Robert George <span><span class="__cf_email__"></span></span></span></a>
                                            </h2>
                                        </td>
                                        <td>+1 917-409-0861</td>
                                        <td>$2,789</td>
                                        <td>3</td>
                                        <td>04 Dec 2023, 12:38 PM</td>
                                        <td><span class="badge  bg-danger-light">Deactive</span></td>
                                        <td class="d-flex align-items-center">
                                            <a href="add-invoice.html" class="btn btn-greys me-2"><i class="fa fa-plus-circle me-1"></i> Invoice</a>
                                            <a href="customers-ledger.html" class="btn btn-greys me-2"><i class="fa-regular fa-eye me-1"></i> Ledger</a>
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul>
                                                        <li>
                                                            <a class="dropdown-item" href="edit-customer.html"><i class="far fa-edit me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="customer-details.html"><i class="far fa-eye me-2"></i>View</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="active-customers.html"><i class="fa-solid fa-power-off me-2"></i>Activate</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="deactive-customers.html"><i class="far fa-bell-slash me-2"></i>Deactivate</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-md me-2"><img class="avatar-img rounded-circle" src="{{ asset('backoffice/assets/img/profiles/avatar-17.jpg') }}" alt="User Image"></a>
                                                <a href="profile.html">Sharonda Letha <span><span class="__cf_email__" data-cfemail="4b38232a3924250b2e332a263b272e65282426">[email&#160;protected]</span></span></a>
                                            </h2>
                                        </td>
                                        <td>+1 956-623-2880</td>
                                        <td>$7,923</td>
                                        <td>6</td>
                                        <td>28 Nov 2023, 03:25 PM</td>
                                        <td><span class="badge  bg-success-light">Active</span></td>
                                        <td class="d-flex align-items-center">
                                            <a href="add-invoice.html" class="btn btn-greys me-2"><i class="fa fa-plus-circle me-1"></i> Invoice</a>
                                            <a href="customers-ledger.html" class="btn btn-greys me-2"><i class="fa-regular fa-eye me-1"></i> Ledger</a>
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul>
                                                        <li>
                                                            <a class="dropdown-item" href="edit-customer.html"><i class="far fa-edit me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="customer-details.html"><i class="far fa-eye me-2"></i>View</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="active-customers.html"><i class="fa-solid fa-power-off me-2"></i>Activate</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="deactive-customers.html"><i class="far fa-bell-slash me-2"></i>Deactivate</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-md me-2"><img class="avatar-img rounded-circle" src="{{ asset('backoffice/assets/img/profiles/avatar-18.jpg') }}" alt="User Image"></a>
                                                <a href="profile.html">Pricilla Maureen <span><span class="__cf_email__" data-cfemail="ff8f8d969c9693939ebf9a879e928f939ad19c9092">[email&#160;protected]</span></span></a>
                                            </h2>
                                        </td>
                                        <td>+1 707-439-1732</td>
                                        <td>$2,763</td>
                                        <td>4</td>
                                        <td>20 Nov 2022, 02:47 PM</td>
                                        <td><span class="badge bg-danger-light">Deactive</span></td>
                                        <td class="d-flex align-items-center">
                                            <a href="add-invoice.html" class="btn btn-greys me-2"><i class="fa fa-plus-circle me-1"></i> Invoice</a>
                                            <a href="customers-ledger.html" class="btn btn-greys me-2"><i class="fa-regular fa-eye me-1"></i> Ledger</a>
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul>
                                                        <li>
                                                            <a class="dropdown-item" href="edit-customer.html"><i class="far fa-edit me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="customer-details.html"><i class="far fa-eye me-2"></i>View</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="active-customers.html"><i class="fa-solid fa-power-off me-2"></i>Activate</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="deactive-customers.html"><i class="far fa-bell-slash me-2"></i>Deactivate</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-md me-2"><img class="avatar-img rounded-circle" src="{{ asset('backoffice/assets/img/profiles/avatar-19.jpg') }}" alt="User Image"></a>
                                                <a href="profile.html">Randall Hollis <span><span class="__cf_email__" data-cfemail="394b58575d585555795c41585449555c175a5654">[email&#160;protected]</span></span></a>
                                            </h2>
                                        </td>
                                        <td>+1 559-741-9672</td>
                                        <td>$4,642</td>
                                        <td>1</td>
                                        <td>15 Nov 2022, 10:42 AM</td>
                                        <td><span class="badge  bg-success-light">Active</span></td>
                                        <td class="d-flex align-items-center">
                                            <a href="add-invoice.html" class="btn btn-greys me-2"><i class="fa fa-plus-circle me-1"></i> Invoice</a>
                                            <a href="customers-ledger.html" class="btn btn-greys me-2"><i class="fa-regular fa-eye me-1"></i> Ledger</a>
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul>
                                                        <li>
                                                            <a class="dropdown-item" href="edit-customer.html"><i class="far fa-edit me-2"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete_modal"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="customer-details.html"><i class="far fa-eye me-2"></i>View</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="active-customers.html"><i class="fa-solid fa-power-off me-2"></i>Activate</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="deactive-customers.html"><i class="far fa-bell-slash me-2"></i>Deactivate</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="toggle-sidebar ledge">
    <div class="sidebar-layout-filter">
        <div class="sidebar-header ledge">
            <h5>PayIn</h5>
            <a href="#" class="sidebar-closes"><i class="fa-regular fa-circle-xmark"></i></a>
        </div>
        <div class="sidebar-header submenu">
            <h6>Test Company</h6>
            <p class="text-success-light">Balance: $400</p>
        </div>
        <div class="sidebar-body">
            <form action="#" autocomplete="off">

                <div class="accordion accordion-last" id="accordionMain1">
                    <div class="card-header-new" id="headingOne">
                        <h6 class="filter-title">
                            <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Customers
                                <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                            </a>
                        </h6>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample1">
                        <div class="card-body-chat">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="checkBoxes1">
                                        <div class="form-custom">
                                            <input type="text" class="form-control" id="member_search1" placeholder="Search Customer">
                                            <span><img src="assets/img/icons/search.svg" alt="img"></span>
                                        </div>
                                        <div class="selectBox-cont">
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="username">
                                                <span class="checkmark"></span> John Smith
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="username">
                                                <span class="checkmark"></span> Johnny Charles
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="username">
                                                <span class="checkmark"></span> Robert George
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="username">
                                                <span class="checkmark"></span> Sharonda Letha
                                            </label>

                                            <div class="view-content">
                                                <div class="viewall-One">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Pricilla Maureen
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Randall Hollis
                                                    </label>
                                                </div>
                                                <div class="view-all">
                                                    <a href="javascript:void(0);" class="viewall-button-One"><span class="me-2">View All</span><span><i class="fa fa-circle-chevron-down"></i></span></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion" id="accordionMain2">
                    <div class="col-lg-12 col-sm-12">
                        <div class="input-block mb-3">
                            <label>Enter Amount</label>
                            <input type="text" class="form-control" placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="input-block mb-3">
                            <label>Payment Date</label>
                            <div class="cal-icon cal-icon-info">
                                <input type="text" class="datetimepicker form-control" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="input-block mb-3 notes-form-group-info">
                        <label>Notes</label>
                        <textarea class="form-control" placeholder="Enter your notes"></textarea>
                    </div>
                    <div class="modal-footer">
                        <a href="#" data-bs-dismiss="modal" class="btn btn-back cancel-btn me-2">Cancel</a>
                        <a href="#" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Add Payment</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal custom-modal fade" id="delete_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Customer</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <button type="reset" data-bs-dismiss="modal" class="w-100 btn btn-primary paid-continue-btn">Delete</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" data-bs-dismiss="modal" class="w-100 btn btn-primary paid-cancel-btn">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
