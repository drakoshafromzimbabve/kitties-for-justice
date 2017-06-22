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
			
			<?php 
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
if (is_page('articles-list-page')) {
$args = array(
'posts_per_page' => 5,
'category_name' => 'articles',
//'category_name' => 'marina',
'paged' => $paged
);
}
else if (is_page('список статей')) {
$args = array(
'posts_per_page' => 5,
//'category_name' => 'articles',
'category_name' => 'articles_ukr',
'paged' => $paged
);
}
$custom_query = new WP_Query( $args );

while($custom_query->have_posts()) :
$custom_query->the_post(); 
			
			if (function_exists("pagination")) {
	    pagination($custom_query->max_num_pages);
	}?>
			
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

		</article>

		<?php //get_sidebar(); ?>
	</section>

<?php get_footer(); ?>