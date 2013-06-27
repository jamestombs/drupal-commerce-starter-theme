<?php
/**
 * @file
 * threecol_25_50_25.inc
 */

/**
 * Implements hook_panels_layouts().
 */
function mojo_threecol_25_50_25_panels_layouts() {
  $items['threecol_25_50_25'] = array(
    'title' => t('Three column 25/50/25'),
    'category' => t('Columns: 3'),
    'icon' => 'threecol_25_50_25.png',
    'theme' => 'threecol_25_50_25',
    'admin css' => '../admin.css',
    'regions' => array(
      'first' => t('First'),
      'second' => t('Second'),
      'third' => t('Third'),
    ),
  );

  return $items;
}
