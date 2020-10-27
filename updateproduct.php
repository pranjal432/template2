<?php 

	require "header.php";
	require "sidebar.php";
?>

<?php

$limit=10;
if(isset($_GET['edit'])) {
    $z=$_GET['edit'];
}
//$count1=0;
$id1=1;
if (isset($_GET['id1'])) {
  $id1=$_GET['id1'];
  $n=($id1-1)*$limit;

} else {
  $n=0;
}


?>
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			
			<!-- <ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
					Write an Article
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					Create a New Page
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
					Upload an Image
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/clock_48.png" alt="icon" /><br />
					Add an Event
				</span></a></li>
				
				<li><a class="shortcut-button" href="#messages" rel="modal"><span>
					<img src="resources/images/icons/comment_48.png" alt="icon" /><br />
					Open Modal
				</span></a></li>
				
			</ul>End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<!-- <div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div> -->
						
						<table>
							
							<thead>
								<tr>
								   
								   <th>Product ID</th>
								   <th>Category ID</th>
								   <th>Product Name</th>
								   <th>Price</th>
								   <th>Image</th>
								   <th>Action</th>
								   
								</tr>
								
							</thead>
						 
							
						 
							<tbody>
                                <form method="POST">
								
									<?php
									    require "config.php";
										$sql6="SELECT * from products  LIMIT {$n},{$limit}";
										$result6=$conn->query($sql6);
										if($result6->num_rows>0) {
											while($row6=$result6->fetch_assoc()) {
                                                if($row6['product_id']==$z) {
                                                    $_FILES['a']=$row6['image'];
												echo "<tr>
												      <td>".$row6['product_id']."</td>			
									<td>".$row6['category_id']."</td>
									<td><input type='text' value='".$row6['name']."' name='n'></td>
									<td><input type='text' value='".$row6['price']."' style='width:60px;' name='p'></td>
									<td><input type='file' name='f'></td>
									<td>
								
										 <input type='submit' value='Update' style='color:green;' name='update'>
                                         
										 
									    </td>
                                     </tr>";
                                                }
											}
										}
                                    ?>
									<!-- <a href='updateproduct1.php?id=&name='>Update</a> -->
									
                                </form>
									
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					       
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<!--<div class="content-box column-left">
				
				<div class="content-box-header">
					
					<h3>Content box left</h3>
					
				</div>--> <!-- End .content-box-header -->
				
				<!--<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>Maecenas dignissim</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div>--> <!-- End #tab3 -->        
					
				<!--</div>--> <!-- End .content-box-content -->
				
			<!--</div>--> <!-- End .content-box -->
			
			<!--<div class="content-box column-right closed-box">
				
				<div class="content-box-header">--> <!-- Add the class "closed" to the Content box header to have it closed by default -->
					
					<!--<h3>Content box right</h3>
					
				</div>--> <!-- End .content-box-header -->
				
				<!--<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>This box is closed by default</h4>
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
						</p>
						
					</div>--> <!-- End #tab3 -->        
					
				<!--</div>--> <!-- End .content-box-content -->
				
			<!--</div>--> <!-- End .content-box -->
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			
			<!-- <div class="notification attention png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
				</div>
			</div>
			
			<div class="notification information png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div>
			
			<div class="notification error png_bg">
				<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>
					Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
				</div>
			</div> -->
			
            <!-- End Notifications -->
            

<?php

    if (isset($_POST['update'])) {
        

           $sql35="UPDATE products set name='".$_POST['n']."' WHERE product_id='".$_GET['edit']."'";
           if($conn->query($sql35)==true) {
               //echo "<center>updated</center>";
           }
           $sql36="UPDATE products set price='".$_POST['p']."' WHERE product_id='".$_GET['edit']."'";
           if($conn->query($sql36)==true) {
               //echo "<center>updated</center>";
           }
           $sql37="UPDATE products set image='".$_POST['f']."' WHERE product_id='".$_GET['edit']."'";
           if($conn->query($sql37)==true) {
               //echo "<center>updated</center>";
              
           }
		   echo "<center><a href='manageproducts.php?id1=".$_GET['id1']."'>Go back to manageproducts.php</a></center>";

           

        
        
    }

?>



<?php 

require "footer.php";
?>
