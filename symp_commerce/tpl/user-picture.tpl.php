<?php
/**
 * @file
 * Default theme implementation to present a picture configured for the
 * user's account.
 */
?>
<?php if ($user_picture): ?>
  <figure class="user-picture"><?php print $user_picture; ?></figure>
<?php endif; ?>
