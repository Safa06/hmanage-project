<?php
require('inc/essentials.php');
adminLogin();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Images</title>

    <?php
    require('inc/links.php');
    ?>

</head>

<body>


    <?php require('inc/header.php');
    ?>

    <!-- <div class="col-lg-2 bg-white fw-bold border-bottom shadow-none  border-5  border-info" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h4 class="mt-2 fw-bold h-font">FILTERS</h4>
                  align-items-stretch is for take them from left(near margin)

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse flex-column mt-2 align-items-stretch" id="adminDropdown">
                    <ul class="nav nav-pills flex-column ml-1">
                        <li class="nav-item">
                            <a class="nav-link text-dark h-font fs-5" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark h-font fs-5" href="settings.php">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark h-font fs-5" href="#">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark h-font fs-5" href="#">Rooms</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </div> -->


    <h4 class="text-info fs-1 fw-bold h-font text-center mt-4 mb-3">Admin Panel Site</h4>


    <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="carousel_s_form">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title fw-bold h-font">Add Images</h5>
                    </div>
                    <div class="modal-body bg-dark text-white">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Images</label>
                            <input type="file" name="carousel_picture" id="carousel_picture_inp" accept=".jpg,.jpeg,.png,.webp" class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="modal-footer bg-dark text-white">
                        <button type="button" onclick="carousel_picture.value=''" class="btn btn-secondary h-font" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success text-white h-font">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




    <div class="row" id="carousel-data">
    </div>

    <div class="text-center">
        <button type="button" class="btn btn-info  col-6 w-25 h-font fw-bold mb-3 fs-5" data-bs-toggle="modal" data-bs-target="#carousel-s">
           Edit
        </button>
    </div>
    </div>



    <?php require('inc/scripts.php');
    ?>
    <script src="scripts/settings.js"></script>



</body>

</html>