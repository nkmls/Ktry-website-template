<?php get_header(); ?>

<div class="max-w-screen-xl mx-auto px-6 pt-16 pb-20">
  <?php while (have_posts()) : the_post(); ?>
    <?php
    $ktry_pvm    = get_post_meta(get_the_ID(), '_ktry_tapahtuma_pvm', true);
    $ktry_alku   = get_post_meta(get_the_ID(), '_ktry_tapahtuma_alku', true);
    $ktry_loppu  = get_post_meta(get_the_ID(), '_ktry_tapahtuma_loppu', true);
    $ktry_paikka = get_post_meta(get_the_ID(), '_ktry_tapahtuma_paikka', true);
    $ktry_ilmo   = get_post_meta(get_the_ID(), '_ktry_tapahtuma_ilmoittautuminen', true);
    $ktry_aika   = $ktry_alku ? ($ktry_loppu ? $ktry_alku . '–' . $ktry_loppu : $ktry_alku) : '';
    ?>
    <article class="max-w-2xl mx-auto">
      <div class="text-xs font-semibold tracking-[3px] text-tertiary">TAPAHTUMA</div>
      <h1 class="section-header mt-2"><?php the_title(); ?></h1>

      <?php if ($ktry_pvm || $ktry_aika || $ktry_paikka || $ktry_ilmo) : ?>
        <div class="mt-5 glassy p-6 rounded-3xl border border-white/60 space-y-2 text-sm text-[#6B7280]">
          <?php if ($ktry_pvm) : ?>
            <p><i class="fa-regular fa-calendar mr-2 text-primary"></i><?php echo esc_html(date_i18n('j.n.Y', strtotime($ktry_pvm))); ?><?php if ($ktry_aika) : ?> klo <?php echo esc_html($ktry_aika); ?><?php endif; ?></p>
          <?php elseif ($ktry_aika) : ?>
            <p><i class="fa-regular fa-clock mr-2 text-primary"></i>klo <?php echo esc_html($ktry_aika); ?></p>
          <?php endif; ?>
          <?php if ($ktry_paikka) : ?>
            <p><i class="fa-solid fa-location-dot mr-2 text-primary"></i><?php echo esc_html($ktry_paikka); ?></p>
          <?php endif; ?>
          <?php if ($ktry_ilmo) : ?>
            <p><i class="fa-solid fa-circle-info mr-2 text-primary"></i><?php echo esc_html($ktry_ilmo); ?></p>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if (has_post_thumbnail()) : ?>
        <div class="mt-6 rounded-3xl overflow-hidden">
          <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
        </div>
      <?php endif; ?>

      <div class="mt-8 text-lg text-[#475569] leading-relaxed">
        <?php the_content(); ?>
      </div>

      <div class="mt-10 pt-6 border-t border-white/60 text-sm">
        <a href="<?php echo esc_url(home_url('/tapahtumat')); ?>" class="text-primary font-medium hover:underline"><i class="fa-solid fa-arrow-left mr-1"></i> Kaikki tapahtumat</a>
      </div>
    </article>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>
