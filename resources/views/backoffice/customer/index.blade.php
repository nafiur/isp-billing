@extends('backoffice.template')
@section('content')
@section('title')
{{ 'Customers' }}
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
                            <a class="btn btn-primary" href="{{ route('customer.create') }}"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Customer</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-table">
                    <div class="card-body h-300">
                        <div class="table-responsive">
                            <table class="table table-center table-hover datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Router</th>
                                        <th>Package</th>
                                        <th>Price</th>
                                        <th>Created</th>
                                        <th>Status</th>
                                        <th class="no-sort">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer as $key => $list)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <h2 class="table-avatar"><a href="profile.html">{{ $list->name ??'' }} <span><span class="__cf_email__"></span></span></span></a>
                                            </h2>
                                        </td>
                                        <td>{{ $list->package->name ??'' }}</td>
                                        <td>{{ $list->price ??'' }}</td>
                                        <td>{{ $list->created_at ? $list->created_at->format('d-m-Y') : '' }}</td>
                                        <td><span class="badge bg-success-light">Active</span></td>
                                        <td class="d-flex align-items-center">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul>
                                                        <li>
                                                            {{-- <a class="dropdown-item" href="{{ route('router.edit', $pack->id) }}"><i class="far fa-edit me-2"></i>Edit</a> --}}
                                                            <a class="dropdown-item" href="{{ route('customer.edit', $list->id) }}">
                                                                <i class="far fa-edit me-2"></i>Edit
                                                            </a>

                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="customer-details.html"><i class="far fa-eye me-2"></i>View</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('customer.destroy', $list->id) }}"><i class="fa-solid fa-power-off me-2"></i>Activate</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
