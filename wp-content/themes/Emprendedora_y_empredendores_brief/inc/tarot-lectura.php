<?php
/**
 * Formulario "Lectura de Tarot" (/laferia/tarot)
 * - CPT registro_tarot como respaldo en WordPress.
 * - Handler AJAX de guardado (guardar_registro_tarot).
 * - Sincronización con Google Sheets (Drive) vía cuenta de servicio (JWT + REST API v4).
 * - Exportación CSV desde el admin (mismo patrón que registro_feriante / registro_comunidad).
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 */

// Evitar acceso directo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ==========================================================================
   1. CPT DE RESPALDO EN WORDPRESS
   ========================================================================== */
function empoderadas_registrar_cpt_tarot() {
    register_post_type( 'registro_tarot', array(
        'labels' => array(
            'name'               => 'Registros Tarot',
            'singular_name'      => 'Registro Tarot',
            'menu_name'          => 'Registros Tarot',
            'all_items'          => 'Todos los Registros',
            'view_item'          => 'Ver Registro',
            'search_items'       => 'Buscar Registros',
            'not_found'          => 'No se encontraron registros',
        ),
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 28,
        'menu_icon'          => 'dashicons-star-filled',
        'supports'           => array( 'title' ),
    ) );
}
add_action( 'init', 'empoderadas_registrar_cpt_tarot' );

// Columna de estado de sincronización con Sheets en el listado de admin
add_filter( 'manage_registro_tarot_posts_columns', function( $columns ) {
    $columns['tarot_celular'] = 'Celular';
    $columns['tarot_correo']  = 'Correo';
    $columns['tarot_sheets']  = 'Google Sheets';
    return $columns;
} );

add_action( 'manage_registro_tarot_posts_custom_column', function( $column, $post_id ) {
    if ( 'tarot_celular' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_tarot_celular', true ) );
    }
    if ( 'tarot_correo' === $column ) {
        echo esc_html( get_post_meta( $post_id, '_tarot_correo', true ) );
    }
    if ( 'tarot_sheets' === $column ) {
        $synced = get_post_meta( $post_id, '_tarot_synced_sheets', true );
        if ( $synced ) {
            echo '<span style="color:#2a8f4a; font-weight:600;">&#10003; Sincronizado</span>';
        } else {
            $error = get_post_meta( $post_id, '_tarot_sheets_error', true );
            echo '<span style="color:#c0392b; font-weight:600;" title="' . esc_attr( $error ) . '">&#10007; Pendiente</span>';
        }
    }
}, 10, 2 );

// Meta box con el detalle del registro
function empoderadas_add_tarot_meta_box() {
    add_meta_box( 'detalles_registro_tarot', 'Detalles del Registro', 'empoderadas_render_tarot_meta_box', 'registro_tarot', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'empoderadas_add_tarot_meta_box' );

function empoderadas_render_tarot_meta_box( $post ) {
    $cel    = get_post_meta( $post->ID, '_tarot_celular', true );
    $cor    = get_post_meta( $post->ID, '_tarot_correo', true );
    $synced = get_post_meta( $post->ID, '_tarot_synced_sheets', true );
    $error  = get_post_meta( $post->ID, '_tarot_sheets_error', true );
    ?>
    <table class="form-table">
        <tr><th>Celular:</th><td><?php echo esc_html( $cel ); ?></td></tr>
        <tr><th>Correo:</th><td><?php echo esc_html( $cor ); ?></td></tr>
        <tr><th>Google Sheets:</th><td><?php echo $synced ? '&#10003; Sincronizado' : '&#10007; Pendiente' . ( $error ? ' — ' . esc_html( $error ) : '' ); ?></td></tr>
    </table>
    <?php
}

/* ==========================================================================
   2. HANDLER AJAX DEL FORMULARIO
   ========================================================================== */
function empoderadas_guardar_registro_tarot() {
    check_ajax_referer( 'empoderadas_tarot_nonce', 'nonce' );

    // Honeypot anti-spam (campo oculto que un bot llenaría)
    if ( ! empty( $_POST['website'] ) ) {
        wp_send_json_success( array( 'message' => '¡Gracias! Te contactaremos pronto.' ) );
    }

    $nombre  = isset( $_POST['nombre'] ) ? sanitize_text_field( $_POST['nombre'] ) : '';
    $celular = isset( $_POST['celular'] ) ? sanitize_text_field( $_POST['celular'] ) : '';
    $correo  = isset( $_POST['correo'] ) ? sanitize_email( $_POST['correo'] ) : '';

    if ( empty( $nombre ) || empty( $celular ) || empty( $correo ) ) {
        wp_send_json_error( array( 'message' => 'Por favor completa todos los campos.' ) );
    }

    if ( ! is_email( $correo ) ) {
        wp_send_json_error( array( 'message' => 'El correo ingresado no es válido.' ) );
    }

    $post_id = wp_insert_post( array(
        'post_title'  => $nombre,
        'post_type'   => 'registro_tarot',
        'post_status' => 'publish',
    ) );

    if ( ! $post_id || is_wp_error( $post_id ) ) {
        wp_send_json_error( array( 'message' => 'Error al procesar el formulario.' ) );
    }

    update_post_meta( $post_id, '_tarot_celular', $celular );
    update_post_meta( $post_id, '_tarot_correo', $correo );

    // Intentar sincronizar en vivo con Google Sheets (no bloquea la respuesta al usuario si falla)
    $sync_result = empoderadas_google_sheets_append_row( array(
        $nombre,
        $celular,
        $correo,
        current_time( 'Y-m-d H:i:s' ),
    ) );

    if ( is_wp_error( $sync_result ) ) {
        update_post_meta( $post_id, '_tarot_synced_sheets', 0 );
        update_post_meta( $post_id, '_tarot_sheets_error', $sync_result->get_error_message() );
        error_log( 'Tarot -> Google Sheets: ' . $sync_result->get_error_message() );
    } else {
        update_post_meta( $post_id, '_tarot_synced_sheets', 1 );
        delete_post_meta( $post_id, '_tarot_sheets_error' );
    }

    wp_send_json_success( array( 'message' => '¡Listo! Tu registro para la lectura de tarot fue confirmado.' ) );
}
add_action( 'wp_ajax_guardar_registro_tarot', 'empoderadas_guardar_registro_tarot' );
add_action( 'wp_ajax_nopriv_guardar_registro_tarot', 'empoderadas_guardar_registro_tarot' );

/* ==========================================================================
   3. BULK ACTION: REINTENTAR SINCRONIZACIÓN PENDIENTE
   ========================================================================== */
add_filter( 'bulk_actions-edit-registro_tarot', function( $actions ) {
    $actions['tarot_retry_sheets'] = 'Reintentar sincronización con Sheets';
    return $actions;
} );

add_filter( 'handle_bulk_actions-edit-registro_tarot', function( $redirect_to, $action, $post_ids ) {
    if ( 'tarot_retry_sheets' !== $action ) {
        return $redirect_to;
    }

    $retried = 0;
    foreach ( $post_ids as $post_id ) {
        $post = get_post( $post_id );
        $result = empoderadas_google_sheets_append_row( array(
            $post->post_title,
            get_post_meta( $post_id, '_tarot_celular', true ),
            get_post_meta( $post_id, '_tarot_correo', true ),
            get_the_date( 'Y-m-d H:i:s', $post_id ),
        ) );

        if ( is_wp_error( $result ) ) {
            update_post_meta( $post_id, '_tarot_sheets_error', $result->get_error_message() );
        } else {
            update_post_meta( $post_id, '_tarot_synced_sheets', 1 );
            delete_post_meta( $post_id, '_tarot_sheets_error' );
            $retried++;
        }
    }

    return add_query_arg( 'tarot_retried', $retried, $redirect_to );
}, 10, 3 );

add_action( 'admin_notices', function() {
    if ( isset( $_GET['tarot_retried'] ) ) {
        printf( '<div class="notice notice-success is-dismissible"><p>%d registro(s) sincronizado(s) con Google Sheets.</p></div>', (int) $_GET['tarot_retried'] );
    }
} );

/* ==========================================================================
   4. EXPORTACIÓN CSV (RESPALDO MANUAL, MISMO PATRÓN QUE FERIANTE/COMUNIDAD)
   ========================================================================== */
add_action( 'manage_posts_extra_tablenav', function( $which ) {
    global $typenow;
    if ( 'registro_tarot' === $typenow ) {
        $export_url = add_query_arg( array( 'action' => 'export_tarot_csv', 'noheader' => 'true' ), admin_url( 'admin-ajax.php' ) );
        echo '<a href="' . esc_url( $export_url ) . '" class="button button-primary" style="margin-left: 5px; margin-top: 1px;">Descargar CSV</a>';
    }
} );

function empoderadas_exportar_tarot_csv() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Permiso denegado' );
    }

    header( 'Content-Type: text/csv; charset=utf-8' );
    header( 'Content-Disposition: attachment; filename=registros-tarot-' . date( 'Y-m-d' ) . '.csv' );

    $output = fopen( 'php://output', 'w' );
    fprintf( $output, chr( 0xEF ) . chr( 0xBB ) . chr( 0xBF ) );

    fputcsv( $output, array( 'Nombre y Apellidos', 'Celular', 'Correo electrónico', 'Fecha' ) );

    $query = new WP_Query( array(
        'post_type'      => 'registro_tarot',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ) );

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $post_id = get_the_ID();
            fputcsv( $output, array(
                get_the_title(),
                get_post_meta( $post_id, '_tarot_celular', true ),
                get_post_meta( $post_id, '_tarot_correo', true ),
                get_the_date( 'Y-m-d H:i:s' ),
            ) );
        }
        wp_reset_postdata();
    }
    fclose( $output );
    exit;
}
add_action( 'wp_ajax_export_tarot_csv', 'empoderadas_exportar_tarot_csv' );

/* ==========================================================================
   5. INTEGRACIÓN GOOGLE SHEETS (DRIVE) — CUENTA DE SERVICIO, SIN LIBRERÍAS PESADAS
   ========================================================================== */

/**
 * Codifica una cadena o array en Base64URL (formato requerido por JWT).
 */
function empoderadas_base64url_encode( $data ) {
    return rtrim( strtr( base64_encode( $data ), '+/', '-_' ), '=' );
}

/**
 * Obtiene (y cachea en un transient) un access_token OAuth2 para la cuenta
 * de servicio de Google, firmando un JWT con la private key configurada
 * en wp-config.php. Retorna WP_Error si las credenciales no están definidas
 * o si Google rechaza la solicitud.
 */
function empoderadas_google_sheets_get_access_token() {
    if ( ! defined( 'EMPODERADAS_GOOGLE_SA_EMAIL' ) || ! defined( 'EMPODERADAS_GOOGLE_SA_PRIVATE_KEY' ) ) {
        return new WP_Error( 'tarot_sheets_no_credentials', 'Credenciales de Google Sheets no configuradas en wp-config.php.' );
    }

    $cached = get_transient( 'empoderadas_google_access_token' );
    if ( $cached ) {
        return $cached;
    }

    $now = time();
    $header = empoderadas_base64url_encode( wp_json_encode( array( 'alg' => 'RS256', 'typ' => 'JWT' ) ) );
    $claims = empoderadas_base64url_encode( wp_json_encode( array(
        'iss'   => EMPODERADAS_GOOGLE_SA_EMAIL,
        'scope' => 'https://www.googleapis.com/auth/spreadsheets',
        'aud'   => 'https://oauth2.googleapis.com/token',
        'iat'   => $now,
        'exp'   => $now + 3600,
    ) ) );

    $unsigned_jwt  = $header . '.' . $claims;
    $private_key   = str_replace( '\\n', "\n", EMPODERADAS_GOOGLE_SA_PRIVATE_KEY );
    $signature     = '';
    $signed        = openssl_sign( $unsigned_jwt, $signature, $private_key, 'sha256WithRSAEncryption' );

    if ( ! $signed ) {
        return new WP_Error( 'tarot_sheets_sign_failed', 'No se pudo firmar el JWT con la private key configurada.' );
    }

    $jwt = $unsigned_jwt . '.' . empoderadas_base64url_encode( $signature );

    $response = wp_remote_post( 'https://oauth2.googleapis.com/token', array(
        'timeout' => 15,
        'body'    => array(
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion'  => $jwt,
        ),
    ) );

    if ( is_wp_error( $response ) ) {
        return $response;
    }

    $body = json_decode( wp_remote_retrieve_body( $response ), true );

    if ( empty( $body['access_token'] ) ) {
        $error_desc = isset( $body['error_description'] ) ? $body['error_description'] : wp_remote_retrieve_body( $response );
        return new WP_Error( 'tarot_sheets_token_failed', 'Google no otorgó access_token: ' . $error_desc );
    }

    $expires_in = isset( $body['expires_in'] ) ? (int) $body['expires_in'] : 3600;
    set_transient( 'empoderadas_google_access_token', $body['access_token'], max( 60, $expires_in - 60 ) );

    return $body['access_token'];
}

/**
 * Agrega una fila al final de la Google Sheet configurada en wp-config.php
 * (EMPODERADAS_GOOGLE_SHEET_ID / EMPODERADAS_GOOGLE_SHEET_TAB).
 *
 * @param array $values Valores de la fila, en orden de columnas.
 * @return true|WP_Error
 */
function empoderadas_google_sheets_append_row( $values ) {
    if ( ! defined( 'EMPODERADAS_GOOGLE_SHEET_ID' ) ) {
        return new WP_Error( 'tarot_sheets_no_sheet_id', 'EMPODERADAS_GOOGLE_SHEET_ID no está definido en wp-config.php.' );
    }

    $token = empoderadas_google_sheets_get_access_token();
    if ( is_wp_error( $token ) ) {
        return $token;
    }

    $tab   = defined( 'EMPODERADAS_GOOGLE_SHEET_TAB' ) ? EMPODERADAS_GOOGLE_SHEET_TAB : 'Hoja 1';
    $range = rawurlencode( $tab . '!A:D' );
    $url   = "https://sheets.googleapis.com/v4/spreadsheets/" . EMPODERADAS_GOOGLE_SHEET_ID . "/values/{$range}:append?valueInputOption=USER_ENTERED&insertDataOption=INSERT_ROWS";

    $response = wp_remote_post( $url, array(
        'timeout' => 15,
        'headers' => array(
            'Authorization' => 'Bearer ' . $token,
            'Content-Type'  => 'application/json',
        ),
        'body' => wp_json_encode( array( 'values' => array( array_values( $values ) ) ) ),
    ) );

    if ( is_wp_error( $response ) ) {
        return $response;
    }

    $code = wp_remote_retrieve_response_code( $response );
    if ( $code < 200 || $code >= 300 ) {
        $body = json_decode( wp_remote_retrieve_body( $response ), true );
        $msg  = isset( $body['error']['message'] ) ? $body['error']['message'] : wp_remote_retrieve_body( $response );
        return new WP_Error( 'tarot_sheets_append_failed', 'Google Sheets API: ' . $msg );
    }

    return true;
}
