<?php
// Section title fields
$section_title    = get_field('healsend_product_sec_title');
$section_subtitle = get_field('healsend_product_sec_sub_title');
// these classes can be used to give bg to labels
$labels_bg = [
  "hld-new-label--purple",
  "hld-new-label--green",
  "hld-new-label--blue",
  "hld-new-label--purple",
  "hld-new-label--green",
  "hld-new-label--blue"
];
$labels_bg_index = 0;
?>

<section class="hld-new-products">
  <div class="hld-new-products__container">

    <?php if ($section_title || $section_subtitle) : ?>
      <header class="hld-new-products__header">
        <?php if ($section_title) : ?>
          <h2 class="hld-new-products__title">
            <?php echo wp_kses_post(hld_wrap_middle_words_in_span($section_title, 2)); ?>
          </h2>
        <?php endif; ?>

        <?php if ($section_subtitle) : ?>
          <p class="hld-new-products__subtitle">
            <?php echo esc_html($section_subtitle); ?>
          </p>
        <?php endif; ?>
      </header>
    <?php endif; ?>


    <?php if (have_rows('healsend_products_repeater')) : ?>
      <div class="hld-new-products__slider-wrapper">

        <div class="hld-new-products__slider" data-hld-new-slider>

          <?php while (have_rows('healsend_products_repeater')) : the_row();

            $label_one   = get_sub_field('healsend_product_sec_label_one');
            $label_two   = get_sub_field('healsend_product_sec_label_two');
            $image       = get_sub_field('healsend_product_sec_product_image');
            $title       = get_sub_field('healsend_product_sec_product_title');
            $description = get_sub_field('healsend_product_sec_product_description');
            $button_url  = get_sub_field('healsend_product_sec_product_button_url');

            $img_url = $image['url'] ?? '';
            $img_alt = $image['alt'] ?? $title;
          ?>

            <article class="hld-new-card">

              <?php if ($label_one || $label_two) : ?>
                <div class="hld-new-card__labels">
                  <?php if ($label_one) : ?>
                    <span class="hld-new-label <?php echo $labels_bg[$labels_bg_index++]; ?>">
                      <?php echo esc_html($label_one); ?>
                    </span>
                  <?php endif; ?>

                  <?php if ($label_two) : ?>
                    <span class="hld-new-label">
                      <?php echo esc_html($label_two); ?>
                    </span>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

              <?php if ($img_url) : ?>
                <div class="hld-new-card__image_wrap">
                  <img
                    src="<?php echo esc_url($img_url); ?>"
                    alt="<?php echo esc_attr($img_alt); ?>"
                    class="hld-new-card__image"
                    loading="lazy" />
                </div>
              <?php endif; ?>

              <?php if ($title) : ?>
                <h3 class="hld-new-card__title">
                  <?php echo esc_html($title); ?>
                </h3>
              <?php endif; ?>

              <?php if ($description) : ?>
                <p class="hld-new-card__price">
                  <?php echo esc_html($description); ?>
                </p>
              <?php endif; ?>

              <?php if ($button_url) : ?>
                <a
                  href="<?php echo esc_url($button_url); ?>"
                  class="hld-new-card__btn">
                  Start assessment
                </a>
              <?php endif; ?>

            </article>

          <?php endwhile; ?>

        </div>

        <!-- Slider Arrows -->
        <div class="hld-new-products__arrows">
          <button class="hld-new-arrow hld-new-arrow--left" aria-label="Previous">‹</button>
          <button class="hld-new-arrow hld-new-arrow--right" aria-label="Next">›</button>
        </div>

      </div>
    <?php endif; ?>

  </div>
</section>