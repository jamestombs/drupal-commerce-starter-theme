<?php
/**
 * @file
 * Template for a 3 column 33%/34%/33% panels layout.
 */
?>
<div class="line" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="unit size-1of3">
    <?php print $content['first']; ?>
  </div>
  <div class="unit size-1of3">
    <?php print $content['second']; ?>
  </div>
  <div class="unit size-1of3 last-unit">
    <?php print $content['third']; ?>
  </div>
</div>
