<?php
/**
 * Testimonial Slider Block Render
 *
 * @package FlairFacilities
 */

$testimonials = ! empty( $attributes['testimonials'] ) ? $attributes['testimonials'] : array();

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'flair-testimonial-slider' ) );
?>
<div <?php echo wp_kses_data( $wrapper_attributes ); ?>>
    <div class="flair-testimonial-track">
        <?php foreach ( $testimonials as $index => $t ) : ?>
            <div class="flair-testimonial-slide <?php echo 0 === $index ? 'is-active' : ''; ?>">
                <div class="flair-testimonial-stars">
                    <?php
                    $rating = ! empty( $t['rating'] ) ? intval( $t['rating'] ) : 5;
                    echo str_repeat( '★', $rating );
                    ?>
                </div>
                <blockquote class="flair-testimonial-quote">
                    "<?php echo esc_html( ! empty( $t['quote'] ) ? $t['quote'] : '' ); ?>"
                </blockquote>
                <cite class="flair-testimonial-author">— <?php echo esc_html( ! empty( $t['author'] ) ? $t['author'] : '' ); ?></cite>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if ( count( $testimonials ) > 1 ) : ?>
    <div class="flair-testimonial-nav">
        <button type="button" class="flair-testimonial-prev" aria-label="Previous testimonial">←</button>
        <button type="button" class="flair-testimonial-next" aria-label="Next testimonial">→</button>
    </div>
    <?php endif; ?>
</div>
