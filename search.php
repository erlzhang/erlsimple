<?php get_header(); 
 ?>
  <div class="main">
 <div class="content">
          <?php if (have_posts()) : ?> 
       <div class="crumbs_patch">
       <div itemscope="" itemtype="http://schema.org/WebPage" id="crumbs"><i class="fa fa-home"></i> <a itemprop="breadcrumb" href="http://localhost" class="tooltip tooltipstered">首页</a> &gt; <span class="current">“<?php  the_search_query();?>” 的搜索结果</span></div></div>
 <section class="posts">
        <div class="posts-inner">
        <?php while (have_posts()) : the_post(); ?>
            <article class="post text" itemscope itemtype="http://schema.org/Article">
    <a href="<?php the_permalink() ?>" rel="bookmark" itemprop="url">
                    <h3 itemprop="name"><?php the_title(); ?></h3>
                </a>
 		<?php 
		echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300,"...");
		 ?> 
<a href="<?php the_permalink() ?>" class="link-all">阅读全文</a>
                <footer class="post-footer">
                    <div class="notes-options">
                        <div class="post-info">
                            <ul>
<li><i class="fa fa-<?php 
			$cat_icon =    
array( 1=> 'coffee',  23=>'paw', 505=>'headphones', 47=>'book', 485=>'plane'
);  foreach((get_the_category()) as $cat){$catID =$cat->cat_ID; echo $cat_icon[$catID];}
			?>"></i><?php the_category(', ') ?></li>
<li itemprop="dateCreated"><a href="<?php the_permalink() ?>" rel="bookmark"><i class="fa fa-clock-o" style=" margin-left:0px;"></i><?php the_time('Y-m-d H:i') ?></a></li>
                            </ul>
                        </div><!-- /.footer-post-info -->
                        <div class="post-options">
                            <ul>
                                <li><a href="<?php the_permalink() ?>#comments"><?php comments_popup_link ('<i class="fa fa-comment"></i>','<i class="fa fa-comment"></i>&nbsp;&nbsp;1','<i class="fa fa-comment"></i>&nbsp;&nbsp;%'); ?></a></li>
                            </ul>
                        </div><!-- /.footer-post-options -->
                    </div><!-- /.notes-options -->
                </footer>
            </article>
            <?php endwhile; ?>
        <?php paging_nav(); ?>
                </div></section>        <?php else :?>
                       <div class="crumbs_patch">
       <div itemscope="" itemtype="http://schema.org/WebPage" id="crumbs"><i class="fa fa-home"></i> <a itemprop="breadcrumb" href="http://localhost" class="tooltip tooltipstered">首页</a> &gt; <span class="current">无搜索结果</span></div></div>
 <section class="posts">
        <div class="posts-inner">
<article class="post text" itemscope itemtype="http://schema.org/Article">
<p>无搜索结果！</p>
            </article>  </div></section>     

                                              <?php endif; ?>    </div>
 <?php get_sidebar(); ?>
 </div>

<?php get_footer(); ?>