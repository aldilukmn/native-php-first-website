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
    <title>Service</title>
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
  <div class="jumbotron jumbotron-fluid jumbotron-serv">
    <div class="container text-white">
      <h1 class="display-4">Service</h1>
      <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque accusamus molestiae pariatur quidem. Impedit iusto sit provident, cupiditate temporibus ut? Blanditiis ipsam quis beatae non iste! Consequuntur, exercitationem. A, ab.</p>
    </div>
  </div>
  <div class="container py-5">
    <div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Service Item #1
        </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, sit.</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste ut corrupti facilis inventore autem possimus aliquid ipsam odio nam voluptatibus, voluptatum animi molestias laboriosam in quibusdam saepe dignissimos nostrum! Corrupti recusandae necessitatibus omnis, autem ad corporis culpa accusantium praesentium cumque animi nesciunt, obcaecati adipisci quisquam temporibus? Ut suscipit iusto iste!
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Service Item #2
        </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong>Lorem ipsum dolor sit amet consectetur adipisicing.</strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam animi vitae incidunt tempora fuga doloremque, iusto velit nemo officia consectetur minus et eos molestias facere! Ab laudantium architecto quidem ex eaque hic nihil nulla vitae excepturi quos! Ducimus beatae ratione iusto suscipit ipsa earum perspiciatis possimus blanditiis eius maxime, qui adipisci necessitatibus vitae veritatis, dicta architecto amet dignissimos alias. Eius omnis mollitia quidem sed laboriosam consequatur, ad quisquam architecto ipsa.
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Service Item #3
        </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <strong>Lorem ipsum dolor sit amet.</strong> Lorem ipsum, dolor sit amet consectetur adipisicing elit. In quos, repellendus ipsam id aliquam nemo voluptatibus. In numquam recusandae itaque quia aspernatur magnam cum? Fugiat atque nisi qui, modi doloremque deleniti nam facere a, distinctio, architecto adipisci iste dolores corrupti alias officiis impedit in perferendis. Quas enim facilis incidunt qui cum sequi sunt officia quo veritatis, quis provident error maxime recusandae voluptatum iste animi repellendus?
        </div>
        </div>
    </div>
    </div>
  </div>

<?php require "admin/include/footer.php" ?>