<?php
require('inc/essentials.php');
require('inc/db_config.php');
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>

    <!--link with links.php-->
    <?php
    require('inc/links.php')
    ?>

    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-2 sticky-top shadow-sm">
        <div class="container-fluid">
            <img src="images/logo.jfif" width="70" height="70">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Hotel Serene Ltd. | Luxury with serenity</a>

        </div>
    </nav>

    <div class="login-form">
        <form method="POST">
            <h3 class="fw-bold fs-3 h-font text-center bg-info mb-3">Admin Panel</h3>
            <div>
                <div class="mb-4">
                    <input name="admin_name" required type="text" class="form-control text-center" placeholder="Admin name">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control text-center" placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn btn-success w-100 fw-bold h-font">Login to Admin Panel</button>
            </div>
        </form>


    </div>






    <?php
    if (isset($_POST['login'])) {
        $frm_data = filteration($_POST); //data filter done and put it frm variable

        $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
        $values = [$frm_data['admin_name'], $frm_data['admin_pass']];


        $res = select($query, $values, "ss");
        if ($res->num_rows == 1) //in db rows are increasing for correct name,password
        {
            $row = mysqli_fetch_assoc($res);

            $_SESSION['adminLogin'] = true;
            $_SESSION['adminId'] = $row['sr_no'];
            redirect('settings.php'); //if name,pass match go to dashboard
        } else {
            alert('error', 'Wrong name and password !');
        }
    }
    ?>














    <!--link with scripts.php-->
    <?php
    require('inc/scripts.php')
    ?>
</body>

</html>