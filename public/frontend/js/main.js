document.addEventListener('DOMContentLoaded', () => {
  // --- INJECT FONT AWESOME FOR ICONS ---
  const link = document.createElement('link');
  link.rel = 'stylesheet';
  link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css';
  document.head.appendChild(link);

  // --- STICKY HEADER ---
  const header = document.querySelector('header');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });

  // --- HERO CAROUSEL SLIDER ---
  const slides = document.querySelectorAll('.slide');
  const dots = document.querySelectorAll('.slider-dot');
  const prevBtn = document.querySelector('.slider-prev');
  const nextBtn = document.querySelector('.slider-next');
  let currentSlide = 0;
  let slideInterval;

  const showSlide = (index) => {
    if (slides.length === 0) return;
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));
    
    currentSlide = (index + slides.length) % slides.length;
    slides[currentSlide].classList.add('active');
    if (dots[currentSlide]) dots[currentSlide].classList.add('active');
  };

  const nextSlide = () => {
    showSlide(currentSlide + 1);
  };

  const prevSlide = () => {
    showSlide(currentSlide - 1);
  };

  const startSlideShow = () => {
    stopSlideShow();
    slideInterval = setInterval(nextSlide, 5000);
  };

  const stopSlideShow = () => {
    if (slideInterval) clearInterval(slideInterval);
  };

  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      nextSlide();
      startSlideShow();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      prevSlide();
      startSlideShow();
    });
  }

  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      showSlide(index);
      startSlideShow();
    });
  });

  if (slides.length > 0) {
    startSlideShow();
  }

  // --- CLIENT TESTIMONIALS SLIDER (3 Cards In A Row, 1-by-1 Slide Controller) ---
  const testimonialItems = document.querySelectorAll('.testimonial-card-item');
  const testimonialDots = document.querySelectorAll('.testimonial-dot');
  const testimonialTrack = document.querySelector('.testimonial-cards-track');
  const testimonialPrevBtn = document.querySelector('#testimonial-prev-btn');
  const testimonialNextBtn = document.querySelector('#testimonial-next-btn');
  const testimonialSlider = document.querySelector('.testimonial-cards-slider');
  
  let currentTestimonial = 0;
  let testimonialInterval = null;
  let touchStartX = 0;
  let touchEndX = 0;

  const getCardsPerView = () => {
    const w = window.innerWidth;
    if (w <= 768) return 1;
    if (w <= 1024) return 2;
    return 3;
  };

  const getMaxIndex = () => {
    const perView = getCardsPerView();
    return Math.max(0, testimonialItems.length - perView);
  };

  const updateTestimonialSlider = (index) => {
    if (!testimonialTrack || testimonialItems.length === 0) return;
    
    const maxIdx = getMaxIndex();
    if (index < 0) {
      currentTestimonial = maxIdx;
    } else if (index > maxIdx) {
      currentTestimonial = 0;
    } else {
      currentTestimonial = index;
    }

    const viewport = document.querySelector('.testimonial-cards-viewport');
    if (viewport && testimonialItems[0]) {
      const perView = getCardsPerView();
      const gap = 24;
      const totalGaps = (perView - 1) * gap;
      const cardWidth = (viewport.clientWidth - totalGaps) / perView;
      const step = cardWidth + gap;
      const offset = currentTestimonial * step;
      testimonialTrack.style.transform = `translateX(-${offset}px)`;
    }

    // Sync active classes
    testimonialItems.forEach((item, idx) => {
      item.classList.toggle('active', idx === currentTestimonial);
    });

    testimonialDots.forEach((dot, idx) => {
      dot.classList.toggle('active', idx === currentTestimonial);
    });
  };

  const nextTestimonial = () => {
    const maxIdx = getMaxIndex();
    if (currentTestimonial >= maxIdx) {
      updateTestimonialSlider(0);
    } else {
      updateTestimonialSlider(currentTestimonial + 1);
    }
  };

  const prevTestimonial = () => {
    const maxIdx = getMaxIndex();
    if (currentTestimonial <= 0) {
      updateTestimonialSlider(maxIdx);
    } else {
      updateTestimonialSlider(currentTestimonial - 1);
    }
  };

  const startTestimonialShow = () => {
    stopTestimonialShow();
    testimonialInterval = setInterval(nextTestimonial, 4500);
  };

  const stopTestimonialShow = () => {
    if (testimonialInterval) {
      clearInterval(testimonialInterval);
      testimonialInterval = null;
    }
  };

  // Nav Button Click Events
  if (testimonialNextBtn) {
    testimonialNextBtn.addEventListener('click', (e) => {
      e.preventDefault();
      nextTestimonial();
      startTestimonialShow();
    });
  }

  if (testimonialPrevBtn) {
    testimonialPrevBtn.addEventListener('click', (e) => {
      e.preventDefault();
      prevTestimonial();
      startTestimonialShow();
    });
  }

  // Dot Click Events
  testimonialDots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      updateTestimonialSlider(index);
      startTestimonialShow();
    });
  });

  // Touch Swipe for Mobile & Tablet
  if (testimonialSlider) {
    testimonialSlider.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
      stopTestimonialShow();
    }, { passive: true });

    testimonialSlider.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      const swipeDistance = touchStartX - touchEndX;
      if (Math.abs(swipeDistance) > 40) {
        if (swipeDistance > 0) {
          nextTestimonial();
        } else {
          prevTestimonial();
        }
      }
      startTestimonialShow();
    }, { passive: true });

    testimonialSlider.addEventListener('mouseenter', stopTestimonialShow);
    testimonialSlider.addEventListener('mouseleave', startTestimonialShow);
  }

  // Handle Resize
  window.addEventListener('resize', () => {
    updateTestimonialSlider(currentTestimonial);
  });

  // Init Slider on Load
  if (testimonialItems.length > 0) {
    setTimeout(() => {
      updateTestimonialSlider(0);
      startTestimonialShow();
    }, 100);
  }

  // --- MOBILE NAV TOGGLE ---
  const hamburger = document.querySelector('.hamburger');
  const mobileNav = document.querySelector('.mobile-nav');
  const overlay = document.querySelector('.overlay');
  const mobileNavClose = document.querySelector('.mobile-nav-close');

  const toggleMobileNav = () => {
    mobileNav.classList.toggle('active');
    overlay.classList.toggle('active');
  };

  if (hamburger) hamburger.addEventListener('click', toggleMobileNav);
  if (mobileNavClose) mobileNavClose.addEventListener('click', toggleMobileNav);
  if (overlay) overlay.addEventListener('click', toggleMobileNav);

  // Close mobile nav when clicking a link
  const mobileLinks = document.querySelectorAll('.mobile-link');
  mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
      mobileNav.classList.remove('active');
      overlay.classList.remove('active');
    });
  });

  // --- INQUIRY MODAL LOGIC ---
  const enquiryBtns = document.querySelectorAll('.btn-enquire, .floating-enquire');
  const modal = document.querySelector('.modal');
  const modalClose = document.querySelector('.modal-close');
  const modalBackdrop = document.querySelector('.modal-backdrop');

  const openModal = (e) => {
    if (e) e.preventDefault();
    if (modal) modal.classList.add('active');
  };

  const closeModal = () => {
    if (modal) modal.classList.remove('active');
  };

  enquiryBtns.forEach(btn => btn.addEventListener('click', openModal));
  if (modalClose) modalClose.addEventListener('click', closeModal);
  if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);

  // Escape key to close modal
  window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeModal();
      closeLightbox();
    }
  });

  // --- REVEAL ANIMATIONS (INTERSECTION OBSERVER) ---
  const reveals = document.querySelectorAll('.reveal');
  const revealCallback = (entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
        observer.unobserve(entry.target); // Animates only once
      }
    });
  };

  const revealObserver = new IntersectionObserver(revealCallback, {
    root: null,
    threshold: 0.15,
    rootMargin: '0px 0px -50px 0px'
  });

  reveals.forEach(reveal => revealObserver.observe(reveal));

  // --- INTERACTIVE TIMELINE (ABOUT PAGE) ---
  const timelineTabs = document.querySelectorAll('.timeline-tab');
  const timelinePanes = document.querySelectorAll('.timeline-pane');

  timelineTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      // Remove active class from all tabs
      timelineTabs.forEach(t => t.classList.remove('active'));
      // Add active to clicked tab
      tab.classList.add('active');

      const targetId = tab.getAttribute('data-year');

      // Hide all panes
      timelinePanes.forEach(pane => {
        pane.classList.remove('active');
      });

      // Show target pane
      const targetPane = document.getElementById(`milestone-${targetId}`);
      if (targetPane) {
        targetPane.classList.add('active');
      }
    });
  });

  // --- INTERACTIVE CORE VALUES (ABOUT PAGE) ---
  const valueBtns = document.querySelectorAll('.value-letter-btn');
  const valuePane = document.querySelector('.value-detail-pane');

  const valuesData = {
    'M': {
      title: 'Merit & Excellence',
      tag: 'M - Performance & Growth',
      desc: 'We hold a steadfast commitment to performance, building deep internal capabilities, and driving continuous improvement in every operation.'
    },
    'A': {
      title: 'Accountability',
      tag: 'A - Transparency & Ownership',
      desc: 'We stand behind our word. Complete ownership of our commitments with unmatched transparency, responsibility, and commercial honesty.'
    },
    'R': {
      title: 'Reliability',
      tag: 'R - Trusted Support',
      desc: 'Consistency is our cornerstone. We deliver solutions that perform under pressure, backed by a service ecosystem you can depend on 24/7.'
    },
    'K': {
      title: 'Knowledge & Innovation',
      tag: 'K - Future-Ready Thinking',
      desc: 'We drive progress through learning, utilizing advanced diagnostics, and embracing future-ready thinking to optimize heavy equipment productivity.'
    },
    'S': {
      title: 'Service First',
      tag: 'S - Customer-Centric Decisions',
      desc: 'Our customer success lies at the heart of our operations. Every decision we make is aimed at maximizing your project uptime and profitability.'
    },
    'M2': {
      title: 'Mutual Growth',
      tag: 'M - Collaborative Value Creation',
      desc: 'Creating long-term collaborative value for our customers, OEM partners, staff, and institutional stakeholders.'
    },
    'E': {
      title: 'Ethics & Integrity',
      tag: 'E - Governance & Honesty',
      desc: 'Upholding the highest moral and ethical benchmarks. Trustworthy business practices that foster long-term industry credibility.'
    },
    'N': {
      title: 'Nation Building',
      tag: 'N - Economic Development',
      desc: 'Contributing directly to India’s infrastructure progress by delivering essential mobility and construction systems that construct the future.'
    }
  };

  valueBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      valueBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const letterKey = btn.getAttribute('data-value');
      const data = valuesData[letterKey];

      if (data && valuePane) {
        valuePane.style.opacity = 0;
        setTimeout(() => {
          valuePane.querySelector('h3').textContent = data.title;
          valuePane.querySelector('h4').textContent = data.tag;
          valuePane.querySelector('p').textContent = data.desc;
          valuePane.style.opacity = 1;
        }, 200);
      }
    });
  });

  // --- GALLERY FILTER LOGIC ---
  const filterBtns = document.querySelectorAll('.filter-btn');
  const galleryItems = document.querySelectorAll('.gallery-item');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      // Toggle active class
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filterVal = btn.getAttribute('data-filter');

      galleryItems.forEach(item => {
        const itemCat = item.getAttribute('data-category');
        if (filterVal === 'all' || itemCat === filterVal) {
          item.style.display = 'block';
          setTimeout(() => {
            item.style.opacity = 1;
            item.style.transform = 'scale(1)';
          }, 50);
        } else {
          item.style.opacity = 0;
          item.style.transform = 'scale(0.8)';
          setTimeout(() => {
            item.style.display = 'none';
          }, 300);
        }
      });
    });
  });

  // --- LIGHTBOX GALLERY POPUP ---
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.querySelector('.lightbox-img');
  const lightboxCaption = document.querySelector('.lightbox-caption');
  const lightboxClose = document.querySelector('.lightbox-close');

  const openLightbox = (imgSrc, captionText) => {
    if (lightboxImg && lightbox) {
      lightboxImg.src = imgSrc;
      if (lightboxCaption) lightboxCaption.textContent = captionText;
      lightbox.classList.add('active');
    }
  };

  const closeLightbox = () => {
    if (lightbox) lightbox.classList.remove('active');
  };

  galleryItems.forEach(item => {
    item.addEventListener('click', () => {
      const img = item.querySelector('img');
      const caption = item.querySelector('h4').textContent;
      if (img) openLightbox(img.src, caption);
    });
  });

  if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
  if (lightbox) {
    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox || e.target.classList.contains('lightbox-content')) {
        closeLightbox();
      }
    });
  }

  // --- CAREER RESUME UPLOAD HANDLER ---
  const resumeInput = document.getElementById('car-resume');
  const resumeDropzone = document.getElementById('resume-dropzone');
  // --- CAREER PAGE RESUME DROPZONE HANDLER ---
  const setupDropzone = (inputId, dropzoneId, badgeId, textId, removeBtnId) => {
    const rInput = document.getElementById(inputId);
    const rDropzone = document.getElementById(dropzoneId);
    const rBadge = document.getElementById(badgeId);
    const rText = document.getElementById(textId);
    const rRemove = document.getElementById(removeBtnId);

    if (rInput && rBadge && rText) {
      const handleFile = (file) => {
        if (file) {
          rText.textContent = `${file.name} (${(file.size / 1024).toFixed(1)} KB)`;
          rBadge.classList.add('active');
        }
      };

      rInput.addEventListener('change', (e) => {
        if (e.target.files && e.target.files[0]) {
          handleFile(e.target.files[0]);
        }
      });

      if (rDropzone) {
        ['dragenter', 'dragover'].forEach(ev => {
          rDropzone.addEventListener(ev, (e) => {
            e.preventDefault();
            rDropzone.classList.add('dragover');
          });
        });
        ['dragleave', 'drop'].forEach(ev => {
          rDropzone.addEventListener(ev, (e) => {
            e.preventDefault();
            rDropzone.classList.remove('dragover');
          });
        });
        rDropzone.addEventListener('drop', (e) => {
          if (e.dataTransfer.files && e.dataTransfer.files[0]) {
            rInput.files = e.dataTransfer.files;
            handleFile(e.dataTransfer.files[0]);
          }
        });
      }

      if (rRemove) {
        rRemove.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();
          rInput.value = '';
          rBadge.classList.remove('active');
        });
      }
    }
  };

  setupDropzone('car-resume', 'resume-dropzone', 'file-badge', 'file-name-text', 'file-remove-btn');
  setupDropzone('modal-car-resume', 'modal-resume-dropzone', 'modal-file-badge', 'modal-file-name-text', 'modal-file-remove-btn');

  // --- JOB CARD APPLY NOW BUTTON & MODAL CONTROLLER ---
  const jobApplyModal = document.getElementById('job-apply-modal');
  const jobApplyCloseBtn = document.getElementById('job-modal-close');
  const jobApplyButtons = document.querySelectorAll('.btn-apply-job');
  const jobModalPositionInput = document.getElementById('modal-car-position');
  const jobModalRoleBadge = document.getElementById('modal-role-badge');

  if (jobApplyButtons.length > 0 && jobApplyModal) {
    jobApplyButtons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const role = btn.getAttribute('data-job-title') || 'General Application';
        if (jobModalPositionInput) {
          jobModalPositionInput.value = role;
        }
        if (jobModalRoleBadge) {
          jobModalRoleBadge.textContent = role;
        }
        jobApplyModal.classList.add('active');
        document.body.style.overflow = 'hidden';
      });
    });

    const closeJobModal = () => {
      jobApplyModal.classList.remove('active');
      document.body.style.overflow = '';
    };

    if (jobApplyCloseBtn) {
      jobApplyCloseBtn.addEventListener('click', closeJobModal);
    }

    jobApplyModal.addEventListener('click', (e) => {
      if (e.target === jobApplyModal) {
        closeJobModal();
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && jobApplyModal.classList.contains('active')) {
        closeJobModal();
      }
    });
  }

  

  // --- HOMEPAGE PRODUCT TABS ---
  const productTabs = document.querySelectorAll('.product-tab-btn');
  const productBoxes = document.querySelectorAll('.product-tab-box');

  productTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      // Deactivate all tabs
      productTabs.forEach(t => t.classList.remove('active'));
      // Activate clicked tab
      tab.classList.add('active');

      const targetId = tab.getAttribute('data-tab');

      // Hide all content boxes
      productBoxes.forEach(box => {
        box.classList.remove('active');
      });

      // Show target content box
      const targetBox = document.getElementById(targetId);
      if (targetBox) {
        targetBox.classList.add('active');
      }
    });
  });

  // --- HOMEPAGE YOUTUBE VIDEO DIRECT PLAY HANDLER ---
  const playBtns = document.querySelectorAll('.video-play-btn');
  const videoModal = document.getElementById('testimonial-video-modal');
  const videoIframe = document.getElementById('video-iframe');
  const videoCloseBtn = document.querySelector('.video-modal-close');
  const videoBackdrop = document.querySelector('.video-modal-backdrop');

  const openVideo = (videoId) => {
    if (videoIframe && videoModal) {
      videoIframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
      videoModal.classList.add('active');
    }
  };

  const closeVideo = () => {
    if (videoModal && videoIframe) {
      videoModal.classList.remove('active');
      videoIframe.src = ''; // Stops playback
    }
  };

  playBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      // If already playing an iframe, do nothing
      if (btn.querySelector('iframe')) return;

      const videoId = btn.getAttribute('data-video-id');
      if (!videoId) return;

      // Direct 1-Click Inline YouTube Player Embed
      const iframe = document.createElement('iframe');
      iframe.setAttribute('src', `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`);
      iframe.setAttribute('title', 'YouTube video player');
      iframe.setAttribute('frameborder', '0');
      iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
      iframe.setAttribute('allowfullscreen', 'true');
      iframe.style.width = '100%';
      iframe.style.height = '100%';
      iframe.style.border = 'none';

      btn.innerHTML = '';
      btn.appendChild(iframe);
    });
  });

  if (videoCloseBtn) videoCloseBtn.addEventListener('click', closeVideo);
  if (videoBackdrop) videoBackdrop.addEventListener('click', closeVideo);
});
