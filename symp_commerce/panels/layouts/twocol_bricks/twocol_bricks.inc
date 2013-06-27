<?php
/**
 * @file
 * twocol_bricks.inc
 */

/**
 * Implements hook_panels_layouts().
 */
function mojo_twocol_bricks_panels_layouts() {
  $items['twocol_bricks'] = array(
    'title' => t('Two column 50/50 bricks'),
    'category' => t('Columns: 2'),
    'icon' => 'twocol_bricks.png',
    'theme' => 'twocol_bricks',
    'admin css' => '../admin.css',
    'regions' => array(
      'first' => t('First'),
      'second' => t('Second'),
      'third' => t('Third'),
      'fourth' => t('Fourth'),
      'fifth' => t('Fifth'),
      'sixth' => t('Sixth'),
      'seventh' => t('Seventh'),
    ),
  );

  return $items;
}
