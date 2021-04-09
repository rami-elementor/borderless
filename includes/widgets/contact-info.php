<?php
/**
 * Adds Borderless_Widget_Contact_Information widget.
 */
class Borderless_Widget_Contact_Information extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'borderless_widget_contact_information', // Base ID
			__( 'Borderless - Contact Information', 'borderless' ), // Name
			array( 'description' => __( 'Show your contact information.', 'borderless' ), ) // Args
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
        $alignment = apply_filters('widget_alignment', $instance['alignment']);
        $color = apply_filters('widget_color', $instance['color']);
        $direction = apply_filters('widget_direction', $instance['direction']);
        $email = apply_filters('widget_email', $instance['email']);
        $fax = apply_filters('widget_fax', $instance['fax']);
        $hours = apply_filters('widget_hours', $instance['hours']);
        $location = apply_filters('widget_location', $instance['location']);
        $mobile = apply_filters('widget_mobile', $instance['mobile']);
        $name = apply_filters('widget_name', $instance['name']);
        $phone = apply_filters('widget_phone', $instance['phone']);
        $slogan = apply_filters('widget_slogan', $instance['slogan']);
        $title = apply_filters('widget_title', $instance['title']);			
        
        echo $before_widget;
        if ( ! empty( $title ) )
           echo $before_title . $title . $after_title; ?>
       
       <!-- front display here -->
       <div class="borderless-widget contact-info <?php echo $instance['alignment'] .' '. $instance['color'] .' '. $instance['direction'] ?>">
        <ul>

            <?php if($hours) { ?>
                <li class="contact-info__item">
                    <svg class="borderless-icon-app__clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z"></path></svg>
                    <span><?php echo $hours; ?></span>
                </li>
            <?php } ?>

            <?php if($email) { ?>
                <li class="contact-info__item">
                    <svg class="borderless-icon-app__mail" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>
                    <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                </li>
            <?php } ?>

            <?php if($fax) { ?>
                <li class="contact-info__item">
                    <svg class="borderless-icon-app__fax" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48v96zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z"></path></svg>
                    <span><?php echo $fax; ?></span>
                </li>
            <?php } ?>

            <?php if($location) { ?>
                <li class="contact-info__item">
                    <svg class="borderless-icon-app__location" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg>    
                    <span><?php echo $location; ?></span>
                </li>
            <?php } ?>

            <?php if($mobile) { ?>
                <li class="contact-info__item">
                    <svg class="borderless-icon-app__mobile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM160 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path></svg>
                    <a href="tel:<?php echo $mobile; ?>"><?php echo $mobile; ?></a>
                </li>
            <?php } ?>

            <?php if($name) { ?>
                <li class="contact-info__item">
                    <svg class="borderless-icon-app__user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
                    <span><?php echo $name; ?></span>
                </li>
            <?php } ?>

            <?php if($phone) { ?>
                <li class="contact-info__item">
                    <svg class="borderless-icon-app__phone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>
                    <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                </li>
            <?php } ?>

            <?php if($slogan) { ?>
                <li class="contact-info__item">
                    <span><?php echo $slogan; ?></span>
                </li>
            <?php } ?>

        </ul>
    </div>
    
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
		//print_r($instance);
        
        // Alignment
      if ( isset( $instance[ 'alignment' ] ) ) {
       $alignment = $instance[ 'alignment' ];
   } else {
       $alignment = '';
   }

        // Business Hours
   if ( isset( $instance[ 'hours' ] ) ) {
    $hours = $instance[ 'hours' ];
} else {
    $hours = '';
}

        // Color Theming
if ( isset( $instance[ 'color' ] ) ) {
   $color = $instance[ 'color' ];
} else {
   $color = '';
}

        // Direction
if ( isset( $instance[ 'direction' ] ) ) {
   $direction = $instance[ 'direction' ];
} else {
   $direction = '';
}

        // Email
if ( isset( $instance[ 'email' ] ) ) {
    $email = $instance[ 'email' ];
} else {
    $email = '';
}

        // Fax
if ( isset( $instance[ 'fax' ] ) ) {
    $fax = $instance[ 'fax' ];
} else {
    $fax = '';
}

        // Location
if ( isset( $instance[ 'location' ] ) ) {
    $location = $instance[ 'location' ];
} else {
    $location = '';
}

        // Mobile
if ( isset( $instance[ 'mobile' ] ) ) {
   $mobile = $instance[ 'mobile' ];
} else {
   $mobile = '';
}

        // Name
if ( isset( $instance[ 'name' ] ) ) {
    $name = $instance[ 'name' ];
} else {
    $name = '';
}

        // Phone
if ( isset( $instance[ 'phone' ] ) ) {
    $phone = $instance[ 'phone' ];
} else {
    $phone = '';
}

        // Slogan
if ( isset( $instance[ 'slogan' ] ) ) {
    $slogan = $instance[ 'slogan' ];
} else {
    $slogan = '';
}

        // Title
if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
} else {
    $title = '';
} 


?>


<p>
 <label for="<?php echo $this->get_field_id('alignment'); ?>"><?php _e('Alignment:', 'borderless' ) ?></label>
 <select id="<?php echo $this->get_field_id('alignment'); ?>" name="<?php echo $this->get_field_name('alignment'); ?>" class="widefat">
    <option value='contact-info--align-left'<?php selected( $alignment, 'contact-info--align-left'); ?>><?php _e( 'Left', 'borderless' ); ?></option>
    <option value='contact-info--align-center'<?php selected( $alignment, 'contact-info--align-center'); ?>><?php _e( 'Center', 'borderless' ); ?></option> 
    <option value='contact-info--align-right'<?php selected( $alignment, 'contact-info--align-right'); ?>><?php _e( 'Right', 'borderless' ); ?></option> 
    <option value='contact-info--align-space-between'<?php selected( $alignment, 'contact-info--align-space-between'); ?>><?php _e( 'Space Between', 'borderless' ); ?></option> 
    <option value='contact-info--align-space-around'<?php selected( $alignment, 'contact-info--align-space-around'); ?>><?php _e( 'Space Around', 'borderless' ); ?></option> 
    <option value='contact-info--align-space-evenly'<?php selected( $alignment, 'contact-info--align-space-evenly'); ?>><?php _e( 'Space Evenly', 'borderless' ); ?></option> 
</select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('color'); ?>"><?php _e('Color:', 'borderless') ?></label>
    <select id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>" class="widefat">
        <option value='contact-info--primary-color'<?php selected( $color, 'contact-info--primary-color'); ?>><?php _e( 'Primary Color', 'borderless' ); ?></option>
        <option value='contact-info--secondary-color'<?php selected( $color, 'contact-info--secondary-color'); ?>><?php _e( 'Secondary Color', 'borderless' ); ?></option> 
        <option value='contact-info--tertiary-color'<?php selected( $color, 'contact-info--tertiary-color'); ?>><?php _e( 'Tertiary Color', 'borderless' ); ?></option> 
        <option value='contact-info--contrast-color'<?php selected( $color, 'contact-info--contrast-color'); ?>><?php _e( 'Contrast Color', 'borderless' ); ?></option> 
    </select>
</p> 
<p>
   <label for="<?php echo $this->get_field_id('direction'); ?>"><?php _e('Direction:', 'borderless') ?></label>
   <select id="<?php echo $this->get_field_id('direction'); ?>" name="<?php echo $this->get_field_name('direction'); ?>" class="widefat">
    <option value='contact-info--direction-row'<?php selected( $direction, 'contact-info--direction-column-row'); ?>><?php _e( 'Row', 'borderless' ); ?></option>
    <option value='contact-info--direction-column'<?php selected( $direction, 'contact-info--direction-column'); ?>><?php _e( 'Column', 'borderless' ); ?></option> 
</select>
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'hours' ); ?>"><?php _e( 'Business hours:', 'borderless' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'hours' ); ?>" name="<?php echo $this->get_field_name( 'hours' ); ?>" type="text" value="<?php echo esc_attr( $hours ); ?>" />
</p>  
<p>
    <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:', 'borderless' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
</p> 
<p>
    <label for="<?php echo $this->get_field_id( 'fax' ); ?>"><?php _e( 'Fax:', 'borderless' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" type="text" value="<?php echo esc_attr( $fax ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'location' ); ?>"><?php _e( 'Location:', 'borderless' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'location' ); ?>" name="<?php echo $this->get_field_name( 'location' ); ?>" type="text" value="<?php echo esc_attr( $location ); ?>" />
</p> 
<p>
    <label for="<?php echo $this->get_field_id( 'mobile' ); ?>"><?php _e( 'Mobile:', 'borderless' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'mobile' ); ?>" name="<?php echo $this->get_field_name( 'mobile' ); ?>" type="text" value="<?php echo esc_attr( $mobile ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:', 'borderless' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
</p>     
<p>
    <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:', 'borderless' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'slogan' ); ?>"><?php _e( 'Slogan:', 'borderless' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'slogan' ); ?>" name="<?php echo $this->get_field_name( 'slogan' ); ?>" type="text" value="<?php echo esc_attr( $slogan ); ?>" />
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
    $instance['alignment'] = ( !empty( $new_instance['alignment'] ) ) ? strip_tags( $new_instance['alignment'] ) : '';
    $instance['color'] = ( !empty( $new_instance['color'] ) ) ? strip_tags( $new_instance['color'] ) : '';
    $instance['direction'] = ( !empty( $new_instance['direction'] ) ) ? strip_tags( $new_instance['direction'] ) : '';
    $instance['email'] = ( !empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
    $instance['fax'] = ( !empty( $new_instance['fax'] ) ) ? strip_tags( $new_instance['fax'] ) : '';
    $instance['hours'] = ( !empty( $new_instance['hours'] ) ) ? strip_tags( $new_instance['hours'] ) : '';
    $instance['location'] = ( !empty( $new_instance['location'] ) ) ? strip_tags( $new_instance['location'] ) : '';
    $instance['mobile'] = ( !empty( $new_instance['mobile'] ) ) ? strip_tags( $new_instance['mobile'] ) : '';
    $instance['name'] = ( !empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : '';
    $instance['phone'] = ( !empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
    $instance['slogan'] = ( !empty( $new_instance['slogan'] ) ) ? strip_tags( $new_instance['slogan'] ) : '';
    $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    
    return $instance;
}

} // class Borderless_Widget_Contact_Information ends



// register Borderless_Widget_Contact_Information widget
function register_borderless_widget_contact_information() {
    register_widget( 'Borderless_Widget_Contact_Information' );
}
add_action( 'widgets_init', 'register_borderless_widget_contact_information' );