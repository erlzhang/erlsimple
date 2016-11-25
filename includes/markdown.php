<?php 
include_once('Parsedown.php');

function _Parse_Markdown($content){
	$Parsedown = new Parsedown();
	
	//if(preg_match( '/<!--markdown(.*?)?-->/', $content)){
		//$content = $Parsedown->text($content);
		
		$content = $Parsedown->text($content);
	//}
	return $content;
}
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', '_Parse_Markdown' );

?>