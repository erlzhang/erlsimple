<?php    
if (is_category()):
$cat = get_query_var('cat');
    $yourcat = get_category($cat);
    $catslug=$yourcat->term_id;
global $wpdb;
    $sql = "SELECT ID , post_title , comment_count
           FROM {$wpdb->prefix}posts, {$wpdb->prefix}term_relationships, {$wpdb->prefix}term_taxonomy
WHERE {$wpdb->prefix}posts.ID = {$wpdb->prefix}term_relationships.object_id
		   AND {$wpdb->prefix}term_taxonomy.taxonomy = 'category'
  AND {$wpdb->prefix}term_taxonomy.term_taxonomy_id = {$wpdb->prefix}term_relationships.term_taxonomy_id
  AND {$wpdb->prefix}posts.post_type = 'post'
  AND {$wpdb->prefix}term_taxonomy.term_id = '$catslug'
  ORDER BY {$wpdb->prefix}posts.comment_count DESC LIMIT 0 , 10 ";
    $posts = $wpdb->get_results($sql);
    foreach ($posts as $post){
        $output .= "\n<a href= \"".get_permalink($post->ID)."\" rel=\"bookmark\" title=\"".$post->post_title." (".$post->comment_count."条评论)\" ><li>". mb_strimwidth($post->post_title,0,32)."</li></a>";
    }
    echo $output;
	else :
    global $wpdb;
    $sql = "SELECT ID , post_title , comment_count
           FROM $wpdb->posts
           WHERE post_type = 'post' AND TO_DAYS(now()) - TO_DAYS(post_date) < 120
           ORDER BY comment_count DESC LIMIT 0 , 10 ";
    $posts = $wpdb->get_results($sql);
    $output = "";
    foreach ($posts as $post){
        $output .= "\n<li><a href= \"".get_permalink($post->ID)."\" rel=\"bookmark\" title=\"".$post->post_title." (".$post->comment_count."条评论)\" >". mb_strimwidth($post->post_title,0,32)."</a></li>";
    }
    echo $output;
	endif;
	?>