<?php
/**
 * @file
 * threecol_50_25_25.inc
 */

/**
 * Implements hook_panels_layouts().
 */
function mojo_threecol_50_25_25_panels_layouts() {
  $items['threecol_50_25_25'] = array(
    'title' => t('Three column 50/25/25'),
    'category' => t('Columns: 3'),
    'icon' => 'threecol_50_25_25.png',
    'theme' => 'threecol_50_25_25',
    'admin css' => '../admin.css',
    'regions' => array(
      'first' => t('First'),
      'second' => t('Second'),
      'third' => t('Third'),
    ),
  );

  return $items;
}
