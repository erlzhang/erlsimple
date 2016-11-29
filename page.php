<?php get_header(); ?>
<?php if (have_posts()) :?> 
   <?php while (have_posts()) : the_post();?>
		<?php if ( has_post_thumbnail() ) :?> 
		<style>
		.nav-bar{ display:none;}
		</style>
        <header class="site-header" style=" height:30%;">
			<div class="site-header-inner" style="animation: bgcolor 5s;-moz-animation: bgcolor 5s;-webkit-animation: bgcolor 5s;	-o-animation: bgcolor 5s;background-color: rgba(0,0,0,0.3);">
				<h1 style=" color:#fff;" class="animated fadeInDown"><?php the_title();?></h1>
			</div>
		</header>
		<?php endif;?>
	<div class="main">
		<div class="content-widescreen">
			<section class="posts">
			 <div class="crumbs_patch">
			   <?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?></div>
				<div class="posts-inner">
					<article class="post text">
						<?php if(!has_post_thumbnail()):?><h1 itemprop="name"><?php the_title();?></h1>
						<?php endif;?>
						<?php the_content();?>                
					</article>
				</div>
				<div class="post-comment">
					<?php comments_template();?>
				</div>
			</section>
		</div>
	</div>
    <?php endwhile; endif;?>
<?php get_footer();?>
