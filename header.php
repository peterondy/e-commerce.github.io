<?php include 'init.php';

//show the language of the site
if(isset($_GET['lang'])){
	if($_GET['lang'] == 'en'){
		include $englishLang;
	}elseif($_GET['lang'] == 'ar'){
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
	
	<link rel="icon" type="image/x-icon" href="assets/img/ECOMMERCE.jpg">
	<?php if(isset($_GET['lang'])): 
			if($_GET['lang'] == 'en'):?>
				<link rel="stylesheet" type="text/css" href="assets/css/englishStyle.css">
		<?php elseif($_GET['lang'] == 'ar'):?>
				<link rel="stylesheet" type="text/css" href="assets/css/arabicStyle.css">
		<?php endif;
	else:?>
		<link rel="stylesheet" type="text/css" href="assets/css/englishStyle.css">
	<?php endif;?>
	<title><?php echo $lang['websiteTitle']; ?></title>
</head>
<body lang="<?php echo $lang['language']; ?>">


	<header class="position-fixed">
		<nav class="navbar navbar-expand-lg" style="background-color: none;">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="index.php"><?php echo $lang['brand']; ?></a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#home"><?php echo $lang['home']; ?></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#pricing"><?php echo $lang['pricing']; ?></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#shop"><?php echo $lang['shop']; ?></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#blog"><?php echo $lang['blog']; ?></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#about"><?php echo $lang['about']; ?></a>
		        </li>
		        <li class="nav-item float-end"/>
		          <a class="nav-link btn-danger" href="login.php?lang=<?php echo $_GET['lang'];?>"><?php echo $lang['login']; ?></a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</header>

	<section class="home">
		<div class="container" style="padding-top: 15rem;">
			<h1 onclick="showLetter(0)" id="header" style="color: var(--white);"><?php echo $home['header']; ?></h1>
			<p id="paragraph" style="color: var(--white);padding-left: 2rem;"><?php echo $home['desc']; ?></p>
		</div>
	</section>