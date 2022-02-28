<?php include 'header.php';?>
<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'):

	$err = "";
    //check if the user exist in the database
    if ($_POST['oldPassword'] ==  $admin['password']):

        $stmt = $con->prepare("UPDATE `users` SET `name`,`userNale`,`email` = '1' WHERE `users`.`ID` = 2;");
        $stmt->execute(array($_POST['email'], $_POST['user'], $_POST['pass']));
        $row = $stmt->fetch();
        $count = $stmt->rowCount();
               
        if($count == 1){     //register session password
            

            header('Location: ' . $userDash . 'dashboard.php?lang='. $_GET['lang'] .'&id=' . $row['ID']);  //redirect to dashboard page

            exit();

        $err = "<h4 class='alert alert-success' role='alert'>Your Data Are Updated</h4>"?>

        <script type="text/javascript">
    		goBack(5000);
    	</script>

<?php
    elseif ($_POST['action'] == 'signin'):
            
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
				<h1 class="text-center"><?php echo $dashboard['h1'];?> <?php echo $admin['name'];?></h1>
				<form id="login" class="pt-5" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
					<span class="text-center"><i class="bi bi-gear-fill" style="font-size: 6rem;margin-left: 45%;"></i></span>
					<h1><?php echo $err;?></h1><br>
					<h1><?php echo $settings['userName'];?></h1>
					<input type="text" name="name" value="<?php echo $admin['name'];?>" required>
					<h1><?php echo $settings['email'];?></h1>
					<input type="email" name="email" value="<?php echo $admin['email'];?>" required>
					<h1><?php echo $settings['userName'];?></h1>
					<input type="text" name="user" value="<?php echo $admin['userName'];?>" required>
					<h1><?php echo $settings['password'];?></h1>
					<input type="number" name="pass">
					<h1><?php echo $settings['oldPassword'];?></h1>
					<input type="number" name="oldPass" required>
					<button id="loginGo" title="Login With Admin Informations If You Are The Admin" class="btn mt-2 float-end mt-5 fs-4" style="background-color: #a067ab;padding: .5rem 3rem;"><?php echo $settings['button'];?></button>
				</form>
			</section>


			<section id="settings" class="pt-5">
				<h1 class="text-center"><?php echo $dashboard['h1'];?> <?php echo $admin['name'];?></h1>
				<form id="login" class="pt-5" action="admin.php" method="POST">
					<span class="text-center"><i class="bi bi-gear-fill" style="font-size: 6rem;margin-left: 45%;"></i></span>
					<input type="text" name="action" value="login" style="display: none !important;">
					<h1><?php echo $settings['email'];?></h1>
					<input type="email" name="email" required>
					<h1><?php echo $settings['userName'];?></h1>
					<input type="text" name="user" required>
					<h1><?php echo $settings['password'];?></h1>
					<input type="number" name="pass">
					<h1><?php echo $settings['oldPassword'];?></h1>
					<input type="number" name="oldPass" required>
					<button id="loginGo" title="Login With Admin Informations If You Are The Admin" class="btn mt-2 float-end mt-5 fs-4" style="background-color: #a067ab;padding: .5rem 3rem;"><?php echo $settings['button'];?></button>
				</form>
			</section>
		</div>

	</main>
	

<?php include 'sidebar.php';?>

<?php include 'footer.php';?>