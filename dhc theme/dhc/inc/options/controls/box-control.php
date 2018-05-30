<?php
/**
 * Box control
 */
if (class_exists('WP_Customize_Control')) {
	class BoxControls extends WP_Customize_Control {
		public $type = 'box-controls';

		public function render() {
			$id    = 'dhc-options-control-' . $this->id;
			$class = 'dhc-options-control dhc-options-control-' . $this->type;

			if ( $this->value() )
				$this->class = 'active';

			if ( ! empty( $this->class ) )
				$class .= " {$this->class}";

			if ( empty( $this->label ) )
				$class .= ' no-label';

			?><li id="<?php dhc_esc_attr( $id ); ?>" class="<?php dhc_esc_attr( $class ) ?>">
				<span class="dhc-options-control-title dhc-title-option"> <?php echo dhc_esc_attr ($this->label); ?></span>
				<?php $this->render_content(); ?>
			</li><?php
		}
		
		public function render_content() {
			$name = "_options-box-control-$this->id";
			$id   = $this->id;
			dhc_render_box_control( $name,$this->value(),$id );
			
		}
	}
}
