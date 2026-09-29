<?php get_header(); ?>

<div class="max-w-screen-xl mx-auto px-6 pt-16 pb-20">
  <div class="max-w-2xl">
      <div class="text-xs font-semibold tracking-[3px] text-tertiary">HAKU</div>
    <h1 class="section-header mt-1">Haku: "<?php echo get_search_query(); ?>"</h1>
  </div>

  <div class="mt-10 space-y-6">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="glassy p-6 rounded-3xl border border-white/60">
        <h2 class="font-semibold text-lg"><a href="<?php the_permalink(); ?>" class="text-primary no-underline hover:underline"><?php the_title(); ?></a></h2>
        <div class="text-xs text-[#6B7280] mt-1"><?php echo get_the_date('d.m.Y'); ?> • <?php echo get_post_type(); ?></div>
        <p class="text-sm text-[#6B7280] mt-2"><?php echo get_the_excerpt(); ?></p>
      </article>
    <?php endwhile; else : ?>
      <div class="text-center py-12">
        <div class="text-5xl text-primary/20 mb-4"><i class="fa-solid fa-search"></i></div>
        <p class="text-[#6B7280]">Ei tuloksia haulla "<?php echo get_search_query(); ?>".</p>
        <a href="<?php echo home_url(); ?>" class="primary-btn mt-6 px-7 py-3 rounded-2xl text-sm font-semibold inline-block">Takaisin etusivulle</a>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>