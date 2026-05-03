<?php
/**
 * Build Landing Page (ID 10) - Seramor - V6
 *
 * Cambios v6 (PORTABILIDAD via Media Library):
 *  - Cada <img> lleva class="wp-image-{ID}".
 *  - Hero usa <img wp-image-105> absoluto en vez de background-image CSS.
 *  - Testimonios usan poster + video por IDs de Media Library.
 *  - El mu-plugin reescribe src desde el ID en runtime -> DB portable.
 *
 * Run: c:\xampp\php\php.exe c:\xampp\htdocs\seramor\wp-cli.phar eval-file scripts/build-landing-v6.php --path="c:\xampp\htdocs\seramor"
 */

// IDs de attachments
$LOGO_ID = 102;
$HERO_ID = 105;
$SOL_ID  = 106;
$CON_ID  = 107;
$CRE_ID  = 109;
$HEL_ID  = 110;
$ROCK_ID = 111;
$T1_ID   = 135; // Poster Yadisel Buendia
$T2_ID   = 132; // Poster Yanira Naranjo
$T3_ID   = 133; // Poster Daniela Osorio
$T4_ID   = 131; // Poster Salome Perez
$T1_VIDEO_ID = 126;
$T2_VIDEO_ID = 127;
$T3_VIDEO_ID = 128;
$T4_VIDEO_ID = 129;

// URLs (resueltas en local; el filtro del mu-plugin las re-resuelve por ID al servir)
$LOGO = wp_get_attachment_url( $LOGO_ID );
$HERO = wp_get_attachment_url( $HERO_ID );
$SOL  = wp_get_attachment_url( $SOL_ID );
$CON  = wp_get_attachment_url( $CON_ID );
$CRE  = wp_get_attachment_url( $CRE_ID );
$HEL  = wp_get_attachment_url( $HEL_ID );
$ROCK = wp_get_attachment_url( $ROCK_ID );
$T1   = wp_get_attachment_url( $T1_ID );
$T2   = wp_get_attachment_url( $T2_ID );
$T3   = wp_get_attachment_url( $T3_ID );
$T4   = wp_get_attachment_url( $T4_ID );
$T1_VIDEO = wp_get_attachment_url( $T1_VIDEO_ID );
$T2_VIDEO = wp_get_attachment_url( $T2_VIDEO_ID );
$T3_VIDEO = wp_get_attachment_url( $T3_VIDEO_ID );
$T4_VIDEO = wp_get_attachment_url( $T4_VIDEO_ID );

$LOGIN_PAGE_ID  = (int) get_option( 'pmpro_login_page_id' );
$LEVELS_PAGE_ID = (int) get_option( 'pmpro_levels_page_id' );

$login_url = $LOGIN_PAGE_ID > 0
  ? '__HOME__/?page_id=' . $LOGIN_PAGE_ID
  : '__HOME__/wp-login.php';

$register_url = $LEVELS_PAGE_ID > 0
  ? '__HOME__/?page_id=' . $LEVELS_PAGE_ID
  : '__HOME__/?page_id=14';

foreach ( compact( 'LOGO', 'HERO', 'SOL', 'CON', 'CRE', 'HEL', 'ROCK', 'T1', 'T2', 'T3', 'T4', 'T1_VIDEO', 'T2_VIDEO', 'T3_VIDEO', 'T4_VIDEO' ) as $k => $v ) {
    if ( empty( $v ) ) {
        WP_CLI::error( "Attachment '$k' no encontrado. Revisar IDs." );
    }
}

$WINE  = '#743014';
$DARK  = '#3a2614';
$GOLD  = '#e9d1a7';
$CREAM = '#f5e6c4';
$BONE  = '#f2ede6';

$T1_NAME = 'Yadisel Buendia';
$T2_NAME = 'Yanira Naranjo';
$T3_NAME = 'Daniela Osorio';
$T4_NAME = 'Salome Perez';

$content = <<<GUTENBERG

<!-- ============== SECCION 1 - HERO ============== -->
<!-- wp:html -->
<section id="hero" class="seramor-hero alignfull" style="position:relative;margin-left:calc(50% - 50vw);width:100vw;min-height:100vh;display:flex;flex-direction:column;overflow:hidden;background:$DARK">
  <img class="wp-image-$HERO_ID seramor-hero-bg" src="$HERO" alt="" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;z-index:0"/>
  <div style="position:absolute;inset:0;background:rgba(58,38,20,0.2);z-index:1"></div>
  <nav class="seramor-topnav" style="position:relative;z-index:2">
    <a href="$register_url">REGÍSTRATE</a>
    <a href="__HOME__/?page_id=17">PROGRAMA "MUJERES PODEROSAS"</a>
    <a href="__HOME__/?page_id=14">CONSEJO DE DIOSAS</a>
    <a href="__HOME__/?page_id=20">SOBRE SERAMOR</a>
    <a href="$login_url">INICIA SESIÓN</a>
  </nav>
  <div class="seramor-hero-body" style="position:relative;z-index:2;flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:60px 20px;text-align:center">
    <div class="seramor-hero-logo"><img class="wp-image-$LOGO_ID" src="$LOGO" alt="Seramor" style="width:360px;height:auto;display:block;margin:0 auto"/></div>
    <p style="color:$CREAM;font-family:'Cormorant Garamond',serif;font-size:14px;letter-spacing:4.5px;text-transform:uppercase;margin:30px 0 0">Círculo de mujeres online</p>
    <p style="color:$CREAM;font-family:'Cormorant Garamond',serif;font-size:17px;line-height:1.75;max-width:600px;margin:24px auto 0">Un espacio para mujeres que están listas para sanar en profundidad,<br/>reconectar consigo mismas y empezar a crear una vida más libre.</p>
    <a href="__HOME__/?page_id=17" class="seramor-hero-cta" style="display:inline-block;margin-top:38px;padding:16px 44px;background:$GOLD;color:#5a3a1a;text-decoration:none;font-family:'Cormorant Garamond',serif;font-size:14px;font-weight:500;letter-spacing:3px;text-transform:uppercase;border-radius:999px;border:1.5px solid $GOLD;box-shadow:0 4px 18px rgba(0,0,0,0.22)">Descubrir el programa</a>
  </div>
</section>
<!-- /wp:html -->


<!-- ============== SECCION 2 - SOLTAR / CONECTAR / CRECER ============== -->
<!-- wp:html -->
<div class="seramor-trio alignfull" style="margin-left:calc(50% - 50vw);width:100vw">
  <div class="seramor-tile">
    <img class="wp-image-$SOL_ID" src="$SOL" alt="Soltar"/>
    <div class="tile-text">
      <p class="tile-eyebrow">Suelta lo que pesa</p>
      <h3 class="tile-title">Soltar</h3>
    </div>
  </div>
  <div class="seramor-tile">
    <img class="wp-image-$CON_ID" src="$CON" alt="Conectar"/>
    <div class="tile-text">
      <p class="tile-eyebrow">Un espacio para volver a ti</p>
      <h3 class="tile-title">Conectar</h3>
    </div>
  </div>
  <div class="seramor-tile">
    <img class="wp-image-$CRE_ID" src="$CRE" alt="Crecer"/>
    <div class="tile-text">
      <p class="tile-eyebrow">Florece desde tu raíz</p>
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
      <p class="seramor-helena-text">Me llamo Helena, soy facilitadora de círculos de mujeres, titulada como profesora de yoga y apasionada por crear espacios de conexión y sanación. Desde muy joven, los círculos de mujeres transformaron mi vida, y hoy Seramor nace de ese deseo de ofrecer a otras mujeres un espacio seguro donde expresarse, compartir y sanar en comunidad.</p>
      <a class="seramor-helena-cta" href="__HOME__/?page_id=20">Conocer Seramor &gt;</a>
    </div>
    <div>
      <img class="wp-image-$HEL_ID seramor-helena-photo" src="$HEL" alt="Helena"/>
    </div>
  </div>
</section>
<!-- /wp:html -->


<!-- ============== SECCION 4+5 - ROCK UNIFICADO (Cards + Que es Seramor) ============== -->
<!-- wp:html -->
<section class="seramor-rock alignfull" style="margin-left:calc(50% - 50vw);width:100vw">
  <div class="rock-bg">
    <img class="wp-image-$ROCK_ID" src="$ROCK" alt=""/>
  </div>
  <div class="seramor-rock-inner">
    <div class="seramor-cards">
      <a class="seramor-card" href="__HOME__/?page_id=22">
        <h4 class="card-title">Mentorías 1:1</h4>
        <p class="card-sub">Acompañamiento personalizado para tu proceso individual.</p>
        <span class="card-link">Reservar mentoría</span>
      </a>
      <a class="seramor-card center" href="__HOME__/?page_id=17">
        <h4 class="card-title">Programa 3 Meses<br/>Mujeres Poderosas</h4>
        <p class="card-sub">Acompañamiento profundo en grupo para sanar, transformarte y crear una nueva realidad.</p>
        <span class="card-btn">Unirme</span>
      </a>
      <a class="seramor-card" href="__HOME__/?page_id=14">
        <h4 class="card-title">Consejo de Diosas</h4>
        <p class="card-sub">Encuentros mensuales con la comunidad para sostenernos juntas.</p>
        <span class="card-link">Registrarme</span>
      </a>
    </div>
    <div class="seramor-rock-quees">
      <h2 class="seramor-quees-title">¿Qué es Seramor?</h2>
      <p class="seramor-quees-text">Seramor es un círculo de mujeres online nacido de una necesidad profunda: crear el espacio que muchas veces nos falta para sanar, crecer y sostenernos entre nosotras.</p>
      <p class="seramor-quees-text">A través de un programa estructurado de 3 meses y un grupo cerrado, recorremos juntas un proceso de transformación para romper tus creencias limitantes y dar pasos reales hacia una vida más libre y alineada.</p>
      <p class="seramor-quees-text">En comunidad, con otras 6 mujeres de todo el mundo, trabajaremos con nuestra niña interior, recuperando cualidades esenciales como la creatividad, la intuición y la calma.</p>
      <a class="seramor-quees-link" href="__HOME__/?page_id=17">Más info &gt;</a>
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
      <button class="seramor-testimonial" type="button" data-video-card aria-label="Reproducir testimonio de $T1_NAME">
        <img class="wp-image-$T1_ID" src="$T1" alt="$T1_NAME"/>
        <video class="wp-video-$T1_VIDEO_ID" src="$T1_VIDEO" preload="metadata" playsinline webkit-playsinline disablepictureinpicture></video>
        <span class="play-arrow"></span>
      </button>
      <p class="seramor-testi-name">$T1_NAME</p>
    </div>
    <div>
      <button class="seramor-testimonial" type="button" data-video-card aria-label="Reproducir testimonio de $T2_NAME">
        <img class="wp-image-$T2_ID" src="$T2" alt="$T2_NAME"/>
        <video class="wp-video-$T2_VIDEO_ID" src="$T2_VIDEO" preload="metadata" playsinline webkit-playsinline disablepictureinpicture></video>
        <span class="play-arrow"></span>
      </button>
      <p class="seramor-testi-name">$T2_NAME</p>
    </div>
    <div>
      <button class="seramor-testimonial" type="button" data-video-card aria-label="Reproducir testimonio de $T3_NAME">
        <img class="wp-image-$T3_ID" src="$T3" alt="$T3_NAME"/>
        <video class="wp-video-$T3_VIDEO_ID" src="$T3_VIDEO" preload="metadata" playsinline webkit-playsinline disablepictureinpicture></video>
        <span class="play-arrow"></span>
      </button>
      <p class="seramor-testi-name">$T3_NAME</p>
    </div>
    <div>
      <button class="seramor-testimonial" type="button" data-video-card aria-label="Reproducir testimonio de $T4_NAME">
        <img class="wp-image-$T4_ID" src="$T4" alt="$T4_NAME"/>
        <video class="wp-video-$T4_VIDEO_ID" src="$T4_VIDEO" preload="metadata" playsinline webkit-playsinline disablepictureinpicture></video>
        <span class="play-arrow"></span>
      </button>
      <p class="seramor-testi-name">$T4_NAME</p>
    </div>
  </div>
</section>
<!-- /wp:html -->


<!-- ============== SECCION 8 - CIERRE ============== -->
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
  update_post_meta( 10, 'ast-global-header-display', 'disabled' );
  update_post_meta( 10, 'ast-main-header-display', 'disabled' );
  delete_post_meta( 10, 'footer-sml-layout' );

    WP_CLI::success( "Landing V6 publicada. Post ID: $result" );
    WP_CLI::log( "URL: " . get_permalink( 10 ) );
}
