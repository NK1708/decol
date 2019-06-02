<?php
	
	/**
		Add custom footer widget newsletter
	**/
	
	class pt_newsletter_subscribe extends WP_Widget{
		
		/**
			* Register widget with WordPress.
		*/
		
		function __construct() {
			$widget_ops = array( 
				'classname' => 'news_letter',
				'description' => esc_html__( 'Custom newsletter subscribe widget', 'patron' )
			);
			parent::__construct(
				'news_letter', // Base ID
				esc_html__( 'Newsletter Subscribe', 'patron' ), // Name
				$widget_ops // Args
			);
		}
		
		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			// outputs the content of the widget
			echo wp_kses($args['before_widget'], true);
			
			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses($args['before_title'], true) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses($args['after_title'], true);
			}
			
			if ( ! empty( $instance['description'] ) ) {
				echo '<p>' . apply_filters( 'widget_description', $instance['description'] ) . '</p>';
			}
			
			if ( ! empty( $instance['action'] ) ) {
			?>
			
			<!-- Begin MailChimp Signup Form -->
			<form action="<?php echo apply_filters( 'form_action', $instance['action'] ); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>
				
				<div class="mc-field-group form-group">
					<input type="email" placeholder="<?php echo apply_filters( 'attr_placeholder', $instance['em_placeholder'] ); ?>" value="" name="<?php echo apply_filters( 'attr_name', $instance['email'] ); ?>" class="email form-control" id="mce-EMAIL">
				</div>
				<div id="mce-responses" class="clear">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>

				<button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</form>
			<!--End mc_embed_signup-->
			
			<?php
			echo wp_kses($args['after_widget'], true);
			
			}
		}
		
		
		
		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ) {
			// outputs the options form on admin
			$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'patron' );
			$description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( '', 'patron' );
			$action = ! empty( $instance['action'] ) ? $instance['action'] : esc_html__( '', 'patron' );
			$email = ! empty( $instance['email'] ) ? $instance['email'] : esc_html__( '', 'patron' );
			$em_placeholder = ! empty( $instance['em_placeholder'] ) ? $instance['em_placeholder'] : esc_html__( '', 'patron' );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Description:', 'patron' ); ?></label>
				<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_attr( $description ); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'action' ) ); ?>"><?php esc_html_e( 'Form Action:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'action' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'action' ) ); ?>" type="text" value="<?php echo esc_attr( $action ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_html_e( 'Email Field:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'em_placeholder' ) ); ?>"><?php esc_html_e( 'Email Placeholder:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'em_placeholder' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'em_placeholder' ) ); ?>" type="text" value="<?php echo esc_attr( $em_placeholder ); ?>">
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
		function update( $new_instance, $old_instance ) {
			// processes widget options to be saved
			
			$instance = $old_instance;
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
			$instance['action'] = ( ! empty( $new_instance['action'] ) ) ? strip_tags( $new_instance['action'] ) : '';
			$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
			$instance['em_placeholder'] = ( ! empty( $new_instance['em_placeholder'] ) ) ? strip_tags( $new_instance['em_placeholder'] ) : '';

			return $instance;
		}
	
	}
	
	
	function patron_newsletter_widget_init(){			
		register_widget('pt_newsletter_subscribe');			
	}
	add_action('widgets_init','patron_newsletter_widget_init');
	
?>