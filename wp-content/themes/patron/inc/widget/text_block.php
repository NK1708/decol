<?php
	
	/**
		Add custom text block widget
	**/
	
	class pt_textblock_widget extends WP_Widget{
	
		/**
			* Register widget with WordPress.
		*/
		
		function __construct(){
			
			$widget_ops = array( 
				'classname' => 'text_block',
				'description' => esc_html__( 'Custom text block and link', 'patron' )
			);
			parent::__construct(
				'text_block', // Base ID
				esc_html__( 'Text Block', 'patron' ), // Name
				$widget_ops // Args
			);
					
		}
		
		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ){
			
			// outputs the content of the widget
			echo wp_kses($args['before_widget'], true);
			
			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses($args['before_title'], true) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses($args['after_title'], true);
			}
			
			if ( ! empty( $instance['description'] ) ) {
				echo '<p>' . apply_filters( 'widget_description', $instance['description'] ) . '</p>';
			}
			
			if ( ! empty( $instance['btn_text'] ) ) {
				echo '<a href="' . apply_filters( 'button_link', $instance['file_url'] ) . '" class="btn btn-primary">' . apply_filters( 'btn_content', $instance['btn_text'] ) . '</a>';
			}
			
			echo wp_kses($args['after_widget'], true);
			
		}
		
		
		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ){
			// outputs the options form on admin
			$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'patron' );
			$description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( '', 'patron' );
			$btn_text = ! empty( $instance['btn_text'] ) ? $instance['btn_text'] : esc_html__( '', 'patron' );
			$file_url = ! empty( $instance['file_url'] ) ? $instance['file_url'] : esc_html__( '', 'patron' );
			
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'Description:', 'patron' ); ?></label>
				<textarea class="widefat" rows="12" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_attr( $description ); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>"><?php esc_html_e( 'Button Text:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'btn_text' ) ); ?>" type="text" value="<?php echo esc_attr( $btn_text ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'file_url' ) ); ?>"><?php esc_html_e( 'URL:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'file_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'file_url' ) ); ?>" type="text" value="<?php echo esc_attr( $file_url ); ?>">
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
			$instance = $old_instance;
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
			$instance['btn_text'] = ( ! empty( $new_instance['btn_text'] ) ) ? strip_tags( $new_instance['btn_text'] ) : '';
			$instance['file_url'] = ( ! empty( $new_instance['file_url'] ) ) ? strip_tags( $new_instance['file_url'] ) : '';
			
			return $instance;
		}
	}
		
		
	function patron_textblock_widget_init(){			
		register_widget('pt_textblock_widget');			
	}
	add_action('widgets_init', 'patron_textblock_widget_init');
	
?>