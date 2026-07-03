<?php
/**
 * Brands template part
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 * @since 1.0.0
 */

// Evitar acceso directo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Consultar todas las marcas
$marcas_query = new WP_Query( array(
    'post_type'      => 'marca',
    'posts_per_page' => -1,
    'status'         => 'publish'
) );

$brands_data = array();
$colors = array( '#8F77B4', '#E18EBB', '#6CBCE0', '#F8BCAA' );

if ( $marcas_query->have_posts() ) {
    $idx = 0;
    while ( $marcas_query->have_posts() ) {
        $marcas_query->the_post();
        $cats = get_the_terms( get_the_ID(), 'categoria_marca' );
        $cat_name = ! empty( $cats ) ? $cats[0]->name : 'Feria';
        $instagram = get_post_meta( get_the_ID(), '_marca_instagram', true );

        $brands_data[] = array(
            'id' => get_the_ID(),
            'name' => get_the_title(),
            'category' => $cat_name,
            'instagram' => $instagram ? $instagram : 'https://www.instagram.com',
            'bg' => $colors[$idx % count($colors)],
            'img' => get_the_post_thumbnail_url( get_the_ID(), 'medium' ) ? get_the_post_thumbnail_url( get_the_ID(), 'medium' ) : empoderadas_get_placeholder_svg( 260, 200, 'Marca' )
        );
        $idx++;
    }
    wp_reset_postdata();
} else {
    // Fallbacks originales de la maqueta si no hay marcas registradas en WP
    $fallbacks = array(
        array( 'name' => 'ALBA', 'category' => 'Ropa', 'instagram' => 'https://www.instagram.com/alba.peru' ),
        array( 'name' => 'ALMA A MANO', 'category' => 'Manualidades', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'ALMA BRUJA', 'category' => 'Manualidades', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'AMARETTI', 'category' => 'Joyería', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'AMARRA', 'category' => 'Accesorio celular', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'AME', 'category' => 'Accesorio', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'ÁNIMA', 'category' => 'Joyería', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'AURELIA', 'category' => 'Velas', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'BÁLSAMO', 'category' => 'Aromas', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'BAUMANN', 'category' => 'Café', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'CACAO LIMA', 'category' => 'Repostería', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'DULCE ALMA', 'category' => 'Repostería', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'ELEMENTAL', 'category' => 'Cosmética', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'FLORALIA', 'category' => 'Florería', 'instagram' => 'https://www.instagram.com' ),
        array( 'name' => 'GEMA', 'category' => 'Joyería', 'instagram' => 'https://www.instagram.com' )
    );

    foreach ( $fallbacks as $k => $f ) {
        $brands_data[] = array(
            'id' => $k + 1,
            'name' => $f['name'],
            'category' => $f['category'],
            'instagram' => $f['instagram'],
            'bg' => $colors[$k % count($colors)],
            'img' => empoderadas_get_placeholder_svg( 260, 200, $f['name'] )
        );
    }
}
?>

<section id="marcas" data-screen-label="Marcas" style="padding:clamp(56px,8vw,90px) clamp(20px,6vw,56px); background:#FFF9FB;">
    <div style="max-width:1280px; margin:0 auto;">
      
      <!-- Cabecera de la sección (Título + Buscador) -->
      <div style="display:flex; justify-content:space-between; align-items:flex-end; flex-wrap:wrap; gap:24px; margin-bottom:48px;">
        <div class="eeReveal">
          <h2 style="font-family:'Obviously Narrow',sans-serif; font-weight:900; font-size:clamp(36px,5vw,52px); color:#4A3560; margin:0; line-height:1; text-transform:uppercase; letter-spacing:0.5px;">+100 marcas</h2>
          <div style="font-family:'Atacama',sans-serif; font-size:clamp(22px,3.5vw,28px); color:#8F77B4; margin-top:6px;">lideradas por mujeres</div>
        </div>
        
        <!-- Buscador -->
        <div class="eeReveal" style="position:relative; width:min(360px, 100%);">
          <span style="position:absolute; left:18px; top:50%; transform:translateY(-50%); display:flex; align-items:center; pointer-events:none; z-index:2;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#8F77B4" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          </span>
          <input type="text" id="ee-brand-search" placeholder="Busca tu marca favorita" style="width:100%; padding:14px 20px 14px 46px; border-radius:100px; border:none; background:#fff; box-shadow:0 8px 24px rgba(143,119,180,0.08); font-family:'Gotham Narrow',sans-serif; font-size:17px; color:#4A3560; box-sizing:border-box; outline:none; transition:box-shadow 0.25s ease;" />
        </div>
      </div>
      
      <!-- Cuadrícula de marcas -->
      <div style="position:relative;">
        <div id="ee-brands-grid" style="display:grid; grid-template-columns:repeat(auto-fill, minmax(220px, 1fr)); gap:24px;">
            <!-- Renderizado dinámico vía JS -->
        </div>
        
        <!-- Paginación -->
        <div style="display:flex; justify-content:center; align-items:center; gap:16px; margin-top:48px;">
          <button id="ee-brands-prev" class="eeBtn" style="width:44px; height:44px; border-radius:50%; border:none; background:#fff; box-shadow:0 4px 12px rgba(143,119,180,0.15); color:#8F77B4; font-size:18px; cursor:pointer; display:flex; align-items:center; justify-content:center; transition:all 0.25s ease;">‹</button>
          
          <div id="ee-brands-dots" style="display:flex; align-items:center; gap:8px;">
              <!-- Dots del paginador -->
          </div>
          
          <button id="ee-brands-next" class="eeBtn" style="width:44px; height:44px; border-radius:50%; border:none; background:#fff; box-shadow:0 4px 12px rgba(143,119,180,0.15); color:#8F77B4; font-size:18px; cursor:pointer; display:flex; align-items:center; justify-content:center; transition:all 0.25s ease;">›</button>
        </div>
      </div>
    </div>
</section>

<script>
    // Pasar marcas de PHP a JavaScript de forma segura
    window.WP_BRANDS_DATA = <?php echo json_encode( $brands_data ); ?>;

    document.addEventListener('DOMContentLoaded', function() {
        var allBrands = window.WP_BRANDS_DATA || [];
        var currentPage = 0;
        var itemsPerPage = 10;
        var filteredBrands = allBrands;

        var searchInput = document.getElementById('ee-brand-search');
        var grid = document.getElementById('ee-brands-grid');
        var prevBtn = document.getElementById('ee-brands-prev');
        var nextBtn = document.getElementById('ee-brands-next');
        var dotsContainer = document.getElementById('ee-brands-dots');

        function render() {
            var searchVal = searchInput.value.toLowerCase().trim();
            filteredBrands = allBrands.filter(function(brand) {
                return brand.name.toLowerCase().includes(searchVal) || 
                       brand.category.toLowerCase().includes(searchVal);
            });

            var totalPages = Math.ceil(filteredBrands.length / itemsPerPage) || 1;
            currentPage = Math.min(currentPage, totalPages - 1);
            if (currentPage < 0) currentPage = 0;

            // Cortar elementos de la página activa
            var start = currentPage * itemsPerPage;
            var end = start + itemsPerPage;
            var pageBrands = filteredBrands.slice(start, end);

            // Generar markup de tarjetas
            var html = '';
            pageBrands.forEach(function(brand) {
                html += `
                <div class="eeReveal eeCard eeVisible" style="background:#fff; border-radius:16px; box-shadow:0 8px 24px rgba(143,119,180,0.08); overflow:hidden; display:flex; flex-direction:column;">
                  <a href="${brand.instagram}" target="_blank" rel="noopener noreferrer" style="display:block; width:100%; height:200px; overflow:hidden; position:relative;">
                    <img src="${brand.img}" alt="${brand.name}" style="width:100%; height:100%; display:block; object-fit:cover; transition:transform 0.4s ease;" />
                  </a>
                  <div style="padding:16px 20px 20px; background:${brand.bg}; color:#fff; flex-grow:1; display:flex; flex-direction:column; justify-content:center;">
                    <div style="font-family:'Gotham Narrow',sans-serif; font-weight:900; font-size:17px; text-transform:uppercase; border-bottom:1px solid rgba(255,255,255,0.4); padding-bottom:6px; display:inline-block; letter-spacing:0.5px; align-self:flex-start;">
                      ${brand.name}
                    </div>
                    <div style="font-family:'Obviously Narrow',sans-serif; font-size:13px; font-weight:400; opacity:0.95; margin-top:10px; display:flex; align-items:center; gap:6px;">
                      <span style="font-size:12px;">*</span>
                      <span>${brand.category}</span>
                    </div>
                  </div>
                </div>`;
            });
            grid.innerHTML = html;

            // Renderizar dots
            var dotsHtml = '';
            for (var i = 0; i < totalPages; i++) {
                var width = (i === currentPage) ? '70px' : '24px';
                var opacity = (i === currentPage) ? '1' : '0.5';
                dotsHtml += `<button data-page="${i}" class="ee-dot" style="height:5px; border-radius:3px; border:none; transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1); background:#6CBCE0; cursor:pointer; width:${width}; opacity:${opacity};"></button>`;
            }
            dotsContainer.innerHTML = dotsHtml;

            // Manejadores para dots
            document.querySelectorAll('.ee-dot').forEach(function(dot) {
                dot.addEventListener('click', function() {
                    currentPage = parseInt(dot.getAttribute('data-page'));
                    render();
                });
            });

            // Control de deshabilitado de botones anterior/siguiente
            prevBtn.disabled = currentPage === 0;
            prevBtn.style.opacity = currentPage === 0 ? '0.4' : '1';
            nextBtn.disabled = currentPage >= totalPages - 1;
            nextBtn.style.opacity = currentPage >= totalPages - 1 ? '0.4' : '1';
        }

        if (searchInput && grid && prevBtn && nextBtn && dotsContainer) {
            searchInput.addEventListener('input', function() {
                currentPage = 0;
                render();
            });

            prevBtn.addEventListener('click', function() {
                if (currentPage > 0) {
                    currentPage--;
                    render();
                }
            });

            nextBtn.addEventListener('click', function() {
                var totalPages = Math.ceil(filteredBrands.length / itemsPerPage);
                if (currentPage < totalPages - 1) {
                    currentPage++;
                    render();
                }
            });

            // Renderizado inicial
            render();
        }
    });
</script>
