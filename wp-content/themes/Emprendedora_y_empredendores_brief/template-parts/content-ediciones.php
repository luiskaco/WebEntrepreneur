<?php
/**
 * Ediciones template part
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$img_url = get_template_directory_uri() . '/assets/images/section_galeria.webp';
?>

<section id="ediciones" data-screen-label="Ediciones" style="background-color: #E18EBB; padding: clamp(60px, 8vw, 90px) 0; text-align: center;">
    <div class="eeReveal" style="max-width: 100%; margin: 0 auto;">
        
        <div style="padding: 0 20px;">
            <h2 style="font-family: 'Obviously Narrow', sans-serif; font-size: clamp(32px, 6vw, 56px); font-weight: 900; color: #fff; margin: 0 0 16px 0; text-transform: none; letter-spacing: 0.5px;">
                Nuestras ediciones
            </h2>
        
        <!-- Separador decorativo blanco -->
        <div style="display:flex; align-items:center; justify-content:center; gap:10px; margin:0 0 40px 0;">
            <div style="width:5px; height:5px; background:#fff; transform:rotate(45deg);"></div>
            <div style="height:1.5px; background:rgba(255, 255, 255, 0.6); flex-grow:1; max-width:150px;"></div>
            <div style="width:9px; height:9px; background:#fff; transform:rotate(45deg);"></div>
            <div style="height:1.5px; background:rgba(255, 255, 255, 0.6); flex-grow:1; max-width:150px;"></div>
            <div style="width:5px; height:5px; background:#fff; transform:rotate(45deg);"></div>
        </div>
        </div>
        
        <!-- LIBRERÍAS SWIPER (Si no están cargadas globalmente) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- SWIPER CONTAINER -->
        <div class="swiper eeEdicionesSwiper" style="width:100%; max-width:1200px; margin:0 auto; overflow:hidden; position:relative;">
            <div class="swiper-wrapper">
                
                <!-- Edición 2025 -->
                <div class="swiper-slide">
                    <div style="position: relative; overflow: hidden; display: flex; justify-content: center; align-items: center; background: #000;">
                        <img src="<?php echo esc_url( $img_url ); ?>" alt="Edición 2025" style="width: 100%; aspect-ratio: 3.5/1; display: block; object-fit: cover; object-position: center; opacity: 0.9;">
                        <div style="position: absolute; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                            <div style="font-family: 'Bernard MT', 'Cormorant Garamond', serif; font-size: clamp(60px, 12vw, 100px); font-weight: bold; color: #fff; line-height: 1; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
                                2025
                            </div>
                            <a href="#" style="background: #fff; color: #E18EBB; font-family: 'Obviously Narrow', sans-serif; font-weight: 800; font-size: 16px; text-transform: uppercase; padding: 10px 32px; border-radius: 0; text-decoration: none; display: inline-block; box-shadow: 0 4px 10px rgba(0,0,0,0.15); letter-spacing: 1px; transition: all 0.3s ease;" class="ee-explora-btn" onclick="event.preventDefault();">
                                EXPLORA
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Edición 2024 -->
                <div class="swiper-slide">
                    <div style="position: relative; overflow: hidden; display: flex; justify-content: center; align-items: center; background: #000;">
                        <img src="<?php echo esc_url( $img_url ); ?>" alt="Edición 2024" style="width: 100%; aspect-ratio: 3.5/1; display: block; object-fit: cover; object-position: center; opacity: 0.9;">
                        <div style="position: absolute; display: flex; flex-direction: column; align-items: center; gap: 8px;">
                            <div style="font-family: 'Bernard MT', 'Cormorant Garamond', serif; font-size: clamp(60px, 12vw, 100px); font-weight: bold; color: #fff; line-height: 1; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
                                2024
                            </div>
                            <a href="#" style="background: #fff; color: #E18EBB; font-family: 'Obviously Narrow', sans-serif; font-weight: 800; font-size: 16px; text-transform: uppercase; padding: 10px 32px; border-radius: 0; text-decoration: none; display: inline-block; box-shadow: 0 4px 10px rgba(0,0,0,0.15); letter-spacing: 1px; transition: all 0.3s ease;" class="ee-explora-btn" onclick="event.preventDefault();">
                                EXPLORA
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Controles de navegación y paginación -->
            <div class="swiper-button-next ee-edi-next" style="color:#fff;"></div>
            <div class="swiper-button-prev ee-edi-prev" style="color:#fff;"></div>
            <div class="swiper-pagination ee-edi-pagination" style="bottom: 10px;"></div>
        </div>
    </div>

    <!-- SCRIPT SWIPER -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        if(typeof Swiper !== 'undefined') {
            new Swiper('.eeEdicionesSwiper', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                navigation: {
                    nextEl: '.ee-edi-next',
                    prevEl: '.ee-edi-prev',
                },
                pagination: {
                    el: '.ee-edi-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                }
            });
        }
    });
    </script>

    <style>
        .ee-explora-btn {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        }
        .ee-explora-btn:hover {
            transform: translateY(-2px) scale(1.03) !important;
            background: #fff !important;
            box-shadow: 0 6px 20px rgba(74,53,80,0.25) !important;
        }
        /* Custom Swiper navigation arrows */
        .eeEdicionesSwiper .swiper-button-next,
        .eeEdicionesSwiper .swiper-button-prev {
            width: 48px;
            height: 48px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 50%;
            transition: all 0.3s ease;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255,255,255,0.2);
        }
        .eeEdicionesSwiper .swiper-button-next:hover,
        .eeEdicionesSwiper .swiper-button-prev:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: scale(1.08);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }
        .eeEdicionesSwiper .swiper-button-next:hover::after,
        .eeEdicionesSwiper .swiper-button-prev:hover::after {
            color: #E18EBB;
        }
        .eeEdicionesSwiper .swiper-button-next::after,
        .eeEdicionesSwiper .swiper-button-prev::after {
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            transition: color 0.3s ease;
        }
        /* Custom Swiper pagination bullets */
        .eeEdicionesSwiper .swiper-pagination-bullet {
            background: rgba(255, 255, 255, 0.5) !important;
            opacity: 1 !important;
            width: 8px;
            height: 8px;
            transition: all 0.3s ease;
        }
        .eeEdicionesSwiper .swiper-pagination-bullet-active {
            background: #fff !important;
            width: 22px;
            border-radius: 4px;
        }
        /* Slide Hover Zoom effect */
        .eeEdicionesSwiper .swiper-slide {
            overflow: hidden;
        }
        .eeEdicionesSwiper .swiper-slide img {
            transition: transform 1.2s cubic-bezier(0.25, 1, 0.5, 1) !important;
        }
        .eeEdicionesSwiper .swiper-slide:hover img {
            transform: scale(1.04);
        }
    </style>
</section>
