<?php
/**
 * My Theme back compat functionality
 *
 * Prevents My Theme from running on WordPress versions prior to 3.6,
 * since this theme is not meant to be backward compatible and relies on
 * many new functions and markup changes introduced in 3.6.
 *
 * Prevent switching to My Theme on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 */


function mytheme_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'mytheme_upgrade_notice' );
}
add_action( 'after_switch_theme', 'mytheme_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * My Theme on WordPress versions prior to 3.6.
 *
 */
function mytheme_upgrade_notice() {
	$message = sprintf( __( 'My Theme requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'mytheme' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 3.6.
 */
function mytheme_customize() {
	wp_die( sprintf( __( 'My Theme requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'mytheme' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'mytheme_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.4.
 */
function mytheme_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'My Theme requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'mytheme' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'mytheme_preview' );
