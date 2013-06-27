<?php
/**
 * @file
 * Default theme implementation to display a comment.
 */
?>
<article class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <header>
    <h3<?php print $title_attributes; ?>><?php print $title; ?></h3>
    <?php if ($new): ?><em class="new-comment"><?php print $new; ?></em><?php endif; ?>
    <?php print $unpublished; ?>
  </header>
  <?php print render($title_suffix); ?>
  <footer class="content submitted">
    <?php print $picture; ?>
    <strong><?php print $author; ?></strong>
    <?php print $created; ?>
  </footer>
  <div<?php print $content_attributes; ?>>
    <?php
      hide($content['links']);
      print render($content);
    ?>
    <?php if ($signature): ?>
      <div class="user-signature clearfix">
        <?php print $signature; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php if ($comment_links = render($content['links'])): ?>
    <nav class="comment-links clearfix">
      <h4 class="element-invisible"><?php print t('Comment links'); ?></h4>
      <?php print $comment_links; ?>
    </nav>
  <?php endif; ?>
</article>
