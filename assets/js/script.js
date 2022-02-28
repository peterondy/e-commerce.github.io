
//when scroll the window change the background
window.addEventListener('scroll', function(){
	let header = document.querySelector('header');
	header.classList.toggle('scrollHeader', window.scrollY > 0);
});

/*change background
var cycle = 0; 
var allBackgrounds = [ "assets/img/about-background.jpg", "assets/img/shop4.jpg",  "assets/img/shop1.jpg"];
let home = document.getElementById('home');
setInterval(function() { 
	if (cycle < 3) { 
		home.style.backgroundImage = "url('" + allBackgrounds[cycle] + "')"; 
		cycle += 1; 
	} else {  
		cycle = 0; 
	} 
}, 2000); 
*/
//show the word letter letter

	let i = 0;
function showLetter(i){
	let head = document.getElementById('header').innerHTML;
	if(i==0){
		document.getElementById('header').innerHTML = "";
	}
	setInterval(function(){
		if(i<head.length){
			document.getElementById('header').innerHTML += head[i];
			i++;
			showLetter(i);
		}
/*
		else{
			hideLetter(i);
		}*/
	}, 200);
}

//hide the words function
/*
function hideLetter(i){
	let head = document.getElementById('header').innerHTML;

	setInterval(function(){
		if(i>=0){
			document.getElementById('header').innerHTML -= head[i];
			i--;
			hideLetter(i);
		}else{
			showLetter(i);
		}
	}, 200);
}*/

//display the form
$(document).ready(function(){
	$("button").on('click', function(){
		$("button").css("display", "block").addClass("text-center");
		$(this).css("display", "none");
		$("form").css("display", "none");
		$("form#"+this.id).css("display", "block").addClass("formStyle");
	})
	$('button').on('click', function(){
		$(this).css('border', '0');
	})
});
