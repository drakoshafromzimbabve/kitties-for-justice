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

			<?php comments_template(); // Comments 
			//$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
//$params = array(
	//'posts_per_page' => 7, // количество постов на странице
	//'post_type'       => 'artwork', // тип постов
	//'paged'           => $current_page // текущая страница
//);
//query_posts($params);
 
//$wp_query->is_archive = true;
//$wp_query->is_home = false;
 
//while(have_posts()): the_post();
	/*
	в тело цикла вставьте HTML одного анонса записи, например:
	<h2><?php the_title() ?></h2>
	<p><?php the_content() ?></p>
	*/
//endwhile;


$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

if (is_page('news-list-page')) {
$args = array(
'posts_per_page' => 5,
'category_name' => 'news',
'paged' => $paged
);
}
else if (is_page('список новин')) {
$args = array(
'posts_per_page' => 5,
'category_name' => 'news_ukr',
'paged' => $paged
);
}
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
			if (function_exists("pagination")) {
	    pagination($custom_query->max_num_pages);
	}// Comments ?>
		</article>

		<?php //get_sidebar(); ?>
	</section>

<?php get_footer(); ?>