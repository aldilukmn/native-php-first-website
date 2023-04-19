<?php 

  session_start();

  if ( !isset($_SESSION["login"]) ) {
      header("Location: login.php");
      exit;
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
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <title>Laboratory</title>
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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pasient.php">Patients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="doctors.php">Doctors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="jumbotron jumbotron-fluid mb-5 jumbotron-lab">
    <div class="container text-white">
      <h1 class="display-4">Laboratory</h1>
      <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores ratione veritatis nostrum id numquam nobis explicabo aspernatur nisi soluta! Expedita!</p>
    </div>
  </div>
  <div class="container-fluid py-5">
    <div class="container">
      <div class="row align-items-center item-center mb-5">
        <div class="col-lg-5 col-md-7 order-md-1 offset-lg-1">
          <img src="admin/assets/img/doctor7.jpg" alt="" class="img-fluid" style="border-radius: 10px; width: 100%">
        </div>
        <div class="col col-lg-4 col-md-5 offset-lg-1">
          <h4 class="mt-3"><strong>A MRI</strong></h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam dignissimos, aut quos atque mollitia laboriosam cumque nobis nemo temporibus ipsum officiis aspernatur eveniet esse omnis, accusamus architecto. Deserunt iure ea recusandae nihil placeat dolorum saepe aliquam architecto, cumque voluptate non totam, quo necessitatibus aspernatur pariatur. Sunt a neque pariatur natus.</p>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-7 offset-lg-1">
          <img src="admin/assets/img/doctor8.jpg" alt="" class="img-fluid" style="border-radius: 10px; width: 100%">
        </div>
        <div class="col col-lg-5 col-md-5 offset-lg-1">
          <h4 class="mt-3"><strong>A Microtome</strong></h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quae quidem obcaecati dolorem nesciunt perferendis corporis minus delectus inventore sequi placeat error, expedita accusantium minima adipisci fuga consequuntur ut modi illum? Fugit provident, soluta culpa velit, accusamus quod incidunt accusantium mollitia adipisci ipsa consequatur fugiat sequi modi, obcaecati quas. Nisi!</p>
        </div>
      </div>
    </div>
    </div>
  </div>
<?php require "admin/include/footer.php" ?>