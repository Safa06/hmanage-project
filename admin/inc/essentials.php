<?php

define('SITE_URL','http://127.0.0.1/hotel/');
//define('FEATURES_IMG_PATH',SITE_URL.'images/features/');
define('FACILITIES_IMG_PATH',SITE_URL.'images/facilities/');
define('CAROUSEL_IMG_PATH',SITE_URL.'images/carousel/');
define('ROOMS_IMG_PATH',SITE_URL.'images/rooms/');
define('USERS_IMG_PATH',SITE_URL.'images/users/');

define('UPLOAD_IMAGE_PATH',$_SERVER['DOCUMENT_ROOT'].'/hotel/images/');
//define('FEATURES_FOLDER','features/');
define('FACILITIES_FOLDER','facilities/');
define('CAROUSEL_FOLDER','carousel/');
define('ROOMS_FOLDER','rooms/');
define('USERS_FOLDER','users/');

//sendgrid API Key
define('SENDGRID_API_KEY',"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");

define('SENDGRID_EMAIL',"sukonna.safa@gmail.com");
define('SENDGRID_NAME',"Hotel Serene");

function adminLogin()
{
    session_start();
    if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
        echo "<script>
           window.location.href='index.php';
        </script>";
    }
    //session_regenerate_id(true);
}



function redirect($url) //url pass done & redirect to dashboard if name,pass match
{
    echo "<script>
           window.location.href='$url';
        </script>";
}


function alert($type,$msg)
{
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
    echo <<<alert
    <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
     <strong>$msg</strong> 
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
}

function uploadImage($image,$folder)
{
    $valid_mime=['image/jpg','image/png','image/webp'];
    $img_mime=$image['type'];

    if(in_array($img_mime,$valid_mime))
    {
        return 'inv_img';//invalid image format

    }
    else if($image['size']/(1024*1024)>2)
    {
        return 'inv_size';//not greater than 2mb
    }
    else
    {
        $ext=pathinfo($image['name'],PATHINFO_EXTENSION);
        $name='IMG_'.random_int(11111,99999).".$ext";
        $img_path=UPLOAD_IMAGE_PATH.$folder.$name; 
        if(move_uploaded_file($image['tmp_name'],$img_path))
        {
            return $name;
        }
        else{
            return 'upd_failed';
        }
    }
}


function deleteImage($image,$folder)
{
    if(unlink(UPLOAD_IMAGE_PATH.$folder.$image))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function uploadUserImage($image)
{

    $valid_mime=['image/jpeg','image/png','image/webp'];
    $img_mime=$image['type'];

    if(!in_array($img_mime,$valid_mime))
    {
        return 'inv_img';//invalid image format

    }
    else
    {
        $ext=pathinfo($image['name'],PATHINFO_EXTENSION);
        $name='IMG_'.random_int(11111,99999).".jpeg";
        $img_path=UPLOAD_IMAGE_PATH.USERS_FOLDER.$name; 

        if($ext=='png'||$ext=='PNG')
        {
            $img=imagecreatefrompng($image['tmp_name']);
        }

        else if($ext=='webp'|| $ext=='WEBP')
        {
            $img=imagecreatefromwebp($image['tmp_name']);
        }

        else 
        {
            $img=imagecreatefromjpeg($image['tmp_name']);
        }
        
        if(imagejpeg($img,$img_path,75))
        {
            return $name;
        }
        else{
            return 'upd_failed';
        }
    }
}



function uploadSVGImage($image,$folder)
{
    $valid_mime=['image/svg+xml'];
    $img_mime=$image['type'];

    if(!in_array($img_mime,$valid_mime))
    {
        return 'inv_img';//invalid image format

    }
    else if(($image['size']/(1024*1024))>1)
    {
        return 'inv_size';//not greater than 1mb
    }
    else
    {
        $ext=pathinfo($image['name'],PATHINFO_EXTENSION);
        $name='IMG_'.random_int(11111,99999).".$ext";
        $img_path=UPLOAD_IMAGE_PATH.$folder.$name; 
        if(move_uploaded_file($image['tmp_name'],$img_path))
        {
            return $name;
        }
        else{
            return 'upd_failed';
        }
    }
}

?>
