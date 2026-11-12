/**
 * 8RP Official - Client Interactivity
 */

document.addEventListener('DOMContentLoaded', function () {
  // 1. Mobile Drawer Navigation
  const menuBtn = document.getElementById('menuBtn');
  const drawer = document.getElementById('mobileDrawer');
  const overlay = document.getElementById('drawerOverlay');
  const drawerClose = document.getElementById('drawerClose');

  function openDrawer() {
    if (drawer) drawer.classList.add('active');
    if (overlay) overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeDrawer() {
    if (drawer) drawer.classList.remove('active');
    if (overlay) overlay.classList.remove('active');
    document.body.style.overflow = '';
  }

  if (menuBtn) menuBtn.addEventListener('click', openDrawer);
  if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
  if (overlay) overlay.addEventListener('click', closeDrawer);

  // Close drawer when pressing Escape
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      closeDrawer();
      closeModal();
    }
  });

  // 2. Interactive FAQ Accordion
  const faqHeaders = document.querySelectorAll('.t35-faq-header');
  faqHeaders.forEach(function (header) {
    header.addEventListener('click', function () {
      const item = header.closest('.t35-faq-item');
      if (item) {
        const isOpen = item.classList.contains('open');
        // Close siblings if desired or allow multi-expand
        item.classList.toggle('open', !isOpen);
      }
    });
  });

  // 3. Official Links Modal (Optional pop-up helper)
  const modalOverlay = document.getElementById('actionModal');
  const modalClose = document.getElementById('modalClose');

  // Bottom Promo Close Button
  const promoCloseBtn = document.getElementById('promoCloseBtn');
  const bottomPromoBar = document.getElementById('bottomPromoBar');
  if (promoCloseBtn && bottomPromoBar) {
    promoCloseBtn.addEventListener('click', function () {
      bottomPromoBar.classList.add('is-hidden');
      document.body.style.paddingBottom = '0px';
    });
  }

  window.openActionModal = function () {
    if (modalOverlay) modalOverlay.classList.add('active');
  };

  window.closeModal = function () {
    if (modalOverlay) modalOverlay.classList.remove('active');
  };

  if (modalClose) modalClose.addEventListener('click', closeModal);
  if (modalOverlay) {
    modalOverlay.addEventListener('click', function (e) {
      if (e.target === modalOverlay) closeModal();
    });
  }

  // 4. Smooth Anchor Scroll
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      if (targetId && targetId !== '#') {
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          e.preventDefault();
          targetElement.scrollIntoView({ behavior: 'smooth' });
          closeDrawer();
        }
      }
    });
  });
});


// Links tạm tắt: link chuyển đổi có href="#" thì click không làm gì (không mở tab mới)
document.addEventListener('click', function (e) {
  var a = e.target.closest ? e.target.closest('a[href="#"]') : null;
  if (a) e.preventDefault();
}, true);
