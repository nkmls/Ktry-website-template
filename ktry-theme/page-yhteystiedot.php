<?php get_header(); ?>

<div class="mx-auto px-6 pt-16 pb-20" style="max-width:var(--container-width,1280px)">
  <?php while (have_posts()) : the_post(); ?>
    <div class="max-w-2xl mx-auto text-center">
      <div class="text-xs font-semibold tracking-[3px]" style="color:var(--tertiary,#F59E0B)">YHTEYSTIEDOT</div>
      <h1 class="section-header mt-1"><?php the_title(); ?></h1>
      <div class="mt-4 text-lg text-[#6B7280]"><?php the_content(); ?></div>
    </div>
  <?php endwhile; ?>

  <!-- Osoitteet + Kartat -->
  <div class="mt-12 grid md:grid-cols-2 gap-6 max-w-2xl mx-auto">
    <a href="https://maps.google.com/?q=Koulukuja+4+A+Kontiolahti" target="_blank" rel="noopener" class="glassy p-6 rounded-3xl border border-white/60 no-underline block hover:shadow-md transition-shadow">
      <div class="text-2xl mb-3" style="color:var(--primary)"><i class="fa-solid fa-location-dot"></i></div>
      <h3 class="font-semibold">Kontiotupa</h3>
      <p class="text-sm text-[#6B7280] mt-1">Koulukuja 4 A<br>81100 Kontiolahti</p>
      <span class="text-xs mt-3 inline-block" style="color:var(--primary)">Avaa Google Maps →</span>
    </a>
    <a href="https://maps.google.com/?q=Keskuskatu+21+Kontiolahti" target="_blank" rel="noopener" class="glassy p-6 rounded-3xl border border-white/60 no-underline block hover:shadow-md transition-shadow">
      <div class="text-2xl mb-3" style="color:var(--primary)"><i class="fa-solid fa-shop"></i></div>
      <h3 class="font-semibold">Töpinän Tori</h3>
      <p class="text-sm text-[#6B7280] mt-1">Keskuskatu 21<br>81100 Kontiolahti</p>
      <span class="text-xs mt-3 inline-block" style="color:var(--primary)">Avaa Google Maps →</span>
    </a>
  </div>

  <!-- Yhteyshenkilöt -->
  <div class="mt-10 max-w-sm mx-auto glassy p-6 rounded-3xl border border-white/60">
    <h3 class="font-semibold text-lg text-center">Yhteyshenkilöt</h3>
    <div class="mt-4 space-y-3 text-sm text-[#6B7280]">
      <div class="flex justify-between"><span class="font-medium">Puheenjohtaja</span><span>Esa Inkinen</span></div>
      <div class="flex justify-between"><span class="font-medium">Sihteeri</span><span>Mirja Mölsä</span></div>
    </div>
  </div>

  <!-- Yhteydenottolomake -->
  

  <!-- Some + Perustiedot -->
  <div class="max-w-xl mx-auto mt-8 grid md:grid-cols-3 gap-4 text-center">
    <div class="glassy p-5 rounded-2xl border border-white/60">
      <div class="text-xl mb-1" style="color:var(--primary)"><i class="fa-solid fa-envelope"></i></div>
      <div class="text-xs text-[#6B7280]"><?php echo esc_html(get_theme_mod('footer_email', 'kontiolahden.tyottomat@gmail.com')); ?></div>
    </div>
    <div class="glassy p-5 rounded-2xl border border-white/60">
      <div class="text-xl mb-1" style="color:var(--primary)"><i class="fa-solid fa-phone"></i></div>
      <div class="text-xs text-[#6B7280]"><?php echo esc_html(get_theme_mod('footer_phone', '045 888 1255')); ?></div>
    </div>
    <a href="https://facebook.com/kontiolahdentyottomat" target="_blank" rel="noopener" class="glassy p-5 rounded-2xl border border-white/60 no-underline block">
      <div class="text-xl mb-1" style="color:var(--primary)"><i class="fa-brands fa-facebook"></i></div>
      <div class="text-xs text-[#6B7280]">Facebook</div>
    </a>
  </div>
</div>

<?php get_footer(); ?>