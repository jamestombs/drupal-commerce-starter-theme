<?php
/**
 * @file
 * Template for a 4 column stacked panels layout.
 */
?>
<?php if (!empty($css_id)) { print "<div id=\"$css_id\">"; } ?>
  <div class="line">
    <div class="unit size-1of1">
      <?php print $content['first']; ?>
    </div>
  </div>
  <div class="line">
    <div class="unit size-1of4">
      <?php print $content['second']; ?>
    </div>
    <div class="unit size-1of4">
      <?php print $content['third']; ?>
    </div>
    <div class="unit size-1of4">
      <?php print $content['fourth']; ?>
    </div>
    <div class="unit size-1of4 last-unit">
      <?php print $content['fifth']; ?>
    </div>
  </div>
  <div class="line">
    <div class="unit size-1of1">
      <?php print $content['sixth']; ?>
    </div>
  </div>
<?php if (!empty($css_id)) { print "</div>"; } ?>
