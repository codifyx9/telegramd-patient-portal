<?php
$one_month_price = get_field('one_month_price');
$discount_first_month_for_one_month_plan = get_field('discount_first_month_for_one_month_plan');
$three_month_price = get_field('three_month_price');
$discount_first_month_for_three_month_plan = get_field('discount_first_month_for_three_month_plan');
$card_tagger_line = get_field('card_tagger_line');
$primary_get_started_link = get_field('primary_get_started_link');

?>
<section class="section section-product">
    <article class="section-inner product-wrap">
        <figure class="img-wrap">
            <?php
            if (has_post_thumbnail()) {
                // Output the featured image with alt text
                the_post_thumbnail('large', ['alt' => get_the_title()]);
            }
            ?>

        </figure>

        <div class="product-detail-wrap">
            <header>
                <h1><?php the_title(); ?></h1>
            </header>

            <div class="pricing-wrap">
                <div class="tag">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#6d6ffc" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-badge-check size-3 [&amp;&gt;path:first-child]:fill-brand [&amp;&gt;path:first-child]:stroke-none [&amp;&gt;path:last-child]:stroke-white" aria-hidden="true"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path><path d="m9 12 2 2 4-4"></path></svg> <strong><?php echo $card_tagger_line; ?></strong>
                </div>

                <div class="price-wrap">
                    <?php
                    // Ensure the variables are integers
                    $three_month_price = isset($three_month_price) ? (int) $three_month_price : 0;
                    $discount_first_month_for_three_month_plan = isset($discount_first_month_for_three_month_plan) ? (int) $discount_first_month_for_three_month_plan : 0;

                    // Calculate the discounted first month safely
                    $first_month_price = $three_month_price - $discount_first_month_for_three_month_plan;
                    ?>

                    <div class="price">
                        <span class="discount-first-month">
                            $<?php echo $first_month_price; ?>
                        </span> first month
                        <div>
                            then <span class="regular-price">$<?php echo $three_month_price; ?></span>/mon*
                        </div>
                    </div>

                    <div class="payment-methods">
                        <img src="https://healsend.com/wp-content/uploads/2025/11/Klarna-scaled-e1763430712994-optimized.png" alt="Klarna payment method">
                        <img src="https://healsend.com/wp-content/uploads/2025/11/After-Pay-scaled-optimized.png" alt="Afterpay payment method">
                    </div>
                </div>

                <a href="<?php echo $primary_get_started_link; ?>" class="cta-link">Get Started</a>
                <p class="info">Discount auto-applied at checkout</p>
            </div>

            <?php
            include HLD_PLUGIN_PATH . 'templates/product/main-tabs.php';
            include HLD_PLUGIN_PATH . 'templates/product/related-products.php';
            // include HLD_PLUGIN_PATH . 'templates/product/main-faq-sec.php';
            ?>

        </div>
    </article>
</section>