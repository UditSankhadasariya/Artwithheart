<?php 
//get items from database to display
// Connect to the MySQL database  
include "storescripts/connect_to_mysql.php"; 
if($sql = $udit->query("SELECT * FROM canvas ORDER BY date_added DESC LIMIT 6")){
}
$udit->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
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
.bhai{
  padding: 10px;
  border-radius: 10px;
  margin-top: 15px;
}
@media screen and (min-width:380px) and (max-width:414px){
  img {
  width: 360px;
}
}
@media screen and (min-width: 321px) and (max-width:380px){
    img {
      width: 310px;
    }
}
@media screen and (max-width:321px){
    img {
      width: 270px;
    }
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

<h1 style="text-align: center;margin-top: 77px">Canvas paintings</h1>

<hr />


<div><!--color-->

  <div class="container-fluid"> 
    <div class="space"></div>
    <div class="row">
      <?php while($prod=$sql->fetch_assoc()): ?>
      <div class="col-md-3" style="color: black;">
        <div class="bhai">
        
        <a href="cproduct.php?id=<?php echo $prod['id']; ?>"><img src="inventory_images/canvas/<?php echo $prod['id']; ?>.jpg" height="380px" width="263px"></a>
<div style="border: 2px solid lightgrey;padding: 10px;">
        <h5 class="prod text-center"><?php echo $prod['product_name']; ?></h5>
<p class="text-center">Price:- <b>&#8377;<?php echo $prod['price']; ?></b></p>
<a href="buy.php"><button class="btn btn-primary" style="text-align: center;">Buy now</button></a>

</div>
      </div>
      </div>
<?php endwhile; ?>
    </div>
  </div>
  <div class="space"></div>
  <div class="space"></div>
</div>







<footer>
<div class="footer-bottom" style="background: black;color: white;">
<div class="container text-center">
<p class="pull-left"> CopyrightÃÂÃÂ© All right reserved. </p>
</div>
</div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>