 <section class="product-grid">

     <!-- Card 1 -->
     <article class="product-card" data-product>
         <header class="tabs" role="tablist">
             <button class="tab-button active" data-tab="benefits" role="tab">Benefits</button>
             <button class="tab-button" data-tab="pricing" role="tab">Pricing</button>
             <button class="tab-button" data-tab="description" role="tab">Description</button>
         </header>


         <?php if (have_rows('product_benefits')) : ?>
             <section class="tab-content active" data-content="benefits">
                 <ul class="benefits">
                     <?php while (have_rows('product_benefits')) : the_row();
                            $image = get_sub_field('product_benefit_image');
                            $text  = get_sub_field('product_benefit_text');
                        ?>
                         <li>
                             <?php if ($image) : ?>
                                 <span class="icon">
                                     <img
                                         src="<?php echo esc_url($image['url']); ?>"
                                         alt="<?php echo esc_attr($image['alt']); ?>"
                                         loading="lazy">
                                 </span>
                             <?php endif; ?>

                             <?php if ($text) : ?>
                                 <span class="text"><?php echo esc_html($text); ?></span>
                             <?php endif; ?>
                         </li>
                     <?php endwhile; ?>
                 </ul>
             </section>
         <?php endif; ?>


         <section class="tab-content" data-content="pricing">
             <!-- <p><strong>$249/month</strong></p>
             <p>No contracts. Cancel anytime.</p> -->


             <section class="hld-pricing-section">
                 <div class="hld-pricing-container">
                     <header class="hld-pricing-header">
                         <h2 class="hld-pricing-title">Your goals, your plan</h2>
                     </header>

                     <?php
                        // Ensure values are integers (safety)
                        $one_month_price  = (int) $one_month_price;
                        $three_month_price = (int) $three_month_price;

                        $discount_first_month_for_one_month_plan  = (int) $discount_first_month_for_one_month_plan;
                        $discount_first_month_for_three_month_plan = (int) $discount_first_month_for_three_month_plan;

                        // Calculate first month prices
                        $one_month_first_price   = $one_month_price - $discount_first_month_for_one_month_plan;
                        $three_month_first_price = $three_month_price - $discount_first_month_for_three_month_plan;
                        ?>

                     <div class="hld-pricing-card">

                         <!-- 3-Month Plan -->
                         <div class="hld-plan-item">
                             <div class="hld-plan-left">
                                 <h3 class="hld-plan-name">3-Month Plan</h3>
                             </div>

                             <div class="hld-plan-right">
                                 <p class="hld-plan-price">
                                     <span class="hld-price-highlight">
                                         $<?php echo esc_html($three_month_first_price); ?>
                                     </span>
                                     <span class="hld-price-note">first month</span>
                                 </p>

                                 <p class="hld-plan-after">
                                     $<?php echo esc_html($three_month_price); ?>/mo after
                                 </p>
                             </div>
                         </div>

                         <!-- Monthly Plan -->
                         <div class="hld-plan-item hld-plan-last">
                             <div class="hld-plan-left">
                                 <h3 class="hld-plan-name">Monthly Plan</h3>
                             </div>

                             <div class="hld-plan-right">
                                 <p class="hld-plan-price">
                                     <span class="hld-price-highlight">
                                         $<?php echo esc_html($one_month_first_price); ?>
                                     </span>
                                     <span class="hld-price-note">first month</span>
                                 </p>

                                 <p class="hld-plan-after">
                                     $<?php echo esc_html($one_month_price); ?>/mo after
                                 </p>
                             </div>
                         </div>

                     </div>

                 </div>
             </section>




         </section>

         <?php  ?>
         <section class="tab-content" data-content="description">
             <?php $third_tab_description         = get_field('third_tab_description'); // WYSIWYG  
                ?>
             <?php if ($third_tab_description): ?>
                 <p>
                     <?php echo $third_tab_description; ?>
                 </p>
             <?php endif; ?>

         </section>

         <footer class="card-footer">
             <span>🇺🇸 Compounded in the U.S.A</span>
             <span>✔ FSA & HSA Eligible</span>
         </footer>
     </article>


 </section>