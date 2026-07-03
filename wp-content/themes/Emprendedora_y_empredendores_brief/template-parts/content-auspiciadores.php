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
    'status'         => 'publish'
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
        array( 'id' => 1, 'name' => 'VOLKSWAGEN', 'logo' => empoderadas_get_placeholder_svg( 260, 110, 'VOLKSWAGEN' ) ),
        array( 'id' => 2, 'name' => 'MASON NATURAL', 'logo' => empoderadas_get_placeholder_svg( 260, 110, 'MASON' ) )
    );
}
?>

<section id="auspiciadores" data-screen-label="Auspiciadores" style="padding:clamp(56px,8vw,80px) clamp(20px,6vw,56px); background:#A596C5; color:#fff;">
    <div class="eeReveal" style="text-align:center; margin-bottom:48px;">
      <p style="font-family:'Atacama',sans-serif; color:#fff; font-size:19px; margin:0 0 8px; opacity:0.95;">Gracias a quienes hacen posible la feria</p>
      <h2 style="font-family:'Obviously Narrow',sans-serif; font-weight:700; font-size:clamp(36px,5vw,48px); color:#fff; margin:0; letter-spacing:1px; text-transform:uppercase;">Auspiciadores</h2>
    </div>
    <div style="display:flex; justify-content:center; gap:32px; flex-wrap:wrap; max-width:640px; margin:0 auto;">
      
      <?php foreach ( $sponsors as $sponsor ) : ?>
        <div class="eeReveal eeCard" style="background:#fff; border-radius:16px; overflow:hidden; width:260px; box-shadow:0 12px 30px rgba(74,53,80,0.18); display:flex; flex-direction:column;">
          <div style="padding:32px 24px; display:flex; align-items:center; justify-content:center; height:110px; background:#fff; box-sizing:border-box;">
            <img src="<?php echo esc_url( $sponsor['logo'] ); ?>" alt="Logo <?php echo esc_attr( $sponsor['name'] ); ?>" style="max-width:100%; max-height:100%; object-fit:contain; display:block;" />
          </div>
          <div style="background:#D88BB6; color:#fff; font-family:'Gotham Narrow',sans-serif; font-weight:900; font-size:16px; text-align:center; padding:14px 10px; text-transform:uppercase; letter-spacing:1px;">
            <?php echo esc_html( $sponsor['name'] ); ?>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
</section>
