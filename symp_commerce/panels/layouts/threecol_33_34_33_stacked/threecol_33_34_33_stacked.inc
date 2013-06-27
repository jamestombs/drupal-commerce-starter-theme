<?php
/**
 * @file
 * threecol_33_34_33_stacked.inc
 */

/**
 * Implements hook_panels_layouts().
 */
function mojo_threecol_33_34_33_stacked_panels_layouts() {
  $items['threecol_33_34_33_stacked'] = array(
    'title' => t('Three column 33/33/33 stacked'),
    'category' => t('Columns: 3'),
    'icon' => 'threecol_33_34_33_stacked.png',
    'theme' => 'threecol_33_34_33_stacked',
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
