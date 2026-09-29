<?php
/**
 * KTRY Theme - Kontiolahden Työttömät ry
 */

// === 1. TEEMA-ASETUKSET ===
function ktry_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', [
    'height' => 60, 'width' => 60,
    'flex-height' => true, 'flex-width' => true,
  ]);
  add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
  add_theme_support('wp-block-styles');
  register_nav_menus([ 'primary' => 'Päävalikko' ]);

  // Lisää aria-current="page" aktiiviselle valikkolinkille
  add_filter('nav_menu_link_attributes', function($atts, $item) {
    if (in_array('current-menu-item', $item->classes)) {
      $atts['aria-current'] = 'page';
    }
    return $atts;
  }, 10, 2);
}
add_action('after_setup_theme', 'ktry_theme_setup');

// Title-separaattori: Sivun nimi | Kontiolahden Työttömät ry
add_filter('document_title_separator', function() { return '|'; });
add_filter('document_title_parts', function($title) {
  if (is_front_page() && empty($title['title'])) {
    $title['title'] = get_bloginfo('name');
    unset($title['tagline']);
  }
  return $title;
});

// === 2. WIDGET-ALUEET ===
function ktry_widgets_init() {
  register_sidebar([
    'name' => 'Sivupalkki',
    'id' => 'sidebar-main',
    'before_widget' => '<div class="widget glassy p-6 rounded-3xl border mb-6">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="font-semibold text-lg mb-3">',
    'after_title' => '</h3>',
  ]);
  register_sidebar([
    'name' => 'Alatunniste 1',
    'id' => 'footer-1',
    'before_widget' => '<div class="widget glassy p-6 rounded-3xl border">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="font-semibold mb-2">',
    'after_title' => '</h4>',
  ]);
  register_sidebar([
    'name' => 'Alatunniste 2',
    'id' => 'footer-2',
    'before_widget' => '<div class="widget glassy p-6 rounded-3xl border">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="font-semibold mb-2">',
    'after_title' => '</h4>',
  ]);
  register_sidebar([
    'name' => 'Alatunniste 3',
    'id' => 'footer-3',
    'before_widget' => '<div class="widget glassy p-6 rounded-3xl border">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="font-semibold mb-2">',
    'after_title' => '</h4>',
  ]);
  register_sidebar([
    'name' => 'Artikkelin alapuoli',
    'id' => 'below-post',
    'before_widget' => '<div class="widget glassy p-6 rounded-3xl border mt-8">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="font-semibold mb-2">',
    'after_title' => '</h4>',
  ]);
}
add_action('widgets_init', 'ktry_widgets_init');

// === 3. SCRIPTIT JA TYYLIT ===
function ktry_enqueue_assets() {
  $selected_font = get_theme_mod('font_family', 'Inter');
  $font_url = 'https://fonts.googleapis.com/css2?family=' . urlencode($selected_font) . ':wght@400;500;600;700&display=swap';
  wp_enqueue_style('google-fonts', $font_url, [], null);
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', [], '6.5.1');
  wp_enqueue_style('ktry-theme', get_stylesheet_uri(), ['font-awesome', 'google-fonts'], '2.2');
  wp_enqueue_script('tailwind-cdn', 'https://cdn.tailwindcss.com', [], null, false);
}
add_action('wp_enqueue_scripts', 'ktry_enqueue_assets');

// === 4. CUSTOMIZER ===
function ktry_customize_register($wp_customize) {
  // --- Värit ---
  $wp_customize->add_setting('primary_color', ['default' => '#2E5B4D', 'sanitize_callback' => 'sanitize_hex_color']);
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', [
    'label' => 'Pääväri', 'section' => 'colors', 'priority' => 10,
  ]));
  $wp_customize->add_setting('tertiary_color', ['default' => '#F59E0B', 'sanitize_callback' => 'sanitize_hex_color']);
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tertiary_color', [
    'label' => 'Korostusväri (CTA)', 'section' => 'colors', 'priority' => 20,
  ]));

  // --- Typografia ---
  $wp_customize->add_section('ktry_typography', ['title' => 'Typografia', 'priority' => 60]);
  $wp_customize->add_setting('font_family', ['default' => 'Inter', 'sanitize_callback' => 'sanitize_text_field']);
  $wp_customize->add_control('font_family', ['label' => 'Fontti', 'section' => 'ktry_typography', 'type' => 'select', 'choices' => [
    'Inter' => 'Inter', 'Open+Sans' => 'Open Sans', 'Roboto' => 'Roboto', 'Lato' => 'Lato', 'system-ui' => 'Järjestelmän fontti',
  ]]);

  // --- Asettelu ---
  $wp_customize->add_section('ktry_layout', ['title' => 'Asettelu', 'priority' => 70]);
  $wp_customize->add_setting('container_width', ['default' => 1280, 'sanitize_callback' => 'absint']);
  $wp_customize->add_control('container_width', ['label' => 'Sivun maksimileveys (px)', 'section' => 'ktry_layout', 'type' => 'range', 'input_attrs' => ['min' => 960, 'max' => 1600, 'step' => 20]]);

  // --- Etusivun CTA-napit ---
  $wp_customize->add_section('ktry_frontpage', ['title' => 'Etusivun CTA-napit', 'priority' => 80]);
  $wp_customize->add_setting('cta1_text', ['default' => 'Kontiotupa', 'sanitize_callback' => 'sanitize_text_field']);
  $wp_customize->add_control('cta1_text', ['label' => 'Ensisijainen painike (teksti)', 'section' => 'ktry_frontpage', 'type' => 'text']);
  $wp_customize->add_setting('cta1_url', ['default' => '/kontiotupa', 'sanitize_callback' => 'esc_url_raw']);
  $wp_customize->add_control('cta1_url', ['label' => 'Ensisijainen painike (osoite)', 'section' => 'ktry_frontpage', 'type' => 'text']);
  $wp_customize->add_setting('cta2_text', ['default' => 'Ruokajako', 'sanitize_callback' => 'sanitize_text_field']);
  $wp_customize->add_control('cta2_text', ['label' => 'Toissijainen painike (teksti)', 'section' => 'ktry_frontpage', 'type' => 'text']);
  $wp_customize->add_setting('cta2_url', ['default' => '/ruoka-apu', 'sanitize_callback' => 'esc_url_raw']);
  $wp_customize->add_control('cta2_url', ['label' => 'Toissijainen painike (osoite)', 'section' => 'ktry_frontpage', 'type' => 'text']);
  // Hero-teksti
  $wp_customize->add_setting('hero_title', ['default' => 'Yhteisö.<br>Tuki.<br><span style="color:#6B7280">Toivo.</span>', 'sanitize_callback' => 'wp_kses_post']);
  $wp_customize->add_control('hero_title', ['label' => 'Hero-otsikko (HTML sallittu)', 'section' => 'ktry_frontpage', 'type' => 'textarea']);
  $wp_customize->add_setting('hero_subtitle', ['default' => 'Aktiivinen paikallinen yhdistys — edistämme hyvinvointia, vähennämme yksinäisyyttä ja tarjoamme matalan kynnyksen toimintaa kaikille.', 'sanitize_callback' => 'sanitize_textarea_field']);
  $wp_customize->add_control('hero_subtitle', ['label' => 'Hero-alateksti', 'section' => 'ktry_frontpage', 'type' => 'textarea']);

  // --- Ylätunniste ---
  $wp_customize->add_section('ktry_header', ['title' => 'Ylätunniste', 'priority' => 90]);
  $wp_customize->add_setting('header_site_title', ['default' => 'Kontiolahden Työttömät', 'sanitize_callback' => 'sanitize_text_field']);
  $wp_customize->add_control('header_site_title', ['label' => 'Otsikko', 'section' => 'ktry_header', 'type' => 'text']);
  $wp_customize->add_setting('header_site_tagline', ['default' => 'ry', 'sanitize_callback' => 'sanitize_text_field']);
  $wp_customize->add_control('header_site_tagline', ['label' => 'Alaotsikko', 'section' => 'ktry_header', 'type' => 'text']);
  $wp_customize->add_setting('header_glassy', ['default' => true, 'sanitize_callback' => 'wp_validate_boolean']);
  $wp_customize->add_control('header_glassy', ['label' => 'Läpikuultava ylätunniste', 'section' => 'ktry_header', 'type' => 'checkbox']);

  // --- Alatunniste ---
  $wp_customize->add_section('ktry_footer', ['title' => 'Alatunniste', 'priority' => 100]);
  $wp_customize->add_setting('footer_copyright', ['default' => 'Kontiolahden Työttömät ry', 'sanitize_callback' => 'sanitize_text_field']);
  $wp_customize->add_control('footer_copyright', ['label' => 'Copyright-teksti', 'section' => 'ktry_footer', 'type' => 'text']);
  $wp_customize->add_setting('footer_email', ['default' => 'kontiolahden.tyottomat@gmail.com', 'sanitize_callback' => 'sanitize_email']);
  $wp_customize->add_control('footer_email', ['label' => 'Sähköposti', 'section' => 'ktry_footer', 'type' => 'email']);
  $wp_customize->add_setting('footer_phone', ['default' => '045 888 1255', 'sanitize_callback' => 'sanitize_text_field']);
  $wp_customize->add_control('footer_phone', ['label' => 'Puhelin', 'section' => 'ktry_footer', 'type' => 'text']);

  // --- SEO ---
  $wp_customize->add_section('ktry_seo', ['title' => 'SEO', 'priority' => 120]);
  $wp_customize->add_setting('site_description', ['default' => 'Kontiolahden Työttömät ry — matalan kynnyksen kohtaamispaikka, kierrätyskeskus ja yhteisöllistä toimintaa Pohjois-Karjalassa vuodesta 1995.', 'sanitize_callback' => 'sanitize_textarea_field']);
  $wp_customize->add_control('site_description', ['label' => 'Sivuston kuvaus (meta description)', 'section' => 'ktry_seo', 'type' => 'textarea']);

  // --- Artikkeliasetukset ---
  $wp_customize->add_section('ktry_post', ['title' => 'Artikkeliasetukset', 'priority' => 110]);
  $wp_customize->add_setting('post_show_featured', ['default' => true, 'sanitize_callback' => 'wp_validate_boolean']);
  $wp_customize->add_control('post_show_featured', ['label' => 'Näytä artikkelikuva', 'section' => 'ktry_post', 'type' => 'checkbox']);
  $wp_customize->add_setting('post_show_author', ['default' => true, 'sanitize_callback' => 'wp_validate_boolean']);
  $wp_customize->add_control('post_show_author', ['label' => 'Näytä kirjoittajalaatikko', 'section' => 'ktry_post', 'type' => 'checkbox']);
  $wp_customize->add_setting('post_show_prevnext', ['default' => true, 'sanitize_callback' => 'wp_validate_boolean']);
  $wp_customize->add_control('post_show_prevnext', ['label' => 'Näytä edellinen/seuraava', 'section' => 'ktry_post', 'type' => 'checkbox']);
  // Blogilistauksen esikatselukuva
  $wp_customize->add_setting('home_show_featured', ['default' => true, 'sanitize_callback' => 'wp_validate_boolean']);
  $wp_customize->add_control('home_show_featured', ['label' => 'Artikkelilistauksessa esikatselukuva', 'section' => 'ktry_post', 'type' => 'checkbox']);
}
add_action('customize_register', 'ktry_customize_register');

// === 5. CUSTOMIZER CSS ===
function ktry_customizer_css() {
  $primary = get_theme_mod('primary_color', '#2E5B4D');
  $tertiary = get_theme_mod('tertiary_color', '#F59E0B');
  $font = get_theme_mod('font_family', 'Inter');
  $width = get_theme_mod('container_width', 1280);
  $font_css = str_replace('+', ' ', $font);
  if ($font_css === 'system-ui') $font_css = 'system_ui, sans-serif';
  ?>
  <style>
    :root {
      --primary: <?php echo esc_attr($primary); ?>;
      --primary-dark: <?php echo esc_attr(ktry_darken($primary, 10)); ?>;
      --tertiary: <?php echo esc_attr($tertiary); ?>;
      --body-font: '<?php echo esc_attr($font_css); ?>', system_ui, sans-serif;
      --container-width: <?php echo esc_attr($width); ?>px;
    }
    body { font-family: var(--body-font); }
    .section-header { color: var(--primary); }
    .primary-btn { background: var(--primary); color: white; }
    .primary-btn:hover { background: var(--primary-dark); }
    .max-w-screen-xl { max-width: var(--container-width) !important; }
  </style>
  <?php
}
add_action('wp_head', 'ktry_customizer_css');

function ktry_darken($hex, $percent) {
  $hex = ltrim($hex, '#');
  $r = max(0, min(255, hexdec(substr($hex,0,2)) - $percent*2.55));
  $g = max(0, min(255, hexdec(substr($hex,2,2)) - $percent*2.55));
  $b = max(0, min(255, hexdec(substr($hex,4,2)) - $percent*2.55));
  return sprintf('#%02x%02x%02x', $r, $g, $b);
}

// === 6. LYHYTKOOODIT ===
function ktry_contact_form_shortcode() {
  ob_start(); ?>
  <form class="space-y-4 max-w-md mx-auto" onsubmit="event.preventDefault(); alert('Kiitos! Otamme yhteyttä pian.');">
    <input type="text" placeholder="Nimi" class="w-full px-5 py-4 rounded-2xl glassy border border-white/60 focus:outline-none text-sm" required>
    <input type="email" placeholder="Sähköposti" class="w-full px-5 py-4 rounded-2xl glassy border border-white/60 focus:outline-none text-sm" required>
    <textarea placeholder="Viesti" rows="4" class="w-full px-5 py-4 rounded-2xl glassy border border-white/60 focus:outline-none text-sm" required></textarea>
    <button type="submit" class="primary-btn w-full py-4 rounded-2xl font-semibold">Lähetä</button>
  </form>
  <?php return ob_get_clean();
}
add_shortcode('yhteyslomake', 'ktry_contact_form_shortcode');

function ktry_member_form_shortcode() {
  ob_start(); ?>
  <form class="space-y-4 max-w-md mx-auto" onsubmit="event.preventDefault(); alert('Liittymishakemus lähetetty! Vastaamme 1-2 arkipäivässä.');">
    <input type="text" placeholder="Koko nimi" class="w-full px-5 py-4 rounded-2xl glassy border border-white/60 focus:outline-none text-sm" required>
    <input type="email" placeholder="Sähköposti" class="w-full px-5 py-4 rounded-2xl glassy border border-white/60 focus:outline-none text-sm" required>
    <input type="tel" placeholder="Puhelin" class="w-full px-5 py-4 rounded-2xl glassy border border-white/60 focus:outline-none text-sm">
    <button type="submit" class="primary-btn w-full py-4 rounded-2xl font-semibold">Lähetä liittymishakemus</button>
  </form>
  <?php return ob_get_clean();
}
add_shortcode('jasenlomake', 'ktry_member_form_shortcode');

function ktry_m365_forms_shortcode($atts) {
  $a = shortcode_atts(['src' => '', 'width' => '100%', 'height' => '500'], $atts);
  if (empty($a['src'])) return '<p style="color:#6B7280">Lisää Microsoft Forms -linkki src-attribuuttiin.</p>';
  $allowed = ['https://forms.office.com/', 'https://forms.microsoft.com/'];
  $ok = false;
  foreach ($allowed as $prefix) if (substr($a['src'], 0, strlen($prefix)) === $prefix) { $ok = true; break; }
  if (!$ok) return '<p style="color:#EF4444">Sallittuja vain Microsoft Forms -osoitteet.</p>';
  return '<iframe src="' . esc_url($a['src']) . '" width="' . esc_attr($a['width']) . '" height="' . esc_attr($a['height']) . '" frameborder="0" style="border:none;border-radius:16px;" allowfullscreen></iframe>';
}
add_shortcode('m365_forms', 'ktry_m365_forms_shortcode');

// === 7. WP 6.9 CUSTOMIZER-YHTEENSOPIVUUS ===

// Polyfill underscore: palauttaa puuttuvat apufunktiot (mm. _.contains).
// Jokainen asetus on try/catchin sisällä, ettei lukittu _ kaada koko skriptiä.
function ktry_underscore_inline_polyfill($scripts) {
  if (!isset($scripts->registered['underscore'])) return;
  $scripts->add_inline_script('underscore', '
    (function() {
      if (typeof _ === "undefined") return;
      try { if (typeof _.contains !== "function") _.contains = function(list, value) { if (typeof _.includes === "function") return _.includes(list, value); if (list && typeof list.indexOf === "function") return list.indexOf(value) >= 0; return false; }; } catch (e) {}
      try { if (typeof _.where !== "function") _.where = function(o, m) { return _.filter(o, function(i) { return _.isMatch(i, m); }); }; } catch (e) {}
      try { if (typeof _.findWhere !== "function") _.findWhere = function(o, m) { return _.find(o, function(i) { return _.isMatch(i, m); }); }; } catch (e) {}
      try { if (typeof _.pluck !== "function") _.pluck = function(o, k) { return _.map(o, function(i) { return _.property(k)(i); }); }; } catch (e) {}
      try { if (typeof _.unique !== "function") _.unique = function(a, i, c) { return _.uniq(a, i, c); }; } catch (e) {}
    })();
  ', 'after');
}
add_action('wp_default_scripts', 'ktry_underscore_inline_polyfill', 999);

// Viimeinen varmistus adminin footterissa: _.contains pakotetaan olemassaolevaksi
// riippumatta siitä mikä underscore-versio (tai esim. lodash) sivulle lopulta
// latautuu. Ajetaan kaikkien muiden footteriskriptien jälkeen.
function ktry_underscore_late_fix() {
  ?>
  <script>
  (function() {
    if (typeof window._ === "undefined") return;
    var ref = window._;
    function fallback(list, value) {
      if (typeof ref.includes === "function") return ref.includes(list, value);
      if (list && typeof list.indexOf === "function") return list.indexOf(value) >= 0;
      return false;
    }
    if (typeof ref.contains === "function") return;
    try { ref.contains = fallback; } catch (e) {}
    if (typeof ref.contains === "function") return;
    try {
      var wrapped = Object.create(ref);
      wrapped.contains = fallback;
      if (typeof wrapped.includes !== "function") wrapped.includes = fallback;
      if (typeof wrapped.include !== "function") wrapped.include = fallback;
      window._ = wrapped;
    } catch (e) {}
    if (typeof window._.contains === "function") return;
    try {
      window._ = new Proxy(ref, {
        get: function(target, prop) {
          if (prop === "contains" && typeof target.contains !== "function") return fallback;
          return target[prop];
        }
      });
    } catch (e) {}
  })();
  </script>
  <?php
}
add_action('admin_print_footer_scripts', 'ktry_underscore_late_fix', 100);


// Lisää tämä functions.php-tiedostoon

function ktry_custom_meta_tags() {
    if (is_page('etusivu') || is_front_page()) { // Etusivu
        echo '<meta name="description" content="Kuntalaisten Olohuone Kontiolahdella – matalan kynnyksen kohtaamispaikka, tuki ja yhteisö kaikille. Tapahtumat, kirpputori ja lämpimät kahvihetket." />' . "\n";
        echo '<meta name="keywords" content="Kontiotupa, Kontiolahti, työttömät, olohuone, kirpputori, tapahtumat, yhteisö" />' . "\n";
        
    } elseif (is_page('kontiotupa')) {
        echo '<meta name="description" content="Kontiotupa on Kontiolahden matalan kynnyksen kohtaamispaikka. Tule kahville, juttelemaan tai osallistumaan toimintaan." />' . "\n";
        
    } elseif (is_page('topinan-tori')) {
        echo '<meta name="description" content="Töpinän Tori on Kontiolahden kierrätyskirpputori. Myy, osta tai lahjoita tavaroita." />' . "\n";
        
    } else {
        // Oletus kaikille muille sivuille
        echo '<meta name="description" content="Kuntalaisten Olohuone Kontiolahdella – yhteisö, tuki ja toivo." />' . "\n";
    }
    
    // Schema.org (suositus)
    echo '<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Kuntalaisten Olohuone",
      "description": "Matalan kynnyksen kohtaamispaikka Kontiolahdella",
      "url": "' . home_url() . '",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Koulukuja 4",
        "addressLocality": "Kontiolahti",
        "postalCode": "81100",
        "addressCountry": "FI"
      }
    }
    </script>' . "\n";
}
add_action('wp_head', 'ktry_custom_meta_tags');
