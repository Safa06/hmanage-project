<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Serene-Room Details Page</title>

  <?php
  require('inc/links.php')
  ?>
<title>Hotel Serene |Luxury with serenity</title>

</head>



<body>

  <!--header.php included with index.php-->
  <?php
  require('inc/header.php')
  ?>

  <?php
  if (!isset($_GET['id'])) {
    redirect('rooms.php');
  }
  $data = filteration($_GET);

  $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?", [$data['id'], 1, 0], 'iii');

  if (mysqli_num_rows($room_res) == 0) {
    redirect('rooms.php');
  }
  $room_data = mysqli_fetch_assoc($room_res);


  ?>

  <!--Rooms file-->


  <div class="col-12 my-5 mb-4">
    <h2 class="text-center mb-4 fw-bold h-font m-5"><?php echo $room_data['name'] ?></h2>
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-12 px-2 mx-auto mb-2 shadow-sm">
      <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
         <?php
          $room_img = ROOMS_IMG_PATH . "thumbnail.jpg";
          $img_q = mysqli_query($con, "SELECT * FROM `room_image` 
            WHERE `room_id`='$room_data[id]'");

          if (mysqli_num_rows($img_q) > 0) {
            $active_class = 'active';

            while ($img_res = mysqli_fetch_assoc($img_q)) {
              echo "
            <div class=' carousel-item $active_class'>
              <img src='" . ROOMS_IMG_PATH . $img_res['image'] . "' class='d-block m-auto w-75'>
            </div>
                ";
              $active_class = '';
            }
          } else {
            echo "<div class='carousel-item active'>
               <img src='$room_img' class='d-block w-50'>
              </div>";
          }
          ?>

          <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        </div>
      </div>
    </div>


    <div class="col-lg-5 col-md-12 px-4">
      <div class="card mb-2 border-0 w-75 shadow-sm">
        <div class="card-body">
          <?php
          echo <<<price
              <h6 class="fw-bold text-success text-center">BDT $room_data[price]/night</h6>
              price;

                echo<<<data
                <div class="features mb-3">
                  <h6 class="mb-1 fw-bold">Features</h6>
                   <span class="badge bg-light text-dark text-wrap lh-base">
                    1 Room
                   </span>
                   <span class="badge bg-light text-dark text-wrap lh-base">
                    1 Bathroom
                   </span>
                   <span class="badge bg-light text-dark text-wrap lh-base">
                    1 Balcony
                   </span>
                </div>
              <div class="facilities mb-3">
            <h6 class="fw-bold">Facilities</h6>
            <img class="me-5 ms-2" src="images/facilities/wifi.png" width="20px">
            <img src="images/facilities/tv.png" width="20px">
          </div>
          data;

          echo <<<guests
           <div class="guests">
          <h6 class="mb-1 fw-bold">Guests</h6>
          <span class="badge bg-light text-dark text-wrap lh-base">
            $room_data[adult] Adults
          </span>
          <span class="badge bg-light text-dark text-wrap lh-base">
            $room_data[children] Children
          </span>
          </div>
          guests;

          echo<<<area
            <div class="area">
              <h6 class="mb-1 mt-1 fw-bold">Area</h6>
               <span class="badge bg-light text-dark text-wrap lh-base">
                  $room_data[area] sq.ft
              </span>
            </div>
           area;

                //$login=0;
               //  if(isset($_SESSION['login']) && $_SESSION['login']==true)
              //  {
                //   $login=1;
               //  }

               //  echo<<<book
                 // <button class="btn btn-sm w-100 mt-2 fw-bold text-white ml-5 bg-success shadow-none mb-2">Book Now</button>
               //  book;

              ?>
              <button class="btn btn-sm w-50 mt-2 fw-bold text-white ml-5 bg-success shadow-none mb-2">Book Now</button>
      </div>
    </div>
  </div>
  
  <div class="col-12 px-4 mt-2">
    <div class="mb-4 m-4">
      <h5 class="fw-bold h-font fs-4">Description</h5>
      <p>
        <?php echo $room_data['description'] ?>
      </p>
    </div>

    <!-- <div>reviews and rating</div> -->

  </div>







  <!--Filter Check availability-->
  <!-- <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-0">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid flex-lg-column">
            <h4 class="mt-2 fw-bold h-font">FILTERS</h4>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column mt-2 align-items-stretch" id="filterDropdown">
              <div class="border bg-light p-3 rounded mb-3">
                <h5 class="mb-3 fw-bold h-font" style="font-size: 18px;">Check availability</h5>
                <label class="form-label fw-bold h-font">Check-in</label>
                <input type="date" class="form-control mb-2 ">
                <label class="form-label fw-bold h-font">Check-out</label>
                <input type="date" class="form-control mb-2 ">
              </div>
            </div> -->

  <!--Checkbox for check facilities
              <div class="border bg-light p-3 rounded mb-3">
                <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                <div class="mb-2">
                  <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                  <label class="form-check-label" for="f1">Facility one</label>
                </div>
                <div class="mb-2">
                  <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                  <label class="form-check-label" for="f2">Facility two</label>
                </div>
                <div class="mb-2">
                  <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                  <label class="form-check-label" for="f3">Facility three</label>
                </div>
              </div>

               Checkbox for guests no.- adult & children
              <div class="border bg-light p-3 rounded mb-3">
                <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                <div class="d-flex">
                  <div class="me-3">
                    <label class="form-label">Adults</label>
                    <input type="number" class="form-control shadow-none mb-2 ">
                  </div>
                  <div>
                    <label class="form-label">Children</label>
                    <input type="number" class="form-control shadow-none mb-2 ">
                  </div>
                </div>
              </div>-->

  <!-- </div>

        </nav>
      </div>
    </div> -->




  <!--Rooms details-->
  <!-- <div class="col-lg-9 col-md-12 px-4"> -->

  <?php
  // $room_res=select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?",[1,0],'ii');


  // while($room_data=mysqli_fetch_assoc($room_res))
  // {
  //   //get features of room
  //   //get facilities of room

  //   //get thumbnail of image

  //   $room_thumb=ROOMS_IMG_PATH."thumbnail.jpg";
  //   $thumb_q=mysqli_query($con,"SELECT * FROM `room_image` WHERE `room_id`='$room_data[id]' AND `thumb`=1");

  //   if(mysqli_num_rows($thumb_q)>0)
  //   {
  //     $thumb_res=mysqli_fetch_assoc($thumb_q);
  //     $room_thumb=ROOMS_IMG_PATH.$thumb_res['image'];


  //   }

  //   //print card

  //   echo<<<data
  //       <div class="card mb-4 border-0">
  //         <div class="row g-0 p-3 align-items-center">
  //           <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
  //              <img src="$room_thumb" class="img-fluid rounded">
  //           </div>
  //           <div class="col-md-5 px-lg-3 px-md-3 px-0">
  //              <h5 class="mb-3 fw-bold h-font">$room_data[name]</h5>
  //              <div class="features mb-3">
  //               <h6 class="mb-1 fw-bold">Features</h6>
  //                <span class="badge bg-light text-dark text-wrap lh-base">
  //                 1 Room
  //                </span>
  //                <span class="badge bg-light text-dark text-wrap lh-base">
  //                 1 Bathroom
  //                </span>
  //                <span class="badge bg-light text-dark text-wrap lh-base">
  //                 1 Balcony
  //                </span>
  //             </div>
  //           <div class="facilities mb-3">
  //         <h6 class="fw-bold">Facilities</h6>
  //         <img class="me-5 ms-2" src="images/facilities/wifi.png" width="20px">
  //         <img src="images/facilities/tv.png" width="20px">
  //       </div>

  //       <div class="guests">
  //         <h6 class="mb-1 fw-bold">Guests</h6>
  //         <span class="badge bg-light text-dark text-wrap lh-base">
  //           $room_data[adult] Adults
  //         </span>
  //         <span class="badge bg-light text-dark text-wrap lh-base">
  //           $room_data[children] Children
  //         </span>
  //       </div>
  //     </div>
  //     <div class="col-md-2 text-center"> 
  //       <h6 class="mb-4 text-danger fw-bold">BDT-$room_data[price]/night</h6>
  //       <a href="#" class="btn btn-sm w-100 text-white btn-success mb-2">Book Now</a>
  //       <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 text-white btn-success mb-2">Details</a>
  //        </div>
  //      </div>
  //       </div>


  //   data;



  // }

  ?>


  <!-- <div class="card mb-4 border-0">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <img src="images/rooms/4.jpg" class="img-fluid rounded">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
              <h5 class="mb-3 fw-bold h-font">Regular Suite</h5>
              <div class="features mb-3">
                <h6 class="mb-1 fw-bold">Features</h6>
                <span class="badge bg-light text-dark text-wrap lh-base">
                  1 Room
                </span>
                <span class="badge bg-light text-dark text-wrap lh-base">
                  1 Bathroom
                </span>
                <span class="badge bg-light text-dark text-wrap lh-base">
                  1 Balcony
                </span>
              </div>
              <div class="facilities mb-3">
                <h6 class="fw-bold">Facilities</h6>
                <img class="me-5 ms-2" src="images/facilities/wifi.png" width="20px">
                <img src="images/facilities/tv.png" width="20px">
              </div>
              <div class="guests">
                <h6 class="mb-1 fw-bold">Guests</h6>
                <span class="badge bg-light text-dark text-wrap lh-base">
                  2 Adults
                </span>
                <span class="badge bg-light text-dark text-wrap lh-base">
                  2 Children
                </span>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <h6 class="mb-4 text-danger fw-bold">BDT-3000/night</h6>
              <a href="#" class="btn btn-sm w-100 text-white btn-success mb-2">Book Now</a>
              <a href="#" class="btn btn-sm w-100 text-white btn-success mb-2">Details</a>
            </div>
          </div>
         </div> -->

  <!-- //  <div class="card mb-4 border-0">
        //   <div class="row g-0 p-3 align-items-center">
        //     <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
        //       <img src="images/rooms/2.jpg" class="img-fluid rounded">
        //     </div>
        //     <div class="col-md-5 px-lg-3 px-md-3 px-0">
        //       <h5 class="mb-3 fw-bold h-font">Royal Suite</h5>
        //       <div class="features mb-3">
        //         <h6 class="mb-1 fw-bold">Features</h6>
        //         <span class="badge bg-light text-dark text-wrap lh-base">
        //           1 Room
        //         </span>
        //         <span class="badge bg-light text-dark text-wrap lh-base">
        //           1 Bathroom
        //         </span>
        //         <span class="badge bg-light text-dark text-wrap lh-base">
        //           1 Balcony
        //         </span>
        //       </div>
        //       <div class="facilities mb-3">
        //         <h6 class="fw-bold">Facilities</h6>
        //         <img class="me-5 ms-2" src="images/facilities/wifi.png" width="20px">
        //         <img class="me-5 ms-2" src="images/facilities/ac.png" width="20px">
        //         <img class="me-5 ms-2" src="images/facilities/tv.png" width="20px">
        //       </div>
        //       <div class="guests">
        //         <h6 class="mb-1 fw-bold">Guests</h6>
        //         <span class="badge bg-light text-dark text-wrap lh-base">
        //           3 Adults
        //         </span>
        //         <span class="badge bg-light text-dark text-wrap lh-base">
        //           3 Children
        //         </span>
        //       </div>
        //     </div>
        //     <div class="col-md-2 text-center">
        //       <h6 class="mb-4 text-danger fw-bold">BDT-5000/night</h6>
        //       <a href="#" class="btn btn-sm w-100 text-white btn-success mb-2">Book Now</a>
        //       <a href="#" class="btn btn-sm w-100 text-white btn-success mb-2">Details</a>
        //     </div>
        //   </div>
        //  </div>

        //  <div class="card mb-4 border-0">
        //   <div class="row g-0 p-3 align-items-center">
        //     <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
        //       <img src="images/rooms/3.jpg" class="img-fluid rounded">
        //     </div>
        //     <div class="col-md-5 px-lg-3 px-md-3 px-0">
        //       <h5 class="mb-3 fw-bold h-font">Presidential Suite</h5>
        //       <div class="features mb-3">
        //         <h6 class="mb-1 fw-bold">Features</h6>
        //         <span class="badge bg-light text-dark text-wrap lh-base">
        //           1 Room
        //         </span>
        //         <span class="badge bg-light text-dark text-wrap lh-base">
        //           1 Bathroom
        //         </span>
        //         <span class="badge bg-light text-dark text-wrap lh-base">
        //           1 Balcony
        //         </span>
        //       </div>
        //       <div class="facilities mb-3">
        //         <h6 class="fw-bold">Facilities</h6>
        //         <img class="me-5 ms-2" src="images/facilities/wifi.png" width="20px">
        //         <img class="me-5 ms-2" src="images/facilities/ac.png" width="20px">
        //         <img class="me-5 ms-2" src="images/facilities/tv.png" width="20px">
        //         <img class="me-5" src="images/facilities/service.png" width="20px">
        //       </div>
        //       <div class="guests">
        //         <h6 class="mb-1 fw-bold">Guests</h6>
        //         <span class="badge bg-light text-dark text-wrap lh-base">
        //           4 Adults
        //         </span>
        //         <span class="badge bg-light text-dark text-wrap lh-base">
        //           4 Children
        //         </span>
        //       </div>
        //     </div>
        //     <div class="col-md-2 text-center">
        //       <h6 class="mb-4 text-danger fw-bold">BDT-10000/night</h6>
        //       <a href="#" class="btn btn-sm w-100 text-white btn-success mb-2">Book Now</a>
        //       <a href="#" class="btn btn-sm w-100 text-white btn-success mb-2">Details</a>
        //     </div>
        //   </div>
        //  </div> -->

  <!-- </div> -->


  <!--footer.php included with index.php-->
  <?php
  require('inc/footer.php')
  ?>


</body>

</html>