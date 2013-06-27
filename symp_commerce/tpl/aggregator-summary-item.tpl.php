<?php
/**
 * @file
 * Default theme implementation to present a linked feed item for summaries.
 */
?>
<h3 class="feed-url"><a href="<?php print $feed_url; ?>"><?php print $feed_title; ?></a></h3>
<footer class="source">
  <time class="age" datetime="<?php print $item->timestamp; ?>"><?php print $feed_age; ?></time>
  <?php if ($source_url): ?>
    <p class="feed-name"><strong><?php print t('Feed'); ?>:</strong> <a href="<?php print $source_url; ?>"><?php print $source_title; ?></a></p>
  <?php endif; ?>
</footer>
