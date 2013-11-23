<?php
/*
 * File containing the sidebar of the site
 *
 * @package spring-theme
 */

$use_sidebar_drawer = get_theme_mod( 'sq_sidebar_drawer', true );
?>

<section id="sidebar-main" class="sidebar-main" role="complimentary">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php else : ?>
		<section class="sidebar-warning warning">
			<?php _e( 'There would be some amazing widgets here if any were activated.', 'spring_theme' ); ?>
		</section>
	<?php endif; ?>
</section>