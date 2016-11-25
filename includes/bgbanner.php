<?php 
$option=get_option('erlsimple_theme_options');
if (is_home() && ($option['if_bg_on']==1)):?>
<script>
    $(".site-header-container").backstretch([
	<?php 
	if($option['if_bg']){
		$bg=$option['bg'];
		foreach($bg as $k => $v){?>
		"<?php echo $v;?>",	
		<?php  }
	}else{?>
	"<?php header_image();?>"
	<?php }?>
      ], {
        fade: 750,
        duration: 4000
    });
</script>
<?php endif; ?>
<?php if (is_category() && ($option['if_catbg']==1)):?>
<script>
    $(".site-header").backstretch([
      "<?php bloginfo('template_url') ?>/images/<?php $cat = get_query_var('cat');
    $yourcat = get_category($cat);
    echo $yourcat->slug;?>.jpg"
      ], {
        fade: 750,
        duration: 4000
    });
</script>
<?php endif;?>
<?php if (is_page()):?>
<script>
    $(".site-header").backstretch([
      "<?php 
  $medium_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
echo $medium_image_url[0];?>"
      ], {
        fade: 750,
        duration: 4000
    });
</script>
<?php endif;?>