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

			<?php comments_template(); 
			// Comments ?>
			<form method="POST" action="">
			<input type="text" value="Заголовок" name = "message_title">
			<input type="text" value="admin durak" name = "message_for_admin">
            <input type="submit" value="Надіслати повідомлення для адміна">
            </form>
       <?php
if (($_POST['message_title'] == true)&&($_POST['message_for_admin'] == true)){
wp_mail('bluzniuknataliazin@rambler.ru', $_POST['message_title'], $_POST['message_for_admin']);
}
?>

		</article>

		<?php //get_sidebar(); ?>
	</section>

<?php get_footer(); ?>