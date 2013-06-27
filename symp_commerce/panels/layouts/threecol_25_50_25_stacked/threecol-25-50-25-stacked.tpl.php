<?php
/**
 * @file
 * Template for a 3 column 25%/50%/25% stacked panels layout.
 */
?>
<?php if (!empty($css_id)) { print "<div id=\"$css_id\">"; } ?>
  <div class="line">
    <div class="unit size-1of1">
      <?php print $content['first']; ?>
    </div>
  </div>
  <div class="line layout-25-50-25">
    <div class="unit size-1of2 unit-main">
      <?php print $content['second']; ?>
    </div>
    <div class="unit size-1of4">
      <?php print $content['third']; ?>
    </div>
    <div class="unit size-1of4 last-unit">
      <?php print $content['fourth']; ?>
    </div>
  </div>
  <div class="line">
    <div class="unit size-1of1">
      <?php print $content['fifth']; ?>
    </div>
  </div>
<?php if (!empty($css_id)) { print "</div>"; } ?>
