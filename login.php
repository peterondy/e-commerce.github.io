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
		.formStyle input{
		  border: 5px solid #a067ab;
		  border-radius: 10px;
		  width: 100%;
		  padding: 10px 5px;
		  font-size: 1.8rem;
		}
		#login input{
		  border: 5px solid #a067ab;
		  border-radius: 10px;
		  width: 100%;
		  padding: 10px 5px;
		  font-size: 1.8rem;
		}
		#signIn input{
		  border: 5px solid #a067ab;
		  border-radius: 10px;
		  width: 100%;
		  padding: 10px 5px;
		  font-size: 1.8rem;
		}
		#adminLogin input{
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

	<div class="container pb-5" style="height: 1000px;">
		<div class="float-start col-md-6 pt-5">
			<div class="pt-5" style="margin-top: 10rem; margin-left: 25%;">
				<h1 id="headerLogin" class="text-center justify-content-center pt-5 pb-5"><?php echo $login['loginPage']; ?></h1>
				<div class="text-center" id="divBtn" style="margin-left: 25%;">
					<button id="signIn" title="Create Ben Account If You Don't Have Account" class="btn" style="background-color: #a067ab;"><?php echo $login['signIn']; ?></button><br>
					<button id="login" title="Login With Your Informations If You Have Account" class="btn mt-2" style="background-color: #a067ab;display: none;"><?php echo $login['login']; ?></button><br>
					<button id="adminLogin" title="Login With Admin Informations If You Are The Admin" class="btn mt-2" style="background-color: #a067ab;"><?php echo $login['adminLogin']; ?></button>
				</div>
			</div>
		</div>
		<div class="float-end col-md-5 pt-5">

			<form id="login" class="pt-5" action="loginConnect.php" method="POST">
				<span class="text-center"><h1><?php echo $login['loginFromHeader']; ?></h1><i class="bi bi-person-circle " style="font-size: 6rem;margin-left: 45%;"></i></span>
				<h1><?php echo $login['loginFromEmail']; ?></h1>
				<input type="text" name="action" value="login" style="display: none !important;">
				<input type="email" name="email" required>
				<h1><?php echo $login['loginFromUsernamer']; ?></h1>
				<input type="text" name="user" required>
				<h1><?php echo $login['loginFromPassword']; ?></h1>
				<input type="number" name="pass" required>
				<button id="loginGo" title="Login With Admin Informations If You Are The Admin" class="btn mt-2 float-end mt-5 fs-4" style="background-color: #a067ab;padding: .5rem 3rem;"><?php echo $login['go']; ?></button>
			</form>

			<form id="signIn" class="pt-5" action="loginConnect.php" method="POST" style="display: none;">
				<span class="text-center"><h1><?php echo $login['signInFromHeader']; ?></h1><i class="bi bi-person-circle " style="font-size: 6rem;margin-left: 45%;"></i></span>
				<h1><?php echo $login['loginFromEmail']; ?></h1>
				<input type="text" name="action" value="signin" style="display: none !important;">
				<input type="email" name="signEmail" required>
				<h1><?php echo $login['loginFromUsernamer']; ?></h1>
				<input type="text" name="signUser" required>
				<h1><?php echo $login['loginFromPassword']; ?></h1>
				<input type="number" name="signPass" required>
				<h1><?php echo $login['confirmPassFromHeader']; ?></h1>
				<input type="number" name="confPass" required>
				<button id="signInGo" title="Login With Admin Informations If You Are The Admin" class="btn mt-2 float-end mt-5 fs-4" style="background-color: #a067ab;padding: .5rem 3rem;"><?php echo $login['go']; ?></button>
			</form>

			<form id="adminLogin" class="pt-5" action="loginConnect.php" method="POST" style="display: none;">
				<span class="text-center"><h1><?php echo $login['adminLoginFromHeader']; ?></h1><i class="bi bi-person-circle " style="font-size: 6rem;margin-left: 45%;"></i></span>
				<h1><?php echo $login['loginFromEmail']; ?></h1>
				<input type="text" name="action" value="admin" style="display: none !important;">
				<input type="email" name="email" required>
				<h1><?php echo $login['loginFromUsernamer']; ?></h1>
				<input type="text" name="user" required>
				<h1><?php echo $login['loginFromPassword']; ?></h1>
				<input type="number" name="pass" required>
				<button id="adminGo" title="Login With Admin Informations If You Are The Admin" class="btn mt-2 float-end mt-5 fs-4" style="background-color: #a067ab;padding: .5rem 3rem;"><?php echo $login['go']; ?></button>
			</form>

		</div>

	</div>
	<footer class="w100 text-center" style="height: 100px;">
		<h1><?php echo $footer['header']; ?><a href="index.php"><?php echo $footer['link']; ?></a></h1>
	</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
//display the form
$(document).ready(function(){
	$("div#divBtn>button").on('click', function(){
		$("div#divBtn>button").css("display", "block").addClass("text-center");
		$(this).css("display", "none");
		$("form").css("display", "none");
		$("form#"+this.id).css("display", "block").addClass("formStyle");
	})
});

//verify with ajax
/*
$(document).ready(function(){
	$("form>button").on('click', function(){
		var $action = this.id;
		if($action == "loginGo"){
			$("#message").load("loginConnect.php",{
				action: $action,
				email: $_POST['email'],
				username: $_POST['user'],
				password: $_POST['pass']
			});
		}
	});
});

function verifyAJAX(action) {
  if (action == "loginGo") {

	  const xhttp = new XMLHttpRequest();
	  xhttp.onload = function() {
	    document.getElementById("message").innerHTML = this.responseText;
	  }
	  xhttp.open("POST", "loginConnect.php?action="+action+"email="+$_POST['email']+"username="+$_POST['user']+"password="+$_POST['pass']);
	  xhttp.send();
	  alert(xhttp);

  }else if(action == "signInGo"){

  }else if(action == "adminGo"){

  }

}
*/
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" 
integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
</body>
</html>