/*
AJAX COMMENT
Author: Erl
Author URI: https://github.com/erlzhang
*/

var respond = $("#respond");

var changeMsg = "[ 更改 ]";
var closeMsg = "[ 隐藏 ]";
function toggleCommentAuthorInfo() {
	jQuery('#comment-author-info').slideToggle('slow', function(){
		if ( jQuery('#comment-author-info').css('display') == 'none' ) {
		jQuery('#toggle-comment-author-info').text(changeMsg);
		} else {
		jQuery('#toggle-comment-author-info').text(closeMsg);
}
});
}
jQuery(document).ready(function(){
	jQuery('#comment-author-info').hide();
});

addComment = {
	moveForm: function(commId, parentId, respondId, postId, num){
		var reply = document.getElementById("replying"),
			parent = document.getElementById("comment_parent");
		event.preventDefault();
		respond.insertAfter("#"+commId);
		$(reply).show()
		$("#replying-parent").html($("#"+commId).find(".fn").html())
		parent.value = parentId;
		reply.onclick = function(){
			respond.insertAfter("#respond_box");
			parent.value = "0";
			this.style.display = "none";
			this.onclick = null;
			return false
		}
	}
}
$("#commentform").submit(function(){
	event.preventDefault();
	$("#replying").hide();
	$("#loading").show();
	$("#submit").attr("disabled",true).fadeTo("slow",.5);
	$.ajax({
		url : Myajax.ajaxurl,
		data : $(this).serialize() + '&action=submit_comment',
		type: $(this).attr("method"),
		error: function(request){
			$("#success, #loading").fadeOut(0);
			$("#error").html("<p><strong>错误：</strong>服务器通讯失败，请稍后重试。</p>").show();
		},
		complete: function(req) {
			setTimeout(function(){
				$("#success, #error,#loading").fadeOut(1500);
				$("#submit").attr("disabled",false).fadeTo("slow",1);
			},1500);
		},
		success:function(data){
			$("#loading").hide();
			var div = document.createElement("div");
			div.innerHTML = data;
			if (data == "0"){
				$("#error").html("<p><strong>错误：</strong>服务器通讯失败，请刷新页面后重试。</p>").show();
			}
			if( $(div).find("#comment-error").length > 0){
				//评论提交失败
				$("#error").html(data).show();
			}else{
				//评论提交成功
				$("#success").show();
				var p = $(data).data("parent");
				var container;
				if(p == 0){
					container = $(".comment-list");
				}else{
					//cancelReply();
					if($("#comment-" + p).find("ul.children").length > 0){
						container = $("#comment-" + p).find("ul.children")
					}else{
						container = document.createElement("ul");
						container = $(container);
						container.addClass("children").hide();
						$("#comment-" + p).append(container);
						container.fadeIn();
					}
				}
				container.prepend(data);
				$('html,body').animate({
					scrollTop: container.offset().top - 100
				})
			}
			$("#comment").val("");
			$("#comment").text("");
		}
	});
});
