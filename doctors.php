<?php

session_start();

require 'admin/include/functions.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$doctors = query("SELECT * FROM doctors");

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
            <a class="nav-link" href="pasient.php">Patients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="doctors.php">Doctors</a>
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
        <h3 class="fw-bold h3 text-dark text-center text-uppercase mb-4">Doctors List</h3>
        <?php if (isset($errorAdd)) : ?>
          <div class="alert alert-danger text-center p-2" role="alert">
            <strong>Doctor not created!</strong>
            <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php elseif (isset($successAdd)) : ?>
          <div class="alert alert-success text-center p-2" role="alert">
            <strong>Doctor created successfully</strong>
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
        <?php endif; ?>
        <div class="col text-end mb-3">
          <button type="button" class="btn btn-sm btn-primary addModal" data-bs-toggle="modal" data-bs-target="#doctorAddLabel">
            <i class="bi bi-person-plus-fill"></i>Add Doctor</button>
        </div>
        <div class="modal fade" id="doctorAddLabel" tabindex="-1" aria-labelledby="doctorAddLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="titleModal">Add Doctor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="addDoctor" action="" method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="specialist" class="form-label">Specialist</label>
                    <input type="text" class="form-control" id="specialist" name="specialist" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="agenda" class="form-label">Agenda</label>
                    <input type="text" class="form-control" id="agenda" name="agenda" autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="addDoctor" name="addDoctor">Add</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php foreach ($doctors as $doctors) : ?>
            <div class="col-lg-3 col-md-4 col-sm-">
              <div class="card mb-4">
                <img class="card-img-top" src="admin/assets/img/<?= $doctors['image']; ?>" alt="image">
                <div class="card-body">
                  <h5 class="card-title fw-bold" style="font-size: 16px;"><?= $doctors['name']; ?></h5>
                  <p class="card-text" style="font-size: 14px;"><?= $doctors['agenda']; ?></p>
                  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal<?= $doctors['id_doctor']; ?>">
                    Detail
                  </button>
                  <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $doctors['id_doctor']; ?>">
                    Edit
                  </button>
                  <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delModal<?= $doctors['id_doctor']; ?>">
                    Delete
                  </button>
                  <!-- Modal Detail -->
                  <div class="modal fade" id="detailModal<?= $doctors['id_doctor']; ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="detailModalLabel">Detail</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <!-- Name -->
                          <div class="row justify-content-center">
                            <div class="col-3">
                              <p class="fw-bold">Name</p>
                            </div>
                            <div class="col-1">
                              <p>:</p>
                            </div>
                            <div class="col-6">
                              <p><?= $doctors['name']; ?></p>
                            </div>
                          </div>
                          <!-- Address -->
                          <div class="row justify-content-center">
                            <div class="col-3">
                              <p class="fw-bold">Address</p>
                            </div>
                            <div class="col-1">
                              <p>:</p>
                            </div>
                            <div class="col-6">
                              <p><?= $doctors['address']; ?></p>
                            </div>
                          </div>
                          <!-- Email -->
                          <div class="row justify-content-center">
                            <div class="col-3">
                              <p class="fw-bold">Email</p>
                            </div>
                            <div class="col-1">
                              <p>:</p>
                            </div>
                            <div class="col-6">
                              <p><?= $doctors['email']; ?></p>
                            </div>
                          </div>
                          <!-- Phone -->
                          <div class="row justify-content-center">
                            <div class="col-3">
                              <p class="fw-bold">Phone</p>
                            </div>
                            <div class="col-1">
                              <p>:</p>
                            </div>
                            <div class="col-6">
                              <p><?= $doctors['phone']; ?></p>
                            </div>
                          </div>
                          <!-- Specialist -->
                          <div class="row justify-content-center">
                            <div class="col-3">
                              <p class="fw-bold">Specialist</p>
                            </div>
                            <div class="col-1">
                              <p>:</p>
                            </div>
                            <div class="col-6">
                              <p><?= $doctors['specialist']; ?></p>
                            </div>
                          </div>
                          <!-- Agenda -->
                          <div class="row justify-content-center">
                            <div class="col-3">
                              <p class="fw-bold">Agenda</p>
                            </div>
                            <div class="col-1">
                              <p>:</p>
                            </div>
                            <div class="col-6">
                              <p><?= $doctors['agenda']; ?></p>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Edit -->
                  <div class="modal fade" id="editModal<?= $doctors["id_doctor"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Doctor</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form id="editPatient" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="update_id" value="<?= $doctors["id_doctor"]; ?>" autocomplete="off">
                            <input type="hidden" name="past_image" value="<?= $doctors["image"]; ?>" autocomplete="off">
                            <div class="mb-3">
                              <label for="name" class="form-label">Name</label>
                              <input type="text" class="form-control" id="name" name="name" value="<?= $doctors['name']; ?>" autocomplete="off">
                            </div>
                            <div class="mb-3">
                              <label for="address" class="form-label">Address</label>
                              <input type="text" class="form-control" id="address" name="address" value="<?= $doctors['address']; ?>" autocomplete="off">
                            </div>
                            <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="text" class="form-control" id="email" name="email" value="<?= $doctors['email']; ?>" autocomplete="off">
                            </div>
                            <div class="mb-3">
                              <label for="phone" class="form-label">Phone</label>
                              <input type="text" class="form-control" id="phone" name="phone" value="<?= $doctors['phone']; ?>" autocomplete="off">
                            </div>
                            <div class="mb-3">
                              <label for="specialist" class="form-label">Specialist</label>
                              <input type="text" class="form-control" id="specialist" name="specialist" value="<?= $doctors['specialist']; ?>" autocomplete="off">
                            </div>
                            <div class="mb-3">
                              <label for="agenda" class="form-label">Agenda</label>
                              <input type="text" class="form-control" id="agenda" name="agenda" value="<?= $doctors['agenda']; ?>" autocomplete="off">
                            </div>
                            <div class="mb-3">
                              <label for="image" class="form-label">Image</label>
                              <input type="file" class="form-control" id="image" name="image" autocomplete="off">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary" name="editDoctor">Save</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal delete -->
                  <div class="modal fade" id="delModal<?= $doctors['id_doctor']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Doctor</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form id="delDoctor" method="post" action="">
                            <input type="hidden" name="delete_id" value="<?= $doctors["id_doctor"]; ?>" autocomplete="off">
                            <div class="mb-3">
                              <label for="name" class="form-label">Do you want to delete <strong><?= $doctors['name']; ?></strong> ?</label>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-sm btn-primary" name="delDoctor">Yes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>


  <?php require 'admin/include/footer.php'; ?>