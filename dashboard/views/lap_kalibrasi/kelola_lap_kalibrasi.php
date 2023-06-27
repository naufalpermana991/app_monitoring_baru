<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<?php
include '../../../koneksi/koneksi.php';

$id_lap_kalibrasi = '';
$id_kalibrasi = '';
$tag_number = '';
$no_sertifikat = '';
$interval_kalibrasi = '';
$lembaga_kalibrasi = '';
$jns_kalibrasi_int = '';
$jns_kalibrasi_eks = '';
$range_kapasitas = '';
$faktor_koreksi = '';
$signifikan_ya = '';
$signifikan_tidak = '';

if (isset($_GET['ubah'])) {
    $id_lap_kalibrasi = $_GET['ubah'];

    $query = "SELECT * FROM lap_kalibrasi;";
    $sql = mysqli_query($mysqli, $query);

    $result = mysqli_fetch_assoc($sql);

    $id_kalibrasi = $result['id_kalibrasi'];
    $tag_number = $result['tag_number'];
    $no_sertifikat = $result['no_sertifikat'];
    $interval_kalibrasi = $result['interval_kalibrasi'];
    $lembaga_kalibrasi = $result['lembaga_kalibrasi'];
    $jns_kalibrasi_int = $result['jns_kalibrasi_int'];
    $jns_kalibrasi_eks = $result['jns_kalibrasi_eks'];
    $range_kapasitas = $result['range_kapasitas'];
    $faktor_koreksi = $result['faktor_koreksi'];
    $signifikan_ya = $result['signifikan_ya'];
    $signifikan_tidak = $result['signifikan_tidak'];
}

?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Kelola Data Kalibrasi</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />
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
                        <h1 class="h3 mb-0 text-gray-800">Kelola Laporan Kalibrasi</h1>
                    </div>

                    <div class="card shadow">
                        <div class="div card-body">
                            <form action="../../controller/proses_data_lap_kalibrasi.php" method="POST">
                                <input type="hidden" value="<?Php echo $id_lap_kalibrasi; ?>" name="id_lap_kalibrasi">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="id_alat">ID Kalibrasi</label>
                                            <input value="<?Php echo $id_kalibrasi; ?>" type="text" name="id_kalibrasi" placeholder="Kode Kalibrasi" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tag_number">Tag Number</label>
                                            <input value="<?Php echo $tag_number; ?>" type="text" name="tag_number" placeholder="Tag Number" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="no_sertifikat">No Sertifikat</label>
                                            <input value="<?Php echo $no_sertifikat; ?>" type="text" name="no_sertifikat" placeholder="No Sertifikat" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="interval_kalibrasi">Interval</label>
                                            <input value="<?Php echo $interval_kalibrasi; ?>" type="text" name="interval_kalibrasi" placeholder="Interval" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="lembaga_kalibrasi">Lembaga Kalibrasi</label>
                                            <input value="<?Php echo $lembaga_kalibrasi; ?>" type="text" name="lembaga_kalibrasi" placeholder="Lembaga Kalibrasi" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jns_kalibrasi_int">Kalibrasi Internal</label>
                                            <input value="<?Php echo $jns_kalibrasi_int; ?>" type="text" name="jns_kalibrasi_int" placeholder="Kalibrasi Internal" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jns_kalibrasi_eks">Kalibrasi Eksternal</label>
                                            <input value="<?Php echo $jns_kalibrasi_eks; ?>" type="text" name="jns_kalibrasi_eks" placeholder="Kalibrasi Eksternal" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="range_kapasitas">Range Kapasitas</label>
                                            <input value="<?Php echo $range_kapasitas; ?>" type="text" name="range_kapasitas" placeholder="Range Kapasitas" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="faktor_koreksi">Faktor Koreksi</label>
                                            <input value="<?Php echo $faktor_koreksi; ?>" type="text" name="faktor_koreksi" placeholder="Faktor Koreksi" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="signifikan_ya">Signifikan Ya</label>
                                            <input value="<?Php echo $signifikan_ya; ?>" type="text" name="signifikan_ya" placeholder="Signifikan Ya" class="form-control" />
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="signifikan_tidak">Signifikan Tidak</label>
                                            <input value="<?Php echo $signifikan_tidak; ?>" type="text" name="signifikan_tidak" placeholder="Signifikan Tidak" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <?php
                                        if (isset($_GET['ubah'])) {
                                        ?>
                                            <button type="submit" name="aksi" value="edit" class="btn btn-primary btn-block">
                                                Simpan Perubahan
                                            </button>
                                        <?php
                                        } else {
                                        ?>
                                            <button type="submit" name="aksi" value="add" class="btn btn-primary btn-block">Tambahkan</button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col">
                                        <a href="../index_lap_kalibrasi.php" type="button" class="btn btn-danger btn-block">Batal</a>
                                    </div>
                                </div>
                            </form>
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
</body>

</html>