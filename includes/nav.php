<?php
/* ============================================================
   NAVBAR INSTITUCIONAL — REUTILIZABLE
   Archivo: includes/nav.php
   ------------------------------------------------------------
   USO:
     <?php $paginaActual = 'servicio-social'; include 'includes/nav.php'; ?>
   ------------------------------------------------------------
   Slugs disponibles (definidos abajo en $menu):
     inicio, gobierno, cabildo, organigrama, organos-autonomos, instituto-mujeres, enlace-municipal,
     transparencia, obligaciones-transparencia, programas-sociales, plan-desarrollo, nombramientos,
     programa-anual-evaluacion, estrados-edictos, srft, aviso-privacidad, ley-contabilidad,
     conac, sevac, ipomex,
     tramites, remtys, servicios, predial, servicio-social,
     participacion, convocatorias, consulta-publica, protesta-ciudadana,
     mejora-regulatoria, catalogo-regulaciones, programa-anual-mr, padron-inspectores, plan-desarrollo-urbano,
     conoce-ecatepec, cultura, galeria, boletin, comunidad-nido, gacetas,
     contacto
   ============================================================ */

if (!isset($paginaActual) || !is_string($paginaActual)) {
    $paginaActual = '';
}

/* ------------------------------------------------------------
   ESTRUCTURA DEL MENÚ — fácilmente editable
   Cada item: ['label', 'url', 'slug', 'children' => [...]]
   children pueden tener su propio array 'children' (sub-submenu)
   ------------------------------------------------------------ */
$menu = [
    [
        'label' => 'Inicio',
        'url'   => 'index.php',
        'slug'  => 'inicio',
    ],
    [
        'label'    => 'Gobierno',
        'url'      => '#',
        'slug'     => 'gobierno',
        'children' => [
            ['label' => 'Cabildo',                                     'url' => '#', 'slug' => 'cabildo'],
            ['label' => 'Organigrama',                                 'url' => '#', 'slug' => 'organigrama'],
            ['label' => 'Órganos Autónomos',                           'url' => '#', 'slug' => 'organos-autonomos'],
            ['label' => 'Instituto de las Mujeres e Igualdad de Género','url'=> '#', 'slug' => 'instituto-mujeres'],
            ['label' => 'Enlace Municipal',                            'url' => '#', 'slug' => 'enlace-municipal'],
        ],
    ],
    [
        'label'    => 'Transparencia',
        'url'      => '#',
        'slug'     => 'transparencia',
        'children' => [
            ['label' => 'Obligaciones de Transparencia',     'url' => '#', 'slug' => 'obligaciones-transparencia'],
            ['label' => 'Programas Sociales',                'url' => '#', 'slug' => 'programas-sociales'],
            ['label' => 'Plan de Desarrollo Municipal',      'url' => '#', 'slug' => 'plan-desarrollo'],
            ['label' => 'Nombramientos',                     'url' => '#', 'slug' => 'nombramientos'],
            ['label' => 'Programa Anual de Evaluación',      'url' => '#', 'slug' => 'programa-anual-evaluacion'],
            ['label' => 'Estrados y Edictos',                'url' => '#', 'slug' => 'estrados-edictos'],
            ['label' => 'SRFT',                              'url' => '#', 'slug' => 'srft'],
            ['label' => 'Aviso de Privacidad Integral',      'url' => '#', 'slug' => 'aviso-privacidad'],
            [
                'label'    => 'Ley General de Contabilidad Gubernamental',
                'url'      => '#',
                'slug'     => 'ley-contabilidad',
                'children' => [
                    ['label' => 'CONAC',  'url' => '#', 'slug' => 'conac'],
                    ['label' => 'SEVAC',  'url' => '#', 'slug' => 'sevac'],
                    ['label' => 'IPOMEX', 'url' => '#', 'slug' => 'ipomex'],
                ],
            ],
        ],
    ],
    [
        'label'    => 'Trámites y Servicios',
        'url'      => '#',
        'slug'     => 'tramites',
        'children' => [
            ['label' => 'REMTYS',                                  'url' => 'remtys.php', 'slug' => 'remtys'],
            ['label' => 'Servicios',                               'url' => '#',          'slug' => 'servicios'],
            ['label' => 'Pago Predial en Línea',                   'url' => '#',          'slug' => 'predial'],
            ['label' => 'Servicio Social y Prácticas Profesionales','url'=> 'index.php',  'slug' => 'servicio-social'],
        ],
    ],
    [
        'label'    => 'Participación Ciudadana',
        'url'      => '#',
        'slug'     => 'participacion',
        'children' => [
            ['label' => 'Convocatorias',       'url' => '#', 'slug' => 'convocatorias'],
            ['label' => 'Consulta Pública',    'url' => '#', 'slug' => 'consulta-publica'],
            ['label' => 'Protesta Ciudadana',  'url' => '#', 'slug' => 'protesta-ciudadana'],
        ],
    ],
    [
        'label'    => 'Mejora Regulatoria',
        'url'      => '#',
        'slug'     => 'mejora-regulatoria',
        'children' => [
            ['label' => 'Catálogo Municipal de Regulaciones',         'url' => '#', 'slug' => 'catalogo-regulaciones'],
            ['label' => 'Programa Anual',                             'url' => '#', 'slug' => 'programa-anual-mr'],
            ['label' => 'Padrón de Inspectores',                      'url' => '#', 'slug' => 'padron-inspectores'],
            ['label' => 'Plan Municipal Desarrollo Urbano EDOMEX 2022','url'=> '#', 'slug' => 'plan-desarrollo-urbano'],
        ],
    ],
    [
        'label'    => 'Conoce Ecatepec',
        'url'      => '#',
        'slug'     => 'conoce-ecatepec',
        'children' => [
            ['label' => 'Cultura',         'url' => '#', 'slug' => 'cultura'],
            ['label' => 'Galería',         'url' => '#', 'slug' => 'galeria'],
            ['label' => 'Boletín',         'url' => '#', 'slug' => 'boletin'],
            ['label' => 'Comunidad Nido',  'url' => '#', 'slug' => 'comunidad-nido'],
            ['label' => 'Gacetas',         'url' => '#', 'slug' => 'gacetas'],
        ],
    ],
    [
        'label' => 'Contacto',
        'url'   => '#',
        'slug'  => 'contacto',
    ],
];

/* ------------------------------------------------------------
   Helpers: detectar si un item (o cualquier descendiente) está activo
   ------------------------------------------------------------ */
function nav_item_contiene_activo(array $item, string $actual): bool {
    if (($item['slug'] ?? '') === $actual) {
        return true;
    }
    if (!empty($item['children']) && is_array($item['children'])) {
        foreach ($item['children'] as $hijo) {
            if (nav_item_contiene_activo($hijo, $actual)) {
                return true;
            }
        }
    }
    return false;
}

function nav_render_subitem(array $hijo, string $actual): string {
    $esActivo = (($hijo['slug'] ?? '') === $actual);
    $tieneHijos = !empty($hijo['children']) && is_array($hijo['children']);
    $clase = 'dropdown-item';
    if ($esActivo) { $clase .= ' is-active'; }
    $aria = $esActivo ? ' aria-current="page"' : '';

    $html  = '';
    if ($tieneHijos) {
        // Sub-grupo (caso "Ley General de Contabilidad" → CONAC/SEVAC/IPOMEX)
        $html .= '<li class="dropdown-subgroup" role="none">';
        $html .= '  <div class="dropdown-subgroup-title">' . htmlspecialchars($hijo['label']) . '</div>';
        $html .= '  <ul class="dropdown-subgroup-list" role="group" aria-label="' . htmlspecialchars($hijo['label']) . '">';
        foreach ($hijo['children'] as $sub) {
            $subActivo = (($sub['slug'] ?? '') === $actual);
            $subClase  = 'dropdown-item dropdown-subitem' . ($subActivo ? ' is-active' : '');
            $subAria   = $subActivo ? ' aria-current="page"' : '';
            $html .= '    <li role="none">';
            $html .= '      <a href="' . htmlspecialchars($sub['url']) . '" class="' . $subClase . '" role="menuitem"' . $subAria . '>'
                  .         htmlspecialchars($sub['label'])
                  .       '</a>';
            $html .= '    </li>';
        }
        $html .= '  </ul>';
        $html .= '</li>';
    } else {
        $html .= '<li role="none">';
        $html .= '  <a href="' . htmlspecialchars($hijo['url']) . '" class="' . $clase . '" role="menuitem"' . $aria . '>'
              .       htmlspecialchars($hijo['label'])
              .     '</a>';
        $html .= '</li>';
    }
    return $html;
}
?>
<nav class="navbar-institucional" role="navigation" aria-label="Navegación institucional">
  <div class="navbar-inst-inner">

    <div class="navbar-inst-logo">
      <a href="index.php" aria-label="Ir al inicio — H. Ayuntamiento de Ecatepec de Morelos">
        <img src="https://ecatepec.gob.mx/wp-content/themes/blocksy-child/img/logo-ecatepec-blanco.png"
             alt="Ecatepec de Morelos"
             height="50"
             onerror="this.style.display='none'">
      </a>
    </div>

    <ul class="navbar-inst-menu" id="navbarInstMenu" role="menubar">
      <?php foreach ($menu as $idx => $item):
        $tieneHijos     = !empty($item['children']) && is_array($item['children']);
        $padreActivo    = nav_item_contiene_activo($item, $paginaActual);
        $claseTrigger   = 'dropdown-trigger';
        if ($padreActivo)  { $claseTrigger .= ' is-active'; }
        $dropdownId     = 'nav-dd-' . $idx;
      ?>
        <li class="navbar-inst-item<?= $tieneHijos ? ' has-dropdown' : '' ?>" role="none">
          <?php if ($tieneHijos): ?>
            <button type="button"
                    class="<?= $claseTrigger ?>"
                    role="menuitem"
                    aria-haspopup="true"
                    aria-expanded="false"
                    aria-controls="<?= $dropdownId ?>">
              <span><?= htmlspecialchars($item['label']) ?></span>
              <i class="bi bi-chevron-down dropdown-caret" aria-hidden="true"></i>
            </button>
            <div class="dropdown-panel" id="<?= $dropdownId ?>" role="menu" aria-label="<?= htmlspecialchars($item['label']) ?>">
              <ul class="dropdown-list">
                <?php foreach ($item['children'] as $hijo): ?>
                  <?= nav_render_subitem($hijo, $paginaActual) ?>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php else: ?>
            <a href="<?= htmlspecialchars($item['url']) ?>"
               class="<?= $claseTrigger ?>"
               role="menuitem"
               <?= $padreActivo ? 'aria-current="page"' : '' ?>>
              <span><?= htmlspecialchars($item['label']) ?></span>
            </a>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>

    <button class="navbar-inst-toggler"
            type="button"
            onclick="toggleInstNav()"
            aria-controls="navbarInstMobile"
            aria-expanded="false"
            aria-label="Abrir menú de navegación">
      <i class="bi bi-list" aria-hidden="true"></i>
    </button>
  </div>

  <!-- Mobile drawer — acordeón -->
  <div class="navbar-inst-mobile" id="navbarInstMobile" aria-hidden="true">
    <ul class="navbar-mobile-list">
      <?php foreach ($menu as $idx => $item):
        $tieneHijos  = !empty($item['children']) && is_array($item['children']);
        $padreActivo = nav_item_contiene_activo($item, $paginaActual);
        $mobileId    = 'nav-mob-' . $idx;
      ?>
        <li class="navbar-mobile-item<?= $tieneHijos ? ' has-dropdown' : '' ?><?= $padreActivo ? ' is-active' : '' ?>">
          <?php if ($tieneHijos): ?>
            <button type="button"
                    class="navbar-mobile-trigger"
                    aria-expanded="false"
                    aria-controls="<?= $mobileId ?>">
              <span><?= htmlspecialchars($item['label']) ?></span>
              <i class="bi bi-chevron-down" aria-hidden="true"></i>
            </button>
            <ul class="navbar-mobile-submenu" id="<?= $mobileId ?>" hidden>
              <?php foreach ($item['children'] as $hijo):
                $hijoActivo  = (($hijo['slug'] ?? '') === $paginaActual);
                $hijoTieneHijos = !empty($hijo['children']) && is_array($hijo['children']);
              ?>
                <?php if ($hijoTieneHijos): ?>
                  <li class="navbar-mobile-subgroup">
                    <div class="navbar-mobile-subgroup-title"><?= htmlspecialchars($hijo['label']) ?></div>
                    <ul>
                      <?php foreach ($hijo['children'] as $sub):
                        $subActivo = (($sub['slug'] ?? '') === $paginaActual);
                      ?>
                        <li>
                          <a href="<?= htmlspecialchars($sub['url']) ?>"
                             class="navbar-mobile-sublink<?= $subActivo ? ' is-active' : '' ?>"
                             <?= $subActivo ? 'aria-current="page"' : '' ?>>
                            <?= htmlspecialchars($sub['label']) ?>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </li>
                <?php else: ?>
                  <li>
                    <a href="<?= htmlspecialchars($hijo['url']) ?>"
                       class="navbar-mobile-sublink<?= $hijoActivo ? ' is-active' : '' ?>"
                       <?= $hijoActivo ? 'aria-current="page"' : '' ?>>
                      <?= htmlspecialchars($hijo['label']) ?>
                    </a>
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <a href="<?= htmlspecialchars($item['url']) ?>"
               class="navbar-mobile-link<?= $padreActivo ? ' is-active' : '' ?>"
               <?= $padreActivo ? 'aria-current="page"' : '' ?>>
              <?= htmlspecialchars($item['label']) ?>
            </a>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>
