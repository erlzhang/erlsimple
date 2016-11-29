<?php get_header();?>
<div class="main">
	<div class="content">
	<?php if (have_posts()) : ?> 
		
		<section class="posts">
			<div class="posts-inner">
				<div class="crumbs_patch">
				<div itemtype="http://schema.org/WebPage" id="crumbs"><i class="fa fa-home"></i> <a itemprop="breadcrumb" href="<?php echo home_url();?>" class="tooltip tooltipstered">首页</a> &gt; <span class="current">“<?php  the_search_query();?>” 的搜索结果</span></div>
			</div>
			<?php while (have_posts()) : the_post();?>
				<article class="post text" itemscope itemtype="http://schema.org/Article">
					<a href="<?php the_permalink() ?>" rel="bookmark" itemprop="url">
						<h3 itemprop="name"><?php the_title();?></h3>
					</a>
					<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300,"...");?> 
					<a href="<?php the_permalink();?>" class="link-all">阅读更多>></a>
					<footer class="post-footer">
						<div class="notes-options">
							<div class="post-info">
								<ul>
									<li><i class="fa fa-th-large"></i><?php the_category(', ');?></li>
									<li itemprop="dateCreated"><a href="<?php the_permalink();?>" rel="bookmark"><i class="fa fa-clock-o" style=" margin-left:0px;"></i><?php the_time('Y-m-d H:i');?></a></li>
								</ul>
							</div>
							<div class="post-options">
								<ul>
									<li><a href="<?php the_permalink();?>#comments"><?php comments_popup_link('<i class="fa fa-comment"></i>','<i class="fa fa-comment"></i>&nbsp;&nbsp;1','<i class="fa fa-comment"></i>&nbsp;&nbsp;%');?></a></li>
								</ul>
							</div>
						</div>
					</footer>
				</article>
			<?php endwhile;?>
			<?php paging_nav();?>
			</div>
		</section>        
	<?php else :?>
		
		<section class="posts">
			<div class="posts-inner">
				<div class="crumbs_patch">
					<div itemscope="" itemtype="http://schema.org/WebPage" id="crumbs"><i class="fa fa-home"></i> <a itemprop="breadcrumb" href="<?php echo home_url();?>" class="tooltip tooltipstered">首页</a> &gt; <span class="current">无搜索结果</span></div>
				</div>
				<article class="post text" itemscope itemtype="http://schema.org/Article">
					<h3>无搜索结果！</h3>
				</article>
			</div>
		</section>     
	<?php endif;?>
	</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer();?>
