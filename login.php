<?php

session_start();

require 'admin/include/functions.php';

// Cookie check
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
  $id = $_COOKIE["id"];
  $key = $_COOKIE["key"];

  // Get username based on id
  $query = "SELECT username FROM admin WHERE id = $id";

  $result = mysqli_query($connect, $query);

  $row = mysqli_fetch_assoc($result);

  // Cookie and username check

  if ($key === hash('sha256', $row["username"])) {
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("location: index.php");
  exit;
}

if (isset($_POST["login"])) {

  $uname = $_POST["uname"];
  $pass = $_POST['pass'];
  $query = "SELECT * FROM admin WHERE username = '$uname'";

  $result = mysqli_query($connect, $query);

  // Username check
  if (mysqli_num_rows($result) === 1) {

    // Password check
    $row = mysqli_fetch_assoc($result);
    if (password_verify($pass, $row["password"])) {
      // Session set

      $_SESSION["login"] = true;

      // Remember me check
      if (isset($_POST["remember"])) {
        // Make cookie

        setcookie('id', $row['id'], time() + 60);
        setcookie('key', hash('sha256', $row['username']), time() + 60);
      }

      header("location: index.php");

      exit;
    }
  }

  $error = true;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- CDN icon bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Login</title>
</head>

<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow">
    <div class="container">
      <a class="navbar-brand" href="index.php">HMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pasient.php">Patients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="doctors.php">Doctors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row mt-5 justify-content-center h-100 mb-5">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-dark shadow-sm">
          <div class="card-body p-5 mb-2">
            <div class="container">
              <div class="row text-center mb-3">
                <h2 class="fw-bold text-uppercase">Login</h2>
              </div>
              <hr>
              <p class="text-center">Username & Password is <strong>admin</strong></p>
              <form method="post" action="">
                <div>
                  <?php if (isset($error)) : ?>
                    <div class="alert alert-danger text-center p-2" role="alert">
                      <strong>Wrong username / password</strong>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="uname" autocomplete="off" required>
                </div>
                <div class="mb-2">
                  <label for="pass" class="form-label">Password</label>
                  <input type="password" class="form-control" id="pass" name="pass" required>
                </div>
                <div class="row mb-3">
                  <div class="col text-start">
                    <input type="checkbox" class="form-check-input" id="showPass" onclick="showPassword()">
                    <label class="form-check-label" for="check">Show Password</label>
                  </div>
                  <div class="col text-end">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-sm-6 col-md-6">
                    <div class="text-start">
                      <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="text-end">
                      <!-- <a href="register.php" style="font-size: 14.5px;">Don't have an account yet?</a> -->
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require 'admin/include/footer.php' ?>