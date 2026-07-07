<?php
/**
 * Sponsors template part
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 * @since 1.0.0
 */

// Evitar acceso directo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sponsors_query = new WP_Query( array(
    'post_type'      => 'auspiciador',
    'posts_per_page' => -1,
    'post_status'    => 'publish'
) );

$sponsors = array();
if ( $sponsors_query->have_posts() ) {
    while ( $sponsors_query->have_posts() ) {
        $sponsors_query->the_post();
        $sponsors[] = array(
            'id' => get_the_ID(),
            'name' => get_the_title(),
            'logo' => get_the_post_thumbnail_url( get_the_ID(), 'medium' ) ? get_the_post_thumbnail_url( get_the_ID(), 'medium' ) : empoderadas_get_placeholder_svg( 260, 110, 'Auspiciador' )
        );
    }
    wp_reset_postdata();
} else {
    // Fallbacks si no hay datos creados
    $sponsors = array(
        array( 'id' => 1, 'name' => 'VOLKSWAGEN', 'logo' => get_template_directory_uri() . '/assets/images/logo-volkswagen.webp' ),
        array( 'id' => 2, 'name' => 'MASON NATURAL', 'logo' => get_template_directory_uri() . '/assets/images/logo-mason.webp' ),
        array( 'id' => 3, 'name' => 'LOA', 'logo' => get_template_directory_uri() . '/assets/images/logo-loa.webp' )
    );
}
?>
<style>
@keyframes floatSponsor {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-6px); }
    100% { transform: translateY(0px); }
}
.ee-sponsor-logo {
    transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    animation: floatSponsor 4s ease-in-out infinite;
    will-change: transform;
}
.ee-sponsor-logo:hover {
    animation-play-state: paused;
    transform: scale(1.1) translateY(-4px);
}
</style>

<section id="auspiciadores" data-screen-label="Auspiciadores" style="padding:clamp(56px,8vw,80px) clamp(20px,6vw,56px); background:#A99FC5; color:#fff;">
    <div class="eeReveal" style="text-align:center; margin-bottom:48px;">
      <p style="font-family:'Times New Roman', Times, serif; color:#fff; font-size:22px; margin:0 0 8px; opacity:0.95;">Gracias a quienes hacen posible la feria</p>
      <h2 style="font-family:'Obviously Narrow',sans-serif; font-weight:900; font-size:clamp(40px,6vw,64px); color:#fff; margin:0; letter-spacing:1px; text-transform:uppercase;">AUSPICIADORES</h2>
    </div>
    
    <div style="display:flex; flex-direction:column; align-items:center; gap:48px; max-width:800px; margin:0 auto;">
      
      <?php if( !empty($sponsors[0]) ): ?>
      <!-- Sponsor Principal -->
      <div class="eeReveal" style="display:flex; justify-content:center; width:100%;">
         <img src="<?php echo esc_url( $sponsors[0]['logo'] ); ?>" alt="Logo <?php echo esc_attr( $sponsors[0]['name'] ); ?>" class="ee-sponsor-logo" style="max-width:160px; width:100%; height:auto; object-fit:contain; mix-blend-mode:multiply;" />
      </div>
      <?php endif; ?>

      <?php if( count($sponsors) > 1 ): ?>
      <!-- Sponsors Secundarios -->
      <div class="eeReveal" style="display:flex; justify-content:center; align-items:center; gap:40px; flex-wrap:wrap; width:100%;">
        <?php for($i=1; $i<count($sponsors); $i++): ?>
          <?php 
            // Aplicar multiply a jpeg/jpg para quitar fondo blanco si lo tienen
            $blend = (strpos($sponsors[$i]['logo'], '.jpg') !== false || strpos($sponsors[$i]['logo'], '.jpeg') !== false) ? 'mix-blend-mode:multiply;' : ''; 
          ?>
          <img src="<?php echo esc_url( $sponsors[$i]['logo'] ); ?>" alt="Logo <?php echo esc_attr( $sponsors[$i]['name'] ); ?>" class="ee-sponsor-logo" style="max-width:140px; height:auto; object-fit:contain; <?php echo $blend; ?>" />
        <?php endfor; ?>
      </div>
      <?php endif; ?>

      <!-- Imagen Adicional de Café Centrada por debajo de los logos -->
      <div class="eeReveal" style="display:flex; justify-content:center; width:100%; margin-top:20px;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/cafe-auspiciador.png' ); ?>" alt="Auspiciador Café" class="ee-sponsor-logo" style="max-width:250px; height:auto; object-fit:contain;" />
      </div>

    </div>
</section>
