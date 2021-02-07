<?php
$cat = get_the_category();
$catName=$cat[0] -> name;
$cat = $cat[0] -> slug;
$pro = get_post_meta($post -> ID, "crtpro", true);
$breadcrumb="";
switch($pro) {
	case "filmforth" :
		$breadcrumb="/video-editor/";
		break;
	default :
		"";
}
if($cat!=="video-editor"){
	$breadcrumb="/how-to.htm";
}
$breadcrumb="https://www.ioforth.com".$breadcrumb;
?>