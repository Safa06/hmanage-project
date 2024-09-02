<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Serene-Facilities Page</title>

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


    <!--Facilities-SVG(Scalable Vector Graphics-->
    <h2 class="mt-3 pt-3 mb-2 fw-bold h-font m-5">Facilities</h2>
    <div class="container">
      <div class="row">

      <?php
      $res=selectAll('facilities');
      $path=FACILITIES_IMG_PATH;

      while($row=mysqli_fetch_assoc($res))
      {
        echo<<<data
        <div class="col-lg-4 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="$path$row[icon]" width="30px">
              <h5 class="m-0 ms-3">$row[name]</h5>
            </div>
            <p>
              $row[description]
            </p>
          </div>
        </div>
        data;

      }


      ?>
        <!-- <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/tv.png" width="40px">
              <h5 class="m-0 ms-3">LED Television</h5>
            </div>
            <p>
              LED television is available where you can watch any program over 100+ channels as your wish!
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/wifi.png" width="40px">
              <h5 class="m-0 ms-3">Wifi</h5>
            </div>
            <p>
              High speed internet connection is applicable for all over the hotel surroundings.
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/pool.png" width="40px">
              <h5 class="m-0 ms-3">Swimming Pool</h5>
            </div>
            <p>
              There is a swimming pool where customer can enjoy their free time with enough facilities
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/gym.png" width="40px">
              <h5 class="m-0 ms-3">Fitness Center</h5>
            </div>
            <p>
              A fitness center is here with enough instrument to make you fit and healthy
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/doctor.jfif" width="40px">
              <h5 class="m-0 ms-3">Doctor on call</h5>
            </div>
            <p>
              For any treatment doctor on call is available for 24 hours where you will find proper treatment
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/service.png" width="40px">
              <h5 class="m-0 ms-3">Room service</h5>
            </div>
            <p>
              For any needs of our customers, 24 hours room service is available
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/shop2.png" width="40px">
              <h5 class="m-0 ms-3">Shop</h5>
            </div>
            <p>
              In our ground floor there is a shop where you can find any neccesary items as you needs
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/restaurant.png" width="40px">
              <h5 class="m-0 ms-3">Restaurant</h5>
            </div>
            <p>
              There is a fascinated restaurant for our customers where you can order any foods
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/transport.png" width="40px">
              <h5 class="m-0 ms-3">Transportation</h5>
            </div>
            <p>
              For any needs of transport, there is a scope to manage transport from hotel
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/saloon.png" width="40px">
              <h5 class="m-0 ms-3">Salon</h5>
            </div>
            <p>
              Beauty hacks are important so there is a salon for customers needs in the ground floor
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/parking.jfif" width="40px">
              <h5 class="m-0 ms-3">Car Parking</h5>
            </div>
            <p>
              A parking slot is here for parking customer's car with enough safety
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 px-4">
          <div class="bg-white shadow border-info border-bottom border-4 p-4">
            <div class="d-flex align-items-center mb-2">
              <img src="images/facilities/ac.png" width="40px">
              <h5 class="m-0 ms-3">Central AC</h5>
            </div>
            <p>
              Central AC is there overall the hotel for the fullfilments of customets' refreshment
            </p>
          </div>
        </div> 
      </div>-->
    </div>


  </div>

  <!--footer.php included with index.php-->
  <?php
  require('inc/footer.php')
  ?>


</body>

</html>