<?php
/* ============================================================
   SERVICIO SOCIAL Y PRÁCTICAS PROFESIONALES — Ecatepec
   Archivo: index.php
   Dirección de Educación — H. Ayuntamiento de Ecatepec de Morelos
   ============================================================ */

/* --- DATA: Requisitos y Procedimientos --- */

$requisitos_publicas = [
    'Forma de pre-registro para escuelas públicas.',
    'Carta de presentación de institución educativa dirigida al Director de Educación.',
    'Copia de credencial escolar (ambas caras, ampliadas al 200%, en una sola hoja).',
    'Copia de CURP actualizada.',
    'Copia de credencial de elector (ampliada al 200%; credencial de padre o tutor si el solicitante es menor de edad).',
    'Comprobante de domicilio actual (recibo de luz, teléfono, agua o predial).',
    'Copia de documento de seguro (estudiantil, docente, seguridad social o médico).',
    'Tres fotografías tamaño infantil (color o blanco y negro) con nombre escrito al reverso.',
    'Carpeta <strong>rosa</strong>, tamaño oficio, plastificada.',
];

$procedimiento_publicas = [
    [
        'texto'  => 'Ingresar a <strong>ecatepec.gob.mx</strong> para descargar y llenar el formato de pre-registro, completando únicamente los apartados <em>"Datos Personales"</em> y <em>"Datos Escolares"</em>.',
    ],
    [
        'texto'  => 'Enviar el formato al correo: <strong><a href="mailto:publicaeduservicio@ecatepec.gob.mx">publicaeduservicio@ecatepec.gob.mx</a></strong>.',
    ],
    [
        'texto'  => 'Esperar respuesta con la asignación de área, la lista de requisitos adicionales y la cita correspondiente.',
    ],
    [
        'texto'  => 'Preparar la documentación completa con los sellos de la institución educativa y el área asignada.',
    ],
    [
        'texto'  => 'Acudir al Departamento en la fecha y hora indicada con toda la documentación.',
    ],
    [
        'texto'  => 'Completar la apertura de expediente, asignación de folio y recibir la explicación del proceso a seguir.',
    ],
];

$formatos_publicas = [
    ['nombre' => 'Pre-Registro',           'archivo' => 'FPR-EPUB.pdf'],
    ['nombre' => 'Informe de Actividades', 'archivo' => 'IA-EPUB.pdf'],
    ['nombre' => 'Control de Asistencia',  'archivo' => 'CA-EPUB.pdf'],
];

$requisitos_privadas = [
    'Forma de pre-registro para escuelas privadas.',
    'Carta de presentación de institución educativa dirigida al Director de Educación.',
    'Copia de credencial escolar (ambas caras, ampliadas al 200%, en una sola hoja).',
    'Copia de CURP actualizada.',
    'Copia de credencial de elector (ampliada al 200%; credencial de padre o tutor si el solicitante es menor de edad).',
    'Comprobante de domicilio actual (recibo de luz, teléfono, agua o predial).',
    'Copia de documento de seguro (estudiantil, docente, seguridad social o médico).',
    'Tres fotografías tamaño infantil (color o blanco y negro) con nombre escrito al reverso.',
    'Carpeta <strong>azul</strong>, tamaño oficio, plastificada.',
];

$procedimiento_privadas = [
    [
        'texto'  => 'Descargar y llenar el formato de pre-registro disponible en <strong>ecatepec.gob.mx</strong>.',
    ],
    [
        'texto'  => 'Enviar el formato al correo: <strong><a href="mailto:privadaeduservicio@ecatepec.gob.mx">privadaeduservicio@ecatepec.gob.mx</a></strong>.',
    ],
    [
        'texto'  => 'Recibir confirmación con la asignación de área, lista de requisitos adicionales y cita.',
    ],
    [
        'texto'  => 'Preparar la documentación completa con los sellos de la institución y del área asignada.',
    ],
    [
        'texto'  => 'Acudir al Departamento en la fecha y hora indicada con toda la documentación.',
    ],
    [
        'texto'  => 'Completar la apertura de expediente, asignación de folio y recibir la explicación del proceso.',
    ],
];

$formatos_privadas = [
    ['nombre' => 'Pre-Registro',           'archivo' => 'FPR-EPRIV.pdf'],
    ['nombre' => 'Informe de Actividades', 'archivo' => 'IA-EPRIV.pdf'],
    ['nombre' => 'Control de Asistencia',  'archivo' => 'CA-EPRIV.pdf'],
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Información sobre Servicio Social y Prácticas Profesionales en Ecatepec de Morelos. Requisitos, procedimientos y formatos descargables para escuelas públicas y privadas.">
  <meta name="author" content="H. Ayuntamiento de Ecatepec de Morelos — Dirección de Educación">
  <title>Servicio Social y Prácticas Profesionales | Ecatepec de Morelos</title>

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
       NAVBAR INSTITUCIONAL — NO MODIFICAR
       ============================================================ -->
  <nav class="navbar-institucional" style="background-color: #691C32;" role="navigation" aria-label="Navegación institucional">
    <div class="navbar-inst-inner">
      <div class="navbar-inst-logo">
        <img src="https://ecatepec.gob.mx/wp-content/themes/blocksy-child/img/logo-ecatepec-blanco.png"
             alt="Ecatepec de Morelos"
             height="50"
             onerror="this.style.display='none'">
      </div>
      <ul class="navbar-inst-menu" role="menubar">
        <li role="none"><a href="#" role="menuitem">Inicio</a></li>
        <li role="none"><a href="#" role="menuitem">Transparencia</a></li>
        <li role="none"><a href="#" role="menuitem">Trámites – Servicios</a></li>
        <li role="none"><a href="#" role="menuitem">Enlace Municipal</a></li>
        <li role="none"><a href="#" role="menuitem">Descubre Ecatepec</a></li>
        <li role="none"><a href="#" role="menuitem">Mejora Regulatoria</a></li>
        <li role="none"><a href="#" role="menuitem">Contacto</a></li>
      </ul>
      <button class="navbar-inst-toggler"
              onclick="toggleInstNav()"
              aria-controls="navbarInstMobile"
              aria-expanded="false"
              aria-label="Abrir menú de navegación">
        ☰
      </button>
    </div>

    <!-- Mobile nav drawer -->
    <div class="navbar-inst-mobile" id="navbarInstMobile" aria-hidden="true">
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Transparencia</a></li>
        <li><a href="#">Trámites – Servicios</a></li>
        <li><a href="#">Enlace Municipal</a></li>
        <li><a href="#">Descubre Ecatepec</a></li>
        <li><a href="#">Mejora Regulatoria</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
    </div>
  </nav>

  <!-- ============================================================
       BREADCRUMB
       ============================================================ -->
  <div class="breadcrumb-wrapper" aria-label="Ruta de navegación">
    <div class="container">
      <nav class="breadcrumb-custom" aria-label="breadcrumb">
        <a href="#"><i class="bi bi-house-fill" aria-hidden="true"></i> Inicio</a>
        <span class="separator" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
        <a href="#">Trámites y Servicios</a>
        <span class="separator" aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
        <span class="active" aria-current="page">Servicio Social y Prácticas Profesionales</span>
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
              <i class="bi bi-mortarboard-fill"></i>
            </div>

            <div class="hero-badge">
              <i class="bi bi-building-fill-check" aria-hidden="true"></i>
              Dirección de Educación
            </div>

            <h1 class="hero-title" id="hero-title">
              Servicio Social y<br>Prácticas Profesionales
            </h1>

            <div class="hero-divider" role="presentation"></div>

            <p class="hero-description">
              Descubre oportunidades de Servicio Social y Prácticas Profesionales en Ecatepec de Morelos.
              Participa en programas diseñados para que adquieras experiencia laboral mientras contribuyes
              al desarrollo de tu comunidad. Conoce los requisitos, beneficios y cómo inscribirte para ser
              parte de proyectos que impactan positivamente en la región. ¡No pierdas la oportunidad de
              crecer tu perfil profesional y apoyar el progreso local!
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECCIÓN DE MODALIDADES — Bootstrap Tabs
         ============================================================ -->
    <section class="modalidades-section" id="modalidades" aria-labelledby="modalidades-heading">
      <div class="container">

        <div class="row mb-1">
          <div class="col-12">
            <h2 class="section-heading" id="modalidades-heading">
              <i class="bi bi-grid-1x2-fill text-dorado me-2" aria-hidden="true"></i>
              Selecciona tu Modalidad
            </h2>
            <p class="section-subheading">
              El procedimiento varía según el tipo de institución educativa. Elige la que corresponda a tu caso.
            </p>
          </div>
        </div>

        <!-- Tab Navigation -->
        <ul class="nav-modalidades" id="modalidadesTabs" role="tablist">
          <li role="presentation">
            <button class="nav-link active"
                    id="publicas-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#publicas-pane"
                    type="button"
                    role="tab"
                    aria-controls="publicas-pane"
                    aria-selected="true">
              <i class="bi bi-bank2" aria-hidden="true"></i>
              Escuelas Públicas
            </button>
          </li>
          <li role="presentation">
            <button class="nav-link"
                    id="privadas-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#privadas-pane"
                    type="button"
                    role="tab"
                    aria-controls="privadas-pane"
                    aria-selected="false">
              <i class="bi bi-building-check" aria-hidden="true"></i>
              Escuelas Privadas
            </button>
          </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="modalidadesTabContent">

          <!-- ===================== TAB: ESCUELAS PÚBLICAS ===================== -->
          <div class="tab-pane fade show active"
               id="publicas-pane"
               role="tabpanel"
               aria-labelledby="publicas-tab"
               tabindex="0">

            <!-- Badge gratuito -->
            <div class="badge-gratuito" aria-label="Costo del trámite: gratuito">
              <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
              GRATUITO
            </div>

            <div class="row g-4">

              <!-- Card: Requisitos -->
              <div class="col-lg-6">
                <article class="card-custom" aria-labelledby="req-pub-title">
                  <div class="card-custom-header" aria-hidden="true">
                    <span class="card-custom-dot card-custom-dot-vino"></span>
                    <span class="card-custom-dot card-custom-dot-dorado"></span>
                    <span class="card-custom-dot card-custom-dot-arena"></span>
                  </div>
                  <div class="card-custom-body">
                    <h3 class="card-custom-title" id="req-pub-title">
                      <i class="bi bi-clipboard-check-fill" aria-hidden="true"></i>
                      Requisitos
                    </h3>
                    <ol class="requisitos-list" aria-label="Lista de requisitos para escuelas públicas">
                      <?php foreach ($requisitos_publicas as $i => $req): ?>
                        <li>
                          <span class="req-number" aria-hidden="true"><?= $i + 1 ?></span>
                          <span><?= $req ?></span>
                        </li>
                      <?php endforeach; ?>
                    </ol>
                  </div>
                </article>
              </div>

              <!-- Card: Procedimiento -->
              <div class="col-lg-6">
                <article class="card-custom" aria-labelledby="proc-pub-title">
                  <div class="card-custom-header" aria-hidden="true">
                    <span class="card-custom-dot card-custom-dot-vino"></span>
                    <span class="card-custom-dot card-custom-dot-dorado"></span>
                    <span class="card-custom-dot card-custom-dot-arena"></span>
                  </div>
                  <div class="card-custom-body">
                    <h3 class="card-custom-title" id="proc-pub-title">
                      <i class="bi bi-list-check" aria-hidden="true"></i>
                      Procedimiento
                    </h3>
                    <ol class="stepper-list" aria-label="Pasos del procedimiento para escuelas públicas">
                      <?php foreach ($procedimiento_publicas as $i => $paso): ?>
                        <li class="stepper-item">
                          <span class="step-number" aria-hidden="true"><?= $i + 1 ?></span>
                          <div class="step-content">
                            <p><?= $paso['texto'] ?></p>
                          </div>
                        </li>
                      <?php endforeach; ?>
                    </ol>
                  </div>
                </article>
              </div>

            </div><!-- /row -->

            <!-- Nota importante -->
            <div class="callout-nota mt-4" role="note" aria-label="Nota importante sobre menores de edad">
              <i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i>
              <div class="callout-nota-content">
                <strong>Nota Importante — Menores de Edad</strong>
                <p>
                  Si el solicitante es menor de edad, el padre o tutor deberá firmar la carta compromiso
                  y estar presente tanto en la entrega de documentación como en la apertura del expediente.
                </p>
              </div>
            </div>

            <!-- Formatos Descargables -->
            <div class="card-custom mt-4" aria-labelledby="formatos-pub-title">
              <div class="card-custom-header" aria-hidden="true">
                <span class="card-custom-dot card-custom-dot-vino"></span>
                <span class="card-custom-dot card-custom-dot-dorado"></span>
                <span class="card-custom-dot card-custom-dot-arena"></span>
              </div>
              <div class="card-custom-body">
                <h3 class="formatos-section-title" id="formatos-pub-title">
                  <i class="bi bi-file-earmark-arrow-down-fill" aria-hidden="true"></i>
                  Formatos Descargables
                </h3>
                <div class="formatos-grid">
                  <?php foreach ($formatos_publicas as $formato): ?>
                    <div class="formato-item">
                      <button class="download-button"
                              onclick="alert('Descargando <?= htmlspecialchars($formato['archivo'], ENT_QUOTES) ?>')"
                              aria-label="Descargar <?= htmlspecialchars($formato['nombre'], ENT_QUOTES) ?> (<?= htmlspecialchars($formato['archivo'], ENT_QUOTES) ?>)">
                        <div class="docs">
                          <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor"
                               stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                               aria-hidden="true">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                          </svg>
                          Descargar
                        </div>
                        <div class="download" aria-hidden="true">
                          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                               stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                          </svg>
                        </div>
                      </button>
                      <span class="formato-label"><?= htmlspecialchars($formato['nombre']) ?></span>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

          </div><!-- /tab-pane publicas -->

          <!-- ===================== TAB: ESCUELAS PRIVADAS ===================== -->
          <div class="tab-pane fade"
               id="privadas-pane"
               role="tabpanel"
               aria-labelledby="privadas-tab"
               tabindex="0">

            <!-- Badge gratuito -->
            <div class="badge-gratuito" aria-label="Costo del trámite: gratuito">
              <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
              GRATUITO
            </div>

            <div class="row g-4">

              <!-- Card: Requisitos -->
              <div class="col-lg-6">
                <article class="card-custom" aria-labelledby="req-priv-title">
                  <div class="card-custom-header" aria-hidden="true">
                    <span class="card-custom-dot card-custom-dot-vino"></span>
                    <span class="card-custom-dot card-custom-dot-dorado"></span>
                    <span class="card-custom-dot card-custom-dot-arena"></span>
                  </div>
                  <div class="card-custom-body">
                    <h3 class="card-custom-title" id="req-priv-title">
                      <i class="bi bi-clipboard-check-fill" aria-hidden="true"></i>
                      Requisitos
                    </h3>
                    <ol class="requisitos-list" aria-label="Lista de requisitos para escuelas privadas">
                      <?php foreach ($requisitos_privadas as $i => $req): ?>
                        <li>
                          <span class="req-number" aria-hidden="true"><?= $i + 1 ?></span>
                          <span><?= $req ?></span>
                        </li>
                      <?php endforeach; ?>
                    </ol>
                  </div>
                </article>
              </div>

              <!-- Card: Procedimiento -->
              <div class="col-lg-6">
                <article class="card-custom" aria-labelledby="proc-priv-title">
                  <div class="card-custom-header" aria-hidden="true">
                    <span class="card-custom-dot card-custom-dot-vino"></span>
                    <span class="card-custom-dot card-custom-dot-dorado"></span>
                    <span class="card-custom-dot card-custom-dot-arena"></span>
                  </div>
                  <div class="card-custom-body">
                    <h3 class="card-custom-title" id="proc-priv-title">
                      <i class="bi bi-list-check" aria-hidden="true"></i>
                      Procedimiento
                    </h3>
                    <ol class="stepper-list" aria-label="Pasos del procedimiento para escuelas privadas">
                      <?php foreach ($procedimiento_privadas as $i => $paso): ?>
                        <li class="stepper-item">
                          <span class="step-number" aria-hidden="true"><?= $i + 1 ?></span>
                          <div class="step-content">
                            <p><?= $paso['texto'] ?></p>
                          </div>
                        </li>
                      <?php endforeach; ?>
                    </ol>
                  </div>
                </article>
              </div>

            </div><!-- /row -->

            <!-- Nota importante -->
            <div class="callout-nota mt-4" role="note" aria-label="Nota importante sobre menores de edad">
              <i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i>
              <div class="callout-nota-content">
                <strong>Nota Importante — Menores de Edad</strong>
                <p>
                  Si el solicitante es menor de edad, el padre o tutor deberá firmar la carta compromiso
                  y estar presente tanto en la entrega de documentación como en la apertura del expediente.
                </p>
              </div>
            </div>

            <!-- Formatos Descargables -->
            <div class="card-custom mt-4" aria-labelledby="formatos-priv-title">
              <div class="card-custom-header" aria-hidden="true">
                <span class="card-custom-dot card-custom-dot-vino"></span>
                <span class="card-custom-dot card-custom-dot-dorado"></span>
                <span class="card-custom-dot card-custom-dot-arena"></span>
              </div>
              <div class="card-custom-body">
                <h3 class="formatos-section-title" id="formatos-priv-title">
                  <i class="bi bi-file-earmark-arrow-down-fill" aria-hidden="true"></i>
                  Formatos Descargables
                </h3>
                <div class="formatos-grid">
                  <?php foreach ($formatos_privadas as $formato): ?>
                    <div class="formato-item">
                      <button class="download-button"
                              onclick="alert('Descargando <?= htmlspecialchars($formato['archivo'], ENT_QUOTES) ?>')"
                              aria-label="Descargar <?= htmlspecialchars($formato['nombre'], ENT_QUOTES) ?> (<?= htmlspecialchars($formato['archivo'], ENT_QUOTES) ?>)">
                        <div class="docs">
                          <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor"
                               stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                               aria-hidden="true">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                          </svg>
                          Descargar
                        </div>
                        <div class="download" aria-hidden="true">
                          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                               stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                          </svg>
                        </div>
                      </button>
                      <span class="formato-label"><?= htmlspecialchars($formato['nombre']) ?></span>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

          </div><!-- /tab-pane privadas -->

        </div><!-- /tab-content -->
      </div><!-- /container -->
    </section>

    <!-- ============================================================
         SECCIÓN CONTACTO Y UBICACIÓN
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
              El Departamento de Servicio Social y Prácticas Profesionales se encuentra en el Palacio Municipal de Ecatepec.
            </p>

            <!-- Dirección -->
            <div class="info-card" role="region" aria-label="Dirección">
              <div class="info-card-icon" aria-hidden="true">
                <i class="bi bi-geo-alt-fill"></i>
              </div>
              <div class="info-card-content">
                <p class="info-card-label">Dirección</p>
                <p class="info-card-value">
                  Departamento de Servicio Social y Prácticas Profesionales<br>
                  Dirección de Educación, Palacio Municipal<br>
                  Av. Benito Juárez Sur S/N, Manzana 022,<br>
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
                  <span style="font-size:13px; color: var(--color-gray);">Extensiones: 1715 y 513</span>
                </p>
              </div>
            </div>

            <!-- Email Escuelas Públicas -->
            <div class="info-card" role="region" aria-label="Correo electrónico para escuelas públicas">
              <div class="info-card-icon" aria-hidden="true">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="info-card-content">
                <p class="info-card-label">Correo — Escuelas Públicas</p>
                <p class="info-card-value">
                  <a href="mailto:publicaeduservicio@ecatepec.gob.mx">publicaeduservicio@ecatepec.gob.mx</a>
                </p>
              </div>
            </div>

            <!-- Email Escuelas Privadas -->
            <div class="info-card" role="region" aria-label="Correo electrónico para escuelas privadas">
              <div class="info-card-icon" aria-hidden="true">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="info-card-content">
                <p class="info-card-label">Correo — Escuelas Privadas</p>
                <p class="info-card-value">
                  <a href="mailto:privadaeduservicio@ecatepec.gob.mx">privadaeduservicio@ecatepec.gob.mx</a>
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
        Dirección de Educación — Departamento de Servicio Social y Prácticas Profesionales
      </p>

      <p class="footer-copyright">
        &copy; <?= date('Y') ?> | H. Ayuntamiento de Ecatepec de Morelos | Todos los derechos reservados
      </p>

    </div>
  </footer>

  <!-- Custom JS — Bootstrap JS no requerido, tabs manejados con vanilla JS -->
  <script src="assets/js/main.js?v=<?= time() ?>"></script>

</body>
</html>
