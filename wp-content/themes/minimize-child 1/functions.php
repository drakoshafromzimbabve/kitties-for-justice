<?php
add_filter('admin_init', 'change_roles');
add_filter('user_register', 'add_meta_to_users'); 
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

if (isset($_POST['nickname'])) {
$idi = get_user_by('login', $_POST['nickname'])->ID;
if ((isset($_POST['member_position']))&&($_POST['member_position'] !== '')) {
		update_user_meta($idi, 'member_position', sanitize_text_field( $_POST['member_position'] ));
	}
	if ((isset($_POST['member_wasborn']))&&($_POST['member_wasborn'] !== '')) {
		update_user_meta($idi, 'member_wasborn', sanitize_text_field( $_POST['member_wasborn'] ));
	}
	if ((isset($_POST['member_date']))&&($_POST['member_date'] !== '')) {
		update_user_meta($idi, 'member_date', sanitize_text_field( $_POST['member_date'] ));
	}
}

add_filter('template_include', 'templates_for_pages');
//mail("bluzniuknataliazin@rambler.ru", "My Subject", "Line 1\nLine 2\nLine 3");
//wp_mail('bluzniuknataliazin@rambler.ru', 'Тема', 'Содержание');
function change_roles() {
	
	remove_role( 'editor' );
    remove_role( 'contributor' );
    remove_role( 'subscriber' );
	
	add_role('member', 'член партії', array());
	get_role( 'member' ) -> add_cap( 'read' ); 
}

function add_meta_to_users($user_id) {
	
	add_user_meta( $user_id, 'member_activity', 'неактивний', true );
	add_user_meta( $user_id, 'member_wasborn', '', true );
	add_user_meta( $user_id, 'member_date', '', true );
	add_user_meta( $user_id, 'member_position', '', true );
	add_user_meta( $user_id, 'member_photo', '', true );
}

function my_show_extra_profile_fields($user) { 

$url = $_SERVER['REQUEST_URI'];
if (($url == '/wp-admin/profile.php')||($url == '/wp-admin/profile.php?wp_http_referer=%2Fwp-admin%2Fusers.php')) {
	$uid = get_current_user_id();
}
else {
$rest = substr($url, 32); 
$uid = substr ($rest, 0, strrpos($rest, '&')); 
}
?>

	<h3>Extra profile information</h3>

	<table class="form-table">

		<tr>
			<th><label for="twitter">Посада члена партії</label></th>

			<td>
				<input type="text" name="member_position" id="member_position" value="<?php echo get_user_meta($uid, 'member_position', true); ?>" class="regular-text" /><br />
				<span class="description">Please enter your position</span>
			</td>
		</tr>
		
		<tr>
			<th><label for="twitter">День народження члена партії</label></th>

			<td>
				<input type="text" name="member_wasborn" id="member_wasborn" value="<?php echo esc_attr(get_user_meta($uid, 'member_wasborn', true)); ?>" class="regular-text" /><br />
				<span class="description">Please enter when you were born</span>
			</td>
		</tr>
		
		<tr>
			<th><label for="twitter">Дата вступу до партії</label></th>

			<td>
				<input type="text" name="member_date" id="member_date" value="<?php echo esc_attr(get_user_meta($uid, 'member_date', true)); ?>" class="regular-text" /><br />
				<span class="description">Please enter when you enter to the party</span>
			</td>
		</tr>
        
		<tr>
		<td>
			    <form enctype="multipart/form-data" method="post">
				</form><br />
				<span class="description">Please choose youf photo</span>
			</td>
		</tr>
		
		<tr>
		<td>
				<form enctype="multipart/form-data" method="post">
	<input type="file" name="member_photo" id="member_photo"  multiple="false" />
	<?php wp_nonce_field( 'member_photo', 'member_photo_nonce' ); ?>
	<input id="submit_member_photo" name="submit_member_photo" type="submit" value="Вибрати" />
                </form><br />
			</td>
		</tr>
	</table>
<?php 
if (isset($_FILES['member_photo'])) {
					require_once( ABSPATH . 'wp-admin/includes/image.php' );
	                require_once( ABSPATH . 'wp-admin/includes/file.php' );
	                require_once( ABSPATH . 'wp-admin/includes/media.php' );
	$attachment_id = media_handle_upload('member_photo', 0);
	update_user_meta($uid, 'member_photo', $_FILES['member_photo']['name']);
}
}

function templates_for_pages() {
	
	if (is_page('front-page')) {  
			get_template_part('front-page');
	}
	else if (is_page('головна сторінка')) {  
			get_template_part('front-page');
	}
	
	else if (is_page('about-party-page')) {  
			get_template_part('about-party-page');
	}
	else if (is_page('про партію')) {  
			get_template_part('about-party-page');
	}
	
	else if (is_page('articles-page')) {                   
			get_template_part('articles-page');
	}
	else if (is_page('статті')) {                   
			get_template_part('articles-page');
	}

	else if (is_page('articles-list-page')) {                                                   
			get_template_part('articles-list-page');
	}
	else if (is_page('список статей')) {                                                   
			get_template_part('articles-list-page');
	}
	
	else if (is_page('contacts-page')) {                                                   
			get_template_part('contacts-page');
	}
	else if (is_page('сторінка контактів')) {                                                   
			get_template_part('contacts-page');
	}
	
	else if (is_page('member-page')) {                                                      
			get_template_part('member-page');
	}
	else if (is_page('особиста сторінка')) {                                                      
			get_template_part('member-page');
	}
	
	else if (is_page('members-list-page')) {                                                     
			get_template_part('members-list-page');
	}
	else if (is_page('список членів партії')) {                                                     
			get_template_part('members-list-page');
	}
	
	else if (is_page('news-list-page')) {                                                     
			get_template_part('news-list-page');
	}
	else if (is_page('список новин')) {                                                     
			get_template_part('news-list-page');
	}
	
	else if (is_page('news-page')) {                                                      
			get_template_part('news-page');
	}
	else if (is_page('новини')) {                                                      
			get_template_part('news-page');
	}
	
	else {
		get_template_part('page');
	}
	
}

add_action('admin_menu', function(){
add_menu_page('users activities', 'users activities', 'manage_options', 'users activities', 'func_activ_menu_page', 6.5);
} );
function func_activ_menu_page() {
	$blogusersp = get_users();
	foreach ($blogusersp as $user) {
		if (($_POST['activity'.$user->ID] !== null)&&($_POST['activity'.$user->ID] !== '')) {
			echo $_POST['activity'.$user->ID];
			update_user_meta( $user->ID, 'member_activity', $_POST['activity'.$user->ID]);
		}
	}
	echo '<table>';
			 $blogusers = get_users();
			 echo '<form name="act" method="post" action="/wp-admin/admin.php?page=users+activities">';
			 //echo '<form name="act" method="post">';
			 foreach ($blogusers as $user) {
				         
	echo '<tr>';
	echo '<td>'.get_metadata('user', $user->ID, 'nickname', true).'</br></td>';
	echo '<td>';
	//echo '<select name="activity'.$user->ID.'"><option disabled>'.get_metadata('user', $user->ID, 'member_activity', true).'</option><option>неактивний</option><option>активний</option></select>';
	//echo '<select name="activity'.$user->ID.'" value = "'.get_metadata('user', $user->ID, 'member_activity', true).'"><option>неактивний</option><option>активний</option></select>';
	//echo '<input type="radio" name="browser" value="ie">активний</br>';
    //echo '<input type="text" name="activity'.$user->ID.'" value="'.get_metadata('user', $user->ID, 'member_activity', true).'"></br>';
	echo get_metadata('user', $user->ID, 'member_activity', true).'</br>';
	echo '<select name="activity'.$user->ID.'"><option></option><option>неактивний</option><option>активний</option></select>';
	echo '</tr>';
	echo '</br>';
                   
	}
			echo '</tr>';
			echo '<input type="submit" value="Зберегти зміни">';
			echo '</form>';
			echo '</table>';
}

function pagination($pages = '', $range = 4)
	{ 
	     $showitems = ($range * 2)+1; 
	  
	     global $paged;
	     if(empty($paged)) $paged = 1;
	  
	     if($pages == '')
	     {
	         global $wp_query;
	         $pages = $wp_query->max_num_pages;
	         if(!$pages)
	         {
	             $pages = 1;
	         }
	     }  
	  
	     if(1 != $pages)
	     {
	         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
	         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
	         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
	  
	         for ($i=1; $i <= $pages; $i++)
	         {
	             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	             {
	                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
	             }
	         }
	  
	         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>"; 
	         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
	         echo "</div>\n";
	     }
	}
?>