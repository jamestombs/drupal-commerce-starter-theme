<?php
/**
 * @file
 * maintenance-page.tpl.php
 */
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 7]> <html class="ie7 no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 8]> <html class="ie8 no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 9]> <html class="ie9 no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <!--<![endif]-->
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <h2 class="element-invisible"><?php print t('Page links'); ?></h2>
  <ul class="menu page-links">
    <li><a href="#main-content" class="element-invisible element-focusable"><?php print t('Main content'); ?></a></li>
  </ul>
  <div class="page">
    <header role="banner" class="masthead clearfix">
      <?php if ($logo): ?><img class="site-logo" src="<?php print $logo; ?>" alt="" /><?php endif; ?>
      <?php if ($site_name || $site_slogan): ?>
        <hgroup class="site-name-and-slogan">
        <?php if ($site_name): ?>
            <h2 class="site-name">
              <?php if (!$is_front): ?><a href="<?php print $front_page; ?>" title="<?php print t('Go to the home page'); ?>" rel="home"><?php endif; ?>
                <span><?php print $site_name; ?></span>
              <?php if (!$is_front): ?></a><?php endif; ?>
            </h2>
          <?php endif; ?>
          <?php if ($site_slogan): ?>
            <h3 class="site-slogan"><?php print $site_slogan; ?></h3>
          <?php endif; ?>
        </hgroup>
      <?php endif; ?>
      <?php print render($page['header']); ?>
    </header>
    <div id="main-content" role="main" class="clearfix">
      <section class="main-column">
        <?php if ($title): ?>
          <h1 class="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print $messages; ?>
        <div class="content"><?php print $content; ?></div>
      </section>
    </div>
  </div>
</body>
</html>
