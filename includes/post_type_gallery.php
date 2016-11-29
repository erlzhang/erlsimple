<?php   
add_action('init', 'gallery_custom_init');   
function gallery_custom_init()    
{   
  $labels = array(   
    'name' => '相册',
    'singular_name' => '相册',
    'add_new' => '添加新相册',
    'add_new_item' => '添加一个新相册',
    'edit_item' => '编辑相册',
    'new_item' => '新相册',
    'view_item' => '查看相册',
    'search_items' => '搜索相册',
    'not_found' =>  'Not Found',
    'not_found_in_trash' => 'not_found_in_trash',
    'parent_item_colon' => '',
    'menu_name' => '相册'
  );   
  $args = array(   
    'labels' => $labels,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
	'menu_icon'=>'dashicons-format-gallery',
    'query_var' => true,
    'rewrite' => true,
    'has_archive' => true,
    'supports' => array('title','editor','author','excerpt','thumbnail')
  );    
  register_post_type('gallery',$args);
}
?>
