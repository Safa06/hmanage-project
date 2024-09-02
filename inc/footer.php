

<!--footer.php connect for all page-->

<!--Footer-->

<?php
$contact_q="SELECT * FROM `contact` WHERE `sr_no`=?";
$values=[1];
$contact_r=mysqli_fetch_assoc(select($contact_q,$values,'i'));
?>

<div class="container-fluid mt-3 p-3 bg-dark">
    <div class="row">
        <div class="col-lg-4 p-5">
            <h3 class="h-font fw-bold fs-3 mb-2 text-white">Hotel Serene|Luxury with serenity</h3>
            <p class="text-white"><?php echo $contact_r['address']?></p>
            <p class="text-white">Cox's Bazar Office : Plot - 7, Road - 02, Hotel Motel Zone, Kolatoly Road, Cox's Bazar</p>
            <p class="text-white">Chittagong Office : 206/217, Jamal Khan Road, Pacific Tower (2nd Floor), Chittagong</p>

        </div>
        <div class="col-lg-4 col-md-4">
            <div class="p-5 mb-3">
                <h5 class="mb-3 fs-3 fw-bold h-font text-white">Links</h5>

                <ul class="list-inline mb-2">
                    <li>
                        <a href="index.php" class="list-inline-item text-decoration-none text-white">Home  | </a>
                        <a href="rooms.php" class="list-inline-item text-decoration-none text-white">Room  | </a>
                        <a href="facilities.php" class="list-inline-item text-decoration-none text-white">Facilities  | </a>
                        <a href="contact.php" class="list-inline-item text-decoration-none text-white">Contact  | </a>
                        <a href="about.php" class="list-inline-item text-decoration-none text-white">About</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="p-5 mb-4">
                <h5 class="fw-bold h-font fs-3 text-white">Phone:</h5>
                <a href="tel: +<?php echo $contact_r['pn1']?>" class="d-inline-block text-white  mb-2 text-decoration-none">
                    +<?php echo $contact_r['pn1']?></a><br>
                <a href="tel: +<?php echo $contact_r['pn2']?>" class="d-inline-block text-white mb-2 text-decoration-none">
                    +<?php echo $contact_r['pn2']?></a><br>
                
                <h5 class="mt-4 fw-bold h-font fs-3 text-white">Email</h5>
                <a href="mail: +<?php echo $contact_r['email']?>" class="d-inline-block mb-2 text-decoration-none">
                    <?php echo $contact_r['email']?>
                </a>
            </div>
        </div>


    </div>
</div>


<!--Designed & developed by-->
<h6 class="text-center bg-secondary text-white p-3 m-0">Designed & developed by hotel-serene-authority <span>&copy 2022 All rights reserved <img src="images/logo.jfif" width="50" height="40"></span></h6>

<!--link bootstrap5 with file-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

function alert (type,msg)
    {
        let bs_class=(type == 'success')? 'alert-success':'alert-danger';
        let element=document.createElement('div');
        element.innerHTML =
        ` 
        <div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">${msg}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;

        
            document.body.append(element);
            

        
    }


    let register_form=document.getElementById('register-form');

    register_form.addEventListener('submit',(e)=>
    {
        e.preventDefault();

        let data = new FormData();
        data.append('name',register_form.elements['name'].value);
        data.append('email',register_form.elements['email'].value);
        data.append('phonenum',register_form.elements['phonenum'].value);
        data.append('address',register_form.elements['address'].value);
        data.append('pincode',register_form.elements['pincode'].value);
        data.append('dob',register_form.elements['dob'].value);
        data.append('pass',register_form.elements['pass'].value);
        data.append('cpass',register_form.elements['cpass'].value);
        data.append('profile',register_form.elements['profile'].files[0]);
        data.append('register','');

        // hide modal

        var myModal=document.getElementById('registerModal');
        var modal=bootstrap.Modal.getInstance(myModal);
        modal.hide();



        let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/login_register.php", true);
            
            xhr.onload = function() {
                if(this.responseText=='pass_mismatch')
                {
                    alert('error',"Wrong password");
                }
                else if(this.responseText=='email_already')
                {
                    alert('error',"Already registered email");
                }
                else if(this.responseText=='phone_already')
                {
                    alert('error',"Already registered phone number");
                }
                else if(this.responseText=='inv_img')
                {
                    alert('error',"Only JPG,WEBP,PNG images allowed");
                }
                else if(this.responseText=='upd_failed')
                {
                    alert('error',"Upload failed");
                }
                else if(this.responseText=='mail_failed')
                {
                    alert('error',"Email send failed");
                }
                else if(this.responseText=='ins_failed')
                {
                    alert('error',"Registry failed");
                }
                else
                {
                    alert('success',"Confirmation mail sent");
                    register_form.reset();
                }
            }


            xhr.send(data);

    });



    let login_form=document.getElementById('login-form');
    login_form.addEventListener('submit',(e)=>
    {
        e.preventDefault();

        let data = new FormData();
        data.append('email_mob',login_form.elements['email_mob'].value);
        data.append('pass',login_form.elements['pass'].value);
        data.append('login','');        

        // hide modal

        var myModal=document.getElementById('loginModal');
        var modal=bootstrap.Modal.getInstance(myModal);
        modal.hide();



        let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/login_register.php", true);
            
            xhr.onload = function() {
                if(this.responseText=='inv_email_mob')
                {
                    alert('error',"Wrong mail or phone number");
                }
                else if(this.responseText=='not_verified')
                {
                    alert('error',"No verified email");
                }
                else if(this.responseText=='inactive')
                {
                    alert('error',"Contact admin");
                }
                else if(this.responseText=='invalid_pass')
                {
                    alert('error',"Wrong password");
                }
                
                else
                {
                    let fileurl=window.location.href.split('/').pop().split('?').shift();
                    if(fileurl=='room_details.php')
                    {
                        window.location=window.location.href;
                    }
                    else{
                        window.location=window.location.pathname;

                    }
                    
                }
            }


            xhr.send(data);

    });



    let forgot_form=document.getElementById('forgot-form');
    forgot_form.addEventListener('submit',(e)=>
    {
        e.preventDefault();

        let data = new FormData();
        data.append('email',forgot_form.elements['email'].value);
        data.append('forgot_pass','');        

        // hide modal

        var myModal=document.getElementById('forgotModal');
        var modal=bootstrap.Modal.getInstance(myModal);
        modal.hide();



        let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/login_register.php", true);
            
            xhr.onload = function() {
                if(this.responseText=='inv_email')
                {
                    alert('error',"Wrong mail");
                }
                else if(this.responseText=='not_verified')
                {
                    alert('error',"No verified email");
                }
                else if(this.responseText=='inactive')
                {
                    alert('error',"Contact admin");
                }
                else if(this.responseText=='mail_failed')
                {
                    alert('error',"Can't send email");
                }
                else if(this.responseText=='upd_failed')
                {
                    alert('error',"Account recovery failed");
                }
                
                else
                {
                    alert('success',"Reset link sent");
                    forgot_form.reset();
                }
            }


            xhr.send(data);

    });


    function checkLoginToBook(status,room_id)
    {
        if(status)
        {
            window.location.href='confirm_booking.php?id='+room_id;
        }
        else
        {
            alert('error','Login to book room');
        }
    }


</script>
