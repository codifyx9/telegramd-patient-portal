<?php
$show_section = get_field('show_rooted_in_science_section');

if ($show_section) :

  $mini_heading = get_field('rooted_in_science_mini_heading');
  $main_heading = get_field('rooted_in_science_main_heading');
  $sub_heading  = get_field('rooted_in_science_sub_heading');
?>

  <section class="hld-feature-benefits-section">
    <div class="hld-feature-benefits-inner-wrapper">

      <!-- Header -->
      <header class="hld-feature-benefits-header">

        <?php if ($mini_heading) : ?>
          <span class="hld-feature-benefits-eyebrow-text">
            <?php echo esc_html($mini_heading); ?>
          </span>
        <?php endif; ?>

        <?php if ($main_heading) : ?>
          <h2 class="hld-feature-benefits-main-heading">
            <?php echo esc_html($main_heading); ?>
          </h2>
        <?php endif; ?>

        <?php if ($sub_heading) : ?>
          <p class="hld-feature-benefits-subheading">
            <?php echo esc_html($sub_heading); ?>
          </p>
        <?php endif; ?>

      </header>

      <!-- Cards Grid -->
      <?php if (have_rows('rooted_in_science_options')) : ?>
        <div class="hld-feature-benefits-grid">

          <?php while (have_rows('rooted_in_science_options')) : the_row();
            $image       = get_sub_field('rooted_in_science_repeater_image');
            $title       = get_sub_field('rooted_in_science_repeater_title');
            $description = get_sub_field('rooted_in_science_repeater_description');
          ?>
            <article class="hld-feature-benefit-card">

              <?php if ($image) : ?>
                <div class="hld-feature-benefit-icon-wrapper">
                  <img
                    src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>"
                    width="80"
                    height="80"
                    loading="lazy">
                </div>
              <?php endif; ?>

              <?php if ($title) : ?>
                <h3 class="hld-feature-benefit-title">
                  <?php echo esc_html($title); ?>
                </h3>
              <?php endif; ?>

              <?php if ($description) : ?>
                <p class="hld-feature-benefit-description">
                  <?php echo esc_html($description); ?>
                </p>
              <?php endif; ?>

            </article>
          <?php endwhile; ?>

        </div>
      <?php endif; ?>

    </div>
  </section>

<?php endif; ?>