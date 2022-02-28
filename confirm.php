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

<?php //PHP script



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
	<title><?php echo $login['header']; ?></title>
</head>
	<style type="text/css">
		#login input{
		  border: 5px solid #a067ab;
		  border-radius: 10px;
		  width: 100%;
		  padding: 10px 5px;
		  font-size: 1.8rem;
		}
	</style>
<body style="
		  	background-image: url(assets/img/loginBackground.jpg);
		    background-repeat: no-repeat;
		    background-position: 100% 40%;
		    background-size: 100% 95%;
		    background-color: #140d2e;
		    width: 100%;
		    height: 140vh;
		    color: var(--white);">

	<div class="container pb-5" style="height: 500px;">
		<div class="float-start pt-5">
			<div class="pt-5">
				<h1 id="headerLogin" class=" alert alert-success text-center justify-content-center pt-5 pb-5">We Send You Email To <?php echo $_GET['email']?> Please Confirm Your Account</h1>
			</div>
		</div>

	</div>
	<footer class="w100 text-center" style="height: 100px;">
		<h1><?php echo $footer['header']; ?><a href="index.php"><?php echo $footer['link']; ?></a></h1>
	</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" 
integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
</body>
</html>