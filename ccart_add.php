<?php 
//error reporting(put this in every php code to check for any error)
error_reporting(E_ALL);
ini_set('display_errors','1');
?>
<?php

 function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

include "storescripts/connect_to_mysql.php";
if(isset($_GET['cart_id'])){
	$pid = $_GET['cart_id'];
	$ip = getIp();

        if($data = $udit->query("SELECT * FROM canvas WHERE id='$pid'")){
            if($row = $data->fetch_assoc()){
                $name = $row['product_name'];
                $price = $row['price'];
            }
        }
        if($check=$udit->query("SELECT * FROM cart WHERE p_id='$pid' AND ip_add='$ip'")){}
            if($nrows=$check->num_rows){}
                if($nrows>0){

                    header("location: index.php");
                }
                else {



         if($sql = $udit->query("INSERT INTO cart (p_id,p_name,ip_add,price) VALUES('$pid','$name','$ip','$price')")){
        
        echo "<script>alert('Product added to cart!!...Continue shopping')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        
        }
        
   
  } 


}

            
	



?>
<!DOCTYPE html>
<html>
<head>
<title>My Cart</title>
</head>
<body>

</body>
</html>