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
    <title>Home</title>
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
  <div id="carouselExampleAutoplaying" class="carousel slide mb-5 align-items-center" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="admin/assets/img/doctor1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="admin/assets/img/doctor2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="admin/assets/img/doctor3.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="admin/assets/img/doctor4.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <h1 class="text-center fw-bold">Stay Healty</h1>
  <div class="row row-cols-1 row-cols-md-3 g-4 m-4">
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="card h-100">
        <img src="admin/assets/img/doctor1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Title 1</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, deserunt ipsa, odio ipsam a exercitationem magnam quidem quia explicabo ullam quasi animi accusantium. Soluta doloremque, neque consectetur fuga in voluptas et nisi saepe quam.</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="card h-100">
        <img src="admin/assets/img/doctor2.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Title 2</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, aut recusandae, itaque libero numquam dolor optio rerum suscipit autem sit corporis repellat voluptas quod fugiat!</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="card h-100">
        <img src="admin/assets/img/doctor3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Title 3</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto voluptatibus neque ipsam qui quisquam omnis enim placeat at quos minima obcaecati quibusdam officiis aliquam, quasi minus deserunt totam laboriosam assumenda?</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="card h-100">
        <img src="admin/assets/img/doctor4.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Title 4</h5>
          <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate numquam amet libero distinctio magni dolores quae temporibus odio corrupti ex possimus error, commodi consectetur, aperiam, labore omnis!</p>
        </div>
      </div>
    </div>
  </div>
<?php require "admin/include/footer.php" ?>