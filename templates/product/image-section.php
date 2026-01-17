<?php
// Show / Hide section toggle
$show_section = get_field('show_image_left_content_section');

if ($show_section) :

    $image        = get_field('image_left');
    $title        = get_field('image_left_content_right_section_title');
    $description  = get_field('image_left_content_right_section_description');
    $image_sub_heading  = get_field('image_sub_heading');
    $icon_items   = get_field('icon_image_text');
?>

<section class="hld-clinical-weight-loss-section">
    <div class="hld-clinical-weight-loss-inner-container">

        <div class="hld-clinical-weight-loss-layout">

            <!-- Image Column -->
            <?php if (!empty($image)) : ?>
                <figure class="hld-clinical-weight-loss-image-wrapper">
                    <img
                        src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>"
                        class="hld-clinical-weight-loss-image"
                        loading="lazy">
                </figure>
            <?php endif; ?>

            <!-- Content Column -->
            <div class="hld-clinical-weight-loss-content">

                <?php if ($title) : ?>
                    <h2 class="hld-clinical-weight-loss-heading">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <p class="hld-clinical-weight-loss-paragraph">
                        <?php echo esc_html($description); ?>
                    </p>
                <?php endif; ?>

                <?php if ($image_sub_heading) : ?>
                    <h4 class="hld-clinical-weight-loss-subheading">
                        <?php echo esc_html($image_sub_heading); ?>
                    </h4>
                <?php endif; ?>

                <?php if (!empty($icon_items)) : ?>
                    <ul class="hld-clinical-weight-loss-features">
                        <?php foreach ($icon_items as $item) : ?>
                            <li class="hld-feature-item">

                                <?php if (!empty($item['icon_image'])) : ?>
                                    <img src="<?php echo esc_url($item['icon_image']['url']); ?>"
                                        alt=""
                                        class="hld-feature-icon"
                                        loading="lazy">
                                <?php endif; ?>

                                <?php if (!empty($item['icon_text'])) : ?>
                                    <span class="hld-feature-text">
                                        <?php echo esc_html($item['icon_text']); ?>
                                    </span>
                                <?php endif; ?>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            </div>

        </div>
    </div>
</section>

<?php endif; ?>
