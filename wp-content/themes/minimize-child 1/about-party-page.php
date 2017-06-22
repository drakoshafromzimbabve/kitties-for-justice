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

			<?php comments_template(); // Comments ?>
			
		</article>

		<?php //get_sidebar(); ?>
	</section>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41413.89659186111!2d25.583542597961642!3d49.55306908981056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473036b5a78c01c9%3A0xc8e2b81abf09a145!2z0L7RgtC10LvRjCAi0KLQtdGA0L3QvtC_0L7Qu9GMIg!5e0!3m2!1sru!2sua!4v1496776364718" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
<?php get_footer(); ?>