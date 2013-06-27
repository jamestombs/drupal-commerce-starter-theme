<?php
/**
 * @file
 * twocol.inc
 */

/**
 * Implements hook_panels_layouts().
 */
function mojo_twocol_panels_layouts() {
  $items['twocol'] = array(
    'title' => t('Two column 50/50'),
    'category' => t('Columns: 2'),
    'icon' => 'twocol.png',
    'theme' => 'twocol',
    'admin css' => '../admin.css',
    'regions' => array(
      'first' => t('First'),
      'second' => t('Second'),
    ),
  );

  return $items;
}
