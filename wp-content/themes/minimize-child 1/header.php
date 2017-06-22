<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html><!--<![endif]-->
	<head>
		<?php wp_head(); ?>
	</head>

	<body <?php language_attributes(); ?> <?php body_class(); ?>>
	<!-- Header	-->
		<header id="header" class="cf">
			<?php if( has_nav_menu( 'top_nav' ) ) : // Top Navigation Area ?>
				<button class="nav-button"><?php _e( 'Toggle Navigation', 'minimize' ); ?></button>
				<nav class="top-nav">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'top_nav',
							'container' => false,
							'menu_class' => 'top-nav secondary-nav menu',
							'menu_id' => 'top-nav',
						) );
					?>
				</nav>
				<section class="clear"></section>
			<?php endif; ?>
	<!-- Logo	-->
			<section class="logo-box">
				<?php sds_logo(); ?>
				<?php get_template_part( 'searchform' ); // Comments ?>
				<?php sds_tagline(); ?>
				<?php wp_loginout(); ?>

				<?php if ( !is_user_logged_in() ) { ?>
<!--a href="https://wordpress1/wp-login.php?action=register">Register</a-->
<!--a href="https://wordpress1/wp-signup.php">Register</a-->
				<!--a href="https://wordpress/wp-login.php">Увійти</a-->
				<?php wp_register('', ''); ?>
				
				<?php } 
				else if ( is_user_logged_in() ) {
					global $user_ID, $user_identity; ?>
					<a href="https://wordpress/wp-admin/profile.php"><?php echo $user_identity; ?></a>

				<?php }
				?>
				
			
			</section>
	<!--  nav options	-->
			<aside class="nav-options">
				<section class="header-cta-container header-call-to-action <?php echo ( is_active_sidebar( 'header-call-to-action-sidebar' ) ) ? 'widgets' : 'no-widgets'; ?>">
					<?php sds_header_call_to_action_sidebar(); // Header CTA Sidebar ?>
				</section>
			</aside>
			<section class="clear"></section>

				<?php 
	//$each_id = get_post_meta(get_the_ID(), "artist_name", true);
	//$artistNames = array();  
//foreach($my_id as $id) {
    //$artistNames[] = $id;
//}
//$artists = implode($artistNames,", ");

//$args = array(
    //'post_type' => array ( 'songs', 'videos' ),
    //'meta_query' => array(
        //array(
            //'key' => 'artist_name',
            //'value' => array( $artists )
        //)
    //)
//);

//$query = new WP_Query($args);

//$args = array(
    //'post_type' => array ( 'songs', 'videos' ),
    //'meta_query' => array(
        //array(
            //'key' => 'artist_name',
            //'value' => $artistNames,
            //'compare' => 'IN'
        //)
    //)
//);

//$args = array(
    //'post_type' => array ( 'songs', 'videos' ),
    //'meta_query' => array(
        //array(
            //'key' => 'artist_name',
            //'value' => $my_id,
            //'compare' => 'IN'
        //)
    //)
//);
?>
		</header>