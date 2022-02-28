<?php include 'header.php';?>

	<main class="pt-5 fs-4" style="padding-top: 10rem !important;">
		<button class="btn btn-primary float-end" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="margin-top: 1rem; margin-right: 1rem">Show Tools<i class="bi bi-arrow-right"></i></button>

		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		 	<div class="offcanvas-header">
		    	<h5 id="offcanvasRightLabel">Tools</h5>
		    	<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		    </div>
		    <div class="offcanvas-body">
		    	<ul class="w-100" style="padding: 0; margin: 0;">
			        <li class="nav-item w-100 d-block fs-4 mt-1"><a class="dropdown-item" href="store.php"><i class="bi bi-check2-all"></i> Show Store Items</a></li>
			        <li class="nav-item w-100 d-block fs-4 mt-1"><a class="dropdown-item" href="store.php?store=new"><i class="bi bi-plus-circle"></i> Add New Item</a></li>
			    </ul>
		    </div>
	    </div>
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
					$stmt = $con->prepare("SELECT * FROM store");
	                $stmt->execute();
	                $rows = $stmt->fetchAll();
	            ?>

				<h1 class="text-center pt-2 pb-2">Show Your Store</h1>
				<table class="table table-bordered">
					<thead class="bg-dark" style="color: var(--white);">
						<tr>
							<th> ID </th>
							<th> Name </th>
							<th>Description</th>
							<th>Date</th>
							<th>Links</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rows as $row):?>
							<tr>
								<td class="bg-light"># <?php echo $row['ID'];?></td>
								<td><?php echo $row['name'];?></td>
								<td><?php echo $row['description'];?></td>
								<td><?php echo $row['date'];?></td>
								<td>
									<a href="store.php?store=view&id=<?php echo $row['ID'] ?>" class="btn btn-primary"><i class="bi bi-eye"></i> View</a>
									<?php if($row['active'] == 0):?>
										<a href="store.php?store=activate&id=<?php echo $row['ID'] ?>" class="btn btn-success"><i class="bi bi-bag-check"></i> Activate</a>
									<?php elseif($row['active'] == 1):?>
										<a href="store.php?store=desactivate&id=<?php echo $row['ID'] ?>" class="btn btn-info"><i class="bi bi-bag-x"></i> Desactivate</a>
									<?php endif;?>
									<a href="store.php?store=edit&id=<?php echo $row['ID'] ?>" class="btn btn-secondary"><i class="bi bi-file-earmark"></i> Edit</a>
									<a href="store.php?store=delete&id=<?php echo $row['ID'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</a>
								</td>
							</tr>
						<?php endforeach;?>

					</tbody>
				</table>
			<?php elseif ($store == 'new'):?>

				<h1 class="text-center pt-2 pb-2">Add New Item Page</h1>
				<form id="login" class="pt-5" action="store.php?store=insert" method="POST"enctype="multipart/form-data">
					<span class="text-center"><h1>Add</h1><i class="bi bi-plus-circle" style="font-size: 6rem;margin-left: 45%;"></i></span>
					<h1>Title</h1>
					<input type="text" name="title">
					<h1>Description</h1>
					<input type="text" name="desc" style="height: 100px;padding: 0;padding-left: 10px;" required>
					<h1>Upload Image</h1>
					<input type="file" name="image" class="w-100" required>

						<?php if (isset($_GET['error'])): ?>
							<p><?php echo $_GET['error']; ?></p>
						<?php endif ?>

					<!--<button name="add" ></button>-->
					<input type="submit" name="add" class="btn mt-2 float-end mt-5 fs-4" style="background-color: #a067ab;padding: .5rem 3rem;"
                  		value="Uplod Image Here">
				</form>
			<?php elseif($store == 'insert'):?>
				<?php
					  	
					  	if (isset($_POST['add']) && isset($_FILES['image'])) {

							/*echo "<pre>";
							print_r($_FILES['image']);
							echo "</pre>";*/

							$img_name = $_FILES['image']['name'];
							//echo $img_name;
							$img_size = $_FILES['image']['size'];
							$tmp_name = $_FILES['image']['tmp_name'];
							$error = $_FILES['image']['error'];

							if ($error === 0) {
								if ($img_size > 12500000) {
									$em = "Sorry, your file is too large.";
								    header("Location: store.php?store=new&error=$em");
								}else {
									$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
									$img_ex_lc = strtolower($img_ex);

									$allowed_exs = array("jpg", "jpeg", "png"); 

									if (in_array($img_ex_lc, $allowed_exs)) {
										$imgData = $new_img_name = uniqid("IMG-", false).'.'.$img_ex_lc;
										$img_upload_path = 'images/'.$new_img_name;
										move_uploaded_file($tmp_name, $img_upload_path);
										//echo '<br>'.$imgData;

										$title = $_POST['title'];
										$desc = $_POST['desc'];
										$date = date('y-m-d');
										$active = 1;

										// Insert into Database
										
				                            $stmt = $con->prepare("INSERT INTO store (imgBrand,name,description,date,active) VALUES (:zimg, :zname, :zdesc, :zdate, :zactive)");
				                            $stmt->execute(array(
				                                'zimg' => $imgData, 
				                                'zname' => $title, 
				                                'zdesc' => $desc,
				                                'zdate' => $date,
				                                'zactive' => $active
				                            ));
				                            echo '<h1 class="alert alert-success mt-5"> 1 Item Inserted </h1>';
				                            echo "<script>
				                            	 goBack(3000);
				                            </script>";
									}else {
										$em = "You can't upload files of this type";
								        header("Location: store.php?store=new&error=$em");
									}
								}
							}else {
								$em = "unknown error occurred!";
								header("Location: store.php?store=new&error=$em");
							}

						}else {
							header("Location: store.php?store=new");
						}

				?>
			<?php elseif($store == 'desactivate'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5"><?php echo $blogs['desactivate'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("UPDATE `store` SET `active` = '0' WHERE `store`.`ID` = ?;");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();
		            	?>
		            	<h1 class="alert alert-success mt-5">The Item With ID = <?php echo $_GET['id'];?> Is Desactivated</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5">The User Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			<?php elseif($store == 'activate'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5">The Page Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("UPDATE `store` SET `active` = '1' WHERE `store`.`ID` = ?;");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();
		            	?>
		            	<h1 class="alert alert-success mt-5">The User With ID = <?php echo $_GET['id'];?> IS Activated</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5">The Page Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			<?php elseif($store == 'delete'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5">The Page Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("DELETE FROM `store` WHERE `store`.`ID` = ?");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();
		            	?>
		            	<h1 class="alert alert-danger mt-5">The Use rWith ID = <?php echo $_GET['id'];?> IS Deleted</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>

					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5">The User Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			<?php elseif($store == 'view'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5">The User Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("SELECT * FROM store WHERE ID = ?");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();

		            	?>     

		            	<h1 class="alert alert-light text-center mt-5">View Page</h1>
		            	<section class="justify-content-center text-center">
	            		<?php   if ($row > 0):?>
						             
						             <div class="alb">
						             	<img src="images/<?php echo $row['imgBrand']?>" width="200" height="200">
						             </div>
						          		
								<?php endif;?>
		            	<h1><?php echo $row['name']?></h1>
		            	<p><?php echo $row['description']?></p>
		            	<p><?php echo $row['date']?></p>
		            	<p>
		            		<?php if($row['active'] == 1):
                                    echo 'activated';
                                elseif($row['active'] == 0):
                                    echo 'desactivated';
                                endif; ?>
		            	</p>

		            	</section>
					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5">The User Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			<?php elseif($store == 'edit'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5">The Page Not Found</h1>
		            	<h1 class="alert alert-danger mt-5">You Will Be Directed After 5 Seconds</h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("SELECT * FROM store WHERE ID = ?");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();
		            	?>
				        <h1 class="text-center pt-2 pb-2">Edit Page</h1>
						<form id="login" class="pt-5" action="store.php?store=update" method="POST">
							<span class="text-center"><i class="bi bi-file-earmark" style="font-size: 6rem;margin-left: 45%;"></i></span>
							<h1>Title</h1>
							<input type="text" name="title" value="<?php echo $row['name']; ?>">
							<h1>Description</h1>
							<input type="text" name="desc" style="height: 100px;padding: 0;padding-left: 10px;"  value="<?php echo $row['description']; ?>" required>
							<h1>Upload Images Here</h1>
							<input type="file" name="image" class="w-100"  value="<?php echo $row['imgBrand']?>" required>
						</form>
					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5">The Page Not Found</h1>
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