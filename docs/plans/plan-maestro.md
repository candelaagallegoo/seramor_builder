# PLAN MAESTRO — Website Seramor (WordPress + Gutenberg)

## Referencias activas
- Estilo visual: Canva dentro de imagenes/canvas/latest
- Contenido y arquitectura: Notion + definiciones de la sesión
- Base técnica: WordPress 6.9.4 + Astra 4.12.6 + mu-plugin propio

## Estado real del proyecto
- Landing v6 publicada en la página 10 con footer nuevo, links portables por __HOME__ y media resuelta por wp-image-ID.
- Fixes globales ya aplicados: color primario Astra forzado a wine, fondo interior corregido a bone, header global wine, footer global dark.
- Portabilidad ya resuelta en runtime desde el mu-plugin:
  - Imágenes reescritas por class wp-image-N
  - Links internos reescritos desde __HOME__
- Stripe decidido: integración vía Paid Memberships Pro + Stripe API keys de test recibidas en docs/integraciones.md.
- Bloques públicos en curso: Programa 3 meses y Consejo de Diosas.

## Fase 0 — Infraestructura
- [x] Elementor desactivado
- [x] IDs principales identificados
- [x] Astra configurado v2 con paleta correcta
- [x] Mu-plugin cargado para tipografías, overrides y portabilidad
- [x] Landing responsive con assets portables
- [ ] PMPro instalado y configurado
- [ ] Stripe test conectado al checkout real

## Fase 1 — Landing page (ID 10)
- [x] Hero final
- [x] Bloques Soltar / Conectar / Crecer
- [x] Sobre Helena
- [x] Cards de acceso a ofertas
- [x] Qué es Seramor
- [x] Testimonios
- [x] Footer publicado
- [x] Validación desktop
- [x] Validación responsive básica

## Fase 2 — Páginas públicas clave

### 2.1 Programa de 3 meses (ID 17)
- [x] Guion visual definido desde Canva anterior
- [x] Hero de venta con precio visible
- [x] Sección esto es para ti si
- [x] Viaje de 3 meses
- [x] Qué incluye
- [x] FAQ base
- [x] CTA internos sin fuga de embudo
- [ ] Checkout real conectado
- [ ] Validación final con captura

### 2.2 Consejo de Diosas pública (ID 14)
- [x] Hero con precio y CTA principal
- [x] Explicación breve
- [x] Biblioteca teaser bloqueada por categorías
- [x] Sección qué encontrarás dentro
- [x] Bloque de acceso con login / registro
- [x] CTA secundario al programa 3 meses
- [ ] Suscripción real conectada
- [ ] Pop-up de acceso restringido
- [ ] Validación final con captura

### 2.3 Sobre Seramor (ID 20)
- [ ] Refinar copy y layout final

### 2.4 Servicios / Tienda (ID 12)
- [ ] Revisar necesidad real dentro del embudo

### 2.5 Contacto (ID 22)
- [ ] Ajustar formulario y CTA final

### 2.6 Legales (ID 3 y faltantes)
- [ ] Política de privacidad final
- [ ] Cookies / RGPD

## Fase 3 — Membresía y acceso privado
- [ ] Instalar Paid Memberships Pro
- [ ] Configurar Stripe test
- [ ] Crear niveles:
  - Consejo de Diosas — 39 EUR/mes
  - Programa 3M pago único — 500 EUR
  - Programa 3M plazos — 3 x 180 EUR
- [ ] Crear páginas operativas: login, registro, checkout, cuenta, confirmación, niveles
- [ ] Reemplazar CTAs placeholder por checkout real
- [ ] Crear biblioteca privada del Consejo
- [ ] Restringir acceso por nivel
- [ ] Añadir estados de acceso y pop-ups restringidos

## IDs de páginas
| ID | Página | Slug |
|----|--------|------|
| 10 | Landing Page (HOME) | landing-page |
| 17 | Programa de 3 meses | programa-de-3-meses |
| 14 | Plataforma contenido suscripción | plataforma-de-contenido-por-suscripcion |
| 20 | Sobre Seramor | sobre-seramor |
| 12 | Servicios | catalogo-de-servicios |
| 22 | Contacta con nosotras | contacta-con-nosotras |
| 3 | Política de privacidad | politica-privacidad |

## Método técnico en uso
- Publicación de páginas por scripts PHP en scripts/
- Ejecución por WP-CLI sobre c:\xampp\htdocs\seramor
- Estilos globales y fixes en wp-content/mu-plugins/seramor-site-runtime.php
- Validación visual con screenshots locales

## Credenciales de entorno local
- WP Admin: admin_seramor / Salypimienta1.
- URL: http://localhost/seramor/wp-admin
- WP Path: c:\xampp\htdocs\seramor
- WP-CLI: c:\xampp\htdocs\seramor\wp-cli.phar

## Siguiente bloque operativo
1. Publicar y validar Programa 3 meses.
2. Publicar y validar Consejo de Diosas pública.
3. Instalar PMPro y conectar Stripe test.
4. Crear biblioteca privada y restricciones.

Última actualización: 2026-04-23
