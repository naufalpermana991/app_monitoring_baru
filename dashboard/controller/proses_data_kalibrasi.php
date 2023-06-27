<?php
include '../../koneksi/koneksi.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {

        $no_kalibrasi = $_POST['no_kalibrasi'];
        $nama_alat = $_POST['nama_alat'];
        $tanggal_kalibrasi = date('Y-m-d', strtotime($_POST['tanggal_kalibrasi']));
        $petugas_penerima = $_POST['petugas_penerima'];
        $thl_berakhirnya_masa_kalibrasi = date('Y-m-d', strtotime($_POST['thl_berakhirnya_masa_kalibrasi']));
        $petugas_menyerahkan = $_POST['petugas_menyerahkan'];
        $keterangan_kalibrasi = $_POST['keterangan_kalibrasi'];

        // $query = "INSERT INTO kalibrasi VALUES(null, '$no_kalibrasi', '$nama_alat', 
        // '$tanggal_kalibrasi', '$petugas_penerima', 
        // '$petugas_menyerahkan', '$thl_berakhirnya_masa_kalibrasi',  '$keterangan_kalibrasi')";
        // $sql = mysqli_query($mysqli, $query);

        var_dump($_POST);
        die();

        if ($sql) {
            header("location: ../views/index_kalibrasi.php");
            //echo "Data Berhasil Ditambahkan  <a href='../views/index_alat.php'>[Home]</a>";
        } else {
            echo $query;
        }

        // echo $nomer_alat, " | ", $spek_merk_type, " | ", $spek_serial_number, " | ",
        // $spek_warna, " | ", $spek_ukuran, " | ", $kondisi_alat, " | ", $harga, " | ", $keterangan, " | ",
        // $foto;
        // echo "<br>Tambah Data";
    } else if ($_POST['aksi'] == "edit") {

        // var_dump($_POST);

        $id_kalibrasi = $_POST['id_kalibrasi'];
        $no_kalibrasi = $_POST['no_kalibrasi'];
        $nama_alat = $_POST['nama_alat'];
        $tanggal_kalibrasi = date('Y-m-d', strtotime($_POST['tanggal_kalibrasi']));
        $petugas_penerima = $_POST['petugas_penerima'];
        $thl_berakhirnya_masa_kalibrasi = date('Y-m-d', strtotime($_POST['thl_berakhirnya_masa_kalibrasi']));
        $petugas_menyerahkan = $_POST['petugas_menyerahkan'];
        $keterangan_kalibrasi = $_POST['keterangan_kalibrasi'];

        // $queryShow = "SELECT kalibrasi.id_kalibrasi, kalibrasi.no_kalibrasi, kalibrasi.id_alat, kalibrasi.tanggal_kalibrasi, kalibrasi.petugas_penerima, kalibrasi.petugas_menyerahkan, kalibrasi.thl_berakhirnya_masa_kalibrasi, 
        // kalibrasi.keterangan_kalibrasi FROM kalibrasi INNER JOIN alat ON alat.id_alat = kalibrasi.id_alat
        // WHERE kalibrasi.id_kalibrasi ='$id_kalibrasi';";

        // $sqlShow = mysqli_query($mysqli, $queryShow);
        // $result = mysqli_fetch_assoc($sqlShow);

        $query = "UPDATE kalibrasi SET no_kalibrasi='$no_kalibrasi', nama_alat=$nama_alat,
        tanggal_kalibrasi='$tanggal_kalibrasi',petugas_penerima='$petugas_penerima',petugas_menyerahkan='$petugas_menyerahkan', thl_berakhirnya_masa_kalibrasi='$thl_berakhirnya_masa_kalibrasi',
        petugas_menyerahkan='$petugas_menyerahkan',keterangan_kalibrasi='$keterangan_kalibrasi'
        WHERE id_kalibrasi='$id_kalibrasi';";


        $sql = mysqli_query($mysqli, $query);
        header("location: ../views/index_kalibrasi.php");
    }
}
