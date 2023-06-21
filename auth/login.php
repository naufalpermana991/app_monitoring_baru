<?php
session_start();

// Verifikasi data yang dikirim dari form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  include '../koneksi/koneksi.php';
  // Lakukan verifikasi login dengan query ke database
  $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
    // Login berhasil
    $_SESSION["username"] = $username;
    header("Location: ../dashboard/views/index.php");
    exit;
  } else {
    // Login gagal
    echo "Login failed. Invalid username or password.";
  }

  $mysqli->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | Monitoring Kalibrasi</title>

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

        <form action="login.php" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda" />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Kata Sandi Anda" />
          </div>
          <div class="d-grid mt-5">
            <input type="submit" class="btn btn-primary" value="Masuk" />
          </div>

          <div class="text-center mt-3">
            <p>
              Belum memiliki akun?
              <span><a href="register.php">Daftar</a></span>
            </p>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!--end-card-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>