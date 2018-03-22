<?php 
session_start();
//get items from database to display
// Connect to the MySQL database  
include "storescripts/connect_to_mysql.php"; 
if($sql = $udit->query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6")){
}
$udit->close();
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Art With Heart</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  
      <link rel="stylesheet" href="css/style.css">

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

.bhai{
  border: 2px solid #DFDFDF;
  padding: 10px;
  border-radius: 10px;
}
.para{
    text-align: justify;
    font-size: 13px;
    padding-bottom: 10px;
}
@media screen and (max-width:321px){
    .bhai{
      margin-bottom: 10px;
    }
    img {
      width: 260px;
    }

    .bullet{
      width: 25px;
    }
}
@media screen and (min-width: 321px) and (max-width:380px){
    .bhai{
      margin-bottom: 10px;
    }
    img {
      width: 310px;
    }
    .bullet{
      width: 25px;
    }
}
@media screen and (min-width:380px) and (max-width:414px){
  .bhai{
    margin-bottom: 10px;
  }
  img {
  width: 350px;
}

    .bullet{
      width: 25px;
    }
}
.space{
  margin-top: 50px;
}

</style>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    
        <a class="navbar-brand" href="index.php">Chayya's Magical box</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a href="about.php" class="nav-link">About us</a></li>
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
                <li class='nav-item'><a href='#' class='nav-link'>Hello  <b>" . $_SESSION['user'] . "</b></a></li>
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

<br><br>

<div class="container-fluid">
    
<p style="margin-top: 70px;"> Hi there! I am chhaya , just a normal individual with a passion for creativity which is what makes me happy. I truly believe in the transformative power of illustration and design as is evident from the tonal style and simplicity of the paintings and art pieces put up right on the website. The thoughts that I have in my mind are condensed into a beautiful piece of artwork which led to the creation of this magical art box. This magical box has to offer a wide variety of products right from canvas paintings that could be hung up on the wall to school projects and working educational models for all the little young adults out there struggling to get done with all the workload they are burdened with (damn the schools these days ).
So , me along with a team of three other individuals (), who have helped me expand the reach of my artwork all the way fromÂ  just a bunch of people in a locality to a million more people who are interested in buying the products I offer via creating this website and taking my work on an online platform.
Wanting your work to reach out to a million more people  ? Expand the capability of your artwork  ?
Talk to us today and let your work be a part of our family.
If you Are interested in contributing to CMB , please feel free to contact us.</p>

<br><br><br><br>


</div>


<footer>
    <div class="footer-bottom" style="background: black;color: white;">
        <div class="container text-center">
            <p class="pull-left"> CopyrightÂ© All right reserved. </p>
            
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>
<script>
// Initialize tooltip component
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// Initialize popover component
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script  src="js/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>