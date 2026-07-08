<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main" style="min-height: 80vh; display: flex; align-items: center; justify-content: center; background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-hero.webp' ); ?>'); background-size: cover; background-position: center; position: relative;">
    
    <!-- Overlay semitransparente para mantener la legibilidad -->
    <div style="position: absolute; inset: 0; background: rgba(255, 255, 255, 0.85);"></div>

    <div style="position: relative; z-index: 2; text-align: center; padding: 40px 20px; max-width: 600px; margin: 0 auto;">
        
        <h1 style="font-family: 'Anton', sans-serif; font-size: clamp(80px, 20vw, 150px); color: #E18EBB; margin: 0; line-height: 1; text-shadow: 0 10px 30px rgba(225,142,187,0.3);">404</h1>
        
        <h2 style="font-family: 'Oswald', sans-serif; font-size: clamp(24px, 5vw, 36px); font-weight: 700; color: #4A3560; margin: 20px 0; text-transform: uppercase;">¡Ups! Te saliste de la feria</h2>
        
        <p style="font-family: sans-serif; font-size: 16px; color: #666; margin-bottom: 40px; line-height: 1.6;">
            La página que buscas no existe o ha sido movida. Regresa al inicio para seguir descubriendo el talento de nuestras emprendedoras.
        </p>
        
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="eeBtn" style="display: inline-flex; align-items: center; justify-content: center; background: #8F77B4; color: #fff; padding: 16px 36px; border-radius: 50px; font-family: 'Oswald', sans-serif; font-weight: 600; font-size: 18px; text-decoration: none; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 8px 24px rgba(143,119,180,0.4); transition: all 0.3s ease;">
            Volver al Inicio
        </a>
    </div>
</main>

<style>
    .eeBtn:hover {
        background: #E18EBB !important;
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(225,142,187,0.5) !important;
    }
</style>

<?php
get_footer();
