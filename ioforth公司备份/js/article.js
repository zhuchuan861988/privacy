
if(ismobile() == "TRUE") {
	$(".onlypc").hide();
	$(".onlymo").show();
} else {
	$(".onlymo").hide();
	$(".onlypc").show();
}



if($(".spnavbar")){
	$(window).scroll(function() {
		var summary = $(".wrap_left h1").offset().top,
		scroll_height = document.body.scrollTop + document.documentElement.scrollTop;
		if(scroll_height > summary) {
			$(".spnavbar").addClass("showed");
		}else{
			$(".spnavbar").removeClass("showed");
		}
	});	
}

//navaside
$(".navaside h5").click(function(){
		$(this).parent("div").toggleClass("tsel").siblings().removeClass("tsel");
		$(this).next("ul").slideToggle(390).parent("div").siblings().children("ul").slideUp(390);
	})
		window.onload = function(){
		$(".navaside").addClass("navaside_switch");
	}
	$(".asdarw").mouseover(function(){
		$(".navaside").addClass("navaside_switch");
	})
	$(".asdarw").click(function(){
		$(".navaside").removeClass("navaside_switch");
	})

function findUrl() {
	var getUrl = window.location.href,
	asidea = $(".navaside a"),
	getHref = '';	
	if(getUrl.indexOf("?")>=0){
		getUrl= getUrl.substr(0,getUrl.indexOf("?"));
	}	
		for(var i =0; i<asidea.length; i++){
			var _this=asidea.eq(i)
			getHref = _this.attr("href");
			if(getHref===getUrl) {
				_this.parents("div").addClass("tsel");
				_this.parents("div").children("ul").css({'display':'block'});
				_this.parent("li").addClass("asel");								
				break;
			}
		}
	}	
	if($(".navaside").length>0){
		findUrl();
	}
	
	
$(".rsclm_top").click(function() {
   $("html, body").animate({ scrollTop: 0 }, 600);
})