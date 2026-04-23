<?php
/**
 * Print the PMPro Stripe webhook URL for the current WordPress install.
 *
 * Run:
 * c:\xampp\php\php.exe c:\xampp\htdocs\seramor\wp-cli.phar eval-file c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\scripts\print-pmpro-stripe-webhook.php --path="c:\xampp\htdocs\seramor"
 */

if ( ! defined( 'ABSPATH' ) ) {
    WP_CLI::error( 'This script must run inside WordPress via WP-CLI.' );
}

$gateway = get_option( 'pmpro_gateway' );
$environment = get_option( 'pmpro_gateway_environment' );
$site_url = home_url( '/' );
$webhook_url = admin_url( 'admin-ajax.php' ) . '?action=stripe_webhook';

WP_CLI::line( 'PMPro gateway: ' . $gateway );
WP_CLI::line( 'PMPro environment: ' . $environment );
WP_CLI::line( 'Site URL: ' . $site_url );
WP_CLI::line( 'Stripe webhook URL: ' . $webhook_url );