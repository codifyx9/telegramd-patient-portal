<?php
// Check if section should be displayed
if (get_field('should_display_section')) :

  $section_title = get_field('faq_section_title');
  $prev_arrow    = get_field('previous_faq_arrow');
  $next_arrow    = get_field('next_faq_field');
?>

<section class="hld-reviews">
  <div class="hld-reviews__container">

    <?php if ($section_title): ?>
      <h2 class="hld-reviews__title">
        <?php echo esc_html($section_title); ?>
      </h2>
    <?php endif; ?>

    <?php if (have_rows('faq_reviews')): ?>
      <div class="hld-reviews__slider-wrapper">

        <!-- Previous Arrow -->
        <button class="hld-reviews__arrow hld-reviews__arrow--left" aria-label="Previous">
          <?php if ($prev_arrow): ?>
            <img
              src="<?php echo esc_url($prev_arrow['url']); ?>"
              alt="<?php echo esc_attr($prev_arrow['alt']); ?>"
              >
          <?php else: ?>
            ‹
          <?php endif; ?>
        </button>

        <div class="hld-reviews__slider" data-hld-reviews-slider>

          <?php while (have_rows('faq_reviews')): the_row();

            $stars_number   = max(1, min(5, (int) get_sub_field('faq_reviews_number')));
            $stars_html     = str_repeat('★', $stars_number);
            $review_text    = get_sub_field('faq_review_text');
            $review_name    = get_sub_field('faq_reviewer_name');
            $verified_image = get_sub_field('faq_verified_image');
            $verified_text  = get_sub_field('faq_verified_text');
          ?>

            <div class="hld-review-card">

              <div class="hld-stars">
                <?php echo esc_html($stars_html); ?>
              </div>

              <?php if ($review_text): ?>
                <p class="hld-review-text">
                  “<?php echo esc_html($review_text); ?>”
                </p>
              <?php endif; ?>

              <?php if ($review_name): ?>
                <strong class="hld-review-name">
                  <?php echo esc_html($review_name); ?>
                </strong>
              <?php endif; ?>

              <?php if ($verified_image || $verified_text): ?>
                <span class="hld-pill hld-review__verfied_label">

                  <?php if ($verified_image): ?>
                    <img
                      src="<?php echo esc_url($verified_image['url']); ?>"
                      alt="<?php echo esc_attr($verified_image['alt']); ?>"
                      width="15"
                      height="15">
                  <?php endif; ?>

                  <?php if ($verified_text): ?>
                    <?php echo esc_html($verified_text); ?>
                  <?php endif; ?>

                </span>
              <?php endif; ?>

            </div>

          <?php endwhile; ?>

        </div>

        <!-- Next Arrow -->
        <button class="hld-reviews__arrow hld-reviews__arrow--right" aria-label="Next">
          <?php if ($next_arrow): ?>
            <img
              src="<?php echo esc_url($next_arrow['url']); ?>"
              alt="<?php echo esc_attr($next_arrow['alt']); ?>"
              >
          <?php else: ?>
            ›
          <?php endif; ?>
        </button>

      </div>
    <?php endif; ?>

  </div>
</section>

<?php endif; ?>
