<style>
<?php if (get_theme_mod('main_font_source', '1')==='2'&& !empty($main_font_family)) {
  ?>body {
    font-family: <?php echo wp_kses($main_font_family, 'text');
    ?>;
  }

  <?php
}

?>
</style>