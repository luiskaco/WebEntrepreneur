# 07_DECISIONS.md — Registro de Decisiones de Arquitectura (ADR)

## ADR 1: Uso de CPTs Nativos en vez de Page Builders o Plugins (ACF/Elementor)
- **Estado:** Aceptado.
- **Contexto:** Se busca un tema autoinstalable en hosting sin dependencias de plugins de pago o pesados.
- **Decisión:** Registrar CPTs nativos mediante código en `functions.php` y usar campos meta de WordPress estándar (`add_post_meta`).
- **Consecuencias:** Mayor velocidad, portabilidad completa del tema (se instala el zip y funciona de inmediato sin requerir plugins adicionales).

## ADR 2: Auto-aprovisionamiento al activar el tema
- **Estado:** Aceptado.
- **Contexto:** El usuario requiere que el tema cree automáticamente su estructura al ser activado.
- **Decisión:** Utilizar el hook `after_switch_theme` para generar páginas, menús y opciones.
- **Consecuencias:** Simplifica el onboarding. Si la página ya existe, no se sobrescribe para evitar pérdida de datos del cliente.
