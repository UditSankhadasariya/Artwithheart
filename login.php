
<?php
session_start(); 
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<?php 
include "storescripts/connect_to_mysql.php";
if(isset($_POST['email'])){
  $email = $udit->real_escape_string($_POST['email']);
  $pass = $udit->real_escape_string($_POST['pass']);
  if($sql = $udit->query("SELECT * FROM user WHERE email='$email' AND password='$pass'")){}
    if($number = $sql->num_rows){}
      if($number==0){
        echo "<script>alert('Invalid credentials')</script>";
        echo "<script>window.open('sign_up.php','_self')</script>";
      }else{
        if($row = $sql->fetch_assoc())
        {
          $uname = $row['first_name'];
          $lname = $row['last_name'];
        }
        echo "<script>alert('Login succesfull')</script>";
        $_SESSION['user'] = $uname;
        $_SESSION['luser']= $lname;
        echo "<script>window.open('index.php','_self')</script>";
      

      }
}


?>