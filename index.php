<?php 
session_start();
//get items from database to display
// Connect to the MySQL database  
include "storescripts/connect_to_mysql.php"; 
if($sql = $udit->query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6")){
}
$udit->close();
?>
<?php

if(isset($_POST['register'])){
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  if($sql = $udit->query("SELECT * FROM user WHERE email='$email' AND password='$pass'")){
    if($rows=$sql->num_rows){
      if($rows=1){
        $_SESSION['mail'] = $email;
        header("location: index.php");
      }else{
        echo "galat";
      }
    }
  }
}

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
    
<div id="myCarousel" class="carousel slide bg-inverse ml-auto mr-auto" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img src="udit.jpg" alt="First slide" style="width: 100%;">
    </div>
    <div class="carousel-item">
      <img src="okay.jpg" alt="Second slide" style="width:100%;">
    </div>
    <div class="carousel-item">
      <img src="god.jpg" alt="Third slide" style="width: 100%;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
    
<div style="background: #272c2e;"><!-- for color -->
  <br><br>
<h3 style=" text-align: center;color: white;">Why choose us..!!</h3>
<div class="container" style="padding: 20px;">
  <div class="row">
    <div class="col-md-4 col-sm-4 text-center">
        <div class="bhai" style="background: white;">
          <div><img src="bullet.jpg" height="25px" width="25px" class="bullet"></div>
        <h3 style="color: blue;">Personalized artworks</h3>
        <p class="para">With your interests in mind,we are here to create almost any form of art & craft product that will meet your needs and thoughts.All you have to do is let us know about your idea and a beautiful piece of artwork awaits you.!! 
</p>
<a href="req.php"><button class="btn btn-primary">Place a request</button></a>
    </div>
  </div>
    <div class="col-md-4 col-sm-4 text-center">
        <div class="bhai" style="background: white;">
        <div><img src="bullet.jpg" height="25px" width="25px" class="bullet"></div>
        <h3 style="color: brown;">24/7 Availability</h3>
        <p class="para">We are open to hear about creative ideas and bring innovative products on our online portal.Feel free to get in touch if you want your artworks to have an online presence and reach out to many more people out there in the market.
</p>

    </div>
    </div>
    <div class="col-md-4 col-sm-4 text-center">
        <div class="bhai" style="background: white;">
        <div><img src="bullet.jpg" height="25px" width="25px" class="bullet"></div>
        <h3 style="color: orange;">The personal touch</h3>
        <p class="para">Each and every form of artwork on our website, will have a handmade touch of a person who has been in this art industry for about 20 years.Customer satisfaction is the Golden rule we follow which has helped us reach this platform.
</p>
</div>
    </div>

  </div>

</div>
</div>
<div style="background: #d3e0ed;"><!--color-->
  <br><br>
  <div class="container-fluid"> 
    <h1 class="text-center">Featured products.....</h1>
    <div class="space"></div>
    <div class="row">
      <?php while($prod=$sql->fetch_assoc()): ?>
      <div class="col-md-3">
        <div class="bhai" style="background: #f2f5f7;border: solid 2px #8f9fcf;">
        <h3 class="prod text-center"><?php echo $prod['product_name']; ?></h3>
        <a href="product.php?id=<?php echo $prod['id']; ?>"><img src="inventory_images/<?php echo $prod['id']; ?>.jpg" height="380px" width="263px"></a>
        <h4><?php echo $prod['price']; ?></h4>
        <a href="cart_add.php?cart_id=<?php echo $prod['id']; ?>"><div class="view_details">Add to Cart</div></a>

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