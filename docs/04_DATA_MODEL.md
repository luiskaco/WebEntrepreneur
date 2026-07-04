# 04_DATA_MODEL.md — Esquema y Entidades

## 1. Entidades WordPress (Custom Post Types)

### A. Marcas (`marca`)
- **Título:** Nombre de la marca.
- **Imagen Destacada:** Foto del producto o de la marca.
- **Taxonomía `categoria_marca`:** Categoría (ej. Moda, Joyería, Gastronomía).
- **Postmeta:**
  - `_marca_instagram`: URL del perfil de Instagram (string).

### B. Agenda (`evento_agenda`)
- **Título:** Título de la actividad.
- **Imagen Destacada:** Foto de la ponente o expositora.
- **Postmeta:**
  - `_evento_hora`: Hora del evento (ej. "11:30 am").
  - `_evento_tag`: Subtítulo o etiqueta descriptiva (ej. "Taller Práctico").
  - `_evento_dia`: Día del evento (ej. "11" o "12").

### C. Auspiciadores (`auspiciador`)
- **Título:** Nombre del auspiciador.
- **Imagen Destacada:** Logo del auspiciador.

## 2. Variables de Configuración Global (WP Customizer)
Manejadas a través de `theme_mods`:
- `hero_title`: Título del Hero.
- `hero_description`: Descripción rosa del Hero.
- `hero_stat_1_num` / `hero_stat_1_txt`: Primera estadística (ej. "+100" y "Marcas").
- `hero_stat_2_num` / `hero_stat_2_txt`: Segunda estadística (ej. "+8MIL" y "Asistentes").
- `banner_title`: Título del banner central ("Ingreso Libre").
- `banner_location_name`: Nombre del lugar ("Country Club").
- `banner_location_address`: Dirección del lugar.
- `banner_dates`: Rango de fechas (ej. "11-12 Julio").
