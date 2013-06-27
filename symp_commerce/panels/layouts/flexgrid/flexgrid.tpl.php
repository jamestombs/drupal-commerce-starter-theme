<?php
/**
 * @file
 * Template for a flexible 1-4 equal column panels layout.
 */
$cols = array(0, 0, 0);

foreach ($content as $key => $value) {
  if (!empty($value)) {
    switch ($key) {
      case 'a1':
        $cols[0]++;
        break;

      case 'a2':
        $cols[0]++;
        break;

      case 'a3':
        $cols[0]++;
        break;

      case 'a4':
        $cols[0]++;
        break;

      case 'b1':
        $cols[1]++;
        break;

      case 'b2':
        $cols[1]++;
        break;

      case 'b3':
        $cols[1]++;
        break;

      case 'b4':
        $cols[1]++;
        break;

      case 'c1':
        $cols[2]++;
        break;

      case 'c2':
        $cols[2]++;
        break;

      case 'c3':
        $cols[2]++;
        break;

      case 'c4':
        $cols[2]++;
        break;
    }
  }
}
?>
<?php if (!empty($css_id)) { print "<div id=\"$css_id\">"; } ?>
<?php if ($cols[0] > 0): ?>
  <div class="row cols-<?php print $cols[0]; ?>">
    <?php if (!empty($content['a1'])): ?>
      <div class="col">
        <?php print $content['a1']; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['a2'])): ?>
      <div class="col">
        <?php print $content['a2']; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['a3'])): ?>
      <div class="col">
        <?php print $content['a3']; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['a4'])): ?>
      <div class="col">
        <?php print $content['a4']; ?>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
<?php if ($cols[1] > 0): ?>
  <div class="row cols-<?php print $cols[1]; ?>">
    <?php if (!empty($content['b1'])): ?>
      <div class="col">
        <?php print $content['b1']; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['b2'])): ?>
      <div class="col">
        <?php print $content['b2']; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['b3'])): ?>
      <div class="col">
        <?php print $content['b3']; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['b4'])): ?>
      <div class="col">
        <?php print $content['b4']; ?>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
<?php if ($cols[2] > 0): ?>
  <div class="row cols-<?php print $cols[2]; ?>">
    <?php if (!empty($content['c1'])): ?>
      <div class="col">
        <?php print $content['c1']; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['c2'])): ?>
      <div class="col">
        <?php print $content['c2']; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['c3'])): ?>
      <div class="col">
        <?php print $content['c3']; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['c4'])): ?>
      <div class="col">
        <?php print $content['c4']; ?>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
<?php if (!empty($css_id)) { print "</div>"; } ?>
