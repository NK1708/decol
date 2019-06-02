<?php
	
	/**
		Add custom footer widget download button
	**/
	
	class pt_download_button extends WP_Widget {
	
		/**
			* Register widget with WordPress.
		*/
		
		function __construct(){
			
			$btn_ops = array( 
				'classname' => 'download_btn',
				'description' => esc_html__( 'Custom file download widget', 'patron' )
			);
			parent::__construct(
				'button_widget', // Base ID
				esc_html__( 'Download Button', 'patron' ), // Name
				$btn_ops // Args
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
			
			if ( ! empty( $instance['btn_text'] ) ) {
				echo '<a href="' . apply_filters( 'button_link', $instance['file_url'] ) . '" class="btn btn-secondary"><i class="' . apply_filters( 'icon_name', $instance['icon_class'] ) . '"></i>' . apply_filters( 'btn_content', $instance['btn_text'] ) . '</a>';
			}
			
		}
		
		
		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ){
			
			$btn_text = ! empty( $instance['btn_text'] ) ? $instance['btn_text'] : esc_html__( '', 'patron' );
			$file_url = ! empty( $instance['file_url'] ) ? $instance['file_url'] : esc_html__( '', 'patron' );
			$icon_class = ! empty( $instance['icon_class'] ) ? $instance['icon_class'] : esc_html__( '', 'patron' );			
		
		?>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>"><?php esc_html_e( 'Button Text:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'btn_text' ) ); ?>" type="text" value="<?php echo esc_attr( $btn_text ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'file_url' ) ); ?>"><?php esc_html_e( 'Download URL:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'file_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'file_url' ) ); ?>" type="text" value="<?php echo esc_attr( $file_url ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'icon_class' ) ); ?>"><?php esc_html_e( 'Icon Class:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon_class' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_class' ) ); ?>" type="text" value="<?php echo esc_attr( $icon_class ); ?>">
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
			
			$instance = $old_instance;
			$instance['btn_text'] = ( ! empty( $new_instance['btn_text'] ) ) ? strip_tags( $new_instance['btn_text'] ) : '';
			$instance['file_url'] = ( ! empty( $new_instance['file_url'] ) ) ? strip_tags( $new_instance['file_url'] ) : '';
			$instance['icon_class'] = ( ! empty( $new_instance['icon_class'] ) ) ? strip_tags( $new_instance['icon_class'] ) : '';
			
			return $instance;
			
		}
		
	}
	
	function patron_pt_download_button_init(){			
		register_widget('pt_download_button');			
	}
	add_action('widgets_init', 'patron_pt_download_button_init');
	
?>