
@extends('frontend.layout.main')

@section('title', 'Marksmen Group - Building Trust. Delivering Excellence.')

@section('content')

@php 
 $frontendImages = asset('frontend/assets/images');

 @endphp

<div class="overlay"></div>

  <!-- HERO CAROUSEL BANNER SLIDER -->
  <section class="hero-slider">
    <div class="slider-wrapper">
      
      <!-- Slide 1: TATA HITACHI -->
      <div class="slide active">
        <img src="{{ $frontendImages }}/tata_hitachi_banner.jpg" alt="Tata Hitachi Heavy Construction Excavator" class="slide-img">
        <div class="container">
          <div class="slide-content">
            <div class="slide-badge">
              <i class="fa-solid fa-gears"></i> Tata Hitachi Construction
            </div>
            <h1 class="slide-title">Tata Hitachi<br><span>Authorized OEM Dealer</span></h1>
            <p class="slide-desc">Authorized Dealer for Tata Hitachi. Supplying heavy hydraulic excavators and backhoe loaders engineered for maximum speed, output, and terrain adaptation in Central MP.</p>
            <div class="hero-actions">
              <a href="{{ route('services') }}#tata-hitachi" class="btn btn-primary">Explore Excavators <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 2: Schwing Stetter -->
      <div class="slide">
        <img src="{{ $frontendImages }}/schwing_banner.png" alt="Schwing Stetter Transit Concrete Mixer" class="slide-img">
        <div class="container">
          <div class="slide-content">
            <div class="slide-badge">
              <i class="fa-solid fa-trowel-bricks"></i> Schwing Stetter Concrete Systems
            </div>
            <h1 class="slide-title">Schwing Stetter<br><span>Authorized OEM Dealer</span></h1>
            <p class="slide-desc">Authorized Dealer for Schwing Stetter. Supplying state-of-the-art concrete batching systems, mixers, concrete pumps, and wear-resistant machinery parts.</p>
            <div class="hero-actions">
              <a href="{{ route('services') }}#schwing-stetter" class="btn btn-primary">Explore Concrete Systems <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 3: Ascenso tyre -->
      <div class="slide">
        <img src="{{ $frontendImages }}/ascenso_banner.png" alt="Ascenso OTR and Off-Road Tyres" class="slide-img">
        <div class="container">
          <div class="slide-content">
            <div class="slide-badge">
              <i class="fa-solid fa-dharmachakra"></i> Ascenso Off-The-Road Tyres
            </div>
            <h1 class="slide-title">Ascenso Tyres<br><span>Authorized Distributor</span></h1>
            <p class="slide-desc">Authorized Distributor for Ascenso OTR & Solid Tyres. Delivering high-capacity industrial, agricultural, and earthmoving tyres built to handle severe payloads.</p>
            <div class="hero-actions">
              <a href="{{ route('services') }}#ascenso" class="btn btn-primary">Explore Tyres Range <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 4: Eicher workshop -->
      <div class="slide">
        <img src="{{ $frontendImages }}/eicher_banner.png" alt="Eicher Commercial Tipper Fleet" class="slide-img">
        <div class="container">
          <div class="slide-content">
            <div class="slide-badge">
              <i class="fa-solid fa-truck-moving"></i> Eicher Workshop Service
            </div>
            <h1 class="slide-title">Eicher Workshop<br><span>Authorized Service Hub</span></h1>
            <p class="slide-desc">Authorized Workshop of Eicher bus and truck. Providing comprehensive diagnostic testing, routine fleet checks, and genuine parts supply from Gwalior.</p>
            <div class="hero-actions">
              <a href="{{ route('services') }}#eicher" class="btn btn-primary">Explore Workshop <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Controls -->
    <div class="slider-control-btn slider-prev"><i class="fa-solid fa-chevron-left"></i></div>
    <div class="slider-control-btn slider-next"><i class="fa-solid fa-chevron-right"></i></div>

    <!-- Dots -->
    <div class="slider-dots">
      <div class="slider-dot active" data-index="0"></div>
      <div class="slider-dot" data-index="1"></div>
      <div class="slider-dot" data-index="2"></div>
      <div class="slider-dot" data-index="3"></div>
    </div>
  </section>

  <!-- AUTHORIZED OEM BRANDS SHOWCASE (Auto-Slider Logo Strip - Clickable to Product Page) -->
  <section class="oem-brands-banner container">
    <div class="oem-logos-slider-wrapper">
      <div class="oem-logos-track">
        <!-- Set 1 -->
        <a href="{{ route('services') }}#tata-hitachi" class="oem-slider-logo-item" title="Tata Hitachi Heavy Construction Machinery">
          <img src="{{ $frontendImages }}/tata_hitachi_logo.png" alt="Tata Hitachi">
        </a>
        <div class="oem-logo-divider"></div>
        <a href="{{ route('services') }}#eicher" class="oem-slider-logo-item" title="VECV Eicher Commercial Vehicles">
          <img src="{{ $frontendImages }}/eicher_logo.png" alt="Eicher">
        </a>
        <div class="oem-logo-divider"></div>
        <a href="{{ route('services') }}#schwing-stetter" class="oem-slider-logo-item" title="Schwing Stetter Concrete Systems">
          <img src="{{ $frontendImages }}/schwing_logo.jpg" alt="Schwing Stetter">
        </a>
        <div class="oem-logo-divider"></div>
        <a href="{{ route('services') }}#ascenso" class="oem-slider-logo-item" title="Ascenso Industrial & OTR Tyres">
          <img src="{{ $frontendImages }}/ascenso_logo.jpg" alt="Ascenso Tyres">
        </a>
        <div class="oem-logo-divider"></div>

        <!-- Set 2 (Seamless Infinite Loop) -->
        <a href="{{ route('services') }}#tata-hitachi" class="oem-slider-logo-item" title="Tata Hitachi Heavy Construction Machinery">
          <img src="{{ $frontendImages }}/tata_hitachi_logo.png" alt="Tata Hitachi">
        </a>
        <div class="oem-logo-divider"></div>
        <a href="{{ route('services') }}#eicher" class="oem-slider-logo-item" title="VECV Eicher Commercial Vehicles">
          <img src="{{ $frontendImages }}/eicher_logo.png" alt="Eicher">
        </a>
        <div class="oem-logo-divider"></div>
        <a href="{{ route('services') }}#schwing-stetter" class="oem-slider-logo-item" title="Schwing Stetter Concrete Systems">
          <img src="{{ $frontendImages }}/schwing_logo.jpg" alt="Schwing Stetter">
        </a>
        <div class="oem-logo-divider"></div>
        <a href="{{ route('services') }}#ascenso" class="oem-slider-logo-item" title="Ascenso Industrial & OTR Tyres">
          <img src="{{ $frontendImages }}/ascenso_logo.jpg" alt="Ascenso Tyres">
        </a>
        <div class="oem-logo-divider"></div>
      </div>
    </div>
  </section>

  <!-- CORPORATE OVERVIEW (Ultra-Modern High-Impact Corporate Layout) -->
  <section class="about-preview section-padding">
    <div class="container about-preview-grid">
      <div class="about-preview-content reveal">
        <span class="section-tag"><i class="fa-solid fa-crown"></i> 40+ Years Heritage & Leadership</span>
        <h2 class="section-title">Pioneering Central India's <span>Heavy Infrastructure</span> Growth</h2>
        
        <div class="about-lead-card">
          <p class="about-lead-text">
            Headquartered in Bhopal, Madhya Pradesh, <strong>Marksmen Group</strong> is an institutional, multi-generational infrastructure solutions leader across Central India. We deliver heavy earthmoving machinery, commercial mobility, concrete batching systems, and industrial OTR tyres that power India’s most demanding highway, mining, and civil engineering projects.
          </p>
        </div>

        <!-- 3 Core Capability Pillars -->
        <div class="about-pillars-grid">
          <div class="about-pillar-item">
            <div class="about-pillar-icon"><i class="fa-solid fa-truck-ramp-box"></i></div>
            <div class="about-pillar-title">Authorized OEM Leader</div>
            <p class="about-pillar-desc">Tata Hitachi, VECV Eicher, Schwing Stetter & Ascenso Tyres partner.</p>
          </div>
          <div class="about-pillar-item">
            <div class="about-pillar-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
            <div class="about-pillar-title">Central MP Service Hubs</div>
            <p class="about-pillar-desc">Dedicated workshops in Bhopal & Gwalior with 24/7 mobile field vans.</p>
          </div>
          <div class="about-pillar-item">
            <div class="about-pillar-icon"><i class="fa-solid fa-shield-halved"></i></div>
            <div class="about-pillar-title">Institutional Ethics</div>
            <p class="about-pillar-desc">Over 40 years of transparent, relationship-first business governance.</p>
          </div>
        </div>

        <!-- 2 Executive Leadership Spotlight Cards -->
        <div class="leadership-spotlight-grid">
          <div class="leadership-card">
            <div class="leadership-header">
              <div class="leadership-icon-box">
                <i class="fa-solid fa-user-tie"></i>
              </div>
              <div>
                <h4 class="leadership-name">Mr. Ved Prakash Grover</h4>
                <span class="leadership-role">Founder & Group Chairman</span>
              </div>
            </div>
            <p class="leadership-desc">40+ Years of visionary infrastructure leadership, corporate integrity, and ethical governance.</p>
          </div>

          <div class="leadership-card">
            <div class="leadership-header">
              <div class="leadership-icon-box">
                <i class="fa-solid fa-user-gear"></i>
              </div>
              <div>
                <h4 class="leadership-name">Mr. Karan Grover</h4>
                <span class="leadership-role">Managing Director</span>
              </div>
            </div>
            <p class="leadership-desc">15+ Years spearheading strategic OEM alliances, digital operations, and state-wide fleet growth.</p>
          </div>
        </div>

        <!-- 4 Metrics Matrix -->
        <div class="about-metrics-matrix">
          <div class="about-metric-box">
            <div class="about-metric-val">18<span>+</span></div>
            <div class="about-metric-lbl">MP Districts</div>
          </div>
          <div class="about-metric-box">
            <div class="about-metric-val">40<span>+</span></div>
            <div class="about-metric-lbl">Years Legacy</div>
          </div>
          <div class="about-metric-box">
            <div class="about-metric-val">99.8<span>%</span></div>
            <div class="about-metric-lbl">Uptime Focus</div>
          </div>
          <div class="about-metric-box">
            <div class="about-metric-val">500<span>+</span></div>
            <div class="about-metric-lbl">Fleet Clients</div>
          </div>
        </div>

        <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
          <a href="{{ route('about') }}" class="btn btn-secondary">Read Company Journey <i class="fa-solid fa-arrow-right"></i></a>
          <a href="{{ route('contact') }}" class="btn btn-outline" style="border: 2px solid #E2E8F0; color: #1E293B; font-weight: 700; padding: 0.75rem 1.4rem; border-radius: 8px;">Connect with Leadership</a>
        </div>
      </div>
      
      <!-- Right Side: Multi-layer Media & Strategic Milestones Roadmap -->
      <div class="about-visual-stack reveal">
        <div class="about-hero-image-wrap">
          <img src="{{ $frontendImages }}/img35.jpeg" alt="Marksmen Corporate Team outside Head Office in Bhopal">
          <div class="about-floating-chip-left">
            <i class="fa-solid fa-star"></i> 23+ Years Industrial Trust
          </div>
          <div class="about-floating-chip-right">
            <div class="about-floating-chip-title">Central India</div>
            <div class="about-floating-chip-sub">Infrastructure Hub</div>
          </div>
        </div>
        
        <!-- Strategic Milestones Modern Interactive Timeline Card -->
        <div class="home-milestones-card">
          <div class="home-milestones-header">
            <div class="home-milestones-title-box">
              <span class="home-milestones-title-icon" style="background: rgba(203, 162, 51, 0.15); color: var(--accent);"><i class="fa-solid fa-chart-line"></i></span>
              <h4 class="home-milestones-title" style="margin: 0; font-size: 1rem;">OEM Strategic Evolution Roadmap</h4>
            </div>
            <span class="home-milestones-badge" style="background: #1E293B; color: var(--accent); padding: 0.25rem 0.65rem; border-radius: 20px; font-size: 0.75rem; font-weight: 700;">2017 – 2025</span>
          </div>

          <div class="home-milestones-timeline">
            <!-- 2017 -->
            <div class="home-milestone-step">
              <div class="home-milestone-head">
                <span class="home-milestone-year">2017</span>
                <span class="home-milestone-partner">Daimler Commercial Vehicles</span>
              </div>
              <p class="home-milestone-desc">Entry into commercial mobility infrastructure across Central Madhya Pradesh.</p>
            </div>

            <!-- 2022 -->
            <div class="home-milestone-step">
              <div class="home-milestone-head">
                <span class="home-milestone-year">2022</span>
                <span class="home-milestone-partner">VE Commercial Vehicles (Eicher)</span>
              </div>
              <p class="home-milestone-desc">Strategic transition to Eicher commercial trucks and Gwalior workshop setup.</p>
            </div>

            <!-- 2023 -->
            <div class="home-milestone-step">
              <div class="home-milestone-head">
                <span class="home-milestone-year">2023</span>
                <span class="home-milestone-partner">Tata Hitachi Construction Machinery</span>
              </div>
              <p class="home-milestone-desc">Authorized heavy equipment dealership across 18 Central MP districts.</p>
            </div>

            <!-- 2025 -->
            <div class="home-milestone-step">
              <div class="home-milestone-head">
                <span class="home-milestone-year">2025</span>
                <span class="home-milestone-partner">Schwing Stetter & Ascenso Tyres</span>
              </div>
              <p class="home-milestone-desc">Concrete batching systems and industrial off-the-road (OTR) tyres expansion.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ENTERPRISE PARTNERSHIP & PROCUREMENT DESK -->
  <section class="inquiry-banner-section section-padding" style="background: linear-gradient(135deg, #F8FAFC 0%, #EDF2F7 100%); border-top: 1px solid #E2E8F0; border-bottom: 1px solid #E2E8F0;">
    <div class="container registration-split-grid">
      
      <!-- Left Side -->
      <div class="registration-info-side">
        <span class="section-tag"><i class="fa-solid fa-handshake-angle"></i> Enterprise Solutions Portal</span>
        <h2 class="section-title">Establish An <span>Infrastructure Alliance</span></h2>
        <p class="section-subtitle" style="margin-bottom: 1.5rem;">
          Connect with Marksmen Group for direct equipment acquisition, genuine OEM component supply, fleet servicing, and dedicated industrial OTR tyres.
        </p>

        <!-- 3 Interactive Cards Row -->
        <div class="registration-cards-row" style="grid-template-columns: 1fr; gap: 1rem; margin-top: 1.25rem;">
          <div style="background: #FFFFFF; border: 1px solid #E2E8F0; border-left: 4px solid var(--accent); padding: 1.15rem 1.4rem; border-radius: 10px; display: flex; align-items: flex-start; gap: 1rem; box-shadow: 0 4px 15px rgba(0,0,0,0.04); transition: transform 0.25s ease;">
            <div style="width: 42px; height: 42px; border-radius: 10px; background: rgba(203, 162, 51, 0.12); display: flex; align-items: center; justify-content: center; color: var(--accent); font-size: 1.2rem; flex-shrink: 0;">
              <i class="fa-solid fa-gears"></i>
            </div>
            <div>
              <h4 style="font-size: 1rem; font-weight: 800; color: #1E293B; margin-bottom: 0.25rem;">100% Genuine OEM Spares</h4>
              <p style="font-size: 0.85rem; color: #64748B; margin: 0; line-height: 1.45;">Direct warehouse inventory for Tata Hitachi, Eicher, and Schwing Stetter components with immediate site dispatch.</p>
            </div>
          </div>

          <div style="background: #FFFFFF; border: 1px solid #E2E8F0; border-left: 4px solid #25D366; padding: 1.15rem 1.4rem; border-radius: 10px; display: flex; align-items: flex-start; gap: 1rem; box-shadow: 0 4px 15px rgba(0,0,0,0.04); transition: transform 0.25s ease;">
            <div style="width: 42px; height: 42px; border-radius: 10px; background: rgba(37, 211, 102, 0.12); display: flex; align-items: center; justify-content: center; color: #25D366; font-size: 1.2rem; flex-shrink: 0;">
              <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
            <div>
              <h4 style="font-size: 1rem; font-weight: 800; color: #1E293B; margin-bottom: 0.25rem;">Gwalior Commercial Mobility Hub</h4>
              <p style="font-size: 0.85rem; color: #64748B; margin: 0; line-height: 1.45;">Central MP’s premier heavy maintenance hub with full engine diagnostics, routine checks, and certified rebuilds.</p>
            </div>
          </div>

          <div style="background: #FFFFFF; border: 1px solid #E2E8F0; border-left: 4px solid #3B82F6; padding: 1.15rem 1.4rem; border-radius: 10px; display: flex; align-items: flex-start; gap: 1rem; box-shadow: 0 4px 15px rgba(0,0,0,0.04); transition: transform 0.25s ease;">
            <div style="width: 42px; height: 42px; border-radius: 10px; background: rgba(59, 130, 246, 0.12); display: flex; align-items: center; justify-content: center; color: #3B82F6; font-size: 1.2rem; flex-shrink: 0;">
              <i class="fa-solid fa-truck-moving"></i>
            </div>
            <div>
              <h4 style="font-size: 1rem; font-weight: 800; color: #1E293B; margin-bottom: 0.25rem;">Machinery & OTR Tyres Fleet</h4>
              <p style="font-size: 0.85rem; color: #64748B; margin: 0; line-height: 1.45;">Heavy hydraulic excavators, batching plants, transit mixers, tippers, and Ascenso high-durability off-road tyres.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Side (Form) -->
      <div class="registration-form-container" style="background: #FFFFFF; border-radius: 14px; border: 1px solid #E2E8F0; box-shadow: 0 15px 40px rgba(0,0,0,0.08); padding: 2.25rem;">
        <div class="form-header-title" style="color: #0F172A; font-weight: 800; letter-spacing: 1px; font-size: 0.95rem; border-bottom: 2px solid var(--accent); padding-bottom: 0.75rem; margin-bottom: 1.5rem; display: flex; align-items: center; justify-content: space-between;">
          <span>Submit Requirement Details</span>
          <span style="font-size: 0.72rem; color: var(--accent); background: var(--accent-light); border: 1px solid var(--border-accent); padding: 0.2rem 0.6rem; border-radius: 20px;">Fast Response Desk</span>
        </div>
        
        <form id="hero-registration-form">
          <div class="form-row-2col">
            <div class="form-field">
              <label for="reg-name" style="font-weight: 700; color: #334155; font-size: 0.78rem;">Your Name *</label>
              <div class="form-field-input-wrapper">
                <i class="fa-solid fa-user" style="color: var(--accent);"></i>
                <input type="text" id="reg-name" class="form-input" placeholder="e.g. Rahul Sharma" required style="border-radius: 8px;">
              </div>
            </div>
            <div class="form-field">
              <label for="reg-phone" style="font-weight: 700; color: #334155; font-size: 0.78rem;">Mobile Number *</label>
              <div class="form-field-input-wrapper">
                <i class="fa-solid fa-mobile-screen-button" style="color: var(--accent);"></i>
                <input type="tel" id="reg-phone" class="form-input" placeholder="e.g. +91 98939 11155" required style="border-radius: 8px;">
              </div>
            </div>
          </div>

          <div class="form-row-2col">
            <div class="form-field">
              <label for="reg-location" style="font-weight: 700; color: #334155; font-size: 0.78rem;">Project Location *</label>
              <div class="form-field-input-wrapper">
                <i class="fa-solid fa-location-dot" style="color: var(--accent);"></i>
                <input type="text" id="reg-location" class="form-input" placeholder="City / District" required style="border-radius: 8px;">
              </div>
            </div>
            <div class="form-field">
              <label for="reg-email" style="font-weight: 700; color: #334155; font-size: 0.78rem;">Email Address</label>
              <div class="form-field-input-wrapper">
                <i class="fa-solid fa-envelope" style="color: var(--accent);"></i>
                <input type="text" id="reg-email" class="form-input" placeholder="name@company.com" style="border-radius: 8px;">
              </div>
            </div>
          </div>

          <div class="form-field" style="margin-bottom: 1rem;">
            <label for="reg-enquiry" style="font-weight: 700; color: #334155; font-size: 0.78rem;">Product / Service Portfolio *</label>
            <div class="form-field-input-wrapper">
              <i class="fa-solid fa-boxes-stacked" style="color: var(--accent);"></i>
              <input type="text" id="reg-enquiry" class="form-input" placeholder="e.g. Tata Hitachi Excavator, Ascenso OTR Tyres, Eicher Spares" required style="border-radius: 8px;">
            </div>
          </div>

          <div class="form-field" style="margin-bottom: 1.25rem;">
            <label for="reg-message" style="font-weight: 700; color: #334155; font-size: 0.78rem;">Scope / Requirements Note</label>
            <div class="form-field-input-wrapper" style="align-items: flex-start;">
              <i class="fa-solid fa-comment" style="top: 0.95rem; color: var(--accent);"></i>
              <textarea id="reg-message" class="form-textarea" placeholder="Tell us about machinery model, required quantities or site delivery timeline..." style="border-radius: 8px;"></textarea>
            </div>
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.9rem; border-radius: 8px; font-weight: 800; font-size: 0.95rem; background: var(--accent); border-color: var(--accent); color: #FFFFFF; box-shadow: 0 8px 20px var(--border-accent);">
            Register Requirement & Connect <i class="fa-solid fa-arrow-right-long" style="margin-left: 0.4rem;"></i>
          </button>
        </form>
      </div>

    </div>
  </section>

  <!-- OUR PRODUCTS (Interactive Tabbed Section) -->
  <section class="products-section section-padding">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Product Portfolios</span>
        <h2 class="section-title">Our <span>Products</span></h2>
        <p class="section-subtitle">We partner with leading global engineering brands to supply fully certified systems, genuine components, and proactive service support.</p>
      </div>

      <!-- Tab Buttons with Company Brand Logos -->
      <div class="product-tabs-container">
        <button class="product-tab-btn active" data-tab="tab-hitachi" title="Tata Hitachi Heavy Construction Machinery">
          <img src="{{ $frontendImages }}/tata_hitachi_logo.png" alt="Tata Hitachi" class="tab-btn-brand-logo">
        </button>
        <button class="product-tab-btn" data-tab="tab-schwing" title="Schwing Stetter Concrete Systems">
          <img src="{{ $frontendImages }}/schwing_logo.jpg" alt="Schwing Stetter" class="tab-btn-brand-logo">
        </button>
        <button class="product-tab-btn" data-tab="tab-ascenso" title="Ascenso Industrial & OTR Tyres">
          <img src="{{ $frontendImages }}/ascenso_logo.jpg" alt="Ascenso Tyres" class="tab-btn-brand-logo">
        </button>
        <button class="product-tab-btn" data-tab="tab-eicher" title="VECV Eicher Commercial Vehicles">
          <img src="{{ $frontendImages }}/eicher_logo.png" alt="Eicher" class="tab-btn-brand-logo">
        </button>
      </div>

      <!-- Tab Content Area -->
      <div class="product-tab-content-wrapper">
        
        <!-- Tab Box 1: Tata Hitachi -->
        <div class="product-tab-box active" id="tab-hitachi">
          <div class="product-tab-grid">
            <div class="product-tab-image reveal">
              <div class="product-brand-badge">
                <img src="{{ $frontendImages }}/tata_hitachi_logo.png" alt="Tata Hitachi">
              </div>
              <img src="{{ $frontendImages }}/tata_hitachi_product.png" alt="Tata Hitachi Construction Excavators">
            </div>
            <div class="product-tab-info reveal">
              <h3 class="product-info-title">Tata Hitachi Construction Equipment</h3>
              <p class="product-info-text">
                A joint venture between Tata Motors Limited (40%) and Hitachi Construction Machinery Company Limited (60%), Tata Hitachi provides world-class construction equipment to address India’s infrastructure and mining needs.
              </p>
              <p class="product-info-text" style="font-size: 0.85rem; color: var(--text-muted);">
                Focused on developing global products to suit Indian working conditions, the product lineup includes a wide range of excavators (2T – 800T), Backhoe Loaders, Wheel Loaders, and Rigid Dump Trucks.
              </p>
              <a href="{{ route('services') }}#tata-hitachi" class="btn btn-primary">Our Machinery Range <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Tab Box 2: Schwing Stetter -->
        <div class="product-tab-box" id="tab-schwing">
          <div class="product-tab-grid">
            <div class="product-tab-image">
              <div class="product-brand-badge">
                <img src="{{ $frontendImages }}/schwing_logo.jpg" alt="Schwing Stetter">
              </div>
              <img src="{{ $frontendImages }}/schwing_product.png" alt="Schwing Stetter Transit Concrete Mixer">
            </div>
            <div class="product-tab-info">
              <h3 class="product-info-title">Schwing Stetter Concrete Systems</h3>
              <p class="product-info-text">
                As an authorized dealer for Schwing Stetter India, we supply high-performance concrete processing equipment including batching plants, transit mixers, concrete pumps, and wear-resistant components.
              </p>
              <p class="product-info-text" style="font-size: 0.85rem; color: var(--text-muted);">
                Engineered to deliver flawless concrete mixing, batching, and pumping outputs under tight project schedules across major highway and civil construction works.
              </p>
              <a href="{{ route('services') }}#schwing-stetter" class="btn btn-primary">Our Concrete Range <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Tab Box 3: Ascenso Tyres -->
        <div class="product-tab-box" id="tab-ascenso">
          <div class="product-tab-grid">
            <div class="product-tab-image">
              <div class="product-brand-badge">
                <img src="{{ $frontendImages }}/ascenso_logo.jpg" alt="Ascenso Tyres">
              </div>
              <img src="{{ $frontendImages }}/ascenso_product.jpg" alt="Ascenso OTR and Solid Tyres">
            </div>
            <div class="product-tab-info">
              <h3 class="product-info-title">Ascenso OTR & Solid Tyres</h3>
              <p class="product-info-text">
                State-wide distributor for Ascenso Tyres (Mahansaria Group), delivering specialized off-the-road (OTR), agricultural, forestry, and construction tires designed for high durability and performance.
              </p>
              <p class="product-info-text" style="font-size: 0.85rem; color: var(--text-muted);">
                Equipped with reinforced casing structures and cut-resistant compounds engineered to carry extreme payloads over highly abrasive and severe surface conditions.
              </p>
              <a href="{{ route('services') }}#ascenso" class="btn btn-primary">Our Tyres Range <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Tab Box 4: Eicher -->
        <div class="product-tab-box" id="tab-eicher">
          <div class="product-tab-grid">
            <div class="product-tab-image">
              <div class="product-brand-badge">
                <img src="{{ $frontendImages }}/eicher_logo.png" alt="Eicher">
              </div>
              <img src="{{ $frontendImages }}/eicher_product.png" alt="VECV Eicher Commercial Trucks">
            </div>
            <div class="product-tab-info">
              <h3 class="product-info-title">VECV Eicher Commercial Vehicles</h3>
              <p class="product-info-text">
                Authorized mobility partner and service workshop for VE Commercial Vehicles (Eicher), delivering medium and heavy-duty transport vehicles, tippers, and multi-axle cargo haulers.
              </p>
              <p class="product-info-text" style="font-size: 0.85rem; color: var(--text-muted);">
                Equipped with full engine diagnostics, routine vehicle fitness inspections, and an extensive warehouse of genuine components at our integrated Gwalior workshop.
              </p>
              <a href="{{ route('services') }}#eicher" class="btn btn-primary">Our Vehicles Range <i class="fa-solid fa-circle-arrow-right"></i></a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- WHY CHOOSE MARKSMEN GROUP (Updated with Icons) -->
  <section class="why-section section-padding">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Value Proposition</span>
        <h2 class="section-title">Why Choose Marksmen Group</h2>
        <p class="section-subtitle">Marksmen Group is built around a single principle: delivering measurable operational outcomes for customers.</p>
      </div>

      <div class="why-grid">
        <!-- 1 -->
        <div class="why-card reveal">
          <div class="why-icon-wrapper" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
            <i class="fa-solid fa-clock-rotate-left" style="font-size: 2.25rem; color: var(--accent);"></i>
            <span class="why-header-num">01</span>
          </div>
          <h3 class="why-title">Uptime-Driven Performance Model</h3>
          <p class="why-desc">We prioritize maximum equipment availability and minimal downtime, ensuring uninterrupted project execution and improved delivery timelines.</p>
        </div>
        <!-- 2 -->
        <div class="why-card reveal">
          <div class="why-icon-wrapper" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
            <i class="fa-solid fa-handshake" style="font-size: 2.25rem; color: var(--accent);"></i>
            <span class="why-header-num">02</span>
          </div>
          <h3 class="why-title">Strong OEM Ecosystem</h3>
          <p class="why-desc">Partnerships with leading global and national OEMs ensure reliable, high-performance equipment backed by genuine parts and certified service support.</p>
        </div>
        <!-- 3 -->
        <div class="why-card reveal">
          <div class="why-icon-wrapper" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
            <i class="fa-solid fa-screwdriver-wrench" style="font-size: 2.25rem; color: var(--accent);"></i>
            <span class="why-header-num">03</span>
          </div>
          <h3 class="why-title">Rapid Service Response Infrastructure</h3>
          <p class="why-desc">A strategically distributed service network enables faster diagnostics, reduced turnaround time, and improved on-site resolution efficiency.</p>
        </div>
        <!-- 4 -->
        <div class="why-card reveal">
          <div class="why-icon-wrapper" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
            <i class="fa-solid fa-scale-balanced" style="font-size: 2.25rem; color: var(--accent);"></i>
            <span class="why-header-num">04</span>
          </div>
          <h3 class="why-title">Optimized Total Cost of Ownership (TCO)</h3>
          <p class="why-desc">Our solutions are engineered to deliver lower fuel consumption, reduced maintenance expenditure, and extended equipment lifecycle value.</p>
        </div>
        <!-- 5 -->
        <div class="why-card reveal">
          <div class="why-icon-wrapper" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
            <i class="fa-solid fa-map-location-dot" style="font-size: 2.25rem; color: var(--accent);"></i>
            <span class="why-header-num">05</span>
          </div>
          <h3 class="why-title">Deep Regional Execution Expertise</h3>
          <p class="why-desc">With operations across 18 districts of Madhya Pradesh, we deliver field-proven, terrain-specific solutions aligned with real-world operating conditions.</p>
        </div>
        <!-- 6 -->
        <div class="why-card reveal">
          <div class="why-icon-wrapper" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
            <i class="fa-solid fa-bullseye" style="font-size: 2.25rem; color: var(--accent);"></i>
            <span class="why-header-num">06</span>
          </div>
          <h3 class="why-title">Customer Outcome Focus</h3>
          <p class="why-desc">Every engagement is designed to improve productivity, profitability, and project execution efficiency for our customers.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- PRIME CUSTOMERS -->
  <section class="prime-customers-section section-padding" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color);">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Key Clienteles</span>
        <h2 class="section-title">Our Prime <span>Customers</span></h2>
        <p class="section-subtitle">We partner with leading infrastructure organizations and government entities to deliver reliable heavy machinery and mobility solutions.</p>
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



  <!-- CLIENT TESTIMONIALS SECTION (Just Above Footer) -->
  <section class="testimonials-slider-section section-padding" style="background-color: var(--bg-white); border-top: 1px solid var(--border-color);">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Partnership Success</span>
        <h2 class="section-title">Client <span>Testimonials</span></h2>
        <p class="section-subtitle">Real feedback from infrastructure contractors, mining operators, and commercial partners across Central India.</p>
      </div>

      <div class="testimonial-cards-slider reveal">
        <!-- Navigation Arrows -->
        <button class="testimonial-nav-btn prev-btn" id="testimonial-prev-btn" aria-label="Previous Testimonial">
          <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button class="testimonial-nav-btn next-btn" id="testimonial-next-btn" aria-label="Next Testimonial">
          <i class="fa-solid fa-chevron-right"></i>
        </button>

        <div class="testimonial-cards-viewport">
          <div class="testimonial-cards-track">
            
            <!-- Card 1 -->
            <div class="testimonial-card-item active">
              <div class="t-card-image-holder">
                <img src="{{ $frontendImages }}/img9.jpeg" alt="Mr. Rohit Agarwal delivery handover">
              </div>
              <div class="t-card-body">
                <div class="testimonial-rating">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <p class="testimonial-text">
                  "Marksmen Group’s equipment uptime and rapid service response have enabled us to complete our road projects ahead of schedule. Their prompt attention to maintenance and spare parts supply is exceptional."
                </p>
                <div class="t-card-author">
                  <h4 class="author-name">Mr. Rohit Agarwal</h4>
                  <p class="author-sub">INFRASTRUCTURE PARTNER, BHOPAL</p>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="testimonial-card-item">
              <div class="t-card-image-holder">
                <img src="{{ $frontendImages }}/img3.jpeg" alt="Mr. Vikas Mittal key handover">
              </div>
              <div class="t-card-body">
                <div class="testimonial-rating">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <p class="testimonial-text">
                  "The strong OEM backing and genuine parts supplied by Marksmen Group lowered our total cost of ownership significantly. We highly recommend their machinery for high-output mining environments."
                </p>
                <div class="t-card-author">
                  <h4 class="author-name">Mr. Vikas Mittal</h4>
                  <p class="author-sub">MINING OPERATIONS, SAGAR</p>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="testimonial-card-item">
              <div class="t-card-image-holder">
                <img src="{{ $frontendImages }}/images2.jpeg" alt="Mr. Aslam Mansuri Eicher fleet delivery">
              </div>
              <div class="t-card-body">
                <div class="testimonial-rating">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <p class="testimonial-text">
                  "Their rapid service response infrastructure diagnostic network helped us minimize vehicle downtime during critical cargo shifts. Outstanding customer service and genuine spare parts support."
                </p>
                <div class="t-card-author">
                  <h4 class="author-name">Mr. Aslam Mansuri</h4>
                  <p class="author-sub">FLEET OPERATOR, BETUL</p>
                </div>
              </div>
            </div>

            <!-- Card 4 -->
            <div class="testimonial-card-item">
              <div class="t-card-image-holder">
                <img src="{{ $frontendImages }}/img7.jpeg" alt="Mr. Saurabh Dubey key delivery handover">
              </div>
              <div class="t-card-body">
                <div class="testimonial-rating">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <p class="testimonial-text">
                  "The Schwing Stetter concrete equipment procured through Marksmen Group delivered flawless operational reliability for our state highway flyover contracts. Top-tier engineering support!"
                </p>
                <div class="t-card-author">
                  <h4 class="author-name">Mr. Saurabh Dubey</h4>
                  <p class="author-sub">PROJECT DIRECTOR, GWALIOR</p>
                </div>
              </div>
            </div>

            <!-- Card 5 -->
            <div class="testimonial-card-item">
              <div class="t-card-image-holder">
                <img src="{{ $frontendImages }}/images1.jpeg" alt="Mr. Alok Mishra vehicle inspection handover">
              </div>
              <div class="t-card-body">
                <div class="testimonial-rating">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <p class="testimonial-text">
                  "Ascenso OTR tyres supplied by Marksmen gave our heavy tippers outstanding traction in abrasive quarry conditions. Timely logistics, solid durability, and great cost savings."
                </p>
                <div class="t-card-author">
                  <h4 class="author-name">Mr. Alok Mishra</h4>
                  <p class="author-sub">LOGISTICS HEAD, JABALPUR</p>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Dots Navigation -->
        <div class="testimonial-dots">
          <div class="testimonial-dot active" data-slide="0"></div>
          <div class="testimonial-dot" data-slide="1"></div>
          <div class="testimonial-dot" data-slide="2"></div>
        </div>
      </div>
    </div>
  </section>




@endsection

