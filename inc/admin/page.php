<?php include 'header.php';?>

	<main class="pt-5">

		<div class="container pt-5">

			<?php // if the acttion request is exist
				if (isset($_GET['action'])):
					$action = $_GET['action'];
				else:
					$action = 'members';
				endif;
			 ?>

			<!------------------------ section ------------------------>
			<?php if ($action == 'all'):?>
				<?php
					$stmt = $con->prepare("SELECT ID,email,status,userName FROM users WHERE ID <> 0");
	                $stmt->execute();
	                $rows = $stmt->fetchAll();
	            ?>

				<h1 class="text-center pt-2 pb-2"><?php echo $page['members'];?></h1>
				<table class="table table-bordered">
					<thead class="bg-dark" style="color: var(--white);">
						<tr>
							<th><?php echo $page['id'];?></th>
							<th><?php echo $page['email'];?></th>
							<th><?php echo $page['userName'];?></th>
							<th><?php echo $page['status'];?></th>
							<th><?php echo $page['links'];?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rows as $row):?>
							<tr>
								<td class="bg-light"># <?php echo $row['ID'];?></td>
								<td><?php echo $row['email'];?></td>
								<td><?php echo $row['userName'];?></td>
								<td><?php echo $page['notAcivate'];?></td>
								<td>
									<a href="page.php?action=delete&id=<?php echo $row['ID'] ?>" class="btn btn-danger"><?php echo $page['delete'];?></a>
								</td>
							</tr>
						<?php endforeach;?>

					</tbody>
				</table>

			<?php elseif ($action == 'members'):?>
				<?php
					$stmt = $con->prepare("SELECT ID,email,userName FROM users WHERE status = 0");
	                $stmt->execute();
	                $rows = $stmt->fetchAll();
				?>
				<h1 class="text-center pt-2 pb-2"><?php echo $page['members'];?></h1>
				<table class="table table-bordered">
					<thead class="bg-dark" style="color: var(--white);">
						<tr>
							<th><?php echo $page['id'];?></th>
							<th><?php echo $page['email'];?></th>
							<th><?php echo $page['userName'];?></th>
							<th><?php echo $page['status'];?></th>
							<th><?php echo $page['links'];?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rows as $row):?>
							<tr>
								<td class="bg-light"># <?php echo $row['ID'];?></td>
								<td><?php echo $row['email'];?></td>
								<td><?php echo $row['userName'];?></td>
								<td><?php echo $page['notAcivate'];?></td>
								<td>
								   <a href="page.php?action=activate&id=<?php echo $row['ID'] ?>" class="btn btn-success"><?php echo $page['activate'];?></a>
									<a href="page.php?action=delete&id=<?php echo $row['ID'] ?>" class="btn btn-danger"><?php echo $page['delete'];?></a>
								</td>
							</tr>
						<?php endforeach;?>

					</tbody>
				</table>

			<?php elseif($action == 'activate'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5"><?php echo $page['delete'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $page['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("UPDATE `users` SET `status` = '1' WHERE `users`.`ID` = ?;");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();
		            	?>
		            	<h1 class="alert alert-success mt-5"><?php echo $page['withID'];?> <?php echo $_GET['id'];?> <?php echo $page['isactivated'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $page['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5"><?php echo $page['notFound'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $page['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
			
			<?php elseif($action == 'delete'):?>
				<?php if(isset($_GET['id'])): ?>
					<?php if ($_GET['id'] == ""):?>
						<h1 class="alert alert-danger mt-5"><?php echo $page['notFound'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $page['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
					<?php elseif($_GET['id'] <> ""):?>
						<?php
							$stmt = $con->prepare("DELETE FROM `users` WHERE `users`.`ID` = ?");
			                $stmt->execute(array($_GET['id']));
			                $row = $stmt->fetch();
		            	?>
		            	<h1 class="alert alert-danger mt-5"><?php echo $page['withID'];?> <?php echo $_GET['id'];?> <?php echo $page['isdeleted'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $page['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>

					<?php endif; ?>

				<?php else: ?>
					<h1 class="alert alert-danger mt-5"><?php echo $page['notFound'];?></h1>
		            	<h1 class="alert alert-danger mt-5"><?php echo $page['redirect'];?></h1>
		            	<script type="text/javascript">
		            		goBack(5000);
		            	</script>
				<?php endif;?>
				
		            
		        
			<?php endif;?>

		</div>

	</main>
	

<?php include 'sidebar.php';?>

<?php include 'footer.php';?>