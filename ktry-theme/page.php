<?php get_header(); ?>

<div class="max-w-screen-xl mx-auto px-6 pt-16 pb-20">
  <?php while (have_posts()) : the_post(); ?>
    <article class="max-w-2xl mx-auto">
      <h1 class="section-header"><?php the_title(); ?></h1>
      <div class="mt-6 text-lg text-[#475569] leading-relaxed">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</div>

<?php get_footer(); ?>