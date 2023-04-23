<?php
include('conn.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome Admin</h1>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Orders</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query="SELECT * FROM `order_manager`";
                    $result=mysqli_query($conn,$query);
                    while($user_fetch=mysqli_fetch_assoc($result))
                    {
                        echo"
                        <tr>
                        <td>$user_fetch[order_id]</td>
                        <td>$user_fetch[full_name]</td>
                        <td>$user_fetch[address]</td>
                        <td>$user_fetch[phone_no]</td>
                        <td>
                        <table  class='table text-center table-dark'>
                        <thead>
                        <tr>
                            <th scope='col'>Item Name</th>
                            <th scope='col'>price</th>
                            <th scope='col'>Quantity</th>
                        </tr>
                        </thead>

                        <tbody>
                        ";
                        $order_query="SELECT * FROM `user_order` WHERE 'order_id'='$user_fetch[order_id]'";
                        $order_result=mysqli_query($conn,$order_query);
                        while($order_fetch=mysqli_fetch_assoc($order_result)){
                            echo"
                              <tr>
                              <td>$order_fetch[item_name]</td>
                            <td>$order_fetch[price]</td>
                            <td>$order_fetch[quantity]</td>
                            </tr>

                            ";

                        }
                        echo "
                        </tbody>
                        </table> 
                        </td>
                        </tr>
                        ";
                    }
                    ?>
                    
                    
                </tbody>
                </table>
                            </div>
        </div>
    </div>
    
</body>
</html>