<?php get_header();?>
<div class="main">
	<div class="content-widescreen">
		<section class="posts">
			<?php if (have_posts()) : ?> 
			<div class="crumbs_patch" style="max-width:1260px;">
			<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
			</div>
			<?php while (have_posts()) : the_post(); ?>
            <h1 itemprop="name" style="padding-top:45px;"><?php the_title(); ?></h1>
			<div class="gallery_excerpt">
				<?php the_excerpt();?>
			</div>   
			<div class="gallery">
				<div class="gallery_display">
				</div>
				<span id="prevp"><i class="fa fa-angle-left"></i></span>
				<span id="nextp"><i class="fa fa-angle-right"></i></span>
			</div>
			<div class="piclist">
				<?php 
				if ( get_post_gallery() ) :
				$gallery = get_post_gallery( get_the_ID(), false );
				foreach( $gallery['src'] AS $src ){?>
					<span data-src="<?php echo $src;?>" class="single-pic"></span>
					<?php
				}endif;?>
				
		   </div>     
			<footer class="post-footer">
				<div class="notes-options">
					<div class="post-info">
						<ul>
							<li>
							   <a href="<?php the_permalink() ?>" rel="bookmark"><i class="fa fa-calendar"></i><time itemprop="dateCreated"><?php the_time('Y-m-d H:i') ?></time></a></li><?php edit_post_link('编辑','<li><i class="fa fa-pencil-square-o"></i>','</li>'); ?>
						</ul>
					</div>
				<div class="post-options">
				   </div>
				</div>
			</footer>
            <ul class="single_nav" style="max-width:1260px;">
				<li><?php previous_post_link('上一个相册：%link','%title') ?></li>
				<li><?php next_post_link('下一个相册：%link','%title') ?></li>
			</ul>    
			<span class="pre_link"><?php previous_post_link('%link','<i class="fa fa-angle-left fa-4x"> </i>') ?></span>
			<span class="nex_link"><?php next_post_link('%link','<i class="fa fa-angle-right fa-4x"> </i>') ?></span>
			<div class="post-comment">
				<?php comments_template(); ?>
			</div>
			<?php endwhile; endif;?>
		</section>
	</div>
</div>
<div class="clear"></div>
		<footer class="site-footer">
			<div class="site-info">
				© <a href="<?php echo home_url();?>"  id="copyright"><?php echo get_bloginfo('name');?></a> | Theme by <a href="https://github.com/erlzhang/" target="_blank">Erl</a>
			</div>
        </footer>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.tooltipster.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/gallery.js"></script>
	</body>
</html>
