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

/**
 * add shortcode
 *
 * @param: string $format time format to use; defaults to hh:mm:ss
 * @param: string $start_time starting time
 * @param: string $end_time count down this much time
 * @param: int $digit_images
 * @param: int $digit_width width (in px) of digit images
 * @param: int $digit_height height (in px) of digit images
 * @param: string $timer_end Javascript code with callback function to run when countdown is complete
 * @param: string $image name of digits file; defaults to "digits.png"
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
        'timer_end'     => NULL,
        'image'         => NULL,
    ), $attributes );
        $this_format = esc_attr( $shortcode_attributes['format'] );
        $this_start_time = esc_attr( $shortcode_attributes['start_time'] );
        $this_end_time = esc_attr( $shortcode_attributes['end_time'] );
        $this_digit_images = esc_attr( $shortcode_attributes['digit_images'] );
        $this_digit_width = esc_attr( $shortcode_attributes['digit_width'] );
        $this_digit_height = esc_attr( $shortcode_attributes['digit_height'] );
        $this_timer_end = esc_attr( $shortcode_attributes['timer_end'] );
        $this_image = esc_attr( $shortcode_attributes['image'] );


    $shortcode_content .= '';

    return $shortcode_content;
}

