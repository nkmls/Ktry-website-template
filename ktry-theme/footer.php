<!-- Widget-alatunniste -->
</main>
<div class="mx-auto px-6 pb-8" style="max-width:var(--container-width,1280px)">
  <div class="grid md:grid-cols-3 gap-6">
    <?php if (is_active_sidebar('footer-1')) : ?>
      <div><?php dynamic_sidebar('footer-1'); ?></div>
    <?php endif; ?>
    <?php if (is_active_sidebar('footer-2')) : ?>
      <div><?php dynamic_sidebar('footer-2'); ?></div>
    <?php endif; ?>
    <?php if (is_active_sidebar('footer-3')) : ?>
      <div><?php dynamic_sidebar('footer-3'); ?></div>
    <?php endif; ?>
  </div>
</div>

<footer class="text-center text-xs text-[#6B7280] py-8 border-t border-white/60">
  <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html(get_theme_mod('footer_copyright', 'Kontiolahden Työttömät ry')); ?></p>
  <p class="mt-2 flex justify-center gap-4">
    <a href="mailto:<?php echo esc_attr(get_theme_mod('footer_email', 'kontiolahden.tyottomat@gmail.com')); ?>" class="hover:text-[var(--primary)] transition-colors"><?php echo esc_html(get_theme_mod('footer_email', 'kontiolahden.tyottomat@gmail.com')); ?></a>
    <span>&middot;</span>
    <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('footer_phone', '045 888 1255'))); ?>" class="hover:text-[var(--primary)] transition-colors"><?php echo esc_html(get_theme_mod('footer_phone', '045 888 1255')); ?></a>
  </p>
</footer>
<?php wp_footer(); ?>
<script>
(function() {
  var toggleBtn = document.getElementById('menu-toggle');
  var closeBtn  = document.getElementById('mobile-close');
  var backdrop  = document.getElementById('mobile-backdrop');
  var panel     = document.getElementById('mobile-panel');
  if (!toggleBtn) return;

  function openMenu() {
    backdrop.classList.add('open');
    panel.classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function closeMenu() {
    backdrop.classList.remove('open');
    panel.classList.remove('open');
    document.body.style.overflow = '';
  }

  toggleBtn.addEventListener('click', openMenu);
  closeBtn.addEventListener('click', closeMenu);
  backdrop.addEventListener('click', closeMenu);

  panel.querySelectorAll('a').forEach(function(link) {
    link.addEventListener('click', closeMenu);
  });

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && panel.classList.contains('open')) closeMenu();
  });
})();
</script>
</body>
</html>