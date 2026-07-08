<?php
/**
 * Hero template part
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 * @since 1.0.0
 */
// Obtener datos globales del Customizer
$hero_title = get_theme_mod( 'hero_title', 'Descubre las marcas que están transformando Lima' );
$hero_description = get_theme_mod( 'hero_description', 'Más que una feria, el evento que reúne lo mejor del talento femenino peruano' );
$stat1_num = get_theme_mod( 'hero_stat_1_num', '+100' );
$stat1_txt = get_theme_mod( 'hero_stat_1_txt', 'Marcas' );
if ( $stat1_txt === 'Marcas y experiencias' ) {
    $stat1_txt = 'Marcas';
}
$stat2_num = get_theme_mod( 'hero_stat_2_num', '+8MIL' );
$stat2_txt = get_theme_mod( 'hero_stat_2_txt', 'Asistentes' );

// Datos de slides estáticos del Hero usando las 15 imágenes reales copiadas
$uploads_hero_url = get_template_directory_uri() . '/uploads/hero/';
$slides = array(
    array( 'id' => 1, 'name' => 'Andrea Llosa', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'andrea_llosa.webp' ),
    array( 'id' => 2, 'name' => 'Astrid Gutsche', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'astrid_gutsche.webp' ),
    array( 'id' => 3, 'name' => 'Cynthia Calderon', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'cynthia_calderon.webp' ),
    array( 'id' => 4, 'name' => 'Diana Crousillat', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'diana_crousillat.webp' ),
    array( 'id' => 5, 'name' => 'Francisca Aronsson', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'francisca_aronsson.webp' ),
    array( 'id' => 6, 'name' => 'Ileana Tapia', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'ileana_tapia.webp' ),
    array( 'id' => 7, 'name' => 'Johanna San Miguel', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'johanna_san_miguel.webp' ),
    array( 'id' => 8, 'name' => 'Leslie Stewart', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'leslie_stewart.webp' ),
    array( 'id' => 9, 'name' => 'Mariana Vértiz', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'mariana_vertiz.webp' ),
    array( 'id' => 10, 'name' => 'Marina Mora', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'marina_mora.webp' ),
    array( 'id' => 11, 'name' => 'Mavila Huertas', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'mavila_huertas.webp' ),
    array( 'id' => 12, 'name' => 'Miranda Salaverry', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'miranda_salaverry.webp' ),
    array( 'id' => 13, 'name' => 'Moni Villar', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'moni_villar.webp' ),
    array( 'id' => 14, 'name' => 'Nea Paz', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'nea_paz.webp' ),
    array( 'id' => 15, 'name' => 'Sandra Sevil', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'sandra_sevil.webp' ),
    array( 'id' => 16, 'name' => 'Wendy Wunder', 'subtitle' => 'Expositora', 'img' => $uploads_hero_url . 'wendy_wunder.webp' )
);
?>

<section id="hero" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-hero.webp' ); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; position:relative; overflow:hidden;">
  <div style="padding:clamp(110px,11vw,140px) clamp(20px,6vw,56px) clamp(90px,12vw,140px); max-width:1280px; margin:0 auto; display:flex; align-items:center; gap:clamp(28px,5vw,60px); flex-wrap:wrap;">
    
    <div class="eeHeroFade" style="flex:1.1; min-width:300px; position:relative; z-index:2;">
      <h1 style="margin:0 0 28px; line-height:0.95; color:#fff; text-transform:uppercase; font-weight:400;">
        <span style="font-family:'Obviously Narrow',sans-serif; font-size:clamp(20px,3vw,36px); letter-spacing:1px; display:block; white-space:nowrap;">Descubre las marcas que están</span>
        <span style="font-family:'Golden Hopes',cursive; text-transform:none; font-size:clamp(38px,6vw,68px); color:#fff; display:inline-block; margin-top:8px; margin-left:10px; letter-spacing:1px; font-weight:normal;">transformando Lima</span>
      </h1>
      
      <div style="background:#D88BB6; color:#fff; font-family:'Gotham Narrow',sans-serif; font-weight:500; font-size:clamp(16px,2vw,19px); line-height:1.3; padding:18px 24px; border-radius:12px; max-width:480px; margin-bottom:40px; box-shadow:0 8px 20px rgba(0,0,0,0.05);">
        <?php echo esc_html( $hero_description ); ?>
      </div>
      
      <div style="display:flex; gap:28px; flex-wrap:wrap; font-family:'Obviously Narrow',sans-serif;">
        <div>
          <div style="font-weight:900; font-size:clamp(64px,9vw,90px); color:#fff; line-height:1;">
            +<span class="ee-counter" data-target="100">0</span>
          </div>
          <div style="background:#6CBCE0; color:#fff; font-weight:600; font-size:15px; text-transform:uppercase; padding:6px 12px; border-radius:2px; display:inline-block; margin-top:12px; letter-spacing:0.5px;"><?php echo esc_html( $stat1_txt ); ?></div>
        </div>
        <div>
          <div style="font-weight:900; font-size:clamp(64px,9vw,90px); color:#fff; line-height:1;">
            +<span class="ee-counter" data-target="8">0</span><span style="font-size:clamp(40px,6vw,56px);">MIL</span>
          </div>
          <div style="background:#6CBCE0; color:#fff; font-weight:600; font-size:15px; text-transform:uppercase; padding:6px 12px; border-radius:2px; display:inline-block; margin-top:12px; letter-spacing:0.5px;"><?php echo esc_html( $stat2_txt ); ?></div>
        </div>
      </div>
    </div>

    <!-- Carrusel Polaroid Interactiva -->
    <div class="eeHeroFadeDelay" style="flex:1; min-width:280px; display:flex; justify-content:center; position:relative; z-index:2; max-width:100%;">
      <div class="eeHeroImgWrap" style="position:relative; padding:18px; background:#fff; border-radius:24px; box-shadow:0 30px 60px rgba(74,53,80,0.45), 0 12px 36px rgba(74,53,80,0.25); transform:rotate(-5deg); width:min(380px,80vw); overflow:visible;">
        <div style="position:relative; width:100%; aspect-ratio:380/460; border-radius:16px; overflow:hidden; background:linear-gradient(135deg, #CFACDF 0%, #9B79B9 100%);">
          
          <?php foreach ( $slides as $index => $slide ) : 
              $name_parts = explode(' ', $slide['name']);
              $first_name = isset($name_parts[0]) ? $name_parts[0] : '';
              unset($name_parts[0]);
              $last_name = implode(' ', $name_parts);
          ?>
            <div class="ee-hero-slide" data-slide-index="<?php echo $index; ?>" style="position:absolute; inset:0; display:<?php echo $index === 0 ? 'block' : 'none'; ?>;">
              <img src="<?php echo esc_url( $slide['img'] ); ?>" alt="<?php echo esc_attr( $slide['name'] ); ?>" style="width:100%; height:100%; display:block; object-fit:cover;" />
              <div style="display:block; position:absolute; inset:0; background:linear-gradient(to top, rgba(74,53,80,0.5) 0%, rgba(74,53,80,0.15) 25%, transparent 40%); pointer-events:none;"></div>
              
              <div style="display:block; position:absolute; bottom:24px; left:0; width:100%; text-align:center; padding:0 20px; box-sizing:border-box; z-index:2;">
                <div style="font-family:'Anton',sans-serif; font-size:clamp(30px, 7vw, 42px); line-height:0.95; color:#fff; text-shadow:0 2px 6px rgba(0,0,0,0.2); text-transform:uppercase; letter-spacing:0.5px;">
                  <?php echo esc_html( $first_name ); ?><br><?php echo esc_html( $last_name ); ?>
                </div>
                <div style="display:none; font-family:'Obviously Narrow',sans-serif; font-weight:500; font-size:12px; color:rgba(255,255,255,0.9); letter-spacing:2px; margin-top:8px; text-transform:uppercase;">
                  <?php echo esc_html( $slide['subtitle'] ); ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
        
        <button id="ee-hero-prev" class="eeBtn" style="position:absolute; left:-20px; top:210px; width:42px; height:42px; border-radius:50%; border:none; background:#fff; box-shadow:0 8px 20px rgba(143,119,180,0.3); color:#8F77B4; font-size:18px; cursor:pointer; z-index:4;">‹</button>
        <button id="ee-hero-next" class="eeBtn" style="position:absolute; right:-20px; top:210px; width:42px; height:42px; border-radius:50%; border:none; background:#fff; box-shadow:0 8px 20px rgba(143,119,180,0.3); color:#8F77B4; font-size:18px; cursor:pointer; z-index:4;">›</button>
        
        <!-- Badge "Nuestras expositoras" -->
        <div style="position:absolute; bottom:-14px; left:50%; transform:translateX(-50%) rotate(-3deg); background:#BCE3E6; color:#7E579B; font-family:'Obviously Narrow',sans-serif; font-weight:700; font-size:18px; padding:10px 32px; border-radius:4px; box-shadow:0 6px 16px rgba(126,87,155,0.22); white-space:nowrap; z-index:6;">
          Nuestras expositoras
        </div>
      </div>
    </div>
    
    <div style="position:absolute; inset:0; background:radial-gradient(circle at 15% 85%, rgba(255,255,255,0.12), transparent 40%); pointer-events:none;"></div>
  </div>
</section>

<script>
    // Lógica del Slider Hero en Vanilla JS
    document.addEventListener('DOMContentLoaded', function() {
        var slides = document.querySelectorAll('.ee-hero-slide');
        var currentSlide = 0;
        var totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach(function(slide, i) {
                slide.style.display = i === index ? 'block' : 'none';
            });
        }

        var prevBtn = document.getElementById('ee-hero-prev');
        var nextBtn = document.getElementById('ee-hero-next');

        if (prevBtn && nextBtn && totalSlides > 0) {
            prevBtn.addEventListener('click', function() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(currentSlide);
            });

            nextBtn.addEventListener('click', function() {
                currentSlide = (currentSlide + 1) % totalSlides;
                showSlide(currentSlide);
            });

            // Rotación automática cada 4 segundos
            setInterval(function() {
                currentSlide = (currentSlide + 1) % totalSlides;
                showSlide(currentSlide);
            }, 4000);
        }

        // Animación de Contadores
        var counters = document.querySelectorAll('.ee-counter');
        var animated = false;

        function startCounters() {
            if (animated) return;
            animated = true;
            counters.forEach(function(counter) {
                var target = parseInt(counter.getAttribute('data-target'));
                var count = 0;
                var speed = Math.max(10, Math.floor(1500 / target)); // durar aprox 1.5s
                
                var timer = setInterval(function() {
                    count++;
                    counter.innerText = count;
                    if (count >= target) {
                        counter.innerText = target;
                        clearInterval(timer);
                    }
                }, speed);
            });
        }

        // Detectar visibilidad con IntersectionObserver
        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function(entries) {
                if (entries[0].isIntersecting) {
                    startCounters();
                    observer.disconnect();
                }
            }, { threshold: 0.1 });
            var heroSection = document.getElementById('hero');
            if (heroSection) observer.observe(heroSection);
        } else {
            // Fallback sin observer
            setTimeout(startCounters, 500);
        }
    });
</script>
