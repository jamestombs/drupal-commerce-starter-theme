<?php
/**
 * @file
 * Default theme implementation to provide an HTML container for comments.
 */
?>
<section id="comments" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if ($content['comments']): ?>
    <?php print render($title_prefix); ?>
    <h2 class="title"><?php print t('Comments'); ?></h2>
    <?php print render($title_suffix); ?>
  <?php endif; ?>
  <?php print render($content['comments']); ?>
  <?php if ($content['comment_form']): ?>
    <h3 class="title comment-form"><?php print t('Add new comment'); ?></h3>
    <?php print render($content['comment_form']); ?>
  <?php endif; ?>
</section>
