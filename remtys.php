<?php
/* ============================================================
   REMTYS — Registro Municipal de Trámites y Servicios
   Archivo: remtys.php
   Coordinación de Mejora Regulatoria — H. Ayuntamiento de Ecatepec de Morelos
   ============================================================ */

/* --- DATA: Features ¿Qué encontrarás en REMTYS? --- */
$features = [
    [
        'icono' => 'bi-list-check',
        'titulo'=> 'Requisitos de Trámites',
        'texto' => 'Documentación necesaria para realizar cada trámite paso a paso.',
    ],
    [
        'icono' => 'bi-cash-coin',
        'titulo'=> 'Costos Asociados',
        'texto' => 'Tarifas oficiales y formas de pago de cada servicio municipal.',
    ],
    [
        'icono' => 'bi-clock-history',
        'titulo'=> 'Tiempos de Atención',
        'texto' => 'Tiempos estimados de respuesta y plazos máximos de cada gestión.',
    ],
    [
        'icono' => 'bi-geo-alt-fill',
        'titulo'=> 'Puntos de Contacto',
        'texto' => 'Ubicación, teléfonos y correos de cada dependencia.',
    ],
];

/* --- DATA: Dependencias municipales (26 dependencias oficiales) --- */
$dependencias = [
    ['slug' => 'tesoreria-municipal',         'icono' => 'bi-bank',                    'nombre' => 'Tesorería Municipal',                                                'desc' => 'Recaudación, pagos e impuestos municipales.'],
    ['slug' => 'consejeria-juridica',         'icono' => 'bi-journal-text',            'nombre' => 'Consejería Jurídica',                                                'desc' => 'Asesoría jurídica al H. Ayuntamiento y administración pública municipal.'],
    ['slug' => 'organo-interno-control',      'icono' => 'bi-clipboard2-pulse-fill',   'nombre' => 'Órgano Interno de Control Municipal',                                'desc' => 'Vigilancia, auditoría y recepción de denuncias contra servidores públicos.'],
    ['slug' => 'proteccion-civil',            'icono' => 'bi-shield-fill-exclamation', 'nombre' => 'Dirección de Protección Civil y Bomberos',                           'desc' => 'Dictámenes, permisos y atención de emergencias.'],
    ['slug' => 'movilidad-urbana',            'icono' => 'bi-car-front-fill',          'nombre' => 'Dirección de Movilidad Urbana',                                      'desc' => 'Permisos, balizamiento y vialidad municipal.'],
    ['slug' => 'obras-publicas',              'icono' => 'bi-cone-striped',            'nombre' => 'Dirección de Obras Públicas',                                        'desc' => 'Pavimentación, infraestructura y obra civil.'],
    ['slug' => 'servicios-publicos',          'icono' => 'bi-tools',                   'nombre' => 'Dirección de Servicios Públicos',                                    'desc' => 'Alumbrado, panteones, limpia y mantenimiento urbano.'],
    ['slug' => 'desarrollo-urbano',           'icono' => 'bi-building-fill',           'nombre' => 'Dirección de Desarrollo Urbano',                                     'desc' => 'Licencias de construcción y uso de suelo.'],
    ['slug' => 'medio-ambiente-ecologia',     'icono' => 'bi-tree-fill',               'nombre' => 'Dirección del Medio Ambiente y Ecología',                            'desc' => 'Regulación ambiental, descargas, residuos y emisiones.'],
    ['slug' => 'coordinacion-tecnica',        'icono' => 'bi-diagram-3-fill',          'nombre' => 'Coordinación Técnica',                                               'desc' => 'Acceso a la información, datos personales y pasaporte.'],
    ['slug' => 'instituto-cultura',           'icono' => 'bi-easel2-fill',             'nombre' => 'Instituto de Cultura',                                               'desc' => 'Eventos, talleres y patrimonio cultural.'],
    ['slug' => 'seguridad-ciudadana',         'icono' => 'bi-shield-shaded',           'nombre' => 'Dirección General de Seguridad Ciudadana y Tránsito Municipal',      'desc' => 'Seguridad pública, prevención y emergencias.'],
    ['slug' => 'imcufideem',                  'icono' => 'bi-trophy-fill',             'nombre' => 'IMCUFIDEEM',                                                         'desc' => 'Cultura física, deporte y unidades deportivas municipales.'],
    ['slug' => 'immig',                       'icono' => 'bi-gender-female',           'nombre' => 'IMMIG',                                                              'desc' => 'Atención integral a mujeres en situación de violencia.'],
    ['slug' => 'desarrollo-economico',        'icono' => 'bi-graph-up-arrow',          'nombre' => 'Dirección de Desarrollo Económico',                                  'desc' => 'Licencias de funcionamiento y Ventanilla Única.'],
    ['slug' => 'smdif',                       'icono' => 'bi-people-fill',             'nombre' => 'Sistema Municipal para el Desarrollo Integral de la Familia (SMDIF)','desc' => 'Asistencia social, atención jurídica y psicológica para familias.'],
    ['slug' => 'defensoria-derechos-humanos', 'icono' => 'bi-shield-fill-plus',        'nombre' => 'Defensoría Municipal de los Derechos Humanos',                       'desc' => 'Defensa, promoción y difusión de los derechos humanos.'],
    ['slug' => 'direccion-bienestar',         'icono' => 'bi-emoji-smile-fill',        'nombre' => 'Dirección de Bienestar',                                             'desc' => 'Programas y talleres en Centros de Desarrollo Comunitario.'],
    ['slug' => 'instituto-juventud',          'icono' => 'bi-person-hearts',           'nombre' => 'Instituto de la Juventud',                                           'desc' => 'Desarrollo integral, formación y vinculación juvenil.'],
    ['slug' => 'sapase',                      'icono' => 'bi-droplet-fill',            'nombre' => 'SAPASE',                                                             'desc' => 'Agua potable, alcantarillado y saneamiento.'],
    ['slug' => 'secretaria-ayuntamiento',     'icono' => 'bi-file-earmark-text-fill',  'nombre' => 'Secretaría del H. Ayuntamiento',                                     'desc' => 'Constancias, certificaciones, permisos y oficialía de partes.'],
    ['slug' => 'instituto-mujeres',           'icono' => 'bi-gender-female',           'nombre' => 'Instituto de las Mujeres e Igualdad de Género',                      'desc' => 'Igualdad sustantiva y atención a mujeres.'],
    ['slug' => 'diversidad-sexual',           'icono' => 'bi-rainbow',                 'nombre' => 'Dirección de Diversidad Sexual',                                     'desc' => 'Asesoría, atención y derechos de la comunidad LGBTTTIQ+.'],
    ['slug' => 'direccion-educacion',         'icono' => 'bi-mortarboard-fill',        'nombre' => 'Dirección de Educación',                                             'desc' => 'Servicio social, asesoría académica y vinculación educativa.'],
    ['slug' => 'direccion-gobierno',          'icono' => 'bi-bank2',                   'nombre' => 'Dirección de Gobierno',                                              'desc' => 'Asesoría condominal, migrantes y participación ciudadana.'],
    ['slug' => 'mercados-tianguis',           'icono' => 'bi-shop',                    'nombre' => 'Dirección de Mercados, Tianguis y Vía Pública',                      'desc' => 'Concesiones, permisos y comercio en vía pública.'],
];

/* --- DATA: Marco normativo --- */
$marco_normativo = [
    'Ley General de Mejora Regulatoria',
    'Ley para la Mejora Regulatoria del Estado de México y sus Municipios',
    'Reglamento de Mejora Regulatoria del Municipio de Ecatepec',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="REMTYS — Registro Municipal de Trámites y Servicios de Ecatepec de Morelos. Consulta requisitos, costos, tiempos y puntos de contacto de las dependencias municipales.">
  <meta name="author" content="H. Ayuntamiento de Ecatepec de Morelos — Coordinación de Mejora Regulatoria">
  <title>REMTYS — Registro Municipal de Trámites y Servicios | Ecatepec de Morelos</title>

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
  <?php $paginaActual = 'remtys'; include __DIR__ . '/includes/nav.php'; ?>

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
        <span class="active" aria-current="page">REMTYS</span>
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
              <i class="bi bi-clipboard2-data-fill"></i>
            </div>

            <div class="hero-badge">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              Mejora Regulatoria
            </div>

            <h1 class="hero-title" id="hero-title">
              REMTYS<br>
              <span style="font-size:0.55em; font-weight:600; letter-spacing:0;">Registro Municipal de Trámites y Servicios</span>
            </h1>

            <div class="hero-divider" role="presentation"></div>

            <p class="hero-description">
              Herramienta diseñada para brindar a la ciudadanía información clara, precisa y actualizada
              sobre los trámites y servicios que ofrece el municipio de Ecatepec de Morelos. Consulta
              requisitos, costos, tiempos de atención y puntos de contacto de cada dependencia,
              fomentando transparencia, eficiencia administrativa y acceso a servicios públicos de calidad.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         FEATURES — ¿Qué encontrarás en REMTYS?
         ============================================================ -->
    <section class="remtys-features-section" id="que-encontraras" aria-labelledby="features-heading">
      <div class="container">
        <div class="row mb-4">
          <div class="col-12 text-center">
            <h2 class="section-heading" id="features-heading" style="justify-content:center; display:flex; align-items:center;">
              <i class="bi bi-stars text-dorado me-2" aria-hidden="true"></i>
              ¿Qué encontrarás en REMTYS?
            </h2>
            <p class="section-subheading">
              Información oficial, organizada y al alcance de todos los ciudadanos.
            </p>
          </div>
        </div>

        <div class="row g-4">
          <?php foreach ($features as $f): ?>
            <div class="col-sm-6 col-lg-3">
              <article class="feature-card">
                <div class="feature-card-icon" aria-hidden="true">
                  <i class="<?= htmlspecialchars($f['icono']) ?>"></i>
                </div>
                <h3 class="feature-card-title"><?= htmlspecialchars($f['titulo']) ?></h3>
                <p class="feature-card-text"><?= htmlspecialchars($f['texto']) ?></p>
              </article>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ============================================================
         DEPENDENCIAS MUNICIPALES
         ============================================================ -->
    <section class="dependencias-section" id="dependencias" aria-labelledby="dependencias-heading">
      <div class="container">
        <div class="row mb-4">
          <div class="col-12">
            <h2 class="section-heading" id="dependencias-heading">
              <i class="bi bi-buildings-fill text-dorado me-2" aria-hidden="true"></i>
              Dependencias Municipales
            </h2>
            <p class="section-subheading">
              <strong>26 dependencias</strong> con trámites y servicios disponibles. Selecciona una para conocer su catálogo completo.
            </p>
          </div>
        </div>

        <div class="row g-4">
          <?php foreach ($dependencias as $dep):
            $depUrl = htmlspecialchars($dep['slug'] . '.php', ENT_QUOTES);
          ?>
            <div class="col-md-6 col-lg-4">
              <article class="dependencia-card">
                <div class="dependencia-card-icon" aria-hidden="true">
                  <i class="<?= htmlspecialchars($dep['icono']) ?>"></i>
                </div>
                <h3 class="dependencia-card-title"><?= htmlspecialchars($dep['nombre']) ?></h3>
                <p class="dependencia-card-text"><?= htmlspecialchars($dep['desc']) ?></p>
                <a href="<?= $depUrl ?>" class="btn-custom btn-custom-outline-vino"
                   aria-label="Ver trámites de <?= htmlspecialchars($dep['nombre'], ENT_QUOTES) ?>">
                  <i class="bi bi-arrow-right-circle" aria-hidden="true"></i>
                  Ver trámites
                </a>
              </article>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ============================================================
         MARCO NORMATIVO / FUNDAMENTO LEGAL
         ============================================================ -->
    <section class="modalidades-section" id="marco-normativo" aria-labelledby="marco-heading" style="background-color: var(--color-white);">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto">

            <h2 class="section-heading" id="marco-heading">
              <i class="bi bi-journal-text text-dorado me-2" aria-hidden="true"></i>
              Marco Normativo / Fundamento Legal
            </h2>
            <p class="section-subheading">
              REMTYS opera bajo el siguiente marco legal vigente, garantizando legalidad, transparencia
              y certeza jurídica en cada uno de los trámites y servicios ofrecidos.
            </p>

            <div class="callout-nota" role="note" aria-label="Marco legal aplicable a REMTYS">
              <i class="bi bi-bookmark-check-fill" aria-hidden="true"></i>
              <div class="callout-nota-content">
                <strong>Disposiciones aplicables</strong>
                <ul class="marco-normativo-list" aria-label="Lista de disposiciones legales aplicables">
                  <?php foreach ($marco_normativo as $ley): ?>
                    <li>
                      <i class="bi bi-check2-circle" aria-hidden="true"></i>
                      <span><?= htmlspecialchars($ley) ?></span>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         CTA — ACCESO AL CATÁLOGO
         ============================================================ -->
    <section class="cta-section" id="acceso-catalogo" aria-labelledby="cta-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="cta-card-vino">
              <div class="cta-icon" aria-hidden="true">
                <i class="bi bi-folder-check"></i>
              </div>
              <h3 id="cta-heading">Acceso al Catálogo Completo</h3>
              <p>
                Acceso público y gratuito a más de <strong style="color: var(--color-arena);">200 trámites y servicios municipales</strong>
                disponibles en línea, las 24 horas.
              </p>
              <a href="#" class="btn-custom btn-custom-dorado" aria-label="Consultar el catálogo completo de trámites y servicios">
                <i class="bi bi-search" aria-hidden="true"></i>
                Consultar Catálogo Completo
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         CONTACTO Y UBICACIÓN
         ============================================================ -->
    <section class="contacto-section" id="contacto" aria-labelledby="contacto-heading">
      <div class="container">

        <div class="row g-5 align-items-start">

          <!-- Columna izquierda: Info de contacto -->
          <div class="col-lg-6">
            <h2 class="contacto-section-title" id="contacto-heading">
              <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
              ¿Dónde y cómo contactarnos?
            </h2>
            <p class="contacto-subtitle">
              La Coordinación de Mejora Regulatoria se encuentra en el Palacio Municipal de Ecatepec.
            </p>

            <!-- Dirección -->
            <div class="info-card" role="region" aria-label="Dirección">
              <div class="info-card-icon" aria-hidden="true">
                <i class="bi bi-geo-alt-fill"></i>
              </div>
              <div class="info-card-content">
                <p class="info-card-label">Dirección</p>
                <p class="info-card-value">
                  Coordinación de Mejora Regulatoria<br>
                  Palacio Municipal de Ecatepec<br>
                  Av. Benito Juárez Sur S/N,<br>
                  San Cristóbal Centro, 55000 Ecatepec de Morelos
                </p>
              </div>
            </div>

            <!-- Teléfono -->
            <div class="info-card" role="region" aria-label="Teléfono">
              <div class="info-card-icon" aria-hidden="true">
                <i class="bi bi-telephone-fill"></i>
              </div>
              <div class="info-card-content">
                <p class="info-card-label">Teléfono</p>
                <p class="info-card-value">
                  <a href="tel:+525558361500">55 5836 1500</a><br>
                  <span style="font-size:13px; color: var(--color-gray);">Atención ciudadana</span>
                </p>
              </div>
            </div>

            <!-- Email -->
            <div class="info-card" role="region" aria-label="Correo electrónico de atención ciudadana">
              <div class="info-card-icon" aria-hidden="true">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="info-card-content">
                <p class="info-card-label">Correo Electrónico</p>
                <p class="info-card-value">
                  <a href="mailto:atencion.ciudadana@ecatepec.gob.mx">atencion.ciudadana@ecatepec.gob.mx</a>
                </p>
              </div>
            </div>

            <!-- Horario -->
            <div class="info-card" role="region" aria-label="Horario de atención">
              <div class="info-card-icon" aria-hidden="true">
                <i class="bi bi-clock-fill"></i>
              </div>
              <div class="info-card-content">
                <p class="info-card-label">Horario de Atención</p>
                <p class="info-card-value">
                  Lunes a Viernes<br>
                  <span style="font-size:13px; color: var(--color-gray);">9:00 a 17:00 hrs</span>
                </p>
              </div>
            </div>

          </div><!-- /col info -->

          <!-- Columna derecha: Mapa placeholder -->
          <div class="col-lg-6">
            <div class="mapa-placeholder" role="img" aria-label="Mapa de ubicación del Palacio Municipal de Ecatepec de Morelos">
              <i class="bi bi-map-fill" aria-hidden="true"></i>
              <h3>Palacio Municipal</h3>
              <p>Ecatepec de Morelos, Estado de México</p>
              <p style="font-size:12px;">Av. Benito Juárez Sur S/N, San Cristóbal Centro, 55000</p>
              <a href="https://maps.google.com/?q=Palacio+Municipal+Ecatepec+de+Morelos"
                 target="_blank"
                 rel="noopener noreferrer"
                 class="btn-custom btn-custom-outline-dorado mt-2"
                 aria-label="Ver ubicación del Palacio Municipal en Google Maps (abre en nueva ventana)">
                <i class="bi bi-map" aria-hidden="true"></i>
                Ver en Google Maps
              </a>
            </div>
          </div>

        </div><!-- /row -->
      </div><!-- /container -->
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
        Coordinación de Mejora Regulatoria — REMTYS
      </p>

      <p class="footer-copyright">
        &copy; <?= date('Y') ?> | H. Ayuntamiento de Ecatepec de Morelos | Todos los derechos reservados
      </p>

    </div>
  </footer>

  <!-- Custom JS -->
  <script src="assets/js/main.js?v=<?= time() ?>"></script>

</body>
</html>
