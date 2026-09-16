@extends('frontend.layout.main')

@section('title', 'About Us - Marksmen Group')
@php 
 $frontendImages = asset('frontend/assets/images');

 @endphp


@section('content')








  <!-- SUBPAGE HERO (Full-Bleed Angled Cut Banner) -->
  <section class="page-hero">
    <div class="container">
      <div class="page-hero-content reveal">
        <span class="page-hero-tag"><i class="fa-solid fa-building"></i> About Marksmen Group</span>
        <h1 class="page-hero-title">Pioneering <span>Infrastructure Solutions</span></h1>
        <p class="page-hero-desc">
          Over two decades of engineering excellence, authorized Tier-1 OEM dealerships, and dedicated service infrastructure powering Central India.
        </p>
        <div class="page-hero-stats-row">
          <span class="hero-stat-pill"><i class="fa-solid fa-calendar-check"></i> 23+ Years Legacy</span>
          <span class="hero-stat-pill"><i class="fa-solid fa-map-location-dot"></i> 18+ MP Districts</span>
          <span class="hero-stat-pill"><i class="fa-solid fa-certificate"></i> OEM Tier-1 Dealer</span>
        </div>
      </div>
    </div>

    <!-- Right Side Full-Bleed Angled Media -->
    <div class="page-hero-media reveal">
      <img src="{{ $frontendImages }}/about_hero_banner.jpg" alt="Tata Hitachi Infrastructure Excavator">
      <div class="page-hero-badge-overlay">
        <i class="fa-solid fa-truck-monster"></i> Heavy Machinery Fleet
      </div>
    </div>
  </section>

  <!-- 1. CORPORATE PROFILE & OVERVIEW -->
  <section class="section-padding" style="background-color: var(--bg-white);">
    <div class="container">
      <div class="about-overview-grid">
        
        <!-- Left: Content & Value Chips -->
        <div class="about-overview-content reveal">
          <span class="section-tag">Corporate Profile</span>
          <h2 class="section-title">Built on Trust. Driven by <span>Operational Scale</span>.</h2>
          <p class="lead-text">
            Headquartered in Bhopal, Madhya Pradesh, Marksmen Group is a rapidly expanding, professionally governed infrastructure solutions enterprise powering Central India’s fastest-growing construction and mobility sectors.
          </p>
          <p class="body-text">
            Operating across construction machinery, commercial mobility, concrete batching equipment, and industrial off-the-road (OTR) tyres, Marksmen delivers integrated, end-to-end solutions. Backed by exclusive OEM partnerships with <strong>Tata Hitachi, VE Commercial Vehicles (Eicher), Schwing Stetter, and Ascenso Tyres</strong>, we ensure unmatched reliability, genuine spare parts availability, and maximum project uptime.
          </p>

          <!-- 4 Core Capabilities Chips -->
          <div class="about-value-chips-grid">
            <div class="about-value-chip">
              <i class="fa-solid fa-circle-check"></i>
              <span>Authorized OEM Tier-1 Dealer</span>
            </div>
            <div class="about-value-chip">
              <i class="fa-solid fa-circle-check"></i>
              <span>18+ MP Districts Coverage</span>
            </div>
            <div class="about-value-chip">
              <i class="fa-solid fa-circle-check"></i>
              <span>Advanced Diagnostic Hubs</span>
            </div>
            <div class="about-value-chip">
              <i class="fa-solid fa-circle-check"></i>
              <span>Express Spares Warehousing</span>
            </div>
          </div>

          <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
            <a href="services.html" class="btn btn-primary">Our Product Verticals <i class="fa-solid fa-arrow-right"></i></a>
            <a href="contact.html" class="btn btn-secondary">Contact Our Offices</a>
          </div>
        </div>

        <!-- Right: Team Photo Stack & Floating Chairman Quote -->
        <div class="about-profile-media-stack reveal">
          <div class="about-main-img-box">
            <img src="{{ $frontendImages }}/img35.jpeg" alt="Marksmen Corporate Team at Bhopal Headquarters">
          </div>
          <div class="about-floating-quote-card">
            <p>"Our corporate values govern how we conduct business, support our customers, and contribute to the build-out of our nation's critical infrastructure."</p>
            <div class="about-floating-quote-author">
              <h5>Mr. Ved Prakash Grover</h5>
              <span>Founder & Chairman</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- 2. STRATEGIC PILLARS / OPERATIONAL STRENGTHS -->
  <section class="section-padding" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color);">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Our Strengths</span>
        <h2 class="section-title">Engineered for <span>Scale & Reliability</span></h2>
        <p class="section-subtitle">Four foundational pillars that establish Marksmen as Central India's premier infrastructure solutions partner.</p>
      </div>

      <div class="strategic-pillars-grid">
        <!-- Pillar 1 -->
        <div class="pillar-card reveal">
          <div class="pillar-icon-box"><i class="fa-solid fa-handshake-simple"></i></div>
          <h4>Tier-1 OEM Alignments</h4>
          <p>Direct authorized partnerships with global heavy equipment leaders including Tata Hitachi, VECV Eicher, Schwing Stetter, and Ascenso Tyres.</p>
        </div>

        <!-- Pillar 2 -->
        <div class="pillar-card reveal">
          <div class="pillar-icon-box"><i class="fa-solid fa-network-wired"></i></div>
          <h4>Statewide Network</h4>
          <p>Robust operational presence spanning 18+ districts of Madhya Pradesh with centralized parts hubs in Bhopal, Gwalior, Sagar, and Betul.</p>
        </div>

        <!-- Pillar 3 -->
        <div class="pillar-card reveal">
          <div class="pillar-icon-box"><i class="fa-solid fa-gears"></i></div>
          <h4>Diagnostic Workshops</h4>
          <p>State-of-the-art repair facilities equipped with automated diagnostic scanners, hydraulic calibration test benches, and trained OEM master technicians.</p>
        </div>

        <!-- Pillar 4 -->
        <div class="pillar-card reveal">
          <div class="pillar-icon-box"><i class="fa-solid fa-truck-fast"></i></div>
          <h4>24/7 Field Engineering</h4>
          <p>Dedicated mobile technical response vans providing rapid on-site troubleshooting, breakdown repairs, and scheduled machine maintenance.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 3. VISION, MISSION & COMMITMENTS -->
  <section class="section-padding" style="background-color: var(--bg-white); border-top: 1px solid var(--border-color);">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Purpose & Direction</span>
        <h2 class="section-title">Guiding Principles of <span>Marksmen</span></h2>
        <p class="section-subtitle">Our shared vision and clear mission define every operational decision and client partnership.</p>
      </div>

      <div class="vision-mission-3col-grid">
        <!-- Vision -->
        <div class="vm-card-premium reveal">
          <div class="vm-card-icon"><i class="fa-solid fa-compass"></i></div>
          <h3>Our Vision</h3>
          <p>To be Central India’s most trusted and scalable infrastructure solutions group, setting industry-defining benchmarks in machine uptime, customer satisfaction, and ethical governance.</p>
        </div>

        <!-- Mission -->
        <div class="vm-card-premium reveal">
          <div class="vm-card-icon"><i class="fa-solid fa-rocket"></i></div>
          <h3>Our Mission</h3>
          <p>To empower India’s infrastructure expansion by delivering world-class OEM machinery, genuine spares, and expert field service through relentless customer commitment and execution excellence.</p>
        </div>

        <!-- Commitments -->
        <div class="vm-card-premium reveal">
          <div class="vm-card-icon"><i class="fa-solid fa-shield-halved"></i></div>
          <h3>Group Commitments</h3>
          <p>Zero compromise on site safety, strict adherence to OEM engineering standards, transparent commercial practices, and rapid responsiveness to every client requirement.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. THE MARKSMEN VALUES (8 Values Acronym Grid) -->
  <section class="section-padding" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color);">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Our DNA</span>
        <h2 class="section-title">The <span>MARKSMEN</span> Values</h2>
        <p class="section-subtitle">Every letter in our name embodies an uncompromising standard of corporate conduct and performance.</p>
      </div>

      <div class="marksmen-values-8grid">
        <!-- M -->
        <div class="value-letter-card reveal">
          <div class="value-letter-badge">M</div>
          <h4>Merit & Excellence</h4>
          <p>Driving continuous capability building and high performance across all business units.</p>
        </div>

        <!-- A -->
        <div class="value-letter-card reveal">
          <div class="value-letter-badge">A</div>
          <h4>Accountability</h4>
          <p>Taking complete ownership of client SLAs, machine uptime, and service commitments.</p>
        </div>

        <!-- R -->
        <div class="value-letter-card reveal">
          <div class="value-letter-badge">R</div>
          <h4>Reliability</h4>
          <p>Delivering consistent OEM-certified quality in every machine, part, and field interaction.</p>
        </div>

        <!-- K -->
        <div class="value-letter-card reveal">
          <div class="value-letter-badge">K</div>
          <h4>Knowledge</h4>
          <p>Empowering our workforce through advanced technical training and industry insights.</p>
        </div>

        <!-- S -->
        <div class="value-letter-card reveal">
          <div class="value-letter-badge">S</div>
          <h4>Safety Standards</h4>
          <p>Enforcing rigorous safety protocols in workshops and live project environments.</p>
        </div>

        <!-- M -->
        <div class="value-letter-card reveal">
          <div class="value-letter-badge">M</div>
          <h4>Mutual Trust</h4>
          <p>Fostering long-term, transparent relationships with clients, employees, and OEM partners.</p>
        </div>

        <!-- E -->
        <div class="value-letter-card reveal">
          <div class="value-letter-badge">E</div>
          <h4>Execution Speed</h4>
          <p>Ensuring rapid logistics, on-time machinery deliveries, and prompt field assistance.</p>
        </div>

        <!-- N -->
        <div class="value-letter-card reveal">
          <div class="value-letter-badge">N</div>
          <h4>Nation Building</h4>
          <p>Proudly supporting the roads, mines, bridges, and infrastructure that power modern India.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 5. STRATEGIC MILESTONES (Horizontal Interactive Grid) -->
  <section class="section-padding" style="background-color: var(--bg-white); border-top: 1px solid var(--border-color);">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">History & Growth</span>
        <h2 class="section-title">Strategic <span>Milestones</span></h2>
        <p class="section-subtitle">A journey marked by purposeful OEM alignments, service scaling, and regional footprint expansion.</p>
      </div>

      <div class="about-milestones-grid">
        <!-- 2017 -->
        <div class="about-milestone-card reveal">
          <span class="about-milestone-year-tag">2017</span>
          <h4>Commercial Mobility Inception</h4>
          <span class="about-milestone-partner">Daimler Commercial Vehicles</span>
          <p>First major entry into commercial vehicle transport solutions in Central Madhya Pradesh, building foundational fleet capabilities.</p>
        </div>

        <!-- 2022 -->
        <div class="about-milestone-card reveal">
          <span class="about-milestone-year-tag">2022</span>
          <h4>VECV Eicher Partnership</h4>
          <span class="about-milestone-partner">VE Commercial Vehicles</span>
          <p>Strategic transition to VE Commercial Vehicles (Eicher), establishing a dominant commercial hub in Gwalior and Northern MP.</p>
        </div>

        <!-- 2023 -->
        <div class="about-milestone-card reveal">
          <span class="about-milestone-year-tag">2023</span>
          <h4>Heavy Equipment Dealership</h4>
          <span class="about-milestone-partner">Tata Hitachi Construction</span>
          <p>Appointed authorized dealer for Tata Hitachi mining excavators, establishing deep operations across 18 Central MP districts.</p>
        </div>

        <!-- 2025 -->
        <div class="about-milestone-card reveal">
          <span class="about-milestone-year-tag">2025</span>
          <h4>Concrete & OTR Tyres Expansion</h4>
          <span class="about-milestone-partner">Schwing Stetter & Ascenso</span>
          <p>Decisive expansion into concrete machinery (Schwing Stetter) and statewide authorized distributorship for Ascenso OTR tyres.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. FOUNDING & EXECUTIVE LEADERSHIP -->
  <section class="section-padding" style="background-color: var(--bg-light); border-top: 1px solid var(--border-color);">
    <div class="container">
      <div class="section-header text-center">
        <span class="section-tag">Leadership</span>
        <h2 class="section-title">Founding & Executive <span>Leadership</span></h2>
        <p class="section-subtitle">Governed by decades of industry experience, driven by modernization, and geared for long-term growth.</p>
      </div>

      <div class="executive-leadership-grid">
        <!-- Mr. Ved Prakash Grover -->
        <div class="leader-card-premium reveal">
          <div class="leader-card-header">
            <div class="leader-avatar-icon"><i class="fa-solid fa-user-tie"></i></div>
            <div class="leader-header-details">
              <h3>Mr. Ved Prakash Grover</h3>
              <span class="leader-role-badge">Founder & Chairman</span>
            </div>
            <span class="leader-exp-ribbon">40+ Years Domain Mastery</span>
          </div>
          <div class="leader-card-body">
            <p>
              A distinguished industry veteran with over four decades of profound experience across infrastructure, machinery distribution, and ethical governance. His visionary foresight and focus on credibility have cemented Marksmen Group as a benchmark for customer trust across Central India.
            </p>
            <div class="leader-quote-strip">
              "Integrity and long-term relationships remain the true foundation of our enterprise."
            </div>
          </div>
        </div>

        <!-- Mr. Karan Grover -->
        <div class="leader-card-premium reveal">
          <div class="leader-card-header">
            <div class="leader-avatar-icon"><i class="fa-solid fa-user-gear"></i></div>
            <div class="leader-header-details">
              <h3>Mr. Karan Grover</h3>
              <span class="leader-role-badge">Managing Director</span>
            </div>
            <span class="leader-exp-ribbon">15+ Years Expansion Leadership</span>
          </div>
          <div class="leader-card-body">
            <p>
              Bringing dynamic strategic leadership, Mr. Karan Grover has spearheaded the Group’s modernization, tier-1 OEM alliances (Tata Hitachi, VECV, Schwing Stetter, Ascenso), and statewide workshop expansion, establishing a performance-oriented operational model.
            </p>
            <div class="leader-quote-strip">
              "We are building a scalable, technology-backed platform ready for India's infrastructure future."
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>








 
@endsection
