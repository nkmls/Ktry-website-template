<?php get_header(); ?>

<div class="max-w-screen-xl mx-auto px-6 pt-16 pb-20">
  <div class="max-w-2xl">
    <div class="text-xs font-semibold tracking-[3px] text-tertiary">AJANKOHTAISTA</div>
    <h1 class="section-header mt-1"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
  </div>

  <div class="mt-10 space-y-6">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article class="modern-card glassy p-7 rounded-3xl border border-white/60">
        <div class="flex flex-col md:flex-row gap-6">
          <?php if (has_post_thumbnail() && get_theme_mod('home_show_featured', true)) : ?>
            <div class="md:w-48 shrink-0">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', ['class' => 'w-full h-40 md:h-32 object-cover rounded-2xl']); ?>
              </a>
            </div>
          <?php endif; ?>
          <div class="flex-1 min-w-0">
            <div class="text-xs text-[#6B7280]"><?php echo get_the_date('d.m.Y'); ?></div>
            <h2 class="text-xl font-semibold mt-1"><a href="<?php the_permalink(); ?>" class="text-primary hover:underline no-underline"><?php the_title(); ?></a></h2>
            <p class="text-sm text-[#6B7280] mt-2 line-clamp-2"><?php echo get_the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="text-sm mt-3 inline-block text-primary font-medium">Lue lisää →</a>
          </div>
        </div>
      </article>
    <?php endwhile; else : ?>
      <p class="text-[#6B7280]">Ei julkaistuja artikkeleita.</p>
    <?php endif; ?>
  </div>

  <div class="mt-10 flex justify-center gap-4 text-sm text-[#6B7280]">
    <?php echo paginate_links([
      'prev_text' => '← Edellinen',
      'next_text' => 'Seuraava →',
      'type' => 'list',
      'class' => 'flex gap-2',
    ]); ?>
  </div>
</div>

<?php get_footer(); ?>