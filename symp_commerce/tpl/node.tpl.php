<?php
/**
 * @file
 * Default theme implementation to display a node.
 */
?>
<article id="article-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>>
      <a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
    </h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php print $unpublished; ?>
  <?php if ($display_submitted): ?>
    <footer class="content submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </footer>
  <?php endif; ?>
  <div<?php print $content_attributes; ?>>
    <?php
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  <?php if ($node_links = render($content['links'])): ?>
    <nav class="node-links clearfix">
      <?php print $node_links; ?>
    </nav>
  <?php endif; ?>
  <?php print render($content['comments']); ?>
</article>
