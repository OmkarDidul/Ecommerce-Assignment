<?php include("header.php");?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   

<?php 

error_reporting(E_ERROR |E_PARSE);



if($_SERVER['REQUEST_METHOD']=='POST'){
    $name= $_POST['username'];
    $email= $_POST ['email'];
    $mobno= $_POST ['mobno'];
    $address= $_POST['address'];
    $pass= $_POST['password'];
    $confirm_pass=$_POST['conpass'];

    
$servername="localhost:3307";
$username="root";
$password="";
$database="ecommerce";

// create connection

$conn= mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Sorry We faield to connect". mysqli_connect_error());
}
else{
// echo "connection was successfull";
 // Validate email address
// If no errors, save the user data to the database
if($name!="" && $email!="" && $mobno!="" && $address!="" && $pass!="" && $confirm_pass!="" ){

  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $email_error = "Invalid email address";
  }
     

    
            // // Validate contact number
            // if(!preg_match('/^[7-9]{1}[0-9]{9}$', $mobno)){
            //   $mob_error = "Invalid Mobile number";
            // }
            if (!filter_var($mobno, FILTER_VALIDATE_INT, array('options' => array('min_range' => 7000000000, 'max_range' => 9999999999)))) {

              echo "Mobile number is not valid";
          }

            // Validate password
            if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $pass)){
              $pass_error = "Password must contain at least one digit, one lowercase letter, one uppercase letter, and must be at least 8 characters long";
            }

            // Check if password and confirm password match
            if($pass != $confirm_pass){
              $confirm_password_error = "Password and confirm password do not match";
            }

$sql="insert into `user` ( `username`, `email`, `mobno`, `address`, `password`) VALUES ('$name', '$email', '$mobno', '$address', '$pass')";
$result=mysqli_query($conn,$sql);
}

else
{
  
  
 if($email=""){
  $email_error = "Invalid email address";
}

// Validate contact number
if( $mobno=""){
  $mob_error = "Invalid Mobile number";
}

// Validate password
if( $pass=""){
  $pass_error = "Password must contain at least one digit, one lowercase letter, one uppercase letter, and must be at least 8 characters long";
}

// Check if password and confirm password match
if($pass != $confirm_pass){
  $confirm_password_error = "Password and confirm password do not match";
}

}

if($result){
 echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>User Added Successfully.....!</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    
  </div>'; 
  header("Location:mainhome.php"); 
}
else{
    echo "the record was not inserted properly.....!";

}
}
}
?>

<div class="container mt-5">
<form  method="post" >
  <div class="form-group">
    <label for="username">UserName</label>
    <input type="text" name="username" class="form-control" id="username"  placeholder="Enter Username" require>
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" require>
    <small id="emailHelp" class="form-text text-muted">We shall never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="mobno">Mobile Number</label>
    <input type="text" name="mobno" class="form-control" id="mobno "  placeholder="Enter Mobile Number" require>

  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address" require>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" require>
  </div>
  <div class="form-group">
    <label for="conpass">Confirm Password</label>
    <input type="password" class="form-control" id="conpass" name="conpass" placeholder="Confirm Password" require>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>


</body>
</html>