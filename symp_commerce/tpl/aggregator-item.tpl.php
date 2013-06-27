<?php
/**
 * @file
 * Default theme implementation to format an individual feed item for display
 * on the aggregator page.
 */
?>
<article class="feed-item">
  <h2 class="title"><a href="<?php print $feed_url; ?>"><?php print $feed_title; ?></a></h2>
  <?php if ($content): ?><div class="content"><?php print $content; ?></div><?php endif; ?>
  <footer>
    <p class="meta">
      <?php if ($source_url): ?>
        <a href="<?php print $source_url; ?>" class="feed-item-source"><?php print $source_title; ?></a> -
      <?php endif; ?>
      <time datetime="<?php print $datetime; ?>"><?php print $source_date; ?></time>
    </p>
    <?php if ($categories): ?>
      <p class="categories"><strong><?php print t('Categories'); ?>:</strong> <?php print implode(', ', $categories); ?></p>
    <?php endif; ?>
  </footer>
</article>
