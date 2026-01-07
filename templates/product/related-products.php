<?php if (have_rows('main_section_related_products')) : ?>
  <section class="hld-related-section" aria-labelledby="hld-related-heading">
    <div class="hld-related-inner">

      <header class="hld-related-header">
        <h2 id="hld-related-heading" class="hld-related-title">
          Related Products
        </h2>
      </header>

      <div class="hld-related-grid">

        <?php while (have_rows('main_section_related_products')) : the_row();
          $product_image = get_sub_field('main_section_related_product'); // image array
          $product_title = get_sub_field('main_section_product_title');
        ?>

          <article class="hld-related-item">
            <figure class="hld-related-media">
              <?php if (! empty($product_image)) : ?>
                <div class="related-media-img-wrap">
                  <img
                    src="<?php echo esc_url($product_image['url']); ?>"
                    alt="<?php echo esc_attr($product_image['alt'] ?: $product_title); ?>"
                    loading="lazy"
                    width="<?php echo esc_attr($product_image['width']); ?>"
                    height="<?php echo esc_attr($product_image['height']); ?>" />
                </div>
              <?php endif; ?>

              <?php if ($product_title) : ?>
                <figcaption class="hld-related-caption">
                  <?php echo esc_html($product_title); ?>
                </figcaption>
              <?php endif; ?>

            </figure>
          </article>

        <?php endwhile; ?>

      </div>
    </div>
  </section>
<?php endif; ?>