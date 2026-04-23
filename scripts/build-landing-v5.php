<?php
/**
 * Build Landing Page (ID 10) - Seramor - V5
 * Imagenes del Canva real (extraidas del SVG y reimportadas como canva-img_*).
 * Tarjetas de servicios CLICABLES (envueltas en <a>).
 * Estilos en mu-plugin (seramor-fonts.php).
 *
 * Run: c:\xampp\php\php.exe wp-cli.phar eval-file scripts/build-landing-v5.php
 *      --path="c:\xampp\htdocs\seramor"
 */

// Logo (subido manualmente, transparente)
$LOGO  = 'http://localhost/seramor/wp-content/uploads/2026/04/Logo-1.png';
$LOGO_ID = 102;

// Fotos del Canva real
$BASE  = 'http://localhost/seramor/wp-content/uploads/2026/04/';
$HERO  = $BASE . 'img_23_x0_y0_w2700.jpeg';      // ID 105 - cenote
$SOL   = $BASE . 'img_30_x0_y0_w1184.jpeg';      // ID 106 - cueva pequena
$CON   = $BASE . 'img_31_x0_y0_w1776.jpeg';      // ID 107 - closeup pelirroja
$CRE   = $BASE . 'img_32_x0_y0_w1184.jpeg';      // ID 109 - vestido ocre
$HEL   = $BASE . 'img_33_x0_y0_w2042.jpeg';      // ID 110 - sonriendo coco
$ROCK  = $BASE . 'img_36_x0_y0_w1184.jpeg';      // ID 111 - cueva con figura

// Testimonios (mantienen fotos previas)
$T1 = $BASE . 'C6EFFA22-F030-4ACC-89F4-8B795D2C9D2D.jpg';
$T2 = $BASE . 'C6BA6D6F-8119-48B7-8FC7-0EE4542CEB1E.jpg';
$T3 = $BASE . 'B1C18F87-5B61-49BF-8743-8D86649C8738.jpg';
$T4 = $BASE . '9F204147-27F2-4468-BE52-651149E43481.jpg';

$WINE  = '#743014';
$DARK  = '#3a2614';
$GOLD  = '#e9d1a7';
$CREAM = '#f5e6c4';
$BONE  = '#f2ede6';

$content = <<<GUTENBERG

<!-- ============== SECCION 1 - HERO ============== -->
<!-- wp:cover {"url":"$HERO","id":105,"dimRatio":20,"customOverlayColor":"$DARK","minHeight":100,"minHeightUnit":"vh","align":"full","className":"seramor-hero"} -->
<div class="wp-block-cover alignfull has-background-dim seramor-hero" style="min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-20 has-background-dim" style="background-color:$DARK"></span><img class="wp-block-cover__image-background wp-image-105" alt="Helena en cenote" src="$HERO" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">

<!-- wp:html -->
<nav class="seramor-topnav">
  <a href="#hero">UNETE AQUI</a>
  <a href="/?page_id=17">PROGRAMA "MUJERES PODEROSAS"</a>
  <a href="/consejo-de-diosas">CONSEJO DE DIOSAS</a>
  <a href="/?page_id=20">SOBRE SERAMOR</a>
  <a href="/wp-login.php">INICIA SESION</a>
</nav>
<!-- /wp:html -->

<!-- wp:spacer {"height":"130px"} -->
<div style="height:130px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"id":102,"width":"360px","sizeSlug":"full","align":"center","className":"seramor-hero-logo"} -->
<figure class="wp-block-image aligncenter size-full is-resized seramor-hero-logo"><img src="$LOGO" alt="Seramor" class="wp-image-102" style="width:360px;height:auto"/></figure>
<!-- /wp:image -->

<!-- wp:spacer {"height":"30px"} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center" style="color:$CREAM;font-family:'Cormorant Garamond',serif;font-size:14px;letter-spacing:4.5px;text-transform:uppercase;margin:0">Circulo de mujeres online</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"24px"} -->
<div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center" style="color:$CREAM;font-family:'Cormorant Garamond',serif;font-size:17px;line-height:1.75;max-width:600px;margin:0 auto">Un espacio para mujeres que estan listas para sanar en profundidad,<br/>reconectar consigo mismas y empezar a crear una vida mas libre.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"38px"} -->
<div style="height:38px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"className":"seramor-btn-pill"} -->
<div class="wp-block-buttons seramor-btn-pill"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/?page_id=17">Descubrir el programa</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

</div></div>
<!-- /wp:cover -->


<!-- ============== SECCION 2 - SOLTAR / CONECTAR / CRECER ============== -->
<!-- wp:html -->
<div class="seramor-trio alignfull" style="margin-left:calc(50% - 50vw);width:100vw">
  <div class="seramor-tile">
    <img src="$SOL" alt="Soltar"/>
    <div class="tile-text">
      <p class="tile-eyebrow">Suelta lo que pesa</p>
      <h3 class="tile-title">Soltar</h3>
    </div>
  </div>
  <div class="seramor-tile">
    <img src="$CON" alt="Conectar"/>
    <div class="tile-text">
      <p class="tile-eyebrow">Un espacio para volver a ti</p>
      <h3 class="tile-title">Conectar</h3>
    </div>
  </div>
  <div class="seramor-tile">
    <img src="$CRE" alt="Crecer"/>
    <div class="tile-text">
      <p class="tile-eyebrow">Florece desde tu raiz</p>
      <h3 class="tile-title">Crecer</h3>
    </div>
  </div>
</div>
<!-- /wp:html -->


<!-- ============== SECCION 3 - HELENA ============== -->
<!-- wp:html -->
<section class="seramor-helena alignfull" style="margin-left:calc(50% - 50vw);width:100vw">
  <div class="seramor-helena-grid">
    <div>
      <p class="seramor-helena-text">Me llamo Helena, soy facilitadora de circulos de mujeres, titulada como profesora de yoga y apasionada por crear espacios de conexion y sanacion. Desde muy joven, los circulos de mujeres transformaron mi vida, y hoy Seramor nace de ese deseo de ofrecer a otras mujeres un espacio seguro donde expresarse, compartir y sanar en comunidad.</p>
      <a class="seramor-helena-cta" href="/?page_id=20">Conocer Seramor &gt;</a>
    </div>
    <div>
      <img src="$HEL" alt="Helena" class="seramor-helena-photo"/>
    </div>
  </div>
</section>
<!-- /wp:html -->


<!-- ============== SECCION 4+5 - ROCK UNIFICADO (Cards + Que es Seramor) ============== -->
<!-- wp:html -->
<section class="seramor-rock alignfull" style="margin-left:calc(50% - 50vw);width:100vw">
  <div class="rock-bg">
    <img src="$ROCK" alt=""/>
  </div>
  <div class="seramor-rock-inner">
    <div class="seramor-cards">
      <a class="seramor-card" href="/mentorias">
        <h4 class="card-title">Mentorias 1-1</h4>
        <p class="card-sub">Acompanamiento personalizado para tu proceso individual.</p>
        <span class="card-link">Reservar mentoria</span>
      </a>
      <a class="seramor-card center" href="/?page_id=17">
        <h4 class="card-title">Programa 3 Meses<br/>Mujeres Poderosas</h4>
        <p class="card-sub">Acompanamiento profundo en grupo para sanar, transformarte y crear una nueva realidad.</p>
        <span class="card-btn">Unirme</span>
      </a>
      <a class="seramor-card" href="/consejo-de-diosas">
        <h4 class="card-title">Consejo de Diosas</h4>
        <p class="card-sub">Encuentros mensuales con la comunidad para sostenernos juntas.</p>
        <span class="card-link">Registrarme</span>
      </a>
    </div>
    <div class="seramor-rock-quees">
      <h2 class="seramor-quees-title">&iquest;Que es Seramor?</h2>
      <p class="seramor-quees-text">Seramor es un circulo de mujeres online nacido de una necesidad profunda: crear el espacio que muchas veces nos falta para sanar, crecer y sostenernos entre nosotras.</p>
      <p class="seramor-quees-text">A traves de un programa estructurado de 3 meses y un grupo cerrado, recorremos juntas un proceso de transformacion para romper tus creencias limitantes y dar pasos reales hacia una vida mas libre y alineada.</p>
      <p class="seramor-quees-text">En comunidad, con otras 6 mujeres de todo el mundo, trabajaremos con nuestra nina interior, recuperando cualidades esenciales como la creatividad, la intuicion y la calma.</p>
      <a class="seramor-quees-link" href="/?page_id=17">Mas info &gt;</a>
    </div>
  </div>
</section>
<!-- /wp:html -->


<!-- ============== SECCION 6 - SEPARADOR WINE ============== -->
<!-- wp:html -->
<div class="alignfull" style="background:#743014;height:100px;margin-left:calc(50% - 50vw);width:100vw"></div>
<!-- /wp:html -->


<!-- ============== SECCION 7 - TESTIMONIOS ============== -->
<!-- wp:html -->
<section class="seramor-testi alignfull" style="margin-left:calc(50% - 50vw);width:100vw">
  <h2 class="seramor-testi-title">Testimonios</h2>
  <div class="seramor-testi-grid">
    <div>
      <div class="seramor-testimonial"><img src="$T1" alt="Yadisel Buendia"/><span class="play-arrow"></span></div>
      <p class="seramor-testi-name">Yadisel Buendia</p>
    </div>
    <div>
      <div class="seramor-testimonial"><img src="$T2" alt="Yanira Naranjo"/><span class="play-arrow"></span></div>
      <p class="seramor-testi-name">Yanira Naranjo</p>
    </div>
    <div>
      <div class="seramor-testimonial"><img src="$T3" alt="Daniela Osorio"/><span class="play-arrow"></span></div>
      <p class="seramor-testi-name">Daniela Osorio</p>
    </div>
    <div>
      <div class="seramor-testimonial"><img src="$T4" alt="Salome Perez"/><span class="play-arrow"></span></div>
      <p class="seramor-testi-name">Salome Perez</p>
    </div>
  </div>
</section>
<!-- /wp:html -->


<!-- ============== SECCION 8 - CIERRE (espacio blanco como en Canva) ============== -->
<!-- wp:html -->
<div class="alignfull" style="background:#ffffff;height:80px;margin-left:calc(50% - 50vw);width:100vw"></div>
<!-- /wp:html -->

GUTENBERG;

$result = wp_update_post([
    'ID'           => 10,
    'post_content' => $content,
    'post_status'  => 'publish',
]);

if ( is_wp_error( $result ) ) {
    WP_CLI::error( 'Error: ' . $result->get_error_message() );
} else {
    WP_CLI::success( "Landing V5 publicada. Post ID: $result" );
    WP_CLI::log( "URL: " . get_permalink( 10 ) );
}
