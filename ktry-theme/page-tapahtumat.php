<?php get_header(); ?>

<div class="max-w-screen-xl mx-auto px-6 pt-16 pb-20">
  <?php while (have_posts()) : the_post(); ?>
    <div class="max-w-2xl">
      <div class="text-xs font-semibold tracking-[3px] text-tertiary">TAPAHTUMAT</div>
      <h1 class="section-header mt-1"><?php the_title(); ?></h1>
      <div class="mt-4 text-lg text-[#6B7280]"><?php the_content(); ?></div>
    </div>
  <?php endwhile; ?>

  <?php
  // Haetaan tulevat tapahtumat (custom post type: tapahtuma)
  $ktry_tanaan  = current_time('Y-m-d');
  $ktry_tulevat = [];

  if (post_type_exists('tapahtuma')) {
    $ktry_kaikki = get_posts([
      'post_type'      => 'tapahtuma',
      'posts_per_page' => -1,
      'post_status'    => 'publish',
    ]);

    foreach ($ktry_kaikki as $ktry_t) {
      $ktry_pvm = get_post_meta($ktry_t->ID, '_ktry_tapahtuma_pvm', true);
      if ($ktry_pvm === '' || $ktry_pvm >= $ktry_tanaan) {
        $ktry_tulevat[] = $ktry_t;
      }
    }

    usort($ktry_tulevat, function ($a, $b) {
      $pa = get_post_meta($a->ID, '_ktry_tapahtuma_pvm', true);
      $pb = get_post_meta($b->ID, '_ktry_tapahtuma_pvm', true);
      if ($pa === $pb) return 0;
      if ($pa === '') return 1;
      if ($pb === '') return -1;
      return strcmp($pa, $pb);
    });
  }
  ?>

  <div class="mt-12 space-y-6">
    <?php if (!empty($ktry_tulevat)) : ?>
      <?php foreach ($ktry_tulevat as $post) : setup_postdata($post); ?>
        <?php
        $ktry_pvm    = get_post_meta(get_the_ID(), '_ktry_tapahtuma_pvm', true);
        $ktry_alku   = get_post_meta(get_the_ID(), '_ktry_tapahtuma_alku', true);
        $ktry_loppu  = get_post_meta(get_the_ID(), '_ktry_tapahtuma_loppu', true);
        $ktry_paikka = get_post_meta(get_the_ID(), '_ktry_tapahtuma_paikka', true);
        $ktry_ilmo   = get_post_meta(get_the_ID(), '_ktry_tapahtuma_ilmoittautuminen', true);
        $ktry_aika   = $ktry_alku ? ($ktry_loppu ? $ktry_alku . '–' . $ktry_loppu : $ktry_alku) : '';
        ?>
        <article class="glassy p-8 rounded-3xl border border-white/60">
          <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-4">
            <h3 class="font-semibold text-lg"><?php the_title(); ?></h3>
            <?php if ($ktry_pvm || $ktry_aika) : ?>
              <span class="text-xs px-4 py-1.5 bg-tertiary text-white rounded-2xl w-fit">
                <?php
                if ($ktry_pvm) echo esc_html(date_i18n('j.n.Y', strtotime($ktry_pvm)));
                if ($ktry_pvm && $ktry_aika) echo ' • ';
                if ($ktry_aika) echo 'klo ' . esc_html($ktry_aika);
                ?>
              </span>
            <?php endif; ?>
          </div>
          <?php if ($ktry_paikka) : ?>
            <p class="text-sm text-[#6B7280] mb-3"><i class="fa-solid fa-location-dot mr-1 text-primary"></i><?php echo esc_html($ktry_paikka); ?></p>
          <?php endif; ?>
          <div class="text-sm text-[#6B7280] space-y-2"><?php the_content(); ?></div>
          <?php if ($ktry_ilmo) : ?>
            <p class="mt-4 text-sm text-[#6B7280]"><strong>Ilmoittautuminen:</strong> <?php echo esc_html($ktry_ilmo); ?></p>
          <?php endif; ?>
          <a href="<?php the_permalink(); ?>" class="text-sm mt-4 inline-block text-primary font-medium hover:underline">Tapahtuman tiedot →</a>
        </article>
      <?php endforeach; wp_reset_postdata(); ?>
    <?php else : ?>
      <div class="glassy p-8 rounded-3xl border border-white/60 text-center text-[#6B7280]">
        <i class="fa-regular fa-calendar text-3xl mb-3 block text-primary"></i>
        <p>Tulevia tapahtumia ei ole juuri nyt. Uusia tapahtumia lisätään säännöllisesti — seuraa tiedotusta!</p>
        <?php if (current_user_can('edit_posts')) : ?>
          <p class="mt-3 text-xs"><a href="<?php echo esc_url(admin_url('post-new.php?post_type=tapahtuma')); ?>" class="text-primary underline">Lisää ensimmäinen tapahtuma (ylläpito)</a></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="mt-8 glassy p-6 rounded-3xl border border-white/60 max-w-2xl text-sm text-[#6B7280]">
    <p><strong>Ilmoittautuminen:</strong> Seuraa Facebook-sivua ja kotisivuja ajantasaisista tiedoista. Ilmoittautumiset soittamalla <strong>045 888 1255</strong>.</p>
  </div>
</div>

<?php get_footer(); ?>
