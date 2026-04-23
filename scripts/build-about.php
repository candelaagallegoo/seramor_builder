<?php
/**
 * Build Sobre Seramor page (ID 20) - Seramor.
 *
 * Run:
 * c:\xampp\php\php.exe c:\xampp\htdocs\seramor\wp-cli.phar eval-file c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\scripts\build-about.php --path="c:\xampp\htdocs\seramor"
 */

$HERO_ID = 105;
$HEL_ID  = 110;

global $wpdb;

$HERO = set_url_scheme( wp_get_attachment_url( $HERO_ID ), 'https' );
$HEL  = set_url_scheme( wp_get_attachment_url( $HEL_ID ), 'https' );

foreach ( compact( 'HERO', 'HEL' ) as $key => $value ) {
    if ( empty( $value ) ) {
        WP_CLI::error( "Attachment '$key' no encontrado. Revisar IDs." );
    }
}

$program_url = '__HOME__/programa-de-3-meses/';
$consejo_url = '__HOME__/plataforma-de-contenido-por-suscripcion/';

$content = <<<HTML
<!-- wp:html -->
<div class="seramor-about-page">
  <style>
    .seramor-about-page {
      --seramor-cream: #F5EFE6;
      --seramor-beige: #E9DDCC;
      --seramor-text: #6B4E3D;
      --seramor-text-deep: #4E382D;
      --seramor-camel: #B6906A;
      --seramor-white: #fffdf9;
      color: var(--seramor-text);
      background: var(--seramor-cream);
    }
    .seramor-about-page .alignfull {
      margin-left: calc(50% - 50vw) !important;
      width: 100vw !important;
      max-width: 100vw !important;
    }
    .seramor-about-page * {
      box-sizing: border-box;
    }
    .seramor-about-page .seramor-about-wrap {
      width: min(1180px, 88vw);
      margin: 0 auto;
    }
    .seramor-about-page .seramor-about-kicker {
      margin: 0 0 18px;
      font-family: var(--font-heading, serif);
      font-size: 11px;
      letter-spacing: 3.4px;
      text-transform: uppercase;
      color: var(--seramor-camel);
    }
    .seramor-about-page .seramor-about-title {
      margin: 0;
      font-family: var(--font-body, serif);
      font-size: clamp(2.6rem, 6vw, 5.3rem);
      line-height: 0.94;
      font-weight: 500;
      color: var(--seramor-text-deep);
      letter-spacing: -0.04em;
      text-wrap: balance;
    }
    .seramor-about-page .seramor-about-subtitle,
    .seramor-about-page .seramor-about-copy,
    .seramor-about-page .seramor-about-card p,
    .seramor-about-page .seramor-about-cta-copy,
    .seramor-about-page .seramor-about-origin-text,
    .seramor-about-page .seramor-about-essence-note {
      font-family: var(--font-body, serif);
      font-size: 18px;
      line-height: 1.85;
      color: var(--seramor-text);
    }
    .seramor-about-page .seramor-about-hero {
      position: relative;
      overflow: hidden;
      padding: 148px 0 112px;
      background:
        linear-gradient(120deg, rgba(245, 239, 230, 0.96) 18%, rgba(245, 239, 230, 0.74) 52%, rgba(233, 221, 204, 0.34) 100%),
        url('$HERO') center 18%/cover no-repeat;
    }
    .seramor-about-page .seramor-about-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(circle at top left, rgba(182, 144, 106, 0.18), transparent 42%),
        radial-gradient(circle at bottom right, rgba(107, 78, 61, 0.12), transparent 36%);
      pointer-events: none;
    }
    .seramor-about-page .seramor-about-hero-grid {
      position: relative;
      z-index: 1;
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(240px, 0.62fr);
      gap: 56px;
      align-items: center;
    }
    .seramor-about-page .seramor-about-subtitle {
      max-width: 720px;
      margin: 28px 0 0;
      font-size: clamp(1.08rem, 2vw, 1.35rem);
      line-height: 1.7;
    }
    .seramor-about-page .seramor-about-hero-markers {
      display: grid;
      gap: 14px;
      justify-items: start;
    }
    .seramor-about-page .seramor-about-hero-marker {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      padding: 16px 22px;
      border-radius: 999px;
      background: rgba(255, 253, 249, 0.8);
      border: 1px solid rgba(78, 56, 45, 0.1);
      box-shadow: 0 18px 40px rgba(78, 56, 45, 0.06);
      font-family: var(--font-heading, serif);
      font-size: 15px;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      color: var(--seramor-text-deep);
    }
    .seramor-about-page .seramor-about-hero-marker::before {
      content: '';
      width: 9px;
      height: 9px;
      border-radius: 50%;
      background: var(--seramor-camel);
    }
    .seramor-about-page .seramor-about-section {
      padding: 108px 0;
    }
    .seramor-about-page .seramor-about-section.is-beige {
      background: linear-gradient(180deg, rgba(233, 221, 204, 0.5), rgba(245, 239, 230, 0.96));
    }
    .seramor-about-page .seramor-about-section.is-white {
      background: linear-gradient(180deg, rgba(255, 253, 249, 0.94), rgba(245, 239, 230, 0.88));
    }
    .seramor-about-page .seramor-about-heading {
      margin: 0 0 22px;
      font-family: var(--font-heading, serif);
      font-size: clamp(1.7rem, 3vw, 2.7rem);
      line-height: 1.05;
      letter-spacing: 0.01em;
      color: var(--seramor-text-deep);
      text-wrap: balance;
    }
    .seramor-about-page .seramor-about-copy {
      max-width: 760px;
      margin: 0;
    }
    .seramor-about-page .seramor-about-copy + .seramor-about-copy {
      margin-top: 18px;
    }
    .seramor-about-page .seramor-about-origin {
      display: grid;
      grid-template-columns: minmax(0, 0.9fr) minmax(320px, 1fr);
      gap: 54px;
      align-items: center;
    }
    .seramor-about-page .seramor-about-image-frame {
      position: relative;
      padding: 20px;
      border-radius: 32px;
      background: linear-gradient(180deg, rgba(255, 253, 249, 0.92), rgba(233, 221, 204, 0.7));
      box-shadow: 0 28px 70px rgba(78, 56, 45, 0.12);
    }
    .seramor-about-page .seramor-about-image-frame::after {
      content: '';
      position: absolute;
      inset: auto 18px 18px auto;
      width: 110px;
      height: 110px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(182, 144, 106, 0.28), rgba(182, 144, 106, 0));
      pointer-events: none;
    }
    .seramor-about-page .seramor-about-image-frame img {
      display: block;
      width: 100%;
      aspect-ratio: 0.88;
      object-fit: cover;
      border-radius: 24px;
    }
    .seramor-about-page .seramor-about-origin-text {
      margin: 0;
    }
    .seramor-about-page .seramor-about-intro-line {
      margin: 0 0 16px;
      font-family: var(--font-heading, serif);
      font-size: 13px;
      letter-spacing: 2.8px;
      text-transform: uppercase;
      color: var(--seramor-camel);
    }
    .seramor-about-page .seramor-about-card-grid {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 20px;
      margin-top: 34px;
    }
    .seramor-about-page .seramor-about-card {
      min-height: 250px;
      padding: 30px 26px;
      border: 1px solid rgba(78, 56, 45, 0.1);
      border-radius: 28px;
      background: rgba(255, 253, 249, 0.78);
      box-shadow: 0 18px 40px rgba(78, 56, 45, 0.06);
    }
    .seramor-about-page .seramor-about-card-index {
      display: inline-flex;
      width: 38px;
      height: 38px;
      align-items: center;
      justify-content: center;
      border-radius: 999px;
      background: rgba(182, 144, 106, 0.18);
      font-family: var(--font-heading, serif);
      font-size: 14px;
      color: var(--seramor-text-deep);
      margin-bottom: 20px;
    }
    .seramor-about-page .seramor-about-card h3 {
      margin: 0 0 12px;
      font-family: var(--font-heading, serif);
      font-size: 26px;
      line-height: 1.08;
      color: var(--seramor-text-deep);
    }
    .seramor-about-page .seramor-about-card p {
      margin: 0;
      font-size: 16px;
      line-height: 1.8;
    }
    .seramor-about-page .seramor-about-card strong {
      display: block;
      margin-bottom: 10px;
      font-family: var(--font-heading, serif);
      font-size: 12px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--seramor-camel);
    }
    .seramor-about-page .seramor-about-essence {
      display: grid;
      grid-template-columns: minmax(0, 0.92fr) minmax(320px, 0.88fr);
      gap: 48px;
      align-items: start;
    }
    .seramor-about-page .seramor-about-essence-list {
      display: grid;
      gap: 14px;
      margin: 32px 0 0;
      padding: 0;
      list-style: none;
    }
    .seramor-about-page .seramor-about-essence-item {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 18px 22px;
      border-radius: 999px;
      background: rgba(255, 253, 249, 0.82);
      border: 1px solid rgba(78, 56, 45, 0.1);
      box-shadow: 0 14px 34px rgba(78, 56, 45, 0.05);
      font-family: var(--font-heading, serif);
      font-size: 22px;
      color: var(--seramor-text-deep);
    }
    .seramor-about-page .seramor-about-essence-item::before {
      content: '';
      width: 12px;
      height: 12px;
      flex: 0 0 12px;
      border-radius: 50%;
      background: var(--seramor-camel);
      box-shadow: 0 0 0 8px rgba(182, 144, 106, 0.14);
    }
    .seramor-about-page .seramor-about-essence-note {
      margin: 0;
      padding: 34px 34px 32px;
      border-radius: 30px;
      background: linear-gradient(180deg, rgba(233, 221, 204, 0.9), rgba(255, 253, 249, 0.82));
      box-shadow: 0 24px 60px rgba(78, 56, 45, 0.09);
    }
    .seramor-about-page .seramor-about-cta {
      padding: 108px 0 122px;
      background:
        radial-gradient(circle at top, rgba(182, 144, 106, 0.22), transparent 38%),
        linear-gradient(180deg, rgba(245, 239, 230, 0.98), rgba(233, 221, 204, 0.92));
    }
    .seramor-about-page .seramor-about-cta-box {
      padding: 52px min(5vw, 52px);
      border-radius: 34px;
      background: rgba(255, 253, 249, 0.82);
      border: 1px solid rgba(78, 56, 45, 0.1);
      box-shadow: 0 30px 70px rgba(78, 56, 45, 0.08);
      text-align: center;
    }
    .seramor-about-page .seramor-about-cta-title {
      margin: 0;
      font-family: var(--font-heading, serif);
      font-size: clamp(2rem, 3.6vw, 3.4rem);
      line-height: 1.05;
      color: var(--seramor-text-deep);
      text-wrap: balance;
    }
    .seramor-about-page .seramor-about-cta-copy {
      max-width: 760px;
      margin: 22px auto 0;
      font-size: 18px;
    }
    .seramor-about-page .seramor-about-cta-actions {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 16px;
      margin-top: 32px;
    }
    .seramor-about-page .seramor-about-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 230px;
      padding: 17px 30px;
      border-radius: 999px;
      text-decoration: none;
      font-family: var(--font-heading, serif);
      font-size: 13px;
      letter-spacing: 2.4px;
      text-transform: uppercase;
      transition: transform 0.24s ease, box-shadow 0.24s ease, background-color 0.24s ease;
    }
    .seramor-about-page .seramor-about-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 18px 36px rgba(78, 56, 45, 0.12);
    }
    .seramor-about-page .seramor-about-btn.is-primary {
      background: var(--seramor-text-deep);
      color: var(--seramor-white);
      border: 1px solid var(--seramor-text-deep);
    }
    .seramor-about-page .seramor-about-btn.is-secondary {
      background: transparent;
      color: var(--seramor-text-deep);
      border: 1px solid rgba(78, 56, 45, 0.28);
    }
    @media (max-width: 1080px) {
      .seramor-about-page .seramor-about-card-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
      .seramor-about-page .seramor-about-origin,
      .seramor-about-page .seramor-about-essence,
      .seramor-about-page .seramor-about-hero-grid {
        grid-template-columns: 1fr;
      }
    }
    @media (max-width: 720px) {
      .seramor-about-page .seramor-about-hero {
        padding: 118px 0 88px;
        background-position: center;
      }
      .seramor-about-page .seramor-about-section,
      .seramor-about-page .seramor-about-cta {
        padding: 82px 0;
      }
      .seramor-about-page .seramor-about-card-grid {
        grid-template-columns: 1fr;
      }
      .seramor-about-page .seramor-about-essence-item {
        border-radius: 28px;
        align-items: flex-start;
        font-size: 20px;
        line-height: 1.2;
      }
      .seramor-about-page .seramor-about-subtitle,
      .seramor-about-page .seramor-about-copy,
      .seramor-about-page .seramor-about-card p,
      .seramor-about-page .seramor-about-cta-copy,
      .seramor-about-page .seramor-about-origin-text,
      .seramor-about-page .seramor-about-essence-note {
        font-size: 17px;
        line-height: 1.78;
      }
      .seramor-about-page .seramor-about-btn {
        width: 100%;
      }
    }
  </style>

  <section class="seramor-about-hero alignfull">
    <div class="seramor-about-wrap seramor-about-hero-grid">
      <div>
        <p class="seramor-about-kicker">Sobre Seramor</p>
        <h1 class="seramor-about-title">SOBRE SERAMOR</h1>
        <p class="seramor-about-subtitle">Un espacio creado para acompañar a mujeres en su proceso de sanación, reconexión y transformación.</p>
      </div>
      <div class="seramor-about-hero-markers" aria-label="Ejes de Seramor">
        <div class="seramor-about-hero-marker">sanación</div>
        <div class="seramor-about-hero-marker">reconexión</div>
        <div class="seramor-about-hero-marker">transformación</div>
      </div>
    </div>
  </section>

  <section class="seramor-about-section alignfull">
    <div class="seramor-about-wrap">
      <p class="seramor-about-kicker">Esencia</p>
      <h2 class="seramor-about-heading">¿QUÉ ES SERAMOR?</h2>
      <p class="seramor-about-copy">Seramor es un espacio de transformación femenina nacido de una necesidad profunda: crear un lugar donde las mujeres puedan volver a sí mismas, sanar su historia y empezar a construir una vida más libre, consciente y alineada.</p>
      <p class="seramor-about-copy">A través de acompañamiento, contenido, práctica y comunidad, Seramor busca sostener procesos reales de cambio interior, expansión personal y reconexión con la propia verdad.</p>
    </div>
  </section>

  <section class="seramor-about-section is-beige alignfull">
    <div class="seramor-about-wrap seramor-about-origin">
      <div class="seramor-about-image-frame">
        <img class="wp-image-$HEL_ID" src="$HEL" alt="Helena, fundadora de Seramor" />
      </div>
      <div>
        <p class="seramor-about-kicker">Origen</p>
        <h2 class="seramor-about-heading">CÓMO NACE SERAMOR</h2>
        <p class="seramor-about-origin-text">Seramor nace de la experiencia real de querer crear un espacio seguro, bello y profundo para mujeres que están atravesando procesos de cambio, despertar o búsqueda interior.</p>
        <p class="seramor-about-origin-text seramor-about-copy">La intención de este proyecto es reunir herramientas, acompañamiento y espacios que ayuden a cada mujer a volver a sí, soltar lo que la limita y acercarse a una vida más auténtica.</p>
      </div>
    </div>
  </section>

  <section class="seramor-about-section is-white alignfull">
    <div class="seramor-about-wrap">
      <p class="seramor-about-kicker">Recorridos</p>
      <h2 class="seramor-about-heading">LO QUE ENCONTRARÁS EN SERAMOR</h2>
      <p class="seramor-about-copy">Seramor reúne distintas puertas de entrada para acompañar a cada mujer según el momento en el que se encuentre.</p>

      <div class="seramor-about-card-grid">
        <article class="seramor-about-card">
          <span class="seramor-about-card-index">01</span>
          <h3>Programa de 3 meses</h3>
          <p><strong>Proceso profundo guiado</strong></p>
        </article>
        <article class="seramor-about-card">
          <span class="seramor-about-card-index">02</span>
          <h3>Consejo de Diosas</h3>
          <p><strong>Biblioteca de transformación a tu ritmo</strong></p>
        </article>
        <article class="seramor-about-card">
          <span class="seramor-about-card-index">03</span>
          <h3>Prácticas y recursos</h3>
          <p><strong>Herramientas para cuerpo y mente</strong></p>
        </article>
        <article class="seramor-about-card">
          <span class="seramor-about-card-index">04</span>
          <h3>Comunidad</h3>
          <p><strong>Sostén y conexión</strong></p>
        </article>
      </div>
    </div>
  </section>

  <section class="seramor-about-section alignfull">
    <div class="seramor-about-wrap seramor-about-essence">
      <div>
        <p class="seramor-about-kicker">Centro</p>
        <h2 class="seramor-about-heading">LA ESENCIA DE SERAMOR</h2>
        <ul class="seramor-about-essence-list">
          <li class="seramor-about-essence-item">volver a ti</li>
          <li class="seramor-about-essence-item">sanar tu historia</li>
          <li class="seramor-about-essence-item">reconectar con tu cuerpo</li>
          <li class="seramor-about-essence-item">vivir con más verdad</li>
          <li class="seramor-about-essence-item">crear una vida más libre</li>
        </ul>
      </div>
      <div>
        <p class="seramor-about-essence-note">Seramor no busca solo inspirar, sino sostener cambios reales en la forma de vivir, sentir y elegir.</p>
      </div>
    </div>
  </section>

  <section class="seramor-about-cta alignfull">
    <div class="seramor-about-wrap">
      <div class="seramor-about-cta-box">
        <p class="seramor-about-kicker">Siguiente paso</p>
        <h2 class="seramor-about-cta-title">Explora el espacio que mejor encaje contigo</h2>
        <p class="seramor-about-cta-copy">Tanto si buscas un proceso profundo como si prefieres empezar a tu ritmo, dentro de Seramor encontrarás una forma de avanzar hacia la vida que deseas.</p>
        <div class="seramor-about-cta-actions">
          <a class="seramor-about-btn is-primary" href="$program_url">Ver el programa de 3 meses</a>
          <a class="seramor-about-btn is-secondary" href="$consejo_url">Descubrir Consejo de Diosas</a>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- /wp:html -->
HTML;

$validated_content = $wpdb->strip_invalid_text_for_column( $wpdb->posts, 'post_content', $content );

if ( is_wp_error( $validated_content ) ) {
    $message = $validated_content->get_error_message();
    $data    = $validated_content->get_error_data();

    if ( is_array( $data ) && isset( $data['value'] ) ) {
        $message .= ' | Invalid fragment: ' . substr( (string) $data['value'], 0, 220 );
    }

    WP_CLI::error( $message );
}

$result = wp_update_post(
    array(
        'ID'           => 20,
        'post_title'   => 'Sobre Seramor',
        'post_name'    => 'sobre-seramor',
        'post_content' => $validated_content,
        'post_status'  => 'publish',
        'post_type'    => 'page',
    ),
    true
);

if ( is_wp_error( $result ) ) {
    $db_error = trim( (string) $wpdb->last_error );
    $message  = $result->get_error_message();

    if ( '' !== $db_error ) {
        $message .= ' | DB: ' . $db_error;
    }

    WP_CLI::error( $message );
}

update_post_meta( 20, 'site-post-title', 'disabled' );
update_post_meta( 20, 'ast-breadcrumbs-content', 'disabled' );
update_post_meta( 20, 'ast-featured-img', 'disabled' );

WP_CLI::success( 'Pagina Sobre Seramor publicada. Post ID: 20' );
WP_CLI::line( 'URL: ' . get_permalink( 20 ) );