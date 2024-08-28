<?php

function theme_support() {
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_support');

// FUNCIÓN PARA MENÚS PERSONALIZADO
function add_custom_menu() {
  register_nav_menu('primary', 'Primary Menu' );
}

add_action('init', 'add_custom_menu');


//FUNCIÓN PARA FAVICON
function add_favicon() {
  $favicon_url = get_template_directory_uri() . '/assets/images/favicon.ico';
  echo '<link rel="shortcut icon" href="' . $favicon_url  . '">';
}

add_action( 'wp_head', 'add_favicon');

// FUNCIÓN PARA AGREGAR ESTILOS PERSONALIZADOS Y BOOTRSTRAP
function register_styles(){

  $version = wp_get_theme()->get( 'Version' );
  wp_enqueue_style('custom-style', get_template_directory_uri() ."/assets/css/style.css", array(), $version, 'all');
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');
  wp_enqueue_style('bootstrap-icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array(), '1.11.3', 'all');
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap', false );

}

add_action( 'wp_enqueue_scripts', 'register_styles');

// FUNCIÓN PARA SUMAR SCRIPTS
function register_scripts(){

  $version = wp_get_theme()->get( 'Version' );
  wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
  wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);
  wp_enqueue_script('stackpath', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
  wp_enqueue_script('js-script', get_template_directory_uri() ."/assets/js/main.js", array(), $version, 'all');
}

add_action( 'wp_enqueue_scripts', 'register_scripts');


// META BOXES

function wporg_add_custom_box() {
  $screens = 'post';
  add_meta_box(
      'propiedades',                 
      'Detalles de la propiedad',
      'custom_box_html',
      $screens                
  );
}
add_action( 'add_meta_boxes', 'wporg_add_custom_box' );


function custom_box_html( $post ) {
  // Recuperar los valores guardados
  $operation_type = get_post_meta($post->ID, 'wporg_field', true);
  $price = get_post_meta($post->ID, 'price', true);
  $address = get_post_meta($post->ID, 'address', true);
  $neighborhood = get_post_meta($post->ID, 'neighborhood', true);
  $city = get_post_meta($post->ID, 'city', true);
  $map_url = get_post_meta($post->ID, 'map_url', true);
  $bedrooms = get_post_meta($post->ID, 'bedrooms', true);
  $bathrooms = get_post_meta($post->ID, 'bathrooms', true);
  $surface_area = get_post_meta($post->ID, 'surface_area', true);
  ?>
  <style>
      .wporg-meta-box label {
          display: block;
          margin-bottom: 8px;
          font-weight: bold;
      }
      .wporg-meta-box input,
      .wporg-meta-box select {
          width: 100%;
          padding: 8px;
          margin-bottom: 16px;
          box-sizing: border-box;
      }
      .wporg-meta-box .description {
          font-size: 12px;
          color: #666;
          margin-bottom: 16px;
      }
  </style>

  <div class="wporg-meta-box">
  <label for="wporg_field">Tipo de operación<span class="description">(required)</span></label>
        <select name="wporg_field" id="wporg_field" required>
            <option value="">Tipo de operación</option>
            <option value="alquiler" <?php selected($operation_type, 'alquiler'); ?>>Venta</option>
            <option value="venta" <?php selected($operation_type, 'venta'); ?>>Alquiler</option>
        </select>

        <label for="price">Price <span class="description">(required, numeric)</span></label>
        <input name="price" id="price" type="number" min="0" value="<?php echo esc_attr($price); ?>" required />

        <label for="address">Address <span class="description">(required)</span></label>
        <input name="address" id="address" type="text" value="<?php echo esc_attr($address); ?>" required />

        <label for="neighborhood">Neighborhood <span class="description">(optional)</span></label>
        <input name="neighborhood" id="neighborhood" type="text" value="<?php echo esc_attr($neighborhood); ?>" />

        <label for="city">City <span class="description">(required)</span></label>
        <input name="city" id="city" type="text" value="<?php echo esc_attr($city); ?>" required />

        <label for="map_url">Google Maps Embed URL <span class="description">(required)</span></label>
        <input name="map_url" id="map_url" type="url" value="<?php echo esc_url($map_url); ?>" required />
        
        <label for="bedrooms">Number of Bedrooms <span class="description">(required, numeric)</span></label>
        <input name="bedrooms" id="bedrooms" type="number" min="0" value="<?php echo esc_attr($bedrooms); ?>" required />

        <label for="bathrooms">Number of Bathrooms <span class="description">(required, numeric)</span></label>
        <input name="bathrooms" id="bathrooms" type="number" min="0" value="<?php echo esc_attr($bathrooms); ?>" required />

        <label for="surface_area">Property Surface Area (sqm) <span class="description">(required, numeric)</span></label>
        <input name="surface_area" id="surface_area" type="number" min="0" value="<?php echo esc_attr($surface_area); ?>" required />
  </div>
  <?php 
}

function save_custom_meta_box_data($post_id) {
    // Verificar si es una autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Verificar permisos del usuario
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Guardar o actualizar los valores de los custom fields
    if (isset($_POST['wporg_field'])) {
        update_post_meta($post_id, 'wporg_field', sanitize_text_field($_POST['wporg_field']));
    }

    if (isset($_POST['price'])) {
        update_post_meta($post_id, 'price', sanitize_text_field($_POST['price']));
    }

    if (isset($_POST['address'])) {
        update_post_meta($post_id, 'address', sanitize_text_field($_POST['address']));
    }

    if (isset($_POST['neighborhood'])) {
        update_post_meta($post_id, 'neighborhood', sanitize_text_field($_POST['neighborhood']));
    }

    if (isset($_POST['city'])) {
        update_post_meta($post_id, 'city', sanitize_text_field($_POST['city']));
    }

    if (isset($_POST['map_url'])) {
        update_post_meta($post_id, 'map_url', sanitize_text_field($_POST['map_url']));
    }

    if (isset($_POST['bedrooms'])) {
        update_post_meta($post_id, 'bedrooms', sanitize_text_field($_POST['bedrooms']));
    }

    if (isset($_POST['bathrooms'])) {
        update_post_meta($post_id, 'bathrooms', sanitize_text_field($_POST['bathrooms']));
    }

    if (isset($_POST['surface_area'])) {
        update_post_meta($post_id, 'surface_area', sanitize_text_field($_POST['surface_area']));
    }
  }

  add_action('save_post', 'save_custom_meta_box_data');

?>

