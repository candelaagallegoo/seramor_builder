<?php
/**
 * Build Biblioteca privada Consejo de Diosas.
 *
 * Run:
 * c:\xampp\php\php.exe c:\xampp\htdocs\seramor\wp-cli.phar eval-file c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\scripts\build-consejo-privado.php --path="c:\xampp\htdocs\seramor"
 */

global $wpdb;

$LOGO_ID = 102;
$HERO_ID = 105;
$HEL_ID  = 110;

$LOGO = wp_get_attachment_url( $LOGO_ID );
$HERO = wp_get_attachment_url( $HERO_ID );
$HEL  = wp_get_attachment_url( $HEL_ID );

foreach ( compact( 'LOGO', 'HERO', 'HEL' ) as $key => $value ) {
    if ( empty( $value ) ) {
        WP_CLI::error( "Attachment '$key' no encontrado. Revisar IDs." );
    }
}

$consejo_level_id = (int) $wpdb->get_var(
    $wpdb->prepare(
        "SELECT id FROM {$wpdb->pmpro_membership_levels} WHERE name = %s LIMIT 1",
        'Consejo de Diosas'
    )
);

if ( $consejo_level_id < 1 ) {
    WP_CLI::error( 'No existe el nivel Consejo de Diosas en PMPro.' );
}

$account_page_id = (int) get_option( 'pmpro_account_page_id' );
$login_page_id   = (int) get_option( 'pmpro_login_page_id' );

$account_url = $account_page_id > 0 ? '__HOME__/?page_id=' . $account_page_id : '__HOME__/';
$login_url   = $login_page_id > 0 ? '__HOME__/?page_id=' . $login_page_id : '__HOME__/';
$channel_url = 'https://youtube.com/@seramorcircle?si=C1N0luqu3eZLD-IL';

$video_map = array(
  'empieza-por-aqui' => array(
    'youtube_id' => 'O3gCEwm1cNY',
    'title'      => 'Video de bienvenida del Consejo',
  ),
  'sanacion-y-reconexion' => array(
    'youtube_id' => 'LquA2nbz91A',
    'title'      => 'Clase privada de sanación y reconexión',
  ),
  'vida-libre' => array(
    'youtube_id' => 'zeIkjdHC2sQ',
    'title'      => 'Clase privada para crear una vida libre',
  ),
  'practicas-para-cuidarte' => array(
    'youtube_id' => 'lxanPmuHpgo',
    'title'      => 'Práctica guiada para cuidarte',
  ),
  'sabiduria-y-recursos' => array(
    'youtube_id' => '6p4GrWF1sGQ',
    'title'      => 'Biblioteca viva de sabiduría y recursos',
  ),
);

function seramor_upsert_page_by_slug( $slug, $title, $content, $parent_id = 0 ) {
  $existing = get_posts(
    array(
      'post_type'      => 'page',
      'post_status'    => array( 'publish', 'draft', 'private', 'pending', 'future' ),
      'name'           => $slug,
      'post_parent'    => $parent_id,
      'posts_per_page' => 1,
      'orderby'        => 'ID',
      'order'          => 'ASC',
    )
  );

  $existing = empty( $existing ) ? null : $existing[0];

    $payload = array(
        'post_title'   => $title,
        'post_name'    => $slug,
        'post_type'    => 'page',
        'post_status'  => 'publish',
        'post_parent'  => $parent_id,
        'post_content' => $content,
    );

    if ( $existing ) {
        $payload['ID'] = $existing->ID;
        $page_id = wp_update_post( $payload, true );
    } else {
        $page_id = wp_insert_post( $payload, true );
    }

    if ( is_wp_error( $page_id ) ) {
        WP_CLI::error( $page_id->get_error_message() );
    }

    return (int) $page_id;
}

function seramor_build_lesson_content( $title, $kicker, $summary, $focus_points, $account_url, $image_id, $image_url, $video = null, $channel_url = '' ) {
    $items = '';

  $title_attr = esc_attr( $title );
  $title_html = esc_html( $title );
  $kicker_html = esc_html( $kicker );
  $summary_html = esc_html( $summary );
  $account_url = esc_url( $account_url );
  $image_url = esc_url( $image_url );

    foreach ( $focus_points as $focus_point ) {
        $items .= '<li>' . esc_html( $focus_point ) . '</li>';
    }

  if ( ! empty( $video['youtube_id'] ) ) {
    $embed_url   = 'https://www.youtube-nocookie.com/embed/' . rawurlencode( $video['youtube_id'] ) . '?rel=0';
    $video_title = ! empty( $video['title'] ) ? $video['title'] : $title;
    $video_markup = '<div class="seramor-video-shell is-live"><div class="seramor-youtube-frame"><iframe src="' . esc_url( $embed_url ) . '" title="' . esc_attr( $video_title ) . '" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></div></div>';
    $video_copy   = esc_html( 'En este módulo encontrarás la clase principal para recorrerla con calma, volver a verla cuando lo necesites y acompañar tu proceso dentro del Consejo.' );
    $resource_copy = esc_html( 'En esta sección encontrarás materiales de apoyo, apuntes y recursos complementarios para integrar lo trabajado en la clase.' );
  } else {
    $video_markup = '<div class="seramor-video-shell"><div class="seramor-video-placeholder"><span>Este espacio reúne contenidos de apoyo y materiales de integración para acompañarte dentro del Consejo.</span></div></div>';
    $video_copy   = esc_html( 'Este espacio reúne contenidos de apoyo y materiales de integración para acompañarte más allá de una sola clase.' );
    $resource_copy = esc_html( 'Aquí se organizan los recursos, las referencias y la información útil para que tengas todo a mano dentro del Consejo.' );
  }

  $channel_cta = '';
  if ( ! empty( $channel_url ) ) {
    $channel_cta = '<p class="seramor-mini-note">Si lo prefieres, también puedes acceder a los videos desde el canal privado del Consejo en YouTube.</p>';
  }

    return <<<HTML
<!-- wp:html -->
<div class="seramor-shell seramor-lesson-shell">
  <section class="seramor-lesson-hero">
    <div class="seramor-lesson-hero-copy">
      <p class="seramor-kicker">$kicker_html</p>
      <h1 class="seramor-title">$title_html</h1>
      <p class="seramor-text">$summary_html</p>
    </div>
  </section>

  <section class="seramor-section seramor-soft">
    <div class="seramor-section-inner seramor-grid-2">
      <div>
        <p class="seramor-kicker">Video principal</p>
        <h2 class="seramor-title">Clase en video dentro del Consejo</h2>
        <p class="seramor-text" style="margin-top:22px">$video_copy</p>
        $video_markup
        $channel_cta
      </div>
      <div class="seramor-image-card"><img class="wp-image-$image_id" src="$image_url" alt="$title_attr"/></div>
    </div>
  </section>

  <section class="seramor-section">
    <div class="seramor-section-inner seramor-grid-2 is-reversed">
      <div>
        <p class="seramor-kicker">Enfoque de esta parte</p>
        <h2 class="seramor-title">Lo que vas a trabajar aquí</h2>
        <ul class="seramor-list">$items</ul>
      </div>
      <div class="seramor-login-panel">
        <h3>Recursos y notas</h3>
        <p>$resource_copy</p>
        <a class="seramor-btn" href="__HOME__/biblioteca-consejo/">Volver a la biblioteca</a>
      </div>
    </div>
  </section>
</div>
<!-- /wp:html -->
HTML;
}

$sections = array(
    'empieza-por-aqui' => array(
  'title'        => 'Empieza por aquí',
        'kicker'       => 'Tu puerta de entrada',
  'summary'      => 'Una guía para orientarte dentro del Consejo, entender el recorrido y elegir por dónde empezar según tu momento actual.',
        'focus_points' => array(
      'Cómo usar la biblioteca sin abrumarte.',
      'Qué recorrer primero según tu momento vital.',
      'Cómo combinar videos, prácticas y journaling.',
        ),
    ),
    'sanacion-y-reconexion' => array(
  'title'        => 'Sanación y reconexión femenina',
        'kicker'       => 'Volver a ti',
  'summary'      => 'Sesiones para sanar heridas, reconocer patrones y volver al cuerpo con más verdad y suavidad.',
        'focus_points' => array(
      'Niña interior, cuerpo e historia emocional.',
            'Creencias limitantes y formas de reescribirlas.',
    'Sexualidad, ciclo y reconexión con tu energía femenina.',
        ),
    ),
    'vida-libre' => array(
        'title'        => 'Crea una vida libre',
    'kicker'       => 'Expansión',
    'summary'      => 'Masterclasses y guías para pasar de la intuición a decisiones concretas que sostengan una vida más alineada contigo.',
        'focus_points' => array(
      'Deseo, dirección y claridad vital.',
            'Dinero, abundancia y trabajo con el merecimiento.',
    'Negocio online, visibilidad y estructura práctica.',
        ),
    ),
    'practicas-para-cuidarte' => array(
        'title'        => 'Para cuidarte',
    'kicker'       => 'Prácticas',
    'summary'      => 'Meditaciones, yoga cíclica y ejercicios sencillos para regularte y volver al presente en el día a día.',
        'focus_points' => array(
            'Meditaciones cortas para volver a tu centro.',
      'Prácticas corporales para sostenerte mejor.',
    'Rituales cotidianos para cuidar tu energía.',
        ),
    ),
    'sabiduria-y-recursos' => array(
    'title'        => 'Biblioteca de sabiduría y recursos prácticos',
    'kicker'       => 'Sabiduría',
    'summary'      => 'Libros, remedios, materiales y referencias para profundizar a tu ritmo y con autonomía.',
        'focus_points' => array(
            'Libros y referencias para ampliar mirada.',
            'Recursos de salud femenina y autocuidado.',
            'Materiales de apoyo para cada proceso.',
        ),
    ),
    'cuaderno-e-integracion' => array(
    'title'        => 'Cuaderno e integración',
      'kicker'       => 'Bajar a tierra',
    'summary'      => 'Plantillas, preguntas y espacios de integración para que el proceso no se quede solo en inspiración.',
        'focus_points' => array(
            'Journaling para sostener lo que emerge.',
      'Plantillas para ordenar ritmos y hábitos.',
        'Cierres e integraciones para cada etapa.',
        ),
    ),
    'encuentros-y-eventos' => array(
        'title'        => 'Encuentros y eventos',
        'kicker'       => 'Comunidad viva',
        'summary'      => 'Un espacio para reunir eventos especiales, directos, activaciones y novedades para la comunidad.',
        'focus_points' => array(
            'Eventos en vivo y encuentros especiales.',
            'Calendario y enlaces de acceso.',
            'Grabaciones y recordatorios para no perderte nada.',
        ),
    ),
);

$library_page_id = seramor_upsert_page_by_slug( 'biblioteca-consejo', 'Biblioteca Consejo de Diosas', '' );

$child_pages = array();

foreach ( $sections as $slug => $section ) {
    $child_pages[ $slug ] = array(
        'title' => $section['title'],
        'id'    => seramor_upsert_page_by_slug(
            $slug,
            $section['title'],
            seramor_build_lesson_content(
                $section['title'],
                $section['kicker'],
                $section['summary'],
                $section['focus_points'],
                $account_url,
                $HEL_ID,
                $HEL,
                isset( $video_map[ $slug ] ) ? $video_map[ $slug ] : null,
                $channel_url
            ),
            $library_page_id
        ),
    );
}

    $existing_children = get_children(
      array(
        'post_parent'    => $library_page_id,
        'post_type'      => 'page',
        'post_status'    => array( 'publish', 'draft', 'private', 'pending', 'future' ),
        'posts_per_page' => -1,
      )
    );

    $canonical_ids = wp_list_pluck( $child_pages, 'id' );

    foreach ( $existing_children as $existing_child ) {
      if ( in_array( (int) $existing_child->ID, $canonical_ids, true ) ) {
        continue;
      }

      if ( in_array( $existing_child->post_title, wp_list_pluck( $sections, 'title' ), true ) ) {
        wp_delete_post( $existing_child->ID, true );
      }
    }

$cards = '';

foreach ( $child_pages as $slug => $child_page ) {
    $section = $sections[ $slug ];
    $cards  .= '<a class="seramor-private-card" href="__HOME__/?page_id=' . $child_page['id'] . '">';
  $cards  .= '<span class="seramor-private-card-tag">Módulo privado</span>';
    $cards  .= '<h3>' . esc_html( $child_page['title'] ) . '</h3>';
    $cards  .= '<p>' . esc_html( $section['summary'] ) . '</p>';
    $cards  .= '<span class="seramor-private-card-link">Entrar al contenido</span>';
    $cards  .= '</a>';
}

$library_content = <<<HTML
<!-- wp:html -->
<div class="seramor-shell seramor-private-library">
  <style>
    .seramor-private-library .alignfull {
      margin-left: calc(50% - 50vw) !important;
      width: 100vw !important;
      max-width: 100vw !important;
    }
    .seramor-private-library {
      background: #853916;
      color: #f8ecdc;
      overflow: hidden;
    }
    .seramor-private-library .seramor-membership-hero {
      background: #853916;
      padding: 0 0 16px;
    }
    .seramor-private-library .seramor-private-hero {
      min-height: 0;
    }
    .seramor-private-library .seramor-membership-hero::after {
      display: none;
    }
    .seramor-private-library .seramor-membership-copy {
      max-width: 900px;
      padding: 16px 28px 10px;
      text-align: center;
    }
    .seramor-private-library .seramor-membership-copy .seramor-title {
      max-width: none;
      font-size: clamp(42px, 7vw, 64px);
      letter-spacing: 0.5px;
    }
    .seramor-private-library .seramor-membership-copy .seramor-text {
      max-width: 720px;
      margin: 18px auto 0;
      font-size: 21px;
      line-height: 1.45;
      color: #fffaf4;
    }
    .seramor-private-library .seramor-pill-row {
      justify-content: center;
      margin-top: 26px;
    }
  </style>
  <section class="seramor-membership-hero seramor-private-hero alignfull">
    <div class="seramor-membership-copy">
      <p class="seramor-kicker">Área privada</p>
      <h1 class="seramor-title">Biblioteca Consejo de Diosas</h1>
      <p class="seramor-text">Este es tu espacio privado dentro del Consejo de Diosas: un lugar para volver a las clases, las prácticas y los recursos que acompañan tu proceso, a tu ritmo y en tu propio tiempo.</p>
      <div class="seramor-pill-row">
        <span class="seramor-pill">Videos incrustados</span>
        <span class="seramor-pill">Prácticas y recursos</span>
        <span class="seramor-pill">Acceso solo para miembros</span>
      </div>
    </div>
  </section>

  <section class="seramor-section seramor-soft alignfull">
    <div class="seramor-section-inner seramor-grid-2 is-reversed">
      <div>
        <p class="seramor-kicker">Tu espacio dentro del Consejo</p>
        <h2 class="seramor-title">Un lugar pensado para acompañarte de verdad</h2>
        <p class="seramor-text" style="margin-top:22px">Aquí encontrarás reunidas las clases, las prácticas y los materiales del Consejo para que puedas volver a ellos cada vez que lo necesites.</p>
        <p class="seramor-text" style="margin-top:18px">Cada módulo abre una parte distinta del camino: sanar, reconectar contigo, cuidar tu energía y sostener una vida más alineada con lo que eres.</p>
      </div>
      <div class="seramor-image-card"><img class="wp-image-$HERO_ID" src="$HERO" alt="Biblioteca privada Consejo de Diosas"/></div>
    </div>
  </section>

  <section class="seramor-section alignfull">
    <div class="seramor-section-inner">
      <p class="seramor-kicker">Biblioteca</p>
      <h2 class="seramor-title">Tus espacios dentro del Consejo</h2>
      <p class="seramor-text" style="max-width:760px;margin:18px auto 0;text-align:center">Aquí tienes reunidos los distintos espacios del Consejo para acompañar tu proceso con profundidad: clases, prácticas, integración y recursos para volver a ti una y otra vez.</p>
      <div class="seramor-private-grid">$cards</div>
      <div class="seramor-cta-row" style="justify-content:center;margin-top:26px">
        <a class="seramor-btn is-secondary" href="$channel_url" target="_blank" rel="noopener">Ver videos del Consejo</a>
      </div>
    </div>
  </section>
</div>
<!-- /wp:html -->
HTML;

wp_update_post(
    array(
        'ID'           => $library_page_id,
        'post_title'   => 'Biblioteca Consejo de Diosas',
        'post_content' => $library_content,
        'post_status'  => 'publish',
        'post_parent'  => 0,
    )
);

update_post_meta( $library_page_id, 'site-sidebar-layout', 'no-sidebar' );
update_post_meta( $library_page_id, 'site-content-layout', 'page-builder' );
update_post_meta( $library_page_id, 'site-post-title', 'disabled' );
update_post_meta( $library_page_id, 'ast-breadcrumbs-content', 'disabled' );
update_post_meta( $library_page_id, 'ast-featured-img', 'disabled' );

$restricted_page_ids = array_merge( array( $library_page_id ), wp_list_pluck( $child_pages, 'id' ) );

foreach ( $restricted_page_ids as $restricted_page_id ) {
  update_post_meta( (int) $restricted_page_id, 'site-sidebar-layout', 'no-sidebar' );
    update_post_meta( (int) $restricted_page_id, 'site-content-layout', 'page-builder' );
  update_post_meta( (int) $restricted_page_id, 'site-post-title', 'disabled' );
  update_post_meta( (int) $restricted_page_id, 'ast-breadcrumbs-content', 'disabled' );
  update_post_meta( (int) $restricted_page_id, 'ast-featured-img', 'disabled' );
    pmpro_update_post_level_restrictions( (int) $restricted_page_id, array( $consejo_level_id ) );
}

WP_CLI::success( 'Biblioteca privada del Consejo creada y restringida.' );
WP_CLI::line( 'Pagina principal: ' . $library_page_id );
foreach ( $child_pages as $slug => $child_page ) {
    WP_CLI::line( $child_page['title'] . ': ' . $child_page['id'] );
}