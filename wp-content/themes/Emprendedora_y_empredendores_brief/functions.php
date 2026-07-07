<?php
/**
 * Emprendedora y Emprendedores Brief functions and definitions
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 * @since 1.0.0
 */

// Evitar acceso directo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ==========================================================================
   1. SOPORTE DEL TEMA
   ========================================================================== */
function empoderadas_setup() {
    // Soporte para título dinámico (SEO)
    add_theme_support( 'title-tag' );

    // Soporte para imágenes destacadas (Post Thumbnails)
    add_theme_support( 'post-thumbnails' );

    // Registro de menús de navegación
    register_nav_menus( array(
        'primary' => __( 'Menú Principal', 'empoderadas-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'empoderadas_setup' );

/* ==========================================================================
   2. ENCOLADO DE ASSETS (ESTILOS Y SCRIPTS)
   ========================================================================== */
function empoderadas_enqueue_assets() {
    // CSS principal del tema
    wp_enqueue_style( 'empoderadas-style', get_stylesheet_uri(), array(), '1.0.0' );

    // CSS de animaciones de la maqueta
    wp_enqueue_style( 'empoderadas-animations', get_template_directory_uri() . '/animations.css', array(), '1.0.0' );

    // JS de animaciones de la maqueta
    wp_enqueue_script( 'empoderadas-animations-js', get_template_directory_uri() . '/animations.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'empoderadas_enqueue_assets' );

/* ==========================================================================
   3. REGISTRO DE CUSTOM POST TYPES Y TAXONOMÍAS
   ========================================================================== */
function empoderadas_register_cpts() {
    // 3.1. Taxonomía Categoría de Marca
    $labels_cat_marca = array(
        'name'              => _x( 'Categorías de Marcas', 'taxonomy general name', 'empoderadas-theme' ),
        'singular_name'     => _x( 'Categoría de Marca', 'taxonomy singular name', 'empoderadas-theme' ),
        'search_items'      => __( 'Buscar Categorías', 'empoderadas-theme' ),
        'all_items'         => __( 'Todas las Categorías', 'empoderadas-theme' ),
        'parent_item'       => __( 'Categoría Padre', 'empoderadas-theme' ),
        'parent_item_colon' => __( 'Categoría Padre:', 'empoderadas-theme' ),
        'edit_item'         => __( 'Editar Categoría', 'empoderadas-theme' ),
        'update_item'       => __( 'Actualizar Categoría', 'empoderadas-theme' ),
        'add_new_item'      => __( 'Añadir Nueva Categoría', 'empoderadas-theme' ),
        'new_item_name'     => __( 'Nombre de Nueva Categoría', 'empoderadas-theme' ),
        'menu_name'         => __( 'Categorías', 'empoderadas-theme' ),
    );

    register_taxonomy( 'categoria_marca', array( 'marca' ), array(
        'hierarchical'      => true,
        'labels'            => $labels_cat_marca,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categoria-marca' ),
        'show_in_rest'      => true,
    ) );

    // 3.2. CPT Marcas
    $labels_marcas = array(
        'name'               => _x( 'Marcas', 'post type general name', 'empoderadas-theme' ),
        'singular_name'      => _x( 'Marca', 'post type singular name', 'empoderadas-theme' ),
        'menu_name'          => _x( 'Marcas', 'admin menu', 'empoderadas-theme' ),
        'name_admin_bar'     => _x( 'Marca', 'add new on admin bar', 'empoderadas-theme' ),
        'add_new'            => _x( 'Añadir Nueva', 'marca', 'empoderadas-theme' ),
        'add_new_item'       => __( 'Añadir Nueva Marca', 'empoderadas-theme' ),
        'new_item'           => __( 'Nueva Marca', 'empoderadas-theme' ),
        'edit_item'          => __( 'Editar Marca', 'empoderadas-theme' ),
        'view_item'          => __( 'Ver Marca', 'empoderadas-theme' ),
        'all_items'          => __( 'Todas las Marcas', 'empoderadas-theme' ),
        'search_items'       => __( 'Buscar Marcas', 'empoderadas-theme' ),
        'not_found'          => __( 'No se encontraron marcas.', 'empoderadas-theme' ),
        'not_found_in_trash' => __( 'No hay marcas en la papelera.', 'empoderadas-theme' )
    );

    $args_marcas = array(
        'labels'             => $labels_marcas,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'marcas' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-store',
        'supports'           => array( 'title', 'thumbnail' ),
        'show_in_rest'       => true,
    );
    register_post_type( 'marca', $args_marcas );

    // 3.3. CPT Agenda
    $labels_agenda = array(
        'name'               => _x( 'Agenda', 'post type general name', 'empoderadas-theme' ),
        'singular_name'      => _x( 'Evento de Agenda', 'post type singular name', 'empoderadas-theme' ),
        'menu_name'          => _x( 'Agenda', 'admin menu', 'empoderadas-theme' ),
        'name_admin_bar'     => _x( 'Evento de Agenda', 'add new on admin bar', 'empoderadas-theme' ),
        'add_new'            => _x( 'Añadir Nuevo', 'evento_agenda', 'empoderadas-theme' ),
        'add_new_item'       => __( 'Añadir Nuevo Evento', 'empoderadas-theme' ),
        'new_item'           => __( 'Nuevo Evento', 'empoderadas-theme' ),
        'edit_item'          => __( 'Editar Evento', 'empoderadas-theme' ),
        'all_items'          => __( 'Todos los Eventos', 'empoderadas-theme' ),
        'search_items'       => __( 'Buscar Eventos', 'empoderadas-theme' ),
        'not_found'          => __( 'No se encontraron eventos.', 'empoderadas-theme' ),
    );

    $args_agenda = array(
        'labels'             => $labels_agenda,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array( 'title', 'thumbnail' ),
        'show_in_rest'       => true,
    );
    register_post_type( 'evento_agenda', $args_agenda );

    // 3.4. CPT Auspiciadores
    $labels_auspiciadores = array(
        'name'               => _x( 'Auspiciadores', 'post type general name', 'empoderadas-theme' ),
        'singular_name'      => _x( 'Auspiciador', 'post type singular name', 'empoderadas-theme' ),
        'menu_name'          => _x( 'Auspiciadores', 'admin menu', 'empoderadas-theme' ),
        'add_new'            => _x( 'Añadir Nuevo', 'auspiciador', 'empoderadas-theme' ),
        'add_new_item'       => __( 'Añadir Nuevo Auspiciador', 'empoderadas-theme' ),
        'edit_item'          => __( 'Editar Auspiciador', 'empoderadas-theme' ),
        'all_items'          => __( 'Todos los Auspiciadores', 'empoderadas-theme' ),
    );

    $args_auspiciadores = array(
        'labels'             => $labels_auspiciadores,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-awards',
        'supports'           => array( 'title', 'thumbnail' ),
        'show_in_rest'       => true,
    );
    register_post_type( 'auspiciador', $args_auspiciadores );
}
add_action( 'init', 'empoderadas_register_cpts' );

/* ==========================================================================
   4. METABOXES PERSONALIZADOS (PARA EVITAR PLUGINS COMO ACF)
   ========================================================================== */
// Meta para Marcas: Enlace de Instagram
function empoderadas_add_marca_metabox() {
    add_meta_box(
        'marca_options',
        __( 'Opciones de la Marca', 'empoderadas-theme' ),
        'empoderadas_marca_metabox_html',
        'marca',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'empoderadas_add_marca_metabox' );

function empoderadas_marca_metabox_html( $post ) {
    $instagram = get_post_meta( $post->ID, '_marca_instagram', true );
    $categoria = get_post_meta( $post->ID, '_marca_categoria', true );
    wp_nonce_field( 'empoderadas_marca_nonce', 'empoderadas_marca_nonce_field' );
    ?>
    <p>
        <label for="marca_instagram"><?php _e( 'URL de Instagram:', 'empoderadas-theme' ); ?></label>
        <input type="url" name="marca_instagram" id="marca_instagram" value="<?php echo esc_url( $instagram ); ?>" class="widefat" placeholder="https://instagram.com/usuario">
    </p>
    <p>
        <label for="marca_categoria"><?php _e( 'Categoría / Subtítulo (debajo del nombre):', 'empoderadas-theme' ); ?></label>
        <input type="text" name="marca_categoria" id="marca_categoria" value="<?php echo esc_attr( $categoria ); ?>" class="widefat" placeholder="Ej. Feria, Joyería, Ropa, etc.">
    </p>
    <?php
}

function empoderadas_save_marca_meta( $post_id ) {
    if ( ! isset( $_POST['empoderadas_marca_nonce_field'] ) || ! wp_verify_nonce( $_POST['empoderadas_marca_nonce_field'], 'empoderadas_marca_nonce' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( isset( $_POST['marca_instagram'] ) ) {
        update_post_meta( $post_id, '_marca_instagram', esc_url_raw( $_POST['marca_instagram'] ) );
    }
    if ( isset( $_POST['marca_categoria'] ) ) {
        update_post_meta( $post_id, '_marca_categoria', sanitize_text_field( $_POST['marca_categoria'] ) );
    }
}
add_action( 'save_post_marca', 'empoderadas_save_marca_meta' );


// Meta para Agenda: Hora, Tag y Día
function empoderadas_add_agenda_metabox() {
    add_meta_box(
        'agenda_options',
        __( 'Detalles del Evento', 'empoderadas-theme' ),
        'empoderadas_agenda_metabox_html',
        'evento_agenda',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'empoderadas_add_agenda_metabox' );

function empoderadas_agenda_metabox_html( $post ) {
    $hora = get_post_meta( $post->ID, '_evento_hora', true );
    $tag = get_post_meta( $post->ID, '_evento_tag', true );
    $dia = get_post_meta( $post->ID, '_evento_dia', true );
    wp_nonce_field( 'empoderadas_agenda_nonce', 'empoderadas_agenda_nonce_field' );
    ?>
    <p>
        <label for="evento_dia"><?php _e( 'Día de la feria:', 'empoderadas-theme' ); ?></label>
        <select name="evento_dia" id="evento_dia" class="widefat">
            <option value="11" <?php selected( $dia, '11' ); ?>>11 Julio</option>
            <option value="12" <?php selected( $dia, '12' ); ?>>12 Julio</option>
        </select>
    </p>
    <p>
        <label for="evento_hora"><?php _e( 'Hora (ej. "11:30 am"):', 'empoderadas-theme' ); ?></label>
        <input type="text" name="evento_hora" id="evento_hora" value="<?php echo esc_attr( $hora ); ?>" class="widefat">
    </p>
    <p>
        <label for="evento_tag"><?php _e( 'Etiqueta o Tag (ej. "Taller Práctico"):', 'empoderadas-theme' ); ?></label>
        <input type="text" name="evento_tag" id="evento_tag" value="<?php echo esc_attr( $tag ); ?>" class="widefat">
    </p>
    <?php
}

function empoderadas_save_agenda_meta( $post_id ) {
    if ( ! isset( $_POST['empoderadas_agenda_nonce_field'] ) || ! wp_verify_nonce( $_POST['empoderadas_agenda_nonce_field'], 'empoderadas_agenda_nonce' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( isset( $_POST['evento_dia'] ) ) {
        update_post_meta( $post_id, '_evento_dia', sanitize_text_field( $_POST['evento_dia'] ) );
    }
    if ( isset( $_POST['evento_hora'] ) ) {
        update_post_meta( $post_id, '_evento_hora', sanitize_text_field( $_POST['evento_hora'] ) );
    }
    if ( isset( $_POST['evento_tag'] ) ) {
        update_post_meta( $post_id, '_evento_tag', sanitize_text_field( $_POST['evento_tag'] ) );
    }
}
add_action( 'save_post_evento_agenda', 'empoderadas_save_agenda_meta' );


/* ==========================================================================
   5. CONFIGURACIÓN DEL CUSTOMIZER (OPCIONES GLOBALES Y SECCIONES)
   ========================================================================== */
function empoderadas_customize_register( $wp_customize ) {
    // Sección Ajustes de la Feria
    $wp_customize->add_section( 'empoderadas_settings', array(
        'title'    => __( 'Ajustes de la Feria', 'empoderadas-theme' ),
        'priority' => 30,
    ) );

    // 5.1. Título del Hero
    $wp_customize->add_setting( 'hero_title', array(
        'default'           => 'Descubre las marcas que están transformando Lima',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'hero_title', array(
        'label'    => __( 'Título del Hero', 'empoderadas-theme' ),
        'section'  => 'empoderadas_settings',
        'type'     => 'textarea',
    ) );

    // 5.2. Descripción del Hero
    $wp_customize->add_setting( 'hero_description', array(
        'default'           => 'Más que una feria, el evento que reúne lo mejor del talento femenino peruano',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_description', array(
        'label'    => __( 'Descripción del Hero (Bloque Rosado)', 'empoderadas-theme' ),
        'section'  => 'empoderadas_settings',
        'type'     => 'text',
    ) );

    // 5.3. Estadística 1
    $wp_customize->add_setting( 'hero_stat_1_num', array( 'default' => '+100', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'hero_stat_1_num', array( 'label' => __( 'Estadística 1 Número', 'empoderadas-theme' ), 'section' => 'empoderadas_settings', 'type' => 'text' ) );

    $wp_customize->add_setting( 'hero_stat_1_txt', array( 'default' => 'Marcas y experiencias', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'hero_stat_1_txt', array( 'label' => __( 'Estadística 1 Descripción', 'empoderadas-theme' ), 'section' => 'empoderadas_settings', 'type' => 'text' ) );

    // 5.4. Estadística 2
    $wp_customize->add_setting( 'hero_stat_2_num', array( 'default' => '+8MIL', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'hero_stat_2_num', array( 'label' => __( 'Estadística 2 Número', 'empoderadas-theme' ), 'section' => 'empoderadas_settings', 'type' => 'text' ) );

    $wp_customize->add_setting( 'hero_stat_2_txt', array( 'default' => 'Asistentes', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'hero_stat_2_txt', array( 'label' => __( 'Estadística 2 Descripción', 'empoderadas-theme' ), 'section' => 'empoderadas_settings', 'type' => 'text' ) );

    // 5.5. Banner - Título
    $wp_customize->add_setting( 'banner_title', array( 'default' => 'Ingreso Libre', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'banner_title', array( 'label' => __( 'Título del Banner', 'empoderadas-theme' ), 'section' => 'empoderadas_settings', 'type' => 'text' ) );

    // 5.6. Banner - Lugar
    $wp_customize->add_setting( 'banner_location_name', array( 'default' => 'Country Club', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'banner_location_name', array( 'label' => __( 'Nombre del Lugar', 'empoderadas-theme' ), 'section' => 'empoderadas_settings', 'type' => 'text' ) );

    $wp_customize->add_setting( 'banner_location_address', array( 'default' => 'Ca. Los Eucaliptos 590, San Isidro', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'banner_location_address', array( 'label' => __( 'Dirección del Lugar', 'empoderadas-theme' ), 'section' => 'empoderadas_settings', 'type' => 'text' ) );

    // 5.7. Banner - Fechas
    $wp_customize->add_setting( 'banner_dates', array( 'default' => '11-12 Julio', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'banner_dates', array( 'label' => __( 'Fechas de la Feria', 'empoderadas-theme' ), 'section' => 'empoderadas_settings', 'type' => 'text' ) );
}
add_action( 'customize_register', 'empoderadas_customize_register' );


/* ==========================================================================
   6. AUTO-CONFIGURACIÓN AL ACTIVAR EL TEMA (CREACIÓN DE FRONT PAGE Y MENÚ)
   ========================================================================== */
function empoderadas_auto_setup_on_activation() {
    // Requerir el archivo de soporte de imágenes de administración de WordPress
    require_once( ABSPATH . 'wp-admin/includes/image.php' );

    // 6.1. Crear la página de inicio si no existe
    $page_slug = 'feria-inicio';
    $page_title = 'Inicio Feria';
    
    $page_check = get_page_by_path( $page_slug );
    
    if ( ! isset( $page_check->ID ) ) {
        $new_page = array(
            'post_type'    => 'page',
            'post_title'   => $page_title,
            'post_content' => '', // La plantilla controlará el renderizado
            'post_status'  => 'publish',
            'post_author'  => 1,
            'post_name'    => $page_slug
        );
        $page_id = wp_insert_post( $new_page );
    } else {
        $page_id = $page_check->ID;
    }

    // 6.2. Establecer como front page estática e inyectar SEO para Rank Math
    if ( $page_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $page_id );

        // Inyectar datos en Rank Math SEO postmeta
        $seo_desc = 'Descubre las marcas lideradas por mujeres que están transformando Lima. Feria Empoderadas y Emprendedoras, el evento que reúne lo mejor del talento femenino peruano.';
        update_post_meta( $page_id, 'rank_math_title', 'Empoderadas y Emprendedoras | Feria de Marcas Femeninas' );
        update_post_meta( $page_id, 'rank_math_description', $seo_desc );
        
        // Configuración de redes sociales en Rank Math
        update_post_meta( $page_id, 'rank_math_facebook_title', 'Empoderadas y Emprendedoras | Feria de Marcas Femeninas' );
        update_post_meta( $page_id, 'rank_math_facebook_description', $seo_desc );
        update_post_meta( $page_id, 'rank_math_facebook_image', get_template_directory_uri() . '/screenshot.png' );
        update_post_meta( $page_id, 'rank_math_twitter_title', 'Empoderadas y Emprendedoras | Feria de Marcas Femeninas' );
        update_post_meta( $page_id, 'rank_math_twitter_description', $seo_desc );
        update_post_meta( $page_id, 'rank_math_twitter_image', get_template_directory_uri() . '/screenshot.png' );
    }

    // 6.3. Crear y configurar menú de navegación
    $menu_name = 'Menú Principal Feria';
    $menu_exists = wp_get_nav_menu_object( $menu_name );

    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );

        // Enlaces del menú (Anchor Links)
        $menu_items = array(
            array(
                'menu-item-title'  => 'MARCAS',
                'menu-item-url'    => '#marcas',
                'menu-item-status' => 'publish'
            ),
            array(
                'menu-item-title'  => 'AGENDA',
                'menu-item-url'    => '#agenda',
                'menu-item-status' => 'publish'
            ),
            array(
                'menu-item-title'  => 'AUSPICIADORES',
                'menu-item-url'    => '#auspiciadores',
                'menu-item-status' => 'publish'
            ),
        );

        foreach ( $menu_items as $item ) {
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'   =>  $item['menu-item-title'],
                'menu-item-url'     =>  $item['menu-item-url'],
                'menu-item-status'  =>  $item['menu-item-status'],
                'menu-item-type'    => 'custom',
            ) );
        }

        // Asignar el menú a la ubicación del tema
        $locations = get_theme_mod( 'nav_menu_locations' );
        $locations['primary'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    // 6.4. Inyectar eventos de la Agenda (Día 11 y 12) en la base de datos
    $agenda_check = new WP_Query( array(
        'post_type'      => 'evento_agenda',
        'posts_per_page' => 1
    ) );

    if ( ! $agenda_check->have_posts() ) {
        $events_to_create = array(
            // Día 11
            array(
                'time'  => '12:30 p.m.',
                'title' => 'Diana Crousillat - Fundación Oli',
                'tag'   => 'Conversatorio',
                'day'   => '11',
                'img'   => '1.webp'
            ),
            array(
                'time'  => '01:00 p.m.',
                'title' => 'Sandra - Founder : Sophie Crown',
                'tag'   => 'Conversatorio',
                'day'   => '11',
                'img'   => '2.webp'
            ),
            array(
                'time'  => '01:30 p.m.',
                'title' => 'Mariana Vertiz',
                'tag'   => 'Conversatorio',
                'day'   => '11',
                'img'   => '3.webp'
            ),
            array(
                'time'  => '02:00 p.m.',
                'title' => 'Mavila Huertas',
                'tag'   => 'Conversatorio',
                'day'   => '11',
                'img'   => '4.webp'
            ),
            array(
                'time'  => '02:30 p.m.',
                'title' => 'Leslie Stewart',
                'tag'   => 'Conversatorio',
                'day'   => '11',
                'img'   => '5.webp'
            ),
            array(
                'time'  => '03:00 p.m.',
                'title' => 'Nea Paz',
                'tag'   => 'Conversatorio',
                'day'   => '11',
                'img'   => '6.webp'
            ),
            array(
                'time'  => '03:30 p.m.',
                'title' => 'Moni Villar',
                'tag'   => 'Conversatorio',
                'day'   => '11',
                'img'   => '7.webp'
            ),
            array(
                'time'  => '04:00 p.m.',
                'title' => 'Astrid Gutsche',
                'tag'   => 'Conversatorio',
                'day'   => '11',
                'img'   => '8.webp'
            ),
            array(
                'time'  => '04:30 p.m.',
                'title' => 'Johanna San Miguel',
                'tag'   => 'Conversatorio',
                'day'   => '11',
                'img'   => '9.webp'
            ),
            array(
                'time'  => '05:00 p.m.',
                'title' => 'Johanna San Miguel',
                'tag'   => 'Show Estelar',
                'day'   => '11',
                'img'   => '10.webp'
            ),
            array(
                'time'  => '06:00 p.m.',
                'title' => 'Desfile de modas',
                'tag'   => 'Conversatorio',
                'day'   => '11',
                'img'   => '11.webp'
            ),
            array(
                'time'  => '07:00 p.m.',
                'title' => 'Marina Mora',
                'tag'   => 'Charla Skincare',
                'day'   => '11',
                'img'   => '12.webp'
            ),
            // Día 12
            array(
                'time'  => '11:30 a.m.',
                'title' => 'Cinthya - La maquilladora',
                'tag'   => 'Conversatorio',
                'day'   => '12',
                'img'   => '13.webp'
            ),
            array(
                'time'  => '02:30 p.m.',
                'title' => 'Wendy Wunder',
                'tag'   => 'Conversatorio (diferido)',
                'day'   => '12',
                'img'   => '14.webp'
            ),
            array(
                'time'  => '03:00 p.m.',
                'title' => 'Miranda Salaverry',
                'tag'   => 'Conversatorio',
                'day'   => '12',
                'img'   => '15.webp'
            ),
            array(
                'time'  => '03:30 p.m.',
                'title' => 'Francisca Aronsson',
                'tag'   => 'Conversatorio',
                'day'   => '12',
                'img'   => '16.webp'
            ),
            array(
                'time'  => '04:00 p.m.',
                'title' => 'Andrea Llosa',
                'tag'   => 'Conversatorio',
                'day'   => '12',
                'img'   => '17.webp'
            ),
        );

        // Cargar dependencias de WordPress para la gestión de archivos en el frontend/init
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );

        foreach ( $events_to_create as $event ) {
            $new_event = array(
                'post_type'   => 'evento_agenda',
                'post_title'  => $event['title'],
                'post_status' => 'publish',
                'post_author' => 1
            );
            $event_id = wp_insert_post( $new_event );
            if ( $event_id ) {
                update_post_meta( $event_id, '_evento_hora', $event['time'] );
                update_post_meta( $event_id, '_evento_dia', $event['day'] );
                update_post_meta( $event_id, '_evento_tag', $event['tag'] );
                
                // Mover archivo del tema a la carpeta de uploads de WordPress
                $theme_img_path = get_template_directory() . '/uploads/agenda/' . $event['img'];
                if ( file_exists( $theme_img_path ) ) {
                    // Copiar a un directorio temporal para que WordPress pueda procesarlo
                    $wp_upload_dir = wp_upload_dir();
                    // Usar nombre de archivo numérico original plano (1.webp, 2.webp, etc)
                    $filename = $event['img'];
                    $copy_path = $wp_upload_dir['path'] . '/' . $filename;
                    
                    if ( copy( $theme_img_path, $copy_path ) ) {
                        $filetype = wp_check_filetype( $filename, null );
                        $attachment = array(
                            'guid'           => $wp_upload_dir['url'] . '/' . $filename, 
                            'post_mime_type' => $filetype['type'],
                            'post_title'     => preg_replace( '/\.[^.]+$/', '', $filename ), // Título en media library: "1", "2", etc
                            'post_content'   => '',
                            'post_status'    => 'inherit'
                        );
                        
                        $attach_id = wp_insert_attachment( $attachment, $copy_path, $event_id );
                        if ( ! is_wp_error( $attach_id ) ) {
                            $attach_data = wp_generate_attachment_metadata( $attach_id, $copy_path );
                            wp_update_attachment_metadata( $attach_id, $attach_data );
                            set_post_thumbnail( $event_id, $attach_id );
                        }
                    }
                }
            }
        }
    }

    // 6.5. Asignar la imagen destacada de la página principal (Home) por defecto
    $front_page_id = get_option( 'page_on_front' );
    if ( ! $front_page_id ) {
        // Buscar la primera página que exista
        $pages = get_pages( array( 'number' => 1 ) );
        if ( ! empty( $pages ) ) {
            $front_page_id = $pages[0]->ID;
        }
    }

    if ( $front_page_id && ! has_post_thumbnail( $front_page_id ) ) {
        $featured_img_path = get_template_directory() . '/uploads/empoderadas_emprendedoras.webp';
        if ( file_exists( $featured_img_path ) ) {
            $wp_upload_dir = wp_upload_dir();
            $filename = 'empoderadas_emprendedoras.webp';
            $copy_path = $wp_upload_dir['path'] . '/' . $filename;
            
            if ( copy( $featured_img_path, $copy_path ) ) {
                $filetype = wp_check_filetype( $filename, null );
                $attachment = array(
                    'guid'           => $wp_upload_dir['url'] . '/' . $filename,
                    'post_mime_type' => $filetype['type'],
                    'post_title'     => 'Feria Empoderadas y Emprendedoras',
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                );
                
                $attach_id = wp_insert_attachment( $attachment, $copy_path, $front_page_id );
                if ( ! is_wp_error( $attach_id ) ) {
                    $attach_data = wp_generate_attachment_metadata( $attach_id, $copy_path );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                    set_post_thumbnail( $front_page_id, $attach_id );
                }
            }
        }
    }
}
add_action( 'init', 'empoderadas_auto_setup_on_activation' );


/* ==========================================================================
   7. CUSTOM WALKERS PARA MENÚS DE NAVEGACIÓN
   ========================================================================== */
class Empoderadas_Nav_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $url   = ! empty( $item->url ) ? $item->url : '';

        $output .= sprintf(
            '<a href="%1$s" class="eeNavLink" style="color:#fff; text-decoration:none; font-family:\'Obviously Narrow\',sans-serif; font-size:15px; letter-spacing:1.5px; font-weight:600; white-space:nowrap; text-shadow:0 1px 4px rgba(74,53,80,0.4);">%2$s</a>',
            esc_url( $url ),
            esc_html( $title )
        );
    }
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        // No necesitamos etiquetas de cierre li
    }
}

class Empoderadas_Mobile_Nav_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $url   = ! empty( $item->url ) ? $item->url : '';

        // Agrega borde inferior excepto al último elemento
        $style = "color:#fff; text-decoration:none; font-family:'Obviously Narrow',sans-serif; font-size:15px; letter-spacing:1.5px; font-weight:600; padding:12px 0; border-bottom:1px solid rgba(255,255,255,0.15);";

        $output .= sprintf(
            '<a href="%1$s" style="%2$s">%3$s</a>',
            esc_url( $url ),
            esc_attr( $style ),
            esc_html( $title )
        );
    }
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        // Sin li
    }
}

/* ==========================================================================
   8. HELPERS Y UTILERÍAS
   ========================================================================== */
/**
 * Retorna un SVG estético en base64 para actuar como placeholder de imagen.
 */
function empoderadas_get_placeholder_svg( $width = 300, $height = 300, $text = 'Empoderadas' ) {
    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="' . $width . '" height="' . $height . '" viewBox="0 0 ' . $width . ' ' . $height . '">
        <defs>
            <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" style="stop-color:#CFACDF;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#9B79B9;stop-opacity:1" />
            </linearGradient>
        </defs>
        <rect width="100%" height="100%" fill="url(#grad)" />
        <circle cx="' . ($width / 2) . '" cy="' . ($height / 2 - 20) . '" r="' . (min($width, $height) / 4) . '" fill="#ffffff" opacity="0.15" />
        <text x="50%" y="55%" font-family="\'Oswald\', sans-serif" font-weight="bold" font-size="20" fill="#ffffff" text-anchor="middle" opacity="0.85">' . esc_html( $text ) . '</text>
    </svg>';
    
    return 'data:image/svg+xml;base64,' . base64_encode( $svg );
}

/* ==========================================================================
   9. HARDENING Y SEGURIDAD (WORDPRESS HARDENING)
   ========================================================================== */

/**
 * Inyectar cabeceras de seguridad HTTP HTTP
 */
function empoderadas_security_headers() {
    if ( ! is_admin() ) {
        header( "X-Frame-Options: SAMEORIGIN" );
        header( "X-Content-Type-Options: nosniff" );
        header( "X-XSS-Protection: 1; mode=block" );
        header( "Referrer-Policy: no-referrer-when-downgrade" );
        header( "Content-Security-Policy: default-src 'self' https: data: 'unsafe-inline' 'unsafe-eval';" );
    }
}
add_action( 'send_headers', 'empoderadas_security_headers' );

/**
 * Remover número de versión de WordPress del head y de los feeds
 */
add_filter( 'the_generator', '__return_false' );

/**
 * Bloquear endpoint de la API REST que expone información de usuarios / autores
 */
add_filter( 'rest_endpoints', function( $endpoints ) {
    if ( isset( $endpoints['/wp/v2/users'] ) ) {
        unset( $endpoints['/wp/v2/users'] );
    }
    if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
        unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
    }
    return $endpoints;
} );

/**
 * Desactivar XML-RPC y cabecera Pingback para mitigar ataques DDoS
 */
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'wp_headers', function( $headers ) {
    unset( $headers['X-Pingback'] );
    return $headers;
} );

/**
 * Inyectar Schema JSON-LD estructurado en el wp_head para la Landing Page
 */
function empoderadas_inject_json_ld_schema() {
    if ( is_front_page() || is_home() ) {
        $location_name = get_theme_mod( 'banner_location_name', 'Country Club' );
        $location_address = get_theme_mod( 'banner_location_address', 'Ca. Los Eucaliptos 590, San Isidro' );
        $logo_url = get_template_directory_uri() . '/logo-empoderadas.png';
        
        $schema = array(
            '@context'    => 'https://schema.org',
            '@graph'      => array(
                array(
                    '@type'       => 'Event',
                    '@id'         => home_url( '/#event' ),
                    'name'        => 'Feria Empoderadas y Emprendedoras',
                    'description' => get_bloginfo( 'description' ) ? get_bloginfo( 'description' ) : 'Más que una feria, el evento que reúne lo mejor del talento femenino peruano.',
                    'startDate'   => '2026-07-11T11:30:00-05:00',
                    'endDate'     => '2026-07-12T21:00:00-05:00',
                    'eventStatus' => 'https://schema.org/EventScheduled',
                    'eventAttendanceMode' => 'https://schema.org/OfflineEventAttendanceMode',
                    'location'    => array(
                        '@type'   => 'Place',
                        'name'    => $location_name,
                        'address' => array(
                            '@type'          => 'PostalAddress',
                            'streetAddress'  => $location_address,
                            'addressLocality'=> 'San Isidro',
                            'addressRegion'  => 'Lima',
                            'addressCountry' => 'PE'
                        )
                    ),
                    'image'       => array(
                        get_template_directory_uri() . '/screenshot.png'
                    ),
                    'offers'      => array(
                        '@type'         => 'Offer',
                        'price'         => '0',
                        'priceCurrency' => 'PEN',
                        'availability'  => 'https://schema.org/InStock',
                        'url'           => home_url( '/' )
                    ),
                    'organizer'   => array(
                        '@type' => 'Organization',
                        'name'  => 'Empoderadas y Emprendedoras',
                        'url'   => home_url( '/' ),
                        'logo'  => $logo_url
                    )
                ),
                array(
                    '@type' => 'LocalBusiness',
                    '@id'   => home_url( '/#organization' ),
                    'name'  => 'Feria Empoderadas y Emprendedoras',
                    'image' => $logo_url,
                    'url'   => home_url( '/' ),
                    'telephone' => '',
                    'address' => array(
                        '@type' => 'PostalAddress',
                        'streetAddress' => $location_address,
                        'addressLocality' => 'San Isidro',
                        'addressRegion' => 'Lima',
                        'addressCountry' => 'PE'
                    )
                )
            )
        );
        
        echo "\n<!-- Schema JSON-LD inyectado por el Tema -->\n";
        echo '<script type="application/ld+json">' . json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
    }
}
add_action( 'wp_head', 'empoderadas_inject_json_ld_schema' );


/* ==========================================================================
   8. REGISTROS DE FORMULARIOS CTA Y EXPORTACIÓN A CSV
   ========================================================================== */

// Registrar CPT para Feriantes y Comunidad
function empoderadas_registrar_cpts_formularios() {
    register_post_type( 'registro_feriante', array(
        'labels' => array(
            'name'               => 'Registros Feriantes',
            'singular_name'      => 'Registro Feriante',
            'menu_name'          => 'Registros Feriantes',
            'all_items'          => 'Todos los Registros',
            'view_item'          => 'Ver Registro',
            'search_items'       => 'Buscar Registros',
            'not_found'          => 'No se encontraron registros',
        ),
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 26,
        'menu_icon'          => 'dashicons-clipboard',
        'supports'           => array( 'title' )
    ));

    register_post_type( 'registro_comunidad', array(
        'labels' => array(
            'name'               => 'Registros Comunidad',
            'singular_name'      => 'Registro Comunidad',
            'menu_name'          => 'Registros Comunidad',
            'all_items'          => 'Todos los Registros',
            'view_item'          => 'Ver Registro',
            'search_items'       => 'Buscar Registros',
            'not_found'          => 'No se encontraron registros',
        ),
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 27,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title' )
    ));
}
add_action( 'init', 'empoderadas_registrar_cpts_formularios' );

// Agregar meta boxes para visualizar los datos en el panel
function empoderadas_add_cta_meta_boxes() {
    add_meta_box( 'detalles_registro_feriante', 'Detalles del Feriante', 'empoderadas_render_feriante_meta_box', 'registro_feriante', 'normal', 'high' );
    add_meta_box( 'detalles_registro_comunidad', 'Detalles de Comunidad', 'empoderadas_render_comunidad_meta_box', 'registro_comunidad', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'empoderadas_add_cta_meta_boxes' );

function empoderadas_render_feriante_meta_box( $post ) {
    $emp = get_post_meta( $post->ID, '_feriante_emprendimiento', true );
    $rub = get_post_meta( $post->ID, '_feriante_rubro', true );
    $ciu = get_post_meta( $post->ID, '_feriante_ciudad', true );
    $cel = get_post_meta( $post->ID, '_feriante_celular', true );
    $cor = get_post_meta( $post->ID, '_feriante_correo', true );
    $ins = get_post_meta( $post->ID, '_feriante_instagram', true );
    $web = get_post_meta( $post->ID, '_feriante_web', true );
    ?>
    <table class="form-table">
        <tr><th>Emprendimiento:</th><td><strong><?php echo esc_html($emp); ?></strong></td></tr>
        <tr><th>Rubro:</th><td><?php echo esc_html($rub); ?></td></tr>
        <tr><th>Ciudad:</th><td><?php echo esc_html($ciu); ?></td></tr>
        <tr><th>Celular:</th><td><?php echo esc_html($cel); ?></td></tr>
        <tr><th>Correo:</th><td><?php echo esc_html($cor); ?></td></tr>
        <tr><th>Instagram/Facebook:</th><td><?php echo esc_html($ins); ?></td></tr>
        <tr><th>Web:</th><td><?php echo esc_html($web); ?></td></tr>
    </table>
    <?php
}

function empoderadas_render_comunidad_meta_box( $post ) {
    $cel = get_post_meta( $post->ID, '_comunidad_celular', true );
    $cor = get_post_meta( $post->ID, '_comunidad_correo', true );
    $ciu = get_post_meta( $post->ID, '_comunidad_ciudad', true );
    ?>
    <table class="form-table">
        <tr><th>Celular:</th><td><?php echo esc_html($cel); ?></td></tr>
        <tr><th>Correo:</th><td><?php echo esc_html($cor); ?></td></tr>
        <tr><th>Ciudad:</th><td><?php echo esc_html($ciu); ?></td></tr>
    </table>
    <?php
}

// Agregar botón de exportación CSV en las listas del Admin
function empoderadas_agregar_boton_exportar_csv( $which ) {
    global $typenow;
    if ( $typenow === 'registro_feriante' || $typenow === 'registro_comunidad' ) {
        $action = ( $typenow === 'registro_feriante' ) ? 'export_feriantes_csv' : 'export_comunidad_csv';
        $export_url = add_query_arg( array( 'action' => $action, 'noheader' => 'true' ), admin_url( 'admin-ajax.php' ) );
        echo '<a href="' . esc_url( $export_url ) . '" class="button button-primary" style="margin-left: 5px; margin-top: 1px;">Descargar CSV</a>';
    }
}
add_action( 'manage_posts_extra_tablenav', 'empoderadas_agregar_boton_exportar_csv' );

// Procesar descarga CSV
function empoderadas_exportar_feriantes_csv() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Permiso denegado' );
    }

    header( 'Content-Type: text/csv; charset=utf-8' );
    header( 'Content-Disposition: attachment; filename=registros-feriantes-' . date('Y-m-d') . '.csv' );

    $output = fopen( 'php://output', 'w' );
    // Añadir BOM para compatibilidad con Excel en UTF-8
    fprintf( $output, chr(0xEF).chr(0xBB).chr(0xBF) );

    fputcsv( $output, array( 'Nombre y Apellidos', 'Emprendimiento', 'Rubro', 'Ciudad', 'Celular', 'Correo electrónico', 'Instagram/Facebook', 'Web', 'Fecha' ) );

    $query = new WP_Query( array(
        'post_type'      => 'registro_feriante',
        'posts_per_page' => -1,
        'post_status'    => 'publish'
    ));

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $post_id = get_the_ID();
            fputcsv( $output, array(
                get_the_title(),
                get_post_meta( $post_id, '_feriante_emprendimiento', true ),
                get_post_meta( $post_id, '_feriante_rubro', true ),
                get_post_meta( $post_id, '_feriante_ciudad', true ),
                get_post_meta( $post_id, '_feriante_celular', true ),
                get_post_meta( $post_id, '_feriante_correo', true ),
                get_post_meta( $post_id, '_feriante_instagram', true ),
                get_post_meta( $post_id, '_feriante_web', true ),
                get_the_date( 'Y-m-d H:i:s' )
            ));
        }
        wp_reset_postdata();
    }
    fclose( $output );
    exit;
}
add_action( 'wp_ajax_export_feriantes_csv', 'empoderadas_exportar_feriantes_csv' );

function empoderadas_exportar_comunidad_csv() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Permiso denegado' );
    }

    header( 'Content-Type: text/csv; charset=utf-8' );
    header( 'Content-Disposition: attachment; filename=registros-comunidad-' . date('Y-m-d') . '.csv' );

    $output = fopen( 'php://output', 'w' );
    fprintf( $output, chr(0xEF).chr(0xBB).chr(0xBF) );

    fputcsv( $output, array( 'Nombre y Apellidos', 'Celular', 'Correo electrónico', 'Ciudad', 'Fecha' ) );

    $query = new WP_Query( array(
        'post_type'      => 'registro_comunidad',
        'posts_per_page' => -1,
        'post_status'    => 'publish'
    ));

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $post_id = get_the_ID();
            fputcsv( $output, array(
                get_the_title(),
                get_post_meta( $post_id, '_comunidad_celular', true ),
                get_post_meta( $post_id, '_comunidad_correo', true ),
                get_post_meta( $post_id, '_comunidad_ciudad', true ),
                get_the_date( 'Y-m-d H:i:s' )
            ));
        }
        wp_reset_postdata();
    }
    fclose( $output );
    exit;
}
add_action( 'wp_ajax_export_comunidad_csv', 'empoderadas_exportar_comunidad_csv' );

// AJAX: Procesar envío de formulario CTA
function empoderadas_guardar_registro_cta() {
    $form_type = isset( $_POST['form_type'] ) ? sanitize_text_field( $_POST['form_type'] ) : '';
    $nombre    = isset( $_POST['nombre'] ) ? sanitize_text_field( $_POST['nombre'] ) : '';

    if ( empty( $nombre ) ) {
        wp_send_json_error( array( 'message' => 'El nombre es obligatorio.' ) );
    }

    if ( $form_type === 'feriante' ) {
        $post_id = wp_insert_post( array(
            'post_title'  => $nombre,
            'post_type'   => 'registro_feriante',
            'post_status' => 'publish'
        ));

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, '_feriante_emprendimiento', sanitize_text_field( $_POST['emprendimiento'] ) );
            update_post_meta( $post_id, '_feriante_rubro',          sanitize_text_field( $_POST['rubro'] ) );
            update_post_meta( $post_id, '_feriante_ciudad',         sanitize_text_field( $_POST['ciudad'] ) );
            update_post_meta( $post_id, '_feriante_celular',        sanitize_text_field( $_POST['celular'] ) );
            update_post_meta( $post_id, '_feriante_correo',         sanitize_email( $_POST['correo'] ) );
            update_post_meta( $post_id, '_feriante_instagram',      sanitize_text_field( $_POST['instagram'] ) );
            update_post_meta( $post_id, '_feriante_web',            sanitize_text_field( $_POST['web'] ) );
            wp_send_json_success( array( 'message' => '¡Tu registro se ha completado con éxito!' ) );
        }
    } elseif ( $form_type === 'comunidad' ) {
        $post_id = wp_insert_post( array(
            'post_title'  => $nombre,
            'post_type'   => 'registro_comunidad',
            'post_status' => 'publish'
        ));

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, '_comunidad_celular', sanitize_text_field( $_POST['celular'] ) );
            update_post_meta( $post_id, '_comunidad_correo',  sanitize_email( $_POST['correo'] ) );
            update_post_meta( $post_id, '_comunidad_ciudad',  sanitize_text_field( $_POST['ciudad'] ) );
            wp_send_json_success( array( 'message' => '¡Te has unido a la comunidad exitosamente!' ) );
        }
    }

    wp_send_json_error( array( 'message' => 'Error al procesar el formulario.' ) );
}
add_action( 'wp_ajax_guardar_registro_cta', 'empoderadas_guardar_registro_cta' );
add_action( 'wp_ajax_nopriv_guardar_registro_cta', 'empoderadas_guardar_registro_cta' );



