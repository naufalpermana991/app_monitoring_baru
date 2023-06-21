<?php
include '../../koneksi/koneksi.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {

        $nomer_alat = $_POST['nomer_alat'];
        $spek_merk_type = $_POST['spek_merk_type'];
        $spek_serial_number = $_POST['spek_serial_number'];
        $spek_warna = $_POST['spek_warna'];
        $spek_ukuran = $_POST['spek_ukuran'];
        $kondisi_alat = $_POST['kondisi_alat'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];
        $foto = $_FILES['foto']['name'];
        $status_alat = $_POST['status_alat'];
        $lokasi = $_POST['lokasi'];

        $dir = "../img/";
        $tmpFile = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmpFile, $dir . $foto);

        $query = "INSERT INTO alat VALUES(null, '$nomer_alat', '$spek_merk_type', '$spek_serial_number', '$spek_warna', '$spek_ukuran'
        , '$kondisi_alat', '$harga', '$keterangan', '$foto', '$status_alat', '$lokasi')";
        $sql = mysqli_query($mysqli, $query);

        if ($sql) {
            header("location: ../views/index_alat.php");
            //echo "Data Berhasil Ditambahkan  <a href='../views/index_alat.php'>[Home]</a>";
        } else {
            echo $query;
        }

        // echo $nomer_alat, " | ", $spek_merk_type, " | ", $spek_serial_number, " | ",
        // $spek_warna, " | ", $spek_ukuran, " | ", $kondisi_alat, " | ", $harga, " | ", $keterangan, " | ",
        // $foto;
        // echo "<br>Tambah Data";
    } else if ($_POST['aksi'] == "edit") {

        echo "Edit Data Berhasil Dilakukan <a href='../views/index_alat.php'>[Home]</a>";
        var_dump($_POST);

        $id_alat = $_POST['id_alat'];
        $nomer_alat = $_POST['nomer_alat'];
        $spek_merk_type = $_POST['spek_merk_type'];
        $spek_serial_number = $_POST['spek_serial_number'];
        $spek_warna = $_POST['spek_warna'];
        $spek_ukuran = $_POST['spek_ukuran'];
        $kondisi_alat = $_POST['kondisi_alat'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];
        $status_alat = $_POST['status_alat'];
        $lokasi = $_POST['lokasi'];

        $query = "UPDATE alat SET nomer_alat='$nomer_alat',spek_merk_type='$spek_merk_type',
        spek_serial_number='$spek_serial_number',spek_warna='$spek_warna',spek_ukuran='$spek_ukuran',
        kondisi_alat='$kondisi_alat',harga='$harga',keterangan='$keterangan',status_alat='$status_alat',
        lokasi='$lokasi' WHERE id_alat='$id_alat';";

        $sql = mysqli_query($mysqli, $query);
    }
}
