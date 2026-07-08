# 06_TASKS.md — Backlog Activo

## In Progress
- [x] fix: imagen incorrecta en slider hero — causa: se sobrescribió accidentalmente la imagen del hero en lugar de la agenda.
- [x] fix: marcas card stretching — cause: grid defaults to align-items: stretch, causing card to fill 480px min-height when only one row exists
- [x] update: textos corregidos en banner, CTA y slider de ediciones.
- [x] fix: tipografía de letras con tilde (é, ó) cambiada a Oswald en CTA.
- [x] update: ocultada la sección "Nuestras ediciones" en index.php.
- [x] update: imagen del "Desfile de modas" actualizada en agenda y slide eliminado del hero.
- [x] fix: imagen de Johanna San Miguel no se actualizaba en la agenda — causa: en la base de datos de WordPress el archivo enlazado era `9.webp` y `10.webp`, no `johanna-san-miguel.webp`.
## 1. Fase de Configuración Inicial [ ]
- [ ] Crear estructura básica de tema WordPress (`style.css`, `index.php`, `header.php`, `footer.php`, `functions.php`).
- [ ] Mover assets estáticos (`animations.css`, `animations.js`, `logo-empoderadas.png`) a la estructura del tema.

## 2. Fase de Lógica y Base de Datos [ ]
- [ ] Registrar CPTs (`marca`, `evento_agenda`, `auspiciador`) y taxonomía `categoria_marca`.
- [ ] Crear el script de auto-instalación en `functions.php` (hook `after_switch_theme`) para crear páginas, configurar la home y crear el menú con anchors.

## 3. Fase de Integración Visual (Maquetación en PHP) [ ]
- [ ] Implementar el `header.php` adaptando el nav estático y encolando estilos/scripts.
- [ ] Crear `template-parts/content-hero.php` interactivo cargando dinámicamente las expositoras y testimonios desde WordPress.
- [ ] Crear `template-parts/content-marcas.php` consultando el CPT `marca` con filtros en Vanilla JS.
- [ ] Crear `template-parts/content-banner.php` cargando dinámicamente textos desde el Customizer.
- [ ] Crear `template-parts/content-agenda.php` con tabs interactivos consultando el CPT `evento_agenda`.
- [ ] Crear `template-parts/content-auspiciadores.php` consultando el CPT `auspiciador`.
- [x] Integrar logos reales de auspiciadores (`logo-mason.png` y `logo-wolsvagen.png`) copiados al core del tema y configurados en `content-auspiciadores.php`.
- [x] Agregar la sección de Mapa (`template-parts/content-mapa.php`) después de la Agenda con la imagen `mapa.webp`.
- [ ] Crear `footer.php` dinámico.

## 4. Fase de Pruebas y QA [ ]
- [ ] Validar rendimiento en PageSpeed.
- [ ] Probar la auto-instalación activando y desactivando el tema en WordPress local.
