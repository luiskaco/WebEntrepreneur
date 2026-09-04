# 06_TASKS.md — Backlog Activo

## In Progress
- [x] feat: página `/laferia/tarot/` con formulario de reserva (nombre, celular, correo) — se guarda como respaldo en WordPress (CPT `registro_tarot`) y se sincroniza en vivo con Google Sheets (Drive) vía cuenta de servicio. Nuevos archivos: `page-tarot.php`, `inc/tarot-lectura.php`. Pendiente: Luis debe crear la cuenta de servicio de Google Cloud y cargar las credenciales en `wp-config.php` para activar la sincronización (el formulario funciona igual mientras tanto, guardando solo en WordPress).
- [x] update: modal de confirmación en `/laferia/tarot/` ("¡Gracias por tu suscripción!... nos contactaremos en la brevedad") tras enviar el formulario, con el form limpiándose automáticamente.
- [x] update: `/laferia/tarot/` ahora es una landing standalone — se ocultó el header/menú compartido, se quitó el texto "Empoderadas y Emprendedoras" del hero, y se usa `assets/images/bg-tarot.webp` (provista por Luis) como fondo del hero.
- [x] update: logo `assets/images/logo-alina.png` (provisto por Luis) agregado sobre el título "Reserva tu Lectura de Tarot".
- [x] update: se quitó el overlay del hero (imagen a color real); el badge blanco del logo se retiró (Luis pidió quitar el fondo) dejando el logo con drop-shadow.
- [x] update: aviso de urgencia rediseñado como banner tipo promo ("RESERVA YA / CUPOS LIMITADOS / Antes que se agoten los turnos de la feria") movido debajo del formulario, con colores normalizados a la paleta de marca (morado #4A3560 + rosa #e28fae).
- [x] update: footer propio para `/laferia/tarot/` (ya no usa `get_footer()`/`footer.php` del sitio general) — logo `assets/images/logo-la-feria.png` (provisto por Luis) en blanco, enlaces a Instagram (instagram.com/la.feria) y TikTok (@la.feria.barranco) y copyright "La Feria".
- [x] fix: permalinks en modo "Plano" causaban 404 en `/marcas/` y páginas anidadas — se agregó autocuración en `functions.php` que fuerza `/%postname%/` y regenera `.htaccess` si falta el bloque de WordPress.
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
