<?php
include '../../koneksi/koneksi.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {

        $nomer_alat = $_POST['nomer_alat'];
        $nama_alat = $_POST['nama_alat'];
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
        $nama_vendor = $_POST['nama_vendor'];
        $tgl_perbaikan = date('Y-m-d', strtotime($_POST['tgl_perbaikan']));

        $dir = "../img/";
        $tmpFile = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmpFile, $dir . $foto);

        $query1 = "INSERT INTO alat VALUES(null, '$nomer_alat', '$nama_alat', '$spek_merk_type', '$spek_serial_number', '$spek_warna', '$spek_ukuran'
        , '$kondisi_alat', '$harga', '$keterangan', '$foto', '$status_alat', '$lokasi')";

        $query2 = "INSERT INTO perbaikan VALUES(null, '$nama_vendor', '$tgl_perbaikan');";

        $sql = mysqli_query($mysqli, $query1);
        $sql = mysqli_query($mysqli, $query2);

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

        // echo "Edit Data Berhasil Dilakukan <a href='../views/index_alat.php'>[Home]</a>";
        // var_dump($_POST);

        $id_alat = $_POST['id_alat'];
        $id_perbaikan = $_POST['id_perbaikan'];
        $nomer_alat = $_POST['nomer_alat'];
        $nama_alat = $_POST['nama_alat'];
        $spek_merk_type = $_POST['spek_merk_type'];
        $spek_serial_number = $_POST['spek_serial_number'];
        $spek_warna = $_POST['spek_warna'];
        $spek_ukuran = $_POST['spek_ukuran'];
        $kondisi_alat = $_POST['kondisi_alat'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];
        $status_alat = $_POST['status_alat'];
        $lokasi = $_POST['lokasi'];
        $nama_vendor = $_POST['nama_vendor'];
        $tgl_perbaikan = date('Y-m-d', strtotime($_POST['tgl_perbaikan']));

        if ($_FILES['foto']['name'] == "") {
            $foto = $result['foto'];
        } else {
            $foto = $_FILES['foto']['name'];
            unlink("../img/" . $result['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], "../img/" . $_FILES['foto']['name']);
        }


        $query1 = "UPDATE alat SET nomer_alat='$nomer_alat', nama_alat='$nama_alat', spek_merk_type='$spek_merk_type',
        spek_serial_number='$spek_serial_number',spek_warna='$spek_warna',spek_ukuran='$spek_ukuran',
        kondisi_alat='$kondisi_alat',harga='$harga',keterangan='$keterangan', foto='$foto', status_alat='$status_alat',
        lokasi='$lokasi' WHERE id_alat='$id_alat';";

        $query2 = "UPDATE perbaikan SET nama_vendor='$nama_vendor', tgl_perbaikan='$tgl_perbaikan'
        WHERE id_perbaikan='$id_perbaikan';";

        $sql = mysqli_query($mysqli, $query1);
        $sql = mysqli_query($mysqli, $query2);
        header("location: ../views/index_alat.php");
    }
}
