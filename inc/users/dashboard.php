<?php include 'header.php';?>


	<script type="text/javascript">
		var getLoginData = issetLoginData();
	</script>

	<main class="pt-5">

		<div class="container pt-5">

			<!------------------------ section ------------------------>
				<?php if ($_GET['id'] == ""):?>
					<h1 class="alert alert-danger mt-5"><?php echo $dashboard['pageNotFound']; ?><?php echo $dashboard['redirect']; ?></h1>
					<script type="text/javascript">
	            		goBack(5000);
	            	</script>
				<?php elseif($_GET['id'] <> ""): ?>
					<section class="pt-5">
						<h1 class="text-center"><?php echo $dashboard['welcome']; ?> <?php echo $user['userName']; ?><i class="bi bi-person-check-fill pt-2"></i></h1>
						<section class="mt-4 mb-4 pt-2 pb-2 row text-center justify-content-center" style="border: none !important;">
	                    	<div class="col-md-2 col-sm-2 bg-primary m-2 pt-4 pb-4" style="color: var(--white);border-radius: 10px;"><i class="bi bi-bell float-start"></i><h3><?php echo $dashboard['notifications']; ?></h3>
	                            <a href="#" class="nav-link" style="color: yellow;"><span class="span-pay-style"><?php echo $header['goToNotifications'];?><span></a>
	                    	</div>

	                    	<div class="col-md-2 col-sm-2 bg-success m-2 pt-4 pb-4" style="color: var(--white);border-radius: 10px;"><i class="bi bi-shop float-start"></i><h3><?php echo $dashboard['store']; ?></h3>
	                            <a href="store.php?id=<?php echo $_GET['id'];?>" class="nav-link" style="color: yellow;"><span class="span-pay-style"><?php echo $header['goToStore'];?><span></a>
	                    	</div>

							<div class="col-md-2 col-sm-2 bg-danger m-2 pt-4 pb-4" style="color: var(--white);border-radius: 10px;"><i class="bi bi-pencil-square float-start"></i><h3><?php echo $dashboard['blog']; ?></h3>
	                            <a href="blog.php?id=<?php echo $_GET['id'];?>" class="nav-link" style="color: yellow;"><span class="span-pay-style"><?php echo $header['goToBlog'];?><span></a>
	                    	</div>

	                    	<div class="col-md-2 col-sm-2 bg-dark m-2 pt-4 pb-4" style="color: var(--white);border-radius: 10px;"><i class="bi bi-gear float-start"></i><h3><?php echo $dashboard['settings']; ?></h3>
	                            <a href="settings.php?id=<?php echo $_GET['id'];?>" class="nav-link" style="color: yellow;"><span class="span-pay-style"><?php echo $header['goToSettings'];?><span></a>
	                    	</div>
			            </section>
			            <?php 
			            	$stmt = $con->prepare("SELECT * FROM cart WHERE userID = ?");
			                $stmt->execute(array($_GET['id']));
			                $rows = $stmt->fetchAll();
			            ?>
			            <h1 class="text-center"><?php echo $dashboard['allTransactions']; ?></h1>
						<table class="table table-bordered">
							<thead class="bg-dark" style="color: var(--white);">
								<tr>
									<th><?php echo $dashboard['userID']; ?></th>
									<th><?php echo $dashboard['itemNumber']; ?></th>
									<th><?php echo $dashboard['price']; ?></th>
									<th><?php echo $dashboard['delete']; ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($rows as $row): ?>
									<tr>
										<td class="bg-light"># <?php echo $row['userID']; ?></td>
										<td><?php echo $row['storeID']; ?></td>
										<td>
											<?php echo $row['price']; ?>
										</td>
										<td>
											<a href="page.php" class="btn btn-danger"><i class="bi bi-trash"></i> <?php echo $dashboard['delete']; ?></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</section>
				<?php endif; ?>
		</div>

	</main>
	

<?php include 'sidebar.php';?>

<?php include 'footer.php';?>