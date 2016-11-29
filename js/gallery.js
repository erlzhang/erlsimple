var list = $('.single-pic');
var index = 0;
showpic(index);

list.click(function(){
	index = $(event.target).index();
	showpic(index);
})

$("#prevp").click(function(){
	if( index > -1 ){
		index--;
	}else{
		index = list.length-1;
	}
	showpic(index);
})

$("#nextp").click(function(){
	if( index < (list.length-1) ){
		index++;
	}else{
		index = 0;
	}
	showpic(index);
})

function showpic(index){
	console.log(index)
	$(".gallery_display img").hide();
	var src = list.eq(index).data("src");
	var pic = document.createElement("img");
	$(pic).attr("src",src)
	$(".gallery_display").html(pic);
	$(pic).fadeIn();
	list.removeClass("current").eq(index).addClass("current");
}
