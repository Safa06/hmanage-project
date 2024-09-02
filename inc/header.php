<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

//fetching data for fronted from database(footer mainly)

// $contact_q = "SELECT * FROM `contact` WHERE `sr_no`=?";
// $values = [1];
// $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));

?>



<!--Home page & also for all page navbar-->

<nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-2 sticky-top shadow">

    <div class="container-fluid">
        <img src="images/logo.jfif" width="70" height="70">

        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Hotel Serene|Luxury with serenity</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold h-font me-3 text-dark fs-5" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3 fw-bold h-font text-dark fs-5" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3 fw-bold h-font text-dark fs-5" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3 fw-bold h-font text-dark fs-5" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-3 fw-bold h-font text-dark fs-5" href="contact.php">Contact</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php 
                if(isset($_SESSION['login'])&& $_SESSION['login']==true)
                {
                    $path=USERS_IMG_PATH;
                    echo<<<data
                    <div class="btn-group">
                      <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <img src="$path$_SESSION[uPic]" style="width:25px; height:25px;" class="me-1">   
                        $_SESSION[uName]
                      </button>
                      <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="bookings.php">My Bookings</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        
                      </ul>
                    </div>

                    data;
                }
                else
                {
                    echo<<<data
                    <button type="button" class="btn btn-success me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                       Login
                    </button>
                    <button type="button" class="btn btn-success me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#registerModal">
                       Registration
                    </button>

                    data;
                }
                ?>
            </div>
        </div>
    </div>
</nav>


<!--Login  Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <form id="login-form">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white text-center h-font">Login Panel</h5>
                    <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-white">
                    <div class="mb-3">
                        <label class="form-label h-font">Email/Phone</label>
                        <input type="text" name="email_mob" required class="form-control">
                    </div>
                    <div class="mb-3 text-white">
                        <label class="form-label h-font">Password</label>
                        <input type="password" name="pass" class="form-control">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-success h-font">Login</button>
                        <button type="button" class="btn btn-success h-font" data-bs-toggle="modal" data-bs-target="#forgotModal" data-bs-dismiss="modal">
                                 Forgot password
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<!--Forget modal-->
<div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <form id="forgot-form">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white text-center h-font">Forgot Password</h5>

                </div>
                <div class="modal-body text-white">
                    <span class="badge rounded-pill text-white mb-3 text-wrap lh-base">
                       Link is sent.
                    </span>
                    <div class="mb-3">
                        <label class="form-label h-font">Email</label>
                        <input type="email" name="email" required class="form-control">
                    </div>
                    <div class="mb-2 text-end">
                        <button type="button" class="btn btn-success h-font" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
                                Cancel
                        </button>
                        <button type="submit" class="btn btn-success h-font">Send Link</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<!--Register  Modal -->
  <div class="modal fade modal-dark" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-dark">
            <form id="register-form">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white h-font">Registration Panel</h5>
                    <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-white">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label class="form-label h-font">Name</label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label h-font">Email</label>
                                <input name="email" type="email" class="form-control"  required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label h-font">Phone</label>
                                <input name="phonenum" type="number" class="form-control"  required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label h-font">Profile Image</label>
                                <input name="profile" type="file" accept=".jpg,.png,.jpeg,.webp" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label h-font">Pincode</label>
                                <input name="pincode" type="number" class="form-control shadow-none"  required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label h-font">Date of Birth</label>
                                <input name="dob" type="date" class="form-control shadow-none"  required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label h-font">Password</label>
                                <input name="pass" type="password" class="form-control shadow-none"  required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label h-font">Confirm Password</label>
                                <input name="cpass" type="password" class="form-control shadow-none"  required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label h-font">Address</label>
                                <textarea name="address" class="form-control"   required rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success h-font">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>

