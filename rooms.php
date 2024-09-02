<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Serene-Rooms Page</title>

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


  <!--Rooms file-->

  <h2 class="mt-3 pt-4 mb-4 fw-bold h-font m-5">Rooms & Suites</h2>
  
  <!--Filter Check availability-->
  <div class="container">
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
                <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                <label class="form-label">Check-in</label>
                <input type="date" class="form-control mb-2 ">
                <label class="form-label">Check-out</label>
                <input type="date" class="form-control mb-2 ">
              </div>

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

            </div>
          </div>
        </nav>
      </div>




         <!--Rooms details-->
      <div class="col-lg-9 col-md-12 px-4">

      <?php 
      $room_res=select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?",[1,0],'ii');

      while($room_data=mysqli_fetch_assoc($room_res))
      {
        //get features of room
//         $fea_q=mysqli_query($con,"SELECT f.name FROM `features` f INNER JOIN `room_features` rfea ON f.id = r.fea.features_id 
//         WHERE rfea.room_id='$room_data[id]'");

// $features_data="";
//         while($fea_row=mysqli_fetch_assoc($fea_q))
//         {
// $feature$fea_row[name]";

//         }


        //get facilities of room

        //get thumbnail of image

        $room_thumb=ROOMS_IMG_PATH."thumbnail.jpg";
        $thumb_q=mysqli_query($con,"SELECT * FROM `room_image` WHERE `room_id`='$room_data[id]' AND `thumb`=1");

        if(mysqli_num_rows($thumb_q)>0)
        {
          $thumb_res=mysqli_fetch_assoc($thumb_q);
          $room_thumb=ROOMS_IMG_PATH.$thumb_res['image'];


        }

        
        // $book_btn="";
        // if(isset($_SESSION['login']) && $_SESSION['login']==true)
        // {
        //   $login=1;
        // }
       
        //   $book_btn="<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm w-100 text-white mb-2'>Book Now</button>";
        

        //print card

        echo<<<data
            <div class="card mb-4 border-0">
              <div class="row g-0 p-3 align-items-center">
                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                   <img src="$room_thumb" class="img-fluid rounded">
                </div>
                <div class="col-md-5 px-lg-3 px-md-3 px-0">
                   <h5 class="mb-3 fw-bold h-font">$room_data[name]</h5>
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
                $room_data[adult] Adults
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base">
                $room_data[children] Children
              </span>
            </div>
          </div>
          <div class="col-md-2 text-center"> 
            <h6 class="mb-4 text-danger fw-bold">BDT-$room_data[price]/night</h6>
            <a href="#" class="btn btn-sm w-100 text-white btn-success mb-2">Book Now</a>
            <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 text-white btn-success mb-2">Details</a>
             </div>
           </div>
            </div>


        data;



      }
      // $book_btn="";
      //   if(isset($_SESSION['login']) && $_SESSION['login']==true)
      //   {
      //     $login=1;
      //   }
       
      //     $book_btn="<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm w-100 text-white mb-2'>Book Now</button>";
        

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
      </div>
    </div>
  </div>

  <!--footer.php included with index.php-->
  <?php
  require('inc/footer.php')
  ?>


</body>

</html>