<?php
	
	/**
		Add custom footer widget download button
	**/
	
	class pt_title_widget extends WP_Widget {
	
		/**
			* Register widget with WordPress.
		*/
		
		function __construct(){
			
			$widget_ops = array( 
				'classname' => 'title_widget',
				'description' => esc_html__( 'Custom Blank title widget', 'patron' )
			);
			parent::__construct(
				'title_widget', // Base ID
				esc_html__( 'Title Widget', 'patron' ), // Name
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
			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses($args['before_title'], true) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses($args['after_title'], true);
			}
			
		}
		
		
		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ){
			
			$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'patron' );			
		
		?>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title Text:', 'patron' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			
			return $instance;
			
		}
		
	}
	
	function patron_title_widget_init(){			
		register_widget('pt_title_widget');			
	}
	add_action('widgets_init', 'patron_title_widget_init');
	
?>