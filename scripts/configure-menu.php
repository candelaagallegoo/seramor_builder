<?php
/**
 * Configura el menú de navegación para Seramor
 * Ejecutar con: wp eval-file configure-menu.php
 */

// Actualizar títulos del menú para que sean limpios
$updates = array(
    29 => 'Inicio',
    25 => 'Sobre Nosotras',
    26 => 'Programa',
    27 => 'Consejo de Diosas',
    28 => 'Servicios',
    24 => 'Contacto',
);

foreach ($updates as $post_id => $new_title) {
    wp_update_post(array(
        'ID'         => $post_id,
        'post_title' => $new_title,
    ));
    echo "  ✓ ID $post_id → $new_title\n";
}

echo "\n✅ Menú actualizado con labels limpios\n";
