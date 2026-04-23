# PLAN MAESTRO — Website Seramor (WordPress + Gutenberg)

## Referencias de diseño
- **ESTILO VISUAL → Canva** (imagenes/screenshots/canva-01..05.png) = FUENTE PRINCIPAL
- **Contenido/Estructura → Notion** (briefings, textos, arquitectura)
- **Referencia secundaria → seramor-circle.com** (solo para estructura/contenido, NO estilo)

## Estilo visual extraído de Canva
- **Paleta:** Verde bosque oscuro (#37432b), dorado cálido (#fce8a4), marron oscuro (#733015), blanco
- **Tipografía títulos:** Sans-serif uppercase con tracking amplio ("SERAMOR", "SORCHA CIRCLE")
- **Tipografía énfasis:** Script/cursiva italic para palabras clave ("Emprendedoras")
- **Tipografía cuerpo:** Serif elegante, claro sobre fondo oscuro
- **Fondos:** Fotos de naturaleza full-bleed (cenote, bosque, agua) con overlay oscuro
- **Logo principal:** Laberinto dorado circular (Sorcha Circle) + Mujer meditando con espiral (Seramor)
- **Botones:** Borde blanco/dorado redondeado, texto uppercase
- **Layout:** Hero full-width, secciones alternando verde oscuro / crema / imagen
- **Sensación:** Premium, orgánico, espiritual, terrenal, sofisticado

---

## FASE 0: INFRAESTRUCTURA
> Setup base antes de tocar cualquier página

- [ ] 0.1 Desactivar Elementor (no se usa, evita conflictos)
- [ ] 0.2 Obtener IDs de todas las páginas existentes via REST API
- [ ] 0.3 Subir imágenes seleccionadas al Media Library via REST API
- [ ] 0.4 Configurar Astra: colores de marca, tipografías, layout full-width, sin sidebar
- [ ] 0.5 Inyectar CSS global custom (botones dorados, secciones full-width, espaciados, tipografía)
- [ ] 0.6 Configurar menú de navegación con logo

## FASE 1: LANDING PAGE (HOME) — PRIMERA ENTREGA
> Prioridad máxima. Debe quedar en versión final.

### Secciones de la Landing (según Notion + estilo Canva):

- [ ] 1.1 **HERO** — Cover full-width
  - Foto Helena en naturaleza (cenote/bosque) como fondo
  - Overlay verde oscuro semi-transparente
  - Logo Seramor dorado centrado
  - Subtítulo: "Círculo de Mujeres Online"
  - Subtítulo 2: "Nature-Inspired Wellness & Healing Arts" (o versión ES)
  - CTA: "Descubre el Programa" → enlace a Programa 3 meses
  - Tipografía: título uppercase con tracking, subtítulo serif

- [ ] 1.2 **QUÉ ES SERAMOR** — Sección crema/clara
  - Columnas: imagen izq + texto der
  - Texto del Notion: "espacio de introspección para mujeres, reconexión, sanación juntas"
  - Foto de Helena/naturaleza
  - Estilo: fondo crema claro, texto verde oscuro (#37432b)

- [ ] 1.3 **MUJER CREADORA** — Sección verde oscuro
  - Intro al programa de 3 meses
  - Fondo verde bosque (#37432b)
  - Texto claro/dorado (#fce8a4)
  - "Un programa de 3 meses para mujeres que quieren construir con claridad y apoyo real"
  - CTA: "Conoce el Programa" → botón borde dorado

- [ ] 1.4 **QUÉ INCLUYE** — Sección crema
  - Grid/columnas con iconos o bullets dorados
  - Sesiones semanales, retiro mensual, comunidad, meditaciones, masterclass, cuaderno, grupo max 10
  - Estilo limpio, espaciado

- [ ] 1.5 **SOBRE HELENA** — Media + Text
  - Foto Helena + bio corta
  - "Facilitadora de círculos de mujeres, profesora de yoga, desde los 11 años en círculos"
  - Fondo alternado (verde oscuro o imagen de fondo)

- [ ] 1.6 **TESTIMONIOS** — Sección crema
  - Quotes de participantes (si hay disponibles)
  - Estilo: comillas doradas, texto serif italic
  - Si no hay testimonios reales: placeholder elegante

- [ ] 1.7 **FAQ** — Sección verde oscuro
  - 4 preguntas: ¿Cómo y cuándo se realiza cada ritual? ¿Recibiré grabación si no asisto? ¿Qué incluye el programa? ¿Qué debo preparar?
  - Estilo accordion/toggle

- [ ] 1.8 **CTA FINAL** — Cover con imagen
  - "¿Lista para transformar tu vida?"
  - Botón dorado al programa
  - Foto de fondo naturaleza

- [ ] 1.9 **FOOTER**
  - Logo Seramor
  - Links: Sobre nosotras, Programa, Contacto, Legales
  - Redes sociales (Instagram)
  - © 2026 Seramor

- [ ] 1.10 **REVISIÓN Y VALIDACIÓN**
  - Screenshot completo de la landing terminada
  - Validar responsive (mobile)
  - Validar que CTAs funcionan
  - Presentar a Cande para aprobación

## FASE 2: PÁGINAS INTERIORES (una por una, validando cada una)

### 2.1 Programa de 3 meses (VENTA — embudo cerrado)
- [ ] 2.1.1 Hero de compra con precio (500€, antes 600€)
- [ ] 2.1.2 Sección "Qué es"
- [ ] 2.1.3 Viaje de 3 meses (Mes1, Mes2, Mes3)
- [ ] 2.1.4 Qué incluye (detallado)
- [ ] 2.1.5 Sección precio + opciones de pago
- [ ] 2.1.6 Cierre de urgencia
- [ ] 2.1.7 FAQ específico del programa
- [ ] 2.1.8 SIN links salientes (embudo cerrado)
- [ ] 2.1.9 Revisión y validación

### 2.2 Sobre Seramor
- [ ] 2.2.1 Historia de Helena
- [ ] 2.2.2 Valores y enfoque
- [ ] 2.2.3 Fotos personales
- [ ] 2.2.4 Revisión y validación

### 2.3 Consejo de Diosas (membresía 39€/mes)
- [ ] 2.3.1 Instalar plugin de membresía
- [ ] 2.3.2 Hero + Qué es
- [ ] 2.3.3 Vista bloqueada/desbloqueada
- [ ] 2.3.4 Precio y registro
- [ ] 2.3.5 Pop-up acceso restringido
- [ ] 2.3.6 CTA secundarios al programa 3 meses
- [ ] 2.3.7 Revisión y validación

### 2.4 Servicios / Tienda
- [ ] 2.4.1 Catálogo de servicios
- [ ] 2.4.2 Revisión y validación

### 2.5 Contacto
- [ ] 2.5.1 Formulario simple
- [ ] 2.5.2 CTA Instagram/WhatsApp
- [ ] 2.5.3 Revisión y validación

### 2.6 Legales
- [ ] 2.6.1 Política de privacidad (RGPD)
- [ ] 2.6.2 Política de cookies
- [ ] 2.6.3 Revisión y validación

## FASE 3: FUNCIONALIDADES AVANZADAS

- [ ] 3.1 Sistema de pagos (WooCommerce o Stripe)
- [ ] 3.2 Membresía Consejo de Diosas (Paid Memberships Pro o similar)
- [ ] 3.3 Integración Mailchimp
- [ ] 3.4 SEO (Yoast o Rank Math)
- [ ] 3.5 Cookies/RGPD (CookieYes o similar)
- [ ] 3.6 Optimización responsive final
- [ ] 3.7 Velocidad y performance

---

## IDs DE PÁGINAS
| ID | Página | Slug |
|----|--------|------|
| 10 | Landing Page (HOME) | landing-page |
| 17 | Programa de 3 meses | programa-de-3-meses |
| 14 | Plataforma contenido suscripción | plataforma-de-contenido-por-suscripcion |
| 20 | Sobre Seramor | sobre-seramor |
| 12 | Servicios | catalogo-de-servicios |
| 22 | Contacta con nosotras | contacta-con-nosotras |
| 3  | Política de privacidad (borrador) | politica-privacidad |

- Front page: ID 10 (Landing Page)

## MÉTODO TÉCNICO
- **WP-CLI** (C:\xampp\htdocs\seramor\wp.bat) → plugins, opciones, settings, importar media
- **Playwright** (browser automation) → Astra customizer, configuraciones visuales
- **Edición directa** en C:\xampp\htdocs\seramor\ → archivos theme si hace falta
- Bloques Gutenberg: `wp:cover`, `wp:columns`, `wp:media-text`, `wp:buttons`, `wp:group`, `wp:separator`
- Screenshots con ruta absoluta para verificación

## CREDENCIALES
- WP Admin: admin_seramor / Salypimienta1.
- URL: http://localhost/seramor/wp-admin
- WP Path: C:\xampp\htdocs\seramor\
- WP-CLI: C:\xampp\htdocs\seramor\wp.bat

## ESTADO ACTUAL
- Fase 0: EN PROGRESO
  - [x] 0.1 Elementor desactivado
  - [x] 0.2 IDs de páginas obtenidos
- Fase 1: NO INICIADA
- Última actualización: 2026-04-20
