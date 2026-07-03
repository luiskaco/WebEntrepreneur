<?php
/**
 * Footer template file
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 * @since 1.0.0
 */

// Evitar acceso directo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

  <!-- FOOTER -->
  <footer id="footer" data-screen-label="Footer" style="background:#D88BB6; color:#fff; padding:60px clamp(20px,6vw,56px) 24px; position:relative; overflow:hidden; font-family:'Atacama',sans-serif;">
    <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:40px; max-width:1100px; margin:0 auto;">
      
      <!-- Lado Izquierdo: Info de la Feria -->
      <div style="max-width:320px;">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/logo-empoderadas.png' ); ?>" alt="Empoderadas y Emprendedoras" style="height:38px; width:auto; display:block;" />
        <p style="font-size:17px; line-height:1.4; color:#fff; margin:16px 0 0; opacity:0.95;">La feria de emprendedoras y marcas femeninas de Lima.</p>
      </div>
      
      <!-- Lado Derecho: Redes y Ubicación -->
      <div style="text-align:right; min-width:200px;">
        <!-- Redes Sociales -->
        <div style="display:flex; gap:12px; margin-bottom:20px; justify-content:flex-end; flex-wrap:wrap;">
          <a href="https://www.facebook.com/profile.php?id=100092383076202" target="_blank" rel="noopener noreferrer" aria-label="Facebook" style="width:36px; height:36px; border-radius:50%; background:#fff; display:flex; align-items:center; justify-content:center; color:#D88BB6; font-weight:700; font-size:13px; text-decoration:none; box-shadow:0 4px 10px rgba(0,0,0,0.05); transition:transform 0.25s ease;" class="eeBtn">FB</a>
          <a href="https://www.instagram.com/eme.feriamujer/" target="_blank" rel="noopener noreferrer" aria-label="Instagram" style="width:36px; height:36px; border-radius:50%; background:#fff; display:flex; align-items:center; justify-content:center; color:#D88BB6; font-weight:700; font-size:13px; text-decoration:none; box-shadow:0 4px 10px rgba(0,0,0,0.05); transition:transform 0.25s ease;" class="eeBtn">IG</a>
        </div>
        
        <!-- Detalles Ubicación -->
        <div style="color:#fff;">
          <div style="font-weight:700; font-size:13px; letter-spacing:1.5px; text-transform:uppercase; opacity:0.9;">Ubicación</div>
          <div style="font-size:14px; opacity:0.95; margin-top:4px; font-weight:400;"><?php echo esc_html( get_theme_mod( 'banner_location_name', 'Country Club' ) ); ?>, San Isidro</div>
          <div style="font-size:14px; opacity:0.95; font-weight:400;">Lima, Perú</div>
        </div>
      </div>
      
    </div>
    
    <!-- Divisor y Copyright -->
    <div style="max-width:1100px; margin:0 auto;">
      <div style="width:100%; height:1px; background:rgba(255, 255, 255, 0.35); margin:32px 0 20px;"></div>
      <div style="text-align:center; font-size:15px; color:#fff; opacity:0.95; font-weight:500;">
        &copy; <?php echo date('Y'); ?> Empoderadas y Emprendedoras. Todos los derechos reservados.
      </div>
    </div>
  </footer>

<?php wp_footer(); ?>
</body>
</html>
