<?php

    require "config.php";
    if(isset($_GET['cartid'])) {
        $cartid=$_GET['cartid'];
        $sql="DELETE from cart WHERE cart_id='".$cartid."'";
        if ($conn->query($sql) == true) {
            header("Location:cart.php");
        }
    }

?>