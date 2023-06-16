<?php 
 
include 'koneksi.php';
 
 
session_start();
 
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data pada tabel admin dengan username dan password yang sesuai
$data = mysqli_query($connect, "SELECT * FROM admin WHERE username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:main.php");
}
else{
    // header("location:login.php");
    echo "gagal";
}













// if (isset($_SESSION['username'])) {
//     header("Location: index_admin.php");
// }
 
// if (isset($_POST['submit'])) {
//     $email = $_POST['username'];
//     $password = $_POST['password'];
 
//     $sql = "SELECT * FROM login_pertama WHERE username='$username' AND password='$password'";
//     $result = mysqli_query($conn, $sql);
//     if ($result->num_rows > 0) {
//         $row = mysqli_fetch_assoc($result);
//         $_SESSION['username'] = $row['username'];
//         header("Location: index_admin.php");
//     } else {
//         echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
//     }
// }
 
?>