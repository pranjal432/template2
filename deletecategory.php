<?php

    require "config.php";

    if(isset($_GET['delete']) && isset($_GET['id1'])) {

        $id1=$_GET['id1'];
        
		$sql25="DELETE from categories WHERE category_id='".$_GET['delete']."'";
		if($conn->query($sql25)==true) {
			echo "data deleted";
			header("Location: managecategories.php?id1=$id1");
		}
	}

?>