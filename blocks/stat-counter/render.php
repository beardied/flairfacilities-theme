<?php
/**
 * Stat Counter Block Render
 *
 * @package FlairFacilities
 */

$number = ! empty( $attributes['number'] ) ? intval( $attributes['number'] ) : 15;
$suffix = ! empty( $attributes['suffix'] ) ? $attributes['suffix'] : '+';
$label  = ! empty( $attributes['label'] ) ? $attributes['label'] : 'Years of Experience';

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'flair-stat-counter' ) );
?>
<div <?php echo wp_kses_data( $wrapper_attributes ); ?> data-count="<?php echo esc_attr( $number ); ?>">
    <div class="flair-stat-number">
        <span class="flair-stat-value">0</span><span class="flair-stat-suffix"><?php echo esc_html( $suffix ); ?></span>
    </div>
    <div class="flair-stat-label"><?php echo esc_html( $label ); ?></div>
</div>
