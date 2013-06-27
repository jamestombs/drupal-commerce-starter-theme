<?php
/**
 * @file
 * twocol_stacked.inc
 */

/**
 * Implements hook_panels_layouts().
 */
function mojo_twocol_stacked_panels_layouts() {
  $items['twocol_stacked'] = array(
    'title' => t('Two column 50/50 stacked'),
    'category' => t('Columns: 2'),
    'icon' => 'twocol_stacked.png',
    'theme' => 'twocol_stacked',
    'admin css' => '../admin.css',
    'regions' => array(
      'first' => t('First'),
      'second' => t('Second'),
      'third' => t('Third'),
      'fourth' => t('Fourth'),
    ),
  );

  return $items;
}
