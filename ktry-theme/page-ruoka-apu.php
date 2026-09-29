<?php get_header(); ?>

<div class="mx-auto px-6 pt-16 pb-20" style="max-width:var(--container-width,1280px)">
  <?php while (have_posts()) : the_post(); ?>
    <div class="max-w-2xl">
      <div class="text-xs font-semibold tracking-[3px]" style="color:var(--tertiary,#F59E0B)">RUOKA-APU</div>
      <h1 class="section-header mt-1"><?php the_title(); ?></h1>
      <div class="mt-4 text-lg text-[#6B7280]"><?php the_content(); ?></div>
    </div>
  <?php endwhile; ?>

  <div class="mt-12 grid md:grid-cols-2 gap-6">
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Ruokajakelu</h3>
      <div class="mt-4 space-y-3 text-[#6B7280] text-sm">
        <p><strong>Töpinän Torilla – ti &amp; pe klo 10</strong><br>K-Marketin lahjoittamia päiväystuotteita jäsenille ja avun tarpeessa oleville. Osoite: Keskuskatu 21.</p>
        <p><strong>Kontiotuvalla – ti &amp; pe</strong><br>Kotoruoka-ohjelmasta saatavaa ylijäämäruokaa. Valmiit ateriat ja aterian osia säännöllisin välein.</p>
      </div>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Akuutti avustus</h3>
      <p class="mt-4 text-sm text-[#6B7280]">Yhtäkkinen tarve: vaatetarve, kengät, talousvälineet. Yhdistys auttaa mahdollisuuksien mukaan vaatekeräysten ja yksityisen avustuksen kautta. Ota yhteyttä, kerro tilanteestasi.</p>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Koulutustuki</h3>
      <p class="mt-4 text-sm text-[#6B7280]">Haluaisitko kehittyä tai suorittaa kurssin? Yhdistys voi auttaa kurssimaksuihin hakemusten perusteella.</p>
    </div>
    <div class="glassy p-8 rounded-3xl border border-white/60">
      <h3 class="font-semibold text-lg">Miten haet apua?</h3>
      <p class="mt-4 text-sm text-[#6B7280]">Soita <strong>045 888 1255</strong> tai käy Kontiotuvalla ti–pe klo 9–14:30. Sähköposti: kontiolahden.tyottomat@gmail.com</p>
    </div>
  </div>
</div>

<?php get_footer(); ?>