<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

if(isset($_GET['seen']))
{
    $frm_data=filteration($_GET);
    if($frm_data['seen']=='all')
    {
        $q="UPDATE `user_queries` SET `seen`=?";
        $values=[1];
        if(update($q,$values,'i'))
        {
            alert('success','Marked all as read');
        }
        else
        {
            alert('error','Failed');
        }
    }
    else
    {
        // $q="UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
        // $values=[1,$frm_data['seen']];
        // if(update($q,$values,'ii'))
        // {
        //     alert('success','Marked as read');
        // }
        // else
        // {
        //     alert('error','Failed');
        // }
    }
}


if(isset($_GET['del']))
{
    $frm_data=filteration($_GET);
    if($frm_data['del']=='all')
    {
        $q="DELETE FROM `user_queries`";
        if(mysqli_query($con,$q))
        {
            alert('success','All data deleted');
        }
        else
        {
            alert('error','Failed');
        }
    }
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
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Document Page</title>

    <?php
    require('inc/links.php');
    ?>

</head>


<body>
    <?php require('inc/header.php');?>


    <h4 class="text-info fs-1 fw-bold h-font text-center mt-4 mb-1">Admin Panel Site</h4>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-12 m-3 overflow-hidden">

                <div class="mt-2 mb-3 d-flex align-items-center justify-content-between">
                    <h5 class="mt-2 mb-1 ms-3 fw-bold h-font fs-2">User Document Section</h5>
                </div>

                <div class="card  border-0 shadow-sm ">
                    <div class="card-body">
                        <div class="text-end mb-2">
                            <a href="?seen=all" class="btn btn-md btn-success h-font">Marked all read</a>
                            <a href="?del=all" class="btn btn-md btn-danger h-font">Delete all</a>
                        </div>


                        <div class="table-responsive-md table-responsive-sm" style="height: 450px; overflow-y:scroll;">
                            <table class="table table-hover border-2 text-center">
                                <thead class="sticky-top">
                                    <tr class="bg-info text-dark fs-6" style="font-style:italic;">
                                        <th scope="col">Index</th>
                                        <th scope="col" width="20%">Name</th>
                                        <th scope="col" width="20%">Email</th>
                                        <th scope="col" width="20%">Message</th>
                                        <th scope="col">Date</th>
                                        <!-- <th scope="col">Seen</th> -->
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    $q = "SELECT * FROM `user_queries` ORDER BY `sr_no` DESC";
                                    $data = mysqli_query($con, $q);
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($data)) 
                                    {
                                        $seen='';
                                        if($row['seen']!=1)
                                    {
                                        // $seen="<a href='?seen=$row[sr_no]' class='btn btn-sm btn-success mt-1 mb-2'>Read</a>";
                                    }
                                        // $seen.="<a href='?del=$row[sr_no]' class='btn btn-sm btn-danger  mt-1 ms-2 mb-2'>Delete</a>";

                                        echo <<<query
                                                 <tr>
                                                   <td>$i</td>
                                                   <td>$row[name]</td>
                                                   <td>$row[email]</td>
                                                   <td>$row[message]</td>
                                                   <td>$row[date]</td>
                                                <!--<td>$seen</td>-->
                                                 </tr>
                                                query;
                                        $i++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php');
    ?>


</body>

</html>