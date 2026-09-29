<?php get_header(); ?>

<div class="mx-auto px-6 pt-16 pb-20" style="max-width:var(--container-width,1280px)">
  <?php while (have_posts()) : the_post(); ?>
    <div class="max-w-2xl">
      <div class="text-xs font-semibold tracking-[3px]" style="color:var(--tertiary,#F59E0B)">KOHTAAMISPAIKKA</div>
      <h1 class="section-header mt-1"><?php the_title(); ?></h1>
      <p class="mt-2 text-sm text-[#6B7280]"><strong>Koulukuja 4 A, Kontiolahti | Avoinna ti–pe klo 9–14:30</strong></p>
      <div class="mt-4 text-lg text-[#6B7280]"><?php the_content(); ?></div>
    </div>
  <?php endwhile; ?>

  <div class="mt-12 grid md:grid-cols-2 gap-6">
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Mitä löydät Kontiotuvalta?</h3>
      <ul class="mt-4 space-y-2 text-[#6B7280] text-sm">
        <li><i class="fa-solid fa-mug-hot" style="color:var(--primary)"></i> Kahvi ja kahviseuraa – lounaalla myös voileivät ja kalakeitto</li>
        <li><i class="fa-solid fa-newspaper" style="color:var(--primary)"></i> Päivän lehdet – uutiset, urheilu, naiset</li>
        <li><i class="fa-solid fa-laptop" style="color:var(--primary)"></i> Digituki – apua verkon käyttöön, sähköposteihin, kuntapalveluihin</li>
        <li><i class="fa-solid fa-gamepad" style="color:var(--primary)"></i> Pelejä – bingoa, lautapelejä</li>
        <li><i class="fa-solid fa-wifi" style="color:var(--primary)"></i> Nettinurkka – hyvä yhteys ja rauha surffaamiseen</li>
        <li><i class="fa-solid fa-tv" style="color:var(--primary)"></i> Televisio – uutiset ja yhdessä katsotut ohjelmat</li>
      </ul>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Ryhmät ja toiminta kesällä 2026</h3>
      <ul class="mt-4 space-y-2 text-[#6B7280] text-sm">
        <li><i class="fa-solid fa-users" style="color:var(--primary)"></i> Äijäryhmä – miesten vertaistukiryhmä</li>
                <li><i class="fa-solid fa-dice" style="color:var(--primary)"></i> Pelipäivät – lautapelejä, pelikonsoli</li>
        
        <li><i class="fa-solid fa-utensils" style="color:var(--primary)"></i> Yhteisöruokailut – yhdessä aterioidaan</li>
      </ul>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Heinäkuu 2026 – Kesäksi suljettuna</h3>
      <p class="mt-2 text-sm text-[#6B7280]">Heinäkuussa Kontiotupa pitää henkilökunnan lomajaksoa ja sulkeutuu tilapäisesti. <strong>Elokuussa olemme taas täydessä vauhdissa.</strong></p>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Tilat vierailijoille</h3>
      <p class="mt-2 text-sm text-[#6B7280]">Kontiotupa on alusta muille yhdistyksille – monet paikalliset ryhmät kokoontuvat täällä ilman maksua. Tämä tekee Kontiotuvasta elävän, monipuolisen yhteisöllisen keskuksen.</p>
    </div>
  </div>
</div>

<?php get_footer(); ?>