<?php
/**
 * Configura Astra theme para Seramor — V2
 *
 * Paleta y tipografias alineadas a la landing v6 (wine/cream/dark/gold).
 * Ejecutar: c:\xampp\php\php.exe c:\xampp\htdocs\seramor\wp-cli.phar eval-file scripts/configure-astra-v2.php --path="c:\xampp\htdocs\seramor"
 */

$astra_settings = get_option( 'astra-settings', [] );

// Colores de marca Seramor
$WINE  = '#743014';
$DARK  = '#3a2614';
$GOLD  = '#e9d1a7';
$CREAM = '#f5e6c4';
$BONE  = '#f2ede6';

// =============================================
// 1. GLOBAL COLOR PALETTE (visible en color picker)
// =============================================
// Astra mapea por convencion los colores asi:
//   color-0 link/primary, color-1 secondary, color-2 text, color-3 heading,
//   color-4 site-content background, color-5 site background,
//   color-6 inverse text, color-7 borders, color-8 subtle bg.
$astra_settings['global-color-palette'] = [
    'palette' => [
        $WINE,     // 0 primary (links, buttons)
        $DARK,     // 1 secondary (hover)
        '#5a3a28', // 2 body text (marron suave)
        $WINE,     // 3 heading text
        $BONE,     // 4 site-content background  <-- IMPORTANTE
        $BONE,     // 5 site background
        '#ffffff', // 6 inverse text
        $GOLD,     // 7 borders/accent
        $CREAM,    // 8 subtle background
    ],
    'flag' => true,
];

// =============================================
// 2. TIPOGRAFIA — Body
// =============================================
$astra_settings['body-font-family']     = "'Cormorant Garamond', serif";
$astra_settings['body-font-weight']     = '400';
$astra_settings['body-line-height']     = '1.75';
$astra_settings['body-text-transform']  = '';
$astra_settings['body-font-size'] = [
    'desktop'      => 18,
    'tablet'       => 17,
    'mobile'       => 16,
    'desktop-unit' => 'px',
    'tablet-unit'  => 'px',
    'mobile-unit'  => 'px',
];

// =============================================
// 3. TIPOGRAFIA — Headings
// =============================================
$astra_settings['headings-font-family']    = "'Cormorant Garamond', serif";
$astra_settings['headings-font-weight']    = '500';
$astra_settings['headings-text-transform'] = 'uppercase';
$astra_settings['headings-line-height']    = '1.2';
$astra_settings['headings-letter-spacing'] = '3';

$astra_settings['font-size-h1'] = [ 'desktop' => 72, 'tablet' => 56, 'mobile' => 40, 'desktop-unit' => 'px', 'tablet-unit' => 'px', 'mobile-unit' => 'px' ];
$astra_settings['font-size-h2'] = [ 'desktop' => 56, 'tablet' => 44, 'mobile' => 34, 'desktop-unit' => 'px', 'tablet-unit' => 'px', 'mobile-unit' => 'px' ];
$astra_settings['font-size-h3'] = [ 'desktop' => 36, 'tablet' => 30, 'mobile' => 26, 'desktop-unit' => 'px', 'tablet-unit' => 'px', 'mobile-unit' => 'px' ];
$astra_settings['font-size-h4'] = [ 'desktop' => 28, 'tablet' => 24, 'mobile' => 22, 'desktop-unit' => 'px', 'tablet-unit' => 'px', 'mobile-unit' => 'px' ];
$astra_settings['font-size-h5'] = [ 'desktop' => 22, 'tablet' => 20, 'mobile' => 18, 'desktop-unit' => 'px', 'tablet-unit' => 'px', 'mobile-unit' => 'px' ];
$astra_settings['font-size-h6'] = [ 'desktop' => 18, 'tablet' => 16, 'mobile' => 14, 'desktop-unit' => 'px', 'tablet-unit' => 'px', 'mobile-unit' => 'px' ];

// =============================================
// 4. COLORES GLOBALES
// =============================================
$astra_settings['text-color']            = '#5a3a28';
$astra_settings['heading-base-color']    = $WINE;
$astra_settings['link-color']            = $WINE;
$astra_settings['link-h-color']          = $DARK;
$astra_settings['theme-color']           = $WINE;
$astra_settings['site-background-color'] = $BONE;

// =============================================
// 5. LAYOUT — full-width, sin sidebar
// =============================================
$astra_settings['site-content-layout']         = 'full-width';
$astra_settings['site-content-style']          = 'unboxed';
$astra_settings['site-sidebar-layout']         = 'no-sidebar';
$astra_settings['single-page-sidebar-layout']  = 'no-sidebar';
$astra_settings['single-post-sidebar-layout']  = 'no-sidebar';
$astra_settings['archive-post-sidebar-layout'] = 'no-sidebar';
$astra_settings['site-content-width']          = 1200;
$astra_settings['single-page-content-layout']  = 'full-width';
$astra_settings['single-page-content-style']   = 'unboxed';

// Desactivar breadcrumbs y page title (cada pagina arma su propio hero)
$astra_settings['breadcrumb-position'] = 'none';
$astra_settings['page-title-area']     = false;

// =============================================
// 6. HEADER — fondo wine, texto cream
// =============================================
$astra_settings['header-bg-obj-responsive'] = [
    'desktop' => [ 'background-color' => $WINE ],
    'tablet'  => [ 'background-color' => $WINE ],
    'mobile'  => [ 'background-color' => $WINE ],
];
$astra_settings['header-color-site-title']   = $CREAM;
$astra_settings['header-color-h-site-title'] = '#ffffff';
$astra_settings['header-color-text-menu']    = $CREAM;
$astra_settings['header-color-h-text-menu']  = $GOLD;
$astra_settings['transparent-header-enable'] = false;

// =============================================
// 7. FOOTER — fondo dark, texto cream
// =============================================
$astra_settings['footer-bg-obj']        = [ 'background-color' => $DARK ];
$astra_settings['footer-color']         = $CREAM;
$astra_settings['footer-link-color']    = $CREAM;
$astra_settings['footer-link-h-color']  = $GOLD;
$astra_settings['footer-sml-layout']    = 'footer-sml-layout-1';
$astra_settings['footer-sml-section-1'] = '© 2026 Seramor — Circulo de Mujeres Online';

// =============================================
// 8. BOTONES — pill cream sobre wine
// =============================================
$astra_settings['button-color']          = $CREAM;
$astra_settings['button-h-color']        = '#ffffff';
$astra_settings['button-bg-color']       = $WINE;
$astra_settings['button-bg-h-color']     = $DARK;
$astra_settings['button-radius']         = 999;
$astra_settings['button-font-family']    = "'Cormorant Garamond', serif";
$astra_settings['button-font-weight']    = '500';
$astra_settings['button-text-transform'] = 'uppercase';
$astra_settings['button-letter-spacing'] = '3';
$astra_settings['button-font-size'] = [
    'desktop'      => 14,
    'tablet'       => 13,
    'mobile'       => 12,
    'desktop-unit' => 'px',
    'tablet-unit'  => 'px',
    'mobile-unit'  => 'px',
];
$astra_settings['theme-btn-padding'] = [
    'desktop' => [ 'top' => 14, 'right' => 38, 'bottom' => 14, 'left' => 38 ],
    'tablet'  => [ 'top' => 13, 'right' => 32, 'bottom' => 13, 'left' => 32 ],
    'mobile'  => [ 'top' => 12, 'right' => 28, 'bottom' => 12, 'left' => 28 ],
    'desktop-unit' => 'px', 'tablet-unit' => 'px', 'mobile-unit' => 'px',
];

// =============================================
// 9. CONTAINER PADDING (espacio agradable en interiores)
// =============================================
$astra_settings['site-content-padding'] = [
    'desktop' => [ 'top' => 80, 'right' => 0, 'bottom' => 80, 'left' => 0 ],
    'tablet'  => [ 'top' => 60, 'right' => 0, 'bottom' => 60, 'left' => 0 ],
    'mobile'  => [ 'top' => 40, 'right' => 0, 'bottom' => 40, 'left' => 0 ],
    'desktop-unit' => 'px', 'tablet-unit' => 'px', 'mobile-unit' => 'px',
];

update_option( 'astra-settings', $astra_settings );

WP_CLI::success( 'Astra V2 configurado.' );
WP_CLI::log( '  Paleta: wine ' . $WINE . ', dark ' . $DARK . ', gold ' . $GOLD . ', cream ' . $CREAM . ', bone ' . $BONE );
WP_CLI::log( '  Tipografia: Cormorant Garamond (titulos uppercase + body)' );
WP_CLI::log( '  Layout: full-width, no sidebar, 1200px container' );
WP_CLI::log( '  Header wine / Footer dark / Botones pill wine sobre cream' );
