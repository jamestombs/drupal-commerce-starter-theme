<?php
/**
 * @file
 * fourcol_stacked.inc
 */

/**
 * Implements hook_panels_layouts().
 */
function mojo_fourcol_stacked_panels_layouts() {
  $items['fourcol_stacked'] = array(
    'title' => t('Four column stacked'),
    'category' => t('Columns: 4'),
    'icon' => 'fourcol_stacked.png',
    'theme' => 'fourcol_stacked',
    'admin css' => '../admin.css',
    'regions' => array(
      'first' => t('First'),
      'second' => t('Second'),
      'third' => t('Third'),
      'fourth' => t('Fourth'),
      'fifth' => t('Fifth'),
      'sixth' => t('Sixth'),
    ),
  );

  return $items;
}
