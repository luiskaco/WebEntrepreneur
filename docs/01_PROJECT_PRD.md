# 01_PROJECT_PRD.md — Requisitos de Producto

## 1. Visión General
Crear un tema de WordPress premium y auto-instalable/auto-configurable a partir de la maqueta de "Empoderadas y Emprendedoras". El tema debe estar optimizado para velocidad, utilizando HTML5 semántico, JavaScript nativo (Vanilla JS) y CSS puro, sin frameworks pesados ni dependencias externas.

## 2. Objetivos Principales
- **Fácil Despliegue (Auto-configurable):** Al activar el tema en WordPress, debe auto-crearse la página de inicio estática, configurarse para que WordPress la muestre como frontpage, y crearse el menú con enlaces de anclaje (`#marcas`, `#agenda`, `#auspiciadores`).
- **Autogestionable:** Permitir al administrador editar los textos del Hero, el slider, el listado de marcas con sus categorías, la agenda (días y eventos con fotos/horas) y los auspiciadores, utilizando herramientas nativas de WordPress (Customizer o Custom Post Types nativos).
- **Rendimiento Excelente:** Carga rápida gracias a Vanilla JS y CSS nativo del tema.
- **Fidelidad Visual:** Mantener exactamente la estética, animaciones (reveal on scroll, header dinámico, menú móvil) y diseño responsive de la maqueta original.

## 3. Requisitos de Producto (Features)
1. **Header Sticky:** Transparente al inicio, fondo de color rosa al hacer scroll. Menú responsive móvil (hamburguesa).
2. **Hero Section:** Slider dinámico de testimonios/emprendedoras con polaroid rotada, badges decorativos, estadísticas dinámicas.
3. **Marcas Section:** Cuadrícula de marcas filtrable y paginada (o carrusel nativo), mostrando nombre, categoría e Instagram.
4. **Banner "Ingreso Libre":** Información de fecha y lugar personalizable.
5. **Agenda Section:** Tabs interactivos para alternar entre el 11 y 12 de Julio, mostrando eventos en formato de tarjetas con fotos y horas.
6. **Auspiciadores Section:** Grid de logotipos de marcas aliadas.
7. **Footer:** Enlaces de redes sociales, ubicación y copyright.
