<?php include 'header.php';?>

	<main class="pt-5">

		<div class="container pt-5">

			<!------------------------ section ------------------------>

			<section class="pt-5">
				<h1 class="text-center"><?php echo $dashboard['h1'];?> <?php echo $admin['name'];?></h1>
				<table class="table table-bordered">
					<thead class="bg-dark" style="color: var(--white);">
						<tr>
							<th><?php echo $dashboard['rows'];?></th>
							<th><?php echo $dashboard['infos'];?></th>
							<th><?php echo $dashboard['url\'s'];?></th>							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="bg-light"><?php echo $dashboard['members'];?></td>
							<td><span class="bg-success p-2 m-1 mt-1">125</span><?php echo $dashboard['signed'];?></td>
							<td>
								<a href="page.php" class="btn btn-secondary"><?php echo $dashboard['view'];?></a>
							</td>
						</tr>
						<tr>
							<td class="bg-light"><?php echo $dashboard['items'];?></td>
							<td><span class="bg-success p-2 m-1 mt-1">125</span><?php echo $dashboard['buyed'];?></td>
							<td>
								<a href="items.php" class="btn btn-secondary"><?php echo $dashboard['view'];?></a>
							</td>
						</tr>
						<tr>
							<td class="bg-light"><?php echo $dashboard['contacts'];?></td>
							<td><span class="bg-success p-2 m-1 mt-1">125</span><?php echo $dashboard['contacts'];?></td>
							<td>
								<a href="contact.php" class="btn btn-secondary"><?php echo $dashboard['view'];?></a>
							</td>
						</tr>
					</tbody>
				</table>
			</section>


		</div>

	</main>
	

<?php include 'sidebar.php';?>

<?php include 'footer.php';?>