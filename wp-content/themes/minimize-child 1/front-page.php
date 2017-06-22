<?php
/*
 * This template is used for displaying the Front Page (when selected in Settings > Reading).
 *
 * This template is used even when the option is selected, but a page is not. It contains fallback functionality
 * to ensure content is still displayed.
 */

get_header(); ?>
	<?php
		// Front page is active
		if ( get_option( 'show_on_front' ) === 'page' && get_option( 'page_on_front' ) ) :
			//*********sds_front_page_slider_sidebar(); // Front Page Slider Sidebar
	?>
	<div>
		<section class="content-wrapper front-page-content front-page cf">
			<article class="content">
				<?php if ( is_active_sidebar( 'front-page-sidebar' ) ) : // Front Page Sidebar ?>
					<section class="front-page-sidebar">
						<?php //************dynamic_sidebar( 'front-page-sidebar' ); ?>
					</section>
				<?php else: ?>
					<?php //**************get_template_part( 'loop', 'page' ); // Loop - Page ?>
				<?php endif; ?>
			</article>
	<?php
		// No "Front Page" Selected, show posts
		else:
	?>
		<section class="content-wrapper front-page-content front-page cf">
			<article class="content">
				<?php
					//*************get_template_part( 'loop', 'home' ); // Loop - Home
					//******************get_template_part( 'post', 'navigation' ); // Post Navigation
				?>
			</article>
	<?php
		endif;
	?>

		<?php //********get_sidebar(); ?>
	</section>
	
	
	</div>
	
	<div>
	<section>
	<ul>

<?php //$the_query = new WP_Query( 'posts_per_page=5' ); ?>

<?php //while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

<li><a href=<?php //the_permalink(); ?>><?php //the_title(); ?></a></li>

<li><?php //the_excerpt(__('(more…)')); echo get_the_posts_pagination(); 
//$pageNum=(get_query_var('paged')) ? get_query_var('paged') : 1; // получаем номер текущей страницы и присваиваем значение переменной
//echo 'lookatthis'.$pageNum.'lookatthis'; // выводим номер текущей страницы
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(

	   'posts_per_page' => 6,

	   'paged' => $paged

	);

$custom_query = new WP_Query( $args );

while($custom_query->have_posts()) :

	   $custom_query->the_post();  

	?>

	   <div>

	     <ul>

	       <li>

	         <h3><a class="blog-title" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

	          <span>Written <i>by:&nbsp;</i> <a class="link" href="<?php bloginfo('url'); ?>/author/<?php the_author(); ?>"> <?php the_author(); ?></a> <i>on</i> <?php the_time('F j, Y'); ?> <a class="link" href="<?php the_permalink(); ?>#comments "><?php comments_number( '', '- 1 comment', '- % comments' ); ?></a></span>

	          <div>

	             <ul>

	               <div><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>

	             </ul>

	             <ul>

	               <li class="work-description"><?php echo the_excerpt(); ?></li>

	             </ul>               

	          </div>  

	          <div><?php the_tags(); ?>            

	        </li>

	     </ul>

	   </div> <!-- end blog posts -->    

	  <?php endwhile; ?>     

	   </div>

</li>

<?php
//endwhile;
//wp_reset_postdata();
the_posts_pagination(); 
?>
</ul>
	</section>
	</div>
	
	<div>
	<section>
	
	</section>
	</div>
	
<?php echo $custom_query->max_num_pages;

if (function_exists("pagination")) {
	    pagination($custom_query->max_num_pages);
	}// Comments ?>
<?php get_footer(); ?>