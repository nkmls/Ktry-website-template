<?php
/**
 * Plugin Name: KTRY Tapahtumat
 * Description: Tapahtumien hallinta Kontiolahden Työttömät ry:n sivustolle. Lisää ja muokkaa tapahtumia wp-adminin Tapahtumat-valikossa — tulevat tapahtumat näkyvät automaattisesti Tapahtumat-sivulla.
 * Version: 1.0.0
 * Author: Kontiolahden Työttömät ry
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * Text Domain: ktry-tapahtumat
 */

if (!defined('ABSPATH')) {
  exit;
}

define('KTRY_TAPAHTUMA_POST_TYPE', 'tapahtuma');
define('KTRY_TAPAHTUMA_META_PVM', '_ktry_tapahtuma_pvm');
define('KTRY_TAPAHTUMA_META_ALKU', '_ktry_tapahtuma_alku');
define('KTRY_TAPAHTUMA_META_LOPPU', '_ktry_tapahtuma_loppu');
define('KTRY_TAPAHTUMA_META_PAIKKA', '_ktry_tapahtuma_paikka');
define('KTRY_TAPAHTUMA_META_ILMO', '_ktry_tapahtuma_ilmoittautuminen');

// === 1. TAPAHTUMAT-SISÄLTÖTYYPPI ===
function ktry_tapahtumat_register_post_type() {
  register_post_type(KTRY_TAPAHTUMA_POST_TYPE, [
    'labels' => [
      'name'               => 'Tapahtumat',
      'singular_name'      => 'Tapahtuma',
      'menu_name'          => 'Tapahtumat',
      'add_new'            => 'Lisää uusi',
      'add_new_item'       => 'Lisää uusi tapahtuma',
      'edit_item'          => 'Muokkaa tapahtumaa',
      'new_item'           => 'Uusi tapahtuma',
      'view_item'          => 'Näytä tapahtuma',
      'search_items'       => 'Etsi tapahtumia',
      'not_found'          => 'Tapahtumia ei löytynyt',
      'not_found_in_trash' => 'Tapahtumia ei löytynyt roskakorista',
    ],
    'public'        => true,
    'show_in_rest'  => true,
    'menu_icon'     => 'dashicons-calendar-alt',
    'menu_position' => 20,
    'supports'      => ['title', 'editor', 'thumbnail'],
    'has_archive'   => false,
    'rewrite'       => ['slug' => 'tapahtuma', 'with_front' => false],
  ]);
}
add_action('init', 'ktry_tapahtumat_register_post_type');

function ktry_tapahtumat_activate() {
  ktry_tapahtumat_register_post_type();
  flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'ktry_tapahtumat_activate');

function ktry_tapahtumat_deactivate() {
  flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'ktry_tapahtumat_deactivate');

// === 2. TIETOKENTÄT (META-BOX) ===
function ktry_tapahtumat_add_meta_box() {
  add_meta_box(
    'ktry_tapahtuma_tiedot',
    'Tapahtuman tiedot',
    'ktry_tapahtumat_meta_box_html',
    KTRY_TAPAHTUMA_POST_TYPE,
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'ktry_tapahtumat_add_meta_box');

function ktry_tapahtumat_meta_box_html($post) {
  wp_nonce_field('ktry_tapahtumat_save_meta', 'ktry_tapahtumat_nonce');

  $pvm    = esc_attr(get_post_meta($post->ID, KTRY_TAPAHTUMA_META_PVM, true));
  $alku   = esc_attr(get_post_meta($post->ID, KTRY_TAPAHTUMA_META_ALKU, true));
  $loppu  = esc_attr(get_post_meta($post->ID, KTRY_TAPAHTUMA_META_LOPPU, true));
  $paikka = esc_attr(get_post_meta($post->ID, KTRY_TAPAHTUMA_META_PAIKKA, true));
  $ilmo   = esc_attr(get_post_meta($post->ID, KTRY_TAPAHTUMA_META_ILMO, true));
  ?>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:4px 20px;">
    <p>
      <label for="ktry_pvm" style="display:block;font-weight:600;margin-bottom:4px;">Päivämäärä</label>
      <input type="date" id="ktry_pvm" name="ktry_pvm" value="<?php echo $pvm; ?>" style="width:100%;">
    </p>
    <p>
      <label for="ktry_alku" style="display:block;font-weight:600;margin-bottom:4px;">Alkaa</label>
      <input type="time" id="ktry_alku" name="ktry_alku" value="<?php echo $alku; ?>" style="width:100%;">
    </p>
    <p>
      <label for="ktry_loppu" style="display:block;font-weight:600;margin-bottom:4px;">Päättyy</label>
      <input type="time" id="ktry_loppu" name="ktry_loppu" value="<?php echo $loppu; ?>" style="width:100%;">
    </p>
    <p>
      <label for="ktry_paikka" style="display:block;font-weight:600;margin-bottom:4px;">Paikka</label>
      <input type="text" id="ktry_paikka" name="ktry_paikka" value="<?php echo $paikka; ?>" placeholder="Esim. Kontiotupa, Koulukuja 4" style="width:100%;">
    </p>
    <p style="grid-column:1/-1;">
      <label for="ktry_ilmoittautuminen" style="display:block;font-weight:600;margin-bottom:4px;">Ilmoittautuminen / lisätiedot</label>
      <input type="text" id="ktry_ilmoittautuminen" name="ktry_ilmoittautuminen" value="<?php echo $ilmo; ?>" placeholder="Esim. soittamalla 045 888 1255 tai paikan päällä" style="width:100%;">
    </p>
  </div>
  <p style="color:#646970;margin:8px 0 0;">Otsikko ja kuvaus tulevat yllä olevista kentistä. Päivämäärä määrää, milloin tapahtuma näkyy Tapahtumat-sivulla — menneet tapahtumat piilotetaan automaattisesti.</p>
  <?php
}

function ktry_tapahtumat_save_meta($post_id, $post) {
  if (!isset($_POST['ktry_tapahtumat_nonce'])) {
    return;
  }
  if (!wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['ktry_tapahtumat_nonce'])), 'ktry_tapahtumat_save_meta')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (wp_is_post_revision($post_id)) {
    return;
  }
  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  // Päivämäärä (YYYY-MM-DD)
  $pvm = isset($_POST['ktry_pvm']) ? sanitize_text_field(wp_unslash($_POST['ktry_pvm'])) : '';
  if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $pvm) && strtotime($pvm) !== false) {
    update_post_meta($post_id, KTRY_TAPAHTUMA_META_PVM, $pvm);
  } else {
    delete_post_meta($post_id, KTRY_TAPAHTUMA_META_PVM);
  }

  // Kellonajat (HH:MM)
  foreach (['ktry_alku' => KTRY_TAPAHTUMA_META_ALKU, 'ktry_loppu' => KTRY_TAPAHTUMA_META_LOPPU] as $field => $meta_key) {
    $value = isset($_POST[$field]) ? sanitize_text_field(wp_unslash($_POST[$field])) : '';
    if (preg_match('/^([01]\d|2[0-3]):[0-5]\d$/', $value)) {
      update_post_meta($post_id, $meta_key, $value);
    } else {
      delete_post_meta($post_id, $meta_key);
    }
  }

  // Tekstikentät
  foreach (['ktry_paikka' => KTRY_TAPAHTUMA_META_PAIKKA, 'ktry_ilmoittautuminen' => KTRY_TAPAHTUMA_META_ILMO] as $field => $meta_key) {
    $value = isset($_POST[$field]) ? sanitize_text_field(wp_unslash($_POST[$field])) : '';
    if ($value !== '') {
      update_post_meta($post_id, $meta_key, $value);
    } else {
      delete_post_meta($post_id, $meta_key);
    }
  }
}
add_action('save_post_' . KTRY_TAPAHTUMA_POST_TYPE, 'ktry_tapahtumat_save_meta', 10, 2);

// === 3. HALLINTALISTAN SARAKKEET ===
function ktry_tapahtumat_admin_columns($columns) {
  $uudet = [];
  foreach ($columns as $key => $label) {
    $uudet[$key] = $label;
    if ($key === 'title') {
      $uudet['ktry_pvm']    = 'Päivämäärä';
      $uudet['ktry_aika']   = 'Aika';
      $uudet['ktry_paikka'] = 'Paikka';
    }
  }
  return $uudet;
}
add_filter('manage_' . KTRY_TAPAHTUMA_POST_TYPE . '_posts_columns', 'ktry_tapahtumat_admin_columns');

function ktry_tapahtumat_admin_column_content($column, $post_id) {
  if ($column === 'ktry_pvm') {
    $pvm = get_post_meta($post_id, KTRY_TAPAHTUMA_META_PVM, true);
    echo $pvm ? esc_html(date_i18n('j.n.Y', strtotime($pvm))) : '—';
  } elseif ($column === 'ktry_aika') {
    $alku  = get_post_meta($post_id, KTRY_TAPAHTUMA_META_ALKU, true);
    $loppu = get_post_meta($post_id, KTRY_TAPAHTUMA_META_LOPPU, true);
    if ($alku && $loppu) {
      echo esc_html($alku . '–' . $loppu);
    } elseif ($alku) {
      echo esc_html($alku);
    } else {
      echo '—';
    }
  } elseif ($column === 'ktry_paikka') {
    $paikka = get_post_meta($post_id, KTRY_TAPAHTUMA_META_PAIKKA, true);
    echo $paikka ? esc_html($paikka) : '—';
  }
}
add_action('manage_' . KTRY_TAPAHTUMA_POST_TYPE . '_posts_custom_column', 'ktry_tapahtumat_admin_column_content', 10, 2);

function ktry_tapahtumat_sortable_columns($columns) {
  $columns['ktry_pvm'] = 'ktry_pvm';
  return $columns;
}
add_filter('manage_edit-' . KTRY_TAPAHTUMA_POST_TYPE . '_sortable_columns', 'ktry_tapahtumat_sortable_columns');

// Järjestä hallintalista päivämäärän mukaan
function ktry_tapahtumat_admin_order($query) {
  if (!is_admin() || !$query->is_main_query()) {
    return;
  }
  if ($query->get('post_type') !== KTRY_TAPAHTUMA_POST_TYPE) {
    return;
  }
  if ($query->get('orderby') === 'ktry_pvm') {
    $query->set('meta_key', KTRY_TAPAHTUMA_META_PVM);
    $query->set('orderby', 'meta_value');
    return;
  }
  if (!$query->get('orderby')) {
    $query->set('meta_key', KTRY_TAPAHTUMA_META_PVM);
    $query->set('orderby', 'meta_value');
    $query->set('order', 'DESC');
  }
}
add_action('pre_get_posts', 'ktry_tapahtumat_admin_order');
