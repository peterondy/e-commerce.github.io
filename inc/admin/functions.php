<?php 
//this function to translate the website to the language choose
function getLanguage($lang){
	// testing the lang parametre
	if($lang == 'en'){
		include 'languages/english.php';
	}elseif($lang == 'ar'){
		include 'languages/arabic.php';
	}
}







//function to goback?>
<script type="text/javascript">
    function goBack(minute) {
	    //setTimeout("history.go(-1);", minute);
	    setTimeout(function () {
		   window.location.href = history.go(-1); // the redirect goes here
		},minute);
	    //location.reload();
	    //window.innerHTML = "<h1 class='alert alert-danger mt-5'>goback after ". + minute + ." minutes</h1>";

		//window.location = window.location + '#loaded';	
    }
    //title function
	function printTitle($title){

			return $title;

	}
</script>
