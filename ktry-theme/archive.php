<?php get_header(); ?>

<div class="max-w-screen-xl mx-auto px-6 pt-16 pb-20">
  <div class="max-w-2xl">
    <div class="text-xs font-semibold tracking-[3px] text-tertiary">ARKISTO</div>
    <h1 class="section-header mt-1">
      <?php the_archive_title(); ?>
    </h1>
    <?php the_archive_description('<p class="mt-2 text-[#6B7280]">', '</p>'); ?>
  </div>

  <div class="mt-10 space-y-6">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="glassy p-6 rounded-3xl border border-white/60 flex flex-col md:flex-row gap-4 justify-between">
        <div>
          <h2 class="font-semibold text-lg"><a href="<?php the_permalink(); ?>" class="text-primary no-underline hover:underline"><?php the_title(); ?></a></h2>
          <div class="text-xs text-[#6B7280] mt-1"><?php echo get_the_date('d.m.Y'); ?></div>
        </div>
        <a href="<?php the_permalink(); ?>" class="text-sm text-primary whitespace-nowrap self-start">Lue →</a>
      </article>
    <?php endwhile; else : ?>
      <p class="text-[#6B7280]">Ei julkaisuja tässä kategoriassa.</p>
    <?php endif; ?>
  </div>

  <div class="mt-8 flex justify-center gap-2 text-sm text-[#6B7280]">
    <?php echo paginate_links([
      'prev_text' => '←',
      'next_text' => '→',
      'type' => 'list',
    ]); ?>
  </div>
</div>

<?php get_footer(); ?>