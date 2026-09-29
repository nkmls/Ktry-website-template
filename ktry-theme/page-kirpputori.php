<?php get_header(); ?>

<div class="mx-auto px-6 pt-16 pb-20" style="max-width:var(--container-width,1280px)">
  <?php while (have_posts()) : the_post(); ?>
    <div class="max-w-xl">
      <div class="text-xs font-semibold tracking-[3px]" style="color:var(--tertiary,#F59E0B)">KIERRÄTYSKESKUS</div>
      <h1 class="section-header mt-1"><?php the_title(); ?></h1>
      <p class="mt-2 text-sm text-[#6B7280]"><strong>Keskuskatu 21, Kontiolahti</strong></p>
      <div class="mt-4 text-lg text-[#6B7280]"><?php the_content(); ?></div>
    </div>
  <?php endwhile; ?>

  <div class="mt-12 grid md:grid-cols-2 gap-6">
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Mikä Töpinän Tori on?</h3>
      <p class="mt-3 text-sm text-[#6B7280] leading-relaxed"><strong>Kierrätyskeskus</strong> – Vastaanotamme lahjoituksena pientavaraa: vaatteita, astioita, leluja, kirjoja ja paljon muuta. Työntekijämme huoltavat ja valmistelevat tavarat myyntiin.</p>
      <p class="mt-3 text-sm text-[#6B7280] leading-relaxed"><strong>Työllistymispaikka</strong> – Töpinän Torin työntekijät työskentelevät palkkatuella tai työkokeillen. Täällä saadaan ammatillista kokemusta ja tukea siirtymisessä takaisin avoimille työmarkkinoille.</p>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Palvelut</h3>
      <ul class="mt-4 space-y-2 text-[#6B7280] text-sm">
        <li><i class="fa-solid fa-tag" style="color:var(--primary)"></i> Käytettyjen tavaroiden osto ja myynti – edullisesti</li>
        <li><i class="fa-solid fa-box" style="color:var(--primary)"></i> Lahjoitusten vastaanotto</li>
        <li><i class="fa-solid fa-utensils" style="color:var(--primary)"></i> Ruokajako ti &amp; pe klo 10 (K-Market, jäsenille)</li>
        <li><i class="fa-solid fa-plate-wheat" style="color:var(--primary)"></i> Kotoruoan ylijäämäjako</li>
        <li><i class="fa-solid fa-shirt" style="color:var(--primary)"></i> Vaatekeräykset</li>
		<li><i class="fa-solid fa-shirt" style="color:var(--primary)"></i> Hoitaa jäsenasioita:</li>
		  <li><i class="fa-brands fa-facebook" style="color:var(--primary)"></i> Ajankohtaisia löytöjä, poikkeuksia ja ilmoituksia julkaistaan Töpinän Torin Facebook-sivulla:
facebook.com/topinantori</li>
      </ul>
    </div>
  </div>

  <div class="mt-8 glassy p-8 rounded-3xl border border-white/60 max-w-xl">
    <p class="text-sm text-[#6B7280] leading-relaxed">
      <i class="fa-solid fa-leaf" style="color:var(--primary)"></i>
      Töpinän Tori on enemmän kuin kirpputori. Se on kestävän kehityksen paikka, työllistymisen silta ja naapurien kohtaamispaikka. Kun ostat täältä, tuet paikallista työllistymistä ja kestävää kehitystä samanaikaisesti.Ajankohtaisia löytöjä, poikkeuksia ja ilmoituksia julkaistaan Töpinän Torin Facebook-sivulla:
facebook.com/topinantori
    </p>
  </div>
</div>

<?php get_footer(); ?>