# REVIEW.md — Revisiones y Auto-Auditorías de Código

## Auto-Auditoría T-TAROT-01 — Formulario Lectura de Tarot (/laferia/tarot)
**Fecha**: 2026-09-04 | **Estado**: APROBADO CON OBSERVACIONES

### AC verificados
- [x] Página interna accesible en `/laferia/tarot/` — cumple, verificado con curl (200) y en navegador.
- [x] Formulario captura nombre, celular y correo, con validación cliente y servidor — cumple (`page-tarot.php`, `empoderadas_guardar_registro_tarot()`).
- [x] Los envíos se guardan en WordPress como respaldo (CPT `registro_tarot`) — cumple, verificado con inserción real de prueba y limpieza posterior.
- [x] Sincronización con Google Sheets (Drive) implementada — cumple a nivel de código (JWT + REST API v4, sin librerías externas). NO probado contra la API real de Google porque aún no existen credenciales (ver Hallazgo #1).
- [x] Todo vía tema, sin plugins de terceros — cumple.
- [x] Página autoactivable al subir el tema a un hosting nuevo (sin pasos manuales) — cumple: se agregó auto-creación de páginas `laferia`/`tarot` y autocuración de permalinks/`.htaccess` en el hook de auto-configuración existente.
- [x] Secretos fuera del tema (nunca hardcodeados) — cumple: credenciales de Google se leen desde constantes en `wp-config.php` (no versionado), el tema solo referencia los nombres de las constantes.

### Hallazgos
#### OBSERVACIÓN
- **Archivo**: `wp-content/themes/Emprendedora_y_empredendores_brief/inc/tarot-lectura.php` | **Detalle**: La sincronización con Google Sheets depende de credenciales que Luis todavía no generó (`EMPODERADAS_GOOGLE_SA_EMAIL`, `EMPODERADAS_GOOGLE_SA_PRIVATE_KEY`, `EMPODERADAS_GOOGLE_SHEET_ID`). Mientras no existan, el formulario sigue funcionando (guarda en WordPress) pero cada registro queda marcado como "Pendiente" en el admin. No es un defecto de código — es un paso externo pendiente del lado de Luis. Acción: seguir la guía de configuración entregada en el chat; una vez cargadas las credenciales, usar el bulk action "Reintentar sincronización con Sheets" para reenviar los registros pendientes acumulados.
- **Archivo**: `wp-content/themes/Emprendedora_y_empredendores_brief/functions.php` (sección 6.0/6.0.1) | **Detalle**: Se detectó que el sitio tenía permalinks en modo "Plano" (bug preexistente, no introducido en esta tarea) — esto ya rompía `/marcas/` y cualquier URL anidada. Se corrigió como parte de esta entrega porque era un bloqueante directo para que `/laferia/tarot/` funcionara. Verificado en local: `/marcas/` pasó de 404 a 200 tras el fix.

### Próxima tarea
Pendiente para Luis: completar la configuración de Google Cloud (cuenta de servicio + Sheet) para activar la sincronización en vivo — pasos detallados entregados en el chat.
