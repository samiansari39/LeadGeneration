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
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">All Hospitals</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-muted">Apps</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">All Hospitals</li>
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
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Success Message -->
                    <div id="successMessage" class="alert alert-success" style="display: none;"></div>

                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <button type="button" class="btn waves-effect waves-light btn-outline-primary" data-bs-toggle="modal" data-bs-target="#signup-modal">
                                <i data-feather="home" class="feather-icon me-2"></i>Add Hospital
                            </button>
                        </div>
                    </div>

                    <!-- Signup modal content -->
                    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="text-center mt-2 mb-4">
                                        <a href="index.html" class="text-success">
                                            <span><img class="me-2" src="../assets/images/logo-icon.png"
                                                    alt="" height="18"><img
                                                    src="../assets/images/logo-text.png" alt=""
                                                    height="18"></span>
                                        </a>
                                    </div>

                                    <form method="POST" action="{{ route('add-hospital') }}" class="mt-4">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="hos_name" id="hosname" value="{{ old('hos_name') }}" class="form-control" placeholder="Name" required>
                                                    @error('hos_name')
                                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="zip_code" id="zipcode" value="{{ old('zip_code') }}" class="form-control" placeholder="Zip code">
                                                    @error('zip_code')
                                                    <small class="text-danger d-block text-start">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="region" id="region" value="{{ old('region') }}" class="form-control" placeholder="region">

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <input type="text" name="national_pro_id" id="nationalPro" value="{{ old('national_pro_id') }}" class="form-control" placeholder="National Provider Identifier">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group form-check mb-3">
                                                    <label for="active" class="form-check-label">Active</label>
                                                    <input type="hidden" name="active" value="0">
                                                    <input type="checkbox" name="active" id="active" value="1"
                                                        class="form-check-input"
                                                        {{ old('active') ? 'checked' : '' }}
                                                        style="border: 1px solid black;">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn w-100 btn-dark">Add Hospital</button>
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
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-primary text-center">
                                                <h1 class="font-light text-white">0</h1>
                                                <h6 class="text-white">Total Hospitals</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="users-table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Zip Code</th>
                                                <th>Region</th>
                                                <th>National Provider Identifier</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0; @endphp
                                            @foreach($hospital as $index => $hos)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $hos->hos_name }}</td>
                                                <td>{{ $hos->zip_code }}</td>
                                                <td>{{ $hos->region }}</td>
                                                <td>{{ $hos->phone_number }}</td>
                                                <td>{{ $hos->created_at }}</td>
                                                <td>
                                                    @if($index != 0)
                                                    <form method="POST" action="{{ route('users.destroy', $hos->hos_id) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn waves-effect waves-light btn-outline-danger">Delete</button>
                                                    </form>
                                                    @endif
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

</body>

</html>
