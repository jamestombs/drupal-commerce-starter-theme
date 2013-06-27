<?php
/**
 * @file
 * Template for a 2 column panels layout.
 */
?>
<div class="line" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="unit size-1of2">
    <?php print $content['first']; ?>
  </div>
  <div class="unit size-1of2 last-unit">
    <?php print $content['second']; ?>
  </div>
</div>
