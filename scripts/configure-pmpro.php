<?php
/**
 * Configure Paid Memberships Pro for Seramor.
 *
 * Run:
 * c:\xampp\php\php.exe c:\xampp\htdocs\seramor\wp-cli.phar eval-file c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\scripts\configure-pmpro.php --path="c:\xampp\htdocs\seramor"
 */

if ( ! defined( 'PMPRO_VERSION' ) ) {
    WP_CLI::error( 'PMPro no esta activo.' );
}

global $wpdb;

update_option( 'pmpro_currency', 'EUR' );

$pages = array(
    'account'             => array(
        'title'   => 'Mi cuenta',
        'content' => '[pmpro_account]',
    ),
    'billing'             => array(
        'title'   => 'Facturacion',
        'content' => '[pmpro_billing]',
    ),
    'cancel'              => array(
        'title'   => 'Cancelar suscripcion',
        'content' => '[pmpro_cancel]',
    ),
    'checkout'            => array(
        'title'   => 'Checkout',
        'content' => '[pmpro_checkout]',
    ),
    'confirmation'        => array(
        'title'   => 'Confirmacion',
        'content' => '[pmpro_confirmation]',
    ),
    'invoice'             => array(
        'title'   => 'Pedidos',
        'content' => '[pmpro_invoice]',
    ),
    'levels'              => array(
        'title'   => 'Membresias',
        'content' => '[pmpro_levels]',
    ),
    'login'               => array(
        'title'   => 'Acceso',
        'content' => '[pmpro_login]',
    ),
    'member_profile_edit' => array(
        'title'   => 'Tu perfil',
        'content' => '[pmpro_member_profile_edit]',
    ),
);

$created_pages = pmpro_generatePages( $pages );

function seramor_pmpro_upsert_level( array $level_data ) {
    global $wpdb;

    $table = $wpdb->pmpro_membership_levels;
    $existing_id = (int) $wpdb->get_var(
        $wpdb->prepare(
            "SELECT id FROM {$table} WHERE name = %s LIMIT 1",
            $level_data['name']
        )
    );

    pmpro_insert_or_replace(
        $table,
        array(
            'id'                => $existing_id,
            'name'              => $level_data['name'],
            'description'       => $level_data['description'],
            'confirmation'      => $level_data['confirmation'],
            'initial_payment'   => $level_data['initial_payment'],
            'billing_amount'    => $level_data['billing_amount'],
            'cycle_number'      => $level_data['cycle_number'],
            'cycle_period'      => $level_data['cycle_period'],
            'billing_limit'     => $level_data['billing_limit'],
            'trial_amount'      => $level_data['trial_amount'],
            'trial_limit'       => $level_data['trial_limit'],
            'expiration_number' => $level_data['expiration_number'],
            'expiration_period' => $level_data['expiration_period'],
            'allow_signups'     => 1,
        ),
        array(
            '%d',
            '%s',
            '%s',
            '%s',
            '%f',
            '%f',
            '%d',
            '%s',
            '%d',
            '%f',
            '%d',
            '%d',
            '%s',
            '%d',
        )
    );

    if ( ! empty( $wpdb->last_error ) ) {
        WP_CLI::error( 'Error guardando nivel ' . $level_data['name'] . ': ' . $wpdb->last_error );
    }

    $level_id = $existing_id > 0 ? $existing_id : (int) $wpdb->insert_id;

    update_pmpro_membership_level_meta( $level_id, 'confirmation_in_email', 1 );
    update_pmpro_membership_level_meta( $level_id, 'membership_account_message', $level_data['account_message'] );

    return $level_id;
}

$levels = array(
    array(
        'name'              => 'Consejo de Diosas',
        'description'       => 'Membresia mensual con acceso a la biblioteca privada, recursos y practicas continuas.',
        'confirmation'      => 'Ya estas dentro del Consejo de Diosas. Revisa tu correo y entra con tu cuenta para acceder a la biblioteca privada.',
        'account_message'   => 'Tu suscripcion al Consejo de Diosas esta activa.',
        'initial_payment'   => 39,
        'billing_amount'    => 39,
        'cycle_number'      => 1,
        'cycle_period'      => 'Month',
        'billing_limit'     => 0,
        'trial_amount'      => 0,
        'trial_limit'       => 0,
        'expiration_number' => 0,
        'expiration_period' => '',
    ),
    array(
        'name'              => 'Programa 3 Meses - Pago unico',
        'description'       => 'Acceso al programa inmersivo de 12 semanas con pago unico.',
        'confirmation'      => 'Tu plaza en el Programa de 3 Meses ha quedado reservada. Te enviaremos el siguiente paso por correo.',
        'account_message'   => 'Tienes acceso al Programa de 3 Meses en modalidad pago unico.',
        'initial_payment'   => 500,
        'billing_amount'    => 0,
        'cycle_number'      => 0,
        'cycle_period'      => '',
        'billing_limit'     => 0,
        'trial_amount'      => 0,
        'trial_limit'       => 0,
        'expiration_number' => 3,
        'expiration_period' => 'Month',
    ),
    array(
        'name'              => 'Programa 3 Meses - 3 pagos',
        'description'       => 'Acceso al programa inmersivo de 12 semanas en 3 pagos mensuales.',
        'confirmation'      => 'Tu plaza en el Programa de 3 Meses ha quedado reservada en modalidad de 3 pagos.',
        'account_message'   => 'Tienes acceso al Programa de 3 Meses en modalidad 3 pagos.',
        'initial_payment'   => 180,
        'billing_amount'    => 180,
        'cycle_number'      => 1,
        'cycle_period'      => 'Month',
        'billing_limit'     => 3,
        'trial_amount'      => 0,
        'trial_limit'       => 0,
        'expiration_number' => 3,
        'expiration_period' => 'Month',
    ),
);

$level_ids = array();

foreach ( $levels as $level ) {
    $level_ids[ $level['name'] ] = seramor_pmpro_upsert_level( $level );
}

update_option( 'pmpro_level_order', implode( ',', array_values( $level_ids ) ) );

WP_CLI::success( 'PMPro configurado para Seramor.' );
WP_CLI::line( 'Paginas creadas ahora: ' . ( empty( $created_pages ) ? '0' : implode( ', ', $created_pages ) ) );
foreach ( $level_ids as $level_name => $level_id ) {
    WP_CLI::line( $level_name . ': ' . $level_id );
}
WP_CLI::line( 'Checkout page ID: ' . (int) get_option( 'pmpro_checkout_page_id' ) );
WP_CLI::line( 'Login page ID: ' . (int) get_option( 'pmpro_login_page_id' ) );