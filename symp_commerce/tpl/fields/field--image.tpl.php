<?php
/**
 * @file
 * Default template implementation to display the value of an image field.
 */
?>
<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if (!$label_hidden): ?>
    <div<?php print $title_attributes; ?>><?php print $label ?></div>
  <?php endif; ?>
  <?php foreach ($items as $delta => $item): ?>
    <figure class="field-item <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>><?php print render($item); ?></figure>
  <?php endforeach; ?>
</div>
