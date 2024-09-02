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
    <title>Admin Panel - Rooms</title>

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
                <h3 class="mb-4 fw-bold h-font">Rooms Settings</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <!-- <div class="text-end mb-4">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                Edits
                            </button>
                        </div> -->
                        <div class="table-responsive-lg" style="height:450 px ; overflow-y:scroll;">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr class="bg-info text-dark">
                                        <th scope="col">Index</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Area</th> 
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Rooms add modal-->
    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="add_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title fw-bold h-font">Rooms & Suites</h5>
                    </div>
                    <div class="modal-body text-dark">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" name="quantity" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area</label>
                                <input type="number" name="area" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult(Max.)</label>
                                <input type="number" name="adult" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Children(Max.)</label>
                                <input type="number" name="children" class="form-control shadow-none" required>
                            </div>

                            <!--features facilities given-->

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Features</label>
                                <div class="row">
                                    <?php
                                    $res=selectAll('features');
                                    while($opt=mysqli_fetch_assoc($res))
                                    {
                                        echo"
                                           <div class='col-md-3'>
                                             <label>
                                               <input type='checkbox' name='features' value='$opt[id]' class='form-check-input'>
                                               $opt[name]
                                            </label>
                                           </div>
                                        ";

                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Facilities</label>
                                <div class="row">
                                    <?php
                                    $res=selectAll('facilities');
                                    while($opt=mysqli_fetch_assoc($res))
                                    {
                                        echo"
                                           <div class='col-md-3'>
                                             <label>
                                               <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input'>
                                               $opt[name]
                                            </label>
                                           </div>
                                        ";

                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="desc" rows="5" class="form-control" required></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer bg-dark text-white">
                        <button type="reset" class="btn btn-secondary h-font" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success text-white h-font">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center">
        <button type="button" class="btn btn-info  col-6 w-25 h-font fw-bold mb-3 fs-5" data-bs-toggle="modal" data-bs-target="#add-room">
            Add rooms
        </button>
    </div>


    <!--Rooms edit modal-->
    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="edit_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title fw-bold h-font">Edit rooms</h5>
                    </div>
                    <div class="modal-body bg-dark text-white">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" name="quantity" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area</label>
                                <input type="number" name="area" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult(Max.)</label>
                                <input type="number" name="adult" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Children(Max.)</label>
                                <input type="number" name="children" class="form-control shadow-none" required>
                            </div>


                            <!--features facilities given-->

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Features</label>
                                <div class="row">
                                    <?php
                                    $res=selectAll('features');
                                    while($opt=mysqli_fetch_assoc($res))
                                    {
                                        echo"
                                           <div class='col-md-3'>
                                             <label>
                                               <input type='checkbox' name='features' value='$opt[id]' class='form-check-input'>
                                               $opt[name]
                                            </label>
                                           </div>
                                        ";

                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Facilities</label>
                                <div class="row">
                                    <?php
                                    $res=selectAll('facilities');
                                    while($opt=mysqli_fetch_assoc($res))
                                    {
                                        echo"
                                           <div class='col-md-3'>
                                             <label>
                                               <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input'>
                                               $opt[name]
                                            </label>
                                           </div>
                                        ";

                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="desc" rows="5" class="form-control" required></textarea>
                            </div>

                            <input type="hidden" name="room_id">
                        </div>

                    </div>
                    <div class="modal-footer bg-dark text-white">
                        <button type="reset" class="btn btn-secondary h-font" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success text-white h-font">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--Rooms images modal-->
    <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h-font fw-bold">Room Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white">
                    <div id="image-alert"></div>
                    <div class="border-bottom border-3 pb-3 mb-3">
                        <form id="add_image_form">
                            <label class="form-label fw-bold">Add Image</label>
                            <input type="file" name="image" accept=".jpg,.png,.webp,.jpeg" class="mb-3 form-control shadow-none" required>
                            <!-- <button class="btn btn-success text-white h-font">ADD</button>
                            <input type="hidden" name="room_id"> -->
                            <button type="reset" class="btn btn-secondary h-font" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success text-white h-font">Submit</button>
                            <input type="hidden" name="room_id">
                        </form>
                    </div>
                    <div class="table-responsive-lg" style="height: 350px ; overflow-y:scroll;">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr class="bg-info text-dark sticky-top">
                                    <th scope="col" width="60%">Image</th>
                                    <th scope="col">Thumb</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="room-image-data">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <?php
    require('inc/scripts.php');
    ?>

    <script src="scripts/rooms.js"></script>

</body>

</html>