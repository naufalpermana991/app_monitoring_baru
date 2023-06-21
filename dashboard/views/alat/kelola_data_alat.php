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

$id_alat = '';
$nomer_alat = '';
$spek_merk_type = '';
$spek_serial_number = '';
$spek_warna = '';
$spek_ukuran = '';
$kondisi_alat = '';
$harga = '';
$keterangan = '';
$status_alat = '';
$lokasi = '';

if (isset($_GET['ubah'])) {
  $id_alat = $_GET['ubah'];

  $query = "SELECT * FROM alat WHERE id_alat = '$id_alat';";
  $sql = mysqli_query($mysqli, $query);

  $result = mysqli_fetch_assoc($sql);

  $nomer_alat = $result['nomer_alat'];
  $spek_merk_type = $result['spek_merk_type'];
  $spek_serial_number = $result['spek_serial_number'];
  $spek_warna = $result['spek_warna'];
  $spek_ukuran = $result['spek_ukuran'];
  $kondisi_alat = $result['kondisi_alat'];
  $harga = $result['harga'];
  $keterangan = $result['keterangan'];
  $status_alat = $result['status_alat'];
  $lokasi = $result['lokasi'];

  // var_dump($result);

  // die();
}
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Kelola Data Alat</title>

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
        <a class="nav-link" href="index.php">
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
            <h1 class="h3 mb-0 text-gray-800">Kelola Data Alat</h1>
          </div>

          <div class="card shadow">
            <div class="div card-body">
              <form action="../../controller/proses_data_alat.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $id_alat; ?>" name="id_alat">
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="title">Nomor Alat</label>
                      <input required type="text" name="nomer_alat" placeholder="Nomor Alat" value="<?php echo $nomer_alat;  ?>" class="form-control" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="status">Spesifikasi</label>
                      <input required type="text" name="spek_merk_type" placeholder="Spek, Merk, dan Type Alat" value="<?php echo $spek_merk_type;  ?>" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="about">Serial Number</label>
                      <input required type="text" name="spek_serial_number" placeholder="Nomor Seri Alat" value="<?php echo $spek_serial_number;  ?>" class="form-control" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="time">Warna</label>
                      <input required type="text" name="spek_warna" placeholder="Warna alat" value="<?php echo $spek_warna;  ?>" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="venue">Ukuran</label>
                      <input required type="text" name="spek_ukuran" placeholder="Ukuran alat" value="<?php echo $spek_ukuran;  ?>" class="form-control" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="price">Kondisi Alat</label>
                      <input required type="text" name="kondisi_alat" placeholder="Kondisi Alat" value="<?php echo $kondisi_alat;  ?>" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="price">Harga</label>
                      <input required type="number" name="harga" placeholder="Harga Alat" value="<?php echo $harga;  ?>" class="form-control" />
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="status">Status Alat</label>
                      <select required class="form-control" name="status_alat" id="status_alat">
                        <option <?php if ($status_alat == 'DIGUNAKAN') {
                                  echo "selected";
                                } ?> value="DIGUNAKAN">DIGUNAKAN</option>
                        <option <?php if ($status_alat == 'DIPINJAM') {
                                  echo "selected";
                                } ?> value="DIPINJAM">DIPINJAM</option>
                        <option <?php if ($status_alat == 'RUSAK') {
                                  echo "selected";
                                } ?> value="RUSAK">RUSAK</option>
                        <option <?php if ($status_alat == 'DIPERBAIKI') {
                                  echo "selected";
                                } ?> value="DIPERBAIKI">DIPERBAIKI</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <textarea required class="form-control" name="keterangan" rows="3"><?php echo $keterangan;  ?></textarea>
                </div>
                <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" name="foto" id="foto" class="form-control form-control-file" accept="image/*">
                </div>
                <div class="row">
                  <div class="col">
                    <div id="perbaikan_section" style="display: none;">
                      <label for="nama_vendor">Nama Vendor:</label>
                      <input required class="form-control" type="text" name="nama_vendor">

                      <label for="durasi">Durasi:</label>
                      <input required class="form-control" type="text" name="durasi">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="location">Lokasi</label>
                  <input required type="text" name="lokasi" placeholder="Lokasi Alat" value="<?php echo $lokasi;  ?>" class="form-control" />
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
                    <a href="../index_alat.php" type="button" class="btn btn-danger btn-block">Batal</a>
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

  <script>
    // Tampilkan/masukkan kolom khusus perbaikan jika status_alat dipilih sebagai DIPERBAIKI
    const statusAlatSelect = document.getElementById('status_alat');
    const perbaikanSection = document.getElementById('perbaikan_section');

    statusAlatSelect.addEventListener('change', function() {
      if (this.value === 'DIPERBAIKI') {
        perbaikanSection.style.display = 'block';
      } else {
        perbaikanSection.style.display = 'none';
      }
    });
  </script>

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