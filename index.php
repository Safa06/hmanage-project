
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Serene |Luxury with serenity</title>
  <?php
  require('inc/links.php')
  ?>

  <!--Swiper.js slide show for home page-->
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />


</head>



<body>

  <!--header.php included with index.php-->
  <?php
  require('inc/header.php')
  ?>


  <!--Swiper.js(Carousel) for home page slide-->
  <div class="container-fluid">

    <div class="swiper swiper-container">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <img class="w-100 d-block" src="images/carousel/1.jpg" >
        </div>

        <div class="swiper-slide">
          <img class="w-100 d-block" src="images/carousel/4.jpg" >
        </div>

        <div class="swiper-slide">
          <img class="w-100 d-block" src="images/carousel/h2.jpg" >
        </div>

        <div class="swiper-slide">
          <img class="w-100 d-block" src="images/carousel/h1.jpg" >
        </div>

       
        <!-- //while ($row = mysqli_fetch_assoc($res)) {
          //$path = CAROUSEL_IMG_PATH;
          //echo <<<data
              <div class="swiper-slide">
                //<img src=class="w-100 d-block">
              //</div>
            //data;
        //}-->
       
      </div>
    </div>
  </div>



  <!--Check Availability form-->
  <div class="container availability-form">
    <div class="row">
      <div class="shadow rounded text-white" style="background-image:linear-gradient(#1e1e5d,#0d446c,#00d4ff);">
        <h4 class="fw-bold h-font p-3">MAKE A RESERVATION</h4>
        <form>
          <div class="row align-items-end">
            <div class="col-lg-4 mb-3">
              <label class="form-label" style="font-weight:500;">Check-in</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-4 mb-3">
              <label class="form-label" style="font-weight:500;">Check-out</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-2 mb-3">
              <label class="form-label" style="font-weight:500;">Adult</label>
              <select class="form-select shadow-none">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-lg-2 mb-3">
              <label class="form-label" style="font-weight:500;">Children</label>
              <select class="form-select shadow-none">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="text-center mb-3 mt-2">
              <button type="submit" class="btn col-6 w-25 text-white" style="background-color:#1e1e5d;">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>



  <!--Room-->
  <h2 class="mt-5 pt-4 mb-4 fw-bold h-font m-5">Rooms & Suites</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 ">
        <div class="border-bottom border-4 border-success">
          <div class="card" style="max-width: 410px; height: 350px ; margin:auto;">
            <img src="images/rooms/4.jpg" class="card-img-top">
            <div class="card-body">
              <h5 class="fw-bold h-font">Regular Suite</h5>
              <p>Attractively ornamented with complete marble & tiles and luxurious fabrics, our Regular Suite are 650 sq ft.</p>
               <!-- <h6 class="mb-5 text-success fw-bold">BDT-3000/night</h6> -->
               <!-- <div class="text-center">
                <a href="#" class="btn btn-success w-50">Book</a>
              </div>  -->
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="border-bottom border-4 border-success">
          <div class="card" style="max-width: 410px; height: 350px ;  margin:auto;">
            <img src="images/rooms/2.jpg" class="card-img-top">
            <div class="card-body">
              <h5 class="fw-bold h-font">Royal Suite</h5>
              <p>Attractively ornamented with complete marble & tiles and luxurious fabrics, our Royal Suite are 1480 sq ft.</p>
               <!-- <h6 class="mb-5 text-success fw-bold">BDT-5000/night</h6> -->
               <!-- <div class="text-center">
                <a href="#" class="btn btn-success w-50">Book</a>
              </div>  -->
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="border-bottom border-4 border-success">
          <div class="card" style="max-width: 410px; height: 350px ; margin:auto;">
            <img src="images/rooms/3.jpg" class="card-img-top">
            <div class="card-body">
              <h5 class="fw-bold h-font">Presidential Suite</h5>
              <p>Attractively ornamented with complete marble tiles and luxurious fabrics, Presidential Suite are 1900 sq ft.</p>
              <!-- <h6 class="mb-5 text-success fw-bold">BDT-10000/night</h6> -->
               <!-- <div class="text-center">
                <a href="#" class="btn btn-success w-50">Book</a>
              </div> -->
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>



  <!--Facilities-SVG(Scalable Vector Graphics-->
  <h2 class="mt-5 pt-4 mb-4 fw-bold h-font m-5">Facilities</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 ms-6">
        <img src="images/facilities/tv.png" width="50px">
        <h6 class="mt-3">LED</h6>
      </div>
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 me-6">
        <img src="images/facilities/wifi.png" width="50px">
        <h6 class="mt-3">Wifi</h6>
      </div>
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 me-6">
        <img src="images/facilities/ac.png" width="50px">
        <h6 class="mt-3">Central AC</h6>
      </div>
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 me-6">
        <img src="images/facilities/pool.png" width="50px">
        <h6 class="mt-3">Swimming Pool</h6>
      </div>
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 me-6">
        <img src="images/facilities/gym.png" width="50px">
        <h6 class="mt-3">Fitness Center</h6>
      </div>
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 me-6">
        <img src="images/facilities/shop2.png" width="50px">
        <h6 class="mt-3">Shop</h6>
      </div>
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 me-6">
        <img src="images/facilities/doctor.jfif" width="50px">
        <h6 class="mt-3">Doctor on call</h6>
      </div>
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 me-6">
        <img src="images/facilities/transport.png" width="50px">
        <h6 class="mt-3">Transport</h6>
      </div>
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 me-6">
        <img src="images/facilities/saloon.png" width="50px">
        <h6 class="mt-3">Salon</h6>
      </div>
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 me-6">
        <img src="images/facilities/restaurant.png" width="50px">
        <h6 class="mt-3">Restaurant</h6>
      </div>
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 me-6">
        <img src="images/facilities/service.png" width="50px">
        <h6 class="mt-3">24 hours room service</h6>
      </div>
      <div class="col-lg-2 col-md-2 text-center py-4 my-3 me-6">
        <img src="images/facilities/parking.jfif" width="50px">
        <h6 class="mt-3">Car Parking</h6>
      </div>
    </div>
  </div>



  <!--Reach us-->

  <h2 class="mt-3 pt-4 mb-4 fw-bold h-font m-5">Reach us</h2>
  <div class="conatiner">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3">
        <iframe width="1500px" height="450px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233668.38703802988!2d90.27923923029098!3d23.780573257422212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1657606616369!5m2!1sen!2sbd" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>


  <!--Password reset-->
  <div class="modal fade" id="recoveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <form id="recovery-form">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-white text-center h-font">Set new password</h5>
                </div>
                <div class="modal-body text-white">
                    <div class="mb-3">
                        <label class="form-label h-font">New password</label>
                        <input type="password" name="pass" required class="form-control">
                        <input type="hidden" name="email">
                        <input type="hidden" name="token">

                    </div>
                    <div class="mb-2 text-end">
                        <button type="button" class="btn btn-success h-font" data-bs-dismiss="modal">
                                Cancel
                        </button>
                        <button type="submit" class="btn btn-success h-font">Reset</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
  </div>



  <!--footer.php included with index.php-->
  <?php
  require('inc/footer.php')
  ?>

  <?php
  if(isset($_GET['account_recovery']))
  {
    $data=filteration($_GET);
    $t_date=date("Y-m-d");
    $query=select("SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `t_expire`=? LIMIT 1",
      [$data['email'],$data['token'],$t_date],'sss');

      if(mysqli_num_rows($query)==1)
      {
        echo <<<showModal
        <script>
          var myModal=document.getElementById('recoveryModal');
          myModal.querySelector("input[name='email']").value='$data[email]';
          myModal.querySelector("input[name='token']").value='$data[token]';

          var modal=bootstrap.Modal.getOrCreateInstance(myModal);
          modal.show();
        </script>

        showModal;
      }
      else
      {
        alert("error","Expired link");
      }

  }




?>


  <!--link swiper.js  with file-->
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>





  <!-- Initialize Swiper.js for home page slide -->
  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      }
    });




    //recover account
    let recovery_form=document.getElementById('recovery-form');
    recovery_form.addEventListener('submit',(e)=>
    {
        e.preventDefault();

        let data = new FormData();
        data.append('email',recovery_form.elements['email'].value);
        data.append('token',recovery_form.elements['token'].value);
        data.append('pass',recovery_form.elements['pass'].value);
        
        data.append('recover_user','');        

        // hide modal

        var myModal=document.getElementById('recoveryModal');
        var modal=bootstrap.Modal.getInstance(myModal);
        modal.hide();



        let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/login_register.php", true);
            
            xhr.onload = function() {
                if(this.responseText=='failed')
                {
                  alert('error',"Account reset failed");
                }
                
                else
                {
                    alert('success',"Account reset");
                    recovery_form.reset();
                }
                
                
            }


            xhr.send(data);

    });
  </script>



</body>

</html>