<?php

/**
*
*	This class is responsible for creating custom options used by both Aesop Story Engine and Lasso
*
*/
class timelineSettings {

	function __construct(){

		// if you arent using Lasso then this filter isnt needed
		add_filter('lasso_custom_options',		array($this,'options'));

		// if you arent using aesop story engine then this filter isnt needed
		add_filter('aesop_avail_components',	array($this, 'options') );
	}
	/**
	*
	*	This adds our options into the generator for both Lasso and Aesop Story Engine
	*
	*/
	function options($shortcodes) {

		$custom = array(
			'timeline' 						=> array(
				'name' 							=> 'Timeline for Aesop Story Engine',
				'type' 							=> 'single',
				'atts'							=> array(
					'icon'						=> array(
						'type'					=> 'text',
						'default'				=> 'dashicons dashicons-edit',
						'desc'					=> 'Icon font class',
						'tip'						=> 'By default we make <a href="https://developer.wordpress.org/resource/dashicons/" target="_blank">Dashicon</a> available. We also support <a href="http://fontawesome.io/icons/" target="_blank">Font Awesome</a> classes, but loading the font is up to you.',
					),
					'icon_color'			=> array(
						'type'					=> 'color',
						'default'				=> '',
						'desc'					=> 'Icon color',
						'tip'						=> 'Set the icon color.',
					),
					'color'						=> array(
						'type'					=> 'color',
						'default'				=> '#eeeeee',
						'desc'					=> 'Color',
						'tip'						=> 'Set the icon background color.',
					),
					'title'						=> array(
						'type'					=> 'text',
						'default'				=> '',
						'desc'					=> 'Event title',
						'tip'						=> '',
					),
					'text'						=> array(
						'type'					=> 'text_area',
						'default'				=> '',
						'desc'					=> 'Event description',
						'tip'						=> '',
					),
					'image'						=> array(
						'type'					=> 'media_upload',
						'default'				=> '',
						'desc'					=> 'Background image',
						'tip'						=> '',
					),
					'link'						=> array(
						'type'					=> 'text',
						'default'				=> '',
						'desc'					=> 'Event link',
						'tip'						=> '',
					),
					'link_text'				=> array(
						'type'					=> 'text',
						'default'				=> '',
						'desc'					=> 'Link text',
						'tip'						=> '',
					),
					'timestamp'				=> array(
						'type'					=> 'text',
						'default'				=> '',
						'desc'					=> 'Event time or date',
						'tip'						=> '',
					),
				),
			),
		);

		return array_merge( $shortcodes, $custom );

	}
}
new timelineSettings;
