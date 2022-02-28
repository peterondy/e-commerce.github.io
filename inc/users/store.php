 <?php include 'header.php';?>

	<main class="pt-5 fs-4" style="padding-top: 10rem !important;">
		
		<div class="container pt-5">

			<!------------------------ section ------------------------>
			<?php // if the acttion request is exist
				if (isset($_GET['store'])):
					if($_GET['store'] == ""):
						$store = "all";
					else:
						$store = $_GET['store'];
					endif;
				else:
					$store = "all";
				endif;
			 ?>

			<!------------------------ section ------------------------>
			<?php if ($store == 'all'):?>
				<?php
					$stmt = $con->prepare("SELECT * FROM store WHERE active = 1");
	                $stmt->execute();
	                $rows = $stmt->fetchAll();
	            ?>

				<h1 class="text-center pt-2 pb-2">Show Your Store </h1>
				<div class="row row-cols-1 row-cols-md-3 g-4">
					<?php foreach($rows as $row): ?>
						<div class="col">
					  		<div class="card">
					  			<a href="store.php?store=view&id=<?php echo $row['ID'] ?>">
					    			<img src="<?php echo $img; ?>eng/First Item.jpg" class="card-img-top" alt="<?php echo $row['name'] ?>">
					    		</a>
						    	<div class="card-body">
						      		<h5 class="card-title"><?php echo $row['name'] ?></h5>
						      		<p class="card-text"><?php echo $row['description'] ?></p>
						      		<div id="buttons" style="height: 70px;">
							      		<span class="bg-success p-1"style="color: var(--white);"><?php echo $row['price'] ?> $</span>
							      		<span class="bg-dark p-1"style="color: var(--white);"><?php echo $row['date'] ?></span>
							      		<a href="store.php?store=view&id=<?php echo $_GET['id'];?>&storeid=<?php echo $row['ID'] ?>" class="btn btn-primary">View</a>
							      		<a href="store.php?store=add&id=<?php echo $_GET['id'];?>&storeid=<?php echo $row['ID'] ?>" class="btn btn-danger">Add To Cart</a>

							      	</div>
						    	</div>
					  		</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php elseif ($store == 'add'):?>

					<?php if ($_GET['storeid'] == ""):?>
						<h1 class="alert alert-danger mt-5">Item Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Redirect After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['storeid'] <> ""):?>
						<?php
								
							$stmt = $con->prepare("SELECT ID,price FROM store WHERE ID = ?");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();
			            


							$stmt = $con->prepare("INSERT INTO cart (userID, storeID, price) VALUES (:zuserID, :zstoreID, :zprice)");
                            $stmt->execute(array(
                                'zuserID' => 1, 
                                'zstoreID' => $row['ID'], 
                                'zprice' => $row['price']
                            ));
		            	?>
		            	<h1 class="alert alert-success mt-5">The Item With ID = <?php echo $_GET['id'];?> Is inserted to Cart</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php endif; ?>
			<?php elseif($store == 'view'):?>

				<?php if(isset($_GET['storeid'])): ?>
					<?php if ($_GET['storeid'] == ""):?>
						<h1 class="alert alert-danger mt-5">The User Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['storeid'] <> ""):?>
						<?php
							$stmt = $con->prepare("SELECT * FROM store WHERE ID = ?");
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