<?php get_header(); ?>

<div class="mx-auto px-6 pt-16 pb-20" style="max-width:var(--container-width,1280px)">
  <?php while (have_posts()) : the_post(); ?>
    <div class="max-w-2xl">
      <div class="text-xs font-semibold tracking-[3px]" style="color:var(--tertiary,#F59E0B)">TYÖLLISTYMINEN</div>
      <h1 class="section-header mt-1"><?php the_title(); ?></h1>
      <div class="mt-4 text-lg text-[#6B7280]"><?php the_content(); ?></div>
    </div>
  <?php endwhile; ?>

  <div class="mt-12 grid md:grid-cols-2 gap-6">
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Töpinän Torilla</h3>
      <p class="mt-2 text-sm text-[#6B7280] leading-relaxed">Kierrätyskeskuksessa voit saada työkokemusta palkkatuella tai työkokeillen. Tiimi opastaa, kannustaa ja tukee siinä, että taito ja itseluottamus kasvavat päivä päivältä. Tämä voi olla portti takaisin avoimille työmarkkinoille.</p>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Kontiotuvalla</h3>
      <p class="mt-2 text-sm text-[#6B7280] leading-relaxed">Tukea neuvontaan, vertaistukeen ja ammatillisen kehityksen tukeen. Usein on hyvä keskustella kenen tahansa kanssa, joka ymmärtää samoja haasteita.</p>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Verkosto ja yhteydet</h3>
      <p class="mt-2 text-sm text-[#6B7280] leading-relaxed">Yhdistys on yhteydessä Kontiolahden kunnan työllisyyspalveluihin, ja hallitus seuraa aktiivisesti työllisyyden muutoksia ja mahdollisuuksia.</p>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Koulutus ja osaamiseen investointi</h3>
      <p class="mt-2 text-sm text-[#6B7280] leading-relaxed">Hakiessasi apua koulutusmenoihin, hallitus arvioi hakemuksesi. Tavoitteena on, että osaaminen kasvaa ja työllistymisen todennäköisyys nousee.</p>
    </div>
  </div>

  <div class="mt-8 glassy p-6 rounded-3xl border border-white/60 max-w-2xl text-center">
    <p class="text-sm text-[#6B7280]"><i class="fa-solid fa-heart" style="color:var(--primary)"></i> Rohkaise itseäsi. Työtön aika on rankka, mutta kaikki alkaa askeleesta. Ota yhteyttä, tule Kontiotuvalle. Täällä sinua uskotaan.</p>
  </div>
</div>

<?php get_footer(); ?>