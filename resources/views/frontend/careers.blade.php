@extends('frontend.layout.main')

@section('title', 'Careers - Marksmen Group')
@php 
 $frontendImages = asset('frontend/assets/images');

 @endphp


@section('content')


  <!-- SUBPAGE HERO (Full-Bleed Angled Cut Banner) -->
  <section class="page-hero">
    <div class="container">
      <div class="page-hero-content reveal">
        <span class="page-hero-tag"><i class="fa-solid fa-user-plus"></i> Join Our Workforce</span>
        <h1 class="page-hero-title">Careers at <span>Marksmen Group</span></h1>
        <p class="page-hero-desc">
          Build a rewarding engineering, technical service, and commercial sales career with Central India’s fastest-expanding infrastructure enterprise.
        </p>
        <div class="page-hero-stats-row">
          <span class="hero-stat-pill"><i class="fa-solid fa-users"></i> 500+ Workforce Family</span>
          <span class="hero-stat-pill"><i class="fa-solid fa-screwdriver-wrench"></i> OEM Master Training</span>
          <span class="hero-stat-pill"><i class="fa-solid fa-chart-line"></i> Fast-Track Growth</span>
        </div>
      </div>
    </div>

    <!-- Right Side Full-Bleed Angled Media -->
    <div class="page-hero-media reveal">
      <img src="{{ $frontendImages }}/careers_hero_banner.png" alt="Ascenso Tyres Infrastructure Exhibition and Team">
      <div class="page-hero-badge-overlay">
        <i class="fa-solid fa-users-gear"></i> Growth & Opportunity
      </div>
    </div>
  </section>

  <!-- WHY WORK WITH MARKSMEN GROUP -->
  <section class="section-padding" style="background-color: var(--bg-white);">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Workplace Culture</span>
        <h2 class="section-title">Why Build Your Career <span>With Us?</span></h2>
        <p class="section-subtitle">We invest in our people with global OEM training, structured advancement tracks, and high-performance incentives.</p>
      </div>

      <div class="career-benefits-grid">
        <div class="career-benefit-card reveal">
          <div class="career-benefit-icon"><i class="fa-solid fa-trophy"></i></div>
          <h4>Global OEM Exposure</h4>
          <p>Work directly with premier global machinery leaders including Tata Hitachi, Schwing Stetter, Ascenso Tyres, and Eicher Commercial Vehicles.</p>
        </div>

        <div class="career-benefit-card reveal">
          <div class="career-benefit-icon"><i class="fa-solid fa-graduation-cap"></i></div>
          <h4>Certified Technical Mastery</h4>
          <p>Get certified in advanced hydraulic diagnostics, electronic engine calibration, and precision heavy equipment lifecycle management.</p>
        </div>

        <div class="career-benefit-card reveal">
          <div class="career-benefit-icon"><i class="fa-solid fa-chart-line"></i></div>
          <h4>Merit-Based Fast Promotion</h4>
          <p>Clear, transparent performance appraisals with structured career ladders from field technician to regional service and branch manager.</p>
        </div>

        <div class="career-benefit-card reveal">
          <div class="career-benefit-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
          <h4>Competitive Compensation</h4>
          <p>Industry-leading salaries, performance bonuses, field allowances, and comprehensive family medical and welfare support.</p>
        </div>

        <div class="career-benefit-card reveal">
          <div class="career-benefit-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
          <h4>Modern Workshop Infrastructure</h4>
          <p>Equipped with state-of-the-art diagnostic scanners, automated test benches, and dedicated safety gear at our Gwalior and Bhopal hubs.</p>
        </div>

        <div class="career-benefit-card reveal">
          <div class="career-benefit-icon"><i class="fa-solid fa-people-group"></i></div>
          <h4>Collaborative Culture</h4>
          <p>Join a respectful, values-driven organization where teamwork, innovation, customer commitment, and integrity are celebrated.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CURRENT JOB OPENINGS (All Job Cards with Pulsing Apply Now Buttons) -->
  <section class="section-padding" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color);" id="job-openings">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Active Opportunities</span>
        <h2 class="section-title">Current Job <span>Openings</span></h2>
        <p class="section-subtitle">Select an open position below and click <strong>Apply Now</strong> to submit your application directly online.</p>
      </div>

<div class="jobs-grid">

    @forelse($jobs as $job)

        <div class="job-card-premium reveal">

            <div class="job-card-header">

                <span class="job-department-tag">
                    {{ $job->department }}
                </span>

                <span class="job-type-pill">
                    {{ $job->employment_type }}
                </span>

            </div>


            <h3 class="job-card-title">
                {{ $job->title }}
            </h3>


            <div class="job-meta-list">

                <div class="job-meta-item">
                    <i class="fa-solid fa-location-dot"></i>
                    {{ $job->location }}
                </div>

                <div class="job-meta-item">
                    <i class="fa-solid fa-briefcase"></i>
                    {{ $job->experience }}
                </div>

                <div class="job-meta-item">
                    <i class="fa-solid fa-user-check"></i>
                    {{ $job->open_positions }}
                    {{ $job->open_positions == 1 ? 'Open Position' : 'Open Positions' }}
                </div>

            </div>


            <p class="job-card-desc">
                {{ $job->job_description }}
            </p>


            <!-- Skills -->
            @if(!empty($job->skills))

                <div class="job-skills-tags">

                    @foreach($job->skills as $skill)

                        <span class="job-skill-tag">
                            {{ $skill }}
                        </span>

                    @endforeach

                </div>

            @endif


            <div class="job-card-footer">

                <button
                    class="btn-apply-job"
                    data-job-title="{{ $job->title }}"
                    data-job-id="{{ $job->id }}"
                >
                    <i class="fa-solid fa-bolt"></i>
                    Apply Now
                    <i class="fa-solid fa-arrow-right"></i>
                </button>

            </div>

        </div>

    @empty

        <div class="text-center" style="width: 100%;">
            <p>No current job openings available.</p>
        </div>

    @endforelse

</div>
    </div>
  </section>

  <!-- DEDICATED JOB APPLICATION MODAL (Triggered when clicking Apply Now on any Job Card) -->
  <div class="job-modal" id="job-apply-modal" aria-hidden="true" role="dialog">
    <div class="job-modal-wrapper">
      <span class="job-modal-close" id="job-modal-close" aria-label="Close modal">&times;</span>
      <div class="job-modal-header">
        <span class="section-tag" style="margin-bottom: 0.25rem;">Candidate Application</span>
        <h3>Apply For Position</h3>
        <div class="modal-applied-role" style="margin-top: 0.4rem;">
          <i class="fa-solid fa-briefcase"></i> <span id="modal-role-badge">Senior Service Engineer</span>
        </div>
      </div>

      <form id="job-modal-apply-form">
        <div class="career-form-grid">
          
          <!-- Hidden / Display Position Field -->
          <div class="form-group full-width">
            <label for="modal-car-position">Selected Role</label>
            <div class="form-field-input-wrapper">
              <i class="fa-solid fa-briefcase field-icon"></i>
              <input type="text" id="modal-car-position" class="form-input" style="background-color: #f1f5f9; font-weight: 700; color: var(--primary);" readonly>
            </div>
          </div>

          <!-- Full Name -->
          <div class="form-group">
            <label for="m-car-name">Full Name <span class="req">*</span></label>
            <div class="form-field-input-wrapper">
              <i class="fa-solid fa-user field-icon"></i>
              <input type="text" id="m-car-name" class="form-input" placeholder="Your full name" required>
            </div>
          </div>

          <!-- Mobile Number -->
          <div class="form-group">
            <label for="m-car-phone">Mobile Number <span class="req">*</span></label>
            <div class="form-field-input-wrapper">
              <i class="fa-solid fa-phone field-icon"></i>
              <input type="tel" id="m-car-phone" class="form-input" placeholder="10-digit mobile number" required>
            </div>
          </div>

          <!-- Email Address -->
          <div class="form-group">
            <label for="m-car-email">Email Address <span class="req">*</span></label>
            <div class="form-field-input-wrapper">
              <i class="fa-solid fa-envelope field-icon"></i>
              <input type="email" id="m-car-email" class="form-input" placeholder="Your email address" required>
            </div>
          </div>

          <!-- Location -->
          <div class="form-group">
            <label for="m-car-location">Current City / Location <span class="req">*</span></label>
            <div class="form-field-input-wrapper">
              <i class="fa-solid fa-location-dot field-icon"></i>
              <input type="text" id="m-car-location" class="form-input" placeholder="e.g. Bhopal, Gwalior, Sagar" required>
            </div>
          </div>

          <!-- Total Experience -->
          <div class="form-group">
            <label for="m-car-experience">Total Experience <span class="req">*</span></label>
            <div class="form-field-input-wrapper">
              <i class="fa-solid fa-business-time field-icon"></i>
              <select id="m-car-experience" class="form-select" required>
                <option value="">Select Experience</option>
                <option value="Fresher / Entry Level (< 1 yr)">Fresher / Entry Level (&lt; 1 yr)</option>
                <option value="1 - 2 Years">1 - 2 Years</option>
                <option value="3 - 5 Years">3 - 5 Years</option>
                <option value="5 - 8 Years">5 - 8 Years</option>
                <option value="8+ Years Experienced">8+ Years Experienced</option>
              </select>
            </div>
          </div>

          <!-- Qualification -->
          <div class="form-group">
            <label for="m-car-qualification">Highest Qualification</label>
            <div class="form-field-input-wrapper">
              <i class="fa-solid fa-graduation-cap field-icon"></i>
              <input type="text" id="m-car-qualification" class="form-input" placeholder="e.g. B.E. / Diploma / ITI">
            </div>
          </div>

          <!-- Resume Upload Dropzone -->
          <div class="form-group full-width">
            <label>Attach Resume / CV (PDF / DOC)</label>
            <div class="file-upload-card" id="modal-resume-dropzone">
              <input type="file" id="modal-car-resume" accept=".pdf,.doc,.docx" aria-label="Upload Resume">
              <div class="upload-icon-box">
                <i class="fa-solid fa-folder-open"></i>
              </div>
              <div class="upload-title">Click to browse or drop your Resume / CV here</div>
              <div class="upload-subtitle">Supported formats: PDF, DOC, DOCX (Max 5MB)</div>
            </div>
            <div class="file-selected-badge" id="modal-file-badge">
              <span class="file-name"><i class="fa-solid fa-file-lines"></i> <span id="modal-file-name-text">filename.pdf</span></span>
              <button type="button" class="file-remove-btn" id="modal-file-remove-btn" title="Remove file">&times;</button>
            </div>
          </div>

          <!-- Skills / Message -->
          <div class="form-group full-width">
            <label for="m-car-message">Brief Note / Key Skills</label>
            <div class="form-field-input-wrapper" style="align-items: flex-start;">
              <i class="fa-solid fa-comment-dots field-icon textarea-icon"></i>
              <textarea id="m-car-message" class="form-textarea" placeholder="Highlight your relevant experience, machinery background, or certifications..."></textarea>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="form-group full-width">
            <button type="submit" class="btn btn-primary" style="width: 100%; height: 48px; font-size: 0.95rem; justify-content: center; display: inline-flex; align-items: center; gap: 0.6rem;">
              Submit Application Now <i class="fa-solid fa-paper-plane"></i>
            </button>
          </div>

        </div>
      </form>
    </div>
  </div>



@endsection