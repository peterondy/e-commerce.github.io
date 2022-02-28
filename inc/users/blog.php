 <?php include 'header.php';?>

	<main class="pt-5 fs-4" style="padding-top: 10rem !important;">
		
		<div class="container pt-5">

			<!------------------------ section ------------------------>
			<?php // if the acttion request is exist
				if (isset($_GET['blog'])):
					if($_GET['blog'] == ""):
						$blog = "all";
					else:
						$blog = $_GET['blog'];
					endif;
				else:
					$blog = "all";
				endif;
			 ?>

			<!------------------------ section ------------------------>
			<?php if ($blog == 'all'):?>
				<?php
					$stmt = $con->prepare("SELECT * FROM blogs WHERE active = 1");
	                $stmt->execute();
	                $rows = $stmt->fetchAll();
	            ?>

				<h1 class="text-center pt-2 pb-2"><?php echo $dashboard['welcome']; ?> <?php echo $user['userName']; ?> <i class="bi bi-pencil-square"></i> </h1>
				<div class="row row-cols-1 row-cols-md-3 g-4">
					<?php foreach($rows as $row): ?>
						<div class="col">
					  		<div class="card">
					  			<a href="view.php?id=<?php echo $row['ID'] ?>">
					    			<img src="<?php echo $img; ?>eng/First blog.jpg" class="card-img-top" alt="<?php echo $row['title'] ?>">
					    		</a>
						    	<div class="card-body">
						      		<h1 class="card-title"><?php echo $row['title'] ?></h1>
						      		<p class="card-text"><?php echo $row['description'] ?></p>
						      		<div id="buttons" style="height: 70px;">
							      		<span class="bg-success p-1 m-1"style="color: var(--white);">
							      			<?php if ($row['authorID'] == 0):
							      			 	echo 'Admin';
							      			 endif; ?> 	
							      		</span>
							      		<span class="bg-dark p-1"style="color: var(--white);"><?php echo $row['date'] ?></span>
							      		<a href="blog.php?blog=view&id=<?php echo $row['ID'] ?>" class="btn btn-primary"><?php echo $dashboard['view']; ?></a>

							      	</div>
						    	</div>
					  		</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php elseif($blog == 'view'):?>

				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5"><?php echo $dashboard['userNotFound']; ?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $dashboard['redirect']; ?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("SELECT * FROM blogs WHERE ID = ?");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();

		            	?>

		            	<h1 class="alert alert-light text-center mt-5"><?php echo $dashboard['viewPage']; ?></h1>
		            	<div class="row" style="height: 700px;">

			            	<?php   if ($row > 0):?>
			            		<section class="float-start col-md-6 justify-content-center text-center" style="height: 500px;">
								             
						            <div class="alb" style="width: 100%; height: 100%;">
						            	<img src="images/<?php echo $row['img']?>" style="width: 100%; height: 100%;" alt="<?php echo $row['title']?>">
						            </div>
			            		</section>
			            		<section class="float-end col-md-6 justify-content-center text-center bg-dark" style="height: 500px;color: var(--white);">       
			            			<h1><?php echo $row['title']?></h1>
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
					<h1 class="alert alert-danger mt-5"><?php echo $blog['userNotFound']; ?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $dashboard['redirect']; ?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			<?php else:?>
				<h1 class="alert alert-danger mt-5"><?php echo $dashboard['pageNotFound']; ?><?php echo $dashboard['redirect']; ?></h1>
				<script type="text/javascript">
            		goBack(5000);
            	</script>
			<?php endif;?>

		</div>

	</main>
	

<?php include 'sidebar.php';?>

<?php include 'footer.php';?>
