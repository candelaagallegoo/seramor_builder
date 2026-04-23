<?php
/**
 * Build Landing Page (ID 10) - Seramor - V3
 * Fidelidad total al diseño Canva. Tipografía Libre Baskerville.
 * Estructura: 7 secciones según Notion doc 349b60f9
 * Colores: #37432b (verde oscuro), #fce8a4 (dorado), #faf7f0 (crema), #733015 (marrón), #ffffff
 * Run: wp eval-file scripts/build-landing-v3.php
 *
 * IDs de imágenes WordPress:
 *   42  = helena-agua-azul-cenote (HERO)
 *   38  = helena-jardin-vestido-mirando
 *   43  = helena-closeup-rostro-intimo
 *   45  = helena-naturaleza-panoramica-grande
 *   48  = helena-entre-arboles-luz-dramatica
 *   51  = helena-agua-naturaleza-gran-formato
 *   54  = helena-retrato-cercano-cara
 *   67  = helena-bosque-arboles-altos
 *   75  = helena-naturaleza-dramatica-agua
 *   88  = helena-naturaleza-verde-panorama
 *   97  = seramor-logo-figura (PNG dorado)
 */

$logo_url  = 'http://localhost/seramor/wp-content/uploads/2026/04/logo-img-2-1.png';
$hero_url  = 'http://localhost/seramor/wp-content/uploads/2026/04/213648BF-D391-4C82-89CB-2644B8ED126C.png';
$sol_url   = 'http://localhost/seramor/wp-content/uploads/2026/04/338EFF8C-30D3-44A1-9253-65286D790DA3.JPG';  // ID 48 arboles luz
$con_url   = 'http://localhost/seramor/wp-content/uploads/2026/04/21CDD5C1-5A41-48CC-96C4-B6A92D9C07D5.JPG'; // ID 43 closeup rostro
$cre_url   = 'http://localhost/seramor/wp-content/uploads/2026/04/AF109809-D6AD-449F-837F-10077C834DDE.JPG';  // ID 75 agua dramatica
$hel_url   = 'http://localhost/seramor/wp-content/uploads/2026/04/0C4F3827-C906-4DFD-AE4B-349B19F021DB.JPG'; // ID 38 jardin vestido
$serv_url  = 'http://localhost/seramor/wp-content/uploads/2026/04/CCFCB046-6705-4A75-8C64-CAB68EA85754.png'; // ID 88 verde panorama
$prog_url  = 'http://localhost/seramor/wp-content/uploads/2026/04/271DB50D-6F84-418F-BCA1-C5FBA82E54D2.png'; // ID 45 panoramica

$font_stack = "'Libre Baskerville', serif";

$content = <<<GUTENBERG

<!-- ==========================================================
     SECCIÓN 1 — HERO: Logo + Frase + CTA
     ========================================================== -->
<!-- wp:cover {"url":"$hero_url","id":42,"dimRatio":50,"customOverlayColor":"#37432b","minHeight":100,"minHeightUnit":"vh","align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-cover alignfull has-background-dim" style="min-height:100vh;padding:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-50 has-background-dim" style="background-color:#37432b"></span><img class="wp-block-cover__image-background wp-image-42" alt="Helena en cenote azul" src="$hero_url" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">

<!-- wp:spacer {"height":"80px"} -->
<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:image {"id":97,"align":"center","style":{"layout":{"selfStretch":"fixed","flexSize":"180px"}}} -->
<figure class="wp-block-image aligncenter" style="width:180px"><img src="$logo_url" alt="Seramor logo" class="wp-image-97" style="border-radius:50%;width:180px;height:180px;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:spacer {"height":"24px"} -->
<div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"13px","letterSpacing":"5px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} -->
<p class="has-text-align-center has-text-color" style="color:#fce8a4;font-size:13px;letter-spacing:5px;text-transform:uppercase;font-family:$font_stack">SERAMOR CIRCLE</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(32px,5vw,58px)","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack","lineHeight":"1.3"},"color":{"text":"#faf7f0"}}} -->
<h1 class="wp-block-heading has-text-align-center has-text-color" style="color:#faf7f0;font-size:clamp(32px,5vw,58px);font-style:italic;font-weight:400;font-family:$font_stack;line-height:1.3">El círculo de mujeres online donde sanar, volver a ti y dar el primer paso hacia una vida más libre y alineada.</h1>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"48px"} -->
<div style="height:48px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"12px","letterSpacing":"4px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} -->
<p class="has-text-align-center has-text-color" style="color:#fce8a4;font-size:12px;letter-spacing:4px;text-transform:uppercase;font-family:$font_stack">CÍRCULO DE MUJERES ONLINE</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"style":{"color":{"background":"#fce8a4","text":"#37432b"},"border":{"radius":"4px"},"spacing":{"padding":{"top":"18px","bottom":"18px","left":"48px","right":"48px"}},"typography":{"fontFamily":"$font_stack","fontSize":"14px","letterSpacing":"2px","textTransform":"uppercase"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:4px;color:#37432b;background-color:#fce8a4;padding-top:18px;padding-bottom:18px;padding-left:48px;padding-right:48px;font-family:$font_stack;font-size:14px;letter-spacing:2px;text-transform:uppercase" href="/?page_id=17">Descubrir el programa</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"100px"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

</div></div>
<!-- /wp:cover -->


<!-- ==========================================================
     SECCIÓN 2 — SOLTAR / CONECTAR / CRECER (3 columnas con foto)
     ========================================================== -->
<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-columns alignfull" style="gap:0;padding:0">

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-column" style="padding:0">
<!-- wp:cover {"url":"$sol_url","id":48,"dimRatio":55,"customOverlayColor":"#37432b","minHeight":500,"minHeightUnit":"px"} -->
<div class="wp-block-cover has-background-dim" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-55 has-background-dim" style="background-color:#37432b"></span><img class="wp-block-cover__image-background wp-image-48" alt="Soltar" src="$sol_url" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:spacer {"height":"60px"} --><div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"11px","letterSpacing":"5px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} --><p class="has-text-align-center has-text-color" style="color:#fce8a4;font-size:11px;letter-spacing:5px;text-transform:uppercase;font-family:$font_stack">SOLTAR</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"16px"} --><div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"28px","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack"},"color":{"text":"#faf7f0"}}} --><h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#faf7f0;font-size:28px;font-style:italic;font-weight:400;font-family:$font_stack">Lo que ya no eres</h3><!-- /wp:heading -->
<!-- wp:spacer {"height":"60px"} --><div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
</div></div>
<!-- /wp:cover -->
</div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-column" style="padding:0">
<!-- wp:cover {"url":"$con_url","id":43,"dimRatio":45,"customOverlayColor":"#232b1e","minHeight":500,"minHeightUnit":"px"} -->
<div class="wp-block-cover has-background-dim" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-45 has-background-dim" style="background-color:#232b1e"></span><img class="wp-block-cover__image-background wp-image-43" alt="Conectar" src="$con_url" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:spacer {"height":"60px"} --><div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"11px","letterSpacing":"5px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} --><p class="has-text-align-center has-text-color" style="color:#fce8a4;font-size:11px;letter-spacing:5px;text-transform:uppercase;font-family:$font_stack">CONECTAR</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"16px"} --><div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"28px","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack"},"color":{"text":"#faf7f0"}}} --><h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#faf7f0;font-size:28px;font-style:italic;font-weight:400;font-family:$font_stack">Con quien siempre fuiste</h3><!-- /wp:heading -->
<!-- wp:spacer {"height":"60px"} --><div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
</div></div>
<!-- /wp:cover -->
</div>
<!-- /wp:column -->

<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
<div class="wp-block-column" style="padding:0">
<!-- wp:cover {"url":"$cre_url","id":75,"dimRatio":50,"customOverlayColor":"#37432b","minHeight":500,"minHeightUnit":"px"} -->
<div class="wp-block-cover has-background-dim" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-50 has-background-dim" style="background-color:#37432b"></span><img class="wp-block-cover__image-background wp-image-75" alt="Crecer" src="$cre_url" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:spacer {"height":"60px"} --><div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"11px","letterSpacing":"5px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} --><p class="has-text-align-center has-text-color" style="color:#fce8a4;font-size:11px;letter-spacing:5px;text-transform:uppercase;font-family:$font_stack">CRECER</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"16px"} --><div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"28px","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack"},"color":{"text":"#faf7f0"}}} --><h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#faf7f0;font-size:28px;font-style:italic;font-weight:400;font-family:$font_stack">Hacia quien te estás convirtiendo</h3><!-- /wp:heading -->
<!-- wp:spacer {"height":"60px"} --><div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
</div></div>
<!-- /wp:cover -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->


<!-- ==========================================================
     SECCIÓN 3 — CONOCE A HELENA (texto + foto circular)
     ========================================================== -->
<!-- wp:group {"align":"full","style":{"color":{"background":"#37432b"},"spacing":{"padding":{"top":"80px","bottom":"80px","left":"40px","right":"40px"}}}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#37432b;padding-top:80px;padding-bottom:80px;padding-left:40px;padding-right:40px">

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":"60px"}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="gap:60px">

<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">

<!-- wp:paragraph {"style":{"typography":{"fontSize":"11px","letterSpacing":"5px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} -->
<p class="has-text-color" style="color:#fce8a4;font-size:11px;letter-spacing:5px;text-transform:uppercase;font-family:$font_stack">FACILITADORA DE CÍRCULOS</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"16px"} -->
<div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"clamp(28px,4vw,46px)","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack","lineHeight":"1.2"},"color":{"text":"#faf7f0"}}} -->
<h2 class="wp-block-heading has-text-color" style="color:#faf7f0;font-size:clamp(28px,4vw,46px);font-style:italic;font-weight:400;font-family:$font_stack;line-height:1.2">Conoce a Helena</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"32px"} -->
<div style="height:32px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"17px","fontFamily":"$font_stack","lineHeight":"1.8"},"color":{"text":"#faf7f0"}}} -->
<p class="has-text-color" style="color:#faf7f0;font-size:17px;font-family:$font_stack;line-height:1.8">Me llamo Helena, soy facilitadora de círculos de mujeres y acompañante en procesos de transformación personal. Llevo años creando espacios seguros donde las mujeres pueden soltar lo que ya no les sirve, reencontrarse con su esencia y caminar juntas hacia la vida que desean.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"24px"} -->
<div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"17px","fontFamily":"$font_stack","lineHeight":"1.8"},"color":{"text":"#e4d58e"}}} -->
<p class="has-text-color" style="color:#e4d58e;font-size:17px;font-family:$font_stack;line-height:1.8;font-style:italic">"Creo profundamente en el poder de las mujeres cuando se reúnen en círculo. Hay una magia que no se puede explicar, solo se puede vivir."</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">

<!-- wp:image {"id":38,"align":"center","style":{"border":{"radius":"50%"},"layout":{"selfStretch":"fixed","flexSize":"380px"}}} -->
<figure class="wp-block-image aligncenter" style="width:380px"><img src="$hel_url" alt="Helena facilitadora de círculos de mujeres" class="wp-image-38" style="border-radius:50%;width:380px;height:380px;object-fit:cover"/></figure>
<!-- /wp:image -->

</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->


<!-- ==========================================================
     SECCIÓN 4 — SERVICIOS (3 tarjetas sobre fondo naturaleza)
     ========================================================== -->
<!-- wp:cover {"url":"$serv_url","id":88,"dimRatio":70,"customOverlayColor":"#232b1e","minHeight":600,"minHeightUnit":"px","align":"full"} -->
<div class="wp-block-cover alignfull has-background-dim" style="min-height:600px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim" style="background-color:#232b1e"></span><img class="wp-block-cover__image-background wp-image-88" alt="Naturaleza Seramor" src="$serv_url" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">

<!-- wp:spacer {"height":"60px"} -->
<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"11px","letterSpacing":"5px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} -->
<p class="has-text-align-center has-text-color" style="color:#fce8a4;font-size:11px;letter-spacing:5px;text-transform:uppercase;font-family:$font_stack">FORMAS DE ACOMPAÑARTE</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"16px"} -->
<div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"clamp(26px,4vw,42px)","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack"},"color":{"text":"#faf7f0"}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#faf7f0;font-size:clamp(26px,4vw,42px);font-style:italic;font-weight:400;font-family:$font_stack">¿Cómo puedo acompañarte?</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"48px"} -->
<div style="height:48px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"style":{"spacing":{"blockGap":"24px","padding":{"left":"40px","right":"40px"}}}} -->
<div class="wp-block-columns" style="gap:24px;padding-left:40px;padding-right:40px">

<!-- Tarjeta 1: Mentorías 1:1 -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"color":{"background":"rgba(250,247,240,0.08)"},"border":{"color":"#fce8a4","width":"1px"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"32px","right":"32px"}}}} -->
<div class="wp-block-group has-background" style="background-color:rgba(250,247,240,0.08);border:1px solid #fce8a4;padding-top:40px;padding-bottom:40px;padding-left:32px;padding-right:32px">
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"11px","letterSpacing":"4px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} --><p class="has-text-align-center has-text-color" style="color:#fce8a4;font-size:11px;letter-spacing:4px;text-transform:uppercase;font-family:$font_stack">SESIONES INDIVIDUALES</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"12px"} --><div style="height:12px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"24px","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack"},"color":{"text":"#faf7f0"}}} --><h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#faf7f0;font-size:24px;font-style:italic;font-weight:400;font-family:$font_stack">Mentorías 1:1</h3><!-- /wp:heading -->
<!-- wp:spacer {"height":"20px"} --><div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"15px","fontFamily":"$font_stack","lineHeight":"1.7"},"color":{"text":"#faf7f0"}}} --><p class="has-text-align-center has-text-color" style="color:#faf7f0;font-size:15px;font-family:$font_stack;line-height:1.7">Acompañamiento personalizado y profundo para tu proceso de transformación personal.</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"28px"} --><div style="height:28px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"transparent","text":"#fce8a4"},"border":{"color":"#fce8a4","width":"1px","radius":"4px"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"28px","right":"28px"}},"typography":{"fontFamily":"$font_stack","fontSize":"12px","letterSpacing":"2px","textTransform":"uppercase"}}} --><div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:4px;color:#fce8a4;background-color:transparent;border:1px solid #fce8a4;padding-top:12px;padding-bottom:12px;padding-left:28px;padding-right:28px;font-family:$font_stack;font-size:12px;letter-spacing:2px;text-transform:uppercase" href="/mentorias">Saber más</a></div><!-- /wp:button --></div><!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- Tarjeta 2: Programa 3 Meses (ACTIVA / DESTACADA) -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"color":{"background":"#fce8a4"},"border":{"radius":"4px"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"32px","right":"32px"}}}} -->
<div class="wp-block-group has-background" style="background-color:#fce8a4;border-radius:4px;padding-top:40px;padding-bottom:40px;padding-left:32px;padding-right:32px">
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"11px","letterSpacing":"4px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#733015"}}} --><p class="has-text-align-center has-text-color" style="color:#733015;font-size:11px;letter-spacing:4px;text-transform:uppercase;font-family:$font_stack">ACOMPAÑAMIENTO PROFUNDO</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"12px"} --><div style="height:12px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"24px","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack"},"color":{"text":"#37432b"}}} --><h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#37432b;font-size:24px;font-style:italic;font-weight:400;font-family:$font_stack">Programa 3 Meses «Mujeres Poderosas»</h3><!-- /wp:heading -->
<!-- wp:spacer {"height":"20px"} --><div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"15px","fontFamily":"$font_stack","lineHeight":"1.7"},"color":{"text":"#37432b"}}} --><p class="has-text-align-center has-text-color" style="color:#37432b;font-size:15px;font-family:$font_stack;line-height:1.7">Un programa completo de transformación con círculos semanales, mentorías y comunidad de apoyo.</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"28px"} --><div style="height:28px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#37432b","text":"#fce8a4"},"border":{"radius":"4px"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"28px","right":"28px"}},"typography":{"fontFamily":"$font_stack","fontSize":"12px","letterSpacing":"2px","textTransform":"uppercase"}}} --><div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:4px;color:#fce8a4;background-color:#37432b;padding-top:12px;padding-bottom:12px;padding-left:28px;padding-right:28px;font-family:$font_stack;font-size:12px;letter-spacing:2px;text-transform:uppercase" href="/?page_id=17">Ver programa</a></div><!-- /wp:button --></div><!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- Tarjeta 3: Consejo de Diosas -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"color":{"background":"rgba(250,247,240,0.08)"},"border":{"color":"#fce8a4","width":"1px"},"spacing":{"padding":{"top":"40px","bottom":"40px","left":"32px","right":"32px"}}}} -->
<div class="wp-block-group has-background" style="background-color:rgba(250,247,240,0.08);border:1px solid #fce8a4;padding-top:40px;padding-bottom:40px;padding-left:32px;padding-right:32px">
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"11px","letterSpacing":"4px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} --><p class="has-text-align-center has-text-color" style="color:#fce8a4;font-size:11px;letter-spacing:4px;text-transform:uppercase;font-family:$font_stack">SUSCRIPCIÓN</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"12px"} --><div style="height:12px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"24px","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack"},"color":{"text":"#faf7f0"}}} --><h3 class="wp-block-heading has-text-align-center has-text-color" style="color:#faf7f0;font-size:24px;font-style:italic;font-weight:400;font-family:$font_stack">Consejo de Diosas</h3><!-- /wp:heading -->
<!-- wp:spacer {"height":"20px"} --><div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"15px","fontFamily":"$font_stack","lineHeight":"1.7"},"color":{"text":"#faf7f0"}}} --><p class="has-text-align-center has-text-color" style="color:#faf7f0;font-size:15px;font-family:$font_stack;line-height:1.7">Comunidad mensual con círculos en vivo, biblioteca de recursos y espacio de conexión continua.</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"28px"} --><div style="height:28px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"transparent","text":"#fce8a4"},"border":{"color":"#fce8a4","width":"1px","radius":"4px"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"28px","right":"28px"}},"typography":{"fontFamily":"$font_stack","fontSize":"12px","letterSpacing":"2px","textTransform":"uppercase"}}} --><div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:4px;color:#fce8a4;background-color:transparent;border:1px solid #fce8a4;padding-top:12px;padding-bottom:12px;padding-left:28px;padding-right:28px;font-family:$font_stack;font-size:12px;letter-spacing:2px;text-transform:uppercase" href="/consejo-de-diosas">Saber más</a></div><!-- /wp:button --></div><!-- /wp:buttons -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"60px"} -->
<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

</div></div>
<!-- /wp:cover -->


<!-- ==========================================================
     SECCIÓN 5 — ¿QUÉ ES SERAMOR? (fondo crema, texto centrado)
     ========================================================== -->
<!-- wp:group {"align":"full","style":{"color":{"background":"#faf7f0"},"spacing":{"padding":{"top":"100px","bottom":"100px","left":"40px","right":"40px"}}}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#faf7f0;padding-top:100px;padding-bottom:100px;padding-left:40px;padding-right:40px">

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"11px","letterSpacing":"5px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#733015"}}} -->
<p class="has-text-align-center has-text-color" style="color:#733015;font-size:11px;letter-spacing:5px;text-transform:uppercase;font-family:$font_stack">EL ESPACIO</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"clamp(28px,4vw,46px)","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack","lineHeight":"1.2"},"color":{"text":"#37432b"}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#37432b;font-size:clamp(28px,4vw,46px);font-style:italic;font-weight:400;font-family:$font_stack;line-height:1.2">¿Qué es Seramor?</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"60px"} -->
<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"spacing":{"padding":{"left":"0","right":"0"}},"layout":{"contentSize":"680px"}}} -->
<div class="wp-block-group" style="padding-left:0;padding-right:0">

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px","fontFamily":"$font_stack","lineHeight":"1.9"},"color":{"text":"#37432b"}}} -->
<p class="has-text-align-center has-text-color" style="color:#37432b;font-size:18px;font-family:$font_stack;line-height:1.9">Seramor es un círculo de mujeres online: un espacio de encuentro, introspección y transformación donde aprendemos a soltar lo que ya no somos, a reconectar con nuestra esencia y a caminar juntas hacia la vida que queremos vivir.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px","fontFamily":"$font_stack","lineHeight":"1.9"},"color":{"text":"#37432b"}}} -->
<p class="has-text-align-center has-text-color" style="color:#37432b;font-size:18px;font-family:$font_stack;line-height:1.9">No es terapia, no es un curso. Es algo diferente: es la sabiduría de las mujeres cuando se reúnen con intención. Es el poder de ser vistas, escuchadas y sostenidas por otras mujeres que entienden lo que estás viviendo.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px","fontStyle":"italic","fontFamily":"$font_stack","lineHeight":"1.9"},"color":{"text":"#733015"}}} -->
<p class="has-text-align-center has-text-color" style="color:#733015;font-size:18px;font-style:italic;font-family:$font_stack;line-height:1.9">Aquí no tienes que ser perfecta. Solo tienes que estar dispuesta a mirarte con honestidad y con amor.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"40px"} -->
<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px","fontFamily":"$font_stack","lineHeight":"1.9"},"color":{"text":"#37432b"}}} -->
<p class="has-text-align-center has-text-color" style="color:#37432b;font-size:18px;font-family:$font_stack;line-height:1.9">Seramor nació de la certeza de que las mujeres se necesitan unas a otras. No para competir ni para compararse, sino para recordarse mutuamente quiénes son cuando se atreven a ser ellas mismas.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->


<!-- ==========================================================
     SECCIÓN 6 — TESTIMONIOS
     ========================================================== -->
<!-- wp:group {"align":"full","style":{"color":{"background":"#37432b"},"spacing":{"padding":{"top":"80px","bottom":"80px","left":"40px","right":"40px"}}}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#37432b;padding-top:80px;padding-bottom:80px;padding-left:40px;padding-right:40px">

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"11px","letterSpacing":"5px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} -->
<p class="has-text-align-center has-text-color" style="color:#fce8a4;font-size:11px;letter-spacing:5px;text-transform:uppercase;font-family:$font_stack">VOCES DEL CÍRCULO</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"16px"} -->
<div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"clamp(26px,4vw,42px)","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack"},"color":{"text":"#faf7f0"}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#faf7f0;font-size:clamp(26px,4vw,42px);font-style:italic;font-weight:400;font-family:$font_stack">Lo que dicen las mujeres del círculo</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"56px"} -->
<div style="height:56px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"style":{"spacing":{"blockGap":"32px"}}} -->
<div class="wp-block-columns" style="gap:32px">

<!-- Testimonio 1 -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"color":{"background":"rgba(252,232,164,0.08)"},"border":{"color":"rgba(252,232,164,0.25)","width":"1px"},"spacing":{"padding":{"top":"36px","bottom":"36px","left":"28px","right":"28px"}}}} -->
<div class="wp-block-group has-background" style="background-color:rgba(252,232,164,0.08);border:1px solid rgba(252,232,164,0.25);padding-top:36px;padding-bottom:36px;padding-left:28px;padding-right:28px">
<!-- wp:paragraph {"style":{"typography":{"fontSize":"32px","fontFamily":"Georgia, serif"},"color":{"text":"#fce8a4"}}} --><p class="has-text-color" style="color:#fce8a4;font-size:32px;font-family:Georgia, serif">"</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"italic","fontFamily":"$font_stack","lineHeight":"1.8"},"color":{"text":"#faf7f0"}}} --><p class="has-text-color" style="color:#faf7f0;font-size:16px;font-style:italic;font-family:$font_stack;line-height:1.8">El círculo de Helena me devolvió a mí misma. Por primera vez en años me sentí vista y sostenida sin tener que justificarme.</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"20px"} --><div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","letterSpacing":"2px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} --><p class="has-text-color" style="color:#fce8a4;font-size:13px;letter-spacing:2px;text-transform:uppercase;font-family:$font_stack">— María, 34 años</p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- Testimonio 2 -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"color":{"background":"rgba(252,232,164,0.08)"},"border":{"color":"rgba(252,232,164,0.25)","width":"1px"},"spacing":{"padding":{"top":"36px","bottom":"36px","left":"28px","right":"28px"}}}} -->
<div class="wp-block-group has-background" style="background-color:rgba(252,232,164,0.08);border:1px solid rgba(252,232,164,0.25);padding-top:36px;padding-bottom:36px;padding-left:28px;padding-right:28px">
<!-- wp:paragraph {"style":{"typography":{"fontSize":"32px","fontFamily":"Georgia, serif"},"color":{"text":"#fce8a4"}}} --><p class="has-text-color" style="color:#fce8a4;font-size:32px;font-family:Georgia, serif">"</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"italic","fontFamily":"$font_stack","lineHeight":"1.8"},"color":{"text":"#faf7f0"}}} --><p class="has-text-color" style="color:#faf7f0;font-size:16px;font-style:italic;font-family:$font_stack;line-height:1.8">Pensaba que no era para mí, pero desde el primer círculo supe que había encontrado mi tribu. Ha cambiado la forma en que me relaciono conmigo misma.</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"20px"} --><div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","letterSpacing":"2px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} --><p class="has-text-color" style="color:#fce8a4;font-size:13px;letter-spacing:2px;text-transform:uppercase;font-family:$font_stack">— Laura, 41 años</p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- Testimonio 3 -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"color":{"background":"rgba(252,232,164,0.08)"},"border":{"color":"rgba(252,232,164,0.25)","width":"1px"},"spacing":{"padding":{"top":"36px","bottom":"36px","left":"28px","right":"28px"}}}} -->
<div class="wp-block-group has-background" style="background-color:rgba(252,232,164,0.08);border:1px solid rgba(252,232,164,0.25);padding-top:36px;padding-bottom:36px;padding-left:28px;padding-right:28px">
<!-- wp:paragraph {"style":{"typography":{"fontSize":"32px","fontFamily":"Georgia, serif"},"color":{"text":"#fce8a4"}}} --><p class="has-text-color" style="color:#fce8a4;font-size:32px;font-family:Georgia, serif">"</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"italic","fontFamily":"$font_stack","lineHeight":"1.8"},"color":{"text":"#faf7f0"}}} --><p class="has-text-color" style="color:#faf7f0;font-size:16px;font-style:italic;font-family:$font_stack;line-height:1.8">El programa de 3 meses fue un antes y un después. Helena crea un espacio de una seguridad y una calidez que no había experimentado nunca en ningún espacio online.</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"20px"} --><div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","letterSpacing":"2px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} --><p class="has-text-color" style="color:#fce8a4;font-size:13px;letter-spacing:2px;text-transform:uppercase;font-family:$font_stack">— Claudia, 38 años</p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- Testimonio 4 -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"color":{"background":"rgba(252,232,164,0.08)"},"border":{"color":"rgba(252,232,164,0.25)","width":"1px"},"spacing":{"padding":{"top":"36px","bottom":"36px","left":"28px","right":"28px"}}}} -->
<div class="wp-block-group has-background" style="background-color:rgba(252,232,164,0.08);border:1px solid rgba(252,232,164,0.25);padding-top:36px;padding-bottom:36px;padding-left:28px;padding-right:28px">
<!-- wp:paragraph {"style":{"typography":{"fontSize":"32px","fontFamily":"Georgia, serif"},"color":{"text":"#fce8a4"}}} --><p class="has-text-color" style="color:#fce8a4;font-size:32px;font-family:Georgia, serif">"</p><!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","fontStyle":"italic","fontFamily":"$font_stack","lineHeight":"1.8"},"color":{"text":"#faf7f0"}}} --><p class="has-text-color" style="color:#faf7f0;font-size:16px;font-style:italic;font-family:$font_stack;line-height:1.8">Llegué sintiéndome muy sola en mi proceso. Los círculos me recordaron que no estoy sola, y eso lo cambió todo.</p><!-- /wp:paragraph -->
<!-- wp:spacer {"height":"20px"} --><div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div><!-- /wp:spacer -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"13px","letterSpacing":"2px","textTransform":"uppercase","fontFamily":"$font_stack"},"color":{"text":"#fce8a4"}}} --><p class="has-text-color" style="color:#fce8a4;font-size:13px;letter-spacing:2px;text-transform:uppercase;font-family:$font_stack">— Ana, 29 años</p><!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->


<!-- ==========================================================
     SECCIÓN 7 — CTA FINAL
     ========================================================== -->
<!-- wp:cover {"url":"$prog_url","id":45,"dimRatio":65,"customOverlayColor":"#37432b","minHeight":500,"minHeightUnit":"px","align":"full"} -->
<div class="wp-block-cover alignfull has-background-dim" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-65 has-background-dim" style="background-color:#37432b"></span><img class="wp-block-cover__image-background wp-image-45" alt="Naturaleza Seramor" src="$prog_url" style="object-fit:cover" data-object-fit="cover"/><div class="wp-block-cover__inner-container">

<!-- wp:spacer {"height":"80px"} -->
<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"clamp(26px,4vw,44px)","fontStyle":"italic","fontWeight":"400","fontFamily":"$font_stack","lineHeight":"1.3"},"color":{"text":"#faf7f0"}}} -->
<h2 class="wp-block-heading has-text-align-center has-text-color" style="color:#faf7f0;font-size:clamp(26px,4vw,44px);font-style:italic;font-weight:400;font-family:$font_stack;line-height:1.3">No tienes que seguir haciéndolo todo sola.</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"24px"} -->
<div style="height:24px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px","fontFamily":"$font_stack","lineHeight":"1.8"},"color":{"text":"#faf7f0"}}} -->
<p class="has-text-align-center has-text-color" style="color:#faf7f0;font-size:18px;font-family:$font_stack;line-height:1.8">El círculo te está esperando. Es tu momento.</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"48px"} -->
<div style="height:48px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"style":{"color":{"background":"#fce8a4","text":"#37432b"},"border":{"radius":"4px"},"spacing":{"padding":{"top":"18px","bottom":"18px","left":"48px","right":"48px"}},"typography":{"fontFamily":"$font_stack","fontSize":"14px","letterSpacing":"2px","textTransform":"uppercase"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" style="border-radius:4px;color:#37432b;background-color:#fce8a4;padding-top:18px;padding-bottom:18px;padding-left:48px;padding-right:48px;font-family:$font_stack;font-size:14px;letter-spacing:2px;text-transform:uppercase" href="/?page_id=17">Ver el programa de 3 meses</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"80px"} -->
<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

</div></div>
<!-- /wp:cover -->

GUTENBERG;

$result = wp_update_post([
    'ID'           => 10,
    'post_content' => $content,
    'post_status'  => 'publish',
]);

if ( is_wp_error( $result ) ) {
    WP_CLI::error( 'Error al actualizar: ' . $result->get_error_message() );
} else {
    WP_CLI::success( "Landing page V3 publicada. Post ID: $result" );
    WP_CLI::log( "URL: " . get_permalink( 10 ) );
}
