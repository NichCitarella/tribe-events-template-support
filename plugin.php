<?php
/**
 * Plugin Name: Oxygen Tribe Events Template Support
 * Plugin URI:  https://github.com/NichCitarella/tribe-events-template-support
 * GitHub URI:  NichCitarella/tribe-events-template-support
 * Description: Made to allow Oxygen Builder work with Custom Templates for The Event Calendar.
 * 
 * The contents of the /view folder can be placed directly into wp-content/tribe-events.
 * No special file structure is needed for simplicity.
 * 
 * Version:     1.0.0
 * Author:      Nich Citarella
 * Author URI:  https://nichcitarella.com
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2, as published by the
 * Free Software Foundation.  You may NOT assume that you can use any other
 * version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.
 *
 * @package    Oxygen Tribe Events Template Support
 * @since      1.0.0
 * @copyright  Copyright (c) 2019, Nich Citarella
 * @license    GPL-3.0+
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Oxygen_Tribe_Events_Template_Support {
	protected $alt_template_path = '';
	public function __construct() {
		if ( $this->alt_template_path() ) {
			add_filter( 'tribe_events_template', array( $this, 'filter_template_paths' ) );
			add_filter( 'tribe_tickets_template', array( $this, 'filter_template_paths' ) );
		}
	}
  // Defines the new template path as wp-content/tribe-events
	protected function alt_template_path() {
		$path = trailingslashit( WP_CONTENT_DIR ) . 'tribe-events';
		if ( is_dir( $path ) && is_readable( $path ) ) {
			$this->alt_template_path = $path;
			return true;
		}
		return false;
	}
	public function filter_template_paths( $path ) {
		// Searches for the template paths in Events Calendar in /src/views/
		$src_views = strpos( $path, '/src/views/' );
		if ( ! $src_views ) {
			return $path;
		}
		$sub_path = substr( $path, $src_views + 11 );
		$possible_override = $this->alt_template_path . '/' . $sub_path;
		if ( file_exists( $possible_override ) ) {
			return $possible_override;
		}
		return $path;
	}
}
function oxygen_tribe_events_template_support() {
	static $object;
	return empty( $object )
		? $object = new Oxygen_Tribe_Events_Template_Support
		: $object;
}
oxygen_tribe_events_template_support();
