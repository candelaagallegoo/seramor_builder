<?php
/**
 * Build Legal page (ID 3 - Politica de privacidad) - Seramor.
 *
 * Pagina sobria de lectura: eyebrow + titulo moderado + indice + secciones compactas.
 * Incluye Privacidad, Aviso legal, Cookies y Terminos en una sola pagina.
 *
 * Run:
 * c:\xampp\php\php.exe c:\xampp\htdocs\seramor\wp-cli.phar eval-file c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\scripts\build-legal.php --path="c:\xampp\htdocs\seramor"
 */

$POST_ID     = 3;
$SITE_NAME   = 'Seramor';
$SITE_URL    = home_url( '/' );
$CONTACT_MAIL = 'info@seramor-circle.com';
$UPDATED     = date_i18n( 'j \d\e F \d\e Y' );

$content = <<<HTML
<!-- wp:html -->
<div class="seramor-legal-page">

  <section class="seramor-legal-header alignfull">
    <div class="seramor-legal-header-inner">
      <p class="seramor-legal-eyebrow">Informaci&oacute;n legal</p>
      <h1 class="seramor-legal-title">Pol&iacute;tica de privacidad, aviso legal, cookies y t&eacute;rminos</h1>
      <p class="seramor-legal-meta">&Uacute;ltima actualizaci&oacute;n: $UPDATED</p>
    </div>
  </section>

  <article class="seramor-legal-body">

    <p class="seramor-legal-intro">En $SITE_NAME cuidamos tus datos con la misma intenci&oacute;n con la que sostenemos nuestros c&iacute;rculos. Este documento re&uacute;ne, de forma clara y concisa, c&oacute;mo tratamos tu informaci&oacute;n, qui&eacute;n es responsable del sitio, qu&eacute; cookies utilizamos y bajo qu&eacute; condiciones ofrecemos nuestros servicios.</p>

    <nav class="seramor-legal-toc" aria-label="&Iacute;ndice">
      <p class="seramor-legal-toc-title">Contenido</p>
      <ol>
        <li><a href="#responsable">Responsable del sitio</a></li>
        <li><a href="#privacidad">Pol&iacute;tica de privacidad</a></li>
        <li><a href="#cookies">Pol&iacute;tica de cookies</a></li>
        <li><a href="#terminos">T&eacute;rminos y condiciones</a></li>
        <li><a href="#derechos">Tus derechos</a></li>
        <li><a href="#contacto">Contacto</a></li>
      </ol>
    </nav>

    <h2 id="responsable">1. Responsable del sitio</h2>
    <p>El presente sitio web ($SITE_URL) es operado por <strong>Seramor &mdash; C&iacute;rculo de Mujeres Online</strong>, proyecto dirigido por Helena Seramor. Para cualquier consulta relacionada con este aviso puedes escribir a <a href="mailto:$CONTACT_MAIL">$CONTACT_MAIL</a>.</p>
    <p>Al navegar por este sitio aceptas las condiciones descritas a continuaci&oacute;n. Si no est&aacute;s de acuerdo con alguna de ellas, te pedimos que no utilices el sitio.</p>

    <h2 id="privacidad">2. Pol&iacute;tica de privacidad</h2>

    <h3>Qu&eacute; datos recogemos</h3>
    <p>Solo tratamos los datos que t&uacute; nos facilitas voluntariamente al rellenar formularios, contratar un servicio o contactarnos por email o WhatsApp. T&iacute;picamente: nombre, correo electr&oacute;nico, tel&eacute;fono y el mensaje que quieras compartir.</p>

    <h3>Con qu&eacute; finalidad</h3>
    <ul>
      <li>Responder a tus consultas y acompa&ntilde;arte en el proceso.</li>
      <li>Gestionar tu inscripci&oacute;n al Programa o al Consejo de Diosas.</li>
      <li>Enviarte informaci&oacute;n que hayas solicitado expresamente.</li>
      <li>Cumplir con las obligaciones legales y contables derivadas del servicio.</li>
    </ul>

    <h3>Base legal</h3>
    <p>Tratamos tus datos con base en tu consentimiento, en la ejecuci&oacute;n del servicio contratado y, cuando corresponde, para cumplir obligaciones legales aplicables.</p>

    <h3>Conservaci&oacute;n y cesi&oacute;n</h3>
    <p>Conservamos tus datos mientras dure la relaci&oacute;n y durante los plazos legales posteriores. No los vendemos ni los cedemos a terceros con fines comerciales. Nuestros proveedores tecnol&oacute;gicos (hosting, pasarela de pago, email) act&uacute;an como encargados de tratamiento bajo contrato y con garant&iacute;as equivalentes.</p>

    <h2 id="cookies">3. Pol&iacute;tica de cookies</h2>
    <p>Usamos cookies t&eacute;cnicas necesarias para el funcionamiento del sitio (sesi&oacute;n, seguridad, preferencias). Tambi&eacute;n podemos usar cookies anal&iacute;ticas agregadas y, si t&uacute; lo aceptas expresamente, cookies de terceros como <a href="https://stripe.com/cookies-policy/legal" target="_blank" rel="noopener">Stripe</a> para procesar pagos.</p>
    <p>Puedes gestionar tus preferencias desde el banner de cookies o desde la configuraci&oacute;n de tu navegador. Bloquear determinadas cookies puede afectar a partes del sitio como el checkout o el &aacute;rea de miembros.</p>

    <h2 id="terminos">4. T&eacute;rminos y condiciones</h2>

    <h3>Servicios ofrecidos</h3>
    <p>Seramor ofrece acompa&ntilde;amiento grupal e individual, formaciones y contenidos digitales. La descripci&oacute;n, duraci&oacute;n y precio de cada servicio se indican en su p&aacute;gina correspondiente antes de la contrataci&oacute;n.</p>

    <h3>Pagos</h3>
    <p>Los pagos se procesan a trav&eacute;s de <a href="https://stripe.com" target="_blank" rel="noopener">Stripe</a> en un entorno cifrado. No almacenamos los datos completos de tu tarjeta en nuestros servidores.</p>

    <h3>Cancelaciones y reembolsos</h3>
    <p>Puedes cancelar una suscripci&oacute;n en cualquier momento desde tu &aacute;rea privada; la baja surte efecto al final del per&iacute;odo ya abonado. Para cursos y encuentros puntuales, el plazo y las condiciones de reembolso se detallan en la ficha del servicio.</p>

    <h3>Propiedad intelectual</h3>
    <p>Los textos, marcas, materiales audiovisuales y metodolog&iacute;as publicadas en este sitio son propiedad de Seramor o de sus autoras. Queda prohibida su reproducci&oacute;n total o parcial sin autorizaci&oacute;n previa.</p>

    <h3>Responsabilidad</h3>
    <p>Nuestros contenidos tienen fines formativos y de acompa&ntilde;amiento personal. No sustituyen atenci&oacute;n m&eacute;dica, psicol&oacute;gica ni jur&iacute;dica profesional.</p>

    <h2 id="derechos">5. Tus derechos</h2>
    <p>Puedes ejercer en cualquier momento tus derechos de acceso, rectificaci&oacute;n, supresi&oacute;n, oposici&oacute;n, limitaci&oacute;n y portabilidad, as&iacute; como retirar el consentimiento otorgado. Para hacerlo, escr&iacute;benos a <a href="mailto:$CONTACT_MAIL">$CONTACT_MAIL</a> indicando tu solicitud. Tambi&eacute;n puedes presentar una reclamaci&oacute;n ante la autoridad de control competente si consideras que no hemos atendido tu petici&oacute;n correctamente.</p>

    <h2 id="contacto">6. Contacto</h2>
    <div class="seramor-legal-contact">
      <p>Si tienes dudas sobre este aviso, escr&iacute;benos a <a href="mailto:$CONTACT_MAIL">$CONTACT_MAIL</a>. Estamos para ayudarte.</p>
    </div>

  </article>

</div>
<!-- /wp:html -->
HTML;

$result = wp_update_post(
    array(
        'ID'           => $POST_ID,
        'post_title'   => 'Información legal',
        'post_name'    => 'politica-privacidad',
        'post_content' => $content,
        'post_status'  => 'publish',
        'post_type'    => 'page',
    ),
    true
);

if ( is_wp_error( $result ) ) {
    WP_CLI::error( $result->get_error_message() );
}

// Ocultar titulo nativo y breadcrumbs del tema para que el header interno no se duplique.
update_post_meta( $POST_ID, 'site-post-title', 'disabled' );
update_post_meta( $POST_ID, 'ast-breadcrumbs-content', 'disabled' );
update_post_meta( $POST_ID, 'ast-featured-img', 'disabled' );
update_post_meta( $POST_ID, 'site-sidebar-layout', 'no-sidebar' );
update_post_meta( $POST_ID, 'site-content-layout', 'page-builder' );

WP_CLI::success( "Pagina legal publicada. Post ID: $POST_ID" );
WP_CLI::line( 'URL: ' . get_permalink( $POST_ID ) );
