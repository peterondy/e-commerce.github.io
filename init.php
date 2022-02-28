<?php 
//include connect file
include 'inc/conn/connect.php';
//include the files as variables
$englishLang = 'languages/english.php';
$arabicLang = 'languages/arabic.php';


//connect file


//global variables

	//show the language of the site
	if(isset($_GET['lang'])){
		if($_GET['lang'] == 'en'){
			$img = 'assets/img/eng/';
		}elseif($_GET['lang'] == 'ar'){
			$img = 'assets/img/ar/';
		}
	}else{
		$img = 'assets/img/eng/';
	}

//$img = "assets/img/";

$js  = 'assets/js/';

//include dashboar variables

$adminDash = 'inc/admin/';

$userDash = 'inc/users/';

