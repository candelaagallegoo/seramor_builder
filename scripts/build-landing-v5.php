<?php
/**
 * Build Landing Page (ID 10) - Seramor - V5
 * Imagenes del Canva real (extraidas del SVG y reimportadas como canva-img_*).
 * Tarjetas de servicios CLICABLES (envueltas en <a>).
 * Estilos en mu-plugin (seramor-site-runtime.php).
 *
 * Run: c:\xampp\php\php.exe wp-cli.phar eval-file scripts/build-landing-v5.php
 *      --path="c:\xampp\htdocs\seramor"
 */

// PORTABILIDAD: resolvemos URLs en runtime usando WP, asi funcionan en local Y en server.
// IDs de attachments (subidos previamente).
$LOGO_ID = 102;
$HERO_ID = 105;
$SOL_ID  = 106;
$CON_ID  = 107;
$CRE_ID  = 109;
$HEL_ID  = 110;
$ROCK_ID = 111;

$LOGO = wp_get_attachment_url( $LOGO_ID );
$HERO = wp_get_attachment_url( $HERO_ID );
$SOL  = wp_get_attachment_url( $SOL_ID );
$CON  = wp_get_attachment_url( $CON_ID );
$CRE  = wp_get_attachment_url( $CRE_ID );
$HEL  = wp_get_attachment_url( $HEL_ID );
$ROCK = wp_get_attachment_url( $ROCK_ID );

// Testimonios (fotos sueltas en uploads sin attachment ID conocido) -> content_url respeta WP_CONTENT_URL.
$BASE = content_url( '/uploads/2026/04/' );
$T1 = $BASE . 'C6EFFA22-F030-4ACC-89F4-8B795D2C9D2D.jpg';
$T2 = $BASE . 'C6BA6D6F-8119-48B7-8FC7-0EE4542CEB1E.jpg';
$T3 = $BASE . 'B1C18F87-5B61-49BF-8743-8D86649C8738.jpg';
$T4 = $BASE . '9F204147-27F2-4468-BE52-651149E43481.jpg';

// Validacion temprana: si algun ID falta, abortar.
foreach ( [ 'LOGO' => $LOGO, 'HERO' => $HERO, 'SOL' => $SOL, 'CON' => $CON, 'CRE' => $CRE, 'HEL' => $HEL, 'ROCK' => $ROCK ] as $k => $v ) {
    if ( empty( $v ) ) {
        WP_CLI::error( "Attachment $k no encontrado. Revisar IDs." );
    }
}

$WINE  = '#743014';
$DARK  = '#3a2614';
$GOLD  = '#e9d1a7';
$CREAM = '#f5e6c4';
$BONE  = '#f2ede6';

$content = <<<GUTENBERG

<!-- ============== SECCION 1 - HERO ============== -->
<!-- wp:html -->
<section class="seramor-hero alignfull" style="margin-left:calc(50% - 50vw);width:100vw;background-image:linear-gradient(rgba(58,38,20,0.2),rgba(58,38,20,0.2)),url('$HERO');background-size:cover;background-position:center;min-height:100vh;display:flex;flex-direction:column">
  <nav class="seramor-topnav">
    <a href="#hero">UNETE AQUI</a>
    <a href="/?page_id=17">PROGRAMA "MUJERES PODEROSAS"</a>
    <a href="/consejo-de-diosas">CONSEJO DE DIOSAS</a>
    <a href="/?page_id=20">SOBRE SERAMOR</a>
    <a href="/wp-login.php">INICIA SESION</a>
  </nav>
  <div class="seramor-hero-body" style="flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:60px 20px;text-align:center">
    <div class="seramor-hero-logo"><img src="$LOGO" alt="Seramor" style="width:360px;height:auto;display:block;margin:0 auto"/></div>
    <p style="color:$CREAM;font-family:'Cormorant Garamond',serif;font-size:14px;letter-spacing:4.5px;text-transform:uppercase;margin:30px 0 0">Circulo de mujeres online</p>
    <p style="color:$CREAM;font-family:'Cormorant Garamond',serif;font-size:17px;line-height:1.75;max-width:600px;margin:24px auto 0">Un espacio para mujeres que estan listas para sanar en profundidad,<br/>reconectar consigo mismas y empezar a crear una vida mas libre.</p>
    <a href="/?page_id=17" class="seramor-hero-cta" style="display:inline-block;margin-top:38px;padding:14px 38px;background:$WINE;color:$CREAM;text-decoration:none;font-family:'Cormorant Garamond',serif;font-size:13px;letter-spacing:3px;text-transform:uppercase;border-radius:999px">Descubrir el programa</a>
  </div>
</section>
<!-- /wp:html -->


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
