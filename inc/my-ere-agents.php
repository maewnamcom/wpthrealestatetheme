<?php

/*
Plugin Name: My Widget Plugin
Plugin URI: http://www.website.com/create-widget-plugin-wordpress/
Description: This plugin adds a custom widget.
Version: 1.0
Author: name
Author URI: http://www.website.com/create-widget-plugin-wordpress/
License: GPL2
*/

class jpen_Example_Widget extends WP_Widget {

	public function __construct() {
		$widget_options = array(
			'classname' => 'example_widget',
			'description' => 'This is an Example Widget',
		);
		parent::__construct( 'example_widget', 'Example Widget', $widget_options );
	}

	// admin console
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
        <input type="text"
               id="<?php echo $this->get_field_id( 'title' ); ?>"
               name="<?php echo $this->get_field_name( 'title' ); ?>"
               value="<?php echo esc_attr( $title ); ?>" />
        </p><?php
	}
	// on ui page
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		echo $title;
		echo 555;
	}

}

function jpen_register_example_widget() {
	register_widget( 'jpen_Example_Widget' );
}
add_action( 'widgets_init', 'jpen_register_example_widget' );
?>