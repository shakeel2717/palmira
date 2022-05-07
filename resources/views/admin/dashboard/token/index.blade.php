@extends('admin.layout.app')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">All Employees List</h1>
            </div>
            <!-- End Col -->

            <div class="col-auto">
                <a class="btn btn-primary" href="{{ route('admin.employee.create') }}">
                    <i class="bi-person-plus-fill me-1"></i> Add Employee
                </a>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <div class="row justify-content-sm-center text-center py-10">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center flex-grow-1">
                        <div class="col-md">
                            <h4 class="card-header-title text-start">All Employees</h4>
                        </div>

                        <div class="col-auto">
                            <!-- Dropdown -->
                            <div class="dropdown me-2">
                                <button type="button" class="btn btn-white btn-sm dropdown-toggle" id="usersExportDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi-download me-2"></i> Export
                                </button>

                                <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                                    <span class="dropdown-header">Options</span>
                                    <a id="export-copy" class="dropdown-item" href="javascript:;">
                                        <img class="avatar avatar-xss avatar-4x3 me-2"
                                            src="/assets/svg/illustrations/copy-icon.svg" alt="Image Description">
                                        Copy
                                    </a>
                                    <a id="export-print" class="dropdown-item" href="javascript:;">
                                        <img class="avatar avatar-xss avatar-4x3 me-2"
                                            src="/assets/svg/illustrations/print-icon.svg" alt="Image Description">
                                        Print
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <span class="dropdown-header">Download options</span>
                                    <a id="export-excel" class="dropdown-item" href="javascript:;">
                                        <img class="avatar avatar-xss avatar-4x3 me-2"
                                            src="/assets/svg/brands/excel-icon.svg" alt="Image Description">
                                        Excel
                                    </a>
                                    <a id="export-csv" class="dropdown-item" href="javascript:;">
                                        <img class="avatar avatar-xss avatar-4x3 me-2"
                                            src="/assets/svg/components/placeholder-csv-format.svg" alt="Image Description">
                                        .CSV
                                    </a>
                                    <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                        <img class="avatar avatar-xss avatar-4x3 me-2" src="/assets/svg/brands/pdf-icon.svg"
                                            alt="Image Description">
                                        PDF
                                    </a>
                                </div>
                            </div>
                            <!-- End Dropdown -->
                        </div>
                        <div class="col-auto">
                            <!-- Filter -->
                            <form>
                                <!-- Search -->
                                <div class="input-group input-group-merge input-group-flush">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="bi-search"></i>
                                    </div>
                                    <input id="datatableWithSearchInput" type="search" class="form-control"
                                        placeholder="Search users" aria-label="Search users">
                                </div>
                                <!-- End Search -->
                            </form>
                            <!-- End Filter -->
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive datatable-custom">
                    <table id="exportDatatable"
                        class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                        data-hs-datatables-options='{
                                        "dom": "Bfrtip",
                                        "buttons": [
                                        {
                                            "extend": "copy",
                                            "className": "d-none"
                                        },
                                        {
                                            "extend": "excel",
                                            "className": "d-none"
                                        },
                                        {
                                            "extend": "csv",
                                            "className": "d-none"
                                        },
                                        {
                                            "extend": "pdf",
                                            "className": "d-none"
                                        },
                                        {
                                            "extend": "print",
                                            "className": "d-none"
                                        }
                                        ],
                                        "order": [],
                "search": "#datatableWithSearchInput",
                "isResponsive": false,
                "isShowPaging": false,
                "pagination": "datatableWithSearchPagination"

                                    }'>
                        <thead class="thead-light">
                            <tr>
                                <th>Token</th>
                                <th>Department</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tokens as $token)
                                <tr>
                                    <td>
                                        <div class="ms-3">
                                            <span class="d-block h5 text-inherit mb-0 text-uppercase"><a
                                                    href="{{ route('admin.token.edit', ['token' => $token->id]) }}">{{ $token->token }}</a>
                                            </span>
                                        </div>
                                    </td>
                                    <td>{{ $token->department->name }}</td>
                                    <td class="text-uppercase">{{ $token->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->

                <!-- Footer -->
                <div class="card-footer">
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center justify-content-sm-end">
                        <nav id="datatableWithSearchPagination" aria-label="Activity pagination"></nav>
                    </div>
                    <!-- End Pagination -->
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </div>
@endsection
