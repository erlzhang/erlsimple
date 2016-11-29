<?php get_header();?>
<div class="main">
	<div class="content">
		<?php if (have_posts()) :?> 
		<section class="posts">
			<div class="crumbs_patch">
				<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
			</div>
			<div class="posts-inner">
				<?php while (have_posts()) : the_post();?>
					<?php get_template_part('content',get_post_format());?>
				<?php endwhile; ?>
				<?php paging_nav(); ?>
			</div>
		</section>
		<?php endif; ?> 
	</div>
	<?php get_sidebar();?>
</div>
<?php get_footer();?>
