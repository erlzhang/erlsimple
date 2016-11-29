<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<?php include('includes/seo.php'); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head();?>
	</head>
	<body>
		<div class="nav-bar">
			<?php 
			$option=get_option('erlsimple_theme_options');
			if($option['logoimg']){?>
			<style>
			.logo-s{
				background-image: url(<?php echo $option['logoimg'];?>);
				text-indent: -9999px;
			}
			</style>					
			<?php }?>
			<a href="<?php echo home_url();?>" class="logo-s"><?php echo get_bloginfo('name');?></a>
			<?php
			if(function_exists('wp_nav_menu')) {
				wp_nav_menu(array('theme_location'=>'primary','menu_class'=>'menu','container'=>'nav'));
			}
			?>
			<form method="get" id="searchform" class="top-search" action="<?php bloginfo('url'); ?>/">
				<span class="search-icon"><i class="fa fa-search"></i></span>
				<input class="input-search" type="text" name="s" value="" placeholder="Search" autocomplete="off">
			</form>
			<span class="toggle-menu tooltip" title="菜单">
				<i class="fa fa-bars"></i>
			</span>
			<span class="toggle-search tooltip" title="搜索">
				<i class="fa fa-search"></i>
			</span>
		</div>
		<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
			<input class="input-search-screen" type="text" name="s" value="" placeholder="输入关键字后按回车键搜索" autocomplete="off">
		</form>
		
