//滚动显示顶部导航栏
$(window).scroll(function(){
	if($(window).scrollTop() > 10){
		$('.nav-bar').fadeIn();
	}else{
		$('.nav-bar').fadeOut();
	};
});
