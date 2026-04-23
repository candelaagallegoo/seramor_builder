<?php
/**
 * Build Programa de 3 Meses (ID 17) - Seramor
 *
 * Run:
 * c:\xampp\php\php.exe c:\xampp\htdocs\seramor\wp-cli.phar eval-file c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\scripts\build-programa.php --path="c:\xampp\htdocs\seramor"
 */

$LOGO_ID = 102;
$HERO_ID = 105;
$HEL_ID  = 110;
$ROCK_ID = 111;

global $wpdb;

$LOGO = wp_get_attachment_url( $LOGO_ID );
$HERO = wp_get_attachment_url( $HERO_ID );
$HEL  = wp_get_attachment_url( $HEL_ID );
$ROCK = wp_get_attachment_url( $ROCK_ID );

$CHECKOUT_PAGE_ID = (int) get_option( 'pmpro_checkout_page_id' );
$LOGIN_PAGE_ID    = (int) get_option( 'pmpro_login_page_id' );
$LEVELS_PAGE_ID   = (int) get_option( 'pmpro_levels_page_id' );

$LEVEL_PAGO_UNICO = (int) $wpdb->get_var(
  $wpdb->prepare(
    "SELECT id FROM {$wpdb->pmpro_membership_levels} WHERE name = %s LIMIT 1",
    'Programa 3 Meses - Pago unico'
  )
);

$LEVEL_TRES_PAGOS = (int) $wpdb->get_var(
  $wpdb->prepare(
    "SELECT id FROM {$wpdb->pmpro_membership_levels} WHERE name = %s LIMIT 1",
    'Programa 3 Meses - 3 pagos'
  )
);

$checkout_base = $CHECKOUT_PAGE_ID > 0 ? '__HOME__/?page_id=' . $CHECKOUT_PAGE_ID : '#precio';
$checkout_pago_unico = $LEVEL_PAGO_UNICO > 0 ? $checkout_base . '&pmpro_level=' . $LEVEL_PAGO_UNICO : '#precio';
$checkout_tres_pagos = $LEVEL_TRES_PAGOS > 0 ? $checkout_base . '&pmpro_level=' . $LEVEL_TRES_PAGOS : '#precio';

$login_url = $LOGIN_PAGE_ID > 0
  ? '__HOME__/?page_id=' . $LOGIN_PAGE_ID
  : '__HOME__/wp-login.php';

$register_url = $LEVELS_PAGE_ID > 0
  ? '__HOME__/?page_id=' . $LEVELS_PAGE_ID
  : $checkout_pago_unico;

$home_url = '__HOME__/';
$consejo_url = '__HOME__/?page_id=14';
$about_url = '__HOME__/?page_id=20';

function seramor_program_ensure_media_image( $path, $title ) {
  if ( ! file_exists( $path ) ) {
    return '';
  }

  $existing_attachment = get_page_by_title( $title, OBJECT, 'attachment' );

  if ( $existing_attachment instanceof WP_Post ) {
    $existing_url = wp_get_attachment_url( $existing_attachment->ID );

    if ( $existing_url ) {
      return $existing_url;
    }
  }

  require_once ABSPATH . 'wp-admin/includes/image.php';

  $upload_dir = wp_upload_dir();

  if ( ! empty( $upload_dir['error'] ) ) {
    return '';
  }

  $filename = wp_unique_filename( $upload_dir['path'], wp_basename( $path ) );
  $destination = trailingslashit( $upload_dir['path'] ) . $filename;

  if ( ! wp_mkdir_p( $upload_dir['path'] ) || ! copy( $path, $destination ) ) {
    return '';
  }

  $filetype = wp_check_filetype( $filename, null );
  $attachment_id = wp_insert_attachment(
    array(
      'post_mime_type' => $filetype['type'],
      'post_title'     => $title,
      'post_content'   => '',
      'post_status'    => 'inherit',
    ),
    $destination
  );

  if ( is_wp_error( $attachment_id ) || ! $attachment_id ) {
    return '';
  }

  $attachment_data = wp_generate_attachment_metadata( $attachment_id, $destination );
  wp_update_attachment_metadata( $attachment_id, $attachment_data );

  return (string) wp_get_attachment_url( $attachment_id );
}

function seramor_program_ensure_trimmed_png_media_image( $path, $title ) {
  if ( ! file_exists( $path ) ) {
    return '';
  }

  $existing_attachment = get_page_by_title( $title, OBJECT, 'attachment' );

  if ( $existing_attachment instanceof WP_Post ) {
    $existing_url = wp_get_attachment_url( $existing_attachment->ID );

    if ( $existing_url ) {
      return $existing_url;
    }
  }

  if ( ! function_exists( 'imagecreatefrompng' ) || ! function_exists( 'imagecrop' ) ) {
    return seramor_program_ensure_media_image( $path, $title );
  }

  $image = @imagecreatefrompng( $path );

  if ( false === $image ) {
    return seramor_program_ensure_media_image( $path, $title );
  }

  $width = imagesx( $image );
  $height = imagesy( $image );
  $top = null;
  $bottom = null;

  for ( $y = 0; $y < $height; $y++ ) {
    for ( $x = 0; $x < $width; $x++ ) {
      $alpha = ( imagecolorat( $image, $x, $y ) >> 24 ) & 0x7F;

      if ( $alpha < 120 ) {
        if ( null === $top ) {
          $top = $y;
        }

        $bottom = $y;
        break;
      }
    }
  }

  if ( null === $top || null === $bottom ) {
    imagedestroy( $image );
    return seramor_program_ensure_media_image( $path, $title );
  }

  $crop_top = max( 0, $top - 8 );
  $crop_bottom = min( $height - 1, $bottom + 8 );
  $cropped = imagecrop(
    $image,
    array(
      'x'      => 0,
      'y'      => $crop_top,
      'width'  => $width,
      'height' => $crop_bottom - $crop_top + 1,
    )
  );

  imagedestroy( $image );

  if ( false === $cropped ) {
    return seramor_program_ensure_media_image( $path, $title );
  }

  imagesavealpha( $cropped, true );

  $temp_file = wp_tempnam( wp_basename( $path ) );

  if ( ! $temp_file || ! imagepng( $cropped, $temp_file ) ) {
    imagedestroy( $cropped );
    return seramor_program_ensure_media_image( $path, $title );
  }

  imagedestroy( $cropped );

  $trimmed_url = seramor_program_ensure_media_image( $temp_file, $title );
  @unlink( $temp_file );

  return $trimmed_url;
}

$journey_women_path = dirname( __DIR__ )
  . DIRECTORY_SEPARATOR . 'imagenes'
  . DIRECTORY_SEPARATOR . 'canvas'
  . DIRECTORY_SEPARATOR . 'latest'
  . DIRECTORY_SEPARATOR . 'PROGRAMA DE 3 MESES- Recursos e imágenes'
  . DIRECTORY_SEPARATOR . 'Canvas programa de 3 meses'
  . DIRECTORY_SEPARATOR . 'Elemento 1, imagenes de chicas .png';

$JOURNEY_WOMEN = seramor_program_ensure_trimmed_png_media_image( $journey_women_path, 'Programa 3 meses - viaje mujeres recortado' );

foreach ( compact( 'LOGO', 'HERO', 'HEL', 'ROCK' ) as $key => $value ) {
    if ( empty( $value ) ) {
        WP_CLI::error( "Attachment '$key' no encontrado. Revisar IDs." );
    }
}

if ( empty( $JOURNEY_WOMEN ) ) {
  WP_CLI::error( 'No se pudo cargar la imagen de chicas para el bloque "El viaje de tres meses".' );
}

$content = <<<HTML
<!-- wp:html -->
<div class="seramor-shell seramor-program-page">
  <style>
    .seramor-program-page .seramor-topnav {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      z-index: 50;
      padding: 28px 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 42px;
      font-family: 'Cormorant Garamond', serif;
      font-size: 12.5px;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: #f5e6c4;
    }
    .seramor-program-page .seramor-topnav a {
      color: #f5e6c4 !important;
      text-decoration: none;
      position: relative;
      padding-bottom: 4px;
      transition: opacity .25s;
    }
    .seramor-program-page .seramor-topnav a:hover {
      opacity: 0.75;
    }
    .seramor-program-page .seramor-topnav a::after {
      content: '';
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 1px;
      background: #f5e6c4;
      opacity: 0.55;
    }
    .seramor-program-page .seramor-program-hero {
      display: block;
    }
    .seramor-program-page .seramor-program-hero::after {
      content: '';
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 180px;
      z-index: 1;
      pointer-events: none;
      background: linear-gradient(180deg, rgba(64, 75, 53, 0) 0%, rgba(64, 75, 53, 0.38) 45%, #404b35 100%);
    }
    .seramor-program-page .seramor-program-hero-copy {
      padding: 64px 28px 96px;
      grid-template-columns: minmax(0, 860px);
      justify-content: center;
      justify-items: center;
      text-align: center;
    }
    .seramor-program-page .seramor-program-hero-copy .seramor-text {
      max-width: 720px;
      margin-top: 24px;
    }
    .seramor-program-page .seramor-pill-row {
      justify-content: center;
      gap: 18px 26px;
      margin-top: 60px;
    }
    .seramor-program-page .seramor-pill {
      padding: 0;
      border: 0;
      border-radius: 0;
      background: transparent;
      box-shadow: none;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 2.2px;
      text-transform: uppercase;
    }
    .seramor-program-page .seramor-pill::before {
      content: '\2022';
      margin-right: 10px;
      color: #e9d1a7;
    }
    .seramor-program-page .seramor-pill:first-child::before {
      display: none;
    }
    .seramor-program-page .seramor-cta-row {
      justify-content: center;
      margin-top: 58px;
    }
    .seramor-program-page .seramor-program-fit {
      position: relative;
      overflow: hidden;
      padding-top: 26px;
      padding-bottom: 28px;
      background: #404b35;
      color: #fff7ea;
    }
    .seramor-program-page .seramor-program-fit::after {
      content: '';
      position: absolute;
      left: 50%;
      bottom: 0;
      width: min(220px, calc(100% - 64px));
      height: 1px;
      transform: translateX(-50%);
      background: linear-gradient(90deg, rgba(242, 220, 194, 0) 0%, rgba(242, 220, 194, 0.9) 50%, rgba(242, 220, 194, 0) 100%);
      z-index: 2;
    }
    .seramor-program-page .seramor-program-fit .seramor-section-inner {
      max-width: 980px;
      position: relative;
      z-index: 1;
      padding-top: 42px;
      padding-bottom: 44px;
      text-align: center;
    }
    .seramor-program-page .seramor-program-fit .seramor-kicker {
      margin-bottom: 18px;
      text-align: center;
      color: #f2dcc2;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 4.4px;
    }
    .seramor-program-page .seramor-program-fit .seramor-title {
      max-width: 640px;
      margin: 0 auto;
      text-align: center;
      color: #fff7ea;
      font-size: clamp(28px, 3.5vw, 40px);
      line-height: 1.2;
    }
    .seramor-program-page .seramor-program-fit .seramor-list {
      max-width: 760px;
      margin: 26px auto 0;
      padding: 0;
      gap: 18px;
      text-align: left;
    }
    .seramor-program-page .seramor-program-journey {
      background: #404b35;
      color: #fff7ea;
    }
    .seramor-program-page .seramor-program-journey .seramor-section-inner {
      max-width: 1260px;
      text-align: center;
      padding-top: 86px;
      padding-bottom: 98px;
    }
    .seramor-program-page .seramor-program-journey .seramor-kicker {
      text-align: center;
      color: #e9d1a7;
      margin-bottom: 18px;
    }
    .seramor-program-page .seramor-program-journey .seramor-title {
      max-width: 760px;
      margin: 0 auto;
      text-align: center;
      color: #fff7ea;
      font-size: clamp(28px, 3.4vw, 40px);
      line-height: 1.2;
    }
    .seramor-program-page .seramor-journey-figures {
      margin: 6px auto 2px;
      max-width: 980px;
    }
    .seramor-program-page .seramor-journey-figures img {
      width: 100%;
      height: auto;
      display: block;
      margin: 0 auto;
    }
    .seramor-program-page .seramor-journey-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 36px;
      align-items: start;
      max-width: 1180px;
      margin: 0 auto;
    }
    .seramor-program-page .seramor-journey-step {
      padding: 0 12px;
      text-align: center;
    }
    .seramor-program-page .seramor-journey-step h3 {
      margin: 0 0 12px;
      color: #fff7ea;
      font-size: 28px;
      line-height: 1.16;
      font-weight: 400;
    }
    .seramor-program-page .seramor-journey-step p {
      margin: 0 auto;
      max-width: 320px;
      color: #fff7ea;
      font-size: 18px;
      line-height: 1.6;
    }
    .seramor-program-page .seramor-program-fit .seramor-list li {
      color: #fff1e1;
      font-size: 19px;
    }
    .seramor-program-page .seramor-program-fit .seramor-list li::before {
      background: #f2dcc2;
    }
    .seramor-program-page .seramor-program-rock-wrap {
      position: relative;
      overflow: hidden;
      background: #3a2614;
      color: #fff7ea;
    }
    .seramor-program-page .seramor-program-rock-wrap::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        linear-gradient(180deg, rgba(58, 38, 20, 0.22) 0%, rgba(58, 38, 20, 0.38) 100%),
        url('$ROCK') center/cover no-repeat;
      z-index: 0;
    }
    .seramor-program-page .seramor-program-rock-wrap .seramor-section,
    .seramor-program-page .seramor-program-rock-wrap .seramor-quote-band {
      position: relative;
      z-index: 1;
      background: transparent;
    }
    .seramor-program-page .seramor-program-rock-wrap .seramor-section-inner {
      position: relative;
      z-index: 1;
    }
    .seramor-program-page .seramor-program-includes {
      position: relative;
      background: transparent;
      color: #fff7ea;
    }
    .seramor-program-page .seramor-program-includes::after {
      content: '';
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 170px;
      pointer-events: none;
      background: linear-gradient(180deg, rgba(58, 38, 20, 0) 0%, rgba(58, 38, 20, 0.34) 46%, rgba(58, 38, 20, 0.72) 100%);
      z-index: 1;
    }
    .seramor-program-page .seramor-program-includes .seramor-kicker,
    .seramor-program-page .seramor-program-includes .seramor-title,
    .seramor-program-page .seramor-program-includes .seramor-card h3,
    .seramor-program-page .seramor-program-includes .seramor-card p {
      color: #fff7ea;
    }
    .seramor-program-page .seramor-program-includes .seramor-section-inner {
      padding-bottom: 36px;
    }
    .seramor-program-page .seramor-program-includes .seramor-card {
      background: rgba(245, 230, 196, 0.1);
      border-color: rgba(233, 209, 167, 0.22);
      box-shadow: 0 18px 44px rgba(0, 0, 0, 0.16);
    }
    .seramor-program-page .seramor-program-rock-wrap .seramor-quote-band {
      min-height: 360px;
    }
    .seramor-program-page .seramor-program-rock-wrap .seramor-quote-band img {
      display: none;
    }
    .seramor-program-page .seramor-program-rock-wrap .seramor-quote-band::after {
      background: linear-gradient(180deg, rgba(58, 38, 20, 0.04) 0%, rgba(58, 38, 20, 0.16) 100%);
    }
    @media (max-width: 640px) {
      .seramor-program-page .seramor-program-hero-copy {
        padding-top: 56px;
      }
      .seramor-program-page .seramor-pill-row {
        flex-direction: column;
        gap: 10px;
        margin-top: 46px;
      }
      .seramor-program-page .seramor-pill::before {
        display: none;
      }
      .seramor-program-page .seramor-cta-row {
        margin-top: 44px;
      }
      .seramor-program-page .seramor-program-fit .seramor-section-inner {
        padding-top: 32px;
        padding-bottom: 34px;
      }
      .seramor-program-page .seramor-program-fit {
        padding-top: 18px;
        padding-bottom: 20px;
      }
      .seramor-program-page .seramor-program-fit .seramor-list {
        padding: 0;
      }
      .seramor-program-page .seramor-topnav {
        padding: 22px 20px;
        gap: 18px;
        flex-wrap: wrap;
      }
      .seramor-program-page .seramor-program-journey .seramor-section-inner {
        padding-top: 64px;
        padding-bottom: 70px;
      }
      .seramor-program-page .seramor-journey-figures {
        margin-top: 4px;
        margin-bottom: 2px;
      }
      .seramor-program-page .seramor-journey-grid {
        grid-template-columns: 1fr;
        gap: 28px;
      }
      .seramor-program-page .seramor-program-rock-wrap .seramor-quote-band {
        min-height: 280px;
      }
    }
  </style>
  <!-- seramor-page-header -->
  <section class="seramor-program-hero">
    <div class="seramor-program-hero-bg"><img class="wp-image-$HERO_ID" src="$HERO" alt="Programa de 3 meses"/></div>
    <nav class="seramor-topnav" style="position:relative;z-index:2">
      <a href="$register_url">REGÍSTRATE</a>
      <a href="__HOME__/?page_id=17">PROGRAMA “MUJERES PODEROSAS”</a>
      <a href="$consejo_url">CONSEJO DE DIOSAS</a>
      <a href="$about_url">SOBRE SERAMOR</a>
      <a href="$login_url">INICIA SESIÓN</a>
    </nav>
    <div class="seramor-program-hero-copy">
      <p class="seramor-kicker">Programa inmersivo de 12 semanas</p>
      <h1 class="seramor-title">Mujeres Poderosas</h1>
      <p class="seramor-text">Un recorrido de tres meses para sanar en profundidad, sostenerte en comunidad y construir una vida más libre sin volver a posponerte.</p>
      <div class="seramor-pill-row">
        <span class="seramor-pill">Grupo reducido</span>
        <span class="seramor-pill">Acompañamiento real</span>
        <span class="seramor-pill">Online en vivo</span>
      </div>
      <div class="seramor-cta-row">
        <a class="seramor-btn" href="$checkout_pago_unico">Reservar plaza completa</a>
        <a class="seramor-btn is-secondary" href="$checkout_tres_pagos">Ver opción en 3 pagos</a>
      </div>
    </div>
  </section>

  <section class="seramor-section seramor-program-fit">
    <div class="seramor-section-inner">
      <p class="seramor-kicker">Esto es para ti si...</p>
      <h2 class="seramor-title">Necesitas un espacio que te ordene por dentro y por fuera</h2>
      <ul class="seramor-list">
        <li>Te sientes desconectada de tu deseo, de tu cuerpo y de tu dirección.</li>
        <li>Quieres sanar heridas, creencias limitantes y patrones que te encogen.</li>
        <li>Sabes que tienes algo grande que crear, pero te falta estructura para sostenerlo.</li>
        <li>No quieres hacerlo sola: buscas espejo, comunidad y acompañamiento honesto.</li>
      </ul>
    </div>
  </section>

  <section class="seramor-section seramor-program-journey">
    <div class="seramor-section-inner">
      <p class="seramor-kicker">El viaje de tres meses</p>
      <h2 class="seramor-title">Tres movimientos para cambiar tu forma de vivir</h2>
      <div class="seramor-journey-figures"><img src="$JOURNEY_WOMEN" alt="Tres mujeres simbolizando las etapas del programa"/></div>
      <div class="seramor-journey-grid">
        <article class="seramor-journey-step">
          <h3>Mes 1<br/>Sanar la raíz</h3>
          <p>Trabajamos niña interior, cuerpo, heridas y creencias para soltar lo que todavía dirige tu vida en automático.</p>
        </article>
        <article class="seramor-journey-step">
          <h3>Mes 2<br/>Expandir tu deseo</h3>
          <p>Recuperamos intuición, creatividad y claridad para que puedas nombrar la vida que de verdad quieres crear.</p>
        </article>
        <article class="seramor-journey-step">
          <h3>Mes 3<br/>Sostener acción</h3>
          <p>Bajamos todo a decisión, hábitos y movimiento concreto para que la transformación tenga cuerpo y continuidad.</p>
        </article>
      </div>
    </div>
  </section>

  <div class="seramor-program-rock-wrap">
    <section class="seramor-section seramor-program-includes">
      <div class="seramor-section-inner">
        <p class="seramor-kicker">Qué incluye</p>
        <h2 class="seramor-title">Una estructura pensada para que no te pierdas a mitad del proceso</h2>
        <div class="seramor-card-grid" style="margin-top:34px">
          <article class="seramor-card"><h3>Sesiones en vivo</h3><p>Encuentros semanales para trabajar en directo lo emocional, lo corporal y lo práctico.</p></article>
          <article class="seramor-card"><h3>Ritual mensual</h3><p>Un espacio más profundo para integrar lo vivido, escuchar tu proceso y abrir el siguiente paso.</p></article>
          <article class="seramor-card"><h3>Comunidad reducida</h3><p>Un grupo pequeño para que haya intimidad, seguimiento y presencia real entre vosotras.</p></article>
          <article class="seramor-card"><h3>Herramientas semanales</h3><p>Prácticas, journaling, meditaciones y ejercicios para seguir entre encuentro y encuentro.</p></article>
          <article class="seramor-card"><h3>Cuaderno de integración</h3><p>Un mapa para registrar avances, detectar bloqueos y convertir intuición en acción concreta.</p></article>
          <article class="seramor-card"><h3>Acompañamiento humano</h3><p>No es contenido suelto: hay contexto, mirada y dirección para sostener tu cambio completo.</p></article>
        </div>
      </div>
    </section>

    <section class="seramor-quote-band">
      <img class="wp-image-$ROCK_ID" src="$ROCK" alt="Mano sobre el agua"/>
      <div class="seramor-quote-copy">
        <p>Es el momento de expandirte y dejar de postergarte.</p>
      </div>
    </section>
  </div>

  <section id="precio" class="seramor-section">
    <div class="seramor-section-inner">
      <p class="seramor-kicker">Inversión</p>
      <h2 class="seramor-title">Entra en el programa con la opción que mejor sostenga tu momento</h2>
      <div class="seramor-pricing-grid">
        <article class="seramor-price-card is-featured">
          <h3>Pago único</h3>
          <span class="seramor-price">500<small> EUR</small></span>
          <ul class="seramor-list">
            <li>Acceso completo a los 3 meses</li>
            <li>Todo el acompañamiento incluido</li>
            <li>Reserva prioritaria de plaza</li>
          </ul>
          <div class="seramor-cta-row"><a class="seramor-btn" href="$checkout_pago_unico">Quiero entrar</a></div>
        </article>
        <article class="seramor-price-card">
          <h3>3 pagos</h3>
          <span class="seramor-price">180<small> EUR</small></span>
          <p style="margin:0 0 16px;font-size:18px;line-height:1.65">Tres pagos mensuales para que puedas entrar sin tensar tu economía actual.</p>
          <ul class="seramor-list">
            <li>3 cuotas de 180 EUR</li>
            <li>Mismo contenido y acompañamiento</li>
            <li>Ideal si priorizas liquidez</li>
          </ul>
          <div class="seramor-cta-row"><a class="seramor-btn is-secondary" href="$checkout_tres_pagos">Prefiero 3 pagos</a></div>
        </article>
      </div>
      <p class="seramor-mini-note">Las plazas se abren en grupo reducido. Ahora el checkout está listo en test; cuando pasemos a live solo cambiaremos las claves del entorno.</p>
    </div>
  </section>

  <section class="seramor-section seramor-soft">
    <div class="seramor-section-inner">
      <p class="seramor-kicker">FAQ</p>
      <h2 class="seramor-title">Lo importante antes de entrar</h2>
      <div class="seramor-faq">
        <details>
          <summary>¿Cuánto tiempo necesito cada semana?</summary>
          <p>Reserva entre 2 y 4 horas semanales entre sesiones en vivo e integración personal. El programa está pensado para sostener vida real, no para exigirte más de lo que puedes dar.</p>
        </details>
        <details>
          <summary>¿Qué pasa si no puedo asistir a un encuentro?</summary>
          <p>Habrá material y seguimiento para que no te descuelgues del proceso. La prioridad es la presencia, pero el recorrido no se rompe por faltar puntualmente.</p>
        </details>
        <details>
          <summary>¿Es para mí si también quiero impulsar mi proyecto?</summary>
          <p>Sí. El trabajo interior y la acción van juntas. Este espacio no te separa de lo creativo o profesional: te ayuda a sostenerlo desde más verdad.</p>
        </details>
        <details>
          <summary>¿Hay comunidad entre sesiones?</summary>
          <p>Sí. El grupo está pensado para que haya espejo, apoyo y continuidad. No es un programa en solitario ni una biblioteca suelta.</p>
        </details>
      </div>
    </div>
  </section>

  <section class="seramor-section">
    <div class="seramor-section-inner seramor-grid-2">
      <div>
        <p class="seramor-kicker">Cierre</p>
        <h2 class="seramor-title">Si ya lo sientes, no lo vuelvas a postergar</h2>
        <p class="seramor-text" style="margin-top:22px">Este programa está hecho para mujeres que quieren una transformación real, no solo inspiración de paso. El pago ya entra por checkout y el siguiente bloque será cerrar acceso privado y automatizaciones.</p>
        <div class="seramor-cta-row">
          <a class="seramor-btn" href="$checkout_pago_unico">Reservar mi plaza</a>
        </div>
      </div>
      <div class="seramor-image-card"><img class="wp-image-$HEL_ID" src="$HEL" alt="Mujer en naturaleza"/></div>
    </div>
  </section>
</div>
<!-- /wp:html -->
HTML;

$validated_content = $wpdb->strip_invalid_text_for_column( $wpdb->posts, 'post_content', $content );

if ( is_wp_error( $validated_content ) ) {
  $message = $validated_content->get_error_message();
  $data = $validated_content->get_error_data();

  if ( is_array( $data ) && isset( $data['value'] ) ) {
    $message .= ' | Invalid fragment: ' . substr( (string) $data['value'], 0, 220 );
  }

  WP_CLI::error( $message );
}

$result = wp_update_post([
    'ID'           => 17,
  'post_content' => $validated_content,
    'post_status'  => 'publish',
], true);

if ( is_wp_error( $result ) ) {
  $db_error = trim( (string) $wpdb->last_error );
  $message = $result->get_error_message();

  if ( '' !== $db_error ) {
    $message .= ' | DB: ' . $db_error;
  }

  WP_CLI::error( $message );
}

WP_CLI::success( 'Programa de 3 meses publicado. Post ID: 17' );
WP_CLI::line( 'URL: ' . get_permalink( 17 ) );