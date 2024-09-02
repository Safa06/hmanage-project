<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();




if(isset($_POST['get_general']))
 {

    $q="SELECT * FROM `settings` WHERE `sr_no`=?";
    $values=[1];
    $res= select($q,$values,"i");
    $data=mysqli_fetch_assoc($res);
    $json_data=json_encode($data);
    echo $json_data;
 }



//  if(isset($_POST['upd_general']))
//  {
//    $frm_data=filteration($_POST);
//    $q="UPDATE `settings` SET `site_title`=? WHERE `sr_no`=?";
//    $values=[$frm_data['site_title'],1];
//    $res=update($q,$values,'si');
//    echo $res;
//  }



//   if(isset($_POST['upd_shutdown']))
//   {
//      $frm_data=($_POST['upd_shutdown']==0) ? 1 : 0 ;

//      $q="UPDATE `settings` SET `shutdown`=? WHERE `sr_no`=?";
//      $values=[$frm_data,1];
//      $res= update($q,$values,'ii');
//      echo $res;
//   }



if(isset($_POST['get_contacts']))
 {

    $q="SELECT * FROM `contact` WHERE `sr_no`=?";
    $values=[1];
    $res= select($q,$values,"i");
    $data=mysqli_fetch_assoc($res);
    $json_data=json_encode($data);
    echo $json_data;
 }



 if(isset($_POST['upd_contacts']))
  {
     $frm_data=filteration($_POST);

     $q="UPDATE `contact` SET `address`=?,`pn1`=?,`pn2`=?,`email`=? WHERE `sr_no`=?";
     $values=[$frm_data['address'],$frm_data['pn1'],$frm_data['pn2'],$frm_data['email'],1];
     $res= update($q,$values,'ssssi');
     echo $res;
  }

?> 