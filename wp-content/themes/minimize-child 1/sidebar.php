<?php
	global $sds_theme_options;

	// Primary Sidebar
	if ( ! isset( $sds_theme_options['body_class'] ) || ( ! empty( $sds_theme_options['body_class'] ) && $sds_theme_options['body_class'] !== 'cols-1' ) ) :
?>
		<!-- Page Sidebar-->
		<aside class="sidebar <?php echo ( is_active_sidebar( 'primary-sidebar' ) ) ? 'widgets' : 'no-widgets'; ?>">
				<?php
					// Primary Sidebar
					if ( is_active_sidebar( 'primary-sidebar' ) )
						sds_primary_sidebar();
					// Social Media Fallback
					else
						sds_social_media();
				?>
		</aside>
<?php
	endif;

	// Secondary Sidebar
	if ( isset( $sds_theme_options['body_class'] ) && ! empty( $sds_theme_options['body_class'] ) && strpos( $sds_theme_options['body_class'], 'cols-3' ) !== false ) :
?>
		<aside class="sidebar secondary-sidebar <?php echo ( is_active_sidebar( 'secondary-sidebar' ) ) ? 'widgets' : 'no-widgets'; ?>">
			<?php sds_secondary_sidebar(); // Secondary Sidebar ?>
		
			<a href = https://www.google.com.ua/maps/place/%D0%B1%D1%83%D0%BB%D1%8C%D0%B2%D0%B0%D1%80+%D0%A2%D0%B0%D1%80%D0%B0%D1%81%D0%B0+%D0%A8%D0%B5%D0%B2%D1%87%D0%B5%D0%BD%D0%BA%D0%B0,+%D0%A2%D0%B5%D1%80%D0%BD%D0%BE%D0%BF%D1%96%D0%BB%D1%8C,+%D0%A2%D0%B5%D1%80%D0%BD%D0%BE%D0%BF%D1%96%D0%BB%D1%8C%D1%81%D1%8C%D0%BA%D0%B0+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C/@49.5530001,25.5930647,17z/data=!4m13!1m7!3m6!1s0x473036b35f2e4b17:0x428f0a1f7a08d18b!2z0LHRg9C70YzQstCw0YAg0KLQsNGA0LDRgdCwINCo0LXQstGH0LXQvdC60LAsINCi0LXRgNC90L7Qv9GW0LvRjCwg0KLQtdGA0L3QvtC_0ZbQu9GM0YHRjNC60LAg0L7QsdC70LDRgdGC0Yw!3b1!8m2!3d49.5529966!4d25.5952534!3m4!1s0x473036b35f2e4b17:0x428f0a1f7a08d18b!8m2!3d49.5529966!4d25.5952534?hl=ru>
		</aside>
<?php
	endif;
?>