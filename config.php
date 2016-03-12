<?php
/*
+ ----------------------------------------------------------------------------------------------------+
|        e107 website system 
|        Plugin file :  e107_plugins/userlanguage_flags_menu/config.php
|        Revision    1.5
|        Date        26.07.2013
|        Author      JmoRava, Oxigen ( www.e107.funsite.cz ) 
+----------------------------------------------------------------------------------------------------+
*/
$eplug_admin = TRUE;
require_once("../../class2.php");
if (!getperms("1")) {
	header("location:".e_BASE."index.php");
	 exit ;
}
require_once(e_ADMIN."auth.php");
include_lan(e_PLUGIN."userlanguage_flags_menu/languages/".e_LANGUAGE.".php");
require_once(e_HANDLER."form_handler.php");
$rs = new form;
	
if (isset($_POST['update_prefs'])) 
{ 
  $pref['lanflags_title_on']= $tp->toDB($_POST['lanflags_title_on']);
	$pref['lanflags_typ']     = $tp->toDB($_POST['lanflags_typ']);
	$pref['lanflags_size']    = $tp->toDB($_POST['lanflags_size']);
	$pref['lanflags_render']  = $tp->toDB($_POST['lanflags_render']); 
	$pref['lanflags_aling']   = $tp->toDB($_POST['lanflags_aling']); 
  
	save_prefs();
$ns->tablerender("", "<div style='text-align:center'><b>".USLFM_A_L1."</b></div>");
}
	
$text = "<div style='text-align:center'>
	<form method='post' action='".e_SELF."?".e_QUERY."' name='menu_conf_form'>
	<table style='width:85%' class='fborder'>";
//================  SHOW TITLE =================================================
$text .= "<tr>
	<td style='width:40%' class='forumheader3'>".USLFM_A_L5.": </td>
	<td style='width:60%' class='forumheader3'>".($pref['lanflags_title_on'] == 1 ? $rs->form_checkbox("lanflags_title_on", 1, 1) : $rs->form_checkbox("lanflags_title_on", 1, 0) )."
	<br /><b class='smalltext'>".USLFM_A_L6."</b></td>
	</tr>";
//================  RENDER =====================================================
 $text .= "<tr>
	<td style='width:40%' class='forumheader3'>".USLFM_A_L10.": </td>
	<td style='width:60%' class='forumheader3'>".($pref['lanflags_render'] == 1 ? $rs->form_checkbox("lanflags_render", 1, 1) : $rs->form_checkbox("lanflags_render", 1, 0) )."
	<br /><b class='smalltext'>".USLFM_A_L11."</b></td>
	</tr>";  	
//================  TYPE  ====================================================== 
$text .= "<tr>
	<td style='width:40%' class='forumheader3'>".USLFM_A_L7.": </td>
  <td style='width:40%' class='forumheader3'>
  <table><tr>
  <td>
    <center><img src='".e_PLUGIN_ABS."userlanguage_flags_menu/flags/0/English.png' style='border: 0px;' width='".$pref['lanflags_size']."' /><br />
    <input type='radio' name='lanflags_typ' value='0'  ".($pref['lanflags_typ'] == 0 ? ' checked="checked"' : '')." /></center>
  </td> 
	<td>
    <center><img src='".e_PLUGIN_ABS."userlanguage_flags_menu/flags/1/English.png' style='border: 0px;' width='".$pref['lanflags_size']."' /><br />
    <input type='radio' name='lanflags_typ' value='1'  ".($pref['lanflags_typ'] == 1 ? ' checked="checked"' : '')." /></center>
  </td>
  <td>
    <center><img src='".e_PLUGIN_ABS."userlanguage_flags_menu/flags/2/English.png' style='border: 0px;' width='".$pref['lanflags_size']."' /><br />
    <input type='radio' name='lanflags_typ' value='2'  ".($pref['lanflags_typ'] == 2 ? ' checked="checked"' : '')." /></center>
  </td>
  <td>
  <center><img src='".e_PLUGIN_ABS."userlanguage_flags_menu/flags/3/English.png' style='border: 0px;' width='".$pref['lanflags_size']."' /><br />
  <input type='radio' name='lanflags_typ' value='3'  ".($pref['lanflags_typ'] == 3 ? ' checked="checked"' : '')." /></center>
  </td> 
  </tr></table></td>
	</tr>";
  
//================  SIZE =======================================================
$text .= "<tr>
	<td style='width:40%' class='forumheader3'>".USLFM_A_L8.": </td>
	<td style='width:60%' class='forumheader3'>
	<input class='tbox' type='text' name='lanflags_size' size='5' value='".$pref['lanflags_size']."' maxlength='2' /> ".USLFM_A_L9."
	</td>
	</tr>";  
//================  ALIGN ======================================================
$text .= "<tr>
	<td style='width:40%' class='forumheader3'>".USLFM_A_L13.": </td>
	<td style='width:60%' class='forumheader3'>
  <input type='radio' name='lanflags_aling' value='left'  ".($pref['lanflags_aling'] == 'left' ? ' checked="checked"' : '')." />".USLFM_A_L14."
	<input type='radio' name='lanflags_aling' value='center'  ".($pref['lanflags_aling'] == 'center' ? ' checked="checked"' : '')." />  ".USLFM_A_L15."
  <input type='radio' name='lanflags_aling' value='right'  ".($pref['lanflags_aling'] == 'right' ? ' checked="checked"' : '')." />  ".USLFM_A_L16."
	</td>
	</tr>";                   
	
$text .= "<tr style='vertical-align:top'>
	<td colspan='2'  style='text-align:center' class='forumheader'>
	<input class='button' type='submit' name='update_prefs' value='".USLFM_A_L3."' />
	</td>
	</tr>
	</table>
	</form>
	</div>";
$ns->tablerender(USLFM_A_L4, $text);
require_once(e_ADMIN."footer.php");
?>