<?php
/**
 * Agenda template part
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 * @since 1.0.0
 */

// Evitar acceso directo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Consultar eventos para el Día 11
$query_11 = new WP_Query( array(
    'post_type'  => 'evento_agenda',
    'meta_key'   => '_evento_dia',
    'meta_value' => '11',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order'      => 'ASC'
) );

$events_11 = array();
if ( $query_11->have_posts() ) {
    while ( $query_11->have_posts() ) {
        $query_11->the_post();
        $title_parts = explode(' ', get_the_title());
        $first_word = !empty($title_parts[0]) ? $title_parts[0] : 'Feria';
        $img_url = get_the_post_thumbnail_url( get_the_ID(), 'large' ) ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : empoderadas_get_placeholder_svg( 110, 110, $first_word );
        
        $events_11[] = array(
            'id' => get_the_ID(),
            'time' => get_post_meta( get_the_ID(), '_evento_hora', true ) ? get_post_meta( get_the_ID(), '_evento_hora', true ) : '12:00 pm',
            'title' => get_the_title(),
            'tag' => get_post_meta( get_the_ID(), '_evento_tag', true ) ? get_post_meta( get_the_ID(), '_evento_tag', true ) : 'Conversatorio',
            'color' => '#6CBCE0', 
            'img' => $img_url
        );
    }
    wp_reset_postdata();
} else {
    // Fallbacks
    $events_11 = array(
        array( 'id' => '11-1', 'time' => '12:30 p.m.', 'title' => 'Diana Crousillart - Fundación Oli', 'tag' => 'Conversatorio', 'color' => '#6CBCE0', 'img' => empoderadas_get_placeholder_svg( 110, 110, 'Diana' ) ),
        array( 'id' => '11-2', 'time' => '01:00 p.m.', 'title' => 'Sandra - Funder : Shophie Crown', 'tag' => 'Conversatorio', 'color' => '#E18EBB', 'img' => empoderadas_get_placeholder_svg( 110, 110, 'Sandra' ) ),
    );
}

// Consultar eventos para el Día 12
$query_12 = new WP_Query( array(
    'post_type'  => 'evento_agenda',
    'meta_key'   => '_evento_dia',
    'meta_value' => '12',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order'      => 'ASC'
) );

$events_12 = array();
if ( $query_12->have_posts() ) {
    while ( $query_12->have_posts() ) {
        $query_12->the_post();
        $title_parts = explode(' ', get_the_title());
        $first_word = !empty($title_parts[0]) ? $title_parts[0] : 'Feria';
        $img_url = get_the_post_thumbnail_url( get_the_ID(), 'large' ) ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : empoderadas_get_placeholder_svg( 110, 110, $first_word );
        
        $events_12[] = array(
            'id' => get_the_ID(),
            'time' => get_post_meta( get_the_ID(), '_evento_hora', true ) ? get_post_meta( get_the_ID(), '_evento_hora', true ) : '12:00 pm',
            'title' => get_the_title(),
            'tag' => get_post_meta( get_the_ID(), '_evento_tag', true ) ? get_post_meta( get_the_ID(), '_evento_tag', true ) : 'Conversatorio',
            'color' => '#E18EBB',
            'img' => $img_url
        );
    }
    wp_reset_postdata();
} else {
    // Fallbacks
    $events_12 = array(
        array( 'id' => '12-1', 'time' => '03:30 p.m.', 'title' => 'Francisca Aronsson', 'tag' => 'Conversatorio', 'color' => '#6CBCE0', 'img' => empoderadas_get_placeholder_svg( 110, 110, 'Francisca' ) ),
        array( 'id' => '12-2', 'time' => '04:00 p.m.', 'title' => 'Andrea Llosa', 'tag' => 'Conversatorio', 'color' => '#E18EBB', 'img' => empoderadas_get_placeholder_svg( 110, 110, 'Andrea' ) ),
        array( 'id' => '12-3', 'time' => '05:00 p.m.', 'title' => 'Ileana Tapia', 'tag' => 'Conversatorio', 'color' => '#6CBCE0', 'img' => empoderadas_get_placeholder_svg( 110, 110, 'Ileana' ) ),
    );
}

// Asignar colores alternados a los eventos 11
foreach ($events_11 as $k => $ev) {
    $events_11[$k]['color'] = ($k % 2 === 0) ? '#6CBCE0' : '#E18EBB';
}
// Asignar colores alternados a los eventos 12
foreach ($events_12 as $k => $ev) {
    $events_12[$k]['color'] = ($k % 2 === 0) ? '#6CBCE0' : '#E18EBB';
}
// Determinar qué día de la agenda debe estar activo por defecto según la fecha actual del servidor
$current_day = wp_date( 'j' );
$default_day = ( $current_day == 12 ) ? '12' : '11';

// Definir colores para botones activos y pasivos
$active_bg = '#8F77B4';
$inactive_bg = '#C5B8D8';
?>

<section id="agenda" data-screen-label="Agenda" style="padding:clamp(56px,8vw,90px) clamp(20px,6vw,56px); background:#CBE8EB;">
    <div class="eeReveal" style="text-align:center;">
      <p style="font-family:'Obviously Narrow',sans-serif; font-size:19px; margin:0 0 12px; font-weight:600; color:#7E579B;">Dos días para conectar, aprender y crecer</p>
      
      <!-- Separador decorativo con rombos -->
      <div style="display:flex; align-items:center; justify-content:center; gap:10px; margin:16px 0 24px;">
        <div style="width:4px; height:4px; background:#fff; transform:rotate(45deg);"></div>
        <div style="height:1.5px; background:rgba(255, 255, 255, 0.7); flex-grow:1; max-width:180px;"></div>
        <div style="width:8px; height:8px; background:#fff; transform:rotate(45deg);"></div>
        <div style="height:1.5px; background:rgba(255, 255, 255, 0.7); flex-grow:1; max-width:180px;"></div>
        <div style="width:4px; height:4px; background:#fff; transform:rotate(45deg);"></div>
      </div>
      
      <h2 style="font-family:'Obviously Narrow',sans-serif; font-weight:900; font-size:clamp(36px,5vw,52px); color:#fff; margin:0; letter-spacing:1.5px; text-transform:uppercase; text-shadow:0 2px 4px rgba(74,53,80,0.08);">Agenda</h2>
      <div style="font-family:'Obviously Narrow',sans-serif; font-size:18px; letter-spacing:0.5px; color:#fff; font-weight:500; margin-top:8px;">11:30am – 9:00pm</div>
    </div>

    <!-- Contenedor general de la agenda -->
    <div style="max-width:760px; margin:40px auto 0;">
      <!-- Tabs de selección de día -->
      <div style="display:flex; justify-content:center; gap:16px; margin-bottom:32px;">
        <button id="tab-btn-11" class="eeBtn" style="font-family:'Obviously Narrow',sans-serif; font-weight:700; font-size:16px; letter-spacing:1px; padding:10px 24px; border-radius:100px; border:none; cursor:pointer; text-transform:uppercase; box-shadow:0 4px 10px rgba(0,0,0,0.06); transition:all 0.25s ease; background:<?php echo ( $default_day == '11' ) ? $active_bg : $inactive_bg; ?>; color:#fff;">11 Julio</button>
        <button id="tab-btn-12" class="eeBtn" style="font-family:'Obviously Narrow',sans-serif; font-weight:700; font-size:16px; letter-spacing:1px; padding:10px 24px; border-radius:100px; border:none; cursor:pointer; text-transform:uppercase; box-shadow:0 4px 10px rgba(0,0,0,0.06); transition:all 0.25s ease; background:<?php echo ( $default_day == '12' ) ? $active_bg : $inactive_bg; ?>; color:#fff;">12 Julio</button>
      </div>
      
      <!-- Listado de eventos del Día 11 -->
      <div id="agenda-content-11" class="eeReveal" style="background:#F8E7F0; border-radius:32px; padding:32px clamp(12px, 4vw, 36px); box-shadow:0 16px 40px rgba(143,119,180,0.05); box-sizing:border-box; display: <?php echo ( $default_day == '11' ) ? 'block' : 'none'; ?>;">
        <?php foreach ( $events_11 as $item ) : ?>
          <div class="eeAgendaCard" style="position:relative; display:flex; align-items:center; margin-bottom:24px; padding:0 12px; width:100%; box-sizing:border-box;">
            <div class="eeAgendaBg" style="position:absolute; left:0; right:0; top:12px; bottom:12px; background:<?php echo esc_attr( $item['color'] ); ?>; border-radius:12px; z-index:1; transform-origin:center;"></div>
            <div style="position:relative; display:flex; align-items:stretch; width:100%; z-index:2; gap:16px;">
              <div style="width:110px; height:110px; border-radius:12px; overflow:hidden; flex-shrink:0; box-shadow:0 8px 20px rgba(0,0,0,0.15); background:#fff; margin:0;">
                <img src="<?php echo esc_url( $item['img'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" style="width:100%; height:100%; object-fit:cover; display:block;" />
              </div>
              <div class="eeAgendaContent" style="background:#fff; border-radius:16px; padding:18px 24px; flex-grow:1; display:flex; flex-direction:column; justify-content:center; position:relative; box-shadow:0 8px 24px rgba(0,0,0,0.06); text-align:left; box-sizing:border-box; transition: box-shadow 0.4s ease;">
                <div class="eeAgendaDot" style="position:absolute; left:-10px; top:50%; transform:translateY(-50%); width:20px; height:20px; border-radius:50%; background:<?php echo esc_attr( $item['color'] ); ?>; z-index:3; transform-origin:center;"></div>
                <div class="eeAgendaDot" style="position:absolute; right:-10px; top:50%; transform:translateY(-50%); width:20px; height:20px; border-radius:50%; background:<?php echo esc_attr( $item['color'] ); ?>; z-index:3; transform-origin:center;"></div>
                <div style="font-family:'Obviously Narrow',sans-serif; font-size:14px; color:#8F77B4; font-weight:600; opacity:0.95; padding-left:8px;"><?php echo esc_html( $item['time'] ); ?></div>
                <div style="font-family:'Oswald',sans-serif; font-size:18px; font-weight:700; color:#000; margin-top:4px; line-height:1.2; letter-spacing:0.3px; padding-left:8px;"><?php echo esc_html( $item['title'] ); ?></div>
                <div style="font-family:'Gotham Narrow',sans-serif; font-style:italic; font-size:16px; color:#8F77B4; margin-top:6px; font-weight:normal; padding-left:8px;"><?php echo esc_html( $item['tag'] ); ?></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Listado de eventos del Día 12 -->
      <div id="agenda-content-12" class="eeReveal" style="background:#F8E7F0; border-radius:32px; padding:32px clamp(12px, 4vw, 36px); box-shadow:0 16px 40px rgba(143,119,180,0.05); box-sizing:border-box; display: <?php echo ( $default_day == '12' ) ? 'block' : 'none'; ?>;">
        <?php foreach ( $events_12 as $item ) : ?>
          <div class="eeAgendaCard" style="position:relative; display:flex; align-items:center; margin-bottom:24px; padding:0 12px; width:100%; box-sizing:border-box;">
            <div class="eeAgendaBg" style="position:absolute; left:0; right:0; top:12px; bottom:12px; background:<?php echo esc_attr( $item['color'] ); ?>; border-radius:12px; z-index:1; transform-origin:center;"></div>
            <div style="position:relative; display:flex; align-items:stretch; width:100%; z-index:2; gap:16px;">
              <div style="width:110px; height:110px; border-radius:12px; overflow:hidden; flex-shrink:0; box-shadow:0 8px 20px rgba(0,0,0,0.15); background:#fff; margin:0;">
                <img src="<?php echo esc_url( $item['img'] ); ?>" alt="<?php echo esc_attr( $item['title'] ); ?>" style="width:100%; height:100%; object-fit:cover; display:block;" />
              </div>
              <div class="eeAgendaContent" style="background:#fff; border-radius:16px; padding:18px 24px; flex-grow:1; display:flex; flex-direction:column; justify-content:center; position:relative; box-shadow:0 8px 24px rgba(0,0,0,0.06); text-align:left; box-sizing:border-box; transition: box-shadow 0.4s ease;">
                <div class="eeAgendaDot" style="position:absolute; left:-10px; top:50%; transform:translateY(-50%); width:20px; height:20px; border-radius:50%; background:<?php echo esc_attr( $item['color'] ); ?>; z-index:3; transform-origin:center;"></div>
                <div class="eeAgendaDot" style="position:absolute; right:-10px; top:50%; transform:translateY(-50%); width:20px; height:20px; border-radius:50%; background:<?php echo esc_attr( $item['color'] ); ?>; z-index:3; transform-origin:center;"></div>
                <div style="font-family:'Obviously Narrow',sans-serif; font-size:14px; color:#8F77B4; font-weight:600; opacity:0.95; padding-left:8px;"><?php echo esc_html( $item['time'] ); ?></div>
                <div style="font-family:'Oswald',sans-serif; font-size:18px; font-weight:700; color:#000; margin-top:4px; line-height:1.2; letter-spacing:0.3px; padding-left:8px;"><?php echo esc_html( $item['title'] ); ?></div>
                <div style="font-family:'Gotham Narrow',sans-serif; font-style:italic; font-size:16px; color:#8F77B4; margin-top:6px; font-weight:normal; padding-left:8px;"><?php echo esc_html( $item['tag'] ); ?></div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
</section>

<script>
    // Interacción de Tabs Agenda en Vanilla JS
    document.addEventListener('DOMContentLoaded', function() {
        var btn11 = document.getElementById('tab-btn-11');
        var btn12 = document.getElementById('tab-btn-12');
        var content11 = document.getElementById('agenda-content-11');
        var content12 = document.getElementById('agenda-content-12');

        if (btn11 && btn12 && content11 && content12) {
            btn11.addEventListener('click', function() {
                // Activar día 11
                btn11.style.background = '#8F77B4';
                btn12.style.background = '#C5B8D8';
                content11.style.display = 'block';
                content12.style.display = 'none';
            });

            btn12.addEventListener('click', function() {
                // Activar día 12
                btn12.style.background = '#8F77B4';
                btn11.style.background = '#C5B8D8';
                content12.style.display = 'block';
                content11.style.display = 'none';
            });
        }
    });
</script>
