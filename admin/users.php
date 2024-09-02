<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Users</title>

    <?php
    require('inc/links.php');
    ?>

</head>

<body class="bg-light">
    <?php
    require('inc/header.php');
    ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-12 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4 fw-bold h-font">Users Settings</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <!-- <div class="text-end mb-4">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                Edits
                            </button>
                        </div> -->
                        <input type="text" oninput="search_user(this.value)" class="form-control w-25 mb-4 ms-auto" placeholder="Search">
                        <div class="table-responsive">
                            <table class="table table-hover text-center" style="min-width:1500px;">
                                <thead>
                                    <tr class="bg-info text-dark">
                                        <th scope="col">Index</th>
                                        <th scope="col">Profile</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Date of birth</th> 
                                        <th scope="col">Verified</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   



    <?php
    require('inc/scripts.php');
    ?>

    <script src="scripts/users.js"></script>

</body>

</html>