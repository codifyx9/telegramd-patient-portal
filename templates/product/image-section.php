<?php
// Show / Hide section toggle
$show_section = get_field('show_image_left_content_section');

if ($show_section) :

    $image       = get_field('image_left');
    $title       = get_field('image_left_content_right_section_title');
    $description = get_field('image_left_content_right_section_description');
?>

    <section class="hld-clinical-weight-loss-section">
        <div class="hld-clinical-weight-loss-inner-container">

            <div class="hld-clinical-weight-loss-layout">

                <!-- Image Column -->
                <?php if (! empty($image)) : ?>
                    <figure class="hld-clinical-weight-loss-image-wrapper">
                        <img
                            src="<?php echo esc_url($image['url']); ?>"
                            alt="<?php echo esc_attr($image['alt']); ?>"
                            class="hld-clinical-weight-loss-image"
                            loading="lazy" />
                    </figure>
                <?php endif; ?>

                <!-- Content Column -->
                <div class="hld-clinical-weight-loss-content">

                    <?php if (! empty($title)) : ?>
                        <h2 class="hld-clinical-weight-loss-heading">
                            <?php echo esc_html($title); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (! empty($description)) : ?>
                        <div class="hld-clinical-weight-loss-paragraph">
                            <?php echo wp_kses_post($description); ?>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </section>

<?php endif; ?>