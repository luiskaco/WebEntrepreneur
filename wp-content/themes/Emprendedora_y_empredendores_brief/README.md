# Empoderadas y Emprendedoras

Landing page de una sola página para "Empoderadas y Emprendedoras", una feria de emprendedoras y marcas femeninas en Lima. Estilo elegante, femenino, cálido y aspiracional.

## Estructura

- `index.html` — Markup y lógica de la página (hero, marcas, agenda, auspiciadores, footer).
- `animations.css` — Animaciones y transiciones (reveal on scroll, header sticky/transparente, hamburguesa móvil, etc.).
- `animations.js` — Observers e interacciones (scroll reveal, cambio de color del header, menú móvil).
- `image-slot.js` / `support.js` — Utilidades de soporte para los placeholders de imagen y el runtime del componente.
- `logo-empoderadas.png` — Logo de marca.
- `uploads/` — Brief y capturas de referencia del diseño.
- `scraps/` — Recursos gráficos de apoyo.

## Secciones de la página

1. **Header** — Fijo, transparente sobre el hero y con color rosa al hacer scroll. Incluye menú hamburguesa en móvil.
2. **Hero** — Degradado rosa-morado, tarjeta polaroid con carrusel de testimonios.
3. **Marcas** — Carrusel horizontal de expositoras.
4. **Agenda** — Tabs por día (11 y 12 de julio) con lista de actividades.
5. **Auspiciadores** — Grid de logos.
6. **Footer** — Enlaces, redes sociales y ubicación.

## Cómo verlo localmente

Sirve la carpeta con cualquier servidor estático, por ejemplo:

```bash
npx http-server -p 5500 -c-1
```

Luego abre `http://localhost:5500/index.html`.
