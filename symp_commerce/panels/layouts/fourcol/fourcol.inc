<?php
/**
 * @file
 * fourcol.inc
 */

/**
 * Implements hook_panels_layouts().
 */
function mojo_fourcol_panels_layouts() {
  $items['fourcol'] = array(
    'title' => t('Four column'),
    'category' => t('Columns: 4'),
    'icon' => 'fourcol.png',
    'theme' => 'fourcol',
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
