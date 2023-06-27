<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
$username = $_SESSION["username"];
include '../../../koneksi/koneksi.php';

$query = "SELECT id_alat, nomer_alat, nama_alat, spek_merk_type, lokasi FROM alat;";
$sql = mysqli_query($mysqli, $query);
$no = 0;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Perbarui Lokasi | Monitoring Kalibrasi</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Monitoring</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Menu Utama</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Menu</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../index_alat.php">Data Alat</a>
                        <a class="collapse-item" href="../index_kalibrasi.php">Data Kalibrasi</a>
                        <a class="collapse-item" href="../index_lap_kalibrasi.php">Laporan Kalibrasi</a>
                        <a class="collapse-item" href="../index_mon_kalibrasi.php">Monitoring Kalibrasi</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                        </li>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg" />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="row">
                            <div class="col mt-3">
                                <p class="mb-2 text-gray-800">
                                    <a href="../update_lokasi/update_lokasi_alat.php">
                                        Kembali
                                    </a>
                                </p>
                                <h1 class="h3 mb-0 text-gray-800">Perbarui Lokasi</h1>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow">
                        <div class="div card-body">
                            <form method="POST" action="../../../dashboard/controller/proses_data_alat.php" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $id_alat; ?>" name="id_alat">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="id_alat">ID Alat</label>
                                            <input type="text" name="id_alat" placeholder="Kode (ID) Alat" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi</label>
                                            <input type="text" name="nama_lokasi" placeholder="Lokasi" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="time">Keterangan Lokasi</label>
                                            <input type="text" name="ket_lokasi" placeholder="Keterangan Lokasi" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" name="aksi" value="edit" class="btn btn-primary btn-block">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                    <div class="col">
                                        <a href="../../views/update_lokasi/index_lokasi_alat.php" type="button" class="btn btn-danger btn-block">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card shadow p-4 mt-5">
                        <div class="div card-body">
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="tabel-data" class="table table-bordered" width="100%" cellspacing="0">
                                        <?php
                                        $query = "SELECT alat.id_alat, alat.nama_alat, lokasi.nama_lokasi, lokasi.tgl_update_lokasi, lokasi.ket_lokasi 
                                                    FROM  alat
                                                    INNER JOIN lokasi ON lokasi.id_alat = alat.id_alat;";
                                        $sql = mysqli_query($mysqli, $query);
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>ID Alat</th>
                                                <th>Nama Alat</th>
                                                <th>Lokasi</th>
                                                <th>Tanggal Update</th>
                                                <th>Keterangan Lokasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            while ($result = mysqli_fetch_assoc($sql)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $result['id_alat']; ?></td>
                                                    <td><?php echo $result['nama_alat']; ?></td>
                                                    <td><?php echo $result['nama_lokasi']; ?></td>
                                                    <td><?php echo $result['tgl_update_lokasi']; ?></td>
                                                    <td><?php echo $result['ket_lokasi']; ?></td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#locationdetail" class="btn btn-success " href="#">
                                                            <i class="fas fa-map fa-sm"></i> Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Monitoring Kalibrasi 2023</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                        Cancel
                    </button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/chart-area-demo.js"></script>
    <script src="../../js/demo/chart-pie-demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel-data').DataTable();
        });
    </script>
</body>

</html>