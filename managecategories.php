<?php 

	require "header.php";
	require "sidebar.php";
?>

<?php

$limit=10;
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
						
						
						
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Category Id</th>
								   <th>Category name</th>
								   <th>Actions</th>
								   
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
										<a href="manageusers.php" title="First Page">&laquo; First</a><a href="manageusers.php?id1=<?php echo ($id1-1); ?>" title="Previous Page">&laquo; Previous</a>
											<a href="manageusers.php" class="number <?php if ($n==0) :?>current<?php endif; ?>">1</a>
											<?php
												$count2=0;
												require "config.php";
												$sql14="SELECT * from users";
                  $result14=$conn->query($sql14);
                  if ($result14->num_rows>0) {
                    $r=$result14->num_rows;
                    $page=ceil($r/$limit);
                    for($i=2;$i<=$page;$i++)
                    {
					   $count2++;
					   echo '<a href="manageusers.php?id1='.$i.'" class="number">'.$i.'</a>';
                    }
                  } ?>
											
											
											<a href="manageusers.php?id1=<?php echo ($id1+1); ?>" title="Next Page">Next &raquo;</a><a href="manageusers.php?id1=<?php echo ($count2+1); $count2=0; ?>" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
								
								<?php

								require "config.php";

								$sql="SELECT * from categories  LIMIT {$n},{$limit}";
								$result=$conn->query($sql);
								if($result->num_rows>0) {
									while($row =$result->fetch_assoc()) {
										echo "<tr>
										<td><input type='checkbox' /></td>
										<td>".$row['category_id']."</td>
										<td>".$row['category_name']."</td>
										
										<td>
											
											 <a href='#' title='Edit'><img src='resources/images/icons/pencil.png' alt='Edit' /></a>
											 <a href='deletecategory.php?delete=".$row['category_id']."&id1=".$id1."' title='Delete'><img src='resources/images/icons/cross.png' alt='Delete' /></a> 
											 <a href='#' title='Edit Meta'><img src='resources/images/icons/hammer_screwdriver.png' alt='Edit Meta' /></a>
										</td>
									</tr>";
									}
								}

								?>
								
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

require "footer.php";
?>
