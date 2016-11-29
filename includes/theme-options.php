<?php
//主题菜单设置
$option = get_option('erlsimple_theme_options');//获取选项   
function theme_settings(){
	add_theme_page('主题选项','选项', 'administrator', 'erlsimple_settings','theme_setting_display');
}
function theme_setting_display(){
	global $option;
	if( $option == '' ){   
		//设置默认数据       
	}   
	if(isset($_POST['theme_options_submit'])){   
		//处理数据   
		$option['site_keywords']=stripslashes($_POST['site_keywords']);
		$option['site_description']=stripslashes($_POST['site_description']);
		$option['logoimg']=stripslashes($_POST['logoimg']);  
		$option['homelogo']=stripslashes($_POST['homelogo']); 
		$option['friendlink']=stripcslashes($_POST['friendlink']);
		$option['if_bg']=stripcslashes($_POST['if_bg']);
		$option['if_author']=$_POST['if_author'];
		$option['if_status']=$_POST['if_status'];
		$option['gallery']=$_POST['gallery'];
		$option['if_catbg']=$_POST['if_catbg'];
		$option['if_bg_on']=$_POST['if_bg_on'];
		foreach($_POST['bg'] as $k => $v){
			if($v==''){
				unset($_POST['bg'][$k]);
			}
		}
		$option['bg']=$_POST['bg'];
		update_option('erlsimple_theme_options', $option);//更新选项   
	}  
	?>
	<div class="wrap">
		<h1>主题设置</h1>
		<form method="post" novalidate="novalidate"> 
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="site_keywords">Site Keywords</label></th>
					<td><input name="site_keywords" type="text" id="site_keywords" value="<?php echo $option['site_keywords'];?>" class="regular-text"></td>
				</tr>
				<tr>
					<th scope="row"><label for="site_description">Site Description</label></th>
					<td><textarea name="site_description" id="site_description" class="regular-text" rows="3" style="width:25em;"><?php echo $option['site_description'];?></textarea></td>
				</tr>
				<tr>
					<th scope="row"><label for="logoimg">LOGO</label></th>
					<td><input type="text" name="logoimg" id="logoimg" value="<?php echo $option['logoimg']; ?>"  class="regular-text"/>   
					<br /><small style="color:red;">建议尺寸为115×45</small><br />
					<?php if($option['logoimg']){?>
					<img src="<?php echo $option['logoimg'];?>">
					<?php }?>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="if_bg_on">首页背景大图（需开启才能启动背景图切换功能）</label></th>
					<td>  <label>
					  <input type="radio" name="if_bg_on" value="1" <?php if($option['if_bg_on']==1){
						  echo 'checked="checked"';
					  } ?> />
						开启</label><label>
					  <input type="radio" name="if_bg_on" value="0" <?php if(!$option['if_bg_on']){echo 'checked="checked"';}?> />
						关闭</label></td>
				</tr>
				<tr>
					<th scope="row"><label for="if_bg">首页背景图切换</label></th>
					<td>  <label>
					  <input type="radio" name="if_bg" value="1" <?php if($option['if_bg']==1){
						  echo 'checked="checked"';
					  } ?> />
						开启</label><label>
					  <input type="radio" name="if_bg" value="0" <?php if(!$option['if_bg']){echo 'checked="checked"';}?> />
						关闭</label></td>
				</tr>
				<tr>
				<td></td>
				<td id="bginputs">
				<p><small style="color:red;">建议尺寸为：2560 × 1920</small></p>
					<p><input type="text" name="bg[]" value="<?php echo $option['bg'][0];?>"  class="regular-text"/><span class="add_bg" style="margin-left:10px; color:red; cursor:pointer;">增加</span></p>
					<?php 
					for( $i=1;$i<count($option['bg']);$i++){?>
					<p><input type="text" name="bg[]" value="<?php echo $option['bg'][$i];?>"  class="regular-text"/></p>
					<?php }
					?>
					
				</td>
				</tr>
				<tr>
					<th scope="row"><label for="homelogo">首页大logo</label></th>
					<td><input type="text" name="homelogo" id="logoimg" value="<?php echo $option['homelogo']; ?>"  class="regular-text"/>   
					<?php if($option['homelogo']){?>
					<img src="<?php echo $option['homelogo'];?>">
					<?php }?>
					</td>
				</tr>
				<tr>
					<th scope="row">分类页面头图</th>
					<td> <label>
					  <input type="radio" name="if_catbg" value="1"  <?php if($option['if_catbg']==1){
						  echo 'checked="checked"';
					  } ?>/>
						开启</label><label>
					  <input type="radio" name="if_catbg" value="0" <?php if(!$option['if_catbg']){echo 'checked="checked"';}?> />
						关闭</label></td>
				</tr>
				<tr>
					<th scope="row"><label for="friendlink">友情链接功能</label></th>
					<td>  <label>
					  <input type="radio" name="friendlink" value="1"  <?php if($option['friendlink']==1){
						  echo 'checked="checked"';
					  } ?>/>
						开启</label><label>
					  <input type="radio" name="friendlink" value="0" <?php if(!$option['friendlink']){echo 'checked="checked"';}?> />
						关闭</label></td>
				</tr>
				<tr>
					<th scope="row"><label for="gallery">相册功能开启</label></th>
					<td>  <label>
					  <input type="radio" name="gallery" value="1"  <?php if($option['gallery']==1){
						  echo 'checked="checked"';
					  } ?>/>
						开启</label><label>
					  <input type="radio" name="gallery" value="0" <?php if(!$option['gallery']){echo 'checked="checked"';}?> />
						关闭</label></td>
				</tr>
				<tr>
					<th scope="row">边栏个人简介</th>
					<td> <label>
					  <input type="radio" name="if_author" value="1"  <?php if($option['if_author']==1){
						  echo 'checked="checked"';
					  } ?>/>
						开启</label><label>
					  <input type="radio" name="if_author" value="0" <?php if(!$option['if_author']){echo 'checked="checked"';}?> />
						关闭</label></td>
				</tr>
				<tr>
					<th scope="row">边栏个人状态滚动切换</th>
					<td> <label>
					  <input type="radio" name="if_status" value="1"  <?php if($option['if_status']==1){
						  echo 'checked="checked"';
					  } ?>/>
						开启</label><label>
					  <input type="radio" name="if_status" value="0" <?php if(!$option['if_status']){echo 'checked="checked"';}?> />
						关闭</label></td>
				</tr>
			</tbody>
		</table>
    <?php wp_nonce_field('update-options'); ?>
    <input type="hidden" name="action" value="update" />
		<p class="submit"><input type="submit" name="theme_options_submit" id="submit" class="button button-primary" value="保存"></p>
		</form>
		<script>
		jQuery(document).ready(function() {    
			jQuery('.add_bg').click(function(){
				jQuery('#bginputs').append('<p><input type="text" name="bg[]" value=""  class="regular-text"/></p>');
			})
		});
		</script>
	</div>
<?php }
add_action('admin_menu', 'theme_settings');
?>
