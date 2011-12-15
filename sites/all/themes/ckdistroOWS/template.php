<?php

function _ckdistroOWS_fast_tasks() {
  	
  	global $user;

    $menu_tree[] = array('href' => 'node/add', 'title' => t('Post Dashboard'));
    $menu_tree[] = array('href' => 'node/add/blog', 'title' => t('Blog Post'));
    $menu_tree[] = array('href' => 'admin/user', 'title' => t('Manage Users'));
	$menu_tree[] = array('href' => 'admin/build', 'title' => t('Site Builder'));
    $menu_tree[] = array('href' => 'admin/settings', 'title' => t('Site Configuration'));
    $menu_tree[] = array('href' => 'admin/reports', 'title' => t('View Reports'));
    
	if ($menu_tree) {
		$output = '<div id="fast-tasks">';
		$output .= '<h4>Fast Tasks</h4>';
	    $output .= '<ul>';
	    $i=0;
	    foreach ($menu_tree as $key => $item) {
	      $id = ' id="fast-task-'.$i.'"';
	      $output .= '<li'. $id .'><a href="'. url($item['href']) .'">'. $item['title'] .'</a></li>';
	      $i++;
	    }
	    $output .= '</ul></div>';
  	}

  	return $output;
}


function ckdistroOWS_preprocess_page(&$vars) {
	if (theme_get_setting('fast_tasks')) {
		$vars['fast_tasks'] = _ckdistroOWS_fast_tasks(); 
	}

	if (theme_get_setting('title_text')) {
		if (theme_get_setting('title_text_custom')) {
			$vars['title_text'] = theme_get_setting('title_text_custom');
		} else {
			$vars['title_text'] = variable_get('site_name', 'drupal');
		}
	}

	// Hook into color.module
	
	
	if (module_exists('color')) {
		_color_page_alter($vars);
	}
}

/*
function ckdistroOWS_help($path, $arg) {
	switch ($path) {
		case 'admin':
			$output = t('this is ckdistroOWS help text');
			return $output;
	}


}
*/

/**
 * Return a full tree of the expanded menu. Thank you multiflex-3 for this code!
 */
function ckdistroOWS_primary() {
  $output = menu_tree(variable_get('menu_primary_links_source', 'primary-links'));
  return $output;
}

function ckdistroOWS_secondary() {
  $output = menu_tree(variable_get('menu_secondary_links_source', 'secondary-links'));
  return $output;
}


/**
 * Modify the theme search box. Thank you http://agaric.com/note/theme-search-form-drupal-6 for instructions.
 */
function ckdistroOWS_preprocess_search_theme_form(&$vars, $hook) {
  // Remove the search box title.
  unset($vars['form']['search_theme_form']['#title']);
  
  // Replace the submit button with an image.
  $theme_path = drupal_get_path('theme', 'ckdistroOWS');
  $vars['form']['submit'] = array('#type' => 'image_button', '#value' => t('Search'),
                             '#src'  => $theme_path . '/img/magnify.gif');

  // Rebuild the rendered version (search form only, rest remains unchanged)
  unset($vars['form']['search_theme_form']['#printed']);
  $vars['search']['search_theme_form'] = drupal_render($vars['form']['search_theme_form']);

  // Rebuild the rendered version (submit button, rest remains unchanged)
  unset($vars['form']['submit']['#printed']);
  $vars['search']['submit'] = drupal_render($vars['form']['submit']);

  // Collect all form elements to make it easier to print the whole form.
  $vars['search_form'] = implode($vars['search']);
}