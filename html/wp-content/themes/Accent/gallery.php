<?php
/**
 * The main template file for display gallery page.
 *
 * @package WordPress
*/

session_start();

if(isset($_SESSION['pp_gallery_style']))
{
	$pp_gallery_style = $_SESSION['pp_gallery_style'];
}
else
{
	$pp_gallery_style = get_option('pp_gallery_style');
}

if($pp_gallery_style == '4')
{
	include_once(TEMPLATEPATH.'/gallery-4.php');
	exit;
}
else if($pp_gallery_style == 'galleria')
{
	include_once(TEMPLATEPATH.'/gallery-galleria.php');
	exit;
}
?>