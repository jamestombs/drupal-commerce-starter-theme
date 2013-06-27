<?php
/**
 * @file
 * Template for a 1 column panels layout.
 */
?>
<?php if (!empty($css_id)) { print "<div id=\"$css_id\">"; } ?>
  <?php print $content['first']; ?>
<?php if (!empty($css_id)) { print "</div>"; } ?>
