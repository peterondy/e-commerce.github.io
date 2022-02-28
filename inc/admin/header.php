<?php include 'init.php';
 
//show the language of the site
if(isset($admin['lang'])){
	if($admin['lang'] == 'en'){
		include $englishLang;
	}elseif($admin['lang'] == 'ar'){
		include $arabicLang;
	}
}else{
	include $englishLang;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" 
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	
	<link rel="icon" type="image/x-icon" href="<?php echo $img;?>ECOMMERCE.jpg">
	<?php if(isset($admin['lang'])): 
			if($admin['lang'] == 'en'):?>
				<link rel="stylesheet" type="text/css" href="<?php echo $css;?>englishStyle.css">
		<?php elseif($admin['lang'] == 'ar'):?>
				<link rel="stylesheet" type="text/css" href="<?php echo $css;?>arabicStyle.css">
		<?php endif;
	else:?>
		<link rel="stylesheet" type="text/css" href="<?php echo $css;?>englishStyle.css">
	<?php endif;?>
	<title><?php echo $header['websiteTitle']; ?></title>
</head>
<body lang="<?php echo $header['language']; ?>" class="fs-4">


	<header class="position-fixed" style="background-color: var(--blue);">
		<nav class="navbar navbar-expand-lg">
		  <div class="container-fluid justify-content-center">
		    <a class="navbar-brand" href="dashboard.php"><?php echo $header['brand']; ?></a>
		    <button class="btn btn-danger float-start" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><?php echo $header['btn']; ?></button>
		  </div>
		</nav>
	</header>

				<!-----------------------off canvas ------------------------>

	<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
	  <div class="offcanvas-header  bg-success">
	    <h5 class="offcanvas-title" id="offcanvasExampleLabel"><?php echo $header['leftTool']; ?></h5>
	    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	  </div>
	  <div class="offcanvas-body">
	      <ul class="w-100" style="padding: 0; margin: 0;">
	        <li class="nav-item w-100 d-block fs-4 bg-success"><a class="dropdown-item" href="page.php"><?php echo $header['pages']; ?></a></li>
	        <li class="nav-item w-100 d-block fs-4 bg-success mt-1"><a class="dropdown-item" href="stats.php">Stats</a></li>
	        <li class="nav-item w-100 d-block fs-4 bg-success mt-1"><a class="dropdown-item" href="profile.php"><?php echo $header['profile']; ?></a></li>
	        <li class="nav-item w-100 d-block fs-4 bg-success mt-1"><a class="dropdown-item" href="store.php"><?php echo $header['store']; ?></a></li>
	        <li class="nav-item w-100 d-block fs-4 bg-success mt-1"><a class="dropdown-item" href="blog.php"><?php echo $header['blog']; ?></a></li>
	        <li class="nav-item w-100 d-block fs-4 bg-success mt-1"><a class="dropdown-item" href="settings.php"><?php echo $header['settings']; ?></a></li>
	      </ul>
	  </div>
	</div>