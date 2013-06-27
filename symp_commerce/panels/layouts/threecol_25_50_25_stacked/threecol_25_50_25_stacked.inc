<?php
/**
 * @file
 * threecol_25_50_25_stacked.inc
 */

/**
 * Implements hook_panels_layouts().
 */
function mojo_threecol_25_50_25_stacked_panels_layouts() {
  $items['threecol_25_50_25_stacked'] = array(
    'title' => t('Three column 25/50/25 stacked'),
    'category' => t('Columns: 3'),
    'icon' => 'threecol_25_50_25_stacked.png',
    'theme' => 'threecol_25_50_25_stacked',
    'admin css' => '../admin.css',
    'regions' => array(
      'first' => t('First'),
      'second' => t('Second'),
      'third' => t('Third'),
      'fourth' => t('Fourth'),
      'fifth' => t('Fifth'),
    ),
  );

  return $items;
}
