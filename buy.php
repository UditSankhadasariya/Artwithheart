<?php 
// if not manager go to admin login
session_start();
if (!isset($_SESSION["user"])) {
    echo "<script>alert('Plzz Login/Register to order a product')</script>";
    echo "<script>window.open('sign_up.php','_self')</script>"; 
    exit();
}
?>
<?php
include "storescripts/connect_to_mysql.php";
if(isset($_POST['first_name'])){
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $landmark = $_POST['landmark'];
  $mobile = $_POST['mobile'];
  $anumber = $_POST['alt_number'];

  if($sql = $udit->query("INSERT INTO customer (first_name,last_name,city,state,zip,landmark,mobile,a_mobile) VALUES ('$fname','$lname','$city','$state','$zip','$landmark','$mobile','$anumber')")){
    echo "<script>alert('Thank you for shopping with us')</script>";
     echo "<script>window.open('index.php','_self')</script>";

  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    
<title>Art with heart</title>
<style>
nav{
  background-color:black;
    
}
.navbar-nav .dropdown-menu{
  background-color: black;
  color: white; 
}
.dropdown-menu .dropdown-item{
  color:white;  
}
.footer {
  background: #EDEFF1;
  height: auto;
  padding-bottom: 30px;
  position: relative;
  width: 100%;
  border-bottom: 1px solid #CCCCCC;
  border-top: 1px solid #DDDDDD;
}
.footer-bottom {
  background: #E3E3E3;
  border-top: 1px solid #DDDDDD;
  padding-top: 10px;
  padding-bottom: 10px;
}
.footer-bottom p.pull-left {
  padding-top: 6px;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    
        <a class="navbar-brand" href="index.php">Chayya's Magical box</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a href="about.html" class="nav-link">About us</a></li>
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="canvas.php">Canvas Paintings</a>
          <a class="dropdown-item" href="science.php">Science models for projects</a>
          <a class="dropdown-item" href="handicraft.php">Handicrafts</a>
        </div>
      </li>
                <li class="nav-item"><a href="cart.php" class="nav-link">My Cart</a></li>
                
            </ul>
            
            <?php

              if(isset($_SESSION['user'])){
                echo "<ul class='nav navbar-nav flex-row justify-content-between ml-auto'>
                <li class='nav-item order-2 order-md-1'><a href='#' class='nav-link' title='settings'><i class='fa fa-cog fa-fw fa-lg'></i></a></li>
                <li class='nav-item'><a href='sign_up.php' class='nav-link'>Hello  <b>" . $_SESSION['user'] . "</b></a></li>
                <li class='nav-item'><a href='logout.php' class='nav-link'><b>Logout</b></a></li>
                
            </ul>
       ";
              }else{

                echo "<ul class='nav navbar-nav flex-row justify-content-between ml-auto'>
                <li class='nav-item order-2 order-md-1'><a href='#' class='nav-link' title='settings'><i class='fa fa-cog fa-fw fa-lg'></i></a></li>
                <li class='nav-item' style='color:rgba(255,255,255,.5);;padding: 7px;'>Welcome Guest -></li>
                <li class='nav-item'><a href='sign_up.php' class='nav-link'>Register</a></li>
                <li class='dropdown order-1'>
                    <button type='button' id='dropdownMenu1' data-toggle='dropdown' class='btn btn-outline-secondary dropdown-toggle'>Login <span class='caret'></span></button>
                    <ul class='dropdown-menu dropdown-menu-right mt-1'>
                      <li class='p-3'>
                            <form class='form' method='post' action='login.php' enctype='multipart/form-data' role='form'>
                                <div class='form-group'>
                                    <input id='emailInput' placeholder='Email' class='form-control form-control-sm' name='email' type='text' required=''>
                                </div>
                                <div class='form-group'>
                                    <input id='passwordInput' placeholder='Password' class='form-control form-control-sm' name='pass' type='text' required=''>
                                </div>
                                <div class='form-group'>
                                    <button type='submit' name='register' class='btn btn-primary btn-block'>Login</button>
                                </div>
                                <div class='form-group text-xs-center'>
                                    <small><a href='#'>Forgot password?</a></small>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
       ";

              }
              ?>



    </div>
</nav>

<h2 style="margin-top: 60px;text-align: center;">Fill in your details</h2>
<form class="container" action="buy.php" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">First name</label>
      <input type="text" class="form-control"  id="validationCustom01" name="first_name" value="<?php echo $_SESSION['user']; ?>"  required>
    <span style="color: red;" id="ustatus"></span>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Last name</label>
      <input type="text" class="form-control" id="validationCustom02" name="last_name" value="<?php echo $_SESSION['luser']; ?>" required>
    </div>
  </div>
 <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">City</label>
      <input type="text" class="form-control" id="validationCustom03" name="city" placeholder="City" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">State</label>
      <input type="text" class="form-control" id="validationCustom04" name="state" placeholder="State" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Zip</label>
      <input type="text" class="form-control" id="validationCustom05" pattern="[0-9]{5}" name="zip" placeholder="Zip" required>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
     </div>
     <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom06">Landmark</label>
      <input type="text" class="form-control" id="validationCustom06" name="landmark" placeholder="Landmark" required>
      <div class="invalid-feedback">
        Please provide a landmark area.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom07">Mobile-number</label>
      <input type="text" class="form-control" id="validationCustom07" pattern="[0-9]{10}" name="mobile" placeholder="Mobile-number" required>
      <div class="invalid-feedback">
        Please provide a valid mobile number.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom08">Alternate mobile-no.</label>
      <input type="text" class="form-control" id="validationCustom08" name="alt_number" placeholder="Alternate mobile-number" >
    </div>
    </div>
  <button class="btn btn-primary text-center" type="submit">Submit form</button>
</form>






<br><br><br>





<footer>
<div class="footer-bottom" style="background: black;color: white;">
<div class="container text-center">
<p class="pull-left"> Copyright© All right reserved. </p>
</div>
</div>
</footer>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  "use strict";
  window.addEventListener("load", function() {
    var form = document.getElementById("needs-validation");
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    }, false);
  }, false);
}());
</script>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
