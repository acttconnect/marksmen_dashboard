@extends('frontend.layout.main')

@section('title', 'Clients - Marksmen Group')
@php 
 $frontendImages = asset('frontend/assets/images');

 @endphp


@section('content')


  <!-- SUBPAGE HERO (Full-Bleed Angled Cut Banner) -->
  <section class="page-hero">
    <div class="container">
      <div class="page-hero-content reveal">
        <span class="page-hero-tag"><i class="fa-solid fa-handshake"></i> Strategic Alliances</span>
        <h1 class="page-hero-title">OEM Partners & <span>Clients</span></h1>
        <p class="page-hero-desc">
          Direct Tier-1 OEM alignments with global infrastructure titans, and trusted supply partnerships with India's largest infrastructure conglomerates and public sector undertakings.
        </p>
        <div class="page-hero-stats-row">
          <span class="hero-stat-pill"><i class="fa-solid fa-gem"></i> Tier-1 OEM Brands</span>
          <span class="hero-stat-pill"><i class="fa-solid fa-city"></i> Major Infra Clients</span>
          <span class="hero-stat-pill"><i class="fa-solid fa-thumbs-up"></i> 1000+ Fleets Powered</span>
        </div>
      </div>
    </div>

    <!-- Right Side Full-Bleed Angled Media -->
    <div class="page-hero-media reveal">
      <img src="{{ $frontendImages }}/clients_hero_banner.png" alt="Schwing Stetter Concrete Transit Mixer Equipment">
      <div class="page-hero-badge-overlay">
        <i class="fa-solid fa-truck-droplet"></i> Schwing Stetter Concrete Systems
      </div>
    </div>
  </section>

  <!-- AUTHORIZED OEMS -->
  <section class="section-padding" style="background-color: white;">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">OEM Relationships</span>
        <h2 class="section-title">Global Engineering Alliances</h2>
        <p class="section-subtitle">We build direct structural networks with premier global manufacturers to deliver authenticated assets and components.</p>
      </div>

      <div class="clients-grid">
        <div class="client-logo-card reveal" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
          <img src="{{ $frontendImages }}/tata_hitachi_logo.png" alt="Tata Hitachi" style="height: 52px; width: auto; max-width: 90%; object-fit: contain; margin-bottom: 0.75rem; margin-top: 1rem;">
          <span class="client-logo-subtext">Construction Machinery</span>
        </div>
        <div class="client-logo-card reveal">
          <img src="{{ $frontendImages }}/eicher_logo.png" alt="Eicher" style="height: 100px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 0.75rem;">
          <span class="client-logo-subtext">Commercial Vehicles</span>
        </div>
        <div class="client-logo-card reveal">
          <img src="{{ $frontendImages }}/schwing_logo.jpg" alt="Schwing Stetter" style="height: 100px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 0.75rem;">
          <span class="client-logo-subtext">Concrete Systems</span>
        </div>
        <div class="client-logo-card reveal">
          <img src="{{ $frontendImages }}/ascenso_logo.jpg" alt="Ascenso Tyres" style="height: 100px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 0.75rem;">
          <span class="client-logo-subtext">OTR / Industrial Tyres</span>
        </div>
      </div>
    </div>
  </section>

  <!-- PRIME CUSTOMERS -->
  <section class="section-padding" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color);">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Key Clienteles</span>
        <h2 class="section-title">Our Prime <span>Customers</span></h2>
        <p class="section-subtitle">We are proud to partner with major infrastructure builders and municipal corporations in driving growth across Central India.</p>
      </div>

      <div class="clients-grid" style="margin-top: 2.5rem;">
        <div class="client-logo-card reveal">
          <img src="{{ $frontendImages }}/bansal_logo.png" alt="Bansal Group" style="height: 100px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 0.75rem;">
          <span class="client-logo-subtext">Infrastructure & Construction</span>
        </div>
        <div class="client-logo-card reveal">
          <img src="{{ $frontendImages }}/dilip_buildcon_logo.png" alt="Dilip Buildcon" style="height: 100px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 0.75rem;">
          <span class="client-logo-subtext">Roads & Highways Development</span>
        </div>
        <div class="client-logo-card reveal">
          <img src="{{ $frontendImages }}/nagar_nigam_bhopal_logo.png" alt="Nagar Nigam Bhopal" style="height: 100px; width: auto; max-width: 100%; object-fit: contain; margin-bottom: 0.75rem;">
          <span class="client-logo-subtext">Municipal Infrastructure Services</span>
        </div>
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS SECTION -->
  <section class="testimonials-section section-padding">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Client Feedback</span>
        <h2 class="section-title" style="color: white;">What Our Partners Say</h2>
        <p class="section-subtitle" style="color: rgba(255, 255, 255, 0.75);">Discover how we assist building contractors and builders in maximizing their asset uptime and project delivery speeds.</p>
      </div>

      <div class="testimonials-grid">
        <!-- T1 -->
        <div class="testimonial-card reveal">
          <p class="testimonial-quote">
            "Marksmen Group’s Gwalior service workshop has been pivotal in maintaining our fleet. Their proactive diagnostics, genuine parts, and quick turnaround times keep our projects moving."
          </p>
          <div class="testimonial-author">
            <div class="author-avatar">SD</div>
            <div class="author-info">
              <h5>Mr. Saurabh Dubey</h5>
              <p>Project Director, MP Road Projects</p>
            </div>
          </div>
        </div>

        <!-- T2 -->
        <div class="testimonial-card reveal">
          <p class="testimonial-quote">
            "Procuring Tata Hitachi excavators through Marksmen was seamless. Their team matched the specs precisely to our site conditions. Highly recommend their professional management model."
          </p>
          <div class="testimonial-author">
            <div class="author-avatar">RK</div>
            <div class="author-info">
              <h5>Mr. Rajesh Kumar</h5>
              <p>MD, Zenith Builders Bhopal</p>
            </div>
          </div>
        </div>

        <!-- T3 -->
        <div class="testimonial-card reveal">
          <p class="testimonial-quote">
            "Their Ascenso tyres statewide distribution is highly reliable. We received our order for mining tippers in record time. Prompt support, solid salvage value, and low maintenance overheads."
          </p>
          <div class="testimonial-author">
            <div class="author-avatar">AM</div>
            <div class="author-info">
              <h5>Mr. Alok Mishra</h5>
              <p>Logistics Head, Central Minerals</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



@endsection