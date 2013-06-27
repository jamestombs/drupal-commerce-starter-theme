<?php
/**
 * @file
 * Template for a 2 column stacked panels layout.
 */
?>
<?php if (!empty($css_id)) { print "<div id=\"$css_id\">"; } ?>
  <div class="line">
    <div class="unit size-1of1">
      <?php print $content['first']; ?>
    </div>
  </div>
  <div class="line">
    <div class="unit size-1of2">
      <?php print $content['second']; ?>
    </div>
    <div class="unit size-1of2 last-unit">
      <?php print $content['third']; ?>
    </div>
  </div>
  <div class="line">
    <div class="unit size-1of1">
      <?php print $content['fourth']; ?>
    </div>
  </div>
<?php if (!empty($css_id)) { print "</div>"; } ?>
