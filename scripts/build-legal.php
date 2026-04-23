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
      <p class="seramor-legal-eyebrow">Información legal</p>
      <h1 class="seramor-legal-title">Política de privacidad, aviso legal, cookies y términos</h1>
      <p class="seramor-legal-meta">Última actualización: $UPDATED</p>
    </div>
  </section>

  <article class="seramor-legal-body">

    <p class="seramor-legal-intro">En $SITE_NAME cuidamos tus datos con la misma intención con la que sostenemos nuestros círculos. Este documento reúne, de forma clara y concisa, cómo tratamos tu información, quién es responsable del sitio, qué cookies utilizamos y bajo qué condiciones ofrecemos nuestros servicios.</p>

    <nav class="seramor-legal-toc" aria-label="Índice">
      <p class="seramor-legal-toc-title">Contenido</p>
      <ol>
        <li><a href="#responsable">Responsable del sitio</a></li>
        <li><a href="#privacidad">Política de privacidad</a></li>
        <li><a href="#cookies">Política de cookies</a></li>
        <li><a href="#terminos">Términos y condiciones</a></li>
        <li><a href="#derechos">Tus derechos</a></li>
        <li><a href="#contacto">Contacto</a></li>
      </ol>
    </nav>

    <h2 id="responsable">1. Responsable del sitio</h2>
    <p>El presente sitio web ($SITE_URL) es operado por <strong>Seramor - Círculo de Mujeres Online</strong>, proyecto dirigido por Helena Seramor. Para cualquier consulta relacionada con este aviso puedes escribir a <a href="mailto:$CONTACT_MAIL">$CONTACT_MAIL</a>.</p>
    <p>Al navegar por este sitio aceptas las condiciones descritas a continuación. Si no estás de acuerdo con alguna de ellas, te pedimos que no utilices el sitio.</p>

    <h2 id="privacidad">2. Política de privacidad</h2>

    <h3>Qué datos recogemos</h3>
    <p>Solo tratamos los datos que tú nos facilitas voluntariamente al rellenar formularios, contratar un servicio o contactarnos por email o WhatsApp. Típicamente: nombre, correo electrónico, teléfono y el mensaje que quieras compartir.</p>

    <h3>Con qué finalidad</h3>
    <ul>
      <li>Responder a tus consultas y acompañarte en el proceso.</li>
      <li>Gestionar tu inscripción al Programa o al Consejo de Diosas.</li>
      <li>Enviarte información que hayas solicitado expresamente.</li>
      <li>Cumplir con las obligaciones legales y contables derivadas del servicio.</li>
    </ul>

    <h3>Base legal</h3>
    <p>Tratamos tus datos con base en tu consentimiento, en la ejecución del servicio contratado y, cuando corresponde, para cumplir obligaciones legales aplicables.</p>

    <h3>Conservación y cesión</h3>
    <p>Conservamos tus datos mientras dure la relación y durante los plazos legales posteriores. No los vendemos ni los cedemos a terceros con fines comerciales. Nuestros proveedores tecnológicos (hosting, pasarela de pago, email) actúan como encargados de tratamiento bajo contrato y con garantías equivalentes.</p>

    <h2 id="cookies">3. Política de cookies</h2>
    <p>Usamos cookies técnicas necesarias para el funcionamiento del sitio (sesión, seguridad, preferencias). También podemos usar cookies analíticas agregadas y, si tú lo aceptas expresamente, cookies de terceros como <a href="https://stripe.com/cookies-policy/legal" target="_blank" rel="noopener">Stripe</a> para procesar pagos.</p>
    <p>Puedes gestionar tus preferencias desde el banner de cookies o desde la configuración de tu navegador. Bloquear determinadas cookies puede afectar a partes del sitio como el checkout o el área de miembros.</p>

    <h2 id="terminos">4. Términos y condiciones</h2>

    <h3>Servicios ofrecidos</h3>
    <p>Seramor ofrece acompañamiento grupal e individual, formaciones y contenidos digitales. La descripción, duración y precio de cada servicio se indican en su página correspondiente antes de la contratación.</p>

    <h3>Pagos</h3>
    <p>Los pagos se procesan a través de <a href="https://stripe.com" target="_blank" rel="noopener">Stripe</a> en un entorno cifrado. No almacenamos los datos completos de tu tarjeta en nuestros servidores.</p>

    <h3>Cancelaciones y reembolsos</h3>
    <p>Puedes cancelar una suscripción en cualquier momento desde tu área privada; la baja surte efecto al final del período ya abonado. Para cursos y encuentros puntuales, el plazo y las condiciones de reembolso se detallan en la ficha del servicio.</p>

    <h3>Propiedad intelectual</h3>
    <p>Los textos, marcas, materiales audiovisuales y metodologías publicadas en este sitio son propiedad de Seramor o de sus autoras. Queda prohibida su reproducción total o parcial sin autorización previa.</p>

    <h3>Responsabilidad</h3>
    <p>Nuestros contenidos tienen fines formativos y de acompañamiento personal. No sustituyen atención médica, psicológica ni jurídica profesional.</p>

    <h2 id="derechos">5. Tus derechos</h2>
    <p>Puedes ejercer en cualquier momento tus derechos de acceso, rectificación, supresión, oposición, limitación y portabilidad, así como retirar el consentimiento otorgado. Para hacerlo, escríbenos a <a href="mailto:$CONTACT_MAIL">$CONTACT_MAIL</a> indicando tu solicitud. También puedes presentar una reclamación ante la autoridad de control competente si consideras que no hemos atendido tu petición correctamente.</p>

    <h2 id="contacto">6. Contacto</h2>
    <div class="seramor-legal-contact">
      <p>Si tienes dudas sobre este aviso, escríbenos a <a href="mailto:$CONTACT_MAIL">$CONTACT_MAIL</a>. Estamos para ayudarte.</p>
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
