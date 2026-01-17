<?php
$title        = get_field('image_slider_title');
$subtitle     = get_field('image_slider_subtitle');
$arrow_icon   = get_field('arrow_icon_svg');
$verified_svg = get_field('verified_icon_svg');
$items        = get_field('image_slider_items');
?>

<?php if ($items): ?>
<section class="hld-image-slider">
  <div class="hld-image-slider__container">

    <?php if ($title || $subtitle): ?>
      <header class="hld-image-slider__header">
        <?php if ($title): ?>
          <h2 class="hld-image-slider__title">
            <?php echo wp_kses_post($title); ?>
          </h2>
        <?php endif; ?>

        <?php if ($subtitle): ?>
          <p class="hld-image-slider__subtitle">
            <?php echo esc_html($subtitle); ?>
          </p>
        <?php endif; ?>
      </header>
    <?php endif; ?>

    <div class="hld-image-slider__wrapper">
      <div class="hld-image-slider__track hld-marquee">

        <?php
        // Duplicate items for marquee effect
        $marquee_items = array_merge($items, $items);
        foreach ($marquee_items as $item):
          $before_img   = $item['before_image'];
          $after_img    = $item['after_image'];
          $before_cap   = $item['before_caption'] ?: 'Before';
          $after_cap    = $item['after_caption'] ?: 'After';
          $weight_num   = $item['weight_number'];
          $weight_unit  = $item['weight_unit'] ?: 'lbs';
          $member_name  = $item['member_name'];
          $badge_text   = $item['verified_badge_text'] ?: 'Verified Healsend Members';
        ?>
        <article class="hld-image-card">
          <div class="hld-image-card__images">

            <?php if ($before_img): ?>
              <figure class="hld-image-card__image">
                <img src="<?php echo esc_url($before_img); ?>" alt="Before weight loss" loading="lazy">
                <figcaption><?php echo esc_html($before_cap); ?></figcaption>
              </figure>
            <?php endif; ?>

            <?php if ($after_img): ?>
              <figure class="hld-image-card__image">
                <img src="<?php echo esc_url($after_img); ?>" alt="After weight loss" loading="lazy">
                <figcaption><?php echo esc_html($after_cap); ?></figcaption>
              </figure>
            <?php endif; ?>

          </div>

          <div class="hld-image-card__content">
            <span class="hld-image-card__badge">
              <?php echo esc_html($badge_text); ?>
              <?php if ($verified_svg): ?>
                <img src="<?php echo esc_url($verified_svg['url']); ?>" alt="Verified" loading="lazy">
              <?php endif; ?>
            </span>

            <?php if ($weight_num): ?>
              <h3 class="hld-image-card__title">
                <span class="arrow-icon">
                  <?php if ($arrow_icon): ?>
                    <img src="<?php echo esc_url($arrow_icon['url']); ?>" alt="" aria-hidden="true">
                  <?php endif; ?>
                </span>
                <strong>
                  <span class="number"><?php echo esc_html($weight_num); ?></span>
                  <span class="unit"><?php echo esc_html($weight_unit); ?></span>
                </strong>
              </h3>
            <?php endif; ?>

            <?php if ($member_name): ?>
              <p class="hld-image-card__text">
                <?php echo esc_html($member_name); ?>
              </p>
            <?php endif; ?>
          </div>
        </article>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>
<?php endif; ?>
