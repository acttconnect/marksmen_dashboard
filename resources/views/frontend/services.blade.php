@extends('frontend.layout.main')

@section('title', 'Services - Marksmen Group')
@php 
 $frontendImages = asset('frontend/assets/images');

 @endphp


@section('content')

  <!-- SUBPAGE HERO (Full-Bleed Angled Cut Banner) -->
  <section class="page-hero">
    <div class="container">
      <div class="page-hero-content reveal">
        <span class="page-hero-tag"><i class="fa-solid fa-boxes-stacked"></i> Products & Machinery</span>
        <h1 class="page-hero-title">OEM Business <span>Portfolios</span></h1>
        <p class="page-hero-desc">
          Authorized Tier-1 distribution and service support for Tata Hitachi Excavators, VECV Eicher Commercial Trucks, Schwing Stetter Concrete Systems, and Ascenso OTR Tyres.
        </p>
        <div class="page-hero-stats-row">
          <span class="hero-stat-pill"><i class="fa-solid fa-truck-monster"></i> Heavy Machinery</span>
          <span class="hero-stat-pill"><i class="fa-solid fa-truck"></i> Commercial Mobility</span>
          <span class="hero-stat-pill"><i class="fa-solid fa-screwdriver-wrench"></i> 100% Genuine Spares</span>
        </div>
      </div>
    </div>

    <!-- Right Side Full-Bleed Angled Media -->
    <div class="page-hero-media reveal">
      <img src="{{ $frontendImages }}/services_hero_banner.png" alt="Eicher Commercial Trucks and Infrastructure Machinery">
      <div class="page-hero-badge-overlay">
        <i class="fa-solid fa-truck-moving"></i> Commercial Trucks & Fleet
      </div>
    </div>
  </section>

  <!-- BUSINESS PORTFOLIOS DETAIL SHOWCASE -->
  <section class="section-padding">
    <div class="container services-showcase-grid">

      <!-- V1: Tata Hitachi -->
      <div class="service-row reveal" id="tata-hitachi">
        <div class="service-media-col">
          <div class="service-img-wrapper">
            <img src="{{ $frontendImages }}/tata_hitachi_product.png" alt="Tata Hitachi Hydraulic Excavator">
          </div>
          <div class="service-partner-logo" style="padding: 0.8rem 1.6rem;">
            <img src="{{ $frontendImages }}/tata_hitachi_logo.png" alt="Tata Hitachi" style="height: 44px; width: auto; max-width: 190px; object-fit: contain; display: block;">
          </div>
        </div>
        <div class="service-info-col">
          <h2>Construction Equipment</h2>
          <div class="service-partner-name">Tata Hitachi Construction Machinery</div>
          <p class="service-description">
            Partnered with Tata Hitachi, we deliver a full range of high-efficiency hydraulic excavators, backhoe loaders, and wheel loaders. Configured for high output, low fuel consumption, and maximum durability across tough terrains.
          </p>
          <div class="spec-list">
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">18-District Coverage (Central MP)</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Genuine Spares & Filters Inventory</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">On-Site Technical Diagnostics</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Certified Engineer Diagnostics</span>
            </div>
          </div>
          <button class="btn btn-primary btn-enquire">Enquire Now</button>
        </div>
      </div>

      <!-- V2: Eicher -->
      <div class="service-row reverse reveal" id="eicher">
        <div class="service-media-col">
          <div class="service-img-wrapper">
            <img src="{{ $frontendImages }}/eicher_product.png" alt="VECV Eicher Commercial Cargo Truck">
          </div>
          <div class="service-partner-logo" style="padding: 0.8rem 1.6rem;">
            <img src="{{ $frontendImages }}/eicher_logo.png" alt="Eicher" style="height: 64px; width: auto; max-width: 180px; object-fit: contain; display: block;">
          </div>
        </div>
        <div class="service-info-col">
          <h2>Commercial Mobility Solutions</h2>
          <div class="service-partner-name">VE Commercial Vehicles (Eicher)</div>
          <p class="service-description">
            Authorized partner of VECV Eicher, supplying medium and heavy-duty transport vehicles, tippers, and multi-axle haulers. We manage dedicated sales, parts distribution, and full engine maintenance from our Gwalior mobility hub.
          </p>
          <div class="spec-list">
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Gwalior Service Hub & Workshop</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Medium & Heavy Duty Cargo Trucks</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Genuine Eicher Components</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Express Fleet Maintenance Checks</span>
            </div>
          </div>
          <button class="btn btn-primary btn-enquire">Enquire Now</button>
        </div>
      </div>

      <!-- V3: Schwing Stetter -->
      <div class="service-row reveal" id="schwing-stetter">
        <div class="service-media-col">
          <div class="service-img-wrapper">
            <img src="{{ $frontendImages }}/schwing_product.png" alt="Schwing Stetter Transit Concrete Mixer">
          </div>
          <div class="service-partner-logo" style="padding: 0.8rem 1.6rem;">
            <img src="{{ $frontendImages }}/schwing_logo.jpg" alt="Schwing Stetter" style="height: 64px; width: auto; max-width: 180px; object-fit: contain; display: block;">
          </div>
        </div>
        <div class="service-info-col">
          <h2>Concrete Processing Equipment</h2>
          <div class="service-partner-name">Schwing Stetter India</div>
          <p class="service-description">
            Providing high-grow concrete batching systems, mixers, concrete pumps, and wear-resistant machinery parts. Engineered to deliver flawless processing outputs for major infrastructure projects in Central India.
          </p>
          <div class="spec-list">
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Concrete Batching Plant Sales</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Sturdy Transit Concrete Mixers</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Schwing Stetter Wear-Resistant Parts</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">High-Efficiency Concrete Pumps</span>
            </div>
          </div>
          <button class="btn btn-primary btn-enquire">Enquire Now</button>
        </div>
      </div>

      <!-- V4: Ascenso -->
      <div class="service-row reverse reveal" id="ascenso">
        <div class="service-media-col">
          <div class="service-img-wrapper">
            <img src="{{ $frontendImages }}/ascenso_product.jpg" alt="Ascenso OTR and Off-Road Tyres">
          </div>
          <div class="service-partner-logo" style="padding: 0.8rem 1.6rem;">
            <img src="{{ $frontendImages }}/ascenso_logo.jpg" alt="Ascenso Tyres" style="height: 64px; width: auto; max-width: 180px; object-fit: contain; display: block;">
          </div>
        </div>
        <div class="service-info-col">
          <h2>OTR & Industrial Tyres</h2>
          <div class="service-partner-name">Ascenso Tyres (Mahansaria Group)</div>
          <p class="service-description">
            Pan-MP distributor for Ascenso Tyres, supplying specialized off-the-road (OTR), agricultural, forestry, and construction tires. Designed to withstand extreme payloads and highly abrasive terrain conditions.
          </p>
          <div class="spec-list">
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Pan-Madhya Pradesh Distribution</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Agricultural & Off-Road Tyres</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Industrial & Construction Tyres</span>
            </div>
            <div class="spec-item">
              <i class="fa-solid fa-circle-check spec-icon"></i>
              <span class="spec-text">Heavy Cargo & Earthmover Tyres</span>
            </div>
          </div>
          <button class="btn btn-primary btn-enquire">Enquire Now</button>
        </div>
      </div>

    </div>
  </section>



@endsection