<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() . '/favicon.png' ); ?>" type="image/x-icon">

    <!-- SEO Meta Tags Fallback -->
    <?php if ( ! class_exists( 'WPSEO_Options' ) && ! class_exists( 'RankMath' ) ) : ?>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <?php endif; ?>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@500;600;700&family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500;1,600&family=Satisfy&display=swap" rel="stylesheet">
    <style>
        html { scroll-behavior: smooth; }
        #marcas-carousel::-webkit-scrollbar { height: 10px; }
        #marcas-carousel::-webkit-scrollbar-track { background: #F9D4E5; border-radius: 10px; }
        #marcas-carousel::-webkit-scrollbar-thumb { background: #E18EBB; border-radius: 10px; }
        #marcas-carousel::-webkit-scrollbar-thumb:hover { background: #D46FA6; }
        @media (max-width: 600px) {
            .eeBannerFlex { flex-direction: column !important; }
            .eeBannerFlex > div { text-align: center !important; }
            .eeBannerDivider { display: none !important; }
        }
        
        /* Estilos para el menú móvil */
        .eeMobileNav {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: rgba(74, 53, 80, 0.95);
            padding: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            z-index: 10;
        }
        .eeMobileNav.is-active {
            display: flex;
        }
        
        /* Estilos del menú hamburguesa */
        .eeHamburger span {
            display: block;
            width: 100%;
            height: 2px;
            background: #fff;
            border-radius: 2px;
            transition: all .25s ease;
        }
        .eeHamburger.is-active span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }
        .eeHamburger.is-active span:nth-child(2) {
            opacity: 0;
        }
        .eeHamburger.is-active span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="ee-site-header" class="eeHeader" style="display:flex; justify-content:center; position:fixed; top:0; left:0; width:100%; z-index:20;">
    <div style="position:relative; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; row-gap:16px; gap:20px; padding:22px clamp(20px,6vw,56px); width:100%; max-width:1280px;">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/logo-empoderadas.png' ); ?>" alt="Empoderadas y Emprendedoras" style="height:46px; width:auto; flex-shrink:0;" />
        </a>
        
        <!-- Navegación de Escritorio -->
        <nav class="eeNavDesktop" style="display:flex; gap:clamp(20px,3.5vw,40px); align-items:center; flex-wrap:wrap; flex-shrink:1;">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => false,
                    // Filtramos los links para aplicar la clase eeNavLink y el estilo estético original
                    'walker'         => new Empoderadas_Nav_Walker(),
                ) );
            } else {
                ?>
                <a href="#marcas" class="eeNavLink" style="color:#fff; text-decoration:none; font-family:'Obviously Narrow',sans-serif; font-size:15px; letter-spacing:1.5px; font-weight:600; white-space:nowrap; text-shadow:0 1px 4px rgba(74,53,80,0.4);">MARCAS</a>
                <a href="#agenda" class="eeNavLink" style="color:#fff; text-decoration:none; font-family:'Obviously Narrow',sans-serif; font-size:15px; letter-spacing:1.5px; font-weight:600; white-space:nowrap; text-shadow:0 1px 4px rgba(74,53,80,0.4);">AGENDA</a>
                <a href="#auspiciadores" class="eeNavLink" style="color:#fff; text-decoration:none; font-family:'Obviously Narrow',sans-serif; font-size:15px; letter-spacing:1.5px; font-weight:600; white-space:nowrap; text-shadow:0 1px 4px rgba(74,53,80,0.4);">AUSPICIADORES</a>
                <?php
            }
            ?>
        </nav>

        <!-- Botón Menú Móvil -->
        <button id="ee-hamburger-btn" aria-label="Abrir menú" class="eeHamburger" style="display:none; flex-direction:column; justify-content:center; gap:5px; width:36px; height:36px; border:none; background:transparent; cursor:pointer; padding:0;">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Navegación Móvil -->
        <nav id="ee-mobile-menu" class="eeMobileNav">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => false,
                    'walker'         => new Empoderadas_Mobile_Nav_Walker(),
                ) );
            } else {
                ?>
                <a href="#marcas" class="eeMobileLink" style="color:#fff; text-decoration:none; font-family:'Obviously Narrow',sans-serif; font-size:15px; letter-spacing:1.5px; font-weight:600; padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.15);">MARCAS</a>
                <a href="#agenda" class="eeMobileLink" style="color:#fff; text-decoration:none; font-family:'Obviously Narrow',sans-serif; font-size:15px; letter-spacing:1.5px; font-weight:600; padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.15);">AGENDA</a>
                <a href="#auspiciadores" class="eeMobileLink" style="color:#fff; text-decoration:none; font-family:'Obviously Narrow',sans-serif; font-size:15px; letter-spacing:1.5px; font-weight:600; padding:12px 0;">AUSPICIADORES</a>
                <?php
            }
            ?>
        </nav>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lógica nativa de JS para menú móvil
        var btn = document.getElementById('ee-hamburger-btn');
        var menu = document.getElementById('ee-mobile-menu');
        
        if (btn && menu) {
            btn.addEventListener('click', function() {
                btn.classList.toggle('is-active');
                menu.classList.toggle('is-active');
            });
            
            var links = menu.querySelectorAll('a');
            links.forEach(function(link) {
                link.addEventListener('click', function() {
                    btn.classList.remove('is-active');
                    menu.classList.remove('is-active');
                });
            });
        }
    });
</script>
