<?php
 
/**
 * Adds Borderless_Search widget.
 */
class Borderless_Search extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {

        parent::__construct(
			'borderless_search', // Base ID
			__( 'Borderless - Search', 'borderless' ), // Name
			array( 'description' => __( 'A search form for your site.', 'borderless' ), ) // Args
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
        $button = apply_filters( 'widget_button', $instance['button'] );
        $button_text = apply_filters( 'widget_button_text', $instance['button_text'] );
        $color = apply_filters( 'widget_color', $instance['color'] );
        $placeholder_text = apply_filters( 'widget_placeholder_text', $instance['placeholder_text'] );
        $shape = apply_filters( 'widget_shape', $instance['shape'] );
        $title = apply_filters( 'widget_title', $instance['title'] );
 
        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        } ?>
        
        <form method="get" id="searchform" class="search <?php echo $button.' '.$color.' '.$shape;?>" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
            <label class="sr-only" for="s"><?php esc_html_e( 'Search', 'borderless' ); ?></label>
            <div class="input-group">
                <?php if ($button == 'search--left-button') { ?>
                    <span class="input-group-append">
                        <input class="submit btn search-form-button" id="searchsubmit" name="submit" type="submit"
                        value="<?php echo $button_text; ?>">
                    </span>
                <?php } ?>
                <input class="field form-control search-form-input" id="s" name="s" type="text"
                    placeholder="<?php echo $placeholder_text; ?>" value="<?php the_search_query(); ?>">
                <?php if ($button == 'search--right-button') { ?>
                    <span class="input-group-append">
                        <input class="submit btn search-form-button" id="searchsubmit" name="submit" type="submit"
                        value="<?php echo $button_text; ?>">
                    </span>
                <?php } ?>
            </div>
        </form>

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
        // Button
        if ( isset( $instance[ 'button' ] ) ) {
            $button = $instance[ 'button' ];
        }
        else {
            $button = 'search--right-button';
        }

        // Button Text
        if ( isset( $instance[ 'button_text' ] ) ) {
            $button_text = $instance[ 'button_text' ];
        }
        else {
            $button_text = __( 'Search', 'borderless' );
        }

        // Color
        if ( isset( $instance[ 'color' ] ) ) {
            $color = $instance[ 'color' ];
        }
        else {
            $color = 'search--primary-color';
        }

        // Placeholder Text
        if ( isset( $instance[ 'placeholder_text' ] ) ) {
            $placeholder_text = $instance[ 'placeholder_text' ];
        }
        else {
            $placeholder_text = __( 'Search ...', 'borderless' );
        }

        // Shape
        if ( isset( $instance[ 'shape' ] ) ) {
            $shape = $instance[ 'shape' ];
        }
        else {
            $shape = 'search--rounded';
        }

        // Title
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'borderless' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:', 'borderless' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_name( 'button_text' ); ?>"><?php _e( 'Button Text:', 'borderless' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" />
         </p>
         <p>
            <label for="<?php echo $this->get_field_name( 'placeholder_text' ); ?>"><?php _e( 'Placeholder Text:', 'borderless' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'placeholder_text' ); ?>" name="<?php echo $this->get_field_name( 'placeholder_text' ); ?>" type="text" value="<?php echo esc_attr( $placeholder_text ); ?>" />
         </p>
         <p>
			<label for="<?php echo $this->get_field_id('button'); ?>"><?php _e('Button:', 'borderless') ?></label>
			<select id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" class="widefat">
                <option value='search--no-button'<?php selected( $button, 'search--no-button'); ?>><?php _e( 'No Button', 'borderless' ); ?></option>
                <option value='search--left-button'<?php selected( $button, 'search--left-button'); ?>><?php _e( 'Left Button', 'borderless' ); ?></option> 
                <option value='search--right-button'<?php selected( $button, 'search--right-button'); ?>><?php _e( 'Right Button', 'borderless' ); ?></option> 
			</select>
        </p>
         <p>
			<label for="<?php echo $this->get_field_id('color'); ?>"><?php _e('Color:', 'borderless') ?></label>
			<select id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>" class="widefat">
                <option value='search--primary-color'<?php selected( $color, 'search--primary-color'); ?>><?php _e( 'Primary Color', 'borderless' ); ?></option>
                <option value='search--secondary-color'<?php selected( $color, 'search--secondary-color'); ?>><?php _e( 'Secondary Color', 'borderless' ); ?></option> 
                <option value='search--tertiary-color'<?php selected( $color, 'search--tertiary-color'); ?>><?php _e( 'Tertiary Color', 'borderless' ); ?></option> 
                <option value='search--contrast-color'<?php selected( $color, 'search--contrast-color'); ?>><?php _e( 'Contrast Color', 'borderless' ); ?></option> 
			</select>
        </p>
         <p>
			<label for="<?php echo $this->get_field_id('shape'); ?>"><?php _e('Shape:', 'borderless') ?></label>
			<select id="<?php echo $this->get_field_id('shape'); ?>" name="<?php echo $this->get_field_name('shape'); ?>" class="widefat">
                <option value='search--rounded'<?php selected( $shape, 'search--rounded'); ?>><?php _e( 'Rounded', 'borderless' ); ?></option>
                <option value='search--round'<?php selected( $shape, 'search--round'); ?>><?php _e( 'Round', 'borderless' ); ?></option> 
                <option value='search--square'<?php selected( $shape, 'search--square'); ?>><?php _e( 'Square', 'borderless' ); ?></option>  
			</select>
        </p>
    <?php
    }
 
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
        $instance['button'] = ( !empty( $new_instance['button'] ) ) ? strip_tags( $new_instance['button'] ) : '';
        $instance['button_text'] = ( !empty( $new_instance['button_text'] ) ) ? strip_tags( $new_instance['button_text'] ) : '';
        $instance['color'] = ( !empty( $new_instance['color'] ) ) ? strip_tags( $new_instance['color'] ) : '';
        $instance['placeholder_text'] = ( !empty( $new_instance['placeholder_text'] ) ) ? strip_tags( $new_instance['placeholder_text'] ) : '';
        $instance['shape'] = ( !empty( $new_instance['shape'] ) ) ? strip_tags( $new_instance['shape'] ) : '';
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 
        return $instance;
    }
 
} // class Borderless_Search
 
// register Borderless_Search widget
add_action( 'widgets_init', 'register_borderless_search' );

function register_borderless_search() {
    register_widget( 'Borderless_Search' );
}