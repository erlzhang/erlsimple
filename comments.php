<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('请勿直接加载此页。谢谢！');
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('必须输入密码，才能查看评论！'); ?></p>
	<?php
		return;
	}
?>
<?php if ('open' == $post->comment_status) : ?>
<div id="postcomments">
	<div id="comments">
	<?php if ('open' == $post->comment_status) : ?>
	<div id="respond_box">
		<div id="respond">
			<div class="cancel-comment-reply">
				<small><?php cancel_comment_reply_link(); ?></small>
			</div>

			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p><?php print '您必须'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！</p>
			<?php else : ?>

			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( $user_ID ) : ?>
				<div class="comment_current">你好，<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>！  <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出" class="logout"><?php print '[ 退出 ]'; ?></a></div>
			<?php elseif ( '' != $comment_author ): ?>
				<div class="author"><?php printf(__('欢迎回来 <strong>%s</strong>'), $comment_author); ?><a href="javascript:toggleCommentAuthorInfo();" id="toggle-comment-author-info">[ 更改 ]</a></div>
			<?php endif; ?>
			<?php if ( ! $user_ID ): ?>
				<div id="comment-author-info" class="comment_info">
					<li>
						<label for="author"><small><i class="fa fa-user"></i></small></label>
						<input type="text" name="author" id="author" class="commenttext" placeholder="Name"  value="<?php echo $comment_author; ?>" size="22" tabindex="1" placeholder="Name" />
					</li>
					<li>
						<label for="email"><small><i class="fa fa-envelope"></i></small></label>
						<input type="text" name="email" id="email" class="commenttext" value="<?php echo $comment_author_email; ?>" size="22" placeholder="Email" tabindex="2" />
					</li>
					<li>
						<label for="url"><small><i class="fa fa-globe"></i></small></label>
						<input type="text" name="url" id="url" class="commenttext" value="<?php echo $comment_author_url; ?>" size="22"placeholder="http://"  tabindex="3" />
					</li>
				</div>
			<?php endif; ?>
				<div class="clear"></div>
				<div class="smileys"><?php include(TEMPLATEPATH . '/includes/smiley.php'); ?></div>
				<textarea name="comment" id="comment" class="textarea" tabindex="4" cols="50" rows="5"></textarea>
				<div class="respond-status">
					<div id="loading" class="loading"><i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;正在提交中，请稍候...</div>
					<div id="error" class="warning"></div>
					<div id="success" class="success"><i class="fa fa-check"></i>&nbsp;&nbsp;评论提交成功</div>
					<div id="replying" class="info">回复 <strong id="replying-parent"></strong> 的评论,点击取消回复</div>
				</div>
				<input class="submit" name="submit" type="submit" id="submit" tabindex="5" value="发表评论" />
				<?php comment_id_fields(); ?>
				<span class="smiles-icons tooltip" title="表情"><i class="fa fa-smile-o fa-2x"></i></span>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
			<div class="clear"></div>
			<?php endif; // If registration required and not logged in ?>
		</div>
	</div>
	<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
		<p class="nocomments">报歉!评论已关闭.</p>
	<?php endif; ?>
		<h3 id="comments" class="comments_list_title"><?php comments_number('', '1 COMMENT', '% COMMENTS' );?></h3>
		<ol class="comment-list">
		<?php wp_list_comments('type=comment&callback=mytheme_comment&end-callback=mytheme_end_comment&max_depth=23'); ?>
		</ol>
		<div class="pagination"><?php paginate_comments_links(array(
	'prev_text' => '&lt;',
	'next_text' => '&gt;'
	)); ?></div>
	<?php else :?>
    </div>
</div>
<?php endif;?>
