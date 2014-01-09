<?php /*
Plugin Name: VS Mobile Theme
Description: You can easily define another theme as mobile theme.
Version: 1.0
Author: Vikasumit
Author URI: http://www.vikasumit.com/
Plugin URI: https://github.com/Vikasumit/mobiletheme
*/
add_filter('template', 'change_theme');
add_filter('option_template', 'change_theme');
add_filter('option_stylesheet', 'change_theme');
add_filter('stylesheet', 'change_theme_style');

function vs_is_mobile(){
 if(wp_is_mobile())
 { 
  if (isset($_COOKIE['viewmode']) && $_COOKIE['viewmode']=='desktop') 
   return false;
  else if (isset($_COOKIE['viewmode']) && $_COOKIE['viewmode']=='mobile') 
   return true;
  else 
   return true;
  } else {
  if (isset($_COOKIE['viewmode']) && $_COOKIE['viewmode']=='mobile') 
   return true;
  else 
   return false;
  }
}
function vs_setviewmode(){
 if(isset($_GET['viewmode']) && in_array($_GET['viewmode'], array("mobile","desktop"))) {  
  $_COOKIE['viewmode']= $_GET['viewmode'];
  setcookie('viewmode', $_GET['viewmode'], time()+ 3600, "/");
 }
}

vs_setviewmode();
function change_theme($theme)
{
	if (vs_is_mobile()== true) {
		$theme = 'ronflower-mobile';  
	}
	return $theme;
}

function change_theme_style($style='') {
	if (vs_is_mobile()== true) {
		$style = 'ronflower-mobile';  
	}
	return $style;
}
?>