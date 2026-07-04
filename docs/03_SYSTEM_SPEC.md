# 03_SYSTEM_SPEC.md — Especificaciones Técnicas

## 1. Tecnologías
- **Core:** WordPress 6.x+, PHP 8.0+.
- **CSS:** CSS puro nativo (`style.css` y `animations.css`), sin preprocesadores ni dependencias externas.
- **JS:** Vanilla JS (`animations.js` y scripts optimizados en el pie de página). Sin dependencias de jQuery en el frontend.
- **Base de Datos:** MySQL / MariaDB (Tablas nativas de WordPress para posts, postmeta y taxonomías).

## 2. Requerimientos de WordPress
- El tema debe registrar soporte para:
  - `post-thumbnails` (Imágenes destacadas para marcas, eventos y auspiciadores).
  - `menus` (Registro de la ubicación del menú de navegación del tema).
- Implementación de CPTs con soporte REST API (`show_in_rest => true`) para facilitar en el futuro cualquier consumo dinámico de datos.
- Desactivación de encolado de estilos innecesarios de Gutenberg en la landing para maximizar el rendimiento.
