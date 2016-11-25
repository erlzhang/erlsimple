$(document).ready(function() {
	/*下拉菜单*/
	$(".menu li.menu-item-has-children").hover(function() {
		$(this).children("ul").slideDown();
	}, function() {
		$(this).children("ul").hide();
	});
	
	/*移动端导航顶部*/
	var toggleMenu = $(".toggle-menu"),
		siteNav = $(".menu");

	function revealMenu() {
		siteNav.slideToggle(300);
		$(this).find("i").toggleClass("fa-bars fa-times");
	}
	toggleMenu.on("click", revealMenu);
	var toggleSearch = $(".toggle-search"),
		inputAndSearch = $(".input-search-screen, .toggle-search");

	function revealSearch() {
		inputAndSearch.toggleClass("active");
		$(".input-search-screen.active").focus();
		$(this).find("i").toggleClass("fa-search fa-times");
	}
	toggleSearch.on("click", revealSearch);
	function revealExif() {
		$(".exif").toggleClass("active");
		$(this).find("i").toggleClass("fa-info fa-times");
	}
	$(".toggle-exif").on("click", revealExif);
	
	
	$("span.smiles-icons").click(function() {
		$(".smileys").slideToggle()
	});
	$("span.page-links-title").click(function() {
		$(".page-links").toggle()
	});
	$("a.url").attr("target", "_blank");
	$(".tags-list a,.comment_list a,.sider_list a").addClass("tooltip");
	$(".tooltip").tooltipster();
	$(".qq").tooltipster({
		interactive: true
	});
	
	
	
});

$(window).scroll(function() {
	if ($(window).scrollTop() > 300) {
		$("#top").fadeIn(1000)
	} else {
		$("#top").fadeOut(1000)
	}
});
$("#top").click(function() {
	$("html,body").animate({
		scrollTop: "0px"
	}, 800);
	return false
});
//边栏状态更新
$(document).ready(function(){
	if(document.getElementsByClassName("author_status_inner")[0]){
		var c=$(".author_status_inner")
		var a=c.children().length
		setInterval(function(){
			t=c.position().top
			if(t<-(a-2)*100){
				c.css("top","100px")
			}
				c.animate({
					top:"-=100px"
				},1000);	
		},7000);		
	}

});
$('.menu-item-has-children>a').append('&nbsp;&nbsp;<i class="fa fa-caret-down"></i>');
