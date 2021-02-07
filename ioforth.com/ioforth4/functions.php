<?php
function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug;
}


/*add meta box**/
$new_meta_boxes = array("title" => array("name" => "title", "tag" => "meta 标题"), "description" => array("name" => "description", "tag" => "网页描述"), "keywords" => array("name" => "keywords", "tag" => "关键词"));
function new_meta_boxes() {
	global $post, $new_meta_boxes;
	echo '<textarea style="width:100%; height:40px; margin:10px 0;" name="title" placeholder="title">' . get_post_meta($post -> ID, "title", true) . '</textarea><textarea style="width:100%; height:40px; margin:10px 0;" name="description" placeholder="description">' . get_post_meta($post -> ID, "description", true) . '</textarea><textarea style="width:100%; height:40px; margin:10px 0;" name="keywords" placeholder="keywords">' . get_post_meta($post -> ID, "keywords", true) . '</textarea>';
}

function create_meta_box() {
	global $theme_name;
	if (function_exists('add_meta_box')) {
		add_meta_box('new-meta-boxes', 'TDK信息', 'new_meta_boxes', 'post', 'normal', 'high');
	}
}

function save_postdata() {
	global $post;
	$newtitle = $_POST['title'];
	$newdescription = $_POST['description'];
	$newkeywords = $_POST['keywords'];
	if (!empty($newtitle)) {
		$otitle = get_post_meta($post -> ID, "title", true);
		if (empty($otitle)) {
			add_post_meta($post -> ID, "title", $newtitle, true);
		} else if ($otitle != $newtitle) {
			update_post_meta($post -> ID, "title", $newtitle);
		}
	}
	if (!empty($newdescription)) {
		$odescription = get_post_meta($post -> ID, "description", true);
		if (empty($odescription)) {
			add_post_meta($post -> ID, "description", $newdescription, true);
		} else if ($odescription != $newdescription) {
			update_post_meta($post -> ID, "description", $newdescription);
		}
	}

	if (!empty($newkeywords)) {
		$okeywords = get_post_meta($post -> ID, "keywords", true);
		if (empty($okeywords)) {
			add_post_meta($post -> ID, "keywords", $newkeywords, true);
		} else if ($newkeywords != $okeywords) {
			update_post_meta($post -> ID, "keywords", $newkeywords);
		}
	}
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

/*current product*/
function crtpro() {
	global $post;
	$temp = array('filmforth');
	$crtpro_value = get_post_meta($post -> ID, "crtpro", true);
	$str = '<select style="padding:0 10px;" name="crtpro">';
	foreach ($temp as $key => $value) {
		if ($crtpro_value == $value) {
			$str .= '<option selected="selected">' . $value . '</option>';
		} else {
			$str .= '<option>' . $value . '</option>';
		}
	}
	$str .= '</select>';
	echo $str;
}

function create_crtpro() {
	if (function_exists('add_meta_box')) {
		add_meta_box('crtpro', 'Current Product', 'crtpro', 'post', 'normal', 'high');
	}
}

function save_crtpro() {
	global $post;
	$newcrtpro = $_POST['crtpro'];
	$oldcrtpro = get_post_meta($post -> ID, "crtpro", true);
	if (!empty($newcrtpro)) {
		if (empty($oldcrtpro)) {
			add_post_meta($post -> ID, "crtpro", $newcrtpro, true);
		} else {
			update_post_meta($post -> ID, "crtpro", $newcrtpro);
		}

	} else {
		delete_post_meta($post -> ID, "crtpro");
	}
}

add_action('admin_menu', 'create_crtpro');
add_action('save_post', 'save_crtpro');

/*current product*/

/**
 相关文章推荐
 */
function relatedart() {
	global $post;
	echo "<textarea name='relatedart' style='width:100%; height:40px; margin:10px 0;' placeholder='related articles'>" . get_post_meta($post -> ID, "relatedart", true) . "</textarea>";
}

function create_relatedart() {
	if (function_exists('add_meta_box')) {
		add_meta_box('create_relatedart', 'related articles', 'relatedart', 'post', 'normal', 'high');
	}
}

function save_relatedart() {
	global $post;
	$relatedart_text = trim($_POST['relatedart']);
	$oldrelatedart_text = get_post_meta($post -> ID, "relatedart", true);
	if (!empty($relatedart_text)) {
		if (empty($oldrelatedart_text)) {
			add_post_meta($post -> ID, "relatedart", $relatedart_text, true);
		} else if ($relatedart_text != $oldrelatedart_text) {
			update_post_meta($post -> ID, "relatedart", $relatedart_text);
		}
	} else {
		delete_post_meta($post -> ID, "relatedart", $oprotext);
	}
}
add_action('admin_menu', 'create_relatedart');
add_action('save_post', 'save_relatedart');

/**
 descrumbs
 */
function descrumbs() {
	global $post;
	echo "<textarea name='descrumbs' style='width:100%; height:40px; margin:10px 0;' placeholder='descrumbs'>" . get_post_meta($post -> ID, "descrumbs", true) . "</textarea>";
}

function create_descrumbs() {
	if (function_exists('add_meta_box')) {
		add_meta_box('create_descrumbs', 'descrumbs', 'descrumbs', 'post', 'normal', 'high');
	}
}

function save_descrumbs() {
	global $post;
	$relatedart_text = trim($_POST['descrumbs']);
	$oldrelatedart_text = get_post_meta($post -> ID, "descrumbs", true);
	if (!empty($relatedart_text)) {
		if (empty($oldrelatedart_text)) {
			add_post_meta($post -> ID, "descrumbs", $relatedart_text, true);
		} else if ($relatedart_text != $oldrelatedart_text) {
			update_post_meta($post -> ID, "descrumbs", $relatedart_text);
		}
	} else {
		delete_post_meta($post -> ID, "descrumbs", $oprotext);
	}
}

add_action('admin_menu', 'create_descrumbs');
add_action('save_post', 'save_descrumbs');
add_filter('max_srcset_image_width', create_function('', 'return 1;'));
//disable srcset on images
function disable_srcset($sources) {
	return false;
}

add_filter('wp_calculate_image_srcset', 'disable_srcset');
/*
 * custom canonical link
 *
 * **/

function canonicallink() {
	global $post;
	echo "<textarea name='canonicallink' style='width:100%; height:40px; margin:10px 0;' placeholder='canonical link'>" . get_post_meta($post -> ID, "canonicallink", true) . "</textarea>";
}

function create_canonicallink() {
	if (function_exists('add_meta_box')) {
		add_meta_box('create_canonicallink', 'canonical link', 'canonicallink', 'post', 'normal', 'high');
	}
}

function save_canonicallink() {
	global $post;
	$ohterlanguage = trim($_POST['canonicallink']);
	$oldlanguate = get_post_meta($post -> ID, "canonicallink", true);
	if (!empty($ohterlanguage)) {
		if (empty($oldlanguate)) {
			add_post_meta($post -> ID, "canonicallink", $ohterlanguage, true);
		} else if ($ohterlanguage != $oldlanguate) {
			update_post_meta($post -> ID, "canonicallink", $ohterlanguage);
		}
	} else {
		delete_post_meta($post -> ID, "canonicallink");
	}
}

add_action('admin_menu', 'create_canonicallink');
add_action('save_post', 'save_canonicallink');


/**选择自定义样式**/
function add_style_select_buttons($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}

add_filter('mce_buttons', 'add_style_select_buttons');
function my_custom_styles($init_array) {
	$style_formats = array( array('title' => "green_border", 'block' => 'div', 'icon' => 'gavickpro-own-icon', 'classes' => 'green_border', 'wrapper' => true), array('title' => "note_style", 'block' => 'div', 'icon' => 'gavickpro-own-icon', 'classes' => 'note_style', 'wrapper' => true));

	//step_style
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode($style_formats);
	return $init_array;
}

add_filter('tiny_mce_before_init', 'my_custom_styles');
add_editor_style('css/editor-style.css');

/**选择自定义样式**/




/*缩略图**/
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
}

/*
 * custom canonical link
 *
 * **/

function customcheckbox() {
	global $post;
	$noindex = get_post_meta($post -> ID, "noindex", true);
	if ($noindex) {
		$noindex = "checked";
	} else {
		$noindex = "";
	}
	$nofollow = get_post_meta($post -> ID, "nofollow", true);
	if ($nofollow) {
		$nofollow = "checked";
	} else {
		$nofollow = "";
	}
	echo "<p style='display:inline-block; margin-left:10px;'><label for='noindex'>noindex:</label> <input type='checkbox' name='noindex' id='noindex' " . $noindex . "></p><p style='display:inline-block; margin-left:10px;'><label for='nofollow'>nofollow:</label> <input type='checkbox' name='nofollow' id='nofollow' " . $nofollow . "></p>";
}

function create_customcheckbox() {
	if (function_exists('add_meta_box')) {
		add_meta_box('customcheckbox', 'custom checkbox', 'customcheckbox', 'post', 'normal', 'high');
	}
}

function save_customcheckbox() {
	global $post;
	$noindex = $_POST['noindex'];
	$nofollow = $_POST['nofollow'];
	if ($noindex == "on") {
		$noindex = true;
	}
	if ($nofollow == "on") {
		$nofollow = true;
	}
	if ($noindex) {
		update_post_meta($post -> ID, "noindex", $noindex);
	} else {
		delete_post_meta($post -> ID, "noindex");
	}
	if ($nofollow) {
		update_post_meta($post -> ID, "nofollow", $nofollow);
	} else {
		delete_post_meta($post -> ID, "nofollow");
	}
}

add_action('admin_menu', 'create_customcheckbox');
add_action('save_post', 'save_customcheckbox');


?>
