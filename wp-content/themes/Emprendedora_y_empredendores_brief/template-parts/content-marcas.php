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

// Consultar todas las marcas ordenadas alfabéticamente
$marcas_query = new WP_Query( array(
    'post_type'      => 'marca',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'title',
    'order'          => 'ASC'
) );

$brands_data = array();
$colors = array( '#8F77B4', '#E18EBB', '#6CBCE0', '#F8BCAA' );

if ( $marcas_query->have_posts() ) {
    $idx = 0;
    while ( $marcas_query->have_posts() ) {
        $marcas_query->the_post();
        
        // Obtener el campo personalizado _marca_categoria
        $cat_name = get_post_meta( get_the_ID(), '_marca_categoria', true );
        
        // Si no está definido, usar taxonomía o fallback original
        if ( empty( $cat_name ) ) {
            $cats = get_the_terms( get_the_ID(), 'categoria_marca' );
            $cat_name = ! empty( $cats ) ? $cats[0]->name : 'Feria';
        }
        
        $instagram = get_post_meta( get_the_ID(), '_marca_instagram', true );
        $has_instagram = ( $instagram && trim( $instagram ) !== 'https://www.instagram.com' && trim( $instagram ) !== 'https://www.instagram.com/' ) ? 1 : 0;

        $brands_data[] = array(
            'id' => get_the_ID(),
            'name' => get_the_title(),
            'category' => $cat_name,
            'instagram' => $instagram ? $instagram : 'https://www.instagram.com',
            'bg' => $colors[$idx % count($colors)],
            'img' => get_the_post_thumbnail_url( get_the_ID(), 'medium' ) ? get_the_post_thumbnail_url( get_the_ID(), 'medium' ) : empoderadas_get_placeholder_svg( 260, 200, 'Marca' ),
            'has_instagram' => $has_instagram
        );
        $idx++;
    }
    wp_reset_postdata();
} else {
    $fallbacks = array();

    foreach ( $fallbacks as $k => $f ) {
        $has_instagram = ( $f['instagram'] && trim( $f['instagram'] ) !== 'https://www.instagram.com' && trim( $f['instagram'] ) !== 'https://www.instagram.com/' ) ? 1 : 0;
        
        $brands_data[] = array(
            'id' => $k + 1,
            'name' => $f['name'],
            'category' => $f['category'],
            'instagram' => $f['instagram'],
            'bg' => $colors[$k % count($colors)],
            'img' => empoderadas_get_placeholder_svg( 260, 200, $f['name'] ),
            'has_instagram' => $has_instagram
        );
    }
}
?>

<script>
window.WP_BRANDS_DATA = <?php echo json_encode( $brands_data ); ?>;
</script>

<section id="marcas" class="eeSection" style="background:#FFF9FB; padding:90px 0; position:relative; overflow:hidden;">
  <div class="container" style="position:relative; z-index:3; max-width:1200px; margin:0 auto; padding:0 20px;">
    
    <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:20px; margin-bottom:45px;">
      <div>
        <h2 style="font-family:'Obviously Narrow',sans-serif; font-weight:900; font-size:clamp(36px,5vw,52px); color:#4A3560; margin:0; line-height:1; text-transform:uppercase; letter-spacing:0.5px;">+100 marcas</h2>
        <div style="width:60px; height:4px; background:#E18EBB; margin-top:15px; border-radius:2px;"></div>
      </div>
      
      <!-- Buscador UX -->
      <div style="position:relative; width:100%; max-width:380px;">
        <input type="text" id="ee-brand-search" placeholder="Buscar por marca o categoría..." style="width:100%; padding:14px 20px 14px 45px; border:2px solid rgba(143,119,180,0.15); border-radius:100px; font-family:'Montserrat',sans-serif; font-size:14px; outline:none; transition:all 0.3s ease; box-shadow:0 4px 12px rgba(143,119,180,0.03);" />
        <span id="ee-search-icon" style="position:absolute; left:18px; top:50%; transform:translateY(-50%); font-size:16px; pointer-events:none; filter:grayscale(100%) opacity(0.5); transition:all 0.3s ease;">🔍</span>
      </div>
    </div>

    <style>
    #ee-brand-search:focus {
        border-color: #8F77B4 !important;
        box-shadow: 0 4px 16px rgba(143,119,180,0.15) !important;
    }
    #ee-brand-search:focus + #ee-search-icon {
        filter: grayscale(0%) opacity(1) !important;
        transform: translateY(-50%) scale(1.1) !important;
    }
    #ee-brands-grid {
        display: grid;
        grid-template-columns: repeat(1, minmax(200px, 280px));
        justify-content: center;
        align-items: start;
        gap: 24px;
        min-height: 480px;
        width: 100%;
    }
    @media (min-width: 480px) {
        #ee-brands-grid {
            grid-template-columns: repeat(2, minmax(200px, 280px));
        }
    }
    @media (min-width: 768px) {
        #ee-brands-grid {
            grid-template-columns: repeat(3, minmax(200px, 280px));
        }
    }
    @media (min-width: 992px) {
        #ee-brands-grid {
            grid-template-columns: repeat(4, minmax(200px, 280px));
        }
    }
    @media (min-width: 1200px) {
        #ee-brands-grid {
            grid-template-columns: repeat(5, minmax(200px, 280px));
        }
    }
    .eeCard:hover .ee-brand-img {
        transform: scale(1.06);
    }
    .ee-instagram-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        width: 32px;
        height: 32px;
        background: rgba(0, 0, 0, 0.45);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.85;
        transition: all 0.3s ease;
        z-index: 5;
    }
    .eeCard:hover .ee-instagram-badge {
        background: #E18EBB;
        opacity: 1;
        transform: scale(1.15);
    }
    #ee-brands-prev:hover, #ee-brands-next:hover {
        background: #E18EBB !important;
        color: #fff !important;
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(225,142,187,0.25) !important;
    }
    #ee-brands-prev:active, #ee-brands-next:active {
        transform: scale(0.95) !important;
    }
    </style>

    <!-- Grid de Marcas -->
    <div id="ee-brands-grid">
      <!-- JS cargará las tarjetas aquí -->
    </div>

    <!-- Paginación -->
    <div style="display:flex; justify-content:center; align-items:center; gap:16px; margin-top:50px;">
      <button id="ee-brands-prev" class="eeBtn" style="width:40px; height:40px; border-radius:50%; border:none; background:#fff; color:#111; cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:bold; box-shadow:0 4px 14px rgba(0,0,0,0.08); transition:all 0.25s ease;">&lt;</button>
      <div id="ee-brands-dots" style="display:flex; align-items:center; gap:6px;"></div>
      <button id="ee-brands-next" class="eeBtn" style="width:40px; height:40px; border-radius:50%; border:none; background:#fff; color:#111; cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:bold; box-shadow:0 4px 14px rgba(0,0,0,0.08); transition:all 0.25s ease;">&gt;</button>
    </div>

  </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var allBrands = window.WP_BRANDS_DATA || [];
        var currentPage = 0;
        var itemsPerPage = 15;
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
                var imageHtml = `<div class="ee-brand-img" style="width:100%; height:100%; background-image:url('${brand.img}'); background-size:cover; background-position:center; background-repeat:no-repeat; transition:transform 0.4s ease;"></div>`;
                
                var badgeHtml = brand.has_instagram 
                    ? `<div class="ee-instagram-badge">
                         <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051C.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                       </div>` 
                    : '';

                var headerHtml = `<div style="display:block; width:100%; height:200px; overflow:hidden; position:relative;">${imageHtml}${badgeHtml}</div>`;
                
                var cardContent = `
                  ${headerHtml}
                  <div style="padding:16px 20px 20px; background:${brand.bg}; color:#fff; flex-grow:1; display:flex; flex-direction:column; justify-content:center;">
                    <div style="font-family:'Gotham Narrow',sans-serif; font-weight:900; font-size:17px; text-transform:uppercase; border-bottom:1px solid rgba(255,255,255,0.4); padding-bottom:3px; display:inline-block; letter-spacing:0.5px; align-self:flex-start;">
                      ${brand.name}
                    </div>
                    <div style="font-family:'Obviously Narrow',sans-serif; font-size:13px; font-weight:400; opacity:0.95; margin-top:6px; display:flex; align-items:center; gap:6px;">
                      <span style="font-size:12px;">*</span>
                      <span>${brand.category}</span>
                    </div>
                  </div>`;

                if (brand.has_instagram) {
                    html += `
                    <a href="${brand.instagram}" target="_blank" rel="noopener noreferrer" class="eeReveal eeCard eeVisible" style="background:#fff; border-radius:16px; box-shadow:0 8px 24px rgba(143,119,180,0.08); overflow:hidden; display:flex; flex-direction:column; max-width:280px; width:100%; margin:0 auto; text-decoration:none; color:inherit;">
                      ${cardContent}
                    </a>`;
                } else {
                    html += `
                    <div class="eeReveal eeCard eeVisible" style="background:#fff; border-radius:16px; box-shadow:0 8px 24px rgba(143,119,180,0.08); overflow:hidden; display:flex; flex-direction:column; max-width:280px; width:100%; margin:0 auto;">
                      ${cardContent}
                    </div>`;
                }
            });
            grid.innerHTML = html;

            // Renderizar dots
            var dotsHtml = '';
            for (var i = 0; i < totalPages; i++) {
                var width = (i === currentPage) ? '48px' : '16px';
                var opacity = (i === currentPage) ? '1' : '0.6';
                dotsHtml += `<button data-page="${i}" class="ee-dot" style="height:6px; border-radius:3px; border:none; transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1); background:#6CBCE0; cursor:pointer; width:${width}; opacity:${opacity};"></button>`;
            }
            dotsContainer.innerHTML = dotsHtml;

            // Manejadores para dots
            document.querySelectorAll('.ee-dot').forEach(function(dot) {
                dot.addEventListener('click', function() {
                    currentPage = parseInt(dot.getAttribute('data-page'));
                    render();
                    scrollToSection();
                });
            });

            // Control de deshabilitado de botones anterior/siguiente
            prevBtn.disabled = currentPage === 0;
            prevBtn.style.opacity = currentPage === 0 ? '0.4' : '1';
            nextBtn.disabled = currentPage >= totalPages - 1;
            nextBtn.style.opacity = currentPage >= totalPages - 1 ? '0.4' : '1';
        }

        function scrollToSection() {
            var section = document.getElementById('marcas');
            if (!section) return;
            var offset = 100;
            var bodyRect = document.body.getBoundingClientRect().top;
            var elementRect = section.getBoundingClientRect().top;
            var elementPosition = elementRect - bodyRect;
            var offsetPosition = elementPosition - offset;
            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
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
                    scrollToSection();
                }
            });

            nextBtn.addEventListener('click', function() {
                var totalPages = Math.ceil(filteredBrands.length / itemsPerPage);
                if (currentPage < totalPages - 1) {
                    currentPage++;
                    render();
                    scrollToSection();
                }
            });

            // Renderizado inicial
            render();
        }
    });
</script>
