<?php get_header();?>
<?php 
$option=get_option('erlsimple_theme_options');
if($option['if_catbg']==1):
?>
<style>
.nav-bar{ display:none;}
</style>
<header class="site-header" style=" height:50%;">
	<div class="site-header-inner" style="  
	animation: bgcolor 5s;
	-moz-animation: bgcolor 5s;
	-webkit-animation: bgcolor 5s;	
	-o-animation: bgcolor 5s;	
	background-color: rgba(0,0,0,0.3);">
		<h1 style=" color:#fff;" class="animated fadeInDown"><i style=" margin-right:15px;" class="fa fa-bars"></i><?php single_cat_title();?></h1>
		<h2 class="animated fadeInUp"><?php echo category_description();?></h2>
	</div>
</header>
<?php endif;?>
<div class="main">
	<div class="content">
		 <?php if (have_posts()) : ?> 
			<section class="posts">
				<div class="crumbs_patch" style="margin-top:1.5rem;">
					<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
				</div> 
				<div class="posts-inner">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() );?>
					<?php endwhile; ?>
					<?php paging_nav(); ?>
				</div>
			</section>
		<?php else:?>
		<h3 style="margin-top:75px; text-align:center"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;暂无文章发表！</h3>
		<?php endif;?> 
	</div>
	<?php get_sidebar();?>
</div>
<?php get_footer();?>
