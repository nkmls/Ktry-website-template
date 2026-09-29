<form role="search" method="get" class="flex gap-2" action="<?php echo esc_url(home_url('/')); ?>">
  <label class="sr-only" for="s">Hae sivustolta</label>
  <input type="search" id="s" name="s" placeholder="Hae sivustolta..." value="<?php echo get_search_query(); ?>" class="w-full px-4 py-3 rounded-2xl glassy border border-white/60 focus:outline-none text-sm">
  <button type="submit" class="primary-btn px-4 py-3 rounded-2xl text-sm font-semibold" aria-label="Hae">Hae</button>
</form>