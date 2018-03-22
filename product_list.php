<?php 
//get items from database to display
// Connect to the MySQL database  
include "storescripts/connect_to_mysql.php"; 
if($sql = $udit->query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6")){
}
$udit->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<title>Product list</title>
<style>

@media (max-width: 1280px)
.wrap {
    width: 90%;
}
@media (max-width: 1366px)
.wrap {
    width: 90%;
}
.wrap {
    width: 80%;
    margin: 0 auto;
    -moz-transition: all .2s linear;
    -webkit-transition: all .2s linear;
    -o-transition: all .2s linear;
    -ms-transition: all .2s linear;
}
.col_1_of_3:first-child {
    margin-left: 0;
}
@media (max-width: 1280px)
.span_1_of_3 {
    width: 29.5%;
}
@media (max-width: 1366px)
.span_1_of_3 {
    width: 29.5%;
}

.span_1_of_3 {
    width: 30.7%;
    border: 1px solid #DDD;
}

.col_1_of_3 {
    display: block;
    float: left;
    margin: 1% 0 1% 3.6%;
}
.view {
    overflow: hidden;
    position: relative;
}
.top_box {
    padding: 6%;
}
h3.m_1 {
    color: #555;
    font-size: 0.9em;
    text-transform: uppercase;
    font-weight: 500;
}
p.m_2 {
    color: #999;
    font-size: 0.8125em;
}
.top_box .css3 img {
    -webkit-transition-duration: 0.5s;
    -moz-transition-duration: 0.5s;
    -o-transition-duration: 0.5s;
}
.view-fifth img {
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
img {
    max-width: 100%;
}
.price {
    color: #555;
    font-size: 1.4em;
    font-weight: 700;
}
.clear {
    clear: both;
}
.view_details{
	background-color: black;
	color: white;
	height: 35px; 
	text-align:center;	
}
.child{
	padding-top: 8px;
}
.bhai{
  padding: 10px;
  border-radius: 10px;
  margin-top: 15px;
}
</style>
</head>

<body>


 <nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    <a class="navbar-brand" href="index.php">Chaaya's Magical box</a>
    </div>
    <div class="collapse navbar-collapse" id="topFixedNavbar1">
    <ul class="nav navbar-nav navbar-right">
    <li class="active"><a href="index.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" role="button" aria-haspopup="true" area-expanded="false" data-toggle="dropdown" href="#">Products<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="product_list.php">Arts&ampcraft;</a></li>
          <li><a href="product_list.php">Student projects</a></li>
          <li><a href="product_list.php">Canvas paintings</a></li>
        </ul>
      </li>
      <li><a href="about.html">About us</a></li> 
      <li><a href="#">Contact us</a></li> 
    </ul>
    </div>
  </div>
</nav>
<hr />


<div><!--color-->
  <br><br>
	<div class="container-fluid"> 
		<div class="space"></div>
		<div class="row">
			<?php while($prod=$sql->fetch_assoc()): ?>
			<div class="col-md-3" style="color: black;">
				<div class="bhai">
				
				<a href="product.php?id=<?php echo $prod['id']; ?>"><img src="inventory_images/<?php echo $prod['id']; ?>.jpg" height="400px" width="280px"></a>
<div style="border: 2px solid lightgrey;padding: 10px;">
				<h3 class="prod text-center">Name:-<?php echo $prod['product_name']; ?></h3>
<h4 style="padding: 10px;"><?php echo $prod['price']; ?></h4>
</div>
			</div>
			</div>
<?php endwhile; ?>
		</div>
	</div>
	<div class="space"></div>
	<div class="space"></div>
</div>

			

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

</body>
</html>