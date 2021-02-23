<?php
/**
 * Upgrader API: Automatic_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */

/**
 * Upgrader Skin for Automatic WordPress Upgrades
 *
 * This skin is designed to be used when no output is intended, all output
 * is captured and stored for the caller to process and log/email/discard.
 *
 * @since 3.7.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see Bulk_Upgrader_Skin
 */
class Automatic_Upgrader_Skin extends WP_Upgrader_Skin {
	protected $messages = array();

	/**
	 * Determines whether the upgrader needs FTP/SSH details in order to connect
	 * to the filesystem.
	 *
	 * @since 3.7.0
	 * @since 4.6.0 The `$context` parameter default changed from `false` to an empty string.
	 *
	 * @see request_filesystem_credentials()
	 *
	 * @param bool   $error                        Optional. Whether the current request has failed to connect.
	 *                                             Default false.
	 * @param string $context                      Optional. Full path to the directory that is tested
	 *                                             for being writable. Default empty.
	 * @param bool   $allow_relaxed_file_ownership Optional. Whether to allow Group/World writable. Default false.
	 * @return bool True on success, false on failure.
	 */
	p