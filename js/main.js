/**
 * Steel Villa LTD. - Main Interactive Script
 * Implements dynamic loops, filters, sliders, modals, and navigation
 */

document.addEventListener('DOMContentLoaded', () => {
  adjustHeroHeight();
  initMobileMenu();
  initStickyHeader();
  initHeroSlider();
  initFaqAccordion();
  initProjectFilters();
  initProductModal();
  initContactForm();
  initProjectLightbox();
});

window.addEventListener('resize', adjustHeroHeight);

/* -------------------------------------------------------------
 * 0. Dynamically Calculate & Adjust Hero Height (100vh - Header)
 * ----------------------------------------------------------- */
function adjustHeroHeight() {
  const topBar = document.querySelector('.top-bar');
  const siteHeader = document.querySelector('.site-header');
  const topBarHeight = topBar ? topBar.getBoundingClientRect().height : 0;
  const headerHeight = siteHeader ? siteHeader.getBoundingClientRect().height : 0;
  const total = Math.round(topBarHeight + headerHeight);

  if (total > 0) {
    document.documentElement.style.setProperty('--header-total-height', `${total}px`);
  }
}

/* -------------------------------------------------------------
 * 1. Mobile Navigation Menu Toggle
 * ----------------------------------------------------------- */
function initMobileMenu() {
  const toggleBtn = document.querySelector('.mobile-toggle');
  const navMenu = document.querySelector('.nav-menu');

  if (toggleBtn && navMenu) {
    toggleBtn.addEventListener('click', () => {
      navMenu.classList.toggle('open');
      const isOpen = navMenu.classList.contains('open');
      toggleBtn.setAttribute('aria-expanded', isOpen);
      toggleBtn.innerHTML = isOpen ? '<i class="fa-solid fa-xmark"></i>' : '<i class="fa-solid fa-bars"></i>';
    });
  }
}

/* -------------------------------------------------------------
 * 2. Sticky Header Shadow on Scroll
 * ----------------------------------------------------------- */
function initStickyHeader() {
  const header = document.querySelector('.site-header');
  if (!header) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });
}

/* -------------------------------------------------------------
 * 3. Hero Slider Carousel (5 CPT hero items)
 * ----------------------------------------------------------- */
function initHeroSlider() {
  const slides = document.querySelectorAll('.hero-slide');
  const prevBtn = document.querySelector('.slider-prev');
  const nextBtn = document.querySelector('.slider-next');
  const dotsContainer = document.querySelector('.slider-dots');

  if (slides.length === 0) return;

  let currentSlide = 0;
  let slideInterval = null;

  // Generate dots dynamically if container exists
  if (dotsContainer) {
    dotsContainer.innerHTML = '';
    slides.forEach((_, idx) => {
      const dot = document.createElement('div');
      dot.classList.add('slider-dot');
      if (idx === 0) dot.classList.add('active');
      dot.addEventListener('click', () => goToSlide(idx));
      dotsContainer.appendChild(dot);
    });
  }

  const dots = document.querySelectorAll('.slider-dot');

  function goToSlide(index) {
    slides[currentSlide].classList.remove('active');
    if (dots.length > currentSlide) dots[currentSlide].classList.remove('active');

    currentSlide = (index + slides.length) % slides.length;

    slides[currentSlide].classList.add('active');
    if (dots.length > currentSlide) dots[currentSlide].classList.add('active');

    resetAutoplay();
  }

  function nextSlide() {
    goToSlide(currentSlide + 1);
  }

  function prevSlide() {
    goToSlide(currentSlide - 1);
  }

  if (nextBtn) nextBtn.addEventListener('click', nextSlide);
  if (prevBtn) prevBtn.addEventListener('click', prevSlide);

  function startAutoplay() {
    slideInterval = setInterval(nextSlide, 5000);
  }

  function resetAutoplay() {
    clearInterval(slideInterval);
    startAutoplay();
  }

  startAutoplay();
}

/* -------------------------------------------------------------
 * 4. FAQ Accordion Toggle
 * ----------------------------------------------------------- */
function initFaqAccordion() {
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach(item => {
    const questionBtn = item.querySelector('.faq-question');
    if (!questionBtn) return;

    questionBtn.addEventListener('click', () => {
      const isActive = item.classList.contains('active');

      // Close other accordions
      faqItems.forEach(other => other.classList.remove('active'));

      if (!isActive) {
        item.classList.add('active');
      }
    });
  });
}

/* -------------------------------------------------------------
 * 5. Project Filters (Status & Category)
 * ----------------------------------------------------------- */
function initProjectFilters() {
  const filterTabs = document.querySelectorAll('.filter-tab');
  const projectCards = document.querySelectorAll('.project-card');

  if (filterTabs.length === 0 || projectCards.length === 0) return;

  filterTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      filterTabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      const filterValue = tab.getAttribute('data-filter');

      projectCards.forEach(card => {
        const cardStatus = card.getAttribute('data-status');
        const cardCategory = card.getAttribute('data-category');

        if (filterValue === 'all') {
          card.style.display = 'flex';
        } else if (filterValue === cardStatus || filterValue === cardCategory) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
}

/* -------------------------------------------------------------
 * 6. Product Specification Modal
 * ----------------------------------------------------------- */
const productSpecsData = {
  'flanges': {
    title: 'Flanges (Various Types)',
    types: 'Plate Flange, Slip-On Flange, Weld Neck Flange, Blind Flange, Socket Weld Flange, Lap Joint Flange, Thread Flange, Orifice Flange.',
    sealing: 'Flat Face (FF), Raised Face (RF), Ring-Type Joint (RTJ), RJ, FM, MFM, TG.',
    finish: 'Anti-Rust Oil, Yellow/Black Painting, Electrical Zinc Plated, Cold Galvanised, Hot Dipped Galvanised.',
    production: 'Forging, Casting, Cutting, Rolling.',
    standards: 'American (ANSI B16.5, ASME B16.47, MSS SP-44, AWWA C207), European (EN1092-1), British (BS4504, BS10), German (DIN2573, DIN2576), Russian (GOST 12820).'
  },
  'elbow': {
    title: 'Elbow Pipe Fitting',
    types: '45-Degree Elbow, 90-Degree Long Radius, 90-Degree Short Radius, 180-Degree Return Bends.',
    sealing: 'Butt-Weld, Socket-Weld, Threaded NPT/BSPT.',
    finish: 'Sandblasted, Anti-Corrosion Primer, Hot Dip Galvanized.',
    production: 'Seamless Mandrel Forming, Hot Pressing.',
    standards: 'ASME B16.9, DIN 2605, EN 10253, JIS B2311.'
  },
  'default': {
    title: 'Industrial Steel Product',
    types: 'Standard structural grade, custom lengths and thicknesses manufactured upon requisition.',
    sealing: 'Mill Standard / Protective Primer Coating.',
    finish: 'Hot Rolled, Cold Formed, Galvanized or Pre-painted.',
    production: 'EAF Steelmaking, Continuous Casting, Heavy Precision Rolling.',
    standards: 'ASTM A36, ASTM A572 Grade 50, EN 10025 S275/S355, JIS G3101 SS400.'
  }
};

function initProductModal() {
  const modalOverlay = document.querySelector('.modal-overlay');
  const closeBtn = document.querySelector('.modal-close');
  const specBtns = document.querySelectorAll('.btn-specs');

  if (!modalOverlay || specBtns.length === 0) return;

  specBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const productKey = btn.getAttribute('data-product') || 'default';
      const spec = productSpecsData[productKey] || productSpecsData['default'];

      const modalTitle = modalOverlay.querySelector('.modal-title');
      const modalTypes = modalOverlay.querySelector('.modal-types');
      const modalSealing = modalOverlay.querySelector('.modal-sealing');
      const modalFinish = modalOverlay.querySelector('.modal-finish');
      const modalProduction = modalOverlay.querySelector('.modal-production');
      const modalStandards = modalOverlay.querySelector('.modal-standards');

      if (modalTitle) modalTitle.textContent = spec.title;
      if (modalTypes) modalTypes.textContent = spec.types;
      if (modalSealing) modalSealing.textContent = spec.sealing;
      if (modalFinish) modalFinish.textContent = spec.finish;
      if (modalProduction) modalProduction.textContent = spec.production;
      if (modalStandards) modalStandards.textContent = spec.standards;

      modalOverlay.classList.add('active');
    });
  });

  if (closeBtn) {
    closeBtn.addEventListener('click', () => {
      modalOverlay.classList.remove('active');
    });
  }

  modalOverlay.addEventListener('click', (e) => {
    if (e.target === modalOverlay) {
      modalOverlay.classList.remove('active');
    }
  });
}

/* -------------------------------------------------------------
 * 7. Contact Form Handling
 * ----------------------------------------------------------- */
function initContactForm() {
  const contactForm = document.getElementById('steelvilla-contact-form');
  const formFeedback = document.getElementById('form-feedback');

  if (!contactForm) return;

  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const submitBtn = contactForm.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;

    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Sending Inquiry...';

    // Simulated Ajax send to info@steelvillabd.com
    setTimeout(() => {
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalText;
      contactForm.reset();

      if (formFeedback) {
        formFeedback.style.display = 'block';
        formFeedback.innerHTML = `
          <div style="background-color: #D1FAE5; color: #065F46; padding: 1rem 1.25rem; border-radius: 6px; margin-top: 1rem; border: 1px solid #A7F3D0;">
            <strong>Thank you!</strong> Your inquiry has been dispatched to <em>info@steelvillabd.com</em>. Our engineering team will review your project requirements and respond within 24 hours.
          </div>
        `;
      }
    }, 1200);
  });
}

/* -------------------------------------------------------------
 * 8. Project Interactive Lightbox Gallery
 * ----------------------------------------------------------- */
const defaultGalleryPool = [
  'https://images.unsplash.com/photo-1541888946425-d0fbb186f5f8?q=80&w=1200&auto=format&fit=crop',
  'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1200&auto=format&fit=crop',
  'https://images.unsplash.com/photo-1517581177682-a085bb7ffb15?q=80&w=1200&auto=format&fit=crop',
  'https://images.unsplash.com/photo-1581092160607-ee22621dd758?q=80&w=1200&auto=format&fit=crop',
  'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200&auto=format&fit=crop',
  'https://images.unsplash.com/photo-1531834685032-c34bf0d84c77?q=80&w=1200&auto=format&fit=crop',
  'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=1200&auto=format&fit=crop',
  'https://images.unsplash.com/photo-1578575437130-527eed3abbec?q=80&w=1200&auto=format&fit=crop'
];

function initProjectLightbox() {
  const projectCards = document.querySelectorAll('.project-card');
  if (projectCards.length === 0) return;

  // Minimal Lightbox DOM
  let modal = document.querySelector('.lightbox-modal');
  if (!modal) {
    modal = document.createElement('div');
    modal.className = 'lightbox-modal';
    modal.innerHTML = `
      <button class="lightbox-close" aria-label="Close">&times;</button>
      <div class="lightbox-box">
        <button class="lightbox-nav lightbox-prev" aria-label="Previous">&#10094;</button>
        <img class="lightbox-img" src="" alt="Project">
        <button class="lightbox-nav lightbox-next" aria-label="Next">&#10095;</button>
      </div>
      <div class="lightbox-counter">1/4</div>
    `;
    document.body.appendChild(modal);
  }

  const img = modal.querySelector('.lightbox-img');
  const counter = modal.querySelector('.lightbox-counter');
  const closeBtn = modal.querySelector('.lightbox-close');
  const prevBtn = modal.querySelector('.lightbox-prev');
  const nextBtn = modal.querySelector('.lightbox-next');

  let gallery = [];
  let index = 0;

  function show(i) {
    index = (i + gallery.length) % gallery.length;
    img.src = gallery[index];
    if (counter) counter.textContent = `${index + 1}/${gallery.length}`;
  }

  function open(pImages) {
    gallery = pImages;
    show(0);
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function close() {
    modal.classList.remove('active');
    document.body.style.overflow = '';
  }

  closeBtn.addEventListener('click', close);
  prevBtn.addEventListener('click', (e) => { e.stopPropagation(); show(index - 1); });
  nextBtn.addEventListener('click', (e) => { e.stopPropagation(); show(index + 1); });

  modal.addEventListener('click', (e) => {
    if (e.target === modal) close();
  });

  window.addEventListener('keydown', (e) => {
    if (!modal.classList.contains('active')) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowLeft') show(index - 1);
    if (e.key === 'ArrowRight') show(index + 1);
  });

  // Attach direct click to project cards without injecting extra icons or pills
  projectCards.forEach((card, i) => {
    const box = card.querySelector('.project-image-box');
    const mainImg = box ? box.querySelector('img') : null;
    if (!box || !mainImg) return;

    const images = [
      mainImg.src,
      defaultGalleryPool[(i * 2) % defaultGalleryPool.length],
      defaultGalleryPool[(i * 2 + 1) % defaultGalleryPool.length],
      defaultGalleryPool[(i * 2 + 3) % defaultGalleryPool.length]
    ];

    box.addEventListener('click', (e) => {
      e.preventDefault();
      open(images);
    });
  });
}
