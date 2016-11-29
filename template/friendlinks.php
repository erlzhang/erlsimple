<?php
/**
* Template Name: 友情链接
*/
get_header(); 
?>
<?php if (have_posts()) : ?> 
	<?php while (have_posts()) : the_post(); ?>
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
				<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
			</div>
			<div class="posts-inner">
				<article class="post text">
					<?php if(!has_post_thumbnail()):?><h1 itemprop="name"><?php the_title(); ?></h1>
					<?php endif;?>
					<?php
					$default_ico = get_template_directory_uri().'/images/links_default.png';
					$bookmarks = get_bookmarks('title_li=&orderby=rand'); //全部链接随机输出
					if ( !empty($bookmarks) ) {
						foreach ($bookmarks as $bookmark) {
						echo '<li  class="list-group-item"><img src="', $bookmark->link_url , '/favicon.ico" width="16px" height="16px" onerror="javascript:this.src=\'' , $default_ico , '\'" /><a href="' , $bookmark->link_url , '" target="_blank" >' , $bookmark->link_name , '</a><span class="friendlink_discription">'  ,$bookmark->link_description ,'</span></li>';
						}
					}
					?>
					<?php the_content(); ?>                
				</article>
			</div>
		</section>
	<?php endwhile; endif;?>
	</div>
</div>
<?php get_footer(); ?>
