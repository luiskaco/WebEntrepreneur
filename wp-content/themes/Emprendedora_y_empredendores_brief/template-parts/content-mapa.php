<?php
/**
 * Mapa template part
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

<section id="mapa" data-screen-label="Mapa" style="padding:clamp(56px,8vw,90px) clamp(20px,6vw,56px); background:#FFF9FB; text-align:center;">
    <div class="eeReveal" style="max-width:1100px; margin:0 auto;">
      <p style="font-family:'Obviously Narrow',sans-serif; font-size:19px; margin:0 0 12px; font-weight:600; color:#7E579B; text-transform:uppercase; letter-spacing:1px;">Distribución del Evento</p>
      
      <!-- Separador decorativo con rombos -->
      <div style="display:flex; align-items:center; justify-content:center; gap:10px; margin:16px 0 24px;">
        <div style="width:4px; height:4px; background:#7E579B; transform:rotate(45deg);"></div>
        <div style="height:1.5px; background:rgba(126, 87, 155, 0.3); flex-grow:1; max-width:180px;"></div>
        <div style="width:8px; height:8px; background:#7E579B; transform:rotate(45deg);"></div>
        <div style="height:1.5px; background:rgba(126, 87, 155, 0.3); flex-grow:1; max-width:180px;"></div>
        <div style="width:4px; height:4px; background:#7E579B; transform:rotate(45deg);"></div>
      </div>
      
      <h2 style="font-family:'Obviously Narrow',sans-serif; font-weight:900; font-size:clamp(36px,5vw,52px); color:#4A3560; margin:0 0 40px; letter-spacing:1.5px; text-transform:uppercase;">Mapa de Stands</h2>
      
      <!-- Contenedor Flex para la Leyenda y el Mapa -->
      <div class="eeMapContainer">
        
        <!-- LEYENDA CODIFICADA -->
        <div style="flex:1; min-width:220px; max-width:320px; text-align:left; display:flex; flex-direction:column; justify-content:center; padding:10px; border-right:1px solid rgba(74,53,80,0.1); box-sizing:border-box;" class="eeLegendCol">
          <h3 style="font-family:'Bernard MT',serif; font-weight:bold; font-size:clamp(28px, 4vw, 36px); color:#4A3560; margin:0 0 28px; letter-spacing:1px; text-transform:uppercase;">LEYENDA:</h3>
          <div style="display:flex; flex-direction:column; gap:20px;">
            <!-- Escenario -->
            <div style="display:flex; align-items:center; gap:16px;">
              <div style="width:36px; height:36px; background:#E595BB; border-radius:4px; box-shadow:inset 0 0 0 1px rgba(0,0,0,0.05); flex-shrink:0;"></div>
              <span style="font-family:'Obviously Narrow',sans-serif; font-size:16px; font-weight:700; color:#7E579B; letter-spacing:0.5px; text-transform:uppercase;">Escenario</span>
            </div>
            <!-- Zona Jardín -->
            <div style="display:flex; align-items:center; gap:16px;">
              <div style="width:36px; height:36px; background:repeating-linear-gradient(45deg, #a4b3e6, #a4b3e6 4px, #8699d6 4px, #8699d6 8px); border-radius:4px; box-shadow:inset 0 0 0 1px rgba(0,0,0,0.05); flex-shrink:0;"></div>
              <span style="font-family:'Obviously Narrow',sans-serif; font-size:16px; font-weight:700; color:#7E579B; letter-spacing:0.5px; text-transform:uppercase;">Zona Jardín</span>
            </div>
            <!-- Zona Pabellón -->
            <div style="display:flex; align-items:center; gap:16px;">
              <div style="width:36px; height:36px; background:#fff; border:2px solid #E595BB; border-radius:4px; flex-shrink:0; box-shadow:inset 0 0 0 1px rgba(0,0,0,0.05);"></div>
              <span style="font-family:'Obviously Narrow',sans-serif; font-size:16px; font-weight:700; color:#7E579B; letter-spacing:0.5px; text-transform:uppercase;">Zona Pabellón</span>
            </div>
          </div>
        </div>
        
        <!-- MAPA -->
        <div style="flex:2; min-width:280px; display:flex; align-items:center; justify-content:center; box-sizing:border-box;" class="eeMapCol">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/mapa-eme.webp' ); ?>" alt="Mapa del evento" style="max-width:100%; height:auto; display:block; border-radius:16px; transition:transform 0.4s ease;" onmouseover="this.style.transform='scale(1.015)'" onmouseout="this.style.transform='scale(1)'" />
        </div>
        
      </div>
    </div>
    
    <style>
      .eeMapContainer {
        display:flex; 
        flex-direction:row; 
        align-items:stretch; 
        justify-content:center; 
        gap:32px; 
        flex-wrap:wrap; 
        background:#fff; 
        border-radius:32px; 
        padding:32px; 
        box-shadow:0 20px 40px rgba(74,53,80,0.08); 
        box-sizing:border-box;
      }
      @media (max-width: 768px) {
        .eeMapContainer {
          padding: 24px 16px !important;
          gap: 24px !important;
          border-radius: 20px !important;
        }
        .eeLegendCol {
          border-right: none !important;
          border-bottom: 1px solid rgba(74,53,80,0.1);
          padding-bottom: 24px !important;
          margin-bottom: 8px !important;
          max-width: 100% !important;
          width: 100% !important;
        }
        .eeMapCol {
          width: 100% !important;
          min-width: 100% !important;
        }
      }
    </style>
</section>
