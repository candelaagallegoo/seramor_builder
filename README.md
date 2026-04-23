# Website Builder Workspace — Seramor

Workspace de trabajo para construir el sitio web de **Seramor** (WordPress + Gutenberg, tema Astra) de forma asistida por IA.

No es el sitio en sí: es el **entorno de construcción** (planes, scripts, recursos visuales y screenshots) que se usa para generar y desplegar el sitio remoto vía REST API.

## Estructura

- `docs/` — Plan maestro, accesos, deploy, links de referencia.
- `imagenes/` — Recursos visuales: assets de Canva, logos, fotos, screenshots de progreso.
- `scripts/` — Scripts PHP/PowerShell para construir landings, configurar Astra, subir imágenes e inyectar CSS contra la WP REST API.

## Stack

- WordPress + Gutenberg (bloques nativos)
- Tema Astra
- Automatización vía WP REST API (PHP + PowerShell)
- Playwright MCP para screenshots / verificación visual

## Punto de entrada

Ver [docs/plans/plan-maestro.md](docs/plans/plan-maestro.md) para el plan de fases y prioridades.
