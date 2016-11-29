<?php get_header();?>
	<header class="site-header">
        <div class="site-header-inner" style=" background-color:#fff; color:#333; text-shadow: none;">
			<dl style=" max-width:600px; margin-left:auto; margin-right:auto;">
				<dt style="float:left;">
					<img src="<?php bloginfo('template_url') ?>/images/404logo.png" id="logo" >
				</dt>
				<dd>
					<span style="font-size:5rem; line-height:130px; margin-left:20px; color:#a6d7de; font-size:6rem;">404</span><br />
					<span style="font-size:1.5rem;">很抱歉，您查找的页面不存在！</span><br />
					<em style="color:#cecbcb; font-size:1.2rem;">Page Not Found !</em><br />
					<a href="<?php echo home_url();?>" style=" color:#333!important; text-shadow:none; font-size:0.8rem; text-decoration:underline;">&lt;&lt;返回<?php echo get_bloginfo('name');?>首页</a>
				</dd>
			</dl>
        </div><!-- /.site-header-inner -->
    </header>
<?php get_footer();?>
