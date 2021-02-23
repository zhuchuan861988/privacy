<?php
/**
 * WordPress Translation Install Administration API
 *
 * @package WordPress
 * @subpackage Administration
 */


/**
 * Retrieve translations from WordPress Translation API.
 *
 * @since 4.0.0
 *
 * @param string       $type Type of translations. Accepts 'plugins', 'themes', 'core'.
 * @param array|object $args Translation API arguments. Optional.
 * @return object|WP_Error On success an object of translations, WP_Error on failure.
 */
function translations_api( $type, $args = null ) {
	include( ABSPATH . WPINC . '/version.php' ); // include an unmodified $wp_version

	if ( ! in_array( $type, array( 'plugins', 'themes', 'core' ) ) ) {
		return	new WP_Error( 'invalid_type', __( 'Invalid translation type.' ) );
	}

	/**
	 * Allows a plugin to override the WordPress.org Translation Install API entirely.
	 *
	 * @since 4.0.0
	 *
	 * @param bool|array  $result The result object. Default false.
	 * @param string      $type   The type of translations being requested.
	 * @param object      $args   Translation API arguments.
	 */
	$res = apply_filters( 'translations_api', false, $type, $args );

	if ( false === $res ) {
		$url = $http_url = 'http://api.wordpress.org/translations/' . $type . '/1.0/';
		if ( $ssl = wp_http_supports( array( 'ssl' ) ) ) {
			$url = set_url_scheme( $url, 'https' );
		}

		$options = array(
			'timeout' => 3,
			'body' => array(
				'wp_version' => $wp_version,
				'locale'     => get_locale(),
				'version'    => $args['version'], // Version of plugin, theme or core
			),
		);

		if ( 'core' !== $type ) {
			$options['body']['slug'] = $args['slug']; // Plugin or theme slug
		}

		$request = wp_remote_post( $url, $options );

		if ( $ssl && is_wp_error( $request ) ) {
			trigger_error(
				sprintf(
					/* translators: %s: support forums URL */
					__( 'An unexpected error occurred. Something may be wrong with WordPress.org or this server&#8217;s configuration. If you continue to have problems, please try the <a href="%s">support forums</a>.' ),
					__( 'https://wordpress.org/support/' )
				) . ' ' . __( '(WordPress could not establish a secure connection to WordPress.org. Please contact your server administrator.)' ),
				headers_sent() || WP_DEBUG ? E_USER_WARNING : E_USER_NOTICE
			);

			$request = wp_remote_post( $http_url, $options );
		}

		if ( is_wp_error( $request ) ) {
			$res = new WP_Error( 'translations_api_failed',
				sprintf(
					/* translators: %s: support forums URL */
					__( 'An unexpected error occurred. Something may be wrong with WordPress.org or this server&#8217;s configuration. If you continue to have problems, please try the <a href="%s">support forums</a>.' ),
					__( 'https://wordpress.org/support/' )
				),
				$request->get_error_message()
			);
		} else {
			$res = json_decode( wp_remote_retrieve_body( $request ), true );
			if ( ! is_object( $res ) && ! is_array( $res ) ) {
				$res = new WP_Error( 'translations_api_failed',
					sprintf(
						/* translators: %s: support forums URL */
						__( 'An unexpected error occurred. Something may be wrong with WordPress.org or this server&#8217;s configuration. If you continue to have problems, please try the <a href="%s">support forums</a>.' ),
						__( 'https://wordpress.org/support/' )
					),
					wp_remote_retrieve_body( $request )
				);
			}
		}
	}

	/**
	 * Filters the Translation Install API response results.
	 *
	 * @since 4.0.0
	 *
	 * @param object|WP_Error $res  Response object or WP_Error.
	 * @param string          $type The type of translations being requested.
	 * @param object          $args Translation API arguments.
	 */
	return apply_filters( 'translations_api_result', $res, $type, $args );
}

/**
 * Get available translations from the WordPress.org API.
 *
 * @since 4.0.0
 *
 * @see translations_api()
 *
 * @return array Array of translations, each an array of data. If the API response results
 *               in an error, an empty array will be returned.
 */
function wp_get_available_translations() {
	if ( ! wp_installing() && false !== ( $translations = get_site_transient( 'available_translations' ) ) ) {
		return $translations;
	}

	include( ABSPATH . WPINC . '/version.php' ); // include an unmodified $wp_version

	$api = translations_api( 'core', array( 'version' => $wp_version ) );

	if ( is_wp_error( $api ) || empty( $api['translations'] ) ) {
		return array();
	}

	$translations = array();
	// Key the array with the language code for now.
	foreach ( $api['translations'] as $translation ) {
		$translations[ $translation['language'] ] = $translation;
	}

	if ( ! defined( 'WP_INSTALLING' ) ) {
		set_site_transient( 'available_translations', $translations, 3 * HOUR_IN_SECONDS );
	}

	return $translations;
}

/**
 * Output the select form for the language selection on the installation screen.
 *
 * @since 4.0.0
 *
 * @global string $wp_local_package
 *
 * @param array $languages Array of available languages (populated via the Translation API).
 */
function wp_install_language_form( $languages ) {
	global $wp_local_package;

	$installed_languages = get_available_languages();

	echo "<label class='screen-reader-text' for='language'>Select a default language</label>\n";
	echo "<select size='14' name='language' id='language'>\n";
	echo '<option value="" lang="en" selected="selected" data-continue="Continue" data-installed="1">English (United States)</option>';
	echo "\n";

	if ( ! empty( $wp_local_package