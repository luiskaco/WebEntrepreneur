<?php
/**
 * Banner Info template part
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 * @since 1.0.0
 */

// Evitar acceso directo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Obtener datos globales del Customizer
$banner_title = get_theme_mod( 'banner_title', 'Ingreso Libre' );
$location_name = get_theme_mod( 'banner_location_name', 'Country Club' );
$location_address = get_theme_mod( 'banner_location_address', 'Ca. Los Eucaliptos 590, San Isidro' );
$banner_dates = get_theme_mod( 'banner_dates', '11-12 Julio' );

// Separar las fechas por un guión o espacio para dar formato visual como la maqueta
$dates_parts = explode(' ', $banner_dates);
$days = isset($dates_parts[0]) ? $dates_parts[0] : '11-12';
$month = isset($dates_parts[1]) ? $dates_parts[1] : 'Julio';
?>

<section id="ingreso-libre" data-screen-label="Ingreso Libre" style="background:linear-gradient(135deg, #CFACDF 0%, #9B79B9 100%); position:relative; overflow:hidden; color:#fff; padding:60px 20px;">
    <!-- Imagen de la izquierda (Pájaro 1) -->
    <div class="eeRevealBird" style="position:absolute; left:clamp(24px, 5vw, 90px); bottom:0; top:0; width:clamp(80px, 18vw, 220px); pointer-events:none; z-index:1;">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/uploads/pajaro-1.webp' ); ?>" alt="Flores e ilustración izquierda" style="width:100%; height:100%; object-fit:contain; display:block; object-position: left bottom;" />
    </div>
    
    <!-- Contenido central -->
    <div class="eeReveal" style="max-width:900px; margin:0 auto; text-align:center; position:relative; z-index:2;">
      <h2 style="font-family:'Bernard MT',sans-serif; font-size:clamp(48px, 7vw, 84px); margin:0; text-transform:uppercase; letter-spacing:3px; line-height:1.1; font-weight:bold; color:#fff; text-shadow:0 3px 6px rgba(74,53,80,0.2);"><?php echo esc_html( $banner_title ); ?></h2>
      
      <!-- Separador decorativo con rombos -->
      <div style="display:flex; align-items:center; justify-content:center; gap:10px; margin:20px 0 28px;">
        <div style="width:4px; height:4px; background:#fff; transform:rotate(45deg);"></div>
        <div style="height:1px; background:rgba(255, 255, 255, 0.6); flex-grow:1; max-width:240px;"></div>
        <div style="width:8px; height:8px; background:#fff; transform:rotate(45deg);"></div>
        <div style="height:1px; background:rgba(255, 255, 255, 0.6); flex-grow:1; max-width:240px;"></div>
        <div style="width:4px; height:4px; background:#fff; transform:rotate(45deg);"></div>
      </div>
      
      <!-- Bloque de detalles flexible -->
      <div class="eeBannerFlex" style="display:flex; align-items:center; justify-content:center; gap:32px;">
        <!-- Ubicación -->
        <div style="flex:1.2; text-align:right; min-width:200px;">
          <div style="font-family:'Obviously Narrow',sans-serif; font-weight:600; font-size:15px; text-transform:uppercase; letter-spacing:1.5px; opacity:0.9;">Te esperamos en el</div>
          <div style="font-family:'Atacama',sans-serif; font-size:clamp(28px, 4vw, 36px); font-weight:bold; line-height:1.1; margin:6px 0 8px; color: #fff;"><?php echo esc_html( $location_name ); ?></div>
          <div style="font-family:'Obviously Narrow',sans-serif; font-size:13px; letter-spacing:0.5px; opacity:0.85; font-weight:400;"><?php echo esc_html( $location_address ); ?></div>
        </div>
        
        <!-- Divisor vertical -->
        <div class="eeBannerDivider" style="width:1.5px; height:75px; background:rgba(255, 255, 255, 0.45); align-self:center;"></div>
        
        <!-- Fecha -->
        <div style="flex:1; text-align:left; min-width:140px; font-family:'Bernard MT',sans-serif; font-weight:bold;">
          <div style="font-size:clamp(38px, 5vw, 48px); line-height:0.95; text-transform:uppercase; letter-spacing:1px; color:#fff;"><?php echo esc_html( $days ); ?></div>
          <div style="font-size:clamp(28px, 4vw, 34px); line-height:1; margin-top:4px; color:#fff;"><?php echo esc_html( $month ); ?></div>
        </div>
      </div>
    </div>

    <!-- Imagen de la derecha (Pájaro 2) -->
    <div class="eeRevealBird" style="position:absolute; right:clamp(24px, 5vw, 90px); bottom:0; top:0; width:clamp(80px, 18vw, 220px); pointer-events:none; z-index:1;">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/uploads/pajaro-2.webp' ); ?>" alt="Flores e ilustración derecha" style="width:100%; height:100%; object-fit:contain; display:block; object-position: right bottom;" />
    </div>
</section>
