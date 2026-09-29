<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo esc_attr(get_theme_mod('site_description', 'Kontiolahden Työttömät ry — matalan kynnyksen kohtaamispaikka, kierrätyskeskus ja yhteisöllistä toimintaa Pohjois-Karjalassa vuodesta 1995.')); ?>">
  <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
  <meta property="og:description" content="<?php echo esc_attr(get_theme_mod('site_description', 'Kontiolahden Työttömät ry — matalan kynnyksen kohtaamispaikka, kierrätyskeskus ja yhteisöllistä toimintaa Pohjois-Karjalassa vuodesta 1995.')); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url(home_url($_SERVER['REQUEST_URI'])); ?>">
  <meta property="og:locale" content="fi_FI">
  <meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('primary_color', '#2E5B4D')); ?>">
  <?php wp_head(); ?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Kontiolahden Työttömät ry",
    "url": "<?php echo esc_url(home_url()); ?>",
    "email": "<?php echo esc_js(get_theme_mod('footer_email', 'kontiolahden.tyottomat@gmail.com')); ?>",
    "telephone": "<?php echo esc_js(get_theme_mod('footer_phone', '045 888 1255')); ?>",
    "foundingDate": "1995",
    "address": [
      { "@type": "PostalAddress", "streetAddress": "Koulukuja 4 A", "addressLocality": "Kontiolahti", "postalCode": "81100", "addressCountry": "FI" },
      { "@type": "PostalAddress", "streetAddress": "Keskuskatu 21", "addressLocality": "Kontiolahti", "postalCode": "81100", "addressCountry": "FI" }
    ]
  }
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "Kontiolahden Työttömät ry",
    "url": "<?php echo esc_url(home_url()); ?>",
    "description": "<?php echo esc_js(get_theme_mod('site_description', '')); ?>",
    "inLanguage": "fi"
  }
  </script>
  <style>
    .glassy { background: rgba(255,255,255,0.78); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.45); }
    .section-header { font-size: 2.5rem; font-weight: 700; line-height: 1.2; }
    .modern-card { transition: all .2s ease; }
    .modern-card:hover { transform: translateY(-6px); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); }
    .text-primary { color: var(--primary); }
    .text-tertiary { color: var(--tertiary); }
    .bg-primary { background: var(--primary); }
    .bg-tertiary { background: var(--tertiary); }
    .border-primary { border-color: var(--primary); }
    /* Saavutettavuus — näkyvä fokus keyboard-navigaatiolle */
    :focus-visible { outline: 3px solid var(--primary); outline-offset: 2px; border-radius: 2px; }
    .skip-link:focus { position: fixed; top: 12px; left: 12px; z-index: 200; padding: 12px 20px; background: var(--primary); color: white; border-radius: 12px; font-weight: 500; text-decoration: none; }

    .entry-content p, article p, .content-area p { margin-bottom: 1.25em; }
    .entry-content h1, article h1, .content-area h1 { margin: 1.2em 0 .6em; }
    .entry-content h2, article h2, .content-area h2 { margin: 1.1em 0 .5em; }
    .entry-content h3, article h3, .content-area h3 { margin: 1em 0 .4em; }
    .entry-content ul, .entry-content ol, article ul, article ol { margin-bottom: 1.25em; padding-left: 1.5em; }
    .wp-block-image, .wp-block-gallery, .wp-block-embed { margin-bottom: 1.5em; }
    .entry-content a, article a, .content-area a { color: var(--primary); text-decoration: underline; text-underline-offset: 2px; }
    .entry-content a:hover, article a:hover, .content-area a:hover { color: var(--primary-dark); }

    /* Työpöytävalikon pudotusvalikot */
    .nav-desktop { display: none; }
    @media(min-width:768px){ .nav-desktop { display: flex; gap: 1.25rem; align-items: center; font-size: .875rem; font-weight: 500; } }
    .nav-desktop li { position: relative; list-style: none; }
    .nav-desktop > li > a { color: #6B7280; text-decoration: none; transition: color .2s; padding: 6px 0; }
    .nav-desktop > li > a:hover { color: var(--primary); }
    .nav-desktop .sub-menu { display: none; position: absolute; top: 100%; left: -12px; min-width: 180px; background: rgba(255,255,255,0.95); backdrop-filter: blur(16px); border: 1px solid rgba(255,255,255,0.5); border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.08); padding: 8px 0; z-index: 60; }
    .nav-desktop li:hover > .sub-menu { display: block; }
    .nav-desktop .sub-menu a { display: block; padding: 8px 20px; color: #6B7280; text-decoration: none; font-size: .85rem; transition: color .2s, padding-left .2s; }
    .nav-desktop .sub-menu a:hover { color: var(--primary); padding-left: 26px; }

    /* Mobiilivalikko */
    #mobile-backdrop { position: fixed; inset: 0; z-index: 100; background: rgba(0,0,0,0.3); opacity: 0; visibility: hidden; transition: opacity .3s ease, visibility .3s ease; }
    #mobile-backdrop.open { opacity: 1; visibility: visible; }
    #mobile-panel { position: fixed; top: 0; right: 0; bottom: 0; width: min(320px, 85vw); z-index: 101; background: var(--primary); transform: translateX(100%); transition: transform .35s cubic-bezier(.4,0,.2,1); display: flex; flex-direction: column; box-shadow: -10px 0 30px rgba(0,0,0,0.15); }
    #mobile-panel.open { transform: translateX(0); }
    #mobile-close { align-self: flex-end; padding: 16px 20px; background: none; border: none; cursor: pointer; color: rgba(255,255,255,0.8); font-size: 1.5rem; transition: color .2s; }
    #mobile-close:hover { color: white; }
    #mobile-panel .menu-mobile { display: flex; flex-direction: column; padding: 8px 28px 32px; flex: 1; overflow-y: auto; }
    #mobile-panel .menu-mobile li { list-style: none; }
    #mobile-panel .menu-mobile a { display: flex; align-items: center; gap: 14px; padding: 14px 0; color: rgba(255,255,255,0.9); text-decoration: none; font-size: 1.1rem; font-weight: 500; border-bottom: 1px solid rgba(255,255,255,0.12); transition: color .2s, padding-left .2s; }
    #mobile-panel .menu-mobile a:hover { color: white; padding-left: 6px; }
    #mobile-panel .menu-mobile .sub-menu a { font-size: .95rem; padding-left: 16px; opacity: .85; }
  </style>
</head>
<body <?php body_class('bg-[#F8FAFC]'); ?>>
  <a href="#main-content" class="skip-link" style="position:absolute;top:-100px;left:12px">Siirry sisältöön</a>  <nav class="sticky top-0 z-50 <?php echo get_theme_mod('header_glassy', true) ? 'glassy' : 'bg-white'; ?> border-b border-white/60">
    <div class="mx-auto px-6 py-5 flex justify-between items-center" style="max-width:var(--container-width,1280px)">
      <a href="<?php echo home_url(); ?>" class="flex items-center gap-x-3 no-underline text-inherit shrink-0">
        <?php if (has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <div class="w-9 h-9 rounded-2xl flex items-center justify-center text-white font-bold text-xl" style="background:var(--primary,#2E5B4D)">K</div>
        <?php endif; ?>
        <div><span class="font-semibold text-xl"><?php echo esc_html(get_theme_mod('header_site_title', 'Kontiolahden Työttömät')); ?></span><span class="text-xs text-[#6B7280] block -mt-1"><?php echo esc_html(get_theme_mod('header_site_tagline', 'ry')); ?></span></div>
      </a>

      <!-- Työpöytänavigaatio -->
      <?php if (has_nav_menu('primary')) : ?>
        <?php wp_nav_menu([
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => 'nav-desktop',
          'fallback_cb' => false,
          'depth' => 2,
        ]); ?>
      <?php endif; ?>

      <!-- Mobiilinappi -->
      <button id="menu-toggle" class="md:hidden p-2 text-[#6B7280] hover:text-[var(--primary)] focus:outline-none" aria-label="Avaa valikko">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
      </button>
    </div>
  </nav>

  <main id="main-content" tabindex="-1" class="focus:outline-none">

  <!-- Mobiilioverlay -->
  <div id="mobile-backdrop"></div>
  <div id="mobile-panel">
    <button id="mobile-close" aria-label="Sulje valikko">&times;</button>
    <?php if (has_nav_menu('primary')) : ?>
      <?php wp_nav_menu([
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'menu-mobile',
        'fallback_cb' => false,
        'depth' => 2,
      ]); ?>
    <?php endif; ?>
  </div>