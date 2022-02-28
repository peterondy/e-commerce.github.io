 <?php include 'header.php';?>

	<main class="pt-5 fs-4" style="padding-top: 10rem !important;">
		
		<div class="container pt-5">

			<!------------------------ section ------------------------>
			<?php // if the acttion request is exist
				if (isset($_GET['cart'])):
					if($_GET['cart'] == ""):
						$cart = "all";
					else:
						$cart = $_GET['cart'];
					endif;
				else:
					$cart = "all";
				endif;
			 ?>

			<!------------------------ section ------------------------>
			<?php if ($cart == 'all'):?>
				<?php
					$stmt = $con->prepare("SELECT * FROM cart WHERE userID = ?");
	                $stmt->execute(array($_GET['id']));
	                $rows = $stmt->fetchAll();
	            ?>

				<h1 class="text-center pt-2 pb-2 w-100">Show Your Cart </h1>
				<div class="row row-cols-1 row-cols-md-3 g-4">
					<?php foreach($rows as $row): ?>

			            <?php
							$stmt = $con->prepare("SELECT * FROM store WHERE ID = ?");
			                $stmt->execute(array($row['storeID']));
			                $storeDatas = $stmt->fetchAll();
			                //print_r($storeDatas);
			            ?>
						<?php foreach($storeDatas as $storeData): ?>
							<div class="col">
						  		<div class="card w-100">
						  			<a href="cart.php?cart=view&id=<?php echo $storeData['ID'] ?>">
						    			<img src="<?php echo $img; ?>eng/First Item.jpg" class="card-img-top" alt="<?php echo $storeData['name'] ?>">
						    		</a>
							    	<div class="card-body">
							      		<h5 class="card-title"><?php echo $storeData['name'] ?></h5>
							      		<p class="card-text"><?php echo $storeData['description'] ?></p>
							      		<div id="buttons" style="height: 70px;">
								      		<span class="bg-success p-1"style="color: var(--white);"><?php echo $storeData['price'] ?> $</span>
								      		<span class="bg-dark p-1"style="color: var(--white);"><?php echo $storeData['date'] ?></span>
								      		<a href="cart.php?cart=view&id=<?php echo $_GET['id'];?>&storeid=<?php echo $storeData['ID'] ?>" class="btn btn-primary">View</a>
								      		<a href="cart.php?cart=add&id=<?php echo $_GET['id'];?>&storeid=<?php echo $storeData['ID'] ?>" class="btn btn-danger">Add To Cart</a>

								      	</div>
							    	</div>
						  		</div>
							</div>
						<?php endforeach; ?>
					<?php endforeach; ?>
				</div>
				<div class="w-100">
					
					<a href="cart.php?cart=shop&id=<?php echo $_GET['id']; ?>" class="btn btn-success float-end">Shop</a>

				</div>
			<?php elseif ($cart == 'shop'):?>

					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5">Item Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Redirect After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
								
							$stmt = $con->prepare("SELECT price FROM cart WHERE userID = ?");
			                $stmt->execute(array($_GET['id']));
			                $rows = $stmt->fetchAll();
			                
			                print_r($rows);$price = 0;
			                $row = array();$count = count($rows);
			            	for ($i=0; $i < $count; $i++) { 
			            		$row[$i] = $rows[$i]['price'];
			            	echo '<br>';
			            		$price .= intval($row[$i]);
			            		print_r($row[$i]);
			            	}
			            	echo '<br>';
			            	print_r($row);
/*

							$stmt = $con->prepare("INSERT INTO cart (userID, storeID, price) VALUES (:zuserID, :zstoreID, :zprice)");
                            $stmt->execute(array(
                                'zuserID' => 1, 
                                'zstoreID' => $row['ID'], 
                                'zprice' => $row['price']
                            ));
		            	*/?><!--
		            	<h1 class="alert alert-success mt-5">The Item With ID = <?php echo $_GET['id'];?> Is inserted to Cart</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>-->
					<?php endif; ?>
			<?php elseif($cart == 'delete'):?>

				<?php if(isset($_GET['storeid'])): ?>
					<?php if ($_GET['storeid'] == ""):?>
						<h1 class="alert alert-danger mt-5">The User Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['storeid'] <> ""):?>
						<?php
							$stmt = $con->prepare("SELECT * FROM cart WHERE ID = ?");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();

		            	?>

		            	<h1 class="alert alert-light text-center mt-5">View Page</h1>
		            	<div class="row" style="height: 700px;">

			            	<?php   if ($row > 0):?>
			            		<section class="float-start col-md-6 justify-content-center text-center" style="height: 500px;">
								             
								             <div class="alb" style="width: 100%; height: 100%;">
								             	<img src="images/<?php echo $row['imgBrand']?>" style="width: 100%; height: 100%;" alt="<?php echo $row['imgBrand']?>">
								             </div>
			            		</section>
			            		<section class="float-end col-md-6 justify-content-center text-center bg-dark" style="height: 500px;color: var(--white);">       
			            			<h1><?php echo $row['name']?></h1>
			            			<p><?php echo $row['date']?></p>
			            		</section>
								
			            		<section class="float-start col-md-12 justify-content-center text-center mt-5" style="height: 200px;">  
			            			<h5>Description</h5>     
			            			<p><?php echo $row['description']?></p>
			            		</section>	
							<?php endif;?>

			            	
			            	

			            </div>
					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5">The User Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			<?php else:?>
				<h1 class="alert alert-danger mt-5">The Page Not Found , You Will Be Directed After 5 Seconds</h1>
				<script type="text/javascript">
            		goBack(5000);
            	</script>
			<?php endif;?>

		</div>

	</main>
	

<?php include 'sidebar.php';?>

<?php include 'footer.php';?>