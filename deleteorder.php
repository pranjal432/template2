<?php

    require "config.php";

    if(isset($_GET['delete']) && isset($_GET['id1'])) {

        $id1=$_GET['id1'];
        
		$sql25="DELETE from orders WHERE order_id='".$_GET['delete']."'";
		if($conn->query($sql25)==true) {
			echo "data deleted";
			header("Location: manageorders.php?id1=$id1");
		}
	}

?>