<?php
/**
 * Cataloga las 52 imágenes: nombre descriptivo + leyenda con tags + alt text
 * Ejecutar: wp eval-file catalog-images.php
 */

$catalog = array(
    // === FOTOS GRANDES PNG (ex-HEIC, alta resolución, ideales para fondos/hero) ===
    37 => array(
        'title' => 'helena-cenote-agua-panoramica',
        'caption' => '#hero #fondo #agua #cenote #naturaleza #dramatica #panoramica',
        'alt' => 'Helena en cenote natural rodeada de vegetación'
    ),
    41 => array(
        'title' => 'helena-vegetacion-densa-verde',
        'caption' => '#fondo #naturaleza #verde #vegetacion #bosque #atmosferica',
        'alt' => 'Helena entre vegetación densa verde'
    ),
    42 => array(
        'title' => 'helena-agua-azul-cenote',
        'caption' => '#hero #fondo #agua #cenote #azul #dramatica #naturaleza',
        'alt' => 'Helena en agua azul de cenote'
    ),
    44 => array(
        'title' => 'naturaleza-agua-verde-cenote',
        'caption' => '#fondo #naturaleza #agua #cenote #verde #paisaje',
        'alt' => 'Escena natural de agua verde en cenote'
    ),
    45 => array(
        'title' => 'helena-naturaleza-panoramica-grande',
        'caption' => '#hero #fondo #panoramica #naturaleza #dramatica #granformato',
        'alt' => 'Helena en escena panorámica de naturaleza'
    ),
    49 => array(
        'title' => 'vegetacion-verde-bosque-tropical',
        'caption' => '#fondo #naturaleza #verde #bosque #tropical #textura',
        'alt' => 'Vegetación verde de bosque tropical'
    ),
    51 => array(
        'title' => 'helena-agua-naturaleza-gran-formato',
        'caption' => '#hero #fondo #agua #naturaleza #granformato #dramatica',
        'alt' => 'Helena en escena de agua y naturaleza, gran formato'
    ),
    55 => array(
        'title' => 'naturaleza-verde-exuberante',
        'caption' => '#fondo #naturaleza #verde #exuberante #textura #bosque',
        'alt' => 'Naturaleza verde exuberante'
    ),
    57 => array(
        'title' => 'helena-bosque-luz-natural',
        'caption' => '#fondo #naturaleza #bosque #luz #atmosferica',
        'alt' => 'Helena en bosque con luz natural filtrada'
    ),
    58 => array(
        'title' => 'helena-escena-naturaleza-epica',
        'caption' => '#hero #fondo #naturaleza #epica #granformato #dramatica',
        'alt' => 'Helena en escena épica de naturaleza'
    ),
    69 => array(
        'title' => 'naturaleza-agua-reflejo-verde',
        'caption' => '#fondo #naturaleza #agua #reflejo #verde #paisaje',
        'alt' => 'Escena de agua con reflejos verdes en naturaleza'
    ),
    70 => array(
        'title' => 'cenote-naturaleza-panoramica',
        'caption' => '#hero #fondo #cenote #naturaleza #panoramica #agua',
        'alt' => 'Vista panorámica de cenote natural'
    ),
    77 => array(
        'title' => 'bosque-tropical-luz-filtrada',
        'caption' => '#fondo #bosque #tropical #luz #verde #atmosfera',
        'alt' => 'Bosque tropical con luz filtrada'
    ),
    80 => array(
        'title' => 'agua-naturaleza-tropical',
        'caption' => '#fondo #agua #naturaleza #tropical #paisaje',
        'alt' => 'Escena de agua en naturaleza tropical'
    ),
    85 => array(
        'title' => 'naturaleza-verde-profundo',
        'caption' => '#fondo #naturaleza #verde #profundo #textura #bosque',
        'alt' => 'Naturaleza con verde profundo'
    ),
    88 => array(
        'title' => 'helena-naturaleza-verde-panorama',
        'caption' => '#hero #fondo #naturaleza #verde #panorama #granformato',
        'alt' => 'Helena en panorama de naturaleza verde'
    ),

    // === HELENA CUERPO COMPLETO EN NATURALEZA (JPG medianos 2-3.5MB) ===
    38 => array(
        'title' => 'helena-jardin-vestido-mirando',
        'caption' => '#retrato #cuerpoentero #jardin #vestido #mirandocamara #naturaleza',
        'alt' => 'Helena de pie en jardín con vestido, mirando a cámara'
    ),
    39 => array(
        'title' => 'helena-entre-arboles-bosque',
        'caption' => '#retrato #cuerpoentero #arboles #bosque #naturaleza #verde',
        'alt' => 'Helena entre árboles en el bosque'
    ),
    40 => array(
        'title' => 'helena-bosque-verde-caminando',
        'caption' => '#retrato #cuerpoentero #bosque #verde #caminando #naturaleza',
        'alt' => 'Helena caminando en bosque verde'
    ),
    48 => array(
        'title' => 'helena-entre-arboles-luz-dramatica',
        'caption' => '#retrato #cuerpoentero #arboles #luz #dramatica #bosque #destacada',
        'alt' => 'Helena entre árboles con luz dramática filtrada'
    ),
    52 => array(
        'title' => 'helena-exterior-sol-jardin',
        'caption' => '#retrato #cuerpoentero #exterior #sol #jardin #luminosa',
        'alt' => 'Helena al sol en jardín exterior'
    ),
    53 => array(
        'title' => 'helena-naturaleza-exterior-verde',
        'caption' => '#retrato #cuerpoentero #naturaleza #exterior #verde',
        'alt' => 'Helena en exterior verde natural'
    ),
    56 => array(
        'title' => 'helena-exterior-naturaleza-dia',
        'caption' => '#retrato #cuerpoentero #exterior #naturaleza #dia #casual',
        'alt' => 'Helena en exterior de naturaleza de día'
    ),
    67 => array(
        'title' => 'helena-bosque-arboles-altos',
        'caption' => '#retrato #cuerpoentero #bosque #arboles #dramatica #destacada #hero',
        'alt' => 'Helena en bosque de árboles altos, escena dramática'
    ),
    68 => array(
        'title' => 'helena-naturaleza-verde-exterior',
        'caption' => '#retrato #cuerpoentero #naturaleza #verde #exterior',
        'alt' => 'Helena en naturaleza verde exterior'
    ),
    71 => array(
        'title' => 'helena-naturaleza-cuerpo-entero',
        'caption' => '#retrato #cuerpoentero #naturaleza #standing #verde',
        'alt' => 'Helena de cuerpo entero en naturaleza'
    ),
    75 => array(
        'title' => 'helena-naturaleza-dramatica-agua',
        'caption' => '#retrato #cuerpoentero #naturaleza #dramatica #agua #destacada',
        'alt' => 'Helena en naturaleza dramática cerca del agua'
    ),
    81 => array(
        'title' => 'helena-exterior-verde-camino',
        'caption' => '#retrato #cuerpoentero #exterior #verde #camino #naturaleza',
        'alt' => 'Helena en camino exterior verde'
    ),
    83 => array(
        'title' => 'helena-naturaleza-dia-luminoso',
        'caption' => '#retrato #cuerpoentero #naturaleza #dia #luminoso',
        'alt' => 'Helena en naturaleza con día luminoso'
    ),
    89 => array(
        'title' => 'helena-exterior-arboles-natural',
        'caption' => '#retrato #cuerpoentero #exterior #arboles #natural',
        'alt' => 'Helena en exterior con árboles'
    ),

    // === HELENA MEDIO CUERPO / PORTRAIT (JPG 1-2MB) ===
    47 => array(
        'title' => 'helena-retrato-medio-naturaleza',
        'caption' => '#retrato #mediocuerpo #naturaleza #bio #sobrenosotras',
        'alt' => 'Retrato de Helena en naturaleza'
    ),
    50 => array(
        'title' => 'helena-retrato-natural-suave',
        'caption' => '#retrato #mediocuerpo #natural #suave #bio',
        'alt' => 'Retrato suave de Helena en entorno natural'
    ),
    54 => array(
        'title' => 'helena-retrato-cercano-cara',
        'caption' => '#retrato #closeup #cara #bio #personal #sobrenosotras #destacada',
        'alt' => 'Retrato cercano de Helena'
    ),
    60 => array(
        'title' => 'helena-retrato-exterior-natural',
        'caption' => '#retrato #mediocuerpo #exterior #natural',
        'alt' => 'Retrato de Helena en exterior natural'
    ),
    66 => array(
        'title' => 'helena-retrato-naturaleza-calida',
        'caption' => '#retrato #mediocuerpo #naturaleza #calida #bio',
        'alt' => 'Retrato cálido de Helena en naturaleza'
    ),
    74 => array(
        'title' => 'helena-retrato-exterior-dia',
        'caption' => '#retrato #mediocuerpo #exterior #dia #natural',
        'alt' => 'Retrato de Helena en exterior de día'
    ),
    84 => array(
        'title' => 'helena-retrato-suave-natural',
        'caption' => '#retrato #mediocuerpo #suave #natural',
        'alt' => 'Retrato suave de Helena'
    ),
    87 => array(
        'title' => 'helena-retrato-exterior-verde',
        'caption' => '#retrato #mediocuerpo #exterior #verde',
        'alt' => 'Retrato de Helena en exterior verde'
    ),

    // === HELENA CLOSE-UP / PEQUEÑOS (JPG 0.5-0.9MB) ===
    43 => array(
        'title' => 'helena-closeup-rostro-intimo',
        'caption' => '#closeup #rostro #intimo #personal #bio #destacada',
        'alt' => 'Close-up íntimo del rostro de Helena'
    ),
    46 => array(
        'title' => 'helena-closeup-mirada',
        'caption' => '#closeup #rostro #mirada #personal',
        'alt' => 'Close-up de Helena, mirada'
    ),
    59 => array(
        'title' => 'helena-closeup-natural-suave',
        'caption' => '#closeup #natural #suave #personal',
        'alt' => 'Close-up natural y suave de Helena'
    ),
    61 => array(
        'title' => 'helena-closeup-perfil-natural',
        'caption' => '#closeup #perfil #natural #personal',
        'alt' => 'Close-up de Helena en perfil natural'
    ),
    62 => array(
        'title' => 'helena-closeup-exterior-luz',
        'caption' => '#closeup #exterior #luz #natural',
        'alt' => 'Close-up de Helena en exterior con luz'
    ),
    63 => array(
        'title' => 'helena-closeup-verde-fondo',
        'caption' => '#closeup #verde #fondo #natural',
        'alt' => 'Close-up de Helena con fondo verde'
    ),
    64 => array(
        'title' => 'helena-closeup-duplicado',
        'caption' => '#closeup #duplicado #noUsar',
        'alt' => 'Helena close-up (duplicado)'
    ),
    65 => array(
        'title' => 'helena-closeup-original',
        'caption' => '#closeup #original #natural #personal',
        'alt' => 'Close-up original de Helena'
    ),
    72 => array(
        'title' => 'helena-closeup-calido',
        'caption' => '#closeup #calido #personal #intimo',
        'alt' => 'Close-up cálido de Helena'
    ),
    73 => array(
        'title' => 'helena-closeup-sereno',
        'caption' => '#closeup #sereno #personal',
        'alt' => 'Close-up sereno de Helena'
    ),
    76 => array(
        'title' => 'helena-closeup-sonrisa-natural',
        'caption' => '#closeup #sonrisa #natural #calido',
        'alt' => 'Close-up de Helena con sonrisa natural'
    ),
    82 => array(
        'title' => 'helena-closeup-suave-intimo',
        'caption' => '#closeup #suave #intimo #personal',
        'alt' => 'Close-up suave e íntimo de Helena'
    ),
    86 => array(
        'title' => 'helena-closeup-natural-dia',
        'caption' => '#closeup #natural #dia #personal',
        'alt' => 'Close-up natural de Helena de día'
    ),
    90 => array(
        'title' => 'helena-closeup-exterior-calido',
        'caption' => '#closeup #exterior #calido #natural',
        'alt' => 'Close-up exterior cálido de Helena'
    ),
);

echo "=== Catalogando " . count($catalog) . " imágenes ===\n\n";

$ok = 0;
$fail = 0;
foreach ($catalog as $id => $data) {
    $result = wp_update_post(array(
        'ID'           => $id,
        'post_title'   => $data['title'],
        'post_excerpt' => $data['caption'],
    ));
    
    if ($result && !is_wp_error($result)) {
        update_post_meta($id, '_wp_attachment_image_alt', $data['alt']);
        echo "  ✓ ID {$id} → {$data['title']}\n";
        echo "    Tags: {$data['caption']}\n";
        $ok++;
    } else {
        echo "  ✗ ID {$id} FALLÓ\n";
        $fail++;
    }
}

echo "\n=== Resultado: {$ok} OK, {$fail} fallaron ===\n";

// Resumen por categoría
echo "\n📋 RESUMEN POR CATEGORÍA:\n";
echo "  🌊 Fondos/Hero (PNGs grandes): IDs 37,41,42,44,45,49,51,55,57,58,69,70,77,80,85,88 (16 fotos)\n";
echo "  🌿 Helena cuerpo entero en naturaleza: IDs 38,39,40,48,52,53,56,67,68,71,75,81,83,89 (14 fotos)\n";
echo "  📸 Helena medio cuerpo/portrait: IDs 47,50,54,60,66,74,84,87 (8 fotos)\n";
echo "  🔍 Helena close-up/rostro: IDs 43,46,59,61,62,63,64,65,72,73,76,82,86,90 (14 fotos)\n";
echo "\n⭐ DESTACADAS para Landing:\n";
echo "  HERO fondo: ID 42 (cenote azul), ID 67 (bosque dramático), ID 45 (panorámica)\n";
echo "  Bio Helena: ID 54 (retrato cercano), ID 43 (closeup íntimo)\n";
echo "  Secciones: ID 48 (árboles+luz), ID 75 (naturaleza+agua)\n";
echo "  NO USAR: ID 64 (duplicado de 65)\n";
