<?php
// Verifikasi data yang dikirim dari form register
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  include '../koneksi/koneksi.php';

  // Periksa apakah username sudah digunakan
  $checkUsername = "SELECT * FROM admin WHERE username='$username'";
  $result = $mysqli->query($checkUsername);

  if ($result->num_rows > 0) {
    // Username sudah digunakan
    echo 'Registrasi Gagal. Username sudah digunakan';
  } else {
    // Simpan data registrasi ke database
    $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";

    if ($mysqli->query($sql) === TRUE) {
      header("Location: login.php");
    } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
  }

  $mysqli->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register | Monitoring Kalibrasi</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="../dashboard/assets/styles/style.css" />
</head>

<body>
  <!--card-->
  <section class="container">
    <div class="card mx-auto">
      <div class="card-body">
        <img src="../dashboard/assets/img/logos/Sucofindo_Utama (1).png" class="rounded mx-auto d-block mb-5" />

        <form action="register.php" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username Baru Anda" />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Kata Sandi Baru Anda" />
            <div class="form-text">Panjang min. 8 karakter</div>
          </div>

          <div class="d-grid mt-4">
            <input type="submit" class="btn btn-primary" value="Daftar" />
          </div>

          <div class="text-center mt-3">
            <p>
              Sudah memiliki akun?
              <span><a href="login.php">Masuk</a></span>
            </p>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!--end-card-->
</body>

</html>