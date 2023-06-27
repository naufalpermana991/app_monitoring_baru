<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION["username"])) {
  header("Location: index.php");
  exit;
}

$username = $_SESSION["username"];
include '../../../koneksi/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dokumen Laporan Kalibrasi</title>

  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
</head>

<body>

  <div class="container-fluid">
    <h1 class="text-center mt-5">Laporan Kalibrasi</h1>
    <div class="mt-3">
      <h4 class="text-center">Data Alat</h4>
    </div>
    <div class="row">
      <div class="col">
        <div class="card-body">
          <div class="table">
            <table class="table table-bordered" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nomer Alat</th>
                  <th>Nama Alat</th>
                  <th>Spesifikasi</th>
                  <th>Serial Number</th>
                  <th>Warna</th>
                  <th>Ukuran</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM alat;";
                $sql = mysqli_query($mysqli, $query);
                $no = 0;
                $result = mysqli_fetch_assoc($sql)
                ?>
                <tr>
                  <td><?php echo ++$no; ?></td>
                  <td><?php echo $result['nomer_alat']; ?></td>
                  <td><?php echo $result['nama_alat']; ?></td>
                  <td><?php echo $result['spek_merk_type']; ?></td>
                  <td><?php echo $result['spek_serial_number']; ?></td>
                  <td><?php echo $result['spek_warna']; ?></td>
                  <td><?php echo $result['spek_ukuran']; ?></td>
              </tbody>
              <thead>
                <tr>
                  <th>Kondisi Alat</th>
                  <th>Harga</th>
                  <th>Keterangan</th>
                  <th>Foto</th>
                  <th>Status Alat</th>
                  <th>Lokasi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_fetch_assoc($sql)
                ?>
                <tr>
                  <td><?php echo $result['kondisi_alat']; ?></td>
                  <td><?php echo $result['harga']; ?></td>
                  <td><?php echo $result['keterangan']; ?></td>
                  <td><?php echo $result['foto']; ?></td>
                  <td><?php echo $result['status_alat']; ?></td>
                  <td><?php echo $result['lokasi']; ?></td>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class=" mt-5">
    </div>

    <div class="row">
      <div class="col">
        <div class="mt-3">
          <h4 class="text-center">Data Kalibrasi</h4>
        </div>
        <div class="card-body">
          <div class="table">
            <?php
            $query = "SELECT kalibrasi.id_kalibrasi, kalibrasi.no_kalibrasi, alat.nama_alat, kalibrasi.tanggal_kalibrasi, kalibrasi.petugas_penerima, kalibrasi.petugas_menyerahkan, kalibrasi.thl_berakhirnya_masa_kalibrasi, kalibrasi.keterangan_kalibrasi
            FROM kalibrasi INNER JOIN alat ON alat.id_alat = kalibrasi.id_alat;";
            $sql = mysqli_query($mysqli, $query);
            $no = 0;
            ?>
            <table class="table table-bordered  " width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID Kalibrasi</th>
                  <th>No Kalibrasi</th>
                  <th>Nama Alat</th>
                  <th>Tanggal Kalibrasi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_fetch_assoc($sql)
                ?>
                <tr>
                  <td><?php echo ++$no; ?></td>
                  <td><?php echo $result['no_kalibrasi']; ?></td>
                  <td><?php echo $result['nama_alat']; ?></td>
                  <td><?php echo $result['tanggal_kalibrasi']; ?></td>
              </tbody>
              <thead>
                <tr>
                  <th>Petugas Penerima</th>
                  <th>Petugas Menyerahkan</th>
                  <th>Tanggal Expired</th>
                  <th>Keterangan Kalibrasi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_fetch_assoc($sql)
                ?>
                <tr>
                  <td><?php echo $result['petugas_penerima']; ?></td>
                  <td><?php echo $result['petugas_menyerahkan']; ?></td>
                  <td><?php echo $result['thl_berakhirnya_masa_kalibrasi']; ?></td>
                  <td><?php echo $result['keterangan_kalibrasi']; ?></td>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="mt-3">
          <h4 class="text-center">Data Laporan Kalibrasi</h4>
        </div>
        <div class="card-body">
          <div class="table table-bordered ">
            <?php
            $query = "SELECT * FROM lap_kalibrasi;";
            $sql = mysqli_query($mysqli, $query);
            $no = 0;
            ?>
            <table class="table " width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID Laporan</th>
                  <th>ID Kalibrasi</th>
                  <th>Tag Number</th>
                  <th>No Sertifikat</th>
                  <th>Interval</th>
                  <th>Lembaga Kalibrasi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_fetch_assoc($sql)
                ?>
                <tr>
                  <td><?php echo ++$no; ?></td>
                  <td><?php echo $result['id_kalibrasi']; ?></td>
                  <td><?php echo $result['tag_number']; ?></td>
                  <td><?php echo $result['no_sertifikat']; ?></td>
                  <td><?php echo $result['interval_kalibrasi']; ?></td>
                  <td><?php echo $result['lembaga_kalibrasi']; ?></td>
              </tbody>
              <thead>
                <tr>
                  <th>Kalibrasi Internal</th>
                  <th>Kalibrasi Eksternal</th>
                  <th>Range Kapasitas</th>
                  <th>Faktor Koreksi</th>
                  <th>Signifikan Ya</th>
                  <th>Signifikan Tidak</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_fetch_assoc($sql)
                ?>
                <tr>
                  <td><?php echo $result['jns_kalibrasi_int']; ?></td>
                  <td><?php echo $result['jns_kalibrasi_eks']; ?></td>
                  <td><?php echo $result['range_kapasitas']; ?></td>
                  <td><?php echo $result['faktor_koreksi']; ?></td>
                  <td><?php echo $result['signifikan_ya']; ?></td>
                  <td><?php echo $result['signifikan_tidak']; ?></td>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>