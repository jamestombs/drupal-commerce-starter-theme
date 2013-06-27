<?php
/**
 * @file
 * Template for a 3 column 25%/50%/25% panels layout.
 */
?>
<div class="line layout-25-50-25" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="unit size-1of2 unit-main">
    <?php print $content['first']; ?>
  </div>
  <div class="unit size-1of4 unit-pull">
    <?php print $content['second']; ?>
  </div>
  <div class="unit size-1of4 last-unit">
    <?php print $content['third']; ?>
  </div>
</div>
