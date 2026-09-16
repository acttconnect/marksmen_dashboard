

@extends('frontend.layout.main')


@section('title', 'Gallery - Marksmen Group')
@php 
 $frontendImages = asset('frontend/assets/images');

 @endphp


@section('content')



  <!-- SUBPAGE HERO (Full-Bleed Angled Cut Banner) -->
  <section class="page-hero">
    <div class="container">
      <div class="page-hero-content reveal">
        <span class="page-hero-tag"><i class="fa-solid fa-camera-retro"></i> Project Visuals</span>
        <h1 class="page-hero-title">Media & Project <span>Gallery</span></h1>
        <p class="page-hero-desc">
          Explore live site operations, heavy mining equipment deployments, client machinery delivery handovers, and our modern workshop facilities across Madhya Pradesh.
        </p>
        <div class="page-hero-stats-row">
          <span class="hero-stat-pill"><i class="fa-solid fa-images"></i> 40+ Project Captures</span>
          <span class="hero-stat-pill"><i class="fa-solid fa-building-circle-check"></i> Workshop Hubs</span>
          <span class="hero-stat-pill"><i class="fa-solid fa-handshake"></i> Client Deliveries</span>
        </div>
      </div>
    </div>

    <!-- Right Side Full-Bleed Angled Media -->
    <div class="page-hero-media reveal">
      <img src="{{ $frontendImages }}/IMG24.jpeg" alt="Marksmen Mining Excavator Operation">
      <div class="page-hero-badge-overlay">
        <i class="fa-solid fa-photo-film"></i> Operational Field Media
      </div>
    </div>
  </section>

<!-- FILTERABLE GALLERY SECTION -->
<section class="section-padding" style="background-color: white;">
    <div class="container">

        <!-- Dynamic Category Filters -->
        <div class="gallery-filter-bar reveal">

            <!-- All Photos -->
            <button class="filter-btn active" data-filter="all">
                All Photos
            </button>

            <!-- Categories from Database -->
            @foreach($categories as $category)
                <button
                    class="filter-btn"
                    data-filter="{{ $category->slug }}"
                >
                    {{ $category->name }}
                </button>
            @endforeach

        </div>


        <!-- Dynamic Gallery -->
        <div class="gallery-grid">

            @forelse($data as $gallery)

                <div
                    class="gallery-item reveal"
                    data-category="{{ $gallery->category->slug ?? 'other' }}"
                >

                    <img
                        src="{{ asset('storage/' . $gallery->media_path) }}"
                        alt="{{ $gallery->title }}"
                    >

                    <div class="gallery-item-hover">

                        <div class="gallery-hover-icon">
                            <i class="fa-solid fa-expand"></i>
                        </div>

                        <h4>{{ $gallery->title }}</h4>

                        <p>{{ $gallery->description }}</p>

                    </div>

                </div>

            @empty

                <div class="text-center">
                    <p>No gallery images available.</p>
                </div>

            @endforelse

        </div>

    </div>
</section>

  <!-- LIGHTBOX POPUP -->
  <div class="lightbox" id="lightbox">
    <div class="lightbox-content">
      <div class="lightbox-close">&times;</div>
      <img src="" alt="Popup Image" class="lightbox-img">
      <div class="lightbox-caption"></div>
    </div>
  </div>


@endsection