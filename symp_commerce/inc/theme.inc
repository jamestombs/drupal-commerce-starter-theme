<?php
/**
 * @file
 * Theme functions.
 */

/**
 * Override HTML for main menu links.
 */
function symp_commerce_links__system_main_menu($vars) {

  // Display the main menu as a drop-down menu.
  if (theme_get_setting('use_dropdowns')) {
    $pid = variable_get('menu_main_links_source', 'main-menu');
    $tree = menu_tree($pid);
    return '<h2 class="element-invisible">' . t('Main menu') . '</h2>' . drupal_render($tree);
  }

  return theme_links($vars);
}

/**
 * Override HTML for comment links.
 */
function symp_commerce_links__comment($vars) {

  // Add pipeline class to comment links.
  $vars['attributes']['class'][] = 'pipeline';

  return theme_links($vars);
}

 /**
  * Override HTML for menu trees.
  */
function symp_commerce_menu_tree($vars) {
  return '<ul class="menu tree">' . $vars['tree'] . '</ul>';
}

 /**
  * Override HTML for toolbar menu tree.
  */
function symp_commerce_menu_tree__shortcut_set_1($vars) {
  return '<ul class="menu">' . $vars['tree'] . '</ul>';
}

 /**
  * Override HTML for main menu tree.
  */
function symp_commerce_menu_tree__main_menu($vars) {
  return '<ul class="menu main-menu">' . $vars['tree'] . '</ul>';
}

/**
 * Override HTML for primary and secondary local tasks.
 */
function symp_commerce_menu_local_tasks($vars) {
  $output = '';

  if (!empty($vars['primary'])) {
    $vars['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tasks') . '</h2>';
    $vars['primary']['#prefix'] .= '<ul class="menu navbar taskbar">';
    $vars['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($vars['primary']);
  }

  if (!empty($vars['secondary'])) {
    $vars['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tasks') . '</h2>';
    $vars['secondary']['#prefix'] .= '<ul class="menu navbar pipeline">';
    $vars['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($vars['secondary']);
  }

  return $output;
}

/**
 * Override HTML for breadcrumb trail.
 */
function symp_commerce_breadcrumb($vars) {
  $breadcrumb = $vars['breadcrumb'];
  $breadcrumb_display = theme_get_setting('breadcrumb_display');

  // Check theme setting to display breadcrumbs.
  if ($breadcrumb_display == 'yes' || $breadcrumb_display == 'admin' && arg(0) == 'admin') {

    // Remove the Home link.
    if (!theme_get_setting('breadcrumb_home')) {
      array_shift($breadcrumb);
    }

    if (!empty($breadcrumb)) {

      // Add breadcrumb separator.
      $breadcrumb_separator = filter_xss(theme_get_setting('breadcrumb_separator'));
      $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
      $output .= '<p class="breadcrumb">' . implode($breadcrumb_separator, $breadcrumb);

      // Add page title to breadcrumbs.
      if (theme_get_setting('breadcrumb_title')) {
        $output .= ' ' . $breadcrumb_separator . ' ' . drupal_get_title();
      }

      // Add a trailing separator.
      if (theme_get_setting('breadcrumb_trailing')) {
        $output .= ' ' . $breadcrumb_separator;
      }

      $output .= '</p>';
      return $output;
    }
  }
  return '';
}

/**
 * Override HTML for RSS feed icon.
 */
function symp_commerce_feed_icon($vars) {
  $text = t('Subscribe to @feed-title', array('@feed-title' => $vars['title']));
  return l($text, $vars['url'], array('html' => TRUE, 'attributes' => array('class' => array('feed-icon'))));
}

/**
 * Override HTML for boxes.
 */
function symp_commerce_boxes_box($vars) {
  $block = $vars['block'];
  $empty = '';

  // If the box is empty, add a class and show something if the user has
  // permission to edit it.
  if ((empty($block['title']) || ($block['title'] == '<none>')) && empty($block['content'])) {
    $empty = ' box-empty';
    if (boxes_access_edit()) {
      $block['content'] = t('This box appears empty when displayed on this page. This is simply placeholder text.');
    }
    else {
      return;
    }
  }

  $output = "<div id='boxes-box-" . $block['delta'] . "' class='boxes-box" . (!empty($block['editing']) ? ' boxes-box-editing' : '') . $empty . "'>";
  $output .= $block['content'];
  if (!empty($block['controls'])) {
    $output .= '<div class="boxes-box-controls">';
    $output .= $block['controls'];
    $output .= '</div>';
  }
  if (!empty($block['editing'])) {
    $output .= '<div class="box-editor">' . drupal_render($block['editing']) . '</div>';
  }
  $output .= '</div>';
  return $output;
}
