<?php 

	require "header.php";
	require "sidebar.php";
	$checkbox=array();
	require "config.php";

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
			
			
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					<ul class="content-box-tabs">
						
					</ul>
					
					<div class="clear"></div>
					
				</div> 
						
										
										
										
					<div class="tab-content" id="tab2" style="margin-left:30px;margin-top:20px;">
					
						<form action="addproduct.php" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								
								
								<p>
									<label>Name</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="productname" required/>
									<br /><small>Enter the name of the product</small>
								</p>

								<p>
									<label>Price</label>
										<input class="text-input small-input" type="text" id="small-input" name="productprice" required /> 
										<br /><small>Enter the price of the product</small>
								</p>

								<p>
									<label>Image</label>
										<input type="file" id="small-input1" name="chooseimage" value="Choose image" required/> 
										
								</p>
								
								<!--<p>
									<label>Large form input</label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p>-->
								
								
								
								<p>
									<label>Category</label>   
									<select name="dropdown" class="small-input" id="dropdown">
										<option value="Men">Men</option>
										<option value="Women">Women</option>
										<option value="Kids">Kids</option>
										<option value="Electronics">Electronics</option>
										<option value="Sports">Sports</option>
									</select>
								</p>

								<p>
									<label>Tags</label>
									<input type="checkbox" name="checkbox[]" value="Fashion"/> Fashion
									<input type="checkbox" name="checkbox[]" value="Ecommerce"/> Ecommerce
									<input type="checkbox" name="checkbox[]" value="Shop" /> Shop 
									<input type="checkbox" name="checkbox[]" value="Hand Bag"/> Hand Bag
									<input type="checkbox" name="checkbox[]" value="Laptop" /> Laptop 
									<input type="checkbox" name="checkbox[]" value="Headphone"/> Headphone
								</p>

								<p>
								<label for="colorpicker">Color Picker:</label>
                                <input type="color" id="colorpicker" value="#0000ff" name="color" required>
								</p>
								
								<p>
									<label>Quantity</label>
									<input type="number" name="quantity" style="width:50px" required>
								</p>
								
								<p>
									<label>Description</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="description" cols="79" rows="15" required></textarea>
								</p>

								
								<p>
									<input class="button" type="submit" name="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->

			<div class="clear"></div>

<?php

	
	
	$_SESSION['b']=array();
	
	if(isset($_POST['submit'])) {
		$picture = $_POST["chooseimage"];
		$productname=$_POST['productname'];
	    $productprice=$_POST['productprice'];
	    $description=$_POST['description'];
		$category=$_POST['dropdown'];
		$color=$_POST['color'];
		$quantity=$_POST['quantity'];
		if(!empty($_POST['checkbox'])) {    
			//$js=json_encode($_POST['checkbox']);
			//echo $js;
			$sql="SELECT * from tags";
			$result1=$conn->query($sql);
			if($result1->num_rows>0) {
				while($row=$result1->fetch_assoc()) {
                    foreach($_POST['checkbox'] as $tag) {
						if($tag==$row['tagname']) {
							array_push($_SESSION['b'],$row['tag_id']);
						}
					}
				}
				$js=json_encode($_SESSION['b']);
			    
			}

		}
		$sql3="SELECT * from categories WHERE category_name='".$category."'";
			 $result=$conn->query($sql3);
			if($result->num_rows>0) {
				 while($row=$result->fetch_assoc()) {
					 $_SESSION['a']=$row['category_id'];
					 //echo $_SESSION['a'];
					 $sql1="INSERT INTO products(category_id,name,price,image,short_desc,long_desc) 
		             VALUES('".$_SESSION['a']."','".$productname."','".$productprice."','".$picture."','hello','".$description."')";
		             if($conn->query($sql1)==true) {
					 echo "<center>data inserted in products table</center>";
					 $sql4="SELECT * from products WHERE name='".$productname."' AND price='".$productprice."' AND image='".$picture."' AND long_desc='".$description."'";
		             $result4=$conn->query($sql4);
			            if($result4->num_rows>0) {
				            while($row4=$result4->fetch_assoc()) {
					        $sql5="INSERT INTO products_tags(product_id,tag_id) VALUES('".$row4['product_id']."','".$js."')";

					            if($conn->query($sql5)==true) {
						        echo "inserted";
								}
								
								$sql6="INSERT INTO colors(product_id,color,quantity) VALUES('".$row4['product_id']."','".$color."','".$quantity."')";

					            if($conn->query($sql6)==true) {
						        echo "inserted";
								}
				            }
			            }
		            }
				}
			}

		



		
	}


	


?>

<?php 

require "footer.php";

?>
