/* ============================================================
   SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES — Ecatepec
   Archivo: assets/js/main.js
   ============================================================ */

'use strict';

/* ============================================================
   1. TOGGLE NAVBAR HAMBURGER (MOBILE)
   ============================================================ */
function toggleInstNav() {
  const mobileNav = document.getElementById('navbarInstMobile');
  if (!mobileNav) return;
  mobileNav.classList.toggle('open');

  // Update aria-expanded on toggler button
  const toggler = document.querySelector('.navbar-inst-toggler');
  if (toggler) {
    const isOpen = mobileNav.classList.contains('open');
    toggler.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    toggler.textContent = isOpen ? '✕' : '☰';
  }
}

/* Close mobile nav when clicking outside */
document.addEventListener('click', function (e) {
  const mobileNav = document.getElementById('navbarInstMobile');
  const toggler   = document.querySelector('.navbar-inst-toggler');

  if (!mobileNav || !toggler) return;

  if (!mobileNav.contains(e.target) && !toggler.contains(e.target)) {
    if (mobileNav.classList.contains('open')) {
      mobileNav.classList.remove('open');
      toggler.setAttribute('aria-expanded', 'false');
      toggler.textContent = '☰';
    }
  }
});

/* Close mobile nav when a link is clicked */
document.addEventListener('DOMContentLoaded', function () {
  const mobileLinks = document.querySelectorAll('#navbarInstMobile a');
  const toggler     = document.querySelector('.navbar-inst-toggler');
  const mobileNav   = document.getElementById('navbarInstMobile');

  mobileLinks.forEach(function (link) {
    link.addEventListener('click', function () {
      if (mobileNav) mobileNav.classList.remove('open');
      if (toggler) {
        toggler.setAttribute('aria-expanded', 'false');
        toggler.textContent = '☰';
      }
    });
  });
});

/* ============================================================
   2. TAB SWITCHER — inline style, sin dependencia de CSS cascade
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

/* ============================================================
   4. NAVBAR — DROPDOWNS DESKTOP (click + teclado)
   ------------------------------------------------------------
   - Hover abre el dropdown via CSS en desktop.
   - Click en el trigger también abre/cierra (touch + a11y).
   - Click outside cierra.
   - ESC cierra y devuelve foco al trigger.
   - Solo un dropdown abierto a la vez.
   ============================================================ */
document.addEventListener('DOMContentLoaded', function () {
  var navItems = document.querySelectorAll('.navbar-inst-item.has-dropdown');
  if (!navItems.length) return;

  function closeAll(except) {
    navItems.forEach(function (item) {
      if (item === except) return;
      item.classList.remove('is-open');
      var trigger = item.querySelector('.dropdown-trigger');
      if (trigger) trigger.setAttribute('aria-expanded', 'false');
    });
  }

  navItems.forEach(function (item) {
    var trigger = item.querySelector('.dropdown-trigger');
    if (!trigger) return;

    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var isOpen = item.classList.contains('is-open');
      closeAll(item);
      if (isOpen) {
        item.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
      } else {
        item.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
      }
    });

    /* Cerrar al hacer click en cualquier item del panel */
    var panelLinks = item.querySelectorAll('.dropdown-panel a');
    panelLinks.forEach(function (link) {
      link.addEventListener('click', function () {
        item.classList.remove('is-open');
        trigger.setAttribute('aria-expanded', 'false');
      });
    });
  });

  /* Click outside cierra todo */
  document.addEventListener('click', function (e) {
    var inside = e.target.closest('.navbar-inst-item.has-dropdown');
    if (!inside) closeAll(null);
  });

  /* ESC cierra y vuelve foco al trigger */
  document.addEventListener('keydown', function (e) {
    if (e.key !== 'Escape') return;
    navItems.forEach(function (item) {
      if (item.classList.contains('is-open')) {
        item.classList.remove('is-open');
        var trigger = item.querySelector('.dropdown-trigger');
        if (trigger) {
          trigger.setAttribute('aria-expanded', 'false');
          trigger.focus();
        }
      }
    });
  });
});

/* ============================================================
   5. NAVBAR — ACORDEÓN MÓVIL (drawer)
   ============================================================ */
document.addEventListener('DOMContentLoaded', function () {
  var triggers = document.querySelectorAll('.navbar-mobile-trigger');
  if (!triggers.length) return;

  triggers.forEach(function (trigger) {
    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      var submenu = trigger.nextElementSibling;
      if (!submenu) return;
      var isOpen = trigger.getAttribute('aria-expanded') === 'true';

      /* Cerrar otros para acordeón estricto */
      triggers.forEach(function (other) {
        if (other === trigger) return;
        other.setAttribute('aria-expanded', 'false');
        var sub = other.nextElementSibling;
        if (sub) sub.hidden = true;
      });

      trigger.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
      submenu.hidden = isOpen;
    });
  });
});
