<?php
/**
 * @file
 * template.php
 */

require_once dirname(__FILE__) . '/inc/process.inc';
require_once dirname(__FILE__) . '/inc/theme.inc';

// Auto-rebuild the theme registry during theme development.
if (theme_get_setting('rebuild_registry')) {

  // Rebuild .info data.
  system_rebuild_theme_data();

  // Rebuild theme registry.
  drupal_theme_rebuild();

  // Warn everybody.
  drupal_set_message(t(
    'Theme registry is being rebuilt on every page. <a href="@link">Turn this off</a> on production sites.',
    array('@link' => url('admin/appearance/settings/' . $GLOBALS['theme']))
  ), 'warning', FALSE);
}

// Add CSS and JavaScript for the mobile menu.
if (theme_get_setting('use_mobile_menu')) {
  drupal_add_js(drupal_get_path('theme', $GLOBALS['theme_key']) . '/js/mobile-menu.js', array('scope' => 'footer', 'every_page' => TRUE));
  drupal_add_css(drupal_get_path('theme', $GLOBALS['theme_key']) . '/css/mobile-menu.css', array('group' => CSS_THEME, 'every_page' => TRUE));
}

// Add Homes style sheet.
if (theme_get_setting('use_holmes') && user_access('administer nodes')) {
  drupal_add_css(drupal_get_path('theme', $GLOBALS['theme_key']) . '/css/holmes.css', array('group' => CSS_THEME));
}

// Add IE conditional style sheet.
drupal_add_css(
  drupal_get_path('theme', $GLOBALS['theme_key']) . '/css/ie.css',
  array(
    'group' => CSS_THEME,
    'browsers' => array('IE' => 'lt IE 9', '!IE' => FALSE),
  )
);

/**
 * Implements hook_js_alter().
 */
function symp_commerce_js_alter(&$javascript) {

  // Optimize the scope of scripts for front-end performance.
  if (theme_get_setting('optimize_scripts')) {

    // Scripts that go in the header.
    $header_scripts[] = drupal_get_path('theme', $GLOBALS['theme_key']) . '/js/modernizr.min.js';
    if (module_exists('modernizr')) {
      $header_scripts[] = drupal_get_path('module', 'modernizr') . '/modernizr.min.js';
    }
    if (module_exists('respondjs')) {
      $header_scripts[] = drupal_get_path('module', 'respondjs') . '/lib/respond.min.js';
      $header_scripts[] = 'sites/all/libraries/respondjs/respond.min.js';
    }

    // Move all scripts to the footer.
    foreach ($javascript as $key => $script) {
      $javascript[$key]['scope'] = 'footer';

      // Move header scripts to the top.
      foreach ($header_scripts as $item => $value) {
        if ($key == $value) {
          $javascript[$key]['scope'] = 'header';
        }
      }
    }
  }
}

/**
 * Implements hook_html_head_alter().
 */
function symp_commerce_html_head_alter(&$head_elements) {

  // HTML5 charset declaration.
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8',
  );

  // Add handheld friendly meta tag.
  if (theme_get_setting('use_handheld_friendly')) {
    $head_elements['handheld_friendly'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'HandheldFriendly',
        'content' => 'true',
      ),
    );
  }

  // Add mobile optimized meta tag.
  if (theme_get_setting('use_mobile_optimized')) {
    $head_elements['mobile_optimized'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'MobileOptimized',
        'content' => 'width',
      ),
    );
  }

  // Add iOS mobile meta tags.
  if (theme_get_setting('use_ios_meta')) {
    $head_elements['ios_web_app'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'apple-mobile-web-app-capable',
        'content' => 'yes',
      ),
    );
    $head_elements['ios_status_bar'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'apple-mobile-web-app-status-bar-style',
        'content' => 'black-translucent',
      ),
    );
  }

  // Optimize mobile viewport.
  if (theme_get_setting('use_mobile_viewport')) {
    $head_elements['mobile_viewport'] = array(
      '#type' => 'html_tag',
      '#tag' => 'meta',
      '#attributes' => array(
        'name' => 'viewport',
        'content' => filter_xss(theme_get_setting('mobile_viewport_value')),
      ),
    );
  }

  // Force IE to use Chrome Frame if installed.
  $meta_compatible_content = 'IE=edge';
  if (theme_get_setting('use_chrome_frame')) {
    $meta_compatible_content = 'IE=edge,chrome=1';
  }
  $head_elements['chrome_frame'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'X-UA-Compatible',
      'content' => $meta_compatible_content,
    ),
  );

  // Remove image toolbar in IE.
  $head_elements['ie_image_toolbar'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'ImageToolbar',
      'content' => 'false',
    ),
  );

  // Better font rendering in IE.
  $head_elements['ie_cleartype'] = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'cleartype',
      'content' => 'on',
    ),
  );
}

/**
 * Implements hook_css_alter().
 */
function symp_commerce_css_alter(&$css) {

  // Unwanted core stylesheets.
  $remove[] = 'misc/vertical-tabs.css';
  $remove[] = 'misc/vertical-tabs-rtl.css';
  $remove[] = drupal_get_path('module', 'comment') . '/comment.css';
  $remove[] = drupal_get_path('module', 'comment') . '/comment-rtl.css';
  $remove[] = drupal_get_path('module', 'contextual') . '/contextual.css';
  $remove[] = drupal_get_path('module', 'contextual') . '/contextual-rtl.css';
  $remove[] = drupal_get_path('module', 'field') . '/theme/field.css';
  $remove[] = drupal_get_path('module', 'field') . '/theme/field-rtl.css';
  $remove[] = drupal_get_path('module', 'file') . '/file.css';
  $remove[] = drupal_get_path('module', 'filter') . '/filter.css';
  $remove[] = drupal_get_path('module', 'node') . '/node.css';
  $remove[] = drupal_get_path('module', 'search') . '/search.css';
  $remove[] = drupal_get_path('module', 'search') . '/search-rtl.css';
  $remove[] = drupal_get_path('module', 'system') . '/system.admin.css';
  $remove[] = drupal_get_path('module', 'system') . '/system.admin-rtl.css';
  $remove[] = drupal_get_path('module', 'system') . '/system.base.css';
  $remove[] = drupal_get_path('module', 'system') . '/system.base-rtl.css';
  $remove[] = drupal_get_path('module', 'system') . '/system.maintenance.css';
  $remove[] = drupal_get_path('module', 'system') . '/system.menus.css';
  $remove[] = drupal_get_path('module', 'system') . '/system.menus-rtl.css';
  $remove[] = drupal_get_path('module', 'system') . '/system.messages.css';
  $remove[] = drupal_get_path('module', 'system') . '/system.messages-rtl.css';
  $remove[] = drupal_get_path('module', 'system') . '/system.theme.css';
  $remove[] = drupal_get_path('module', 'system') . '/system.theme-rtl.css';
  $remove[] = drupal_get_path('module', 'user') . '/user.css';
  $remove[] = drupal_get_path('module', 'user') . '/user-rtl.css';

  // Unwanted contrib stylesheets.
  $remove[] = drupal_get_path('module', 'ctools') . '/css/ctools.css';
  $remove[] = drupal_get_path('module', 'panels') . '/css/panels.css';
  $remove[] = drupal_get_path('module', 'views') . '/css/views.css';
  $remove[] = drupal_get_path('module', 'views') . '/css/views-rtl.css';

  // Remove unwanted stylesheets.
  foreach ($remove as $key => $value) {
    unset($css[$value]);
  }
}
