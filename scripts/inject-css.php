<?php
/**
 * Inyecta CSS global personalizado para Seramor
 * Ejecutar con: wp eval-file inject-css.php
 */

$css = <<<'CSS'
/* ============================
   SERAMOR — Global Custom CSS
   ============================ */

/* Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Montserrat:wght@300;400;500;600;700&family=Great+Vibes&display=swap');

/* ---- CSS Variables ---- */
:root {
    --seramor-verde:    #37432b;
    --seramor-dorado:   #fce8a4;
    --seramor-marron:   #733015;
    --seramor-crema:    #faf7f0;
    --seramor-blanco:   #ffffff;
    --seramor-negro:    #1a2214;
    --font-heading:     'Montserrat', sans-serif;
    --font-body:        'Cormorant Garamond', serif;
    --font-script:      'Great Vibes', cursive;
}

/* ---- Full-width sections ---- */
.wp-block-group.alignfull,
.wp-block-cover.alignfull {
    width: 100vw;
    max-width: 100vw;
    margin-left: calc(-50vw + 50%);
    padding: 80px 5%;
}

/* ---- Section Backgrounds ---- */
.seccion-verde {
    background-color: var(--seramor-verde) !important;
    color: var(--seramor-crema);
}
.seccion-verde h1, .seccion-verde h2, .seccion-verde h3,
.seccion-verde h4, .seccion-verde h5, .seccion-verde h6 {
    color: var(--seramor-dorado) !important;
}

.seccion-crema {
    background-color: var(--seramor-crema) !important;
    color: var(--seramor-verde);
}
.seccion-crema h1, .seccion-crema h2, .seccion-crema h3,
.seccion-crema h4, .seccion-crema h5, .seccion-crema h6 {
    color: var(--seramor-verde) !important;
}

.seccion-imagen {
    position: relative;
}
.seccion-imagen .wp-block-cover__inner-container {
    position: relative;
    z-index: 2;
}

/* ---- Typography ---- */
h1, h2, h3, h4, h5, h6 {
    font-family: var(--font-heading);
    text-transform: uppercase;
    letter-spacing: 2px;
    line-height: 1.3;
}

body, p, li, td {
    font-family: var(--font-body);
    font-size: 17px;
    line-height: 1.75;
}

/* Script/cursive emphasis */
.texto-script,
em.script {
    font-family: var(--font-script) !important;
    font-style: normal;
    text-transform: none;
    letter-spacing: 0;
    font-size: 1.3em;
}

/* ---- Buttons — Dorado sobre verde ---- */
.wp-block-button__link,
.ast-button,
a.wp-block-button__link {
    background-color: var(--seramor-dorado) !important;
    color: var(--seramor-verde) !important;
    border: 2px solid var(--seramor-dorado) !important;
    border-radius: 30px !important;
    font-family: var(--font-heading);
    font-weight: 600;
    font-size: 14px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 16px 40px;
    transition: all 0.3s ease;
    text-decoration: none;
}
.wp-block-button__link:hover,
.ast-button:hover,
a.wp-block-button__link:hover {
    background-color: var(--seramor-verde) !important;
    color: var(--seramor-dorado) !important;
    border-color: var(--seramor-dorado) !important;
}

/* Outline button variant */
.is-style-outline .wp-block-button__link {
    background-color: transparent !important;
    color: var(--seramor-dorado) !important;
    border: 2px solid var(--seramor-dorado) !important;
}
.is-style-outline .wp-block-button__link:hover {
    background-color: var(--seramor-dorado) !important;
    color: var(--seramor-verde) !important;
}

/* ---- Cover overlay verde ---- */
.wp-block-cover.overlay-verde .wp-block-cover__background {
    background-color: var(--seramor-verde) !important;
    opacity: 0.75;
}

/* ---- Separador dorado ---- */
.wp-block-separator.separador-dorado {
    border-color: var(--seramor-dorado) !important;
    width: 60px;
    border-width: 2px;
    margin: 30px auto;
}

/* ---- Quotes / Testimonials ---- */
.wp-block-quote {
    border-left: 4px solid var(--seramor-dorado);
    padding-left: 24px;
    font-family: var(--font-body);
    font-style: italic;
    font-size: 1.15em;
}
.wp-block-quote cite {
    font-family: var(--font-heading);
    font-size: 0.8em;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--seramor-marron);
}

/* ---- Spacing helpers ---- */
.padding-xl { padding: 100px 5%; }
.padding-lg { padding: 80px 5%; }
.padding-md { padding: 60px 5%; }

/* ---- Header tweaks ---- */
.ast-primary-header-bar {
    background-color: var(--seramor-verde) !important;
}
.ast-header-break-point .ast-primary-header-bar {
    background-color: var(--seramor-verde) !important;
}

/* ---- Footer ---- */
.ast-footer-overlay,
.site-footer {
    background-color: var(--seramor-negro) !important;
    color: var(--seramor-dorado) !important;
}
.site-footer a {
    color: var(--seramor-dorado) !important;
}
.site-footer a:hover {
    color: var(--seramor-blanco) !important;
}

/* ---- Responsive ---- */
@media (max-width: 768px) {
    .wp-block-group.alignfull,
    .wp-block-cover.alignfull {
        padding: 50px 4%;
    }
    h1 { font-size: 28px !important; }
    h2 { font-size: 24px !important; }
    h3 { font-size: 20px !important; }
    .wp-block-button__link {
        padding: 12px 24px;
        font-size: 13px;
    }
}

/* ---- Contacto / Conoce, visita y contacta ---- */
.seramor-contact-page {
    background: var(--seramor-crema);
    color: var(--seramor-verde);
}
/* Ocultar titulo nativo del tema en la pagina de contacto (evita duplicado con el headline). */
.page-id-22 .entry-header,
.page-id-22 .ast-archive-description,
.page-id-22 header.entry-header,
body.page-id-22 .ast-single-post-order > .entry-header {
    display: none !important;
}
.seramor-contact-page .alignfull {
    margin-left: calc(50% - 50vw) !important;
    width: 100vw !important;
    max-width: 100vw !important;
}
.seramor-contact-hero {
    background: linear-gradient(180deg, #f7eed8 0%, #faf2dd 100%);
    padding: 110px 6% 90px;
    text-align: center;
}
.seramor-contact-hero-inner {
    max-width: 760px;
    margin: 0 auto;
}
.seramor-contact-eyebrow {
    font-family: var(--font-heading);
    font-size: 12px;
    letter-spacing: 5px;
    text-transform: uppercase;
    color: var(--seramor-marron);
    margin: 0 0 18px;
}
.seramor-contact-headline {
    font-family: var(--font-body);
    font-style: italic;
    font-weight: 500;
    font-size: clamp(34px, 5vw, 54px);
    line-height: 1.15;
    letter-spacing: 0;
    text-transform: none;
    color: var(--seramor-verde);
    margin: 0;
}
.seramor-contact-lead {
    font-family: var(--font-body);
    font-size: 19px;
    line-height: 1.7;
    color: #5a4632;
    margin: 26px auto 0;
    max-width: 620px;
}
.seramor-contact-channels {
    background: var(--seramor-crema);
    padding: 90px 6%;
}
.seramor-contact-channels-inner {
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 28px;
}
.seramor-channel-card {
    background: #ffffff;
    border-radius: 22px;
    padding: 42px 32px 38px;
    box-shadow: 0 12px 32px rgba(58, 38, 20, 0.08);
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.seramor-channel-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 40px rgba(58, 38, 20, 0.12);
}
.seramor-channel-icon {
    width: 56px;
    height: 56px;
    border-radius: 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 22px;
    color: #ffffff;
}
.seramor-channel-icon svg {
    width: 30px;
    height: 30px;
}
.seramor-channel-icon-wa { background: #25D366; }
.seramor-channel-icon-mail { background: var(--seramor-marron); }
.seramor-channel-icon-ig { background: linear-gradient(135deg, #f58529 0%, #dd2a7b 50%, #8134af 100%); }
.seramor-channel-eyebrow {
    font-family: var(--font-heading);
    font-size: 11px;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: var(--seramor-marron);
    margin: 0 0 8px;
}
.seramor-channel-title {
    font-family: var(--font-body);
    font-style: italic;
    font-weight: 500;
    font-size: 26px;
    line-height: 1.25;
    text-transform: none;
    letter-spacing: 0;
    color: var(--seramor-verde);
    margin: 0 0 14px;
}
.seramor-channel-text {
    font-family: var(--font-body);
    font-size: 17px;
    line-height: 1.65;
    color: #5a4632;
    margin: 0 0 26px;
}
.seramor-channel-cta {
    margin-top: auto;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: var(--seramor-verde);
    color: var(--seramor-dorado) !important;
    border-radius: 999px;
    padding: 14px 28px;
    font-family: var(--font-heading);
    font-weight: 600;
    font-size: 13px;
    letter-spacing: 2px;
    text-transform: uppercase;
    text-decoration: none !important;
    transition: all 0.3s ease;
}
.seramor-channel-cta:hover {
    background: var(--seramor-marron);
    color: var(--seramor-dorado) !important;
}
.seramor-channel-cta-wa {
    background: #25D366;
    color: #ffffff !important;
    box-shadow: 0 8px 18px rgba(37, 211, 102, 0.28);
}
.seramor-channel-cta-wa:hover {
    background: #1ebe5d;
    color: #ffffff !important;
}
.seramor-contact-tips {
    background: #f1e7cf;
    padding: 90px 6%;
}
.seramor-contact-tips-inner {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.1fr 0.9fr;
    gap: 60px;
    align-items: center;
}
.seramor-contact-subheadline {
    font-family: var(--font-body);
    font-style: italic;
    font-weight: 500;
    font-size: clamp(28px, 3.6vw, 40px);
    line-height: 1.2;
    text-transform: none;
    letter-spacing: 0;
    color: var(--seramor-verde);
    margin: 14px 0 24px;
}
.seramor-contact-tips-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.seramor-contact-tips-list li {
    position: relative;
    padding-left: 28px;
    margin-bottom: 14px;
    font-family: var(--font-body);
    font-size: 18px;
    line-height: 1.7;
    color: #5a4632;
}
.seramor-contact-tips-list li::before {
    content: "";
    position: absolute;
    left: 0;
    top: 14px;
    width: 14px;
    height: 2px;
    background: var(--seramor-marron);
}
.seramor-contact-tips-image img {
    width: 100%;
    height: auto;
    border-radius: 22px;
    box-shadow: 0 18px 40px rgba(58, 38, 20, 0.18);
    display: block;
}
@media (max-width: 900px) {
    .seramor-contact-channels-inner { grid-template-columns: 1fr; }
    .seramor-contact-tips-inner { grid-template-columns: 1fr; }
    .seramor-contact-hero { padding: 80px 6% 64px; }
    .seramor-contact-channels,
    .seramor-contact-tips { padding: 64px 6%; }
}

/* ---- Legales (Politica de privacidad, Aviso legal, Cookies, Terminos) ---- */
/* Pagina sobria de lectura. Sin hero gigante, tipografia legible, TOC lateral. */
.seramor-legal-page {
    background: var(--seramor-crema);
    color: #3a2e20;
}
/* Ocultar titulo nativo del tema (lo sustituye el header interno). */
.page-id-3 .entry-header,
.page-id-3 .ast-archive-description,
.page-id-3 header.entry-header,
body.page-id-3 .ast-single-post-order > .entry-header {
    display: none !important;
}
.seramor-legal-page .alignfull {
    margin-left: calc(50% - 50vw) !important;
    width: 100vw !important;
    max-width: 100vw !important;
}
.seramor-legal-header {
    background: #f3ead3;
    border-bottom: 1px solid rgba(115, 48, 21, 0.15);
    padding: 64px 6% 48px;
    text-align: center;
}
.seramor-legal-header-inner {
    max-width: 880px;
    margin: 0 auto;
}
.seramor-legal-eyebrow {
    font-family: var(--font-heading);
    font-size: 11px;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: var(--seramor-marron);
    margin: 0 0 14px;
}
.seramor-legal-title {
    font-family: var(--font-body);
    font-style: italic;
    font-weight: 500;
    font-size: clamp(26px, 3.2vw, 36px);
    line-height: 1.2;
    color: var(--seramor-verde);
    margin: 0 0 10px;
    letter-spacing: 0;
    text-transform: none;
}
.seramor-legal-meta {
    font-family: var(--font-heading);
    font-size: 12px;
    color: #7a6650;
    margin: 6px 0 0;
    letter-spacing: 0.5px;
}
.seramor-legal-body {
    max-width: 820px;
    margin: 0 auto;
    padding: 56px 6% 80px;
    font-family: var(--font-body);
    font-size: 17px;
    line-height: 1.75;
    color: #3a2e20;
}
.seramor-legal-body .seramor-legal-intro {
    font-size: 18px;
    color: #4a3a28;
    margin: 0 0 36px;
}
.seramor-legal-toc {
    background: #ffffff;
    border: 1px solid rgba(115, 48, 21, 0.12);
    border-radius: 14px;
    padding: 22px 26px;
    margin: 0 0 40px;
}
.seramor-legal-toc-title {
    font-family: var(--font-heading);
    font-size: 11px;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--seramor-marron);
    margin: 0 0 12px;
}
.seramor-legal-toc ol {
    margin: 0;
    padding-left: 20px;
    font-size: 15px;
    line-height: 1.9;
    color: #4a3a28;
}
.seramor-legal-toc a {
    color: var(--seramor-verde);
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-color 0.2s ease;
}
.seramor-legal-toc a:hover { border-bottom-color: var(--seramor-marron); }
.seramor-legal-body h2 {
    font-family: var(--font-heading);
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--seramor-verde);
    margin: 48px 0 14px;
    padding-top: 12px;
    border-top: 1px solid rgba(115, 48, 21, 0.15);
    scroll-margin-top: 90px;
}
.seramor-legal-body h2:first-of-type { border-top: 0; padding-top: 0; margin-top: 0; }
.seramor-legal-body h3 {
    font-family: var(--font-body);
    font-style: italic;
    font-weight: 600;
    font-size: 20px;
    color: var(--seramor-verde);
    margin: 24px 0 8px;
    text-transform: none;
    letter-spacing: 0;
}
.seramor-legal-body p { margin: 0 0 16px; }
.seramor-legal-body ul {
    margin: 0 0 18px;
    padding-left: 22px;
}
.seramor-legal-body ul li { margin-bottom: 6px; }
.seramor-legal-body a {
    color: var(--seramor-marron);
    text-decoration: underline;
    text-underline-offset: 3px;
}
.seramor-legal-body strong { color: #2a2015; }
.seramor-legal-body hr {
    border: 0;
    border-top: 1px solid rgba(115, 48, 21, 0.15);
    margin: 36px 0;
}
.seramor-legal-contact {
    background: #f3ead3;
    border-radius: 14px;
    padding: 24px 26px;
    margin: 32px 0 0;
    font-size: 16px;
}
.seramor-legal-contact p { margin: 0; }
@media (max-width: 720px) {
    .seramor-legal-header { padding: 48px 6% 36px; }
    .seramor-legal-body { padding: 40px 6% 64px; font-size: 16px; }
    .seramor-legal-body h2 { font-size: 13px; margin-top: 36px; }
}

CSS;

// Get or create the custom CSS post
$custom_css_post_id = wp_get_custom_css_post();
if ($custom_css_post_id) {
    // Append to existing CSS
    $existing = wp_get_custom_css();
    wp_update_custom_css_post($css);
    echo "✅ CSS actualizado en el Customizer (reemplazado)\n";
} else {
    wp_update_custom_css_post($css);
    echo "✅ CSS inyectado en el Customizer\n";
}

echo "   - Variables CSS: 7 colores Seramor\n";
echo "   - Google Fonts: Montserrat + Cormorant Garamond + Great Vibes\n";
echo "   - Clases: seccion-verde, seccion-crema, texto-script, overlay-verde\n";
echo "   - Botones: dorado/verde con hover invertido, outline variant\n";
echo "   - Responsive: mobile breakpoints\n";
