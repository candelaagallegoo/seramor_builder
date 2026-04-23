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
    'title'      => 'Clase privada de sanacion y reconexion',
  ),
  'vida-libre' => array(
    'youtube_id' => 'zeIkjdHC2sQ',
    'title'      => 'Clase privada para crear una vida libre',
  ),
  'practicas-para-cuidarte' => array(
    'youtube_id' => 'lxanPmuHpgo',
    'title'      => 'Practica guiada para cuidarte',
  ),
  'sabiduria-y-recursos' => array(
    'youtube_id' => '6p4GrWF1sGQ',
    'title'      => 'Biblioteca viva de sabiduria y recursos',
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
    $video_copy   = esc_html( 'Este modulo ya tiene su video incrustado desde YouTube para que puedas reproducirlo dentro del area privada sin salir del sitio.' );
    $resource_copy = esc_html( 'Debajo del video puedes sumar PDF, journaling, audios o notas privadas. El embed ya esta listo; solo queda complementar cada modulo con recursos descargables.' );
  } else {
    $video_markup = '<div class="seramor-video-shell"><div class="seramor-video-placeholder"><span>Este modulo se apoya en recursos vivos, notas y encuentros. Puedes seguir ampliandolo desde el canal privado de Seramor.</span></div></div>';
    $video_copy   = esc_html( 'Este espacio puede crecer con recursos, eventos y materiales de integracion aunque no dependa de un video central.' );
    $resource_copy = esc_html( 'Usalo para plantillas, enlaces, notas de clase o el calendario de encuentros del Consejo.' );
  }

  $channel_cta = '';
  if ( ! empty( $channel_url ) ) {
    $channel_cta = '<p class="seramor-mini-note">Canal base: <a href="' . esc_url( $channel_url ) . '" target="_blank" rel="noopener">abrir Seramor Circle en YouTube</a>.</p>';
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
        <h2 class="seramor-title">Lo que vas a trabajar aqui</h2>
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
    'title'        => 'Empieza por aqui',
        'kicker'       => 'Tu puerta de entrada',
    'summary'      => 'Una guia para orientarte dentro del Consejo, entender el recorrido y elegir por donde empezar segun tu momento actual.',
        'focus_points' => array(
            'Como usar la biblioteca sin abrumarte.',
            'Que recorrer primero segun tu momento vital.',
            'Como combinar videos, practicas y journaling.',
        ),
    ),
    'sanacion-y-reconexion' => array(
    'title'        => 'Sanacion y reconexion femenina',
        'kicker'       => 'Volver a ti',
    'summary'      => 'Sesiones para sanar heridas, reconocer patrones y volver al cuerpo con mas verdad y suavidad.',
        'focus_points' => array(
            'Nina interior, cuerpo e historia emocional.',
            'Creencias limitantes y formas de reescribirlas.',
      'Sexualidad, ciclo y reconexion con tu energia femenina.',
        ),
    ),
    'vida-libre' => array(
        'title'        => 'Crea una vida libre',
      'kicker'       => 'Expansion',
      'summary'      => 'Masterclasses y guias para pasar de la intuicion a decisiones concretas que sostengan una vida mas alineada contigo.',
        'focus_points' => array(
            'Deseo, direccion y claridad vital.',
            'Dinero, abundancia y trabajo con el merecimiento.',
        'Negocio online, visibilidad y estructura practica.',
        ),
    ),
    'practicas-para-cuidarte' => array(
        'title'        => 'Para cuidarte',
      'kicker'       => 'Practicas',
      'summary'      => 'Meditaciones, yoga ciclica y ejercicios sencillos para regularte y volver al presente en el dia a dia.',
        'focus_points' => array(
            'Meditaciones cortas para volver a tu centro.',
            'Practicas corporales para sostenerte mejor.',
        'Rituales cotidianos para cuidar tu energia.',
        ),
    ),
    'sabiduria-y-recursos' => array(
      'title'        => 'Biblioteca de sabiduria y recursos practicos',
      'kicker'       => 'Sabiduria',
      'summary'      => 'Libros, remedios, materiales y referencias para profundizar a tu ritmo y con autonomia.',
        'focus_points' => array(
            'Libros y referencias para ampliar mirada.',
            'Recursos de salud femenina y autocuidado.',
            'Materiales de apoyo para cada proceso.',
        ),
    ),
    'cuaderno-e-integracion' => array(
      'title'        => 'Cuaderno e integracion',
      'kicker'       => 'Bajar a tierra',
      'summary'      => 'Plantillas, preguntas y espacios de integracion para que el proceso no se quede solo en inspiracion.',
        'focus_points' => array(
            'Journaling para sostener lo que emerge.',
            'Plantillas para ordenar ritmos y habitos.',
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
    $cards  .= '<span class="seramor-private-card-tag">Modulo privado</span>';
    $cards  .= '<h3>' . esc_html( $child_page['title'] ) . '</h3>';
    $cards  .= '<p>' . esc_html( $section['summary'] ) . '</p>';
    $cards  .= '<span class="seramor-private-card-link">Entrar al contenido</span>';
    $cards  .= '</a>';
}

$library_content = <<<HTML
<!-- wp:html -->
<div class="seramor-shell seramor-private-library">
  <section class="seramor-membership-hero seramor-private-hero">
    <div class="seramor-membership-copy">
      <p class="seramor-kicker">Area privada</p>
      <h1 class="seramor-title">Biblioteca Consejo de Diosas</h1>
      <p class="seramor-text">Aqui esta la version privada del Consejo: una biblioteca viva con clases, practicas, recursos y espacios de integracion para recorrer a tu ritmo.</p>
      <div class="seramor-pill-row">
        <span class="seramor-pill">Videos incrustados</span>
        <span class="seramor-pill">Thumbnails propios</span>
        <span class="seramor-pill">Acceso solo miembros</span>
      </div>
    </div>
  </section>

  <section class="seramor-section seramor-soft">
    <div class="seramor-section-inner seramor-grid-2 is-reversed">
      <div>
        <p class="seramor-kicker">Como funciona</p>
        <h2 class="seramor-title">Una publica para vender y una privada para consumir</h2>
        <p class="seramor-text" style="margin-top:22px">La pagina publica presenta el Consejo, muestra contenido borroso y lleva al checkout o al login. Esta pagina privada es la biblioteca real: aqui cada modulo puede llevar su thumbnail, su embed de YouTube y sus recursos descargables.</p>
        <p class="seramor-text" style="margin-top:18px">Para cada leccion, lo mas limpio es: thumbnail en WordPress para la tarjeta + video oculto en YouTube incrustado dentro de la pagina del modulo.</p>
      </div>
      <div class="seramor-image-card"><img class="wp-image-$HERO_ID" src="$HERO" alt="Biblioteca privada Consejo de Diosas"/></div>
    </div>
  </section>

  <section class="seramor-section">
    <div class="seramor-section-inner">
      <p class="seramor-kicker">Biblioteca</p>
      <h2 class="seramor-title">Tus espacios dentro del Consejo</h2>
      <p class="seramor-text" style="max-width:760px;margin:18px auto 0;text-align:center">Las clases principales ya quedan incrustadas dentro de los modulos privados. Los espacios de integracion y encuentros siguen creciendo contigo dentro de la membresia.</p>
      <div class="seramor-private-grid">$cards</div>
      <div class="seramor-cta-row" style="justify-content:center;margin-top:26px">
        <a class="seramor-btn is-secondary" href="$channel_url" target="_blank" rel="noopener">Abrir canal base en YouTube</a>
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

$restricted_page_ids = array_merge( array( $library_page_id ), wp_list_pluck( $child_pages, 'id' ) );

foreach ( $restricted_page_ids as $restricted_page_id ) {
    pmpro_update_post_level_restrictions( (int) $restricted_page_id, array( $consejo_level_id ) );
}

WP_CLI::success( 'Biblioteca privada del Consejo creada y restringida.' );
WP_CLI::line( 'Pagina principal: ' . $library_page_id );
foreach ( $child_pages as $slug => $child_page ) {
    WP_CLI::line( $child_page['title'] . ': ' . $child_page['id'] );
}