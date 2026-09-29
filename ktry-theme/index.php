<?php get_header(); ?>

<div class="max-w-screen-xl mx-auto px-6 pt-16 pb-20">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="max-w-2xl mx-auto">
      <h1 class="section-header"><?php the_title(); ?></h1>
      <div class="mt-6 text-lg text-[#475569]"><?php the_content(); ?></div>
    </article>
  <?php endwhile; else : ?>
    <p class="text-[#6B7280]">Sisältöä ei löytynyt.</p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>