		<div class="clear"></div>
		<a href="#" id="top" tilte="返回顶部" class="totop"> <i class="fa fa-chevron-up fa-2x"> </i></a>
		<footer class="site-footer">
			<div class="site-info">
				© <a href="<?php echo home_url();?>"  id="copyright"><?php echo get_bloginfo('name');?></a> | Theme by <a href="https://github.com/erlzhang/" target="_blank">Erl</a>
			</div>
        </footer>
		<?php wp_footer();?>
		<?php
			if (is_home() || is_category() ||is_page()){
				include('includes/bgbanner.php');
			}
		?>
	</body>
</html>
