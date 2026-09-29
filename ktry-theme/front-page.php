<?php get_header(); ?>

<header class="max-w-screen-xl mx-auto px-6 pt-20 pb-8">
  <div class="max-w-2xl">
    <div class="inline px-4 py-1 text-xs tracking-widest bg-white border border-white/60 rounded-2xl mb-6">30 VUOTTA YHTEISÖLLISYYTTÄ • 1995–2026</div>
    <h1 class="text-7xl font-bold tracking-tighter text-primary leading-none">
      <?php echo wp_kses_post(get_theme_mod('hero_title', 'Yhteisö.<br>Tuki.<br><span style="color:#6B7280">Toivo.</span>')); ?>
    </h1>
    <p class="mt-6 text-xl text-[#6B7280]"><?php echo esc_html(get_theme_mod('hero_subtitle', 'Aktiivinen paikallinen yhdistys — edistämme hyvinvointia, vähennämme yksinäisyyttä ja tarjoamme matalan kynnyksen toimintaa kaikille.')); ?></p>
    <div class="mt-8 flex flex-wrap gap-4">
      <a href="<?php echo home_url(get_theme_mod('cta1_url', '/kontiotupa')); ?>" class="primary-btn px-7 py-4 rounded-2xl font-semibold inline-flex items-center gap-2"><?php echo esc_html(get_theme_mod('cta1_text', 'Kontiotupa')); ?> <i class="fa-solid fa-arrow-right"></i></a>
      <a href="<?php echo home_url(get_theme_mod('cta2_url', '/ruoka-apu')); ?>" class="px-7 py-4 rounded-2xl border border-primary text-primary font-medium hover:bg-white transition-colors inline-flex items-center"><?php echo esc_html(get_theme_mod('cta2_text', 'Ruokajako')); ?></a>
    </div>
  </div>
</header>

<?php while (have_posts()) : the_post(); ?>
  <?php if (trim(get_the_content())) : ?>
    <div class="max-w-screen-xl mx-auto px-6 pb-12">
      <div class="max-w-2xl text-lg text-[#6B7280]"><?php the_content(); ?></div>
    </div>
  <?php endif; endwhile; ?>

<div class="max-w-screen-xl mx-auto px-6 grid md:grid-cols-3 gap-6 pb-20">
  <div class="modern-card glassy p-7 rounded-3xl border border-white/60">
    <div class="text-tertiary text-xs font-semibold tracking-widest">KONTIOTUPA</div>
    <div class="font-semibold text-xl mt-1">Avoin kohtaamispaikka</div>
    <p class="text-sm text-[#6B7280] mt-2">Ryhmät, kahvit, digineuvonta – kaikille avoinna.</p>
    <a href="<?php echo home_url('/kontiotupa'); ?>" class="text-sm mt-4 inline-block text-primary font-medium hover:underline">Lue lisää →</a>
  </div>
  <div class="modern-card glassy p-7 rounded-3xl border border-white/60">
    <div class="text-tertiary text-xs font-semibold tracking-widest">TÖPINÄN TORI</div>
    <div class="font-semibold text-xl mt-1">Kierrätys &amp; kohtaaminen</div>
    <p class="text-sm text-[#6B7280] mt-2">Kierrätyskeskus, joka työllistää ja yhdistää.</p>
    <a href="<?php echo home_url('/kirpputori'); ?>" class="text-sm mt-4 inline-block text-primary font-medium hover:underline">Tutustu →</a>
  </div>
  <div class="modern-card glassy p-7 rounded-3xl border border-white/60">
    <div class="text-tertiary text-xs font-semibold tracking-widest">TAPAHTUMAT</div>
    <div class="font-semibold text-xl mt-1">Yhteisölliset päivät</div>
    <p class="text-sm text-[#6B7280] mt-2">Kesätoripäivä, maakuntapäivä, puurojuhlat.</p>
    <a href="<?php echo home_url('/tapahtumat'); ?>" class="text-sm mt-4 inline-block text-primary font-medium hover:underline">Katso kalenteri →</a>
  </div>
</div>

<?php get_footer(); ?>