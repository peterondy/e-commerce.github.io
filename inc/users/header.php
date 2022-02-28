<?php include 'init.php';
 
//show the language of the site
if(isset($user['language'])){
	if($user['language'] == 'en'){
		include $englishLang;
	}elseif($user['language'] == 'ar'){
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
	<?php if(isset($user['language'])): 
			if($user['language'] == 'en'):?>
				<link rel="stylesheet" type="text/css" href="<?php echo $css;?>englishStyle.css">
		<?php elseif($user['language'] == 'ar'):?>
				<link rel="stylesheet" type="text/css" href="<?php echo $css;?>arabicStyle.css">
		<?php endif;
	else:?>
		<link rel="stylesheet" type="text/css" href="<?php echo $css;?>englishStyle.css">
	<?php endif;?>
	<title><?php echo $header['websiteTitle'];?></title>
</head>
<body lang="<?php echo $user['language']; ?>" class="fs-4">


	<header class="position-fixed" style="background-color: var(--blue);">
		<nav class="navbar navbar-expand-lg">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="dashboard.php"><?php echo $header['websiteTitle'];?></a>
		    <button class="btn btn-primary float-end" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="margin-top: 1rem; margin-right: 1rem"><?php echo $header['showToolsButton'];?><i class="bi bi-arrow-right-circle" style="margin-left: 1rem;"></i></button>
		  </div>
		</nav>
	</header>

				<!----------------------- off canvas ------------------------>


		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="overflow-x: hidden !important;">
		 	<div class="offcanvas-header">
		    	<h5 id="offcanvasRightLabel"><?php echo $header['tools'];?></h5>
		    	<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		    </div>
		    <div class="offcanvas-body">
		    	<ul class="w-100" style="padding: 0; margin: 0;">
			        <li class="nav-item w-100 d-block fs-4 mt-1"><a class="dropdown-item" href="dashboard.php?id=<?php echo $_GET['id'];?>"><i class="bi bi-speedometer2 m-1"></i><?php echo $header['goToDashboard'];?></a></li>
			        <li class="nav-item w-100 d-block fs-4 mt-1"><a class="dropdown-item" href="blog.php?id=<?php echo $_GET['id'];?>"><i class="bi bi-pencil float-start m-1"></i><?php echo $header['goToBlog'];?></a></li>
			        <li class="nav-item w-100 d-block fs-4 mt-1"><a class="dropdown-item" href="store.php?id=<?php echo $_GET['id'];?>"><i class="bi bi-shop float-start m-1"></i><?php echo $header['goToStore'];?></a></li>
			        <li class="nav-item w-100 d-block fs-4 mt-1"><a class="dropdown-item" href="settings.php?id=<?php echo $_GET['id'];?>"><i class="bi bi-gear float-start m-1"></i><?php echo $header['goToSettings'];?></a></li>
			    </ul>
		    </div>
	    </div>