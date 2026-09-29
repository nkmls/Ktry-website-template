<?php get_header(); ?>

<div class="mx-auto px-6 pt-16 pb-20" style="max-width:var(--container-width,1280px)">
  <?php while (have_posts()) : the_post(); ?>
    <div class="max-w-2xl">
      <div class="text-xs font-semibold tracking-[3px]" style="color:var(--tertiary,#F59E0B)">TIETOA MEISTÄ</div>
      <h1 class="section-header mt-1"><?php the_title(); ?></h1>
      <div class="mt-4 text-lg text-[#6B7280]"><?php the_content(); ?></div>
    </div>
  <?php endwhile; ?>

  <div class="mt-10 max-w-2xl">
    <p class="text-[#6B7280] leading-relaxed">
      Kontiolahden Työttömät ry on vuonna <strong>1995</strong> perustettu yhdistys (toiminta alkanut 1993–94), jonka sydämen lyönnillä on yksin jääneet kuntamme asukkaat. Jokaisen päivän tavoitteemme on sama: vähentää yksinäisyyttä, edistää hyvinvointia ja luoda tilaa, jossa jokainen voi olla oma itsensä.
    </p>
    <p class="text-[#6B7280] leading-relaxed mt-4">
      Vuoden 2026 on vakauden vuosi. Hallitus, työntekijät ja vapaaehtoiset rakentavat yhdessä paikkaa, missä kukaan ei ole yksin kahvinsa kanssa, kaikilla on mahdollisuus harrastaa ja kehittyä, ja työttömiä kuullaan.
    </p>
  </div>

  <div class="mt-10 grid md:grid-cols-4 gap-4 text-center">
    <div class="glassy p-5 rounded-2xl border border-white/60">
      <div class="text-3xl font-bold" style="color:var(--primary)">2 716</div>
      <div class="text-xs text-[#6B7280] mt-1">kohtaamista</div>
    </div>
    <div class="glassy p-5 rounded-2xl border border-white/60">
      <div class="text-3xl font-bold" style="color:var(--primary)">11</div>
      <div class="text-xs text-[#6B7280] mt-1">retkeä ja tapahtumaa</div>
    </div>
    <div class="glassy p-5 rounded-2xl border border-white/60">
      <div class="text-3xl font-bold" style="color:var(--primary)">~300</div>
      <div class="text-xs text-[#6B7280] mt-1">osallistujaa Jouluriehassa</div>
    </div>
    <div class="glassy p-5 rounded-2xl border border-white/60">
      <div class="text-3xl font-bold" style="color:var(--primary)">200</div>
      <div class="text-xs text-[#6B7280] mt-1">kävijää Kontiorockissa</div>
    </div>
  </div>

  <div class="mt-10 grid md:grid-cols-2 gap-6">
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Keskeinen rooli paikallisissa verkostoissa</h3>
      <p class="mt-2 text-sm text-[#6B7280]">Puheenjohtaja Esa Inkinen ja yhdistyksen edustaja toimivat <strong>KonJANE:n puheenjohtajana</strong> 2026. Työttömien ääni kuuluu kunnan päätösten ytimessä.</p>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Kontiorock – Nuorisopalkinto 2025</h3>
      <p class="mt-2 text-sm text-[#6B7280]">30-vuotisjuhlavuoden festivaali keräsi 200 kävijää ja sai Kontiolahden kunnan Nuorisopalkinnon. Toteutimme 28 omaa ryhmätoimintoa.</p>
    </div>
  </div>

  <div class="mt-6 glassy p-6 rounded-3xl border border-white/60 max-w-xl text-sm text-[#6B7280]">
    <p><strong>Jäsenyydet:</strong> Työttömien Keskusjärjestö ry • Pohjois-Karjalan Työttömät ry • KonJANE</p>
  </div>
</div>

<?php get_footer(); ?>