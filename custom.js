var makeChange=true;
$(function() {
	if(window.location.pathname=="/preciosa.ro/"){
		$('nav').addClass('transparent-nav');
	}
});

$(window).scroll(function(){
	if($(document).scrollTop()>50){
		$('nav').addClass('shrink');
	}
	else{
		if(makeChange==true)
			$('nav').removeClass('shrink');
	}
});

function navbarColorChange(){
	var nav=document.getElementById('navigation-bar');
	makeChange=!makeChange;
	if(window.location.pathname=="/preciosa.ro/"){
		if(document.documentElement.scrollTop<50 && nav.classList.contains('shrink')){
			nav.classList.remove('shrink');
			nav.classList.add('transparent-nav');
		}
		else
			if(document.documentElement.scrollTop<50){
				nav.classList.add('shrink');
			}
	}
}
