<?php
/**
 * Configura Astra theme para Seramor
 * Ejecutar con: wp eval-file configure-astra.php
 */

// =============================================
// 1. GLOBAL COLOR PALETTE
// =============================================
$astra_settings = get_option('astra-settings', array());

// Astra 4.x Global Color Palette
$astra_settings['global-color-palette'] = array(
    'palette' => array(
        '#37432b',   // Color 1 — Verde bosque oscuro (primary)
        '#733015',   // Color 2 — Marrón oscuro (secondary/accent)
        '#fce8a4',   // Color 3 — Dorado cálido (accent 2)
        '#37432b',   // Color 4 — Verde bosque (heading text)
        '#4a4a3a',   // Color 5 — Body text (verde-gris oscuro)
        '#faf7f0',   // Color 6 — Background crema suave
        '#ffffff',   // Color 7 — White
        '#1a2214',   // Color 8 — Almost black (verde muy oscuro)
        '#f5f0e6',   // Color 9 — Crema alternativo
    ),
    'flag' => true,
);

// =============================================
// 2. TYPOGRAPHY — Body
// =============================================
$astra_settings['body-font-family'] = "'Cormorant Garamond', serif";
$astra_settings['body-font-weight'] = '400';
$astra_settings['body-font-size'] = array(
    'desktop'      => 17,
    'tablet'       => 16,
    'mobile'       => 15,
    'desktop-unit' => 'px',
    'tablet-unit'  => 'px',
    'mobile-unit'  => 'px',
);
$astra_settings['body-line-height'] = '1.75';
$astra_settings['body-text-transform'] = '';

// =============================================
// 3. TYPOGRAPHY — Headings
// =============================================
$astra_settings['headings-font-family'] = "'Montserrat', sans-serif";
$astra_settings['headings-font-weight'] = '500';
$astra_settings['headings-text-transform'] = 'uppercase';
$astra_settings['headings-line-height'] = '1.3';
$astra_settings['headings-letter-spacing'] = '2';

// Individual heading sizes
$astra_settings['font-size-h1'] = array(
    'desktop'      => 48,
    'tablet'       => 36,
    'mobile'       => 28,
    'desktop-unit' => 'px',
    'tablet-unit'  => 'px',
    'mobile-unit'  => 'px',
);
$astra_settings['font-size-h2'] = array(
    'desktop'      => 36,
    'tablet'       => 28,
    'mobile'       => 24,
    'desktop-unit' => 'px',
    'tablet-unit'  => 'px',
    'mobile-unit'  => 'px',
);
$astra_settings['font-size-h3'] = array(
    'desktop'      => 28,
    'tablet'       => 22,
    'mobile'       => 20,
    'desktop-unit' => 'px',
    'tablet-unit'  => 'px',
    'mobile-unit'  => 'px',
);
$astra_settings['font-size-h4'] = array(
    'desktop'      => 22,
    'tablet'       => 20,
    'mobile'       => 18,
    'desktop-unit' => 'px',
    'tablet-unit'  => 'px',
    'mobile-unit'  => 'px',
);

// =============================================
// 4. COLORS — Global
// =============================================
$astra_settings['text-color']              = '#4a4a3a';
$astra_settings['heading-base-color']      = '#37432b';
$astra_settings['link-color']              = '#733015';
$astra_settings['link-h-color']            = '#37432b';
$astra_settings['theme-color']             = '#37432b';
$astra_settings['site-background-color']   = '#faf7f0';

// =============================================
// 5. LAYOUT — Full Width, No Sidebar
// =============================================
$astra_settings['site-content-layout']       = 'full-width';
$astra_settings['site-content-style']        = 'unboxed';
$astra_settings['site-sidebar-layout']       = 'no-sidebar';
$astra_settings['single-page-sidebar-layout']= 'no-sidebar';
$astra_settings['single-post-sidebar-layout']= 'no-sidebar';
$astra_settings['archive-post-sidebar-layout']= 'no-sidebar';

// Container width
$astra_settings['site-content-width'] = 1200;

// Page-specific: full-width stretched
$astra_settings['single-page-content-layout'] = 'full-width';
$astra_settings['single-page-content-style']  = 'unboxed';

// =============================================
// 6. HEADER
// =============================================
$astra_settings['header-bg-obj-responsive'] = array(
    'desktop' => array(
        'background-color' => '#37432b',
    ),
    'tablet'  => array(
        'background-color' => '#37432b',
    ),
    'mobile'  => array(
        'background-color' => '#37432b',
    ),
);

// Site title / logo color
$astra_settings['header-color-site-title']   = '#fce8a4';
$astra_settings['header-color-h-site-title'] = '#ffffff';

// Header menu colors
$astra_settings['header-color-text-menu']    = '#fce8a4';
$astra_settings['header-color-h-text-menu']  = '#ffffff';

// Transparent header (disabled — we want solid verde bosque)
$astra_settings['transparent-header-enable'] = false;

// =============================================
// 7. FOOTER
// =============================================
$astra_settings['footer-bg-obj'] = array(
    'background-color' => '#1a2214',
);
$astra_settings['footer-color'] = '#fce8a4';
$astra_settings['footer-link-color'] = '#fce8a4';
$astra_settings['footer-link-h-color'] = '#ffffff';

// Footer copyright text
$astra_settings['footer-sml-layout'] = 'footer-sml-layout-1';
$astra_settings['footer-sml-section-1'] = '© 2026 Seramor — Círculo de Mujeres Online';

// =============================================
// 8. BUTTONS — Global
// =============================================
$astra_settings['button-color']       = '#37432b';
$astra_settings['button-h-color']     = '#fce8a4';
$astra_settings['button-bg-color']    = '#fce8a4';
$astra_settings['button-bg-h-color']  = '#37432b';
$astra_settings['button-radius']      = 30;
$astra_settings['button-font-family'] = "'Montserrat', sans-serif";
$astra_settings['button-font-weight'] = '600';
$astra_settings['button-text-transform'] = 'uppercase';
$astra_settings['button-font-size'] = array(
    'desktop'      => 14,
    'tablet'       => 14,
    'mobile'       => 13,
    'desktop-unit' => 'px',
    'tablet-unit'  => 'px',
    'mobile-unit'  => 'px',
);
$astra_settings['theme-btn-padding'] = array(
    'desktop' => array(
        'top'    => 16,
        'right'  => 40,
        'bottom' => 16,
        'left'   => 40,
    ),
    'tablet'  => array(
        'top'    => 14,
        'right'  => 30,
        'bottom' => 14,
        'left'   => 30,
    ),
    'mobile'  => array(
        'top'    => 12,
        'right'  => 24,
        'bottom' => 12,
        'left'   => 24,
    ),
    'desktop-unit' => 'px',
    'tablet-unit'  => 'px',
    'mobile-unit'  => 'px',
);
$astra_settings['button-letter-spacing'] = '1.5';

// =============================================
// 9. MISC
// =============================================
// Disable breadcrumbs
$astra_settings['breadcrumb-position'] = 'none';

// Disable title on pages (we'll use custom heroes)
$astra_settings['page-title-area'] = false;

// Save all settings
update_option('astra-settings', $astra_settings);

echo "✅ Astra configurado:\n";
echo "   - Paleta: #37432b, #fce8a4, #733015 + crema/blanco\n";
echo "   - Tipografía: Montserrat (títulos) + Cormorant Garamond (cuerpo)\n";
echo "   - Layout: Full-width, sin sidebar, 1200px contenedor\n";
echo "   - Header: Fondo verde bosque, texto dorado\n";
echo "   - Footer: Fondo verde oscuro, texto dorado\n";
echo "   - Botones: Fondo dorado, texto verde, uppercase, redondeados\n";
echo "   - Breadcrumbs: desactivados\n";
echo "   - Page title area: desactivada\n";
