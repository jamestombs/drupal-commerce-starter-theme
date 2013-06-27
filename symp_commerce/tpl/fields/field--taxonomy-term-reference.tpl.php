<?php
/**
 * @file
 * Template implementation to display a taxonomy term reference field.
 */
?>
<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if (!$label_hidden): ?>
    <div<?php print $title_attributes; ?>><?php print $label ?></div>
  <?php endif; ?>
  <ul<?php print $content_attributes; ?>>
    <?php foreach ($items as $delta => $item): ?>
      <li<?php print $item_attributes[$delta]; ?>>
        <?php print render($item); ?>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
