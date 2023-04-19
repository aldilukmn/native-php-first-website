<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'admin/include/functions.php';


$patients = query("SELECT * FROM patients ORDER BY id DESC LIMIT $firstPage, $totalDataPerPage");

if (isset($_POST['search'])) {

  $patients = search($_POST['keyword']);
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
  <!-- My style CSS -->
  <link rel="stylesheet" href="admin/assets/css/style.css">
  <title>Pasient</title>
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
            <a class="nav-link active" href="pasient.php">Patients</a>
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
  <div class="container py-5">
    <div class="card shadow-sm">
      <div class="card-body">
        <h3 class="fw-bold h3 text-dark text-center text-uppercase mb-4">Patients List</h3>
        <?php if (isset($errorAdd)) : ?>
          <div class="alert alert-danger text-center p-2" role="alert">
            <strong>Patient not created!</strong>
            <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php elseif (isset($successAdd)) : ?>
          <div class="alert alert-success text-center p-2" role="alert">
            <strong>Patient created successfully</strong>
            <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php elseif (isset($successEdit)) : ?>
          <div class="alert alert-warning text-center p-2" role="alert">
            <strong>Data Updated!</strong>
            <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php elseif (isset($successDel)) : ?>
          <div class="alert alert-danger text-center p-2" role="alert">
            <strong>Data Deleted!</strong>
            <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php elseif (isset($emptyKey)) : ?>
          <div class="alert alert-danger text-center p-2" role="alert">
            <strong>Data Deleted!</strong>
            <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <div class="row justify-contain-center">
          <div class="col-md-10 col-md-offset-1">
          </div>
          <div class="col col-md-4 col-lg-3 text-start">
            <!-- Search Patient -->
            <form action="" method="post">
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" placeholder="Search patient ..." name="keyword" autocomplete="off" id="keyword">
                <button class="btn btn-primary" type="submit" id="search" name="search">Search</button>
              </div>
            </form>
          </div>
          <div class="col text-end">
            <!-- <a href="add.php" class="btn btn-sm btn-primary" name="add">Add Pasient</a> -->
            <button type="button" class="btn btn-sm btn-primary addModal" data-bs-toggle="modal" data-bs-target="#patientAddModalLabel">
              <i class="bi bi-person-plus-fill"></i> Add Patient
            </button>
          </div>
          <div class="modal fade" id="patientAddModalLabel" tabindex="-1" aria-labelledby="patientAddModalLabelLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="titleModal">Add Patient</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="post">
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                    </div>
                    <div class="mb-3">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="text" class="form-control" id="phone" name="phone" autocomplete="off">
                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="address" name="address" autocomplete="off">
                    </div>
                    <div class="mb-3">
                      <label for="indication" class="form-label">Indication</label>
                      <input type="text" class="form-control" id="indication" name="indication" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" id="addPatient" name="addPatient">Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3 justify-content-center">
          <div class="col-md-12">
            <!-- Data table -->
            <div class="table-responsive">
              <table class="table align-middle table-bordered table-striped">
                <thead class="table-dark">
                  <tr class="text-center">
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Indication</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 + $firstPage; ?>
                  <?php foreach ($patients as $pasient) : ?>
                    <tr>
                      <th class="text-center"><?= $i; ?></th>
                      <td><?= $pasient["name"]; ?></td>
                      <td><?= $pasient["phone"]; ?></td>
                      <td><?= $pasient["address"]; ?></td>
                      <td><?= $pasient["indication"]; ?></td>
                      <td class="text-center">
                        <a class="text-warning m-1" href="pasient.php?name=<?= $pasient["id"]; ?>" data-bs-toggle="modal" data-bs-target="#patientEditModalLabel<?= $pasient["id"]; ?>"><i class="bi bi-pencil-fill"></i></a>
                        <a class="text-danger m-1" href="pasient.php?id=<?= $pasient["id"]; ?>" data-bs-toggle="modal" data-bs-target="#patientDeleteModalLabel<?= $pasient["id"]; ?>"><i class="bi bi-x-square-fill"></i></a>
                      </td>
                    </tr>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="patientEditModalLabel<?= $pasient["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Patient</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form id="editPatient" method="post" action="pasient.php">
                              <input type="hidden" name="update_id" value="<?= $pasient["id"]; ?>" autocomplete="off">
                              <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $pasient['name']; ?>" autocomplete="off">
                              </div>
                              <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?= $pasient['phone']; ?>" autocomplete="off">
                              </div>
                              <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?= $pasient['address']; ?>" autocomplete="off">
                              </div>
                              <div class="mb-3">
                                <label for="indication" class="form-label">indication</label>
                                <input type="text" class="form-control" id="indication" name="indication" value="<?= $pasient['indication']; ?>" autocomplete="off">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="editPatient">Save</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal delete -->
                    <div class="modal fade" id="patientDeleteModalLabel<?= $pasient["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Patient</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form id="delPatient" method="post" action="pasient.php">
                              <input type="hidden" name="delete_id" value="<?= $pasient["id"]; ?>" autocomplete="off">
                              <div class="mb-3">
                                <label for="name" class="form-label">Do you want to delete <strong><?= $pasient['name']; ?></strong> ?</label>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm btn-primary" name="delPatient">Yes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- Navigation for table -->
            <ul class="pagination pagination-sm mt-3 justify-content-center">
              <li class="page-item">
                <?php if ($activePage > 1) : ?>
                  <a class="page-link" href="?page=<?= $activePage - 1;  ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                <?php endif; ?>
              </li>
              <?php for ($i = $startNumber; $i <= $endNumber; $i++) : ?>
                <?php if ($i == $activePage) : ?>
                  <li class="page-item active"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php else : ?>
                  <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
              <?php endfor; ?>
              <li class="page-item">
                <?php if ($activePage < $totalOfpage) : ?>
                  <a class="page-link" href="?page=<?= $activePage + 1;  ?>" aria-label="Previous">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                <?php endif; ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <?php require 'admin/include/footer.php'; ?>