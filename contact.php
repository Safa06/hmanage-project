
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Serene-Contact Page</title>

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


  <!--Contact us file-->

  <h2 class="mt-5 pt-4 mb-4 fw-bold h-font m-5">Connect with us</h2>
  <div class="conatiner">
    <div class="row">
      <div class="col-lg-7  col-md-6  px-4">
        <div class="bg-white p-4">
          <form method="POST">
            <div>
              <label class="form-label fw-bold h-font fs-5" style="font-weight:500;">Name</label>
              <input name="name" required type="text" class="form-control shadow-none">
            </div>
            <div class="mt-3">
              <label class="form-label fw-bold h-font fs-5" style="font-weight:500;">Email</label>
              <input name="email" required type="email" class="form-control shadow-none">
            </div>
            <div class="mt-3">
              <label class="form-label fw-bold h-font fs-5" style="font-weight:500;">Message</label>
              <textarea name="message" required class="form-control" rows="6"></textarea>
              <button name="send" type="submit" class="btn text-white btn-success fw-bold h-font w-50 mt-3">Send your message</button>
            </div>
          </form>
        </div>
      </div>




      <!--address-->
      <?php
      $contact_q = "SELECT * FROM `contact` WHERE `sr_no`=?";
      $values = [1];
      $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
      ?>

      <div class="col-lg-5 col-md-6 p-4 mb-lg-0 mb-3">
        <h5 class="fw-bold h-font">Address</h5>
        <a href="https://goo.gl/maps/pwogMgywFQVTFpL9A" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
          <?php echo $contact_r['address'] ?>
        </a>
        <h5 class="mt-2 fw-bold h-font">Phone : </h5>
        <a href="tel: +<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
          +<?php echo $contact_r['pn1'] ?>
        </a><br>
        <a href="tel: +<?php echo $contact_r['pn2'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark ">
          +<?php echo $contact_r['pn2'] ?>
        </a>

        <h5 class="mt-2 fw-bold h-font">Email</h5>
        <a href="+<?php echo $contact_r['email'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
          <?php echo $contact_r['email'] ?>
        </a>
      </div>
    </div>
  </div>


  <!--map-->

  <div class="conatiner">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3">
        <iframe width="1500px" height="450px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233668.38703802988!2d90.27923923029098!3d23.780573257422212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1657606616369!5m2!1sen!2sbd" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>

  <!-- <h5 class="fw-bold h-font">Address</h5>
  <a href="https://goo.gl/maps/pwogMgywFQVTFpL9A" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
    Dhaka Office (Main Branch) : House #67, Road #7, Motijheel, Dhaka-1213
  </a>
  <h5 class="mt-2 fw-bold h-font">Phone : </h5>
  <a href="tel: +88027251982" class="d-inline-block mb-2 text-decoration-none text-dark">
    +88027251982
  </a><br>
  <a href="tel: +88027251982" class="d-inline-block mb-2 text-decoration-none text-dark ">
    +88027251982
  </a>

  <h5 class="mt-2 fw-bold h-font">Email</h5>
  <a href="mail:support.hotelserene@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark">
    support.hotelserene@gmail.com
  </a> -->


  <?php

  if (isset($_POST['send'])) {
    $frm_data = filteration($_POST);
    $q = "INSERT INTO `user_queries`(`name`, `email`, `message`) VALUES (?,?,?)";
    $values = [$frm_data['name'], $frm_data['email'], $frm_data['message']];
    $res = insert($q, $values, 'sss');

    if ($res == 1) {
      alert('success', 'Thanks for connecting with us !');
    } else {
      alert('danger', 'Sorry! Try again');
    }
  }
  ?>






  <!--footer.php included with index.php-->
  <?php
  require('inc/footer.php')
  ?>


</body>

</html>