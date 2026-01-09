<?php get_header(); ?>
<!-- image content  -->

<main class="hld-product">
    <?php
    // This reviews section is now replaced with image reviews section which is a slider 

    // include HLD_PLUGIN_PATH . 'templates/product/testimonials.php';

    // this was the old product slider but now its replaced with new-product-sec.php
    // include HLD_PLUGIN_PATH . 'templates/product/other-treatments.php';
    include HLD_PLUGIN_PATH . 'templates/product/hero-sec.php';
    include HLD_PLUGIN_PATH . 'templates/product/product.php';
    include HLD_PLUGIN_PATH . 'templates/product/reviews.php';
    include HLD_PLUGIN_PATH . 'templates/product/image-review.php';
    include HLD_PLUGIN_PATH . 'templates/product/image-section.php';
    include HLD_PLUGIN_PATH . 'templates/product/benefits.php';
    include HLD_PLUGIN_PATH . 'templates/product/why-healsend-section.php';
    include HLD_PLUGIN_PATH . 'templates/product/rooted-in-science.php';
    include HLD_PLUGIN_PATH . 'templates/product/popup-section.php';
    include HLD_PLUGIN_PATH . 'templates/product/remedy-care.php';
    include HLD_PLUGIN_PATH . 'templates/product/our-process.php';
    include HLD_PLUGIN_PATH . 'templates/product/floating-button.php';
    include HLD_PLUGIN_PATH . 'templates/product/new-product-sec.php';
    include HLD_PLUGIN_PATH . 'templates/product/faq.php';
    include HLD_PLUGIN_PATH . 'templates/product/treatment-card.php';
    include HLD_PLUGIN_PATH . 'templates/product/healsend-steps.php';
    ?>
</main>
<?php get_footer(); ?>