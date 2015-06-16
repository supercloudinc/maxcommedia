<?php
/*------------------------------------------------------------------------
# "Hot Cinema" - Joomla Template - September 2012
# Copyright (C) 2012 HotThemes All Rights Reserved.
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Author: HotJoomlaTemplates.com
# Website: http://www.hotjoomlatemplates.com
-------------------------------------------------------------------------*/
defined( '_JEXEC' ) or die( 'Restricted access' );

JHtml::_('bootstrap.framework', true);

define( 'YOURBASEPATH', dirname(__FILE__) );
$template_path = $this->baseurl.'/templates/'.$this->template;

$css_request = false;
if (isset($_GET['css_request'])) {
   if($_GET['css_request'] == "1") $css_request = true;
}
if(!$css_request){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />

<?php	// template parameters
}		
		// Calculate next values:---
		$IsIphone = stristr($_SERVER['HTTP_USER_AGENT'],'iPhone'); 
		$IsIpad = stristr($_SERVER['HTTP_USER_AGENT'],'iPad');
		$IsAndroid = stristr($_SERVER['HTTP_USER_AGENT'],'android');
		//-------------------------
		
		// template layout -----------------------------------------------------------------
		$templateWidth = $this->params->get("templateWidth", "960");
		$layoutdesign = $this->params->get("layoutdesign", "row1+rowClass1+logo=2=0,user3=10=0&row2+rowClass2+left=2=0,joom_content=8=0,right=2=0&row3+rowClass3+footer1=3=0,footer2=3=0,footer3=3=0,footer4=3=0&row4+rowClass4+bottom=12=0");
		$cellPaddingHorizontal = $this->params->get("cellPaddingHorizontal", "0");
		$cellPaddingVertical = $this->params->get("cellPaddingVertical", "0");
		$cellMarginHorizontal = $this->params->get("cellMarginHorizontal", "10");
		$cellMarginVertical = $this->params->get("cellMarginVertical", "0");
		$textDirection = $this->params->get("textDirection", "ltr");
		$useiphonelayout = $this->params->get("useiphonelayout", "0");
		$iphoneWidth = $this->params->get("iphoneWidth", $templateWidth);
		$iphone_layout = $this->params->get("iphone_layout", $layoutdesign);
		$useipadlayout = $this->params->get("useipadlayout", "0");
		$ipadWidth = $this->params->get("ipadWidth", $templateWidth);
		$ipad_layout = $this->params->get("ipad_layout", $layoutdesign);
		$useandroidlayout = $this->params->get("useandroidlayout", "0");
		$andriodWidth = $this->params->get("andriodWidth", $templateWidth);
		$android_layout = $this->params->get("android_layout", $layoutdesign);
		
		if($IsIphone && $useiphonelayout != "0"){
		  $layoutdesign  = $iphone_layout;
		  $templateWidth = $iphoneWidth;
		}
		
		if($IsIpad && $useipadlayout != "0"){
		  $layoutdesign = $ipad_layout;
		  $templateWidth = $ipadWidth;
		}
		
		if($IsAndroid && $useandroidlayout != "0"){
		  $layoutdesign = $android_layout;
		  $templateWidth = $andriodWidth; 
		}
		//----------END LAYOUT-----------------------------------------------------------

		// Check if abovecontent and belowcontent are active ----------------------------

		$abovecontent = $this->countModules('abovecontent');
		$belowcontent = $this->countModules('belowcontent');

		// Get active style from parameters
		$templateStyle = $this->params->get("templateStyle", "0");
		
		// Call Sparky Parameters -------------------------------------------------------
		
		require(dirname(__FILE__).DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'sparky_parameters.php');

		// TEMPLATE STYLES - Overwrite sparky_parameters.php
		// This adds live style switching (cookie based)
			
			// check if it cookie
			if(isset($_COOKIE['Style']))
			{
			$templateStyle = $_COOKIE['Style'];
			}
			
			$templateStyleTest = "";
		
			// check if in link
			if (isset($_GET['style'])) {
				$templateStyleTest = $_GET['style']; 
			}
			
			if ($templateStyleTest) { 
				$templateStyle = $templateStyleTest;
				$Month = 2592000 + time(); 
				setcookie("Style", $templateStyle, $Month);
			}

		// Get specific parameters for this style from /styles
			
		if($templateStyle) {
			
			require(dirname(__FILE__).DIRECTORY_SEPARATOR.'styles'.DIRECTORY_SEPARATOR.'style'.$templateStyle.'.php');
			
		}else{

		// If no active style, use these default specific parameters
		
		$bodyBgColor = "#FFFFFF";
		$fullCarouselShade = "255,255,255,0.7";
		$bordersColor = "#ddd";
		$k2Headings = "#097054";
		
		}
		
		// READ MENU CONFIGURATION ///////////////////////////////////////////////////////

		$LoadMENU_Acc  = false;
		$LoadMENU_Navh = false;
		$LoadMENU_Mega = false;
		$LoadMENU_Nav  = false;	
		
		global $mnucfg;
		$mnucfg = array();
		foreach( explode("&",$this->params->get("mnucfg", "")) as $mnu){
		  $mnu = explode("=",$mnu);
		  $mnu_name = $mnu[0];
		  $mnu_val  = $mnu[1];
		  
		  if($mnu_val == "acc"){
		    $LoadMENU_Acc = true;
		  }else if($mnu_val == "navh"){
		    $LoadMENU_Navh = true;
		  }else if($mnu_val == "nav"){
		    $LoadMENU_Nav = true;
		  }else if($mnu_val == "mega"){
		    $LoadMENU_Mega = true;
		  }
		  
		  $mnucfg[$mnu_name] = array();
		  $mnucfg[$mnu_name]['type'] = $mnu_val;
		  foreach( explode(",",$mnu[2]) as $prm){
		    $prm = explode(":",$prm);
			if($prm[0])
				$mnucfg[$mnu_name][$prm[0]] = $prm[1];
		  }
		}
		
		
	    ////////////////////////////////////////////////////////////////////////////////
		//e.g.: echo $mnucfg['footer1']['text_color'];
		
		$spread_mode = true; //set this to false if you don't want modules to spread to empty modules right of them
		
		//READ MODULE GRID START////////////////////////////////////////////////////////
		$module_grid = $layoutdesign;
		$module_grid = explode('&',$module_grid);
		$loop = 0;
		for($loop = 0; $loop < count($module_grid) ; $loop++){
		   $module_grid[$loop] = explode('+',$module_grid[$loop]);
		   if(stripos($module_grid[$loop][2], "joom_content") > -1){
		     $module_grid[$loop][3] = true; 
		   }else{
		     $module_grid[$loop][3] = false;
		   }
		   $module_grid[$loop][2] = explode(',',$module_grid[$loop][2]);
		   $I = 0;
		   for($I = 0; $I < count($module_grid[$loop][2]) ; $I++){
		     $module_grid[$loop][2][$I] = explode('=',$module_grid[$loop][2][$I]); 
			 $module_grid[$loop][2][$I][1] =intval($module_grid[$loop][2][$I][1]);
			 $module_grid[$loop][2][$I][2] =intval($module_grid[$loop][2][$I][2]);
		   }
		   
		   if($spread_mode){
			   $carry_cell = 0;
			   $last_hasm  = -1;
			   
			   for($I = count($module_grid[$loop][2]) - 1 ;$I >= 0; $I--){
				 if(($this->countModules($module_grid[$loop][2][$I][0]) == 0 ) && $module_grid[$loop][2][$I][0] != 'joom_content' && $module_grid[$loop][2][$I][0] != 'logo' && $module_grid[$loop][2][$I][0] != 'fontresize'){
					$carry_cell += ($module_grid[$loop][2][$I][1] + $module_grid[$loop][2][$I][2]);
					$module_grid[$loop][2][$I][1] = 0;
					$module_grid[$loop][2][$I][2] = 0;
				 }else{
					$module_grid[$loop][2][$I][1] += $carry_cell;
					$carry_cell = 0;
					$last_hasm  = $I;
				 }
			   }
			   
			   if($last_hasm != -1 && $carry_cell > 0){
			     $module_grid[$loop][2][$last_hasm][1] += $carry_cell; 
			   }
		   } 
		}
		//READ MODULE GRID END////////////////////////////////////////////////////////
		
if($css_request){
	header("Content-type: text/css; charset: UTF-8");     
	header("Expires: ".gmdate("D, d M Y H:i:s", time() + 60*60)." GMT");
	require(dirname(__FILE__).DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.'template_css.php');
	exit;

}else{

$u =& JFactory::getURI();
$css_url = $u->toString();
$css_url = strrpos($css_url,'?')? $css_url.'&css_request=1' :  $css_url.'?css_request=1';
if ($randomizeCssLink) { $css_url = $css_url.'&amp;diff='.rand(); }
?>
<link rel="stylesheet" href="<?php echo $css_url; ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo $template_path ?>/css/joomla.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $template_path ?>/css/template_css.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $template_path ?>/css/layout.css" type="text/css" />
<?php if ($scrollToTopSwitch) { ?>
<link rel="stylesheet" href="<?php echo $template_path ?>/css/scroll_to_top.css" type="text/css" />
<?php } ?>
<?php require(dirname(__FILE__).DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'menu_loader.php'); ?>
</head>
<body>
<?php if ($topPanelSwitch) {
	require(dirname(__FILE__).DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'top_panel.php');
} ?>
<div class="sparky_wrapper">
<?php
$cell_size = $templateWidth / 12;
$cell_size = floor($cell_size);  
$empty_no  = 0;
foreach($module_grid as $gridRow) {
//$gridRow[0] - Name
//$gridRow[1] - Class
//$gridRow[2] - ModulePos1,ModulePos2...
//$gridRow[3] - Holds content flag: true/false
//$mpostion[0] - postion name 
//$mpostion[1] - number of grid cells occupied by position
//$mpostion[2] - number of empty cells left of module 
	$modules_in_row = 0;
	foreach($gridRow[2] as $mpostion) {
		$modules_in_row += $this->countModules($mpostion[0]);	// number of active modules in the row
		if($mpostion[0] == "logo") { $modules_in_row++; }
		if($mpostion[0] == "joom_content") { $modules_in_row++; }
	}
	if($modules_in_row) {
	?>
    <div class="sparky_full<?php if($gridRow[1]) { echo ' '.$gridRow[1]; } ?>">
        <div class="sparky_main">
            <div <?php if($gridRow[0]) { echo 'id="'.$gridRow[0].'"'; } ?> class="row">
            <?php   
            foreach($gridRow[2] as $mpostion) {
				$mpwidth = $cell_size * $mpostion[1];  
				if($mpwidth == 0) continue;
				$mpleft_off = $cell_size * $mpostion[2];  
				if($mpostion[0] == "joom_content") {		// if content cell
	                if($mpleft_off){						// if empty cell
	                ?>
	                  <div class="cell mp_empty<?php echo $empty_no; ?>"   >
	                     <!-- EMPTY CELL -->
	                     <div>&nbsp;</div>
	                  </div>
	                <?php
	                 $empty_no++;
	                }  
	                ?>
	                <div class="content_sparky">
	                    <div class="cell_pad">
	                        <jdoc:include type="message" />
	                        <?php if($abovecontent) { ?>
	                        <div class="abovecontent">
	                        	<jdoc:include type="modules" name="abovecontent" style="xhtml" />
	                        </div>
	                        <?php } ?>
	                        <jdoc:include type="component" />
	                        <?php if($belowcontent) { ?>
	                        <div class="belowcontent">
	                        	<jdoc:include type="modules" name="belowcontent" style="xhtml" />
	                        </div>
	                        <?php } ?>
	                    </div>
	                </div>
                <?php
                } elseif($mpostion[0] == "logo") {		// if logo cell
					if($mpleft_off){						// if empty cell
					require(dirname(__FILE__).DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'empty.php');
					$empty_no++;
					}
					require(dirname(__FILE__).DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'logo.php');
					}elseif($mpostion[0] == "fontresize") {		// if fontresize cell
					if($mpleft_off){							// if empty cell
					require(dirname(__FILE__).DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'empty.php');
					$empty_no++;
					}
					require(dirname(__FILE__).DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'font_resize.php');
				} else {									// if normal module cell
	                if($mpleft_off){						// if empty cell
	                  require(dirname(__FILE__).DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'empty.php');
	                  $empty_no++;
	                } 
	                ?>
					<div class="cell mp_<?php echo $mpostion[0];?>">
						<div class="cell_pad">
							<jdoc:include type="modules" name="<?php echo $mpostion[0]; ?>" style="xhtml" />
						</div>
					</div>
	                <?php 
	            }
        	} ?>
            </div>
            <div class="clr"></div> 
        </div> 
        <div class="clr"></div> 
    </div>
<?php
	} // if $modules_in_row
} // foreach($module_grid as $gridRow)
?>
</div>
<?php
if ($equalHeightClasses) {
	require(dirname(__FILE__).DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'equal_height.php');
}
if ($scrollToTopSwitch) {
	require(dirname(__FILE__).DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'scroll_to_top.php');
}
if ($analyticsSwitch && $analyticsAccount) {
	require(dirname(__FILE__).DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'analytics.php');
}
?>
</body>
</html>
<?php } // if($css_request) ?>