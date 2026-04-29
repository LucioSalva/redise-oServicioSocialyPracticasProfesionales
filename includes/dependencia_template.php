<?php
/* ============================================================
   PLANTILLA VISUAL — DEPENDENCIA MUNICIPAL
   Archivo: includes/dependencia_template.php
   ------------------------------------------------------------
   USO:
     require __DIR__ . '/includes/dependencias_data.php';
     $dep = $dependencias_full['tesoreria-municipal'];
     include __DIR__ . '/includes/dependencia_template.php';
   ------------------------------------------------------------
   Espera la variable $dep con la estructura del array
   $dependencias_full definido en dependencias_data.php
   ============================================================ */

if (!isset($dep) || !is_array($dep)) {
    http_response_code(404);
    echo '<h1>Dependencia no encontrada</h1>';
    return;
}

/* Helpers cortos */
$h = function ($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); };

$nombre      = $dep['nombre']      ?? 'Dependencia Municipal';
$icono       = $dep['icono']       ?? 'bi-building';
$badge       = $dep['badge']       ?? 'Dependencia Municipal';
$descripcion = $dep['descripcion'] ?? '';
$titular     = $dep['titular']     ?? '';
$contacto    = $dep['contacto']    ?? [];
$tramites    = $dep['tramites']    ?? [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?= $h($nombre) ?> — Trámites, servicios y contacto. H. Ayuntamiento de Ecatepec de Morelos. Información oficial del REMTYS.">
  <meta name="author" content="H. Ayuntamiento de Ecatepec de Morelos — REMTYS">
  <title><?= $h($nombre) ?> | REMTYS — Ecatepec de Morelos</title>

  <!-- Google Fonts: Poppins + Montserrat -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Custom Stylesheet -->
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

  <!-- ============================================================
       NAVBAR INSTITUCIONAL — include reutilizable
       ============================================================ -->
  <?php $paginaActual = 'remtys'; include __DIR__ . '/nav.php'; ?>

  <!-- ============================================================
       BREADCRUMB
       ============================================================ -->
  <div class="breadcrumb-wrapper" aria-label="Ruta de navegación">
    <div class="container">
      <nav class="breadcrumb-custom" aria-label="breadcrumb">
        <a href="index.php"><i class="bi bi-house-fill" aria-hidden="true"></i> Inicio</a>
        <span class="separator" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
        <a href="#">Trámites y Servicios</a>
        <span class="separator" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
        <a href="remtys.php">REMTYS</a>
        <span class="separator" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
        <span class="active" aria-current="page"><?= $h($nombre) ?></span>
      </nav>
    </div>
  </div>

  <main id="main-content">

    <!-- ============================================================
         HERO SECTION
         ============================================================ -->
    <section class="hero-section" aria-labelledby="hero-title">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-xl-8">
            <div class="hero-icon-wrapper" aria-hidden="true">
              <i class="<?= $h($icono) ?>"></i>
            </div>

            <div class="hero-badge">
              <i class="<?= $h($icono) ?>" aria-hidden="true"></i>
              <?= $h($badge) ?>
            </div>

            <h1 class="hero-title" id="hero-title">
              <?= $h($nombre) ?>
            </h1>

            <div class="hero-divider" role="presentation"></div>

            <p class="hero-description">
              <?= $h($descripcion) ?>
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         TRÁMITES Y SERVICIOS
         ============================================================ -->
    <section class="tramites-section" id="tramites" aria-labelledby="tramites-heading">
      <div class="container">

        <div class="row mb-4">
          <div class="col-12">
            <h2 class="section-heading" id="tramites-heading">
              <i class="bi bi-bookmark-star-fill text-dorado me-2" aria-hidden="true"></i>
              Trámites y Servicios
            </h2>
            <?php if (!empty($tramites)): ?>
              <p class="section-subheading">
                <strong><?= count($tramites) ?> trámites disponibles</strong> en esta dependencia.
                Consulta los detalles, costos y tiempos estimados de atención.
              </p>
            <?php else: ?>
              <p class="section-subheading">
                Catálogo de trámites en actualización. Próximamente se publicará la información oficial de esta dependencia.
              </p>
            <?php endif; ?>
          </div>
        </div>

        <?php if (empty($tramites)): ?>
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <div class="callout-nota" role="note" aria-label="Catálogo en actualización">
                <i class="bi bi-info-circle-fill" aria-hidden="true"></i>
                <div class="callout-nota-content">
                  <strong>Catálogo de trámites en actualización</strong>
                  <p class="mb-0" style="margin-top:8px;">
                    Esta dependencia se encuentra integrando su catálogo oficial de trámites y servicios.
                    Para mayor información, contacta directamente a través de los datos institucionales que aparecen en esta página.
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <div class="row g-4">
          <?php foreach ($tramites as $idx => $t):
            $tNombre = $t['nombre'] ?? 'Trámite';
            $tDesc   = $t['desc']   ?? '';
            $tCosto  = $t['costo']  ?? 'Variable';
            $tTiempo = $t['tiempo'] ?? 'Variable';
            $tIcono  = $t['icono']  ?? 'bi-clipboard-check';
            $costoLower = mb_strtolower($tCosto, 'UTF-8');
            $esGratuito = (strpos($costoLower, 'gratuito') !== false);
          ?>
            <div class="col-md-6 col-lg-4">
              <article class="tramite-card" aria-labelledby="tramite-<?= $idx ?>-title">
                <div class="tramite-card-icon" aria-hidden="true">
                  <i class="<?= $h($tIcono) ?>"></i>
                </div>
                <h3 class="tramite-card-title" id="tramite-<?= $idx ?>-title"><?= $h($tNombre) ?></h3>
                <p class="tramite-card-text"><?= $h($tDesc) ?></p>

                <div class="tramite-meta" role="list" aria-label="Información del trámite">
                  <span class="tramite-meta-item tramite-meta-costo<?= $esGratuito ? ' is-gratuito' : '' ?>" role="listitem">
                    <i class="bi bi-cash-coin" aria-hidden="true"></i>
                    <span class="tramite-meta-label">Costo:</span>
                    <span class="tramite-meta-value"><?= $h($tCosto) ?></span>
                  </span>
                  <span class="tramite-meta-item tramite-meta-tiempo" role="listitem">
                    <i class="bi bi-clock-history" aria-hidden="true"></i>
                    <span class="tramite-meta-label">Tiempo:</span>
                    <span class="tramite-meta-value"><?= $h($tTiempo) ?></span>
                  </span>
                </div>

                <?php if (!empty($t['detalle']) && is_array($t['detalle'])): ?>
                  <button type="button"
                          class="btn-custom btn-custom-outline-vino tramite-card-btn"
                          data-bs-toggle="modal"
                          data-bs-target="#tramiteModal-<?= $idx ?>"
                          aria-label="Ver detalles de <?= $h($tNombre) ?>">
                    <i class="bi bi-info-circle" aria-hidden="true"></i>
                    Ver detalles
                  </button>
                <?php elseif (!empty($t['pdf'])): ?>
                  <a href="<?= $h($t['pdf']) ?>"
                     target="_blank"
                     rel="noopener noreferrer"
                     class="btn-custom btn-custom-outline-vino tramite-card-btn"
                     aria-label="Ver detalles de <?= $h($tNombre) ?> (PDF, abre en nueva pestaña)">
                    <i class="bi bi-file-earmark-pdf" aria-hidden="true"></i>
                    Ver detalles
                  </a>
                <?php else: ?>
                  <button type="button"
                          class="btn-custom btn-custom-outline-vino tramite-card-btn"
                          onclick="alert('Próximamente — detalles de: <?= $h($tNombre) ?>')"
                          aria-label="Ver detalles de <?= $h($tNombre) ?>">
                    <i class="bi bi-arrow-right-circle" aria-hidden="true"></i>
                    Ver detalles
                  </button>
                <?php endif; ?>
              </article>
            </div>

            <?php if (!empty($t['detalle']) && is_array($t['detalle'])):
              $d = $t['detalle'];
            ?>
            <!-- Modal de detalles del trámite -->
            <div class="modal fade tramite-modal"
                 id="tramiteModal-<?= $idx ?>"
                 tabindex="-1"
                 aria-labelledby="tramiteModalLabel-<?= $idx ?>"
                 aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                  <div class="modal-header">
                    <div class="modal-header-icon" aria-hidden="true">
                      <i class="<?= $h($tIcono) ?>"></i>
                    </div>
                    <div class="modal-header-text">
                      <p class="modal-eyebrow"><?= $h($nombre) ?></p>
                      <h5 class="modal-title" id="tramiteModalLabel-<?= $idx ?>"><?= $h($tNombre) ?></h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                  </div>

                  <div class="modal-body">

                    <?php if (!empty($d['descripcion'])): ?>
                      <section class="modal-section">
                        <h6 class="modal-section-title"><i class="bi bi-info-circle-fill" aria-hidden="true"></i> Descripción</h6>
                        <p><?= $h($d['descripcion']) ?></p>
                      </section>
                    <?php endif; ?>

                    <div class="modal-meta-grid">
                      <?php if (!empty($tCosto)): ?>
                        <div class="modal-meta-pill">
                          <i class="bi bi-cash-coin" aria-hidden="true"></i>
                          <div>
                            <span class="modal-meta-pill-label">Costo</span>
                            <span class="modal-meta-pill-value"><?= $h($tCosto) ?></span>
                          </div>
                        </div>
                      <?php endif; ?>
                      <?php if (!empty($tTiempo)): ?>
                        <div class="modal-meta-pill">
                          <i class="bi bi-clock-history" aria-hidden="true"></i>
                          <div>
                            <span class="modal-meta-pill-label">Tiempo</span>
                            <span class="modal-meta-pill-value"><?= $h($tTiempo) ?></span>
                          </div>
                        </div>
                      <?php endif; ?>
                      <?php if (!empty($d['vigencia'])): ?>
                        <div class="modal-meta-pill">
                          <i class="bi bi-calendar-check" aria-hidden="true"></i>
                          <div>
                            <span class="modal-meta-pill-label">Vigencia</span>
                            <span class="modal-meta-pill-value"><?= $h($d['vigencia']) ?></span>
                          </div>
                        </div>
                      <?php endif; ?>
                      <?php if (!empty($d['documento_obtener'])): ?>
                        <div class="modal-meta-pill">
                          <i class="bi bi-file-earmark-medical" aria-hidden="true"></i>
                          <div>
                            <span class="modal-meta-pill-label">Documento a obtener</span>
                            <span class="modal-meta-pill-value"><?= $h($d['documento_obtener']) ?></span>
                          </div>
                        </div>
                      <?php endif; ?>
                    </div>

                    <?php if (!empty($d['dirigido_a'])): ?>
                      <section class="modal-section">
                        <h6 class="modal-section-title"><i class="bi bi-people-fill" aria-hidden="true"></i> Dirigido a</h6>
                        <p><?= $h($d['dirigido_a']) ?></p>
                      </section>
                    <?php endif; ?>

                    <?php if (!empty($d['casos_aplica'])): ?>
                      <section class="modal-section">
                        <h6 class="modal-section-title"><i class="bi bi-patch-question-fill" aria-hidden="true"></i> ¿Cuándo se realiza?</h6>
                        <p><?= $h($d['casos_aplica']) ?></p>
                      </section>
                    <?php endif; ?>

                    <?php if (!empty($d['requisitos_personas_fisicas'])): ?>
                      <section class="modal-section">
                        <h6 class="modal-section-title"><i class="bi bi-person-vcard-fill" aria-hidden="true"></i> Requisitos — Personas Físicas</h6>
                        <ol class="modal-list">
                          <?php foreach ($d['requisitos_personas_fisicas'] as $r): ?>
                            <li><?= $h($r) ?></li>
                          <?php endforeach; ?>
                        </ol>
                      </section>
                    <?php endif; ?>

                    <?php if (!empty($d['requisitos_instituciones'])): ?>
                      <section class="modal-section">
                        <h6 class="modal-section-title"><i class="bi bi-building-fill" aria-hidden="true"></i> Requisitos — Instituciones Públicas</h6>
                        <ol class="modal-list">
                          <?php foreach ($d['requisitos_instituciones'] as $r): ?>
                            <li><?= $h($r) ?></li>
                          <?php endforeach; ?>
                        </ol>
                      </section>
                    <?php endif; ?>

                    <?php if (!empty($d['requisitos']) && empty($d['requisitos_personas_fisicas']) && empty($d['requisitos_instituciones'])): ?>
                      <section class="modal-section">
                        <h6 class="modal-section-title"><i class="bi bi-list-check" aria-hidden="true"></i> Requisitos</h6>
                        <ol class="modal-list">
                          <?php foreach ($d['requisitos'] as $r): ?>
                            <li><?= $h($r) ?></li>
                          <?php endforeach; ?>
                        </ol>
                      </section>
                    <?php endif; ?>

                    <?php if (!empty($d['pasos'])): ?>
                      <section class="modal-section">
                        <h6 class="modal-section-title"><i class="bi bi-signpost-split-fill" aria-hidden="true"></i> Pasos a seguir</h6>
                        <ol class="modal-list modal-list-steps">
                          <?php foreach ($d['pasos'] as $p): ?>
                            <li><?= $h($p) ?></li>
                          <?php endforeach; ?>
                        </ol>
                      </section>
                    <?php endif; ?>

                    <?php if (!empty($d['forma_pago'])): ?>
                      <section class="modal-section">
                        <h6 class="modal-section-title"><i class="bi bi-credit-card-2-front-fill" aria-hidden="true"></i> Forma de pago</h6>
                        <p><?= $h($d['forma_pago']) ?></p>
                      </section>
                    <?php endif; ?>

                    <?php if (!empty($d['lugar'])): ?>
                      <section class="modal-section">
                        <h6 class="modal-section-title"><i class="bi bi-geo-alt-fill" aria-hidden="true"></i> Lugar de atención</h6>
                        <p><?= $h($d['lugar']) ?></p>
                      </section>
                    <?php endif; ?>

                    <?php if (!empty($d['sujeto_a'])): ?>
                      <section class="modal-section">
                        <h6 class="modal-section-title"><i class="bi bi-exclamation-circle-fill" aria-hidden="true"></i> Renovación o resoluciones</h6>
                        <p><?= $h($d['sujeto_a']) ?></p>
                      </section>
                    <?php endif; ?>

                    <?php if (!empty($d['fundamento_legal'])): ?>
                      <section class="modal-section">
                        <h6 class="modal-section-title"><i class="bi bi-bank2" aria-hidden="true"></i> Fundamento legal</h6>
                        <ul class="modal-list modal-list-legal">
                          <?php foreach ($d['fundamento_legal'] as $f): ?>
                            <li><?= $h($f) ?></li>
                          <?php endforeach; ?>
                        </ul>
                      </section>
                    <?php endif; ?>

                    <?php if (!empty($d['pregunta_frecuente']['pregunta'])): ?>
                      <section class="modal-section modal-faq">
                        <h6 class="modal-section-title"><i class="bi bi-question-circle-fill" aria-hidden="true"></i> Pregunta frecuente</h6>
                        <p class="modal-faq-q"><strong><?= $h($d['pregunta_frecuente']['pregunta']) ?></strong></p>
                        <p class="modal-faq-a"><?= $h($d['pregunta_frecuente']['respuesta']) ?></p>
                      </section>
                    <?php endif; ?>

                    <?php if (!empty($d['fecha_actualizacion'])): ?>
                      <p class="modal-update">
                        <i class="bi bi-clock" aria-hidden="true"></i>
                        Última actualización: <?= $h($d['fecha_actualizacion']) ?>
                      </p>
                    <?php endif; ?>

                  </div>

                  <div class="modal-footer">
                    <?php if (!empty($t['pdf'])): ?>
                      <a href="<?= $h($t['pdf']) ?>"
                         target="_blank"
                         rel="noopener noreferrer"
                         class="btn-custom btn-custom-outline-vino"
                         aria-label="Descargar PDF oficial">
                        <i class="bi bi-file-earmark-pdf" aria-hidden="true"></i>
                        Descargar PDF oficial
                      </a>
                    <?php endif; ?>
                    <button type="button"
                            class="btn-custom btn-custom-dorado"
                            data-bs-dismiss="modal"
                            aria-label="Cerrar ventana">
                      <i class="bi bi-x-circle" aria-hidden="true"></i>
                      Cerrar
                    </button>
                  </div>

                </div>
              </div>
            </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>

      </div>
    </section>

    <!-- ============================================================
         INFORMACIÓN DE CONTACTO
         ============================================================ -->
    <section class="contacto-section" id="contacto" aria-labelledby="contacto-heading">
      <div class="container">

        <div class="row g-5 align-items-start">

          <!-- Columna izquierda: Info -->
          <div class="col-lg-6">
            <h2 class="contacto-section-title" id="contacto-heading">
              <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
              Información de Contacto
            </h2>
            <p class="contacto-subtitle">
              Acude o contacta directamente a <?= $h($nombre) ?> en los datos institucionales oficiales.
            </p>

            <?php if (!empty($contacto['ubicacion'])): ?>
              <div class="info-card" role="region" aria-label="Dirección">
                <div class="info-card-icon" aria-hidden="true">
                  <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div class="info-card-content">
                  <p class="info-card-label">Dirección</p>
                  <p class="info-card-value">
                    <?= $h($contacto['ubicacion']) ?><br>
                    Ecatepec de Morelos, Estado de México
                  </p>
                </div>
              </div>
            <?php endif; ?>

            <?php if (!empty($contacto['telefono'])): ?>
              <div class="info-card" role="region" aria-label="Teléfono">
                <div class="info-card-icon" aria-hidden="true">
                  <i class="bi bi-telephone-fill"></i>
                </div>
                <div class="info-card-content">
                  <p class="info-card-label">Teléfono</p>
                  <p class="info-card-value">
                    <a href="tel:+525558361500"><?= $h($contacto['telefono']) ?></a><br>
                    <span style="font-size:13px; color: var(--color-gray);">Atención ciudadana</span>
                  </p>
                </div>
              </div>
            <?php endif; ?>

            <?php if (!empty($contacto['correo'])): ?>
              <div class="info-card" role="region" aria-label="Correo electrónico">
                <div class="info-card-icon" aria-hidden="true">
                  <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="info-card-content">
                  <p class="info-card-label">Correo Electrónico</p>
                  <p class="info-card-value">
                    <a href="mailto:<?= $h($contacto['correo']) ?>"><?= $h($contacto['correo']) ?></a>
                  </p>
                </div>
              </div>
            <?php endif; ?>

            <?php if (!empty($contacto['horario'])): ?>
              <div class="info-card" role="region" aria-label="Horario de atención">
                <div class="info-card-icon" aria-hidden="true">
                  <i class="bi bi-clock-fill"></i>
                </div>
                <div class="info-card-content">
                  <p class="info-card-label">Horario de Atención</p>
                  <p class="info-card-value">
                    <?= $h($contacto['horario']) ?>
                  </p>
                </div>
              </div>
            <?php endif; ?>

          </div><!-- /col info -->

          <!-- Columna derecha: Mapa placeholder -->
          <div class="col-lg-6">
            <div class="mapa-placeholder" role="img" aria-label="Mapa de ubicación de <?= $h($nombre) ?>">
              <i class="bi bi-map-fill" aria-hidden="true"></i>
              <h3><?= $h($nombre) ?></h3>
              <p>Ecatepec de Morelos, Estado de México</p>
              <?php if (!empty($contacto['ubicacion'])): ?>
                <p style="font-size:12px;"><?= $h($contacto['ubicacion']) ?></p>
              <?php endif; ?>
              <a href="https://maps.google.com/?q=<?= urlencode(($contacto['ubicacion'] ?? '') . ' Ecatepec de Morelos') ?>"
                 target="_blank"
                 rel="noopener noreferrer"
                 class="btn-custom btn-custom-outline-dorado mt-2"
                 aria-label="Ver ubicación en Google Maps (abre en nueva ventana)">
                <i class="bi bi-map" aria-hidden="true"></i>
                Ver en Google Maps
              </a>
            </div>
          </div>

        </div><!-- /row -->
      </div>
    </section>

    <!-- ============================================================
         CTA — VOLVER A REMTYS
         ============================================================ -->
    <section class="cta-section" id="volver-remtys" aria-labelledby="cta-back-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="cta-card-vino cta-back-vino">
              <div class="cta-icon" aria-hidden="true">
                <i class="bi bi-compass-fill"></i>
              </div>
              <h3 id="cta-back-heading">¿Buscas otra dependencia?</h3>
              <p>
                Vuelve al directorio completo de <strong style="color: var(--color-arena);">26 dependencias municipales</strong>
                y descubre todos los trámites y servicios disponibles en el H. Ayuntamiento.
              </p>
              <a href="remtys.php" class="btn-custom btn-custom-dorado" aria-label="Volver al hub de REMTYS">
                <i class="bi bi-grid-fill" aria-hidden="true"></i>
                Volver a REMTYS
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- /main -->

  <!-- ============================================================
       FOOTER INSTITUCIONAL
       ============================================================ -->
  <footer class="footer-institucional" role="contentinfo">
    <div class="container text-center">

      <p class="footer-logo-text">
        H. Ayuntamiento de Ecatepec de Morelos
      </p>

      <div class="footer-divider" role="presentation"></div>

      <p class="footer-dept">
        Coordinación de Mejora Regulatoria — REMTYS / <?= $h($nombre) ?>
      </p>

      <p class="footer-copyright">
        &copy; <?= date('Y') ?> | H. Ayuntamiento de Ecatepec de Morelos | Todos los derechos reservados
      </p>

    </div>
  </footer>

  <!-- Bootstrap 5 JS (para modales) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
          crossorigin="anonymous"></script>

  <!-- Custom JS -->
  <script src="assets/js/main.js?v=<?= time() ?>"></script>

</body>
</html>
