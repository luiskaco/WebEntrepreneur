# 05_ARCHITECTURE.md — Decisiones Arquitectónicas

## 1. Patrón de Auto-Configuración
Para garantizar un despliegue de "cero clics" al subir el tema al hosting:
- Usamos el hook `after_switch_theme` de WordPress.
- Verificamos si existe una página con el slug `inicio` o `home`. Si no existe, la creamos mediante `wp_insert_post()`.
- Configuramos `show_on_front` como `page` y `page_on_front` con el ID de la página creada.
- Verificamos si existe un menú asignado a la ubicación del tema (`primary`). Si no existe, creamos un menú llamado "Menú Principal", añadimos los enlaces personalizados (`#marcas`, `#agenda`, `#auspiciadores`), y lo asociamos con la ubicación del tema (`primary`) usando `set_theme_mod('nav_menu_locations', ...)`.

## 2. Gestión de Contenido
- Elegimos Custom Post Types (CPT) en lugar de bloques de Gutenberg complejos o plugins de terceros para:
  1. Mantener la ligereza y velocidad de carga extrema.
  2. Ofrecer una experiencia de usuario limpia en el backend de WordPress (el administrador simplemente va a "Marcas > Añadir Nueva", "Agenda > Añadir Nuevo", etc.).
- Las opciones globales que cambian rara vez (textos del Hero, banner de fecha) se gestionan mediante el WordPress Customizer nativo bajo una sección llamada "Ajustes de la Feria".
