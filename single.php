<?php get_header();?>
<div class="main">
	<div class="content-widescreen">
	<?php if (have_posts()) : ?> 
		<?php while (have_posts()) : the_post(); ?>
		<section class="posts">
			<div class="crumbs_patch">
			   <?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
			</div>
			<div class="posts-inner">
				<article class="post text" itemscope itemtype="http://schema.org/Article">
					<?php if ( has_post_thumbnail() ) :?> 
					<h1 class="article-title">
						<?php the_post_thumbnail();?>
						<span itemprop="name"><?php the_title(); ?></span>
					</h1>
					<?php else :?>
					<h1 itemprop="name"><?php the_title(); ?></h1>
					<?php endif;?>
					<?php the_content(); ?>                
					<footer class="post-footer">
						<div class="notes-options">
							<div class="post-info">
								<ul>
									<li>
									   <a href="<?php the_permalink();?>" rel="bookmark"><i class="fa fa-calendar"></i><time itemprop="dateCreated"><?php the_time('Y-m-d H:i');?></time></a></li><li><i class="fa fa-th-large"></i><?php the_category(', ');?></li><?php edit_post_link('编辑','<li><i class="fa fa-pencil-square-o"></i>','</li>'); ?>
								</ul>
							</div>
							<div class="post-options">
							  <div class="content_tags"><?php the_tags('<span class="the_tags">', '</span><span class="the_tags">', '</span>');?></div>
						   </div> <!-- /.footer-post-options -->
						</div><!-- /.notes-options -->
						<?php wp_link_pages( array(
							'before'      => '<div class="page-next">',
							'after'       => '<span class="page-links-title tooltip" title="隐藏/显示分页页码">页码</span></div>',
							'next_or_number' => 'next',
							'nextpagelink' =>'下一页',
							'previouspagelink' =>  '上一页',
							) );?> 
						<?php wp_link_pages( array(
							'before'      => '<div class="page-links">',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							) );?> 
					</footer>
				</article>
			</div>
            <ul class="single_nav">
				<li><?php previous_post_link('上一篇：%link','%title',TRUE);?></li>
				<li><?php next_post_link('下一篇：%link','%title',TRUE);?></li>
			</ul>
			<span class="pre_link"><?php previous_post_link('%link','<i class="fa fa-angle-left fa-4x"> </i>');?></span>
			<span class="nex_link"><?php next_post_link('%link','<i class="fa fa-angle-right fa-4x"> </i>');?></span>
			<div class="post-comment">
				<?php comments_template();?>
			</div>
		</section>
		<?php endwhile; endif;?>
	</div>
</div>
<?php get_footer();?>
