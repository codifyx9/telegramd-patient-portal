<?php
function hld_get_shield_plus_icon()
{
    return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-plus" aria-hidden="true">
  <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
  <path d="M9 12h6"></path>
  <path d="M12 9v6"></path>
</svg>
SVG;
}
?>
<section class="hld-benefits-section">
    <div class="hld-container">

        <header class="hld-section-header">
            <div class="remedy-logo-wrap">
                <?php
                if (has_custom_logo()) {
                    echo get_custom_logo();
                } ?>
            </div>
            <p class="remedy-sub-desc">
                You're not just getting medication. You're getting full care on demand
                to keep you motivated, safe, & reaching your weight-loss goals.
            </p>
        </header>

        <div class="hld-cards-grid">

            <!-- Card 1 -->
            <article class="hld-card hld-remedy-card">
                <span class="hld-pill hld-included">Included <?php echo hld_get_shield_plus_icon();  ?></span>

                <div class="hld-card-content hld-remedy-content">
                    <div class="hld-card-text">
                        <h3>Unlimited Video Calls With Clinicians</h3>
                        <ul>
                            <li>See a licensed clinician same-day</li>
                            <li>Unlimited visits, all online</li>
                        </ul>
                    </div>

                    <div class="hld-card-media ">
                        <img src="https://healsend.com/wp-content/uploads/2025/12/unlimited-calls.webp" alt="Licensed clinician on video call" class="clinician-img" />
                    </div>
                </div>
            </article>

            <!-- Card 2 -->
            <article class="hld-card hld-remedy-card">
                <span class="hld-pill hld-included">Included <?php echo hld_get_shield_plus_icon();  ?></span>

                <div class="hld-card-content hld-remedy-content">
                    <div class="hld-card-text">
                        <h3>Always On Medical Assistance via Phone</h3>
                        <ul>
                            <li>Questions about side effects? Call our medical hotline</li>
                            <li>Fast, clear support from U.S. agents only — no offshore centers</li>
                        </ul>
                    </div>

                    <div class="hld-card-media">
                        <img src="https://healsend.com/wp-content/uploads/2025/12/remedy-care.png" alt="Medical support badge" />
                    </div>
                </div>
            </article>

            <!-- Card 3 -->
            <article class="hld-card hld-remedy-card">
                <span class="hld-pill hld-included">Included <?php echo hld_get_shield_plus_icon();  ?></span>

                <div class="hld-card-content hld-remedy-content">
                    <div class="hld-card-text">
                        <h3>On-Time Refills Guaranteed</h3>
                        <ul>
                            <li>Fast, reliable delivery for every refill</li>
                            <li>Refills arrive before you ever run out</li>
                        </ul>
                    </div>

                    <div class="hld-card-media">
                        <img src="https://healsend.com/wp-content/uploads/2025/12/onetime-refills.webp" alt="Medication delivery truck" />
                    </div>
                </div>
            </article>

            <!-- Card 4 -->
            <article class="hld-card hld-remedy-card">
                <span class="hld-pill hld-included ">Included <?php echo hld_get_shield_plus_icon();  ?></span>

                <div class="hld-card-content hld-remedy-content">
                    <div class="hld-card-text">
                        <h3>Real-Time Access to Member Community & Platform</h3>
                        <ul>
                            <li>Share tips, advice, and progress with other members</li>
                            <li>Win rewards, get expert help, and more</li>
                        </ul>
                    </div>

                    <div class="hld-card-media">
                        <img src="https://healsend.com/wp-content/uploads/2025/12/community.webp" alt="Member community avatars" />
                    </div>
                </div>
            </article>

        </div>

        <div class="hld-cta-wrap">

            <?php $primary_get_started_link = get_field('primary_get_started_link'); ?>
            <a href="<?php echo  $primary_get_started_link; ?>" class="hld-cta-button">
                Start Your Weight Loss Journey
            </a>
        </div>

    </div>
</section>