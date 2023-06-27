<?php
include '../../koneksi/koneksi.php';

if (isset($_POST['aksi'])) {
    if ($_POST['aksi'] == "add") {

        $id_kalibrasi = $_POST['id_kalibrasi'];
        $tag_number = $_POST['tag_number'];
        $no_sertifikat = $_POST['no_sertifikat'];
        $interval_kalibrasi = $_POST['interval_kalibrasi'];
        $lembaga_kalibrasi = $_POST['lembaga_kalibrasi'];
        $jns_kalibrasi_int = $_POST['jns_kalibrasi_int'];
        $jns_kalibrasi_eks = $_POST['jns_kalibrasi_eks'];
        $range_kapasitas = $_POST['range_kapasitas'];
        $faktor_koreksi = $_POST['faktor_koreksi'];
        $signifikan_ya = $_POST['signifikan_ya'];
        $signifikan_tidak = $_POST['signifikan_tidak'];

        $query = "INSERT INTO lap_kalibrasi VALUES(null, '$id_kalibrasi', '$tag_number', '$no_sertifikat', 
        '$interval_kalibrasi', '$lembaga_kalibrasi', '$jns_kalibrasi_int', '$jns_kalibrasi_eks', 
        '$range_kapasitas', '$faktor_koreksi', '$signifikan_ya', '$signifikan_tidak')";
        $sql = mysqli_query($mysqli, $query);


        if ($sql) {
            header("location: ../views/index_lap_kalibrasi.php");
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

        $id_lap_kalibrasi = $_POST['id_lap_kalibrasi'];
        $id_kalibrasi = $_POST['id_kalibrasi'];
        $tag_number = $_POST['tag_number'];
        $no_sertifikat = $_POST['no_sertifikat'];
        $interval_kalibrasi = $_POST['interval_kalibrasi'];
        $lembaga_kalibrasi = $_POST['lembaga_kalibrasi'];
        $jns_kalibrasi_int = $_POST['jns_kalibrasi_int'];
        $jns_kalibrasi_eks = $_POST['jns_kalibrasi_eks'];
        $range_kapasitas = $_POST['range_kapasitas'];
        $faktor_koreksi = $_POST['faktor_koreksi'];
        $signifikan_ya = $_POST['signifikan_ya'];
        $signifikan_tidak = $_POST['signifikan_tidak'];

        $queryShow = "SELECT * FROM alat WHERE id_lap_kalibrasi = '$id_lap_kalibrasi';";
        $sqlShow = mysqli_query($mysqli, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        $query = "UPDATE lap_kalibrasi SET id_kalibrasi='$id_kalibrasi',tag_number='$tag_number',
        no_sertifikat='$no_sertifikat',interval_kalibrasi='$interval_kalibrasi',lembaga_kalibrasi='$lembaga_kalibrasi',
        jns_kalibrasi_int='$jns_kalibrasi_int',jns_kalibrasi_eks='$jns_kalibrasi_eks',range_kapasitas='$range_kapasitas', 
        faktor_koreksi='$faktor_koreksi', signifikan_ya='$signifikan_ya',
        signifikan_tidak='$signifikan_tidak' WHERE id_lap_kalibrasi='$id_lap_kalibrasi';";

        $sql = mysqli_query($mysqli, $query);
        header("location: ../views/index_lap_kalibrasi.php");
    }
}
