<?php
add_action('init', 'status_custom_init');
function status_custom_init()
{
  $labels = array(
    'name' => '状态',
    'singular_name' => '状态',
    'add_new' => '添加新状态',
    'add_new_item' => '添加一条新状态',
    'edit_item' => '编辑状态',
    'new_item' => '新状态',
    'view_item' => '查看状态',
    'search_items' => '搜索状态',
    'not_found' =>  'Not Found',
    'not_found_in_trash' => 'not_found_in_trash',
    'parent_item_colon' => '',
    'menu_name' => '状态'
  );
  $args = array(
    'labels' => $labels,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
	'menu_icon'=>'dashicons-format-status',
    'query_var' => true,
    'rewrite' => true,
    'has_archive' => true,
    'supports' => array('title','editor','author')
  );
  register_post_type('status',$args);
}
?>
