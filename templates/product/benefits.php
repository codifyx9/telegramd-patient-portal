<?php
// Get the section title
$benefits_title = get_field('benefits_section_title');

// Get the repeater items
$benefits_items = get_field('benefits_items');
?>

<section class="hld-glp-slider-section">
  <div class="hld-container">

    <?php if ($benefits_title): ?>
      <header class="hld-slider-header">
        <h2><?php echo esc_html($benefits_title); ?></h2>
      </header>
    <?php endif; ?>

    <?php if ($benefits_items): ?>
      <div class="hld-slider-wrapper">

        <div class="hld-slider-track">

          <?php
          $total_items = count($benefits_items);
          $index = 0;
          ?>

          <?php foreach ($benefits_items as $item): 
            $index++;

            $image   = $item['benefit_image'];
            $title   = $item['benefit_title'];
            $img_url = $image['url'];
            $img_alt = $image['alt'] ?: $title;

            $is_last = ($index === $total_items);
          ?>
            <article class="hld-slide">
              <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" />

              <div class="hld-slide-overlay">
                <p><?php echo esc_html($title); ?></p>

                <?php if ($is_last): ?>
                  <a href="/your-target-link" class="hld-slide-btn">
                    View More
                  </a>
                <?php endif; ?>
              </div>
            </article>
          <?php endforeach; ?>

        </div>

        <div class="benefits-slider-btns-wrap">
          <button class="hld-slider-btn hld-prev" aria-label="Previous slide">
            &#10094;
          </button>
          <button class="hld-slider-btn hld-next" aria-label="Next slide">
            &#10095;
          </button>
        </div>

      </div>
    <?php endif; ?>

  </div>
</section>
