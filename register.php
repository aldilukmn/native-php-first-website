<?php 

    session_start();    
        
    if ( isset($_SESSION["login"]) ) {
        header("location: index.php");
        exit;
    }

    require 'admin/include/functions.php';

    if ( isset($_POST["register"]) ) {

        if ( regis($_POST) > 0 ) {
            
            echo "
              <script>
                alert('Your account has been successfully registered!');
                document.location.href = 'login.php';
              </script>
            ";

        } else {

            echo mysqli_error($connect);

        }

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Register</title>
  </head>
  <body>
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              User Area
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="login.php">Login</a></li>
              <li><a class="dropdown-item active" href="register.php">Register</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <div class="container">
        <div class="row mt-5 justify-content-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-light text-dark shadow">
                    <div class="card-body p-5 mb-2">
                        <div class="">
                            <div class="container">
                                <div class="row text-center mb-3">
                                    <h2 class="fw-bold text-uppercase">Register</h2>
                                </div>
                                <hr>
                                <form method="post" action="">
                                    <!-- Name -->
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <div class="mb-2">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <div class="mb-2">
                                                <label for="uname">Username</label>
                                                <input type="text" name="uname" id="uname" class="form-control" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Password -->
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <div class="mb-4">
                                                <label for="pass" class="form-label">Password</label>
                                                <input type="password" class="form-control" name="pass" id="pass" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <div class="mb-4">
                                                <label for="cpass" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" name="cpass" id="cpass" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">
                                          <button type="submit" name="register" class="btn btn-primary">Register</button>
                                          <div class="text-start">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-end">
                                                <a href="login.php" style="font-size: 14.5px;">Already have an account yet?</a>
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
    </div>

    <script src="admin/assets/js/login.js"></script>
<?php require 'admin/include/footer.php' ?>