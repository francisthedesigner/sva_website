<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function nexus_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * Insert themed breadcrumb page navigation at top of the node content.
 */
function nexus_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Use CSS to hide titile .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // comment below line to hide current page to breadcrumb
$breadcrumb[] = drupal_get_title();
    $output .= '<nav class="breadcrumb">' . implode(' » ', $breadcrumb) . '</nav>';
    return $output;
  }
}

/**
 * Override or insert variables into the page template.
 */
function nexus_preprocess_page(&$vars) {
  if (isset($vars['main_menu'])) {
    $vars['main_menu'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'main-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['main_menu'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'secondary-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_menu'] = FALSE;
  }
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function nexus_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Override or insert variables into the node template.
 */
function nexus_preprocess_node(&$variables) {
  $node = $variables['node'];
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
  $variables['date'] = t('!datetime', array('!datetime' =>  date('j F Y', $variables['created'])));

  $variables['theme_hook_suggestions'][] = 'node__'. $variables['type'] . '__' . $variables['view_mode'];
}

function nexus_page_alter($page) {
  // <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
    'name' =>  'viewport',
    'content' =>  'width=device-width, initial-scale=1, maximum-scale=1'
    )
  );
  drupal_add_html_head($viewport, 'viewport');
}


/**
 * Add javascript files for front-page jquery slideshow.
 */
if (drupal_is_front_page()) {
}
function nexus_menu_tree_main_menu(&$variables) {
  return '<ul class="menu nav">' . $variables['tree'] . '</ul>';
}

function nexus_menu_tree(&$variables) {
  return '<ul class="nav navbar-nav navbar-right text-uppercase" id="top-menu">' . $variables['tree'] . 
  '</ul>';
}

function nexus_menu_link(array $variables) {
  $element = $variables['element'];
  unset($element['#attributes']['class']);
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674

 if ((strpos($_GET['q'], $element['#href']) !== false)||($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . "</li>\n";
}

function nexus_form_element(&$variables) {
  $element = &$variables['element'];
  $name = !empty($element['#name']) ? $element['#name'] : FALSE;
  $type = !empty($element['#type']) ? $element['#type'] : FALSE;
  $checkbox = $type && $type === 'checkbox';
  $radio = $type && $type === 'radio';

  // Create an attributes array for the wrapping container.
  if (empty($element['#wrapper_attributes'])) {
    $element['#wrapper_attributes'] = array();
  }
  $wrapper_attributes = &$element['#wrapper_attributes'];

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );

  // Add wrapper ID for 'item' type.
  if ($type && $type === 'item' && !empty($element['#markup']) && !empty($element['#id'])) {
    $wrapper_attributes['id'] = $element['#id'];
  }

  // Check for errors and set correct error class.
  if ((isset($element['#parents']) && form_get_error($element)) || (!empty($element['#required']))) {
    $wrapper_attributes['class'][] = 'has-error';
  }

  // Add necessary classes to wrapper container.
  $wrapper_attributes['class'][] = 'form-item';
  if ($name) {
    $wrapper_attributes['class'][] = 'form-item-' . drupal_html_class($name);
  }
  if ($type) {
    $wrapper_attributes['class'][] = 'form-type-' . drupal_html_class($type);
  }
  if (!empty($element['#attributes']['disabled'])) {
    $wrapper_attributes['class'][] = 'form-disabled';
  }
  if (!empty($element['#autocomplete_path']) && drupal_valid_path($element['#autocomplete_path'])) {
    $wrapper_attributes['class'][] = 'form-autocomplete';
  }

  // Checkboxes and radios do no receive the 'form-group' class, instead they
  // simply have their own classes.
  if ($checkbox || $radio) {
    $wrapper_attributes['class'][] = drupal_html_class($type);
  }
  elseif ($type && $type !== 'hidden') {
    $wrapper_attributes['class'][] = 'form-group';
  }

  // Create a render array for the form element.
  $build = array(
    '#theme_wrappers' => array('container__form_element'),
    '#attributes' => $wrapper_attributes,
  );

  // Render the label for the form element.
  $build['label'] = array(
    '#markup' => theme('form_element_label', $variables),
  );

  // Increase the label weight if it should be displayed after the element.
  if ($element['#title_display'] === 'after') {
    $build['label']['#weight'] = 10;
  }

  // Checkboxes and radios render the input element inside the label. If the
  // element is neither of those, then the input element must be rendered here.
  if (!$checkbox && !$radio) {
    $prefix = isset($element['#field_prefix']) ? $element['#field_prefix'] : '';
    $suffix = isset($element['#field_suffix']) ? $element['#field_suffix'] : '';
    if ((!empty($prefix) || !empty($suffix)) && (!empty($element['#input_group']) || !empty($element['#input_group_button']))) {
      if (!empty($element['#field_prefix'])) {
        $prefix = '<span class="input-group-' . (!empty($element['#input_group_button']) ? 'btn' : 'addon') . '">' . $prefix . '</span>';
      }
      if (!empty($element['#field_suffix'])) {
        $suffix = '<span class="input-group-' . (!empty($element['#input_group_button']) ? 'btn' : 'addon') . '">' . $suffix . '</span>';
      }

      // Add a wrapping container around the elements.
      $input_group_attributes = &_bootstrap_get_attributes($element, 'input_group_attributes');
      $input_group_attributes['class'][] = 'input-group';
      $prefix = '<div' . drupal_attributes($input_group_attributes) . '>' . $prefix;
      $suffix .= '</div>';
    }

    // Build the form element.
    $build['element'] = array(
      '#markup' => $element['#children'],
      '#prefix' => !empty($prefix) ? $prefix : NULL,
      '#suffix' => !empty($suffix) ? $suffix : NULL,
    );
  }

  // Construct the element's description markup.
  if (!empty($element['#description'])) {
    $build['description'] = array(
      '#type' => 'container',
      '#attributes' => array(
        'class' => array('help-block'),
      ),
      '#weight' => 20,
      0 => array('#markup' => filter_xss_admin($element['#description'])),
    );
  }

  // Render the form element build array.
  return drupal_render($build);
}

function nexus_preprocess_image(&$variables) {
  $attributes = &$variables['attributes'];

  foreach (array('width', 'height') as $key) {
    unset($attributes[$key]);
    unset($variables[$key]);
  }
}

function nexus_filefield_item($file, $field) {
  $node->call();
  if (filefield_view_access($field['field_name']) && filefield_file_listed($file, $field)) {
    $node = node_load($file['nid']);
    if ($node->type == 'resource_newsletter'){ 
     
      $filepath = $file['filepath'];
      //$filename = $file['filename'];
      $icon = theme('filefield_icon', $file);
      $filesize = '<span class="file-size">' . format_size($file['filesize']) . '</span>';  
      $link = l(t('Download Related Publication'), $filepath, array('attributes' => array('class' => 'download-publication')));
      
      return $icon . $link . ' ' . $filesize;
    }
    
    else {
      return theme('filefield_file', $file); //default theming
    }
  }
  return '';
}

function nexus_theme() {
  $hooks['user_login'] = array(
    'template' => 'user_login',
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'nexus').'/templates'
    // other theme registration code...
    );
  $hooks['contact_site_form'] = array(
    'render element' => 'form',
    'template' => 'contact-site-form',
    'path' => drupal_get_path('theme', 'nexus').'/templates'
    );
  return $hooks;
}

function nexus_preprocess_contact_site_form(&$vars) {
  $vars['contact'] = drupal_render_children($vars['form']);
}
function nexus_preprocess_user_login(&$vars) {
  $vars['login'] = drupal_render_children($vars['form']);
}

function nexus_form_alter(&$form, $form_state, $form_id) {
  if ($form_id === 'commerce_cart_add_to_cart_form_5' || $form_id === 'commerce_cart_add_to_cart_form_1') { 
      $form['submit']['#attributes']['title'] = $form['submit']['#attributes']['value'] = t('Click here to register');
    }
  if ($form_id === 'commerce_cart_add_to_cart_form_4' || $form_id === 'commerce_cart_add_to_cart_form_3') { 
      $form['submit']['#attributes']['title'] = $form['submit']['#attributes']['value'] = t('Pay online now');
    }
}