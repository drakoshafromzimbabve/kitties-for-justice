	<section class="clear"></section>

	<!-- Footer -->
		<footer id="footer">	
			<section class="footer-widgets-container">
				<section class="footer-widgets <?php echo ( is_active_sidebar( 'footer-sidebar' ) ) ? 'widgets' : 'no-widgets'; ?>">
					<?php sds_footer_sidebar(); // Footer (4 columns) ?>
				</section>
			</section>

			<section class="copyright-area <?php echo ( is_active_sidebar( 'copyright-area-sidebar' ) ) ? 'widgets' : 'no-widgets'; ?>">
				<?php sds_copyright_area_sidebar(); ?>
			</section>

			<p class="copyright">
				<?php sds_copyright( 'Minimize' ); ?>
			</p>
		</footer>

		<?php wp_footer(); ?>
		<?php echo "адреса центрального офісу: м.Тернопіль, вул.Вишнівецького 2(підвальне приміщення або при виході з нього)"; ?>
		<nav class="primary-nav-container">
				<button class="primary-nav-button"><img src="<?php echo get_template_directory_uri(); ?>/images/menu-icon-large.png" alt="<?php esc_attr_e( 'Toggle Navigation', 'minimize' ); ?>" /><?php _e( 'Navigation', 'minimize' ); ?></button>
				<?php
				//if (is_page('список статей')) {
					
				//}
					//else { 
					//if (is_page('список статей')) {
					wp_nav_menu( array(
						'theme_location' => 'primary_nav',
						'container' => false,
						'menu_class' => 'primary-nav menu',
						'menu_id' => 'primary-nav',
						'fallback_cb' => 'sds_primary_menu_fallback'
					) );
					//}
				?>
				
			</nav>
			<nav>
				<?php
					// Footer Navigation Area
					if( has_nav_menu( 'footer_nav' ) )
						wp_nav_menu( array(
							'theme_location' => 'footer_nav',
							'container' => false,
							'menu_class' => 'footer-nav menu',
							'menu_id' => 'footer-nav',
						) );
				?>
			</nav>
	</body>
</html>