<?php
/**
 * Build Contact page (ID 22) - Seramor.
 *
 * Run:
 * c:\xampp\php\php.exe c:\xampp\htdocs\seramor\wp-cli.phar eval-file c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\scripts\build-contact.php --path="c:\xampp\htdocs\seramor"
 */

$HERO_ID = 105;
$HEL_ID  = 110;

$HERO = wp_get_attachment_url( $HERO_ID );
$HEL  = wp_get_attachment_url( $HEL_ID );

foreach ( compact( 'HERO', 'HEL' ) as $key => $value ) {
    if ( empty( $value ) ) {
        WP_CLI::error( "Attachment '$key' no encontrado. Revisar IDs." );
    }
}

$WA_SVG  = '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="currentColor" d="M19.11 17.21c-.27-.14-1.6-.79-1.85-.88-.25-.09-.43-.14-.61.14-.18.27-.7.88-.86 1.06-.16.18-.32.2-.59.07-.27-.14-1.14-.42-2.17-1.34-.8-.71-1.34-1.6-1.5-1.87-.16-.27-.02-.42.12-.55.12-.12.27-.32.41-.48.14-.16.18-.27.27-.45.09-.18.05-.34-.02-.48-.07-.14-.61-1.47-.84-2.02-.22-.53-.45-.46-.61-.47l-.52-.01c-.18 0-.48.07-.73.34-.25.27-.95.93-.95 2.27 0 1.34.98 2.63 1.11 2.81.14.18 1.92 2.93 4.66 4.11.65.28 1.16.45 1.56.57.65.21 1.25.18 1.72.11.52-.08 1.6-.65 1.83-1.28.23-.63.23-1.17.16-1.28-.07-.11-.25-.18-.52-.32zM16.02 5.33c-5.89 0-10.67 4.78-10.67 10.67 0 1.88.49 3.71 1.43 5.33L5.33 26.67l5.49-1.44a10.61 10.61 0 0 0 5.2 1.32h.01c5.89 0 10.67-4.78 10.67-10.67 0-2.85-1.11-5.53-3.13-7.55a10.6 10.6 0 0 0-7.55-3zm0 19.34h-.01a8.66 8.66 0 0 1-4.41-1.21l-.32-.19-3.26.85.87-3.18-.21-.33a8.65 8.65 0 0 1-1.32-4.62c0-4.78 3.89-8.67 8.67-8.67 2.31 0 4.49.9 6.13 2.54a8.6 8.6 0 0 1 2.54 6.13c0 4.78-3.89 8.68-8.68 8.68z"/></svg>';
$MAIL_SVG = '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 8h22a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M4.5 9.5l11.5 8 11.5-8"/></svg>';
$IG_SVG   = '<svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><rect x="5" y="5" width="22" height="22" rx="6" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="16" cy="16" r="5" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="22.5" cy="9.5" r="1.4" fill="currentColor"/></svg>';

$content = <<<HTML
<!-- wp:html -->
<div class="seramor-contact-page">

  <section class="seramor-contact-hero alignfull">
    <div class="seramor-contact-hero-inner">
      <p class="seramor-contact-eyebrow">Conoce, visita y contacta</p>
      <h1 class="seramor-contact-headline">Estamos a un mensaje de distancia</h1>
      <p class="seramor-contact-lead">Escríbenos por el canal que prefieras. Te respondemos personalmente para acompañarte en el siguiente paso, ya sea el Programa, el Consejo de Diosas o una conversación más íntima.</p>
    </div>
  </section>

  <section class="seramor-contact-channels alignfull">
    <div class="seramor-contact-channels-inner">

      <article class="seramor-channel-card">
        <span class="seramor-channel-icon seramor-channel-icon-wa">$WA_SVG</span>
        <p class="seramor-channel-eyebrow">WhatsApp</p>
        <h3 class="seramor-channel-title">Conversemos al instante</h3>
        <p class="seramor-channel-text">La forma más rápida y cálida. Te leemos personalmente y te orientamos sin compromiso.</p>
        <a class="seramor-channel-cta seramor-channel-cta-wa" href="https://wa.me/34610210629?text=Hola%20Seramor%2C%20me%20gustar%C3%ADa%20saber%20m%C3%A1s." target="_blank" rel="noopener">Escribir por WhatsApp</a>
      </article>

      <article class="seramor-channel-card">
        <span class="seramor-channel-icon seramor-channel-icon-mail">$MAIL_SVG</span>
        <p class="seramor-channel-eyebrow">Correo</p>
        <h3 class="seramor-channel-title">Escríbenos un email</h3>
        <p class="seramor-channel-text">Para colaboraciones, prensa o consultas que merezcan algo más de espacio.</p>
        <a class="seramor-channel-cta" href="mailto:info@seramor-circle.com">info@seramor-circle.com</a>
      </article>

      <article class="seramor-channel-card">
        <span class="seramor-channel-icon seramor-channel-icon-ig">$IG_SVG</span>
        <p class="seramor-channel-eyebrow">Instagram</p>
        <h3 class="seramor-channel-title">Acompáñanos en el día a día</h3>
        <p class="seramor-channel-text">Inspiración, talleres y momentos del Círculo en nuestro perfil.</p>
        <a class="seramor-channel-cta" href="https://instagram.com/helena.seramor" target="_blank" rel="noopener">@helena.seramor</a>
      </article>

    </div>
  </section>

  <section class="seramor-contact-tips alignfull">
    <div class="seramor-contact-tips-inner">
      <div class="seramor-contact-tips-copy">
        <p class="seramor-contact-eyebrow">Antes de escribir</p>
        <h2 class="seramor-contact-subheadline">Cuanto más contexto nos des, mejor te acompañamos</h2>
        <ul class="seramor-contact-tips-list">
          <li>Qué espacio te interesa: mentoría 1:1, Programa o Consejo de Diosas.</li>
          <li>En qué momento estás ahora mismo.</li>
          <li>Qué cambio te gustaría sostener en los próximos meses.</li>
        </ul>
      </div>
      <div class="seramor-contact-tips-image"><img class="wp-image-$HEL_ID" src="$HEL" alt="Helena de Seramor"/></div>
    </div>
  </section>

</div>
<!-- /wp:html -->
HTML;

$result = wp_update_post(
    array(
        'ID'           => 22,
        'post_title'   => 'Conoce, visita y contacta',
        'post_name'    => 'contacta-con-nosotras',
        'post_content' => $content,
        'post_status'  => 'publish',
        'post_type'    => 'page',
    ),
    true
);

if ( is_wp_error( $result ) ) {
    WP_CLI::error( $result->get_error_message() );
}

// Ocultar titulo de pagina y breadcrumbs (Astra) para evitar duplicado del headline.
update_post_meta( 22, 'site-post-title', 'disabled' );
update_post_meta( 22, 'ast-breadcrumbs-content', 'disabled' );
update_post_meta( 22, 'ast-featured-img', 'disabled' );

WP_CLI::success( 'Pagina de contacto publicada. Post ID: 22' );
WP_CLI::line( 'URL: ' . get_permalink( 22 ) );