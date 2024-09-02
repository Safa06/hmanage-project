<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

// if (isset($_GET['seen'])) {
//     $frm_data = filteration($_GET);
//     if ($frm_data['seen'] == 'all') {
//         $q = "UPDATE `user_queries` SET `seen`=?";
//         $values = [1];
//         if (update($q, $values, 'i')) {
//             alert('success', 'Marked all as read');
//         } else {
//             alert('error', 'Failed');
//         }
//     }
    // else
    // {
    //     // $q="UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
    //     // $values=[1,$frm_data['seen']];
    //     // if(update($q,$values,'ii'))
    //     // {
    //     //     alert('success','Marked as read');
    //     // }
    //     // else
    //     // {
    //     //     alert('error','Failed');
    //     // }
    // }



// if (isset($_GET['del'])) {
//     $frm_data = filteration($_GET);
//     if ($frm_data['del'] == 'all') {
//         $q = "DELETE FROM `user_queries`";
//         if (mysqli_query($con, $q)) {
//             alert('success', 'All data deleted');
//         } else {
//             alert('error', 'Failed');
//         }
//     }
    // else
    // {
    //     $q="DELETE FROM `user_queries` WHERE `sr_no`=?";
    //     $values=[$frm_data['del']];
    //     if(update($q,$values,'i'))
    //     {
    //         alert('success','Deleted');
    //     }
    //     else
    //     {
    //         alert('error','Failed');
    //     }
    // }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin -Features & Facilities Page</title>

    <?php
    require('inc/links.php');
    ?>

</head>


<body>
    <?php require('inc/header.php'); ?>


    <h4 class="text-info fs-1 fw-bold h-font text-center mt-4 mb-1">Admin Panel Site</h4>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-12 m-3 overflow-hidden">
                <div class="card  border-0 shadow-sm ">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 fw-bold h-font fs-2">Features Settings</h5>
                            <button class="btn btn-info btn-sm fw-bold h-font m-3" data-bs-toggle="modal" data-bs-target="#feature-s">Add</button>
                        </div>


                        <div class="table-responsive-md table-responsive-sm" style="height: 350px; overflow-y:scroll;">
                            <table class="table table-hover border-2 text-center">
                                <thead>
                                    <tr class="bg-info text-dark fs-6" style="font-style:italic;">
                                        <th scope="col" width="20%">Index</th>
                                        <th scope="col" width="20%">Name</th>
                                        <th scope="col" width="20%">Action</th>

                                        <!-- <th scope="col">Seen</th> -->
                                    </tr>
                                </thead>
                                <tbody id="features-data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-12 m-3 overflow-hidden">
                <div class="card  border-0 shadow-sm ">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 fw-bold h-font fs-2">Facilities Settings</h5>
                            <button class="btn btn-info btn-sm fw-bold h-font m-3" data-bs-toggle="modal" data-bs-target="#facility-s">Add</button>
                        </div>


                        <div class="table-responsive-md table-responsive-sm" style="height: 350px; overflow-y:scroll;">
                            <table class="table table-hover border-2 text-center">
                                <thead>
                                    <tr class="bg-info text-dark fs-6" style="font-style:italic;">
                                        <th scope="col" width="10%">Index</th>
                                        <th scope="col" width="10%">Icon</th>
                                        <th scope="col" width="20%">Name</th>
                                        <th scope="col" width="40%">Description</th>
                                        <th scope="col" width="20%">Action</th>

                                        <!-- <th scope="col">Seen</th> -->
                                    </tr>
                                </thead>
                                <tbody id="facilities-data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 



    <!--feature modal-->
    <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" taindex="-1">
        <div class="modal-dialog">
            <form id="feature_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold h-font">
                            Add feature
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold fw-bold h-font">Name</label>
                            <input type="text" name="feature_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-success text-white fw-bold h-font" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success text-white fw-bold h-font">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <!--facility modal-->
    <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" taindex="-1">
        <div class="modal-dialog">
            <form id="facility_s_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold h-font">
                            Add facility
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold fw-bold h-font">Name</label>
                            <input type="text" name="facility_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold fw-bold h-font">Icon</label>
                            <input type="file" name="facility_icon" accept=".svg" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label h-font">Description</label>
                            <textarea name="facility_desc" class="form-control" required rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-success text-white fw-bold h-font" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success text-white fw-bold h-font">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <?php require('inc/scripts.php');
    ?>
<script src="scripts/features_facilities.js"></script>


</body>

</html>