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
    <title>Admin - Settings Page</title>

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

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-5 p-3 overflow-hidden">

                <!---General settings--->

                <!-- <h4 class="mb-4 fw-bold fs-3 h-font">General Settings</h4> -->

                <!--Shutdown section-->
                <!-- <div class="card mb-4">
                    <div class="card-body"> -->
                <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0 fw-bold fs-2 h-font">Shutdown Settings</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                                </form>

                            </div>
                        </div>
                        <p class="card-text mb-5">
                            The webpage is shutdown. No bookings and register can be done !
                        </p> -->
                <!-- </div>
                </div> -->


                <!--Contact settings section-->

                <!-- <div class="mt-5 mb-3 d-flex justify-content-center"> -->
                <!-- <h4 class="text-info fs-1 fw-bold h-font text-center mt-2 mb-3">Admin Panel Site</h4> -->
                <!-- </div> -->

                <!-- <div class="card mb-4">
                    <div class="card-body"> -->

                <div class="mt-2 mb-3 d-flex align-items-center justify-content-between">
                    <h5 class="mt-2 mb-3 fw-bold h-font fs-4">Contact Settings</h5>
                    <button type="submit" class="btn btn-info btn-sm h-font fw-bold" data-bs-toggle="modal" data-bs-target="#contacts-s">Edit</button>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <h6 class="card-subtitle mb-1 fw-bold">Address:</h6>
                        <p class="card-text" id="address"></p>
                    </div>

                    <div class="mb-4">
                        <h6 class="card-subtitle mb-1 fw-bold">Phone:</h6>
                        <p class="card-text">
                            <span id="pn1"></span>
                        </p>
                        <p class="card-text">
                            <span id="pn2"></span>
                        </p>
                    </div>
                    <div class="mb-4">
                        <h6 class="card-subtitle mb-1 fw-bold">Email:</h6>
                        <p class="card-text" id="email"></p>
                    </div>
                </div>

                <!--Contact settings modal section-->

                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="contacts_s_form">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white">
                                    <h5 class="modal-title fw-bold h-font">Contact Settings</h5>
                                </div>
                                <div class="modal-body bg-dark text-white">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <!-- <div class="col-md-6"> -->
                                            <div class="mb-3">
                                                <label class="form-level fw-bold h-font">Address</label>
                                                <input type="text" name="address" id="address_inp" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-level fw-bold h-font">Phone</label>
                                                <div class="input-group mb-3">
                                                    <!-- <span class="input-group-text">@</span> -->
                                                    <input type="number" name="pn1" id="pn1_inp" class="form-control" required>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <!-- <span class="input-group-text">@</span> -->
                                                    <input type="number" name="pn2" id="pn2_inp" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-level fw-bold h-font">Email</label>
                                                    <input type="text" name="email" id="email_inp" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer bg-dark text-white">
                                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn btn-secondary h-font" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success text-white h-font">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- <div class="text-center m-auto">
                    <button type="submit" class="btn btn-info col-6 w-25 fs-4 h-font fw-bold ">Edit</button>
                </div> -->

                <!--site-title-->
                <!-- <div class="card">
                    <div class="card-body"> -->
                <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0 fw-bold h-font fs-4">Site Settings</h5>
                    <button class="btn btn-info fw-bold h-font btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">Edit</button>
                    </h5>
                </div>
                <p class="card-text" id="site_title">Hotel Serene</p> -->
                <!-- </div>
                </div> -->

<!--site modal-->
                <!-- <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="general_s_form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-4 fw-bold h-font">Site title</h1>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Site Title Change</label>
                                        <input type="text" name="site_title" id="site_title_inp" class="form-control" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="site_title.value=general_data.site_title" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

<br><br> -->
                <!--Shutdown section-->

                <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0 fw-bold fs-4 h-font">Shutdown Settings</h5>
                    <div class="form-check form-switch">
                        <form>
                            <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                        </form>

                    </div>
                </div>
                <p class="card-text mb-5">
                    The webpage is shutdown. No bookings and register can be done !
                </p> -->


            </div>
        </div>
    </div>


    <?php require('inc/scripts.php');
    ?>
    <script src="scripts/settings.js"></script>


<!-- let general_s_form=document.getElementById('general_s_form');
let site_title_inp=document.getElementById('site_title_inp');

function get_general()
{
    let site_title=document.getElementById('site_title');
    let shutdown_toggle=document.getElementById('shutdown-toggle');

    let xhr=new XMLHttpRequest();
    xhr.open("POST","ajax/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload=function()
    {
        general_data=JSON.parse(this.responseText);

        site_title.innerText=general_data.site_title;
        site_title_inp.value=general_data.site_title;


    }

    xhr.send('get_general');
}

general_s_form.addEventListener('submit',function(e)
{
    e.preventDefault();
    upd_general(site_title_inp.value);

})

function upd_general(site_title_val)
{
    let xhr=new XMLHttpRequest();
    xhr.open("POST","ajax/settings_crud.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload=function()
    {
        var myModal=document.getElementById('general-s');
        var modal=bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if(this.responseText==1)
        {
            alert('success','Title change');
            get_general();
        }
        else
        {
            alert('error','No title change');

        }
    }

    xhr.send('site_title='+site_title_val+'&upd_general');
}


window.onload=function()
{
    get_general();
} -->
</body>

</html>