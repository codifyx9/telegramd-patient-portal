<?php
add_shortcode('hld_custom_signup_form', 'hld_render_custom_signup_form');

function hld_render_custom_signup_form()
{

    ob_start();

    $error = ''; // or any string
    $error_message = apply_filters('hld_login_error_message', $error);


?>
    <div class="hld_login_wrapper">
        <?php if (!empty($error_message)) : ?>
            <p class="hld_error"><?php echo esc_html($error_message); ?></p>
        <?php endif; ?>

        <h2 class="hld_patient_login_title">Create an Account</h2>

        <form method="post" class="hld_login_form">

            <input
                type="email"
                name="hld_email"
                id="hld_email"
                placeholder="Email"
                required />

            <style>
                .hld_password_wrapper {
                    position: relative;
                    width: 100%;
                    height: 65px;
                }

                .hld_password_wrapper input {
                    width: 100%;
                    padding-right: 40px;
                    /* space for eye button */
                }

                .hld_toggle_password {
                    position: absolute;
                    right: 0px;
                    top: 50%;
                    transform: translateY(-50%);
                    background: none;
                    border: none;
                    cursor: pointer;
                    font-size: 13px;
                    opacity: 0.7;
                    color: black !important;
                }

                .hld_toggle_password:hover,
                .hld_toggle_password:focus {
                    opacity: 1;
                    background: transparent;
                    color: black;
                }
            </style>



            <div class="hld_password_wrapper">

                <input
                    type="password"
                    name="hld_password"
                    id="hld_password"
                    placeholder="Password"
                    style="margin-top: 0;"
                    required />
                <button
                    type="button"
                    class="hld_toggle_password"
                    aria-label="Show password">
                    Show
                </button>
            </div>

             <script>
                // Toggle password visibility
                const toggleBtn = document.querySelector(".hld_toggle_password");
                const passwordInput = document.getElementById("hld_password");

                if (toggleBtn && passwordInput) {
                    toggleBtn.addEventListener("click", function() {
                        const isPassword = passwordInput.type === "password";

                        passwordInput.type = isPassword ? "text" : "password";
                        toggleBtn.textContent = isPassword ? "Hide" : "Show";
                        toggleBtn.setAttribute(
                            "aria-label",
                            isPassword ? "Hide password" : "Show password"
                        );
                    });
                }
            </script>
            <!-- ✅ Agreement Notice (no checkbox) -->
            <div class="hld_terms_consent" style="margin: 10px 0; font-size: 0.9rem;">
                <p style="margin: 0;">
                    By continuing, you agree to the
                    <a href="https://healsend.com/wp-content/uploads/2025/10/Privacy_Policy_US.pdf" target="_blank" rel="noopener noreferrer">Privacy Policy</a>,
                    <a href="https://healsend.com/wp-content/uploads/2025/10/Terms-of-Service.pdf" target="_blank" rel="noopener noreferrer">Terms</a>, and
                    <a href="https://healsend.com/wp-content/uploads/2025/10/Consent-to-Telehealth.pdf" target="_blank" rel="noopener noreferrer">Telehealth Consent</a>.
                </p>
            </div>

            <?php wp_nonce_field('hld_signup_action', 'hld_signup_nonce'); ?>

            <button type="submit" class="hld_login_button">Sign Up</button>
        </form>

        <div class="hld_or_separator">or</div>

        <div class="hld_social_login">
            <?php echo do_shortcode('[nextend_social_login provider="google"]'); ?>
            <div class="hld_apple_signin">
                <?php echo do_shortcode('[nextend_social_login provider="apple"]'); ?>
            </div>

        </div>

        <div class="hld_create_wrap">
            <p>Already have an account?
                <a href="<?php echo esc_url(home_url('/patient-login/')); ?>">Login</a>
            </p>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if body has class "logged-in"
            if (document.body.classList.contains("logged-in")) {
                // Redirect to My Account page
                window.location.href = "<?php echo esc_url(home_url('/my-account')); ?>";
            }


            // Handle login button loading state
            const form = document.querySelector(".hld_login_form");
            const button = document.querySelector(".hld_login_button");

            if (form && button) {
                form.addEventListener("submit", function() {
                    button.disabled = true;
                    button.innerHTML = "Creating account…"; // 🔥 Update text instantly

                    // Optional small style upgrade
                    button.style.opacity = "0.7";
                    button.style.cursor = "not-allowed";

                    // Optional: add a spinner
                    // button.innerHTML = '<span class="spinner"></span> Logging in…';
                });
            }


        });
    </script>

<?php
    return ob_get_clean();
}
?>