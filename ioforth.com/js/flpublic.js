// JavaScript Document 
if($(".sptnavbar")){
	$(window).scroll(function() {
		var summary = 500,
		scroll_height = document.body.scrollTop + document.documentElement.scrollTop;
		if(scroll_height > summary) {
			$(".sptnavbar").addClass("showed");
		}else{
			$(".sptnavbar").removeClass("showed");
		}
	});
		
}	
