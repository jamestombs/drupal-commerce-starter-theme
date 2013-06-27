<?php
/**
 * @file
 * Preprocess and process functions.
 */

/**
 * Override or insert variables into the html template.
 */
function symp_commerce_preprocess_html(&$vars) {

  // Modify RDF output.
  if (module_exists('rdf')) {
    $vars['doctype'] = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+RDFa 1.1//EN">' . "\n";
    $vars['rdf']->version = ' version="HTML+RDFa 1.1"';
    $vars['rdf']->namespaces = $vars['rdf_namespaces'];
    $vars['rdf']->profile = ' profile="' . $vars['grddl_profile'] . '"';
  }
  else {
    $vars['doctype'] = '<!DOCTYPE html>' . "\n";
    $vars['rdf']->version = '';
    $vars['rdf']->namespaces = '';
    $vars['rdf']->profile = '';
  }

  // Add HTML5 Shiv if not using Modernizr.
  $vars['shiv'] = '<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
  if (module_exists('modernizr')) {
    $vars['shiv'] = '';
  }

  // Add Selectivizr.
  $vars['selectivizr'] = '';
  if (theme_get_setting('use_selectivizr')) {
    $vars['selectivizr'] = '<!--[if (lt IE 9) & (!IEMobile)]><script src="http://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script><![endif]-->';
  }

  // Urge IE6 users to upgrade.
  $vars['warn_ie6'] = '';
  if (theme_get_setting('warn_ie6')) {
    $vars['warn_ie6'] = '<!--[if lt IE 7]><p class="ie6-warning">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->';
  }

  // Add language body class.
  if (function_exists('locale')) {
    $vars['classes_array'][] = 'lang-' . $vars['language']->language;
  }

  // Add body classes for each page and section.
  if (!$vars['is_front']) {
    $path = drupal_get_path_alias($_GET['q']);
    list($section,) = explode('/', $path, 2);
    if (arg(0) == 'node') {
      if (arg(1) == 'add') {
        $section = 'page-node-add';
      }
      elseif (is_numeric(arg(1)) && (arg(2) == 'edit' || arg(2) == 'delete')) {
        $section = 'page-node-' . arg(2);
      }
    }
    $vars['classes_array'][] = drupal_html_class('section-' . $section);
  }

}

/**
 * Override or insert variables into the page template.
 */
function symp_commerce_preprocess_page(&$vars) {

}

/**
 * Override or insert variables into the node template.
 */
function symp_commerce_preprocess_node(&$vars) {
  $vars['classes_array'][] = 'content';
  $vars['attributes_array']['role'][] = 'article';
  $vars['title_attributes_array']['class'][] = 'article-title';
  $vars['content_attributes_array']['class'][] = 'content';
  $vars['content_attributes_array']['class'][] = 'article-content';
  $vars['datetime'] = format_date($vars['created'], 'custom', 'c');
  $vars['date'] = format_date($vars['created'], 'custom', 'F j, Y');
  if (variable_get('node_submitted_' . $vars['node']->type, TRUE)) {
    $vars['submitted'] = t('!datetime by !username',
      array(
        '!datetime' => '<time class="node-date" datetime="' . $vars['datetime'] . '" pubdate="pubdate">' . $vars['date'] . '</time>',
        '!username' => $vars['name'],
      )
    );
  }
  else {
    $vars['submitted'] = '';
  }
  $vars['unpublished'] = '';
  if (!$vars['status']) {
    $vars['unpublished'] = '<div class="unpublished">' . t('Unpublished') . '</div>';
  }
}

/**
 * Override or insert variables into the region template.
 */
function symp_commerce_preprocess_region(&$vars) {

  // Add region-sidebar class to sidebar regions.
  if ($vars['region'] == 'sidebar_first' || $vars['region'] == 'sidebar_second') {
    $vars['classes_array'][] = 'region-sidebar';
  }
}

/**
 * Override or insert variables into the comment template.
 */
function symp_commerce_preprocess_comment(&$vars) {
  $vars['classes_array'][] = 'clearfix';
  $vars['title_attributes_array']['class'][] = 'comment-title';
  $vars['content_attributes_array']['class'][] = 'content';
  $vars['content_attributes_array']['class'][] = 'comment-content';
  $vars['datetime'] = format_date($vars['comment']->created, 'custom', 'c');
  $vars['date'] = format_date($vars['comment']->created, 'custom', 'F j, Y g:i a');
  $vars['created'] = '<time class="comment-date" datetime="' . $vars['datetime'] . '" pubdate="pubdate">' . $vars['date'] . '</time>';
  $vars['unpublished'] = '';
  if ($vars['status'] == 'comment-unpublished') {
    $vars['unpublished'] = '<div class="unpublished">' . t('Unpublished') . '</div>';
  }
}

/**
 * Override or insert variables into the field template.
 */
function symp_commerce_preprocess_field(&$vars) {
  $vars['title_attributes_array']['class'][] = 'field-label';
  $vars['content_attributes_array']['class'][] = 'field-items';

  // Edit classes for taxonomy term reference fields.
  if ($vars['field_type_css'] == 'taxonomy-term-reference') {
    $vars['content_attributes_array']['class'][] = 'comma-separated';
  }
}

/**
 * Override or insert variables into the aggregator feed item template.
 */
function symp_commerce_preprocess_aggregator_item(&$vars) {
  $item = $vars['item'];
  $vars['datetime'] = format_date($item->timestamp, 'custom', 'c');
}

/**
 * Change the search form to use the "search" input element of HTML5.
 */
function symp_commerce_preprocess_search_block_form(&$vars) {
  $vars['search_form'] = str_replace('type="text"', 'type="search"', $vars['search_form']);
}
