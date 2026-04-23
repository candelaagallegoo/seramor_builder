# Stripe local y server para Seramor

Este proyecto tiene dos necesidades distintas:

1. Probar checkout y membresias en local.
2. Hacer que el mismo flujo funcione despues en el server.

## Lo que esta pasando ahora

- PMPro esta usando `stripe` en `sandbox`.
- Los pedidos de prueba se crean.
- Los pedidos quedan en estado `token`.
- No se crea ninguna fila en `wp_pmpro_memberships_users`.
- Eso significa que Stripe no esta confirmando el pago final a WordPress.
- La causa actual es webhook ausente o no alcanzable.

## Webhook que espera PMPro

PMPro Stripe usa esta forma de endpoint:

```text
https://tu-sitio/wp-admin/admin-ajax.php?action=stripe_webhook
```

Para esta instalacion puedes imprimir la URL exacta con:

```powershell
c:\xampp\php\php.exe c:\xampp\htdocs\seramor\wp-cli.phar eval-file c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\scripts\print-pmpro-stripe-webhook.php --path="c:\xampp\htdocs\seramor"
```

## Flujo correcto en local

`localhost` no es accesible desde Stripe, asi que el panel de Stripe por si solo no alcanza.

Tienes dos opciones validas:

1. Stripe CLI reenviando eventos al WordPress local.
2. Un tunel publico como `ngrok` o `cloudflared`, y usar esa URL publica como base del sitio mientras pruebas.

### Opcion A. Stripe CLI

Objetivo: que Stripe reciba eventos reales en test y los reenvie a tu WordPress local.

Pasos:

1. Instalar Stripe CLI.
2. Iniciar sesion con `stripe login`.
3. Ejecutar un listener reenviando al endpoint webhook de PMPro.
4. Repetir la compra de prueba.
5. Confirmar que el pedido deja de estar en `token` y se crea la membresia.

Comando base esperado:

```powershell
stripe listen --forward-to "https://localhost/seramor/wp-admin/admin-ajax.php?action=stripe_webhook"
```

Si tu HTTPS local da problemas por certificado, usa una URL publica de tunel o un entorno local con certificado confiable.

### Opcion B. Tunel publico

Objetivo: dar a Stripe una URL publica real mientras sigues trabajando localmente.

Pasos:

1. Levantar tunel a tu instalacion local.
2. Hacer que WordPress use temporalmente esa URL publica como `WP_HOME` y `WP_SITEURL` o equivalente.
3. Crear o reconstruir el webhook desde PMPro o Stripe apuntando a esa URL publica.
4. Repetir checkout de prueba.

## Flujo correcto en server

En el server ya no necesitas Stripe CLI si el sitio es publico.

Checklist:

1. El dominio debe responder por HTTPS real.
2. PMPro debe seguir usando `stripe`.
3. Debes crear o reconstruir el webhook en Stripe para el dominio del server.
4. El webhook debe apuntar al `admin-ajax.php?action=stripe_webhook` del server.
5. Deben estar activos los eventos que PMPro exige.

Eventos que PMPro espera:

- `invoice.created`
- `invoice.upcoming`
- `invoice.payment_succeeded`
- `invoice.payment_action_required`
- `customer.subscription.deleted`
- `charge.failed`
- `charge.refunded`
- `checkout.session.completed`
- `checkout.session.async_payment_succeeded`
- `checkout.session.async_payment_failed`

## Como validar que ya funciona

Despues de una compra de prueba correcta deberias ver:

1. Un pedido nuevo en `wp_pmpro_membership_orders` que ya no quede en `token`.
2. Una fila nueva en `wp_pmpro_memberships_users`.
3. La pagina `Mi cuenta` mostrando membresia activa.
4. Acceso permitido a las paginas restringidas.

## Regla de trabajo recomendada

No mezclar local y server en el mismo estado de Stripe.

- Local: claves test + Stripe CLI o tunel.
- Server staging: claves test + webhook real del staging.
- Server produccion: claves live + webhook live del dominio final.

## Lo minimo para no bloquearte ahora

Si quieres seguir construyendo mientras terminas Stripe:

1. Activa manualmente una membresia test a tu usuario para validar areas privadas.
2. Deja Stripe local resuelto con CLI o tunel.
3. Antes de pasar a server, repite un pago completo en staging.