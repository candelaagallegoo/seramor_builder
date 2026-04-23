<?php
/**
 * Build Landing Page (ID 10) - Seramor - V4
 * Fidelidad al PNG/Canva proporcionado por la usuaria.
 * Estilos en mu-plugin (seramor-site-runtime.php). Aquí solo bloques Gutenberg válidos.
 *
 * Run: wp eval-file scripts/build-landing-v4.php
 *
 * Imágenes:
 *   100 = seramor-logo-completo (figura + SERAMOR CIRCLE)
 *   42  = HERO Helena cenote
 *   48  = Soltar (entre arboles luz)
 *   43  = Conectar (closeup rostro)
 *   75  = Crecer (agua naturaleza dramatica)
 *   38  = Helena vestido jardin (bloque Helena - circular)
 *   88  = naturaleza verde (cards bg / qué es seramor)
 *   45  = panoramica
 */

$LOGO  = 'http://localhost/seramor/wp-content/uploads/2026/04/Logo-1.png';
$HERO  = 'http://localhost/seramor/wp-content/uploads/2026/04/213648BF-D391-4C82-89CB-2644B8ED126C.png';
$SOL   = 'http://localhost/seramor/wp-content/uploads/2026/04/338EFF8C-30D3-44A1-9253-65286D790DA3.JPG';
$CON   = 'http://localhost/seramor/wp-content/uploads/2026/04/21CDD5C1-5A41-48CC-96C4-B6A92D9C07D5.JPG';
$CRE   = 'http://localhost/seramor/wp-content/uploads/2026/04/AF109809-D6AD-449F-837F-10077C834DDE.JPG';
$HEL   = 'http://localhost/seramor/wp-content/uploads/2026/04/0C4F3827-C906-4DFD-AE4B-349B19F021DB.JPG';
$ROCK  = 'http://localhost/seramor/wp-content/uploads/2026/04/CCFCB046-6705-4A75-8C64-CAB68EA85754.png';
$T1    = 'http://localhost/seramor/wp-content/uploads/2026/04/C6EFFA22-F030-4ACC-89F4-8B795D2C9D2D.jpg';
$T2    = 'http://localhost/seramor/wp-content/uploads/2026/04/C6BA6D6F-8119-48B7-8FC7-0EE4542CEB1E.jpg';
$T3    = 'http://localhost/seramor/wp-content/uploads/2026/04/B1C18F87-5B61-49BF-8743-8D86649C8738.jpg';
$T4    = 'http://localhost/seramor/wp-content/uploads/2026/04/9F204147-27F2-4468-BE52-651149E43481.jpg';

$serif = "'Cormorant Garamond', 'Libre Baskerville', serif";
$WINE  = '#743014';   // Spiced Wine - bloque Helena
$DARK  = '#3a2614';   // marrón oscuro
$GOLD  = '#e9d1a7';   // Golden Batter - botón / logo
$CREAM = '#f5e6c4';   // crema textos sobre marrón
$BONE  = '#fdf6ec';   // testimonios bg

$content = <<<GUTENBERG

<!-- ========== SECCIÓN 1 — HERO ========== -->
<!-- wp:cover {"url":"$HERO","id":42,"dimRatio":40,"customOverlayColor":"$DARK","minHeight":100,"minHeightUnit":"vh","align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"60px","left":"0","right":"0"}}}} -->
<div class="wp-block-cover alignfull has-background-dim" style="padding:0 0 60px;min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-40 has-background-dim" style="background-color:$DARK"></span><img class="wp-block-cover__image-background wp-image-42" alt="Helena en cenote" src="$HERO" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">

<!-- wp:html -->
<nav class="seramor-topnav">
  <a href="#hero">ÚNETE AQUÍ</a>
  <a href="/?page_id=17">PROGRAMA "MUJERES PODEROSAS"</a>
  <a href="/consejo-de-diosas">CONSEJO DE DIOSAS</a>
  <a href="/sobre-seramor">SOBRE SERAMOR</a>
  <a href="/wp-login.php">INICIA SESIÓN</a>
</nav>
<!-- /wp:html -->

<!-- wp:spacer {"height":"110px"} -->
<div style="height:110px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"id":102,"width":"340px","sizeSlug":"full","align":"center","className":"seramor-hero-logo"} -->
<figure class="wp-block-image aligncenter size-full is-resized seramor-hero-logo"><img src="$LOGO" alt="Seramor Circle" class="wp-image-102" style="width:340px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:spacer {"height":"24px"} -->
<div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"15px","letterSpacing":"4px","textTransform":"uppercase","fontFamily":"$serif"},"color":{"text":"$CREAM"}}} -->
<p class="has-text-align-center has-text-color" style="color:$CREAM;font-size:15px;letter-spacing:4px;text-transform:uppercase;font-family:$serif">Círculo de mujeres online</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"22px"} -->
<div style="height:22px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"17px","fontFamily":"$serif","lineHeight":"1.7"},"color":{"text":"$CREAM"}}} -->
<p class="has-text-align-center has-text-color" style="color:$CREAM;font-size:17px;font-family:$serif;line-height:1.7;max-width:580px;margin:0 auto">Un espacio para mujeres que están listas para sanar en profundidad,<br>reconectar consigo mismas y empezar a crear una vida más libre.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"36px"} -->
<div style="height:36px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"seramor-btn-pill"} -->
<div class="wp-block-buttons seramor-btn-pill"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/?page_id=17">Descubrir el programa</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

</div></div>
<!-- /wp:cover -->


<!-- ========== SECCIÓN 2 — SOLTAR / CONECTAR / CRECER ========== -->
<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-columns alignfull" style="padding:0;gap:0">

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-column" style="padding:0">
<!-- wp:cover {"url":"$SOL","id":48,"dimRatio":25,"customOverlayColor":"$DARK","minHeight":380,"minHeightUnit":"px","contentPosition":"bottom center"} -->
<div class="wp-block-cover has-background-dim has-custom-content-position is-position-bottom-center" style="min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-25 has-background-dim" style="background-color:$DARK"></span><img class="wp-block-cover__image-background wp-image-48" alt="Soltar" src="$SOL" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"36px","fontStyle":"italic","fontWeight":"400","fontFamily":"$serif"},"color":{"text":"#ffffff"},"spacing":{"padding":{"bottom":"36px"}}}} -->
<h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff;padding-bottom:36px;font-size:36px;font-style:italic;font-weight:400;font-family:$serif">Soltar</h3>
<!-- /wp:heading -->
</div></div>
<!-- /wp:cover -->
</div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-column" style="padding:0">
<!-- wp:cover {"url":"$CON","id":43,"dimRatio":30,"customOverlayColor":"$DARK","minHeight":380,"minHeightUnit":"px","contentPosition":"center center"} -->
<div class="wp-block-cover has-background-dim has-custom-content-position is-position-center-center" style="min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-30 has-background-dim" style="background-color:$DARK"></span><img class="wp-block-cover__image-background wp-image-43" alt="Conectar" src="$CON" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"13px","letterSpacing":"4px","textTransform":"uppercase","fontFamily":"$serif"},"color":{"text":"#ffffff"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;font-size:13px;letter-spacing:4px;text-transform:uppercase;font-family:$serif">Un espacio para volver a ti</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"36px","fontStyle":"italic","fontWeight":"400","fontFamily":"$serif"},"color":{"text":"#ffffff"},"spacing":{"padding":{"top":"60px","bottom":"0"}}} } -->
<h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff;padding-top:60px;font-size:36px;font-style:italic;font-weight:400;font-family:$serif">Conectar</h3>
<!-- /wp:heading -->
</div></div>
<!-- /wp:cover -->
</div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-column" style="padding:0">
<!-- wp:cover {"url":"$CRE","id":75,"dimRatio":25,"customOverlayColor":"$DARK","minHeight":380,"minHeightUnit":"px","contentPosition":"bottom center"} -->
<div class="wp-block-cover has-background-dim has-custom-content-position is-position-bottom-center" style="min-height:380px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-25 has-background-dim" style="background-color:$DARK"></span><img class="wp-block-cover__image-background wp-image-75" alt="Crecer" src="$CRE" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"36px","fontStyle":"italic","fontWeight":"400","fontFamily":"$serif"},"color":{"text":"#ffffff"},"spacing":{"padding":{"bottom":"36px"}}}} -->
<h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff;padding-bottom:36px;font-size:36px;font-style:italic;font-weight:400;font-family:$serif">Crecer</h3>
<!-- /wp:heading -->
</div></div>
<!-- /wp:cover -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->


<!-- ========== SECCIÓN 3 — BLOQUE HELENA (marrón) ========== -->
<!-- wp:group {"align":"full","style":{"color":{"background":"$WINE"},"spacing":{"padding":{"top":"80px","bottom":"80px","left":"60px","right":"60px"}}}} -->
<div class="wp-block-group alignfull has-background" style="background-color:$WINE;padding:80px 60px">
<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":"60px"}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="gap:60px">

<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">

<!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontFamily":"$serif","lineHeight":"1.85"},"color":{"text":"$CREAM"}}} -->
<p class="has-text-color" style="color:$CREAM;font-size:16px;font-family:$serif;line-height:1.85;max-width:480px;margin:0 auto">Me llamo Helena, soy facilitadora de círculos de mujeres, titulada como profesora de yoga y apasionada por crear espacios de conexión y sanación. Desde muy joven, los círculos de mujeres transformaron mi vida, y hoy Seramor nace de ese deseo de ofrecer a otras mujeres un espacio seguro donde expresarse, compartir y sanar en comunidad.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"36px"} -->
<div style="height:36px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"className":"seramor-btn-pill"} -->
<div class="wp-block-buttons seramor-btn-pill"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/sobre-seramor">Conocer Seramor &gt;</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
<!-- wp:html -->
<img src="$HEL" alt="Helena" class="seramor-helena-photo"/>
<!-- /wp:html -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->


<!-- ========== SECCIÓN 4 — TARJETAS SERVICIOS (sobre roca) ========== -->
<!-- wp:cover {"url":"$ROCK","id":88,"dimRatio":20,"customOverlayColor":"$DARK","minHeight":700,"minHeightUnit":"px","align":"full","contentPosition":"bottom center"} -->
<div class="wp-block-cover alignfull has-background-dim has-custom-content-position is-position-bottom-center" style="min-height:700px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim" style="background-color:$DARK"></span><img class="wp-block-cover__image-background wp-image-88" alt="Naturaleza" src="$ROCK" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">

<!-- wp:html -->
<div class="seramor-cards" style="padding-bottom:60px">
  <div class="seramor-card">
    <h4 class="card-title">Mentorías 1-1</h4>
    <a class="card-link" href="/mentorias">Reservar mentoría</a>
  </div>
  <div class="seramor-card center">
    <h4 class="card-title">Programa 3 Meses<br>"Mujeres Poderosas"</h4>
    <p class="card-sub">Acompañamiento profundo en grupo para sanar, transformarte y crear una nueva realidad.</p>
    <a class="card-btn" href="/?page_id=17">Unirme</a>
  </div>
  <div class="seramor-card">
    <h4 class="card-title">Consejo de Diosas</h4>
    <a class="card-link" href="/consejo-de-diosas">Registrarme</a>
  </div>
</div>
<!-- /wp:html -->

</div></div>
<!-- /wp:cover -->


<!-- ========== SECCIÓN 5 — ¿QUÉ ES SERAMOR? (continúa sobre roca) ========== -->
<!-- wp:cover {"url":"$ROCK","id":88,"dimRatio":35,"customOverlayColor":"$DARK","minHeight":620,"minHeightUnit":"px","align":"full"} -->
<div class="wp-block-cover alignfull has-background-dim" style="min-height:620px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-35 has-background-dim" style="background-color:$DARK"></span><img class="wp-block-cover__image-background wp-image-88" alt="Naturaleza" src="$ROCK" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">

<!-- wp:spacer {"height":"60px"} -->
<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"34px","fontStyle":"italic","fontWeight":"400","fontFamily":"$serif"},"color":{"text":"#ffffff"}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#ffffff;font-size:34px;font-style:italic;font-weight:400;font-family:$serif">¿Qué es Seramor?</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"15px","fontFamily":"$serif","lineHeight":"1.85"},"color":{"text":"$CREAM"}}} -->
<p class="has-text-align-center has-text-color" style="color:$CREAM;font-size:15px;font-family:$serif;line-height:1.85;max-width:420px;margin:0 auto">Seramor es un círculo de mujeres online nacido de una necesidad profunda: crear el espacio que muchas veces nos falta para sanar, crecer y sostenernos entre nosotras.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"24px"} -->
<div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"15px","fontFamily":"$serif","lineHeight":"1.85"},"color":{"text":"$CREAM"}}} -->
<p class="has-text-align-center has-text-color" style="color:$CREAM;font-size:15px;font-family:$serif;line-height:1.85;max-width:420px;margin:0 auto">A través de un programa estructurado de 3 meses y un grupo cerrado, recorremos juntas un proceso de transformación para romper tus creencias limitantes y juntas, dar pasos reales hacia una vida más libre y alineada.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"24px"} -->
<div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"15px","fontFamily":"$serif","lineHeight":"1.85"},"color":{"text":"$CREAM"}}} -->
<p class="has-text-align-center has-text-color" style="color:$CREAM;font-size:15px;font-family:$serif;line-height:1.85;max-width:420px;margin:0 auto">En comunidad, con otras 6 mujeres de todo el mundo, trabajaremos con nuestra niña interior, recuperando cualidades esenciales como la creatividad, la intuición y la calma.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"32px"} -->
<div style="height:32px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"13px","letterSpacing":"3px","textTransform":"uppercase","fontFamily":"$serif"},"color":{"text":"$CREAM"}}} -->
<p class="has-text-align-center has-text-color" style="color:$CREAM;font-size:13px;letter-spacing:3px;text-transform:uppercase;font-family:$serif"><a href="/?page_id=17" style="color:$CREAM;text-decoration:underline;text-underline-offset:4px">Más Info &gt;</a></p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"60px"} -->
<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

</div></div>
<!-- /wp:cover -->


<!-- ========== Línea separadora marrón delgada ========== -->
<!-- wp:group {"align":"full","style":{"color":{"background":"$WINE"},"spacing":{"padding":{"top":"22px","bottom":"22px"}}}} -->
<div class="wp-block-group alignfull has-background" style="background-color:$WINE;padding-top:22px;padding-bottom:22px">&nbsp;</div>
<!-- /wp:group -->


<!-- ========== SECCIÓN 6 — TESTIMONIOS ========== -->
<!-- wp:group {"align":"full","style":{"color":{"background":"$BONE"},"spacing":{"padding":{"top":"60px","bottom":"80px","left":"60px","right":"60px"}}}} -->
<div class="wp-block-group alignfull has-background" style="background-color:$BONE;padding:60px 60px 80px">

<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"32px","fontFamily":"$serif"},"color":{"text":"$WINE"}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:$WINE;font-size:32px;font-family:$serif">Testimonios</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:html -->
<div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;max-width:1100px;margin:0 auto">
  <div>
    <div class="seramor-testimonial"><img src="$T1" alt="Yadisel Buendia"/></div>
    <p style="text-align:center;margin:14px 0 0;font-family:$serif;color:$WINE;font-size:13px;letter-spacing:1px">Yadisel Buendia</p>
  </div>
  <div>
    <div class="seramor-testimonial"><img src="$T2" alt="Yanira Naranjo"/></div>
    <p style="text-align:center;margin:14px 0 0;font-family:$serif;color:$WINE;font-size:13px;letter-spacing:1px">Yanira Naranjo</p>
  </div>
  <div>
    <div class="seramor-testimonial"><img src="$T3" alt="Daniela Osorio"/></div>
    <p style="text-align:center;margin:14px 0 0;font-family:$serif;color:$WINE;font-size:13px;letter-spacing:1px">Daniela Osorio</p>
  </div>
  <div>
    <div class="seramor-testimonial"><img src="$T4" alt="Salomé Perez"/></div>
    <p style="text-align:center;margin:14px 0 0;font-family:$serif;color:$WINE;font-size:13px;letter-spacing:1px">Salomé Perez</p>
  </div>
</div>
<!-- /wp:html -->

</div>
<!-- /wp:group -->

GUTENBERG;

$result = wp_update_post([
    'ID'           => 10,
    'post_content' => $content,
    'post_status'  => 'publish',
]);

if ( is_wp_error( $result ) ) {
    WP_CLI::error( 'Error: ' . $result->get_error_message() );
} else {
    WP_CLI::success( "Landing V4 publicada. Post ID: $result" );
    WP_CLI::log( "URL: " . get_permalink( 10 ) );
}
