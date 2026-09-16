<footer class="enterprise-footer">

    <div class="container footer-grid">

        <!-- ================= FOOTER ABOUT ================= -->
        <div class="footer-col footer-about">

            <a href="index.html"
               class="logo-container footer-logo">

                <img src="{{asset('frontend/assets')}}/logo.png"
                     alt="Marksmen Group Logo"
                     class="brand-logo-img">

            </a>

            <p>
                A professionally governed, rapidly expanding infrastructure
                solutions group delivering high-end machinery and commercial
                mobility solutions across Central India.
            </p>

        </div>


        <!-- ================= QUICK LINKS ================= -->
        <div class="footer-col">

            <h3>Quick Links</h3>

            <ul class="footer-links-list">

                <li>
                    <a href="index.html">Home</a>
                </li>

                <li>
                    <a href="about.html">About Us</a>
                </li>

                <li>
                    <a href="services.html">Products &amp; Services</a>
                </li>

                <li>
                    <a href="gallery.html">Gallery</a>
                </li>

                <li>
                    <a href="clients.html">Clients</a>
                </li>

                <li>
                    <a href="careers.html">Careers</a>
                </li>

                <li>
                    <a href="contact.html">Contact Us</a>
                </li>

            </ul>

        </div>


        <!-- ================= OUR ADDRESS ================= -->
        <div class="footer-col footer-address">

            <h3>Our Address</h3>

            <div class="footer-contact-list">

                <!-- HEAD OFFICE -->
                <div class="footer-contact-item">

                    <i class="fa-solid fa-location-dot"></i>

                    <div class="footer-contact-text">

                        <h5>Head Office (Bhopal)</h5>

                        <p>
                            233 - Ganesh Nagar, Bawadia Kalan,
                            Ward 53, Hoshangabad Road,
                            Bhopal - 462026
                        </p>

                    </div>

                </div>


                <!-- GWALIOR WORKSHOP -->
                <div class="footer-contact-item">

                    <i class="fa-solid fa-location-dot"></i>

                    <div class="footer-contact-text">

                        <h5>Gwalior Workshop</h5>

                        <p>
                            Transport Nagar, Gwalior,
                            Madhya Pradesh - 474001
                        </p>

                    </div>

                </div>


                <!-- SAGAR BRANCH -->
                <div class="footer-contact-item">

                    <i class="fa-solid fa-location-dot"></i>

                    <div class="footer-contact-text">

                        <h5>Sagar Branch</h5>

                        <p>
                            Jabalpur Road, Near Deepali Hotel,
                            Baheriya, Makronia,
                            Sagar (M.P.) - 470001
                        </p>

                    </div>

                </div>


                <!-- BETUL BRANCH -->
                <div class="footer-contact-item">

                    <i class="fa-solid fa-location-dot"></i>

                    <div class="footer-contact-text">

                        <h5>Betul Branch</h5>

                        <p>
                            Itarsi Road, Near Om Residency,
                            Opposite Daga Oil Mill,
                            Betul (M.P.) - 460001
                        </p>

                    </div>

                </div>

            </div>

        </div>


        <!-- ================= SOCIAL MEDIA ================= -->
        <div class="footer-col footer-social">

            <h3>Social Media</h3>

            <p>
                Follow us on our official channels to stay updated on
                our heavy machinery portfolios, service launches,
                and team delivery events.
            </p>

            <div class="social-links">

                <a href="https://www.linkedin.com/in/marksmen-construction-38b38a348/"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="LinkedIn">

                    <i class="fa-brands fa-linkedin-in"></i>

                </a>


                <a href="https://www.instagram.com/marksmen_group_/"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="Instagram">

                    <i class="fa-brands fa-instagram"></i>

                </a>


                <a href="https://www.youtube.com/@MarketingMarksman"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="YouTube">

                    <i class="fa-brands fa-youtube"></i>

                </a>

            </div>

        </div>

    </div>


    <!-- ================= FOOTER BOTTOM ================= -->

    <div class="container footer-bottom">

        <p>
            &copy; 2026 Marksmen Group. All Rights Reserved.
            Managed by Act T Connect
        </p>

        <div class="footer-bottom-links">

            <a href="#">Privacy Policy</a>

            <a href="#">Terms &amp; Conditions</a>

        </div>

    </div>

</footer>
  <!-- FLOATING ACTION BUTTONS -->
  <div class="floating-actions">
    <a href="https://wa.me/919893911155" target="_blank" class="floating-btn floating-whatsapp" title="WhatsApp Us"><i class="fa-brands fa-whatsapp"></i></a>
    <a href="tel:+919893911155" class="floating-btn floating-call" title="Call Us"><i class="fa-solid fa-phone"></i></a>
  </div>
<!-- POPUP INQUIRY MODAL -->
<div class="modal">

    <div class="modal-backdrop"></div>

    <div class="modal-wrapper">

        <div class="modal-close">&times;</div>

        <h3>Request a Callback</h3>

        <p>
            Submit your details and our machinery experts will call you
            to discuss your project requirements.
        </p>


        <form
            id="modal-callback-form"
            method="POST"
            action="{{ route('product-enquiry.store') }}"
        >

            @csrf

            <div class="modal-form-grid">

                <!-- NAME -->
                <div class="form-group">

                    <label for="m-name">
                        Name *
                    </label>

                    <div class="form-field-input-wrapper">

                        <i class="fa-solid fa-user"></i>

                        <input
                            type="text"
                            id="m-name"
                            name="name"
                            class="form-input"
                            placeholder="Your name"
                            required
                        >

                    </div>

                </div>


                <!-- MOBILE -->
                <div class="form-group">

                    <label for="m-phone">
                        Mobile no *
                    </label>

                    <div class="form-field-input-wrapper">

                        <i class="fa-solid fa-mobile-screen-button"></i>

                        <input
                            type="tel"
                            id="m-phone"
                            name="mobile_number"
                            class="form-input"
                            placeholder="Mobile number"
                            required
                        >

                    </div>

                </div>


                <!-- LOCATION -->
                <div class="form-group">

                    <label for="m-location">
                        Location *
                    </label>

                    <div class="form-field-input-wrapper">

                        <i class="fa-solid fa-location-dot"></i>

                        <input
                            type="text"
                            id="m-location"
                            name="project_location"
                            class="form-input"
                            placeholder="Your location"
                            required
                        >

                    </div>

                </div>


                <!-- EMAIL -->
                <div class="form-group">

                    <label for="m-email">
                        Email address
                    </label>

                    <div class="form-field-input-wrapper">

                        <i class="fa-solid fa-envelope"></i>

                        <input
                            type="email"
                            id="m-email"
                            name="email"
                            class="form-input"
                            placeholder="Email address"
                        >

                    </div>

                </div>


                <!-- PRODUCT ENQUIRY -->
                <div class="form-group full-width">

                    <label for="m-enquiry">
                        Product Enquiry *
                    </label>

                    <div class="form-field-input-wrapper">

                        <i class="fa-solid fa-boxes-stacked"></i>

                        <input
                            type="text"
                            id="m-enquiry"
                            name="product_portfolio"
                            class="form-input"
                            placeholder="e.g. Tata Hitachi Excavator, Ascenso Tyres, Spares..."
                            required
                        >

                    </div>

                </div>


                <!-- MESSAGE / REQUIREMENTS -->
                <div class="form-group full-width">

                    <label for="m-message">
                        Message / Requirements
                    </label>

                    <div
                        class="form-field-input-wrapper"
                        style="align-items: flex-start;"
                    >

                        <i
                            class="fa-solid fa-comment"
                            style="top: 0.75rem;"
                        ></i>

                        <textarea
                            id="m-message"
                            name="requirements"
                            class="form-textarea"
                            placeholder="Tell us about your requirements..."
                        ></textarea>

                    </div>

                </div>


                <!-- SUBMIT -->
                <div class="form-group full-width">

                    <button
                        type="submit"
                        class="btn btn-primary"
                        style="width: 100%;"
                    >
                        Submit Request

                        <i class="fa-solid fa-paper-plane"></i>

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('modal-callback-form');

    if (!form) {
        return;
    }

    form.addEventListener('submit', async function (e) {

        e.preventDefault();

        const button = form.querySelector('button[type="submit"]');

        const originalText = button.innerHTML;

        button.disabled = true;
        button.innerHTML = 'Submitting...';

        try {

            const formData = new FormData(form);

            const response = await fetch(form.action, {
                method: 'POST',

                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },

                body: formData
            });


            const data = await response.json();


            if (response.ok && data.success) {

                alert(data.message);

                form.reset();

                /*
                 * Close modal
                 * Remove this line if your existing modal
                 * uses a different closing method.
                 */
                const modal = document.querySelector('.modal');

                if (modal) {
                    modal.classList.remove('active');
                }

            } else {

                if (data.errors) {

                    const messages = Object.values(data.errors)
                        .flat()
                        .join('\n');

                    alert(messages);

                } else {

                    alert(
                        data.message ||
                        'Unable to submit enquiry. Please try again.'
                    );

                }

            }

        } catch (error) {

            console.error('Product enquiry error:', error);

            alert(
                'Something went wrong while submitting your enquiry. Please try again.'
            );

        } finally {

            button.disabled = false;
            button.innerHTML = originalText;

        }

    });

});
</script>
  <!-- Video Player Lightbox Modal -->
  <div class="video-modal" id="testimonial-video-modal">
    <div class="video-modal-backdrop"></div>
    <div class="video-modal-content">
      <button class="video-modal-close" aria-label="Close Video">&times;</button>
      <iframe id="video-iframe" src="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>