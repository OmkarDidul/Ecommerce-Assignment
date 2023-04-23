<?php
session_start();
// session_destroy();   
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['ADD_TO_CART'])){

        if(isset($_SESSION['cart'])){
            $myitems=array_column($_SESSION['cart'],'Item_name');
            if(in_array($_POST['Item_name'],$myitems)){
                echo "<script>
                alert ('Item Already added');
                window.location.href='mainhome.php';
                </script>";
            }
            else{
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('no'=>$_POST['no'],'Item_name'=>$_POST['Item_name'],'price'=>$_POST['price'],'Quantity'=>1);
            echo "<script>
                alert ('Item added');
                window.location.href='mainhome.php';
            </script>";
            }
        }
        else{
            $_SESSION['cart'][0]=array('no'=>$_POST['no'],'Item_name'=>$_POST['Item_name'],'price'=>$_POST['price'],'Quantity'=>1);
            echo "<script>
                alert ('Item added');
                window.location.href='mainhome.php';
                </script>";
        }

    }
    if(isset($_POST['remove'])){
        foreach($_SESSION['cart'] as $key=>$value){
            // print_r($key);
            if($value['Item_name']==$_POST['Item_name']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo "<script>
                alert('Item Removed');
                window.location.href='mycart.php';
                </script>
                ";
            }
        }
    }
    if(isset($_POST['mod_quantity'])){

        foreach($_SESSION['cart'] as $key=>$value){
            // print_r($key);
            if($value['Item_name']==$_POST['Item_name']){
                $_SESSION['cart'][$key]['Quantity']=$_POST['mod_quantity'];
            //    print_r($_SESSION['cart']);
                echo "<script>
                window.location.href='mycart.php';
                </script>
                ";
            }
        }
    }
}



?>