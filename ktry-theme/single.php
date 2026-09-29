<?php get_header(); ?>

<div class="max-w-screen-xl mx-auto px-6 pt-16 pb-20">
  <?php while (have_posts()) : the_post(); ?>
    <article class="max-w-2xl mx-auto">
      <div class="text-xs font-semibold tracking-[3px] text-tertiary">
        <?php echo get_the_date('d.m.Y'); ?> • <?php the_category(', '); ?>
      </div>
      <h1 class="section-header mt-2"><?php the_title(); ?></h1>

      <?php if (has_post_thumbnail() && get_theme_mod('post_show_featured', true)) : ?>
        <div class="mt-6 rounded-3xl overflow-hidden">
          <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
        </div>
      <?php endif; ?>

      <div class="mt-8 text-lg text-[#475569] leading-relaxed">
		  <?php echo wpautop( get_the_content() ); ?></div>


      <?php if (get_theme_mod('post_show_author', true)) : ?>
      <div class="mt-10 pt-8 border-t border-white/60 glassy p-6 rounded-3xl flex items-center gap-4">
        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white font-bold text-lg">
          <?php echo strtoupper(substr(get_the_author(), 0, 1)); ?>
        </div>
        <div>
          <div class="font-medium"><?php the_author(); ?></div>
          <div class="text-sm text-[#6B7280]">Kirjoittaja</div>
        </div>
      </div>
      <?php endif; ?>

      <?php if (get_theme_mod('post_show_prevnext', true)) : ?>
      <div class="mt-8 flex justify-between text-sm">
        <span class="text-[#6B7280]"><?php previous_post_link('« %link', 'Edellinen artikkeli'); ?></span>
        <span class="text-[#6B7280]"><?php next_post_link('%link »', 'Seuraava artikkeli'); ?></span>
      </div>
      <?php endif; ?>

      <?php if (is_active_sidebar('below-post')) dynamic_sidebar('below-post'); ?>
    </article>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>