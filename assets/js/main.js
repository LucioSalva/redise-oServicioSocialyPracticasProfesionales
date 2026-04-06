/* ============================================================
   SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES — Ecatepec
   Archivo: assets/js/main.js
   ============================================================ */

'use strict';

/* ============================================================
   1. NAVBAR INSTITUCIONAL (DESKTOP + MOBILE)
   ============================================================ */
function closeDesktopDropdowns(exceptItem) {
  const dropdownItems = document.querySelectorAll('.navbar-inst-menu .has-dropdown');
  dropdownItems.forEach(function (item) {
    if (exceptItem && item === exceptItem) return;
    item.classList.remove('is-open');
    const trigger = item.querySelector('.navbar-inst-dropdown-toggle');
    if (trigger) trigger.setAttribute('aria-expanded', 'false');
  });
}

function closeMobileNav() {
  const mobileNav = document.getElementById('navbarInstMobile');
  const toggler = document.querySelector('.navbar-inst-toggler');
  const mobileGroups = document.querySelectorAll('.has-mobile-submenu');
  const mobileToggles = document.querySelectorAll('.navbar-inst-mobile-toggle');

  if (mobileNav) {
    mobileNav.classList.remove('open');
    mobileNav.setAttribute('aria-hidden', 'true');
  }

  if (toggler) {
    toggler.setAttribute('aria-expanded', 'false');
    toggler.innerHTML = '&#9776;';
  }

  mobileGroups.forEach(function (group) {
    group.classList.remove('is-open');
  });

  mobileToggles.forEach(function (btn) {
    btn.setAttribute('aria-expanded', 'false');
  });
}

function toggleInstNav() {
  const mobileNav = document.getElementById('navbarInstMobile');
  const toggler = document.querySelector('.navbar-inst-toggler');
  if (!mobileNav) return;

  const isOpen = mobileNav.classList.toggle('open');
  mobileNav.setAttribute('aria-hidden', isOpen ? 'false' : 'true');

  if (toggler) {
    toggler.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    toggler.innerHTML = isOpen ? '&#10005;' : '&#9776;';
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const desktopDropdownItems = document.querySelectorAll('.navbar-inst-menu .has-dropdown');
  const mobileNav = document.getElementById('navbarInstMobile');
  const toggler = document.querySelector('.navbar-inst-toggler');
  const mobileToggles = document.querySelectorAll('.navbar-inst-mobile-toggle');

  desktopDropdownItems.forEach(function (item) {
    const trigger = item.querySelector('.navbar-inst-dropdown-toggle');
    if (!trigger) return;

    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      const willOpen = !item.classList.contains('is-open');
      closeDesktopDropdowns(item);

      if (willOpen) {
        item.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
      } else {
        item.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
      }
    });

    item.addEventListener('mouseenter', function () {
      if (!window.matchMedia('(hover: hover)').matches) return;
      closeDesktopDropdowns(item);
      item.classList.add('is-open');
      trigger.setAttribute('aria-expanded', 'true');
    });

    item.addEventListener('mouseleave', function () {
      if (!window.matchMedia('(hover: hover)').matches) return;
      item.classList.remove('is-open');
      trigger.setAttribute('aria-expanded', 'false');
    });
  });

  mobileToggles.forEach(function (button) {
    button.addEventListener('click', function () {
      const container = button.closest('.has-mobile-submenu');
      if (!container) return;

      const willOpen = !container.classList.contains('is-open');

      document.querySelectorAll('.has-mobile-submenu').forEach(function (group) {
        if (group !== container) group.classList.remove('is-open');
      });

      mobileToggles.forEach(function (toggle) {
        if (toggle !== button) toggle.setAttribute('aria-expanded', 'false');
      });

      container.classList.toggle('is-open', willOpen);
      button.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
    });
  });

  document.addEventListener('click', function (e) {
    const clickedInDesktopNav = e.target.closest('.navbar-inst-menu');
    const clickedDesktopToggle = e.target.closest('.navbar-inst-dropdown-toggle');

    if (!clickedInDesktopNav && !clickedDesktopToggle) {
      closeDesktopDropdowns();
    }

    if (mobileNav && toggler) {
      const clickedInMobileNav = mobileNav.contains(e.target);
      const clickedToggler = toggler.contains(e.target);
      if (!clickedInMobileNav && !clickedToggler) {
        closeMobileNav();
      }
    }
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      closeDesktopDropdowns();
      closeMobileNav();
    }
  });

  const mobileLinks = document.querySelectorAll('#navbarInstMobile a');
  mobileLinks.forEach(function (link) {
    link.addEventListener('click', function () {
      closeMobileNav();
    });
  });

  window.addEventListener('resize', function () {
    if (window.innerWidth > 991) {
      closeMobileNav();
    } else {
      closeDesktopDropdowns();
    }
  });
});

/* ============================================================
   2. TAB SWITCHER - inline style, sin dependencia de CSS cascade
   ============================================================ */
document.addEventListener('DOMContentLoaded', function () {
  var tabButtons = document.querySelectorAll('[data-bs-toggle="tab"]');
  if (!tabButtons.length) return;

  /* Ocultar todos los panes al inicio excepto el activo */
  tabButtons.forEach(function (btn) {
    var sel = btn.getAttribute('data-bs-target');
    if (!sel) return;
    var pane = document.querySelector(sel);
    if (!pane) return;
    if (btn.classList.contains('active')) {
      pane.style.display = 'block';
      pane.style.opacity  = '1';
    } else {
      pane.style.display = 'none';
      pane.style.opacity  = '0';
    }
  });

  /* Escuchar clicks */
  tabButtons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      /* Ocultar todos los panes y desactivar todos los botones */
      tabButtons.forEach(function (b) {
        var s = b.getAttribute('data-bs-target');
        if (s) {
          var p = document.querySelector(s);
          if (p) { p.style.display = 'none'; p.style.opacity = '0'; }
        }
        b.classList.remove('active');
        b.setAttribute('aria-selected', 'false');
      });

      /* Mostrar el pane objetivo y activar el botón */
      var targetSel  = btn.getAttribute('data-bs-target');
      var targetPane = document.querySelector(targetSel);
      if (targetPane) {
        targetPane.style.display = 'block';
        targetPane.style.opacity  = '1';
      }
      btn.classList.add('active');
      btn.setAttribute('aria-selected', 'true');
    });
  });
});

/* ============================================================
   3. SMOOTH SCROLL — anchor links within page
   ============================================================ */
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;

      const target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
});
