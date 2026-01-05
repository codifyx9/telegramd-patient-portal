<?php
$show_section = get_field('why_healsend_section_show');

if ( $show_section ) :

    $heading        = get_field('why_healsend_heading');
    $purple_heading = get_field('why_healsend_purple_heading_text');
    $sub_heading    = get_field('sub_heading');
?>

<section class="hld-performance-section">
    <div class="hld-performance-inner">

        <!-- Header -->
        <header class="hld-performance-header">
            <?php if ( $heading || $purple_heading ) : ?>
                <h2 class="hld-performance-title">
                    <?php echo esc_html($heading); ?>
                    <?php if ( $purple_heading ) : ?>
                        <span class="hld-performance-highlight">
                            <?php echo esc_html($purple_heading); ?>
                        </span>
                    <?php endif; ?>
                </h2>
            <?php endif; ?>

            <?php if ( $sub_heading ) : ?>
                <p class="hld-performance-subtitle">
                    <?php echo esc_html($sub_heading); ?>
                </p>
            <?php endif; ?>
        </header>

        <!-- Cards -->
        <?php if ( have_rows('why_healsend_cards') ) : ?>
            <div class="hld-performance-grid">

                <?php while ( have_rows('why_healsend_cards') ) : the_row(); 
                    $fact        = get_sub_field('why_healsend_facts');
                    $fact_name   = get_sub_field('why_healsend_fact_name');
                    $fact_desc   = get_sub_field('why_healsend_fact_description');
                ?>
                    <article class="hld-performance-box">

                        <?php if ( $fact ) : ?>
                            <h3 class="hld-performance-metric">
                                <?php echo esc_html($fact); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ( $fact_name ) : ?>
                            <p class="hld-performance-label">
                                <?php echo esc_html($fact_name); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ( $fact_desc ) : ?>
                            <p class="hld-performance-desc">
                                <?php echo esc_html($fact_desc); ?>
                            </p>
                        <?php endif; ?>

                    </article>
                <?php endwhile; ?>

            </div>
        <?php endif; ?>

    </div>
</section>

<?php endif; ?>
