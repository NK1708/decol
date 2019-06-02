<?php
	
	/**
		Add custom footer widget social media
	**/
	
	class pt_socialmedia_widget extends WP_Widget{
		
		/**
			* Register widget with WordPress.
		*/
		
		function __construct() {
			$social_ops = array( 
				'classname' => 'social_media',
				'description' => esc_html__( 'Custom social medai link widget', 'patron' )
			);
			parent::__construct(
				'social_media', // Base ID
				esc_html__( 'Social Media Link', 'patron' ), // Name
				$social_ops // Args
			);
		}
		
		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget($args, $instance){
			
			// outputs the content of the widget
			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses($args['before_title'], true) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses($args['after_title'], true);
				
				$space = 'no-margin';
			}
			
			else {
				$space = 'margin-top-20';
			}
			
			echo '<ul class="social-icon ' . esc_attr($space) . '">';
			
				if ( ! empty( $instance['fblink'] ) ) {
					echo '<li><a href="' . apply_filters( 'fb_foo', $instance['fblink'] ) . '" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
				}
				
				if ( ! empty( $instance['twlink'] ) ) {
					echo '<li><a href="' . apply_filters( 'tw_foo', $instance['twlink'] ) . '" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
				}
				
				if ( ! empty( $instance['gplink'] ) ) {
					echo '<li><a href="' . apply_filters( 'gp_foo', $instance['gplink'] ) . '" title="Google Plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';
				}
				
				if ( ! empty( $instance['inlink'] ) ) {
					echo '<li><a href="' . apply_filters( 'gp_foo', $instance['inlink'] ) . '" title="Linked In"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>';
				}
				
				if ( ! empty( $instance['vmlink'] ) ) {
					echo '<li><a href="' . apply_filters( 'vm_foo', $instance['vmlink'] ) . '" title="Vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>';
				}
				
				if ( ! empty( $instance['pinlink'] ) ) {
					echo '<li><a href="' . apply_filters( 'pin_foo', $instance['pinlink'] ) . '" title="Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>';
				}
			
			echo '</ul>';
						
		}
		
		
		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ){
			
			// outputs the options form on admin
			$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'patron' );
			$fblink = ! empty( $instance['fblink'] ) ? $instance['fblink'] : esc_html__( '', 'patron' );
			$twlink = ! empty( $instance['twlink'] ) ? $instance['twlink'] : esc_html__( '', 'patron' );
			$gplink = ! empty( $instance['gplink'] ) ? $instance['gplink'] : esc_html__( '', 'patron' );
			$inlink = ! empty( $instance['inlink'] ) ? $instance['inlink'] : esc_html__( '', 'patron' );
			$vmlink = ! empty( $instance['vmlink'] ) ? $instance['vmlink'] : esc_html__( '', 'patron' );
			$pinlink = ! empty( $instance['pinlink'] ) ? $instance['pinlink'] : esc_html__( '', 'patron' );
			
		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'fblink' ) ); ?>"><?php esc_html_e( 'Facebook:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fblink' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fblink' ) ); ?>" type="text" value="<?php echo esc_attr( $fblink ); ?>">
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'twlink' ) ); ?>"><?php esc_html_e( 'Twitter:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twlink' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twlink' ) ); ?>" type="text" value="<?php echo esc_attr( $twlink ); ?>">
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'gplink' ) ); ?>"><?php esc_html_e( 'Google Plus:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'gplink' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'gplink' ) ); ?>" type="text" value="<?php echo esc_attr( $gplink ); ?>">
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'inlink' ) ); ?>"><?php esc_html_e( 'Linked In:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'inlink' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'inlink' ) ); ?>" type="text" value="<?php echo esc_attr( $inlink ); ?>">
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'vmlink' ) ); ?>"><?php esc_html_e( 'Vimeo:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vmlink' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vmlink' ) ); ?>" type="text" value="<?php echo esc_attr( $vmlink ); ?>">
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'pinlink' ) ); ?>"><?php esc_html_e( 'Pinterest:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinlink' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinlink' ) ); ?>" type="text" value="<?php echo esc_attr( $pinlink ); ?>">
			</p>
		
		<?php
		}
		
		
		/**
		* Processing widget options on save
		 *
		 * @param array $new_instance The new options
		 * @param array $old_instance The previous options
		 *
		 * @return array
		 */
		function update( $new_instance, $old_instance ){
			// processes widget options to be saved		
			$instance = $old_instance;
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['fblink'] = ( ! empty( $new_instance['fblink'] ) ) ? strip_tags( $new_instance['fblink'] ) : '';
			$instance['twlink'] = ( ! empty( $new_instance['twlink'] ) ) ? strip_tags( $new_instance['twlink'] ) : '';
			$instance['gplink'] = ( ! empty( $new_instance['gplink'] ) ) ? strip_tags( $new_instance['gplink'] ) : '';
			$instance['inlink'] = ( ! empty( $new_instance['inlink'] ) ) ? strip_tags( $new_instance['inlink'] ) : '';
			$instance['vmlink'] = ( ! empty( $new_instance['vmlink'] ) ) ? strip_tags( $new_instance['vmlink'] ) : '';
			$instance['pinlink'] = ( ! empty( $new_instance['pinlink'] ) ) ? strip_tags( $new_instance['pinlink'] ) : '';
			
			return $instance;
		}
		
	}
	
	
	function patron_social_widget_init(){			
		register_widget('pt_socialmedia_widget');			
	}
	add_action('widgets_init','patron_social_widget_init');
	
?>