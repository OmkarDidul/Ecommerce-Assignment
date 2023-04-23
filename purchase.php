<?php
include("conn.php");
session_start();
// session_destroy();   
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['purchase']))
    {
      $query1 ="INSERT INTO `order_manager`( `full_name`, `phone_no`, `address`) VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[address]')";
     if(mysqli_query($conn,$query1))
        {
           $order_id=mysqli_insert_id($conn);
                $query=" INSERT INTO `user_order`(`order_id`, `item_name`, `price`, `quantity`) VALUES (?,?,?,?)";
                $stmt=mysqli_prepare($conn,$query);
                if($stmt)
                {
                    mysqli_stmt_bind_param($stmt,"isii",$order_id,$Item_name,$price,$Quantity);
                    foreach($_SESSION['cart'] as $key=>$value){
                        $Item_name=$value['Item_name'];
                        $price=$value['price'];
                        $Quantity=$value['Quantity'];
                        mysqli_stmt_execute($stmt);


                    }
                    unset($_SESSION['cart']);
                    echo "
                    <script>
                    alert('Order Place We Will Contact You Soon......!');
                    window.location.href='mainhome.php';
                    </script>
                    "; 

                }
                    else
                    {
                    echo "
                    <script>
                    alert('sql query prpare Error');
                    window.location.href='mycart.php';
                    </script>
                    ";
                 }
        }
                 else
                    {
                    echo "
                    <script>
                    alert('sql query prpare Error');
                    window.location.href='mycart.php';
                    </script>
                    ";
            
                    }
    }
}
?>