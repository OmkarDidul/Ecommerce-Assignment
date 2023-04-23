<?php include("header.php");
session_start();
include("conn.php");
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
   <div class="container mt-5">
<form  method="post" >
  
  <div class="form-group">
    <label for="user_name">User_name</label>
    <input type="text" name="user_name" class="form-control" id="user_name" aria-describedby="emailHelp" placeholder="Enter Username" require>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" require>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button><br>

    new user <a href="signup.php">click here</a> to sign up or register....
</form>

</body>
</html>

<?php



if(isset($_POST['submit']))
{
    $user_name=$_POST['user_name'];
    $pass=$_POST['password'];
    if($user_name=="" && $pass==""){
        echo "Enter Valid Username and Password";
        
    }
    {
        $sql="select User_name,password from admin where User_name='$user_name' and password='$pass'";
        $result=mysqli_query($conn , $sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count=mysqli_num_rows($result);
        if($count==1){
            
            header("Location:adminpanel.php");

        }
        else{
            echo'<script>
            window.location.href="login.php";
            alert("Login failed .Invalid Email address or Password!!!")
            </script>'; 
        }
    }
}
?>