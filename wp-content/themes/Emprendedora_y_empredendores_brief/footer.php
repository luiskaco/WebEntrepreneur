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
  <footer id="footer" class="footer-section" data-screen-label="Footer">
    <div class="footer-container">
      
      <!-- Lado Izquierdo: Info de la Feria -->
      <div class="footer-info-col">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/logo-empoderadas.png' ); ?>" alt="Empoderadas y Emprendedoras" class="footer-logo" />
        <p class="footer-desc">La feria de emprendedoras y marcas femeninas de Lima.</p>
      </div>
      
      <!-- Lado Derecho: Redes y Ubicación -->
      <div class="footer-links-col">
        <!-- Redes Sociales -->
        <div class="footer-socials">
          <a href="https://www.facebook.com/profile.php?id=100092383076202" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="footer-social-btn eeBtn">FB</a>
          <a href="https://www.instagram.com/eme.feriamujer/" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="footer-social-btn eeBtn">IG</a>
        </div>
        
        <!-- Detalles Ubicación -->
        <div class="footer-location">
          <div class="footer-loc-title">Ubicación</div>
          <div class="footer-loc-addr"><?php echo esc_html( get_theme_mod( 'banner_location_name', 'Country Club' ) ); ?>, San Isidro</div>
          <div class="footer-loc-city">Lima, Perú</div>
        </div>
      </div>
      
    </div>

<style>
.footer-section {
    background: #D88BB6;
    color: #fff;
    padding: 60px clamp(20px, 6vw, 56px) 24px;
    position: relative;
    overflow: hidden;
    font-family: 'Atacama', sans-serif;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 40px;
    max-width: 1100px;
    margin: 0 auto;
}

.footer-info-col {
    max-width: 320px;
}

.footer-logo {
    height: 38px;
    width: auto;
    display: block;
}

.footer-desc {
    font-size: 17px;
    line-height: 1.4;
    color: #fff;
    margin: 16px 0 0;
    opacity: 0.95;
}

.footer-links-col {
    text-align: right;
    min-width: 200px;
}

.footer-socials {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
    justify-content: flex-end;
    flex-wrap: wrap;
}

.footer-social-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #D88BB6 !important;
    font-weight: 700;
    font-size: 13px;
    text-decoration: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: transform 0.25s ease;
}

.footer-loc-title {
    font-weight: 700;
    font-size: 13px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    opacity: 0.9;
}

.footer-loc-addr, .footer-loc-city {
    font-size: 14px;
    opacity: 0.95;
    font-weight: 400;
}

.footer-loc-addr {
    margin-top: 4px;
}

/* Responsividad para móviles */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 30px;
    }

    .footer-info-col {
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 100%;
    }

    .footer-logo {
        margin: 0 auto;
    }

    .footer-desc {
        text-align: center;
    }

    .footer-links-col {
        text-align: center;
        width: 100%;
    }

    .footer-socials {
        justify-content: center;
    }
}
</style>
    
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
