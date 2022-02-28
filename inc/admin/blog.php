<?php include 'header.php';?>

	<main class="pt-5 fs-4" style="padding-top: 10rem !important;">
		<button class="btn btn-primary float-end" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="margin-top: 1rem; margin-right: 1rem">Show Tools <i class="bi bi-arrow-right"></i></button>

		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		 	<div class="offcanvas-header">
		    	<h5 id="offcanvasRightLabel">Tools</h5>
		    	<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		    </div>
		    <div class="offcanvas-body">
		    	<ul class="w-100" style="padding: 0; margin: 0;">
			        <li class="nav-item w-100 d-block fs-4 mt-1"><a class="dropdown-item" href="blog.php"><i class="bi bi-check2-all"></i> <?php echo $blogs['page']; ?></a></li>
			        <li class="nav-item w-100 d-block fs-4 mt-1"><a class="dropdown-item" href="blog.php?blog=new"><i class="bi bi-plus-circle"></i> <?php echo $blogs['add']; ?></a></li>
			    </ul>
		    </div>
	    </div>
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
					$stmt = $con->prepare("SELECT * FROM blogs");
	                $stmt->execute();
	                $rows = $stmt->fetchAll();
	            ?>

				<h1 class="text-center pt-2 pb-2"><?php echo $blogs['page'];?></h1>
				<table class="table table-bordered">
					<thead class="bg-dark" style="color: var(--white);">
						<tr>
							<th><?php echo $blogs['id'];?></th>
							<th><?php echo $blogs['img'];?></th>
							<th><?php echo $blogs['title'];?></th>
							<th><?php echo $blogs['author'];?></th>
							<th><?php echo $blogs['date'];?></th>
							<th><?php echo $blogs['links'];?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rows as $row):?>
							<tr>
								<td class="bg-light"># <?php echo $row['ID'];?></td>
								<td><?php echo $row['img'];?></td>
								<td><?php echo $row['title'];?></td>
								<?php if($row['authorID'] == 0):?>
									<td><?php echo $admin['userName'];?></td>
								<?php endif;?>
								<td><?php echo $row['date'];?></td>
								<td>
									<a href="blog.php?blog=view&id=<?php echo $row['ID'] ?>" class="btn btn-primary"><i class="bi bi-eye"></i> <?php echo $blogs['view'];?></a>
									<?php if($row['active'] == 0): ?>
										<a href="blog.php?blog=activate&id=<?php echo $row['ID'] ?>" class="btn btn-success"><i class="bi bi-bag-check"></i> <?php echo $blogs['activate'];?></a>
									<?php elseif($row['active'] == 1): ?>
										<a href="blog.php?blog=desactivate&id=<?php echo $row['ID'] ?>" class="btn btn-info"><i class="bi bi-bag-x"></i> <?php echo $blogs['desactivate'];?></a>
									<?php endif; ?>
									<a href="blog.php?blog=edit&id=<?php echo $row['ID'] ?>" class="btn btn-secondary"><i class="bi bi-file-earmark"></i> <?php echo $blogs['edit'];?></a>
									<a href="blog.php?blog=delete&id=<?php echo $row['ID'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i> <?php echo $blogs['delete'];?></a>
								</td>
							</tr>
						<?php endforeach;?>

					</tbody>
				</table>

			<?php elseif ($blog == 'new'):?>

				<h1 class="text-center pt-2 pb-2"><?php echo $page['members'];?></h1>
				<form id="login" class="pt-5" action="blog.php?blog=insert" method="POST"enctype="multipart/form-data">
					<span class="text-center"><h1><?php echo $blogs['add']; ?></h1><i class="bi bi-plus-circle" style="font-size: 6rem;margin-left: 45%;"></i></span>
					<h1><?php echo $blogs['title']; ?></h1>
					<input type="text" name="title">
					<h1><?php echo $blogs['desc']; ?></h1>
					<input type="text" name="desc" style="height: 100px;padding: 0;padding-left: 10px;" required>
					<h1><?php echo $blogs['image']; ?></h1>
					<input type="file" name="image" class="w-100" required>

						<?php if (isset($_GET['error'])): ?>
							<p><?php echo $_GET['error']; ?></p>
						<?php endif ?>

					<!--<button name="add" ></button>-->
					<input type="submit" name="add" class="btn mt-2 float-end mt-5 fs-4" style="background-color: #a067ab;padding: .5rem 3rem;"
                  		value="<?php echo $blogs['add']; ?>">
				</form>
			<?php elseif($blog == 'insert'):?>
				<?php
					  	
					  	if (isset($_POST['add']) && isset($_FILES['image'])) {

							/*echo "<pre>";
							print_r($_FILES['image']);
							echo "</pre>";*/

							$img_name = $_FILES['image']['name'];
							$img_size = $_FILES['image']['size'];
							$tmp_name = $_FILES['image']['tmp_name'];
							$error = $_FILES['image']['error'];

							if ($error === 0) {
								if ($img_size > 125000) {
									$em = "Sorry, your file is too large.";
								    header("Location: blog.php?blog=new&error=$em");
								}else {
									$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
									$img_ex_lc = strtolower($img_ex);

									$allowed_exs = array("jpg", "jpeg", "png"); 

									if (in_array($img_ex_lc, $allowed_exs)) {
										$new_img_name = uniqid("IMG-", false).'.'.$img_ex_lc;
										$img_upload_path = 'images/'.$new_img_name;
										move_uploaded_file($tmp_name, $img_upload_path);

										$title = $_POST['title'];
										$desc = $_POST['desc'];
										$date = date('y-m-d');
										$active = 1;

										// Insert into Database
										
				                            $stmt = $con->prepare("INSERT INTO blogs (img,title,description,date,active) VALUES (:zimg, :ztitle, :zdesc, :zdate, :zactive)");
				                            $stmt->execute(array(
				                                'zimg' => $new_img_name, 
				                                'ztitle' => $title, 
				                                'zdesc' => $desc,
				                                'zdate' => $date,
				                                'zactive' => $active
				                            ));
				                            echo '<h1 class="alert alert-success mt-5">' . $blogs["insert"] . ' </h1>';
				                            echo "<script>
				                            	 goBack(3000);
				                            </script>";
									}else {
										$em = "You can't upload files of this type";
								        header("Location: blog.php?blog=new&error=$em");
									}
								}
							}else {
								$em = "unknown error occurred!";
								header("Location: blog.php?blog=new&error=$em");
							}

						}else {
							header("Location: blog.php");
						}

				?>
			<?php elseif($blog == 'desactivate'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5"><?php echo $blogs['desactivate'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("UPDATE `blogs` SET `active` = '0' WHERE `blogs`.`ID` = ?;");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();
		            	?>
		            	<h1 class="alert alert-success mt-5"><?php echo $blogs['withID'];?> <?php echo $_GET['id'];?> <?php echo $blogs['desactivate'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5"><?php echo $blogs['notFound'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			<?php elseif($blog == 'activate'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5"><?php echo $blogs['desactivate'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("UPDATE `blogs` SET `active` = '1' WHERE `blogs`.`ID` = ?;");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();
		            	?>
		            	<h1 class="alert alert-success mt-5"><?php echo $blogs['withID'];?> <?php echo $_GET['id'];?> <?php echo $blogs['activate'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5"><?php echo $blogs['notFound'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			<?php elseif($blog == 'delete'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5"><?php echo $blogs['notFound'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("DELETE FROM `blogs` WHERE `blogs`.`ID` = ?");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();
		            	?>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['withID'];?> <?php echo $_GET['id'];?> <?php echo $blogs['delete'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>

					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5"><?php echo $blogs['notFound'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			<?php elseif($blog == 'view'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5"><?php echo $blogs['notFound'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("SELECT * FROM blogs WHERE ID = ?");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();

		            	?>     

		            	<h1 class="alert alert-light text-center mt-5"><?php echo $blogs['view'];?></h1>
		            	<section class="justify-content-center text-center">
	            		<?php   if ($row > 0):?>
						             
						             <div class="alb">
						             	<img src="images/IMG-<?php echo $row['img']?>.png">
						             </div>
						          		
								<?php endif;?>
		            	<h1><?php echo $row['title'];?></h1>
		            	<p><?php echo $row['description'];?></p>
		            	<p><?php echo $row['date'];?></p>
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
					<h1 class="alert alert-danger mt-5"><?php echo $blogs['notFound'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			<?php elseif($blog == 'edit'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5"><?php echo $blogs['notFound'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("SELECT * FROM blogs WHERE ID = ?");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();
		            	?>
				        <h1 class="text-center pt-2 pb-2"><?php echo $blogs['edit'];?></h1>
						<form id="login" class="pt-5" action="blog.php?blog=update" method="POST">
							<span class="text-center"><i class="bi bi-file-earmark" style="font-size: 6rem;margin-left: 45%;"></i></span>
							<h1><?php echo $blogs['title']; ?></h1>
							<input type="text" name="title" value="<?php echo $row['title']; ?>">
							<h1><?php echo $blogs['desc']; ?></h1>
							<input type="text" name="desc" style="height: 100px;padding: 0;padding-left: 10px;"  value="<?php echo $row['description']; ?>" required>
							<h1><?php echo $blogs['image']; ?></h1>
							<input type="file" name="image" class="w-100"  value="<?php echo $row['img']; ?>" required>
							<button name="add" class="btn mt-2 float-end mt-5 fs-4" style="background-color: #a067ab;padding: .5rem 3rem;"><?php echo $blogs['add']; ?></button>
						</form>
					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5"><?php echo $blogs['notFound'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $blogs['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			<?php else:?>
				<h1 class="alert alert-danger mt-5"><?php echo $blogs['notFound'];?></h1>
				<script type="text/javascript">
            		goBack(5000);
            	</script>
			<?php endif;?>

		</div>

	</main>
	

<?php include 'sidebar.php';?>

<?php include 'footer.php';?>