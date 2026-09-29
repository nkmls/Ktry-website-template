<?php get_header(); ?>

<div class="mx-auto px-6 pt-16 pb-20" style="max-width:var(--container-width,1280px)">
  <?php while (have_posts()) : the_post(); ?>
    <div class="max-w-2xl">
      <div class="text-xs font-semibold tracking-[3px]" style="color:var(--tertiary,#F59E0B)">TOIMINTA</div>
      <h1 class="section-header mt-1"><?php the_title(); ?></h1>
      <div class="mt-4 text-lg text-[#6B7280]"><?php the_content(); ?></div>
    </div>
  <?php endwhile; ?>

  <div class="mt-12 space-y-6 max-w-2xl">
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">1. Kontiotupa – Avoin kohtaamispaikka</h3>
      <p class="mt-2 text-sm text-[#6B7280]">STEA-rahoitteinen matalan kynnyksen tila. Kahvi, keskustelu, pelit, digituki. Ryhmätoimintaa kaikille. Retki- ja tapahtumatoiminta. <strong>Heinäkuussa suljettuna lomille, elokuusta auki.</strong></p>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">2. Töpinän Tori – Kierrätyskeskus</h3>
      <p class="mt-2 text-sm text-[#6B7280]">Kestävää kehitystä edistävä toiminta. Työllistymisen väylä palkkatuella ja työkokeilulla. Ruoka-apu ja avustus. Lahjoituksista hyviä löytöjä.</p>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">3. Verkostotyö ja vaikuttaminen</h3>
      <p class="mt-2 text-sm text-[#6B7280]">Aktiivinen yhteistyö kunnan kanssa. Puheenjohtajuus KonJANE:ssa. Jäsenyys Työttömien Keskusjärjestössä ja Pohjois-Karjalan Työttömät ry:ssä. Alueellinen yhteistyö.</p>
    </div>
  </div>

  <div class="mt-8 glassy p-6 rounded-3xl border border-white/60 max-w-2xl text-center">
    <p class="text-sm text-[#6B7280]">Kesä 2026 on aktiivisen toiminnan aikaa. Kontiotupa on avoinna (pl. heinäkuu), tapahtumat ja retket antavat väriä arkeen, ja ruoka-apu jatkaa päivittäistä työtään.</p>
  </div>
</div>

<?php get_footer(); ?>