<?php get_header();?>
<div class="gallery-content">
	<?php if (have_posts()) : ?> 
       <?php  query_posts('showposts=-1&post_type=gallery');?>
	   <div class="gallery_sizer"></div>
		<?php while (have_posts()) : the_post(); ?>
			<div class="gallery_single">	
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail();?>
					<h3 class="gallery_title animated fadeInUp"><?php the_title();?></h3>
				</a>
			</div>
            <?php endwhile; ?>
		</div>
		<?php endif; ?> 
		<div class="clear"></div>
		<footer class="site-footer">
			<div class="site-info">
				© <a href="<?php echo home_url();?>"  id="copyright"><?php echo get_bloginfo('name');?></a> | Theme by <a href="https://github.com/erlzhang/" target="_blank">Erl</a>
			</div>
        </footer>
		<?php wp_footer();?>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/imagesloaded.pkgd.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/masonry.min.js"></script>
		<script>
		$('.gallery-content').masonry({ 
			itemSelector: '.gallery_single',
			isAnimated: true,
			percentPosition: true,
			columnWidth: '.gallery_sizer'
		});
		var $grid = $('.gallery-content').masonry({
		});
		$grid.imagesLoaded().progress( function() {
		  $grid.masonry('layout');
		});
		</script>
	</body>
</html>
