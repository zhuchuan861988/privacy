
if(ismobile() == "TRUE") {
	$(".onlypc").hide();
	$(".onlymo").show();
} else {
	$(".onlymo").hide();
	$(".onlypc").show();
}


//navaside
$(".navaside h5").click(function(){
		$(this).parent("div").toggleClass("tsel").siblings().removeClass("tsel");
		$(this).next("ul").slideToggle(390).parent("div").siblings().children("ul").slideUp(390);
	})
		window.onload = function(){
		$(".navaside").addClass("navaside_switch");
	}
	$(".asdarop").mouseover(function(){
		$(".navaside").addClass("navaside_switch");
	})
	$(".asdarop").click(function(){
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

if($(".sptnavbar")){
	$(window).scroll(function() {
		var summary = $(".langauthor").offset().top,
		scroll_height = document.body.scrollTop + document.documentElement.scrollTop;
		if(scroll_height > summary) {
			$(".sptnavbar").addClass("showed");
		}else{
			$(".sptnavbar").removeClass("showed");
		}
	});
		
}

var win_width = document.body.clientWidth;
function right_scroll() {
	if(win_width < 980) {
		return false;
	}
	var scroll_height = document.body.scrollTop + document.documentElement.scrollTop,
		right_fixed = $(".column_pro_area").offset().top,
		ftheight = $(".inforfoot").offset().top - 800;
	$(window).scroll(function() {
		scroll_height = document.body.scrollTop + document.documentElement.scrollTop;

		if(scroll_height > right_fixed) {
			$(".column_pro_area").addClass("right_fixed");
		} else {
			$(".column_pro_area").removeClass("right_fixed");
		}
		
		if(scroll_height > ftheight) {
			$(".column_pro_area").removeClass("right_fixed");
		}
		
	});
}

if($(".column_right").length > 0 && ismobile() == "FALSE") {
	right_scroll();
}