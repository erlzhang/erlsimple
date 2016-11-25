<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>页面不存在 | 叶夕青兮</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/tooltipster.css" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
    <header class="site-header">
        <div class="site-header-inner" style=" background-color:#fff; color:#333; text-shadow: none;">
				<dl style=" max-width:600px; margin-left:auto; margin-right:auto;"><dt style="float:left;"><img src="<?php bloginfo('template_url') ?>/images/404logo.png" id="logo" >
</dt><dd>
<span style="font-size:5rem; line-height:130px; margin-left:20px; color:#a6d7de; font-size:6rem;">404</span><br />
<span style="font-size:1.5rem;">很抱歉，您查找的页面不存在！</span><br />
<em style="color:#cecbcb; font-size:1.2rem;">Page Not Found !</em><br />
<a href="http://yexiqingxi.com/" style=" color:#333!important; text-shadow:none; font-size:0.8rem; text-decoration:underline;">&lt;&lt;返回叶夕青兮首页</a></dd></dl>
        </div><!-- /.site-header-inner -->
    </header>
    <div class="nav-bar">
        <div class="nav-bar-inner">
            <a href="/" class="logo">
                <h1>叶夕青兮</h1>
            </a>
            
            <button class="toggle-menu tooltip" type="button" title="菜单">
                <i class="fa fa-bars"></i>
            </button>
 <?php
if(function_exists('wp_nav_menu')) {
    wp_nav_menu(array('theme_location'=>'primary','menu_class'=>'menu','container'=>'ul'));
}
?>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	          <i class="fa fa-search searchpro"></i><input class="input-search-index" type="text" name="s" value="" placeholder="Search……" autocomplete="off">
	</form>
<button class="toggle-search tooltip" type="button" title="搜索">
                <i class="fa fa-search"></i>
            </button>

        </div>
    </div>
    <nav class="site-nav">
			<div> <?php
if(function_exists('wp_nav_menu')) {
    wp_nav_menu(array('theme_location'=>'secondery','menu_class'=>'pages','container'=>'ul'));
}
?>
</div>    </nav>
    
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	          <input class="input-search" type="text" name="s" value="" placeholder="输入关键字后按回车键搜索……" autocomplete="off">
	</form>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.tooltipster.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>
</body>
</html>