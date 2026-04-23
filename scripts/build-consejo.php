<?php
/**
 * Build Consejo de Diosas (ID 14) - Seramor
 *
 * Run:
 * c:\xampp\php\php.exe c:\xampp\htdocs\seramor\wp-cli.phar eval-file c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\scripts\build-consejo.php --path="c:\xampp\htdocs\seramor"
 */

$LOGO_ID = 102;
$HERO_ID = 105;
$HEL_ID  = 110;

global $wpdb;

function seramor_consejo_data_uri( $path ) {
  if ( ! file_exists( $path ) ) {
    return '';
  }

  $contents = file_get_contents( $path );

  if ( false === $contents ) {
    return '';
  }

  return 'data:image/png;base64,' . base64_encode( $contents );
}

function seramor_consejo_inline_html( $content ) {
  return wp_kses(
    $content,
    array(
      'br' => array(),
    )
  );
}

function seramor_consejo_render_card( $card ) {
  $meta = sprintf(
    '<p class="consejo-public-card-meta">%s <span>/</span> %s</p>',
    esc_html( $card['meta_left'] ),
    esc_html( $card['meta_right'] )
  );

  return sprintf(
    '<article class="consejo-public-card"><div class="consejo-public-card-media" aria-hidden="true"></div>%s<div class="consejo-public-card-copy"><h4>%s</h4><p>%s</p></div></article>',
    $meta,
    seramor_consejo_inline_html( $card['title'] ),
    seramor_consejo_inline_html( $card['description'] )
  );
}

function seramor_consejo_render_carousel( $section_id, $index, $title, $overlay_text, $cards, $cta_url ) {
  $cards_markup = '';

  foreach ( $cards as $card ) {
    $cards_markup .= seramor_consejo_render_card( $card );
  }

  return sprintf(
    '<section class="consejo-public-library-block" id="%1$s" data-consejo-carousel>' .
      '<div class="consejo-public-library-headline"><span class="consejo-public-library-index">%2$s</span><h3 class="consejo-public-library-title">%3$s</h3></div>' .
      '<div class="consejo-public-carousel-stage">' .
        '<button class="consejo-public-carousel-arrow is-left" type="button" aria-label="Mover contenido a la izquierda" data-consejo-prev>&lsaquo;</button>' .
        '<div class="consejo-public-carousel-window" data-consejo-window><div class="consejo-public-carousel-track">%4$s</div></div>' .
        '<button class="consejo-public-carousel-arrow is-right" type="button" aria-label="Mover contenido a la derecha" data-consejo-next>&rsaquo;</button>' .
        '<div class="consejo-public-carousel-overlay"><p>%5$s</p><a class="consejo-public-overlay-cta" href="%6$s">Desbloquea el contenido</a></div>' .
      '</div>' .
    '</section>',
    esc_attr( $section_id ),
    esc_html( $index ),
    seramor_consejo_inline_html( $title ),
    $cards_markup,
    esc_html( $overlay_text ),
    esc_url( $cta_url )
  );
}

$LOGO = wp_get_attachment_url( $LOGO_ID );
$HERO = wp_get_attachment_url( $HERO_ID );
$HEL  = wp_get_attachment_url( $HEL_ID );

$CHECKOUT_PAGE_ID = (int) get_option( 'pmpro_checkout_page_id' );
$LOGIN_PAGE_ID    = (int) get_option( 'pmpro_login_page_id' );
$LEVELS_PAGE_ID   = (int) get_option( 'pmpro_levels_page_id' );

$LEVEL_CONSEJO = (int) $wpdb->get_var(
  $wpdb->prepare(
    "SELECT id FROM {$wpdb->pmpro_membership_levels} WHERE name = %s LIMIT 1",
    'Consejo de Diosas'
  )
);

$checkout_consejo = $CHECKOUT_PAGE_ID > 0 && $LEVEL_CONSEJO > 0
  ? '__HOME__/?page_id=' . $CHECKOUT_PAGE_ID . '&pmpro_level=' . $LEVEL_CONSEJO
  : '#acceso';

$login_url = $LOGIN_PAGE_ID > 0
  ? '__HOME__/?page_id=' . $LOGIN_PAGE_ID
  : '__HOME__/wp-login.php';

$account_page_id = (int) get_option( 'pmpro_account_page_id' );
$account_url = $account_page_id > 0
  ? '__HOME__/?page_id=' . $account_page_id
  : '__HOME__/';

$register_url = $LEVELS_PAGE_ID > 0
  ? '__HOME__/?page_id=' . $LEVELS_PAGE_ID
  : $checkout_consejo;

$home_url = '__HOME__/';
$program_url = '__HOME__/?page_id=17';
$about_url = '__HOME__/?page_id=20';

$canvas_dir = dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . 'canvas' . DIRECTORY_SEPARATOR . 'latest' . DIRECTORY_SEPARATOR . 'CONSEJO DE DIOSAS- Recursos e imágenes';
$girls_strip = seramor_consejo_data_uri( $canvas_dir . DIRECTORY_SEPARATOR . 'Elemento 1, imagenes de chicas.png' );

foreach ( compact( 'LOGO', 'HERO', 'HEL' ) as $key => $value ) {
    if ( empty( $value ) ) {
        WP_CLI::error( "Attachment '$key' no encontrado. Revisar IDs." );
    }
}

if ( empty( $girls_strip ) ) {
    WP_CLI::error( 'No pude cargar la ilustracion de chicas para Consejo de Diosas.' );
}

$library_sections = array(
    array(
        'id'           => 'sanacion-y-reconexion-femenina',
    'title'        => 'SANACIÓN Y RECONEXIÓN FEMENINA',
        'overlay_text' => 'Un recorrido base para sanar heridas del pasado, transformar creencias limitantes y reconectar con tu cuerpo, tu sexualidad y tu energía femenina.',
        'cards'        => array(
            array(
        'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
            'title'       => 'SESIÓN 1<br/>Vuelve a ti.',
            'description' => 'Reescribe tus creencias',
            ),
            array(
        'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
            'title'       => 'SESIÓN 2<br/>Cuerpo, herida y memoria',
            'description' => 'Sana tu niña interior',
            ),
            array(
        'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
            'title'       => 'SESIÓN 3<br/>Sexualidad y bloqueo emocional',
                'description' => 'Libera tu cuerpo',
            ),
            array(
        'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
            'title'       => 'SESIÓN 4<br/>Menstruación y reconexión cíclica',
            'description' => 'Alíñate contigo',
            ),
            array(
        'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
            'title'       => 'SESIÓN 5<br/>Reescribe tus creencias limitantes',
                'description' => '',
            ),
        ),
    ),
    array(
        'id'           => 'crea-una-vida-libre',
        'title'        => 'CREA UNA VIDA LIBRE',
        'overlay_text' => 'Aprende las bases para crear tu propio negocio online y empezar a construir una vida alineada contigo.',
        'cards'        => array(
            array(
              'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
                'title'       => 'MASTERCLASS<br/>CLARIDAD',
                'description' => 'Las claves para encontrar un negocio alineado contigo',
            ),
            array(
              'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
                'title'       => 'MASTERCLASS<br/>ABUNDANCIA',
                'description' => 'Libérate de tus creencias limitantes con el dinero, aprende a generar ingresos.',
            ),
            array(
              'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
                'title'       => 'MASTERCLASS<br/>Redes Sociales y visibilidad',
                'description' => 'Cómo hacerte viral y convertir esos seguidores en clientes',
            ),
            array(
              'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
                'title'       => 'GUÍA PRÁCTICA<br/>Herramientas para automatizar tu negocio y cómo usarlas',
                'description' => '',
            ),
            array(
              'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
                'title'       => 'GUÍA PRÁCTICA<br/>Tu web desde cero',
                'description' => 'Accede a los pasos y herramientas exactas para crear tu web',
            ),
        ),
    ),
    array(
        'id'           => 'para-cuidar-de-ti',
        'title'        => 'PARA CUIDAR DE TI',
        'overlay_text' => 'Meditaciones guiadas, clases de yoga y diversas prácticas diseñadas para volver a tu cuerpo, regularte y sostenerte en tu día a día.',
        'cards'        => array(
            array(
              'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
            'title'       => 'RITUAL DE AUTOCUIDADO<br/>CONSCIENTE',
                'description' => '“10 ejercicios de journal para conocerte en profundidad”',
            ),
            array(
              'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
            'title'       => 'MEDITACIÓN GUIADA - HELENA',
            'description' => '“Suelta tus miedos”<br/>12 minutos',
            ),
            array(
              'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
                'title'       => 'MASTERCLASS<br/>Redes Sociales y visibilidad',
            'description' => 'Cómo hacerte viral y convertir esos seguidores en clientes',
            ),
            array(
              'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
            'title'       => 'YOGA CÍCLICA',
            'description' => 'para cuidar tu cuerpo en tu fase menstrual<br/>45 minutos',
            ),
            array(
              'meta_left'   => 'DURACIÓN: 30 MIN.',
                'meta_right'  => 'FACILITADORA: HELENA',
                'title'       => 'BREATHWORK',
            'description' => '“Empieza tu día con energía y consciencia”<br/>35 minutos',
            ),
        ),
    ),
    array(
        'id'           => 'biblioteca-de-sabiduria',
        'title'        => 'BIBLIOTECA DE SABIDURÍA Y<br/>RECURSOS PRÁCTICOS',
        'overlay_text' => 'Una biblioteca para inspirarte, aprender y seguir en un mismo entorno que vibra con tu feminidad.',
        'cards'        => array(
            array(
                'meta_left'   => 'LIBRO',
                'meta_right'  => 'RECURSO',
            'title'       => 'LIBRO: El poder del ahora',
                'description' => 'para volver con presencia a estar con tu vida',
            ),
            array(
                'meta_left'   => 'LIBRO',
                'meta_right'  => 'RECURSO',
            'title'       => 'LIBRO: Mujeres que corren con los lobos',
            'description' => 'Descubre lo salvaje que vive en tu poder como mujer',
            ),
            array(
                'meta_left'   => 'REMEDIOS',
                'meta_right'  => 'RECURSO',
            'title'       => 'REMEDIOS NATURALES para tu fase menstrual',
                'description' => 'Hierbas, infusiones y alimentos para sanar en tu ciclo',
            ),
            array(
                'meta_left'   => 'LIBRO',
                'meta_right'  => 'RECURSO',
                'title'       => 'LIBRO: El camino del artista',
            'description' => 'Desbloquea tu proceso creativo y empieza a accionar en tu vida',
            ),
            array(
                'meta_left'   => 'LIBRO',
                'meta_right'  => 'RECURSO',
                'title'       => 'LIBRO: Luna roja',
            'description' => 'Aprende sobre diferentes ciclos menstruales',
            ),
        ),
    ),
);

$library_markup = '';

    foreach ( $library_sections as $index => $library_section ) {
    $library_markup .= seramor_consejo_render_carousel(
        $library_section['id'],
        sprintf( '%02d', $index + 1 ),
        $library_section['title'],
        $library_section['overlay_text'],
        $library_section['cards'],
        $checkout_consejo
    );
}

$content = <<<HTML
<!-- wp:html -->
<div class="seramor-shell seramor-membership-page consejo-public-page">
  <style>
    .consejo-public-page {
      background: #853916;
      color: #f8ecdc;
      overflow: hidden;
    }
    .consejo-public-page .seramor-membership-hero {
      background: #853916;
      padding: 0 0 28px;
    }
    .consejo-public-page .seramor-membership-hero::after {
      display: none;
    }
    .consejo-public-page .seramor-membership-copy {
      max-width: 900px;
      padding: 24px 28px 18px;
      text-align: center;
    }
    .consejo-public-page .seramor-membership-copy .seramor-title {
      max-width: none;
      font-size: clamp(42px, 7vw, 64px);
      letter-spacing: 0.5px;
    }
    .consejo-public-page .seramor-membership-copy .seramor-text {
      max-width: 620px;
      margin: 18px auto 0;
      font-size: 21px;
      line-height: 1.45;
      color: #fffaf4;
    }
    .consejo-public-page .seramor-cta-row {
      justify-content: center;
      margin-top: 28px;
    }
    .consejo-public-page .seramor-btn,
    .consejo-public-page .seramor-btn:visited,
    .consejo-public-overlay-cta {
      min-height: 54px;
      padding: 12px 34px;
      border-radius: 999px;
      border: 2px solid #f6e2a5;
      background: transparent;
      color: #fff7ea !important;
      box-shadow: none;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 1.8px;
      text-transform: uppercase;
      text-decoration: none;
    }
    .consejo-public-page .seramor-btn:hover,
    .consejo-public-overlay-cta:hover {
      transform: none;
      box-shadow: none;
      background: rgba(246, 226, 165, 0.12);
    }
    .consejo-public-page .seramor-btn.is-secondary,
    .consejo-public-page .seramor-btn.is-secondary:visited,
    .consejo-public-page .seramor-btn.is-ghost,
    .consejo-public-page .seramor-btn.is-ghost:visited {
      background: transparent;
      border-color: #f6e2a5;
      color: #fff7ea !important;
    }
    .consejo-public-pillars {
      max-width: 1040px;
      margin: 10px auto 0;
      padding: 0 28px 46px;
      text-align: center;
    }
    .consejo-public-pillars-art {
      display: flex;
      justify-content: center;
      margin-bottom: 4px;
    }
    .consejo-public-pillars-art img {
      width: min(760px, 100%);
      display: block;
      margin: 0 auto;
    }
    .consejo-public-pillars-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 28px;
      margin-top: 0;
    }
    .consejo-public-pillar {
      max-width: 240px;
      margin: 0 auto;
    }
    .consejo-public-pillar h3 {
      margin: 0;
      color: #fff7ea;
      font-size: 26px;
      letter-spacing: 0.3px;
    }
    .consejo-public-pillar p {
      margin: 8px 0 0;
      color: #f0c8ad;
      font-size: 18px;
      line-height: 1.35;
    }
    .consejo-public-about,
    .consejo-public-library {
      padding: 12px 28px 54px;
    }
    .consejo-public-about {
      padding: 74px 28px 78px;
    }
    .consejo-public-about-inner {
      max-width: 860px;
      margin: 0 auto;
      text-align: center;
      padding: 44px 48px 48px;
      border-top: 1px solid rgba(246, 226, 165, 0.34);
      border-bottom: 1px solid rgba(246, 226, 165, 0.2);
    }
    .consejo-public-about .seramor-kicker {
      margin-bottom: 16px;
      color: #f0dcc8;
      letter-spacing: 3px;
      font-size: 12px;
    }
    .consejo-public-about-title {
      margin: 0;
      color: #fff7ea;
      font-size: clamp(24px, 3.2vw, 32px);
      line-height: 1.28;
      text-transform: none;
      font-weight: 500;
      max-width: 620px;
      text-align: center;
      margin-left: auto;
      margin-right: auto;
    }
    .consejo-public-about-copy {
      margin: 18px auto 0;
      color: #f0dcc8;
      font-size: 17px;
      line-height: 1.8;
      max-width: 620px;
    }
    .consejo-public-library {
      padding: 52px 0 36px;
    }
    .consejo-public-library-intro {
      max-width: 860px;
      margin: 0 auto 48px;
      padding: 0 28px;
      text-align: center;
    }
    .consejo-public-library-intro .seramor-kicker {
      color: #f0dcc8;
      margin-bottom: 12px;
    }
    .consejo-public-section-title {
      margin: 0;
      color: #fff7ea;
      font-size: clamp(24px, 3.3vw, 34px);
      line-height: 1.24;
      text-transform: none;
      letter-spacing: 0.2px;
    }
    .consejo-public-section-copy {
      margin: 16px auto 0;
      max-width: 660px;
      color: #f0dcc8;
      font-size: 18px;
      line-height: 1.65;
    }
    .consejo-public-feature-strip .seramor-section-inner {
      max-width: 1240px;
    }
    .consejo-public-feature-strip .seramor-feature-grid {
      display: grid;
      grid-template-columns: repeat(5, minmax(0, 1fr));
      gap: 18px;
      margin-top: 36px;
    }
    .consejo-public-feature-strip .seramor-feature-card {
      min-height: 260px;
      padding: 26px 22px;
      background: rgba(247, 236, 220, 0.06);
      border: 1px solid rgba(246, 226, 165, 0.16);
      box-shadow: 0 18px 40px rgba(0, 0, 0, 0.12);
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      text-align: left;
    }
    .consejo-public-feature-strip .seramor-feature-card h3 {
      margin: 0 0 14px;
      color: #fff7ea;
      font-size: 24px;
      line-height: 1.12;
    }
    .consejo-public-feature-strip .seramor-feature-card p {
      margin: 0;
      color: #f0dcc8;
      font-size: 17px;
      line-height: 1.65;
    }
    .consejo-public-library-block {
      margin: 0 auto 62px;
      max-width: 1380px;
      padding: 0 0 2px;
    }
    .consejo-public-library-block + .consejo-public-library-block {
      padding-top: 52px;
      border-top: 1px solid rgba(246, 226, 165, 0.16);
    }
    .consejo-public-library-headline {
      display: grid;
      justify-items: center;
      gap: 12px;
    }
    .consejo-public-library-title {
      margin: 0 0 34px;
      text-align: center;
      color: #fff7ea;
      font-size: clamp(30px, 4vw, 44px);
      line-height: 1.08;
      letter-spacing: 0.4px;
    }
    .consejo-public-library-index {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 42px;
      height: 42px;
      padding: 0 14px;
      border-radius: 999px;
      border: 1px solid rgba(246, 226, 165, 0.44);
      color: #f6e2a5;
      font-size: 12px;
      letter-spacing: 2.4px;
      text-transform: uppercase;
    }
    .consejo-public-carousel-stage {
      position: relative;
      width: min(1340px, calc(100vw - 20px));
      margin: 0 auto;
      padding: 44px 0 0;
    }
    .consejo-public-carousel-window {
      overflow-x: auto;
      overflow-y: hidden;
      scroll-behavior: smooth;
      scrollbar-width: none;
      -ms-overflow-style: none;
    }
    .consejo-public-carousel-window::-webkit-scrollbar {
      display: none;
    }
    .consejo-public-carousel-track {
      display: flex;
      gap: 26px;
      align-items: flex-start;
      padding: 0 28px;
      min-width: max-content;
    }
    .consejo-public-card {
      width: 238px;
      flex: 0 0 238px;
      color: #d6a78f;
    }
    .consejo-public-card-media {
      height: 160px;
      border-radius: 0;
      background:
        radial-gradient(circle at 45% 28%, rgba(206, 153, 125, 0.78) 0 14%, transparent 15%),
        radial-gradient(circle at 6% 34%, rgba(206, 153, 125, 0.58) 0 3%, transparent 4%),
        linear-gradient(180deg, rgba(197, 169, 156, 0.88) 0 62%, rgba(160, 128, 45, 0.88) 62% 82%, rgba(147, 115, 7, 0.92) 82% 100%);
      opacity: 0.52;
    }
    .consejo-public-card-meta {
      margin: 12px 0 0;
      color: #b78467;
      font-size: 10px;
      letter-spacing: 0.2px;
      text-transform: uppercase;
      opacity: 0.95;
    }
    .consejo-public-card-meta span {
      padding: 0 7px;
    }
    .consejo-public-card-copy {
      margin-top: 18px;
    }
    .consejo-public-card-copy h4 {
      margin: 0;
      color: #d6a78f;
      font-size: 24px;
      line-height: 1.1;
      text-transform: none;
    }
    .consejo-public-card-copy p {
      margin: 6px 0 0;
      color: #d6a78f;
      font-size: 18px;
      line-height: 1.22;
    }
    .consejo-public-carousel-overlay {
      position: absolute;
      inset: 104px 50% auto auto;
      width: min(360px, calc(100vw - 76px));
      transform: translateX(50%);
      text-align: center;
      z-index: 3;
      pointer-events: none;
    }
    .consejo-public-carousel-overlay p {
      margin: 0 auto 16px;
      max-width: 340px;
      color: #fff8f0;
      font-size: 20px;
      line-height: 1.2;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.18);
    }
    .consejo-public-overlay-cta {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      pointer-events: auto;
      background: rgba(246, 226, 165, 0.92);
      color: #fff7ea !important;
      box-shadow: inset 0 0 0 2px rgba(255, 255, 255, 0.72);
    }
    .consejo-public-carousel-arrow {
      position: absolute;
      top: 118px;
      z-index: 4;
      width: 54px;
      height: 54px;
      border: 0;
      background: transparent;
      color: #fff7ea;
      font-size: 62px;
      line-height: 1;
      padding: 0;
      cursor: pointer;
    }
    .consejo-public-carousel-arrow.is-left {
      left: calc(50% - 270px);
    }
    .consejo-public-carousel-arrow.is-right {
      right: calc(50% - 270px);
    }
    .consejo-public-page .seramor-section {
      background: transparent;
    }
    .consejo-public-page .seramor-section .seramor-title,
    .consejo-public-page .seramor-section .seramor-text,
    .consejo-public-page .seramor-section h2,
    .consejo-public-page .seramor-section h3,
    .consejo-public-page .seramor-section h4,
    .consejo-public-page .seramor-section p,
    .consejo-public-page .seramor-section li {
      color: inherit;
    }
    .consejo-public-access {
      background: linear-gradient(180deg, rgba(78, 32, 13, 0.95) 0%, rgba(63, 24, 9, 0.98) 100%);
      color: #f8ecdc;
    }
    .consejo-public-access .seramor-kicker,
    .consejo-public-closeout .seramor-kicker {
      color: #d9bca8;
    }
    .consejo-public-access .seramor-section-inner,
    .consejo-public-closeout .seramor-section-inner {
      max-width: 1080px;
    }
    .consejo-public-access .seramor-price-card.is-featured {
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.18);
    }
    .consejo-public-access .seramor-login-panel {
      background: rgba(247, 236, 220, 0.06);
      border: 1px solid rgba(246, 226, 165, 0.18);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.16);
      color: #f8ecdc;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .consejo-public-access .seramor-login-panel h3,
    .consejo-public-access .seramor-login-panel p {
      color: #f8ecdc;
    }
    .consejo-public-access .seramor-login-panel h3 {
      font-size: 28px;
      line-height: 1.18;
    }
    .consejo-public-access .seramor-login-panel p {
      color: #e8d2c2;
      font-size: 17px;
    }
    .consejo-public-access .seramor-login-panel .seramor-btn,
    .consejo-public-access .seramor-login-panel .seramor-btn:visited {
      background: transparent;
      border: 1px solid rgba(246, 226, 165, 0.52);
      color: #fff7ea !important;
      min-height: 52px;
      letter-spacing: 1.4px;
      box-shadow: none;
    }
    .consejo-public-access .seramor-login-panel .seramor-btn:first-of-type,
    .consejo-public-access .seramor-login-panel .seramor-btn:first-of-type:visited {
      background: #f6e2a5;
      color: #6f2f12 !important;
      border-color: #f6e2a5;
    }
    .consejo-public-access .seramor-login-panel .seramor-btn.is-secondary,
    .consejo-public-access .seramor-login-panel .seramor-btn.is-secondary:visited,
    .consejo-public-access .seramor-login-panel .seramor-btn.is-ghost,
    .consejo-public-access .seramor-login-panel .seramor-btn.is-ghost:visited {
      color: #fff7ea !important;
      border-color: rgba(246, 226, 165, 0.52);
      background: rgba(255, 255, 255, 0.02);
    }
    .consejo-public-closeout {
      padding-top: 82px;
      padding-bottom: 100px;
      text-align: center;
    }
    .consejo-public-closeout .seramor-section-inner {
      max-width: 760px;
    }
    .consejo-public-closeout .seramor-text {
      max-width: 640px;
      margin: 20px auto 0;
      color: #f0dcc8;
      font-size: 18px;
      line-height: 1.75;
    }
    .consejo-public-closeout .seramor-cta-row {
      justify-content: center;
    }
    .consejo-public-page .seramor-access-grid {
      align-items: stretch;
    }
    @media (max-width: 1080px) {
      .consejo-public-pillars-grid {
        gap: 18px;
      }
      .consejo-public-carousel-arrow.is-left {
        left: 18px;
      }
      .consejo-public-carousel-arrow.is-right {
        right: 18px;
      }
      .consejo-public-carousel-overlay {
        inset: 96px 50% auto auto;
      }
      .consejo-public-about-inner {
        padding-left: 32px;
        padding-right: 32px;
      }
      .consejo-public-feature-strip .seramor-feature-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
      }
    }
    @media (max-width: 820px) {
      .consejo-public-pillars-grid {
        grid-template-columns: 1fr;
      }
      .consejo-public-pillars-art {
        margin-bottom: 2px;
      }
      .consejo-public-pillars-art img {
        width: min(360px, 100%);
      }
      .consejo-public-carousel-stage {
        width: calc(100vw - 16px);
        padding-top: 168px;
      }
      .consejo-public-carousel-overlay {
        inset: 0 50% auto auto;
        transform: translateX(50%);
      }
      .consejo-public-carousel-overlay p {
        font-size: 18px;
      }
      .consejo-public-carousel-arrow {
        top: 152px;
      }
      .consejo-public-card {
        width: min(232px, calc(100vw - 84px));
        flex-basis: min(232px, calc(100vw - 84px));
      }
      .consejo-public-page .seramor-membership-copy .seramor-text,
      .consejo-public-about-copy {
        font-size: 18px;
      }
      .consejo-public-library-block + .consejo-public-library-block {
        padding-top: 42px;
      }
      .consejo-public-feature-strip .seramor-feature-grid {
        grid-template-columns: 1fr;
      }
      .consejo-public-feature-strip .seramor-feature-card {
        min-height: 0;
      }
    }
    @media (max-width: 560px) {
      .consejo-public-page .seramor-membership-copy {
        padding-left: 18px;
        padding-right: 18px;
      }
      .consejo-public-about {
        padding-left: 18px;
        padding-right: 18px;
      }
      .consejo-public-about-inner {
        padding: 34px 20px 38px;
      }
      .consejo-public-page .seramor-cta-row {
        flex-direction: column;
        align-items: center;
      }
      .consejo-public-page .seramor-btn,
      .consejo-public-page .seramor-btn:visited,
      .consejo-public-overlay-cta {
        width: 100%;
        max-width: 290px;
      }
      .consejo-public-carousel-track {
        gap: 18px;
        padding: 0 14px;
      }
      .consejo-public-carousel-arrow {
        width: 42px;
        height: 42px;
        font-size: 44px;
      }
      .consejo-public-card {
        width: calc(100vw - 82px);
        flex-basis: calc(100vw - 82px);
      }
      .consejo-public-library-title {
        margin-bottom: 28px;
      }
      .consejo-public-library-intro {
        margin-bottom: 38px;
        padding-left: 18px;
        padding-right: 18px;
      }
    }
  </style>

  <section class="seramor-membership-hero">
    <div class="seramor-membership-copy">
      <p class="seramor-kicker">Membresía mensual</p>
      <h1 class="seramor-title">Consejo de Diosas</h1>
      <p class="seramor-text">Un espacio de transformación a tu ritmo para sanar tu historia, volver a ti y empezar a crear una vida más libre, consciente y alineada.</p>
      <div class="seramor-cta-row">
        <a class="seramor-btn" href="$checkout_consejo">Quiero entrar al consejo</a>
        <a class="seramor-btn is-secondary" href="$login_url">Ya tengo cuenta</a>
      </div>
    </div>
  </section>

  <section class="consejo-public-pillars">
    <div class="consejo-public-pillars-art"><img src="$girls_strip" alt=""/></div>
    <div class="consejo-public-pillars-grid">
      <article class="consejo-public-pillar">
        <h3>Sanar</h3>
        <p>Reconecta con tu cuerpo, tus heridas y tu historia desde un lugar más amable.</p>
      </article>
      <article class="consejo-public-pillar">
        <h3>Expandir</h3>
        <p>Abre espacio para una vida menos encogida y mucho más alineada con tu deseo.</p>
      </article>
      <article class="consejo-public-pillar">
        <h3>Sostener</h3>
        <p>Vuelve a ti con prácticas simples, recursos y acompañamiento continuo.</p>
      </article>
    </div>
  </section>

  <section class="consejo-public-about">
    <div class="consejo-public-about-inner">
      <p class="seramor-kicker">Qué es</p>
      <h2 class="consejo-public-about-title">Una biblioteca viva para acompañarte entre sesiones y en tu día a día</h2>
      <p class="consejo-public-about-copy">Consejo de Diosas reúne clases, prácticas, recursos y caminos de integración para mujeres que quieren seguir sanando y creciendo con libertad, sin depender de impulsos pasajeros.</p>
      <p class="consejo-public-about-copy">No es solo contenido: es una puerta de entrada a una forma distinta de sostenerte, volver a ti y crear una vida que se parezca más a lo que de verdad quieres.</p>
    </div>
  </section>

  <section class="consejo-public-library">
    <div class="consejo-public-library-intro">
      <p class="seramor-kicker">Dentro del Consejo</p>
      <p class="consejo-public-section-copy">Aquí puedes asomarte a la biblioteca y ver el tipo de sesiones, prácticas y recursos que encontrarás dentro del Consejo de Diosas al suscribirte.</p>
    </div>
    $library_markup
  </section>

  <section class="seramor-section consejo-public-feature-strip">
    <div class="seramor-section-inner">
      <p class="seramor-kicker">Qué encontrarás dentro</p>
      <h2 class="consejo-public-section-title">Cinco puertas para sostener tu proceso a lo largo del tiempo</h2>
      <div class="seramor-feature-grid">
        <article class="seramor-feature-card"><h3>Sanación</h3><p>Sesiones para volver a la raíz de tus patrones con suavidad y verdad.</p></article>
        <article class="seramor-feature-card"><h3>Vida libre</h3><p>Recursos para crear una vida más alineada con tu deseo y tu visión.</p></article>
        <article class="seramor-feature-card"><h3>Presente</h3><p>Prácticas para regularte, escucharte y cuidarte en el día a día.</p></article>
        <article class="seramor-feature-card"><h3>Sabiduría</h3><p>Biblioteca de libros, remedios, recomendaciones y materiales vivos.</p></article>
        <article class="seramor-feature-card"><h3>Integración</h3><p>Cuaderno, eventos y caminos para convertir teoría en movimiento real.</p></article>
      </div>
    </div>
  </section>

  <section id="acceso" class="seramor-section consejo-public-access">
    <div class="seramor-section-inner">
      <p class="seramor-kicker">Precio y acceso</p>
      <h2 class="consejo-public-section-title">Entra al Consejo de Diosas y desbloquea la biblioteca privada</h2>
      <div class="seramor-access-grid">
        <article class="seramor-price-card is-featured">
          <h3>Consejo de Diosas</h3>
          <span class="seramor-price">39<small> EUR / mes</small></span>
          <ul class="seramor-list">
            <li>Acceso a la biblioteca privada</li>
            <li>Acceso a los eventos semanales en formato pregrabado para que no te pierdas ninguno</li>
            <li>Acceso al cuaderno de ejercicios físico y contacto directo 24/7 con Helena para acompañarte en tu proceso</li>
          </ul>
          <div class="seramor-cta-row">
            <a class="seramor-btn" href="$checkout_consejo">Suscribirme</a>
            <a class="seramor-btn is-secondary" href="__HOME__/?page_id=17">Prefiero ver el programa</a>
          </div>
        </article>
        <aside class="seramor-login-panel">
          <h3>¿Ya formas parte de la comunidad?</h3>
          <a class="seramor-btn" href="$login_url">Iniciar sesión</a>
          <a class="seramor-btn is-secondary" href="$checkout_consejo">Regístrate</a>
          <a class="seramor-btn is-ghost" href="__HOME__/?page_id=17">Quiero el programa 3 meses</a>
        </aside>
      </div>
    </div>
  </section>

  <section class="seramor-section consejo-public-closeout">
    <div class="seramor-section-inner">
      <p class="seramor-kicker">Tu siguiente paso</p>
      <h2 class="consejo-public-section-title">Empieza por el Consejo o entra directo al proceso inmersivo</h2>
      <p class="seramor-text">Si ahora mismo necesitas un ritmo más suave y sostenido, el Consejo puede acompañarte paso a paso. Si estás lista para una transformación intensiva, el programa de 3 meses te espera.</p>
      <div class="seramor-cta-row">
        <a class="seramor-btn" href="$checkout_consejo">Entrar al consejo</a>
        <a class="seramor-btn is-secondary" href="__HOME__/?page_id=17">Ver programa 3 meses</a>
      </div>
    </div>
  </section>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-consejo-carousel]').forEach(function (carousel) {
          var viewport = carousel.querySelector('[data-consejo-window]');
          var prev = carousel.querySelector('[data-consejo-prev]');
          var next = carousel.querySelector('[data-consejo-next]');
          var firstCard = carousel.querySelector('.consejo-public-card');

          if (!viewport || !firstCard) {
            return;
          }

          var getStep = function () {
            return firstCard.getBoundingClientRect().width + 26;
          };

          var setInitialOffset = function () {
            if (window.innerWidth > 820) {
              viewport.scrollLeft = getStep() * 0.58;
            } else {
              viewport.scrollLeft = 0;
            }
          };

          setInitialOffset();

          prev.addEventListener('click', function () {
            viewport.scrollBy({ left: -getStep(), behavior: 'smooth' });
          });

          next.addEventListener('click', function () {
            viewport.scrollBy({ left: getStep(), behavior: 'smooth' });
          });

          window.addEventListener('resize', function () {
            if (!carousel.dataset.userMoved) {
              setInitialOffset();
            }
          });

          viewport.addEventListener('scroll', function () {
            carousel.dataset.userMoved = 'true';
          }, { passive: true });
        });
      });
    </script>
</div>
<!-- /wp:html -->
HTML;

$result = wp_update_post([
    'ID'           => 14,
    'post_content' => $content,
    'post_status'  => 'publish',
], true);

if ( is_wp_error( $result ) ) {
    WP_CLI::error( $result->get_error_message() );
}

WP_CLI::success( 'Consejo de Diosas publicado. Post ID: 14' );
WP_CLI::line( 'URL: ' . get_permalink( 14 ) );