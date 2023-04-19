<?php 

    require 'admin/include/functions.php';

    // Take a data from URL
    $id = $_GET["id"];
    
    // Query pasient data based on id
    $editPasient = query("SELECT * FROM patients WHERE id = $id")[0];

    // Button has been pressed or not check
    if ( isset($_POST["edit"]) ) {

      // data check successfully edited or not
      if ( edit($_POST) == 0 ) {

        echo "
            <script>
                alert('Data successfully edited!');
                document.location.href = 'pasient.php';
            </script>
            ";

      } else {

        echo "
            <script>
                alert('Data failed to delete!');
                document.location.href = 'pasient.php';
            </script>
            ";

    }

    // // Take data from each element
    // $name = $_POST["name"];
    // $phone = $_POST["phone"];
    // $address = $_POST["address"];
    // $indication = $_POST["indication"];

    // // Query insert data
    // $query = "INSERT INTO patients
    //             VALUES
    //             ('', '$name', '$phone', '$address', '$indication')
    //             ";

    // mysqli_query($connect, $query);

    }

    // data check successfully added or not
    // if ( mysqli_affected_rows($connect) > 0 ) {

    // } else {
      
    // }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit Pasient</title>
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
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
      <div class="container">
          <div class="row mt-5 justify-content-center h-100 mb-5">
              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card bg-light text-dark shadow">
                      <div class="card-body p-5 mb-2">
                          <div class="">
                              <div class="container">
                                  <div class="row text-center mb-3">
                                      <h2 class="fw-bold text-uppercase">Edit Pasient</h2>
                                  </div>
                                  <hr>
                                  <form method="post" action="">
                                      <input type="hidden" name="id" value="<?= $editPasient["id"]; ?>">
                                      <!-- Name -->
                                      <div class="row">
                                          <div class="col-md-6 form-group">
                                              <div class="mb-2">
                                                  <label for="name">Name</label>
                                                  <input type="text" name="name" id="name" class="form-control" autocomplete="off" value="<?= $editPasient["name"]; ?>" required>
                                              </div>
                                          </div>
                                          <div class="col-md-6 form-group">
                                              <div class="mb-2">
                                                  <label for="phone">Phone</label>
                                                  <input type="text" name="phone" id="phone" class="form-control" value="<?= $editPasient["phone"]; ?>" required>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- Email & Mobile -->
                                      <div class="row">
                                          <div class="col-md-6 form-group">
                                              <div class="mb-2">
                                                  <label for="address">Address</label>
                                                  <input type="text" name="address" id="address" class="form-control" value="<?= $editPasient["address"]; ?>" required>
                                              </div>
                                          </div>
                                              <div class="col-md-6 form-group">
                                                  <div class="mb-2">
                                                  <label for="indication">Indication</label>
                                                  <input type="text" name="indication" id="indication" class="form-control" value="<?= $editPasient["indication"]; ?>" required >
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row mt-3">
                                          <div class="col">
                                          <div class="d-grid gap-2">
                                              <button class="btn btn-primary" type="submit" name="edit">Save</button>
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