<?php get_header(); ?>

<div class="mx-auto px-6 pt-16 pb-20" style="max-width:var(--container-width,1280px)">
  <?php while (have_posts()) : the_post(); ?>
    <div class="max-w-2xl mx-auto text-center">
      <div class="text-xs font-semibold tracking-[3px]" style="color:var(--tertiary,#F59E0B)">JÄSENYYS</div>
      <h1 class="section-header mt-1"><?php the_title(); ?></h1>
      <div class="mt-4 text-lg text-[#6B7280]"><?php the_content(); ?></div>
    </div>
  <?php endwhile; ?>

  <div class="max-w-lg mx-auto mt-12 glassy p-8 rounded-3xl border border-white/60">
    <h3 class="font-semibold text-lg text-center">Jäsenyystyypit ja jäsenmaksu 2026</h3>
    <p class="text-xs text-[#6B7280] text-center mt-1">Maksukausi alkaa vuosikokouksesta 29.4.2026</p>

    <table class="w-full mt-6 text-sm">
      <thead><tr class="border-b border-white/60"><th class="text-left py-2 text-[#6B7280]">Jäsenyys</th><th class="text-right py-2 text-[#6B7280]">Hinta</th></tr></thead>
      <tbody>
        <tr class="border-b border-white/40"><td class="py-3">Varsinainen jäsen (työttömät, opiskelijat)</td><td class="text-right font-medium">10 €</td></tr>
        <tr class="border-b border-white/40"><td class="py-3">Kannatusjäsen</td><td class="text-right font-medium">15 €</td></tr>
		  <tr class="border-b border-white/40"><td class="py-3">Yhteisöt</td><td class="text-right font-medium">20 €</td></tr>
        <tr class="border-b border-white/40"><td class="py-3">Kunniajäsenyys</td><td class="text-right text-[#6B7280]">–</td></tr>
      </tbody>
    </table>

    <div class="mt-6 p-4 rounded-2xl bg-white/40 text-xs text-[#6B7280]">
      <strong>Maksutiedot:</strong><br>
      OP Kontiolahti FI30 5165 0720 0487 92<br>
      Viesti: Jäsenmaksu 2026 + Nimi + Osoite<br>
      <span class="block mt-2">Tai lunasta Kontiotuvalla, Töpinän Torilla tai soita 045 888 1255.</span>
    </div>
  </div>

  <div class="max-w-xl mx-auto mt-8 grid md:grid-cols-2 gap-4">
    <div class="glassy p-5 rounded-2xl border border-white/60 text-sm"><i class="fa-solid fa-tag" style="color:var(--primary)"></i> 25 % alennus Töpinän Torilla</div>
    <div class="glassy p-5 rounded-2xl border border-white/60 text-sm"><i class="fa-solid fa-bus" style="color:var(--primary)"></i> Retket ja tapahtumat</div>
    <div class="glassy p-5 rounded-2xl border border-white/60 text-sm"><i class="fa-solid fa-dumbbell" style="color:var(--primary)"></i> Kuntoiluvälineiden laina</div>
    <div class="glassy p-5 rounded-2xl border border-white/60 text-sm"><i class="fa-solid fa-graduation-cap" style="color:var(--primary)"></i> Koulutustuki</div>
    <div class="glassy p-5 rounded-2xl border border-white/60 text-sm"><i class="fa-solid fa-utensils" style="color:var(--primary)"></i> Ruoka-apu</div>
    <div class="glassy p-5 rounded-2xl border border-white/60 text-sm"><i class="fa-solid fa-hand" style="color:var(--primary)"></i> Vaikutusmahdollisuus</div>
  </div>

  <div class="max-w-xl mx-auto mt-8 glassy p-6 rounded-3xl border border-white/60 text-sm text-[#6B7280] text-center">
    <p>Täytä jäsenhakemus (saatavilla Kontiotuvalla) ja toimita hallitukselle. Hallitus hyväksyy jäsenet muutamassa päivässä. <strong>Tervetuloa osaksi yhteisöä!</strong></p>
  </div>
</div>

<?php get_footer(); ?>