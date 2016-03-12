global $pref;
$indexArray = array('lanflags_typ','lanflags_size','lanflags_aling');    
foreach($indexArray as $ind)
{
	if(!isset($pref[$ind]))
	{
		$pref[$ind]='';
	}
}
$lang_file = e_PLUGIN."userlanguage_flags_menu/languages/".e_LANGUAGE.".php";
include_lan($lang_file);
if ( ! defined('e107_INIT')) { exit(); }
$slng = new language;
$languageList = explode(',', e_LANLIST);
sort($languageList);
if($pref['lanflags_title'] ==''){
}
if(!$pref['user_lan_use']){
	require_once(e_HANDLER."file_class.php");
	$fl = new e_file;
	$lanlist = $fl->get_dirs(e_LANGUAGEDIR);
	sort($lanlist);
	$action = (e_QUERY && !$_GET['elan']) ? e_SELF."?".e_QUERY : e_SELF;
	$text = "<div style='text-align:".$pref['lanflags_aling']."'>\n";
	if($pref['lanflags_render'] == '1'){
			$text .= "<form method='post' action='".$action."'><div class='lan_flag'><select name='sitelanguage' class='tbox' >";
		foreach($lanlist as $langval){
			unset($selected);
			if($langval == USERLAN || ($langval == $pref['sitelanguage'] && USERLAN == "")){
				$selected = "selected='selected'";}
			$text .= "<option value='".$langval."' $selected>".$langval."</option>\n ";
		}
		$text .= "</select>";
		$text .= "<br /><br /><input class='button' type='submit' name='setlanguage' value='".USLFM_P_5."' /></div></form>";
	}else{
		foreach($lanlist as $langval)
		{
		$text .= "<form method='post' action='".$action."' style='display:inline;' class='lan_flag'><p style='display:inline;'><input type='hidden' name='setlanguage' value='".USLFM_P_5."' /><input type='hidden' name='sitelanguage' value='".$langval."' /><input type='image' style='display:inline' src='".e_PLUGIN."userlanguage_flags_menu/flags/".$pref['lanflags_typ']."/".$langval.".png' alt='".$langval."' title='".$langval."' width='".$pref['lanflags_size']."' /> </p></form>\n";
		}
	}
	$text .= "</div>";
}
echo $text;