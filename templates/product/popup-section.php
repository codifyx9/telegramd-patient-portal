<section class="hld-lab-section">
  <div class="hld-lab-container">

    <div class="hld-lab-content">
      <h2 class="hld-lab-title">
        Lab tested medications<br />
        for quality &amp; potency
      </h2>

      <p class="hld-lab-description">
        Our medication is delivered from a state licensed pharmacy in our
        network, right to your door when you need it.
      </p>

      <div class="hld-lab-actions">
        <button
          type="button"
          class="hld-lab-pill hld-lab-pill--primary"
          data-hld-open-modal>
          Third party quality control testing
          <span class="hld-lab-pill-link">Learn more</span>
          <svg width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="16"></line>
            <line x1="8" y1="12" x2="16" y2="12"></line>
          </svg>
        </button>

        <div class="hld-lab-pill">
          🇺🇸 Compounded in U.S. pharmacies
        </div>
      </div>
    </div>

    <div class="hld-lab-media">
      <?php
      $image = get_field('lab_section_image');

      if (! empty($image)) :
      ?>
        <img
          src="<?php echo esc_url($image['url']); ?>"
          alt="<?php echo esc_attr($image['alt']); ?>"
          loading="lazy" />
      <?php endif; ?>
    </div>

  </div>
</section>






<!-- Popup Content  -->
<div class="hld-modal-overlay" data-hld-modal>
  <div
    class="hld-modal"
    role="dialog"
    aria-modal="true"
    aria-labelledby="hld-modal-title">
    <button
      type="button"
      class="hld-modal-close"
      aria-label="Close dialog"
      data-hld-close-modal>
      ×
    </button>

    <h3 id="hld-modal-title" class="hld-modal-title">
      Lab tested for quality &amp; potency
    </h3>

    <p class="hld-modal-intro">
      Our pharmacies perform third party testing through FDA and DEA
      registered labs to run quality control checks for every compounded lot.
    </p>

    <div class="hld-modal-grid">

      <article class="hld-modal-card">
        <header>
          <h4>Potency Test</h4>
          <span class="hld-status">PASSED</span>
        </header>
        <p>
          Confirms the medication contains ±10% of the appropriate
          concentration of the active ingredient.
        </p>
      </article>

      <article class="hld-modal-card">
        <header>
          <h4>Sterility Test</h4>
          <span class="hld-status">PASSED</span>
        </header>
        <p>
          Ensures the medication is free from bacteria or pathogens and
          meets USP 797 requirements.
        </p>
      </article>

      <article class="hld-modal-card">
        <header>
          <h4>Endotoxicity</h4>
          <span class="hld-status">PASSED</span>
        </header>
        <p>
          Ensures endotoxin levels remain below USP 85 thresholds
          for patient safety.
        </p>
      </article>

      <article class="hld-modal-card">
        <header>
          <h4>pH Test</h4>
          <span class="hld-status">PASSED</span>
        </header>
        <p>
          Confirms acid/base balance to minimize irritation upon injection.
        </p>
      </article>

    </div>
  </div>
</div>