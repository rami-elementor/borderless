<?php
/**
 * Adds Borderless_Divider widget.
 */
class Borderless_Divider extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'borderless_divider', // Base ID
			__( 'Borderless - Divider', 'borderless' ), // Name
			array( 'description' => __( 'Divider allows add horizontal or vertical line between elements.', 'borderless' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$axis = apply_filters('widget_axis', $instance['axis']);
		$color = apply_filters('widget_color', $instance['color']);
		$size = apply_filters('widget_size', $instance['size']);
		$space = apply_filters('widget_space', $instance['space']);
		
		echo $before_widget;
		
		if ( $axis == 'divider--horizontal' ) {
		$size = 'width:'.$size.';';
		$space = 'margin:'.$space.' 0;';
		} else if ( $axis == 'divider--vertical' ) {
			$size = 'height:'.$size.';';
			$space = 'margin:0 '.$space.';';
		} ?>
			
		<div class="borderless-widget divider <?php echo $axis.' '.$color; ?>" style="<?php echo $size.' '.$space; ?>"></div>

		<?php echo $after_widget;
	}
	
	
        /**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
        public function form( $instance ) {
		 
			// Axis
			if ( isset( $instance[ 'axis' ] ) ) {
				$axis = $instance[ 'axis' ];
			}
			else {
				$axis = 'divider--horizontal';
			}

			// Color Theming
			if ( isset( $instance[ 'color' ] ) ) {
				$color = $instance[ 'color' ];
			} else {
				$color = 'divider--contrast-color';
			}

			// Size
        	if ( isset( $instance[ 'size' ] ) ) {
        		$size = $instance[ 'size' ];
        	}
        	else {
        		$size = '2rem';
        	}
			
			// Space
        	if ( isset( $instance[ 'space' ] ) ) {
        		$space = $instance[ 'space' ];
        	}
        	else {
        		$space = '1rem';
        	}
        	
        	?>

			<p>
        		<label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Size - CSS measurement units allowed', 'borderless' ); ?></label> 
        		<input class="widefat" id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>" type="text" value="<?php echo esc_attr( $size ); ?>" />
			</p>
        	<p>
        		<label for="<?php echo $this->get_field_id( 'space' ); ?>"><?php _e( 'Space - CSS measurement units allowed', 'borderless' ); ?></label> 
        		<input class="widefat" id="<?php echo $this->get_field_id( 'space' ); ?>" name="<?php echo $this->get_field_name( 'space' ); ?>" type="text" value="<?php echo esc_attr( $space ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('axis'); ?>"><?php _e('Axis:', 'borderless') ?></label>
				<select id="<?php echo $this->get_field_id('axis'); ?>" name="<?php echo $this->get_field_name('axis'); ?>" class="widefat">
					<option value='divider--horizontal'<?php selected( $axis, 'divider--horizontal'); ?>><?php _e( 'Horizontal', 'borderless' ); ?></option>
					<option value='divider--vertical'<?php selected( $axis, 'divider--vertical'); ?>><?php _e( 'Vertical', 'borderless' ); ?></option> 
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('color'); ?>"><?php _e('Color:', 'borderless') ?></label>
				<select id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>" class="widefat">
					<option value='divider--primary-color'<?php selected( $color, 'divider--primary-color'); ?>><?php _e( 'Primary Color', 'borderless' ); ?></option>
					<option value='divider--secondary-color'<?php selected( $color, 'divider--secondary-color'); ?>><?php _e( 'Secondary Color', 'borderless' ); ?></option> 
					<option value='divider--tertiary-color'<?php selected( $color, 'divider--tertiary-color'); ?>><?php _e( 'Tertiary Color', 'borderless' ); ?></option> 
					<option value='divider--contrast-color'<?php selected( $color, 'divider--contrast-color'); ?>><?php _e( 'Contrast Color', 'borderless' ); ?></option> 
				</select>
			</p>
        	
        <?php }


   /**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
   public function update( $new_instance, $old_instance ) {
   		$instance = array();
		$instance['axis'] = ( !empty( $new_instance['axis'] ) ) ? strip_tags( $new_instance['axis'] ) : '';
		$instance['color'] = ( !empty( $new_instance['color'] ) ) ? strip_tags( $new_instance['color'] ) : '';
		$instance['size'] = ( !empty( $new_instance['size'] ) ) ? strip_tags( $new_instance['size'] ) : '';
   		$instance['space'] = ( !empty( $new_instance['space'] ) ) ? strip_tags( $new_instance['space'] ) : '';
   	
   	return $instance;
   }
   
} // class Borderless_Divider ends



// register Borderless_Divider widget
function register_borderless_divider() {
	register_widget( 'Borderless_Divider' );
}
add_action( 'widgets_init', 'register_borderless_divider' );