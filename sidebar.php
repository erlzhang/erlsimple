<div class="sidebar">
<?php 
$option=get_option('erlsimple_theme_options');
if($option['if_author']==1):
	require_once('includes/author_status.php');
endif;
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) :?>
		<?php dynamic_sidebar( 'sidebar-1' );?>
<?php endif; ?>
    <aside class="widget">
		<h3 class="widget-title"><i class="fa fa-bookmark-o"></i>&nbsp;&nbsp;标签<em>/Tags</em></h3>
		<div class="tags-list">
			<?php wp_tag_cloud('smallest=14&largest=14&unit=px&number=30&orderby=count&order=DESC');?>
		</div>	
	</aside>
	<aside class="widget">
		<h3 class="widget-title">
			<i class="fa fa-comment-o"></i>&nbsp;&nbsp;最新评论<em>/Comments</em>
		</h3>
		<div class="comment_list">
			<?php
			global $wpdb;
			$my_email = get_bloginfo ('admin_email');
			$sql = "
			SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,12) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND comment_author_email != '$my_email' ORDER BY comment_date_gmt DESC LIMIT 5";
			$comments = $wpdb->get_results($sql);
			$output='';
			foreach ($comments as $comment) {
				$output .= "\n<li>".get_avatar(get_comment_author_email(), 50).strip_tags($comment->comment_author).":<br />" . " <a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"查看 " .$comment->post_title . "\">" . strip_tags($comment->com_excerpt)."</a></li>";
			}
			echo $output;
			?> 	
		</div>
	</aside>
	<?php if ($option['friendlink']==1):?>
    <aside class="widget">
		<h3 class="widget-title"><i class="fa fa-users"></i>&nbsp;&nbsp;友情链接<em>/Links</em></h3>
        <div class="sider_list">
			<?php
			$bookmarks = get_bookmarks('title_li=&orderby=rand');//全部链接随机输出
			if ( !empty($bookmarks) ) {
				foreach ($bookmarks as $bookmark) {
				echo '<li><a href="' , $bookmark->link_url , '" title="' , $bookmark->link_description , '" target="_blank" >' , $bookmark->link_name , '</a></li>';
				}
			}
			?>
        </div>
	</aside>
	<?php endif;?>
</div>
