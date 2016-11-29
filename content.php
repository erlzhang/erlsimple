<article class="post text" itemscope itemtype="http://schema.org/Article">
	<?php if ( has_post_thumbnail() ) :?> 
	<h1 class="article-title">
		<a href="<?php the_permalink();?>" rel="bookmark" itemprop="url" itemprop="url">
			<?php the_post_thumbnail();?>
			<span itemprop="name"><?php the_title(); ?></span>
		</a>	
	</h1>
	<?php else :?>
	<a href="<?php the_permalink();?>" rel="bookmark" itemprop="url">
		<h1 itemprop="name"><?php the_title(); ?></h1>
	</a>
	<?php endif;?>
	<?php the_content("阅读全文");?> 
	<footer class="post-footer">
		<div class="notes-options">
			<div class="post-info">
				<ul>
					<li><i class="fa fa-th-large"></i><?php the_category(', ');?></li>
					<li><a href="<?php the_permalink();?>" rel="bookmark"><i class="fa fa-clock-o" style=" margin-left:0px;"></i><time itemprop="dateCreated"><?php the_time('Y-m-d H:i');?></time></a></li>
				</ul>
			</div>
			<div class="post-options">       
				<?php comments_popup_link ('<i class="fa fa-comment-o"></i>','<i class="fa fa-comment"></i> 1','<i class="fa fa-comment"></i> %');?>
			</div>
		</div>
	</footer>
</article>
        
