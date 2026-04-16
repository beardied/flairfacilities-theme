<?php
/**
 * Service Card Block Render
 *
 * @package FlairFacilities
 */

$title       = ! empty( $attributes['title'] ) ? $attributes['title'] : 'Service Title';
$description = ! empty( $attributes['description'] ) ? $attributes['description'] : 'Service description goes here.';
$button_text = ! empty( $attributes['buttonText'] ) ? $attributes['buttonText'] : 'Learn More';
$button_url  = ! empty( $attributes['buttonUrl'] ) ? $attributes['buttonUrl'] : '#';
$icon        = ! empty( $attributes['icon'] ) ? $attributes['icon'] : '🔧';

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'flair-service-card-block' ) );
?>
<div <?php echo wp_kses_data( $wrapper_attributes ); ?>>
    <div class="flair-service-icon"><?php echo esc_html( $icon ); ?></div>
    <h3 class="flair-service-title"><?php echo esc_html( $title ); ?></h3>
    <p class="flair-service-desc"><?php echo esc_html( $description ); ?></p>
    <a href="<?php echo esc_url( $button_url ); ?>" class="flair-service-btn"><?php echo esc_html( $button_text ); ?></a>
</div>
