<?php include 'header.php';?>

	<main>

		<div class="container">
			<div id="pricing" class="pt-5">
				<h1 class="text-center"><?php echo $pricing['header']; ?></h1>
				<table class="table table-bordered border-dark">
					<thead class="table-dark" >
						<tr>
							<th><?php echo $pricing['freeHeader']; ?></th>
							<th><?php echo $pricing['plusHeader']; ?></th>
							<th><?php echo $pricing['proHeader']; ?></th>
							<th><?php echo $pricing['proPlusHeader']; ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><span class="fs-4"><b><?php echo $pricing['freeLogo']; ?></span></b> <p><?php echo $pricing['freeDesc']; ?></p></td>
							<td><span class="fs-4"><b><?php echo $pricing['plusLogo']; ?></span></b> <p><?php echo $pricing['plusDesc']; ?></p></td>
							<td><span class="fs-4"><b><?php echo $pricing['proLogo']; ?></span></b> <p><?php echo $pricing['proDesc']; ?></p></td>
							<td><span class="fs-4"><b><?php echo $pricing['proPlusLogo']; ?></span></b><p><?php echo $pricing['proDescPlus']; ?></p></td>
						</td>
					</tbody>
				</table>
			</div>

			<div id="shop" class="row pt-5 pb-5">
				<h1 class="text-center">SHOP</h1>
				<div class="card-group">
				  <div class="card w-30" style="margin-right: 4%;">
				    <a href="#">
				    	<img src="<?php echo $img; ?>First Item.jpg" class="card-img-top" alt="first item image">
					</a>
				  </div>
	 			  <div class="card w-30" style="margin-right: 4%;">
				    <a href="#">
				    	<img src="<?php echo $img; ?>second Item.jpg" class="card-img-top" alt="second item image">
					</a>
				  </div>
				  <div class="card w-30">
				  	<a href="#">
				    	<img src="<?php echo $img; ?>Third Item.jpg" class="card-img-top" alt="third item image">
					</a>
				  </div>
				</div>
				<div class="card-group pt-5">
				  <div class="card w-30" style="margin-right: 5%;">
				    <a href="#">
				    	<img src="<?php echo $img; ?>Firth Item.jpg" class="card-img-top" alt="firth item image">
					</a>
				  </div>
				  <div class="card w-30" style="margin-right: 5%;">
				    <a href="#">
				    	<img src="<?php echo $img; ?>Fifth Item.jpg" class="card-img-top" alt="fifth item image">
					</a>
				  </div>
				  <div class="card w-30">
				  	<a href="#">
				    	<img src="<?php echo $img; ?>Sexth Item.jpg" class="card-img-top" alt="sexth item image">
					</a>
				  </div>
				</div>
			</div>

			<div id="blog" class="row pt-5 pb-5">
				<h1 class="text-center">BLOG</h1>
				<div class="card-group">
				  <div class="card w-30" style="margin-right: 4%;">
				    <a href="#">
				    	<img src="<?php echo $img; ?>First Blog.jpg" class="card-img-top" alt="first blog image">
					</a>
				  </div>
				  <div class="card w-30" style="margin-right: 4%;">
				    <a href="#">
				    	<img src="<?php echo $img; ?>second Blog.jpg" class="card-img-top" alt="second blog image">
					</a>
				  </div>
				  <div class="card w-30">
				  	<a href="#">
				    	<img src="<?php echo $img; ?>third Blog.jpg" class="card-img-top" alt="third blog image">
					</a>
				  </div>
				</div>
				<div class="card-group pt-5">
				  <div class="card w-30" style="margin-right: 5%;">
				    <a href="#">
				    	<img src="<?php echo $img; ?>firth Blog.jpg" class="card-img-top" alt="firth blog image">
					</a>
				  </div>
				  <div class="card w-30" style="margin-right: 5%;">
				    <a href="#">
				    	<img src="<?php echo $img; ?>fifth Blog.jpg" class="card-img-top" alt="fifth blog image">
					</a>
				  </div>
				  <div class="card w-30">
				  	<a href="#">
				    	<img src="<?php echo $img; ?>sexth Blog.jpg" class="card-img-top" alt="sexth blog image">
					</a>
				  </div>
				</div>
			</div>

			<div id="about" class="row pt-5 pb-5">
				<div class="float-start col-md-6 col-sm-6">
					<div class="card">
					   <img src="<?php echo $img; ?>about Blog.jpg" class="card-img-top" alt="about image">
					   <div class="card-body">
					      <h5 class="card-title"><?php echo $about['header']; ?></h5>
					      <p class="card-text"><?php echo $about['desc']; ?></p>
					    </div>
					</div>
				</div>
				<div class="float-end col-md-6 col-sm-6">
					<p class="card-text"><?php echo $about['aboutInfos']; ?></p>
					<a href="#" class="btn btn-primary" style="text-decoration: none;"><?php echo $about['btn']; ?></a>
				</div>
			</div>
		</div>

	</main>
	

<?php include 'sidebar.php';?>

<?php include 'footer.php';?>