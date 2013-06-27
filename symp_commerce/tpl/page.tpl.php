<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 */
?>
<div class="page">
  <header class="masthead clearfix" role="banner">
    <?php if ($logo): ?><img class="site-logo" src="<?php print $logo; ?>" alt="" /><?php endif; ?>
    <?php if ($site_name || $site_slogan): ?>
      <hgroup class="site-name-and-slogan">
      <?php if ($site_name): ?>
          <h1 class="site-name">
            <?php if (!$is_front): ?><a href="<?php print $front_page; ?>" title="<?php print t('Go to the home page'); ?>" rel="home"><?php endif; ?>
              <span><?php print $site_name; ?></span>
            <?php if (!$is_front): ?></a><?php endif; ?>
          </h1>
        <?php endif; ?>
        <?php if ($site_slogan): ?>
          <h2 class="site-slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
      </hgroup>
    <?php endif; ?>
    <?php print render($page['header']); ?>
  </header>
  <?php if ($main_menu || $secondary_menu || $breadcrumb): ?>
    <nav id="site-navigation" class="site-navigation" role="navigation">
      <?php if ($main_menu): ?>
        <div class="main-menu-wrapper clearfix">
          <?php print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'class' => array('menu', 'main-menu'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </div>
      <?php endif; ?>
      <?php if ($secondary_menu): ?>
        <div class="secondary-menu-wrapper clearfix">
          <?php print theme('links__system_secondary_menu', array(
            'links' => $secondary_menu,
            'attributes' => array(
              'class' => array('menu', 'secondary-menu', 'pipeline'),
            ),
            'heading' => array(
              'text' => t('Secondary menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </div>
      <?php endif; ?>
      <?php print $breadcrumb; ?>
    </nav>
  <?php endif; ?>
  <section id="main-content" class="main-content clearfix" role="main">
    <?php print $messages; ?>
    <?php print render($page['help']); ?>
    <?php print render($page['highlighted']); ?>
    <div class="main-column">
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print render($tabs); ?>
      <?php if ($action_links = render($action_links)): ?>
        <ul class="action-links"><?php print $action_links; ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>
    <?php print render($page['sidebar_first']); ?>
    <?php print render($page['sidebar_second']); ?>
  </section>
  <footer class="main-footer clearfix" role="contentinfo">
    <?php print render($page['footer']); ?>
  </footer>
</div>
