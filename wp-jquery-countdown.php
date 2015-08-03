<?php
/**
 * Plugin Name: WP jQuery Countdown
 * Plugin URI: https://github.com/Pressed-Solutions/wp-jquery-countdown
 * Description: A simple plugin to add a jQuery-powered countdown using a shortcode
 * Version: 1.0
 * Author: AndrewRMinion Design
 * Author URI: http://andrewrminion.com/
 * Copyright: 2015 AndrewRMinion Design (andrew@andrewrminion.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
 * Register the jQuery file
 */
add_action( 'wp_enqueue_scripts', 'register_jquery_countdown' );
function register_jquery_countdown() {
    wp_register_script( 'wp-jquery-countdown', plugins_url( 'js/jquery.countdown.min.js', __FILE__ ), array( 'jquery' ) );
}

/**
 * add shortcode
 *
 * @param: string $format time format to use; defaults to hh:mm:ss
 * @param: string $start_time start the timer at this number
 * @param: string $end_time end the timer at this time
 * @param: int $digit_images
 * @param: int $digit_width width (in px) of digit images
 * @param: int $digit_height height (in px) of digit images
 * @param: string $image path and name of digits file (relative to site root folder or absolute URL); defaults to "digits.png"
 * @return: string HTML, including the jQuery scripts
 */
add_shortcode( 'wp_jquery_countdown', 'wp_jquery_countdown' );
function wp_jquery_countdown( $attributes ) {
    $shortcode_attributes = shortcode_atts( array (
        'format'        => NULL,
        'start_time'    => NULL,
        'end_time'      => NULL,
        'digit_images'  => NULL,
        'digit_width'   => NULL,
        'digit_height'  => NULL,
        'image'         => NULL,
    ), $attributes );
        $this_format = esc_attr( $shortcode_attributes['format'] );
        $this_start_time = esc_attr( $shortcode_attributes['start_time'] );
        $this_end_time = esc_attr( $shortcode_attributes['end_time'] );
        $this_digit_images = esc_attr( $shortcode_attributes['digit_images'] );
        $this_digit_width = esc_attr( $shortcode_attributes['digit_width'] );
        $this_digit_height = esc_attr( $shortcode_attributes['digit_height'] );
        $this_image = esc_attr( $shortcode_attributes['image'] );

    // set up image file
    if ( strpos( $this_image, 'http' ) ) { return; }
    else { $this_image = plugins_url( 'img/digits.png', __FILE__ ); }

    // include the jQuery script
    wp_enqueue_script( 'wp-jquery-countdown' );

    // instantiate the PHP variable
    $shortcode_content = NULL;

    // add the inline JS
    $shortcode_content .= '<script type="text/javascript">';
    $shortcode_content .= "jQuery('document').ready(function() {";
    $shortcode_content .= "jQuery('#wp_jquery_countdown').countdown({";
        // include options
        if ( $this_format ) { $shortcode_content .= 'format: "'. $this_format . '",' . "\n"; }
        if ( $this_start_time ) { $shortcode_content .= 'startTime: "'. $this_start_time . '",' . "\n"; }
        if ( $this_end_time ) { $shortcode_content .= 'endTime: "'. $this_end_time . '",' . "\n"; }
        if ( $this_digit_images ) { $shortcode_content .= 'digitImages: '. $this_digit_images . ',' . "\n"; }
        if ( $this_digit_width ) { $shortcode_content .= 'digitWidth: '. $this_digit_width . ',' . "\n"; }
        if ( $this_digit_height ) { $shortcode_content .= 'digitHeight: '. $this_digit_height . ',' . "\n"; }
    $shortcode_content .= 'image: "'. $this_image . '",' . "\n";
    $shortcode_content .= "});";
    $shortcode_content .= "});";
    $shortcode_content .= '</script>';

    // add the HTML
    $shortcode_content .= '<div id="wp_jquery_countdown"></div>';

    return $shortcode_content;
}
