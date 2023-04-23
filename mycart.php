
<?php
include("header2.php");
// session_start();
// session_destroy();
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light mt-5">
                <h1>My Cart</h1>
            </div>
         

         <div class="col-lg-8">

                <table class="table">
                <thead class="text-center">
                <tr>
                <th scope="col">Serial No</th>
                <th scope="col">Item Name</th>
                <th scope="col">Item Price</th> 
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php
               

                if(isset($_SESSION['cart']))
                {              
                foreach($_SESSION['cart'] as $key=>$value){
                //   print_r($value);
                $sr=$key+1;
               
                    echo"
                    <tr>
                    <td>$sr</td>
                    <td>$value[Item_name]</td>
                    <td>$value[price]<input type='hidden' class='iprice' value='$value[price]'></td>
                    <td>
                    <form action='managecart.php' method='POST'>
                    <input class='text-center iquantity' onchange='this.form.submit();' name='mod_quantity' type='number' value='$value[Quantity]' min='1' max='10'>
                    <input type='hidden' name='Item_name' value='$value[Item_name]'>
                    </form>
                    </td>
                    
                    <td class='itotal'></td> 
                    <td>
                    <form action='managecart.php' method='POST'>
                    <button class='btn btn-sm btn-outline-danger' name='remove'>Remove</button>
                    <input type='hidden' name='Item_name' value='$value[Item_name]'>
                    </form>
                    </td>
                    </tr>
                    ";

                }
                
                
                    }
                ?>
                    </tbody>
                </table>
                
           </div>
        
         <div class="col-lg-4">
                <div class='border bg-light rounded p-4'>
                     <h3>Total:</h3>
                     <h5 class=" text-center" id="gtotal"></h5><br>
                     <form action="purchase.php" method="POST">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name" class="form-control" require>
                        </div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" name="phone_no" class="form-control" require>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" require>
                        </div>   
                     


                        <button class="btn btn-primary btn-block" name="purchase">Buy</button>
                     </form>
                </div>
         </div> 

        </div>
    </div>

<script>
    var gt=0;  
    var iprice=document.getElementsByClassName('iprice');
    var iquantity=document.getElementsByClassName('iquantity');
    var itotal=document.getElementsByClassName('itotal');
    var gtotal=document.getElementById('gtotal');
 
    function subtotal(){
        gt=0;
    for(var i=0;i<iprice.length;i++ )
    {
        itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);  
        gt=gt+(iprice[i].value)*(iquantity[i].value);
    }
    gtotal.innerText=gt;
 }

 subtotal() ;
</script>
</body>
</html>