<?php

/**
*
*	Draws the shorcode component used for Aesop Story Engine
* 	Note: components in shortcode form not required see class.front-end.php
*
*/
class timelineSC {

	// the shortcode HAS to start with aesop_
	function __construct(){
		add_shortcode('aesop_timeline', 			array($this, 'shortcode') );
	}

	/**
	*
	*	Components are shortcodes
	*
	*
	*/
	function shortcode($atts, $content = null) {

		$defaults = array(
			'icon'				=> 'dashicons dashicons-edit',
			'icon_color'	=> '',
			'color'				=> '#eeeeee',
			'title'				=> '',
			'text'				=> '',
			'image'				=> '',
			'link'				=> '',
			'link_text'		=> '',
			'timestamp'		=> '',
		);

		$atts 	= shortcode_atts($defaults, $atts);

		// account for multiple instances of this component
		static $instance = 0;
		$instance++;
		$unique = sprintf('timeline-shortcode-%s-%s',get_the_ID(), $instance);

		// example of getting an option value
		//$beta  	= $atts['beta'];
		$icon				= $atts['icon'];
		$icon_color	= $atts['icon_color'];
		$color			= $atts['color'];
		$title			= $atts['title'];
		$text				= $atts['text'];
		$image			= $atts['image'];
		$link				= $atts['link'];
		$link_text	= $atts['link_text'];
		$timestamp	= $atts['timestamp'];

		$has_image = '' != $image ? 'has-image' : '';
		$no_link = '' == $link ? 'no-link' : '';

		// if lasso is active we need to map the sc atts as data-attributes
		if ( class_exists( 'lasso_autoloader' ) && ( function_exists('lasso_user_can') && lasso_user_can() ) ) {
			$options = function_exists('aesop_component_data_atts') ? aesop_component_data_atts('timeline', $unique, $atts) : false;
		} else {
			$options = false;
		}

		$out = sprintf('' .

		// timeline block markup
		'<div id="%s" class="aesop-component aesop-component-timeline-block" %s>' .
			'<div class="aesop-component-timeline-icon" style="background-color: %s;">' .
				'<i class="%s" style="color: %s;"></i>' .
			'</div>' .
			'<div class="aesop-component-timeline-content %s %s">' .
				'<div class="aesop-component-timeline-image" style="background-image: url(\'%s\');"></div>' .
				'<h2 class="aesop-component-timeline-title">%s</h2>' .
				'<p class="aesop-component-timeline-text">%s</p>' .
				'<a class="aesop-component-timeline-link" href="%s">%s</a>' .
				'<span class="aesop-component-timeline-timestamp">%s</span>' .
			'</div>' .
		'</div>',
		$unique, $options,

		// all the option values go here
		$color, $icon, $icon_color, $has_image, $no_link, $image, $title, $text, $link, $link_text, $timestamp
		);

		return $out;
	}
}
new timelineSC;
