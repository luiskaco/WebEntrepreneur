<?php
/**
 * Main template file
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 * @since 1.0.0
 */

get_header();
?>

<div style="font-family:'Cormorant Garamond',serif; color:#4A3560; background:#FFF9FB; overflow-x:hidden;">

    <?php
    // Cargar secciones
    get_template_part( 'template-parts/content', 'hero' );
    get_template_part( 'template-parts/content', 'marcas' );
    get_template_part( 'template-parts/content', 'banner' );
    get_template_part( 'template-parts/content', 'agenda' );
    get_template_part( 'template-parts/content', 'auspiciadores' );
    ?>

</div>

<?php
get_footer();
