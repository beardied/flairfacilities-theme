<?php
/**
 * CTA Banner Block Render
 *
 * @package FlairFacilities
 */

$title       = ! empty( $attributes['title'] ) ? $attributes['title'] : "Don't Wait Until It's Too Late!";
$button_text = ! empty( $attributes['buttonText'] ) ? $attributes['buttonText'] : 'Call Now';
$button_url  = ! empty( $attributes['buttonUrl'] ) ? $attributes['buttonUrl'] : 'tel:02079989005';

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'flair-cta-banner-block' ) );
?>
<div <?php echo wp_kses_data( $wrapper_attributes ); ?>>
    <div class="flair-cta-bg"></div>
    <div class="flair-cta-content">
        <h2 class="flair-cta-title"><?php echo esc_html( $title ); ?></h2>
        <a href="<?php echo esc_url( $button_url ); ?>" class="flair-cta-btn"><?php echo esc_html( $button_text ); ?></a>
    </div>
</div>
