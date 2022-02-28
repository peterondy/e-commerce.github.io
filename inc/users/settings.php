<?php include 'header.php';?>
<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'):

	$err = "";
    //check if the user exist in the database
    if ($_POST['oldPassword'] ==  $user['password']):

        $stmt = $con->prepare("UPDATE `users` SET `name`,`email`,`userName`,`language` WHERE `users`.`ID` = ?;");
        $stmt->execute(array($_POST['name'], $_POST['email'], $_POST['user'], $_POST['lang'], $_GET['id']));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
               
        if($count == 1):     //register session password
            

            header('Location: ' . $userDash . 'dashboard.php?id=' . $row['ID']);  //redirect to dashboard page

            exit();

        	$err = "<h4 class='alert alert-success' role='alert'>Your Data Are Updated</h4>"?>;
        <?php endif;?>
        <script type="text/javascript">
    		goBack(5000);
    	</script>

	<?php else:
            
        $err = "<h4 class='errorMessage alert alert-danger' role='alert'>Enter The Correct Password</h4>"


        //header('Location: confirm.php?lang='. $_GET['lang'] .'&email=' . $_POST['signEmail']);  //redirect to dashboard page?>

        <script type="text/javascript">
    		goBack(5000);
    	</script>
        
        <?php 
    endif;
endif;

?>
	<main class="pt-5">
<?php $err = "";?>
		<div class="container pt-5">

			<!------------------------ section ------------------------>

			<section id="settings" class="pt-5 fs-4">
				<h1 class="text-center">Settings Page</h1>
				<form id="login" class="pt-5" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
					<span class="text-center"><i class="bi bi-gear-fill" style="font-size: 6rem;margin-left: 45%;"></i></span>
					<h1><?php echo $err;?></h1><br>
					<h1>Full Name</h1>
					<input class="p-2" type="text" name="name" value="<?php echo $user['fullName'];?>" required>
					<h1>Email</h1>
					<input class="p-2" type="email" name="email" value="<?php echo $user['email'];?>" required>
					<h1>User Name</h1>
					<input class="p-2" type="text" name="user" value="<?php echo $user['userName'];?>" required>
					<h1>Language</h1>
					<input class="p-2" type="text" name="lang" value="<?php echo $user['language'];?>" required>
					<h1>Password</h1>
					<input class="p-2" type="number" name="pass">
					<h1>Old Password</h1>
					<input class="p-2" type="number" name="oldPass" required>
					<button id="loginGo" title="Save The Informations" class="btn mt-2 float-end mt-5 fs-4" style="background-color: #a067ab;padding: .5rem 3rem;">Save</button>
				</form>
			</section>

		</div>

	</main>
	

<?php include 'sidebar.php';?>

<?php include 'footer.php';?>