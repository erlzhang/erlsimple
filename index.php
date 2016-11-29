<?php get_header();?>
 <?php 
 $option=get_option('erlsimple_theme_options');
 if($option['if_bg_on']==1):
 ?>
<style>
.nav-bar{ display:none;}
</style>
<header class="site-header-container">
	<div class="site-header">
		<div class="site-header-inner">
			<a href="<?php bloginfo('siteurl'); ?>" rel="home" >
				<h1>
				<?php if($option['homelogo']):?>
					<img src="<?php echo $option['homelogo'];?>" id="logo" class="animated fadeInDown" />
				<?php elseif($option['logoimg']):?>
					<img src="<?php echo $option['logoimg'];?>" id="logo" class="animated fadeInDown" />
				<?php else:
					echo get_bloginfo('name');
					endif;
				?>
				</h1>
			</a>
			<h2 class="animated fadeInUp"><?php echo get_bloginfo('description');?></h2>
		</div>
	</div>
</header>
<?php endif;?>
<div class="container">
	<div class="main">
		<div class="content">
			<section class="posts">
				<div class="posts-inner">
					<?php 
					if (have_posts()) :
						while (have_posts()) : the_post();
							get_template_part( 'content');
						endwhile;
						paging_nav();
					else:?>
					<h3 style="margin-top:45px; text-align:center"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;暂无文章发表！</h3>
					<?php endif;?>
				</div>
			</section>
		</div>
	<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
