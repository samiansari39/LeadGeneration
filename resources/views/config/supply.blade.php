@extends('layouts.app')
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- This page css -->
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            @include('layouts.TopNav')
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                @include('layouts.SideBar')
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        {{-- <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">All Hospitals</h4> --}}
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"
                                            class="text-muted">Apps</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">All Supply
                                        </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Success Message -->
                    <div id="successMessage" class="alert alert-success" style="display: none;"></div>

                    <div class="row">
                        <div class="col-6">
                            <h5><b>All Equipemnts (0)</b></h5>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <button type="button" class="btn waves-effect waves-light btn-outline-primary"
                                data-bs-toggle="modal" data-bs-target="#signup-modal">
                                <i data-feather="plus" class="feather-icon me-2"></i>Add Supply
                            </button>
                        </div>
                    </div>

                    <!-- Signup modal content -->
                    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="text-center mt-2 mb-4">
                                        <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                            <h4 class="mb-0"><b>Add Supply</b></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('add-supplies') }}" class="mt-4">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <select name="sp_type" id="" class="form-select">
                                                        <option value="">Select Supply group</option>
                                                        @foreach ($spg as $item)
                                                        <option value="{{ $item->spg_id }}">{{ $item->spg_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="sp_manufacturer" class="form-control" id="" placeholder="Manufecturer">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="sp_name" class="form-control" id="" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="sp_lotno" class="form-control" id="" placeholder="lot number">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="date" name="sp_expdate" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="">

                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="sp_billingcode" class="form-control" id="" placeholder="Billing code">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <textarea name="sp_notes" id="" rows="3" placeholder="Add notes" class="form-control">
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group form-check mb-3">
                                                    <label for="group" class="form-check-label">Group OR 1</label>
                                                    <input type="hidden" name="sp_group" value="0">
                                                    <input type="checkbox" name="sp_group" id="group"
                                                        value="1" class="form-check-input"
                                                        {{ old('group') ? 'checked' : '' }}
                                                        style="border: 1px solid black;">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group form-check mb-3">
                                                    <label for="active" class="form-check-label">Active</label>
                                                    <input type="hidden" name="eq_active" value="0">
                                                    <input type="checkbox" name="eq_active" id="active"
                                                        value="1" class="form-check-input"
                                                        {{ old('active') ? 'checked' : '' }}
                                                        style="border: 1px solid black;">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn w-100 btn-dark">Add
                                                    Supply</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                </div>
                                <div class="table-responsive">
                                    <table id="users-table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Type</th>
                                                <th>Manufacturer</th>
                                                <th>Name</th>
                                                <th>Lot Number</th>
                                                <th>Expiration date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0; @endphp
                                            @foreach ($sp as $index => $item)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $item->SupplyGroup->spg_name }}</td>
                                                    <td>{{ $item->sp_manufacturer }}</td>
                                                    <td>{{ $item->sp_name }}</td>
                                                    <td>{{ $item->sp_lotno }}</td>
                                                    <td>{{ $item->sp_expdate }}</td>
                                                    <td>
                                                        @if ($item->sp_active == '1')
                                                            Active
                                                        @else
                                                            In Active
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a onclick="editEqg({{ json_encode($item) }})"
                                                            href="javascript:void(0);">
                                                            <i data-feather="edit"
                                                                class="feather-icon text-black me-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" onclick="confirmDelete('{{ route('delete-supplies', $item->sp_id) }}')"
                                                            class="edit-icon delete-user-btn">
                                                            <i data-feather="delete" class="feather-icon me-2 text-black"></i>
                                                         </a>


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
                {{-- /* --------------------------- edit hospital modal -------------------------- */ --}}
                <div id="editHospital" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content ">
                            <div class="modal-body ">
                                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                                    <h4 class="mb-0"><b>Edit Supply Group</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form method="POST" action="{{ route('update-supplies') }}" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="sp_id" id="sp_id">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <select name="sp_type" id="edit_type" class="form-select">
                                                    <option value="">Select Supply group</option>
                                                    @foreach ($spg as $item)
                                                    <option value="{{ $item->spg_id }}">{{ $item->spg_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="sp_manufacturer" class="form-control" id="edit_manufacturer" placeholder="Manufecturer">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="sp_name" class="form-control" id="edit_name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="sp_lotno" class="form-control" id="edit_lotno" placeholder="lot number">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="date" name="sp_expdate" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" placeholder="" id="sp_expdate">

                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="text" name="sp_billingcode" class="form-control" id="edit_billing" placeholder="Billing code" >
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <textarea name="sp_notes" id="edit_notes" rows="3" placeholder="Add notes" class="form-control">
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group form-check mb-3">
                                                <label for="edit-group" class="form-check-label">Group OR 1</label>
                                                <input type="hidden" name="sp_group" value="0">
                                                <input type="checkbox" name="sp_group" id="edit-group"
                                                    value="1" class="form-check-input"
                                                    {{ old('group') ? 'checked' : '' }}
                                                    style="border: 1px solid black;">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group form-check mb-3">
                                                <label for="edit-active" class="form-check-label">Active</label>
                                                <input type="hidden" name="eq_active" value="0">
                                                <input type="checkbox" name="eq_active" id="edit-active"
                                                    value="1" class="form-check-input"
                                                    {{ old('active') ? 'checked' : '' }}
                                                    style="border: 1px solid black;">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn w-100 btn-dark">Edit
                                                Supply</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                @include('layouts.Footer')
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include jQuery and DataTables CDN -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#users-table').DataTable({
                "paging": true, // Enable pagination
                "lengthChange": true, // Allow user to change the number of records per page
                "searching": true, // Enable search functionality
                "ordering": true, // Enable column sorting
                "info": true, // Display info like "Showing 1 to 10 of 50 entries"
                "autoWidth": false // Disable automatic column width adjustment
            });
        });
    </script>
    <script>
        function editEqg(sp) {
            document.getElementById("sp_id").value = sp.sp_id;
            document.getElementById("edit_type").value = sp.sp_type;
            document.getElementById("edit_manufacturer").value = sp.sp_manufacturer;
            document.getElementById("edit_name").value = sp.sp_name;
            document.getElementById("edit_lotno").value = sp.sp_lotno;
            document.getElementById("edit_billing").value = sp.sp_billingcode;
            document.getElementById("edit_notes").value = sp.sp_notes;
            document.getElementById("edit-active").checked = sp.sp_active == 1;
            document.getElementById("edit-group").checked = sp.sp_groups == 1;

            var editModal = new bootstrap.Modal(document.getElementById("editHospital"));
            editModal.show();
        }
    </script>
    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url; // Redirect to delete route
                }
            });
        }
        </script>
</body>

</html>
