<?php
/*
 * This template is used for the display of single pages.
 */

get_header(); ?>
	<section class="content-wrapper page-content cf">
		<article class="content cf">
			<?php //get_template_part( 'yoast', 'breadcrumbs' ); // Yoast Breadcrumbs ?>

			<?php //get_template_part( 'loop', 'page' ); // Loop - Page ?>

			<section class="clear"></section>

			<?php //comments_template(); // Comments ?>
			
			<?php  
			if ($_POST['idi'] !== '') {
				 echo get_metadata('user', $_POST['idi'], 'nickname', true).'</br>';
				 echo get_metadata('user', $_POST['idi'], 'member_wasborn', true).'</br>';
				 echo get_metadata('user', $_POST['idi'], 'member_position', true).'</br>';
				 echo get_metadata('user', $_POST['idi'], 'member_date', true).'</br>';
				 echo '<img src="/wp-content/uploads/2017/06/'.get_metadata('user', $_POST['idi'], 'member_photo', true).'"></br>';
				 echo get_metadata('user', $_POST['idi'], 'description', true).'</br>';
			}
			// Comments ?>
		</article>

		<?php //get_sidebar(); ?>
	</section>

<?php get_footer(); ?>