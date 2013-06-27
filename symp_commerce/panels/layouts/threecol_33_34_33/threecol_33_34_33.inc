<?php
/**
 * @file
 * threecol_33_34_33.inc
 */

/**
 * Implements hook_panels_layouts().
 */
function mojo_threecol_33_34_33_panels_layouts() {
  $items['threecol_33_34_33'] = array(
    'title' => t('Three column 33/33/33'),
    'category' => t('Columns: 3'),
    'icon' => 'threecol_33_34_33.png',
    'theme' => 'threecol_33_34_33',
    'admin css' => '../admin.css',
    'regions' => array(
      'first' => t('First'),
      'second' => t('Second'),
      'third' => t('Third'),
    ),
  );

  return $items;
}
