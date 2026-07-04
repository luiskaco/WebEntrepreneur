# 02_SDD.md — Diseño del Sistema

## 1. Arquitectura del Tema WordPress
El tema se construirá utilizando la arquitectura estándar de temas de WordPress (ficheros clásicos), optimizada para el renderizado rápido de una Single Page Application/Landing Page autogestionada.

```mermaid
graph TD
    A[index.php / page-templates] --> B[header.php]
    A --> C[template-parts/content-hero.php]
    A --> D[template-parts/content-marcas.php]
    A --> E[template-parts/content-banner.php]
    A --> F[template-parts/content-agenda.php]
    A --> G[template-parts/content-auspiciadores.php]
    A --> H[footer.php]
    I[functions.php] -->|Auto-instalación/Configuración| J[Crear Página Frontal e Inicio Estático]
    I -->|Registro CPTs| K[Marcas, Agenda, Auspiciadores]
    I -->|Encolar Assets| L[style.css, animations.js, animations.css]
```

## 2. Componentes y Flujo de Datos
- **Customizer (Personalizador nativo):** Manejará variables globales del sitio (textos del Hero, estadísticas, información del banner de Ingreso Libre, redes sociales del footer).
- **Custom Post Types (CPT):**
  - `marca`: Cada expositora tendrá su foto destacada, nombre, categoría (taxonomía) y enlace a Instagram.
  - `evento_agenda`: Eventos de la agenda. Tendrán fecha (día), hora, tag, foto destacada y título.
  - `auspiciador`: Auspiciadores con su logo (imagen destacada) y nombre.
- **Auto-Configuración:** Al activar el tema, `functions.php` ejecutará código para crear la página de inicio, asignarla en la configuración de lectura, y crear y asociar el menú si no existen.
