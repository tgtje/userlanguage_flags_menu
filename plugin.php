<?php
/*
+ ----------------------------------------------------------------------------------------------------+
|        e107 website system 
|        Plugin file :  e107_plugins/userlanguage_flags_menu/plugin.php
|        Revision    1.5
|        Date        26.07.2013
|        Author      JmoRava, Oxigen ( www.e107.funsite.cz ) 
+----------------------------------------------------------------------------------------------------+
*/
if( ! defined('e107_INIT')){ exit(); }
$eplug_folder = "userlanguage_flags_menu";
include_lan(e_PLUGIN.'userlanguage_flags_menu/languages/'.e_LANGUAGE.'.php');
$eplug_name = 'USLFM_P_1';
$eplug_version = "1.5";
$eplug_author = "JmoRava";
$eplug_url = "http://www.e107.funsite.cz/";
$eplug_email = "jmorava@email.cz";
$eplug_description = USLFM_P_2;
$eplug_compatible = "e107v0.7+";
$eplug_compliant = TRUE; //
$eplug_menu_name = USLFM_P_3;
$eplug_conffile = "config.php";
$eplug_icon = $eplug_folder."/images/logo_32.png";
$eplug_icon_small = $eplug_folder."/images/logo_16.png";
$eplug_caption = USLFM_P_4;
$eplug_done = USLFM_P_6." ".USLFM_P_1." v".$eplug_version." ".USLFM_P_8;
//============ List of preferences =============================================
$eplug_prefs = array(
  "lanflags_title_on" => "0",
  "lanflags_typ" => "0",
  "lanflags_size" => "32",
  "lanflags_render" => "0",
  "lanflags_aling" => "center",
);
//============ Create a link in main menu (yes=TRUE, no=FALSE) =================
$eplug_link = FALSE;

//============ Upgrading =======================================================
$upgrade_remove_prefs = array(
		'lanflags_title' ,
	);

$eplug_upgrade_done = USLFM_P_7." ".$eplug_version." ".USLFM_P_8.".";

?>