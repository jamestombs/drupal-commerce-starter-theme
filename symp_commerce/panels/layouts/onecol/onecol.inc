<?php
/**
 * @file
 * onecol.inc
 */

/**
 * Implements hook_panels_layouts().
 */
function mojo_onecol_panels_layouts() {
  $items['onecol'] = array(
    'title' => t('One column'),
    'category' => t('Columns: 1'),
    'icon' => 'onecol.png',
    'theme' => 'onecol',
    'admin css' => '../admin.css',
    'regions' => array(
      'first' => t('First'),
    ),
  );

  return $items;
}
