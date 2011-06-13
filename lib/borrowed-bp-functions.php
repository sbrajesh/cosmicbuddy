<?php
/*borrowed functions from bp-default*/
/**
 * Filter the dropdown for selecting the page to show on front to include "Activity Stream"
 *
 * @param string $page_html A list of pages as a dropdown (select list)
 * @see wp_dropdown_pages()
 * @return string
 * @package BuddyPress Theme
 * @since 1.2
 */
function bp_dtheme_wp_pages_filter( $page_html ) {
	if ( !bp_is_active( 'activity' ) )
		return $page_html;

	if ( 'page_on_front' != substr( $page_html, 14, 13 ) )
		return $page_html;

	$selected = false;
	$page_html = str_replace( '</select>', '', $page_html );

	if ( bp_dtheme_page_on_front() == 'activity' )
		$selected = ' selected="selected"';

	$page_html .= '<option class="level-0" value="activity"' . $selected . '>' . __( 'Activity Stream', 'buddypress' ) . '</option></select>';
	return $page_html;
}
add_filter( 'wp_dropdown_pages', 'bp_dtheme_wp_pages_filter' );

/**
 * Hijack the saving of page on front setting to save the activity stream setting
 *
 * @param $string $oldvalue Previous value of get_option( 'page_on_front' )
 * @param $string $oldvalue New value of get_option( 'page_on_front' )
 * @return string
 * @package BuddyPress Theme
 * @since 1.2
 */
function bp_dtheme_page_on_front_update( $oldvalue, $newvalue ) {
	if ( !is_admin() || !is_super_admin() )
		return false;

	if ( 'activity' == $_POST['page_on_front'] )
		return 'activity';
	else
		return $oldvalue;
}
add_action( 'pre_update_option_page_on_front', 'bp_dtheme_page_on_front_update', 10, 2 );

/**
 * Load the activity stream template if settings allow
 *
 * @param string $template Absolute path to the page template 
 * @return string
 * @global WP_Query $wp_query WordPress query object
 * @package BuddyPress Theme
 * @since 1.2
 */
function bp_dtheme_page_on_front_template( $template ) {
	global $wp_query;

	if ( empty( $wp_query->post->ID ) )
		return locate_template( array( 'activity/index.php' ), false );
	else
		return $template;
}
add_filter( 'page_template', 'bp_dtheme_page_on_front_template' );

/**
 * Return the ID of a page set as the home page.
 *
 * @return false|int ID of page set as the home page
 * @package BuddyPress Theme
 * @since 1.2
 */
function bp_dtheme_page_on_front() {
	if ( 'page' != get_option( 'show_on_front' ) )
		return false;

	return apply_filters( 'bp_dtheme_page_on_front', get_option( 'page_on_front' ) );
}

/**
 * Force the page ID as a string to stop the get_posts query from kicking up a fuss.
 *
 * @global WP_Query $wp_query WordPress query object
 * @package BuddyPress Theme
 * @since 1.2
 */
function bp_dtheme_fix_get_posts_on_activity_front() {
	global $wp_query;

	if ( !empty($wp_query->query_vars['page_id']) && 'activity' == $wp_query->query_vars['page_id'] )
		$wp_query->query_vars['page_id'] = '"activity"';
}
add_action( 'pre_get_posts', 'bp_dtheme_fix_get_posts_on_activity_front' );

/**
 * WP 3.0 requires there to be a non-null post in the posts array
 *
 * @param array $posts Posts as retrieved by WP_Query
 * @global WP_Query $wp_query WordPress query object
 * @return array
 * @package BuddyPress Theme
 * @since 1.2.5
 */
function bp_dtheme_fix_the_posts_on_activity_front( $posts ) {
	global $wp_query;

	// NOTE: the double quotes around '"activity"' are thanks to our previous function bp_dtheme_fix_get_posts_on_activity_front()
	if ( empty( $posts ) && !empty( $wp_query->query_vars['page_id'] ) && '"activity"' == $wp_query->query_vars['page_id'] )
		$posts = array( (object) array( 'ID' => 'activity' ) );

	return $posts;
}
add_filter( 'the_posts', 'bp_dtheme_fix_the_posts_on_activity_front' );
?>