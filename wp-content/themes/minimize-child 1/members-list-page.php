<?php
/*
 * This template is used for the display of single pages.
 */

get_header(); ?>
	<section class="content-wrapper page-content cf">
		<article class="content cf">
			<?php get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>

			<?php get_template_part( 'loop', 'page' ); // Loop - Page ?>

			<section class="clear"></section>
<title>Список користувачів</title>
<table border="1">
			<?php //comments_template(); // Comments 
			 /////////$blogusers = get_users();
			 /////////$i=0;
			 //////////foreach ($blogusers as $user) {
				 //////////for ($i = 0; $i < 3; $i++) {
				 //$i++;
				 ////////////echo $user->user_email;
////////////if ($i==3) {
	                   //echo '<li>' . $user->user_email . '</li>';
	                   //echo $user->user_email;
	///////////echo '</br>';
	////////$i=0;
/////////////}
                       //while ($i++<3) {
                       //echo '</br>';
                       //}
				 ////////}
	//////////}
			?>
			</table>
			
			<table>
			<?php  
			 $blogusers = get_users();
			 $i=0;
			 //<input type="submit" style="background-image: url(image.png);" />
			 echo '<tr>';
			 foreach ($blogusers as $user) {
				 echo '<td>'.$user->user_nicename.'</br>';
				 echo '<form name="test" method="post" action="/?page_id=37">';
				 echo '<input type="hidden" name="idi" value="'.$user->ID.'"></br>';
				 if (get_metadata('user', $user->ID, 'member_photo', true) !== '') {
					 echo '<input type="submit" style="background-image: url(/wp-content/uploads/2017/06/'.get_metadata('user', $user->ID, 'member_photo', true).'); width:80x; height:80px" value = "" class="my_button"/></br>';
					 //echo '<a href="/?page_id=37" ><img src="/wp-content/uploads/2017/06/'.get_metadata('user', $user->ID, 'member_photo', true).'"></a></br>';
					 //echo '<input type="image" src="/wp-content/uploads/2017/06/'.get_metadata('user', $user->ID, 'member_photo', true).');" name="submit"/></br>';
				 }
				 else if (get_metadata('user', $user->ID, 'member_photo', true) == '') {
					 //echo '<a href="/?page_id=37" ><img src="/wp-content/uploads/2017/06/photo.png"></a></br>';
					 echo '<input type="submit" style="background-image: url(/wp-content/uploads/2017/06/photo.png); width:80x; height:80px" value = "                       "/></br>';
				 }
				 echo '</form>';
				 echo get_metadata('user', $user->ID, 'member_wasborn', true).'</br>';
				 echo get_metadata('user', $user->ID, 'member_position', true).'</br>';
				 echo '</td>';
				 $i++;
if ($i==3) {
	                   
	echo '</tr>';
	echo '</br>';
	$i=0;
	echo '<tr>';
}
                       
	}
			?>
			</tr>
			</table>
			
		</article>

		<?php //get_sidebar(); ?>
	</section>

<?php get_footer(); ?>