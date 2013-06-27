<?php
/**
 * @file
 * Default theme implementation to present profile categories (groups of
 * profile items).
 */
?>
<section class="profile-<?php print drupal_html_class($title); ?>">
  <?php if ($title): ?><h2 class="profile-title"><?php print $title; ?></h2><?php endif; ?>
  <dl<?php print $attributes; ?>>
    <?php print $profile_items; ?>
  </dl>
</section>
