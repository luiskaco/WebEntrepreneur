# 08_CHANGELOG.md — Historial de Versiones

## [1.1.0] - 2026-09-04
### Añadido
- Página autoactivable `/laferia/tarot/` (`page-tarot.php`) para reservar turno de lectura de tarot (nombre, celular, correo).
- CPT `registro_tarot` como respaldo en WordPress y sincronización en vivo con Google Sheets vía cuenta de servicio de Google (JWT + REST API, sin librerías externas) en `inc/tarot-lectura.php`.
- Exportación CSV y bulk action "Reintentar sincronización con Sheets" en el listado de admin de Registros Tarot.
- Auto-creación de las páginas `laferia` (contenedor, redirige a Inicio) y `tarot` en el hook de auto-configuración del tema, para que la URL exista sin pasos manuales al subir el tema a un hosting nuevo.

### Arreglado
- Los permalinks del sitio estaban en modo "Plano" (sin reglas en `.htaccess`), lo que rompía `/marcas/` y cualquier URL anidada. Se agregó autocuración: el tema fuerza `/%postname%/` y regenera el bloque de WordPress en `.htaccess` si falta, sin depender de la detección nativa de mod_rewrite del hosting.

## [1.0.0-rc1] - 2026-07-03
### Añadido
- Documentación inicial del proyecto (`01_PROJECT_PRD.md` a `08_CHANGELOG.md`).
- Propuesta de estructura del tema autogestionable y autoinstalable.
- Planificación del pase de maqueta estática a tema dinámico de WordPress.

## [1.0.0-rc2] - 2026-07-07
### Añadido
- Nuevo exponente dinámico en la agenda (Ileana Tapia) vía inserción de base de datos.
- Subida y vinculación de imagen destacada (.webp) para el exponente.

### Cambiado
- Rediseño de sección `content-auspiciadores.php` según mockup.
- Agregada animación flotante con efecto hover (`ee-sponsor-logo`) para los logos.
- Ajuste del tamaño del logo principal a 160px.
- Ajuste del orden cronológico en la query de `evento_agenda`.

### Arreglado
- Parse error de PHP en la línea 40 de `content-auspiciadores.php` corregido.
