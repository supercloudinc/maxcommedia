/*------------CSS STYLESHEET DYNAMICALLY GENERATED BY SPARKY FRAMEWORK---------------*/

<?php if($googleWebFonts){ ?>
/*------------GOOGLE FONTS---------------*/
<?php echo $googleWebFonts; } ?>
html {
    font-size:<?php echo $pSize; ?>px;
}

body {
    color:<?php echo $pColor; ?>;
    font-family:<?php echo $pFamily; ?>;
    text-align:<?php echo $pAlign; ?>;
    font-weight:<?php echo $pWeight; ?>;
    font-style:<?php echo $pStyle; ?>;
<?php if($textDirection=="rtl") { ?>    direction:rtl;
<?php } ?>
<?php if(!$bodyBgImageSwitch) { ?>
    background:<?php echo $bodyBgColor; ?>;
<?php } if($bodyBgImageSwitch && $bodyBgImageFile) { ?>
    background:<?php echo $bodyBgColor; ?> url(<?php echo $template_path; ?>/images/<?php echo $bodyBgImageFile; ?>) <?php echo $bodyBgImageVerticalAlign.' '.$bodyBgImageHorizontalAlign.' '.$bodyBgImageRepeat; if($bodyBgImageFixedSwitch) { echo " fixed"; } ?>;
<?php } ?>
}

/*------------GENERIC LAYOUT---------------*/

.sparky_main {
   width:<?php echo $templateWidth; ?>px;
}

.row {
   width:<?php echo $templateWidth; ?>px; 
}

.cell_pad {
	padding:<?php echo $cellPaddingVertical; ?>px <?php echo $cellPaddingHorizontal; ?>px;
    margin:<?php echo $cellMarginVertical; ?>px <?php echo $cellMarginHorizontal; ?>px;
}

<?php
$cell_size = $templateWidth / 12;
$cell_size = floor($cell_size);  
$empty_no  = 0;
foreach($module_grid as $gridRow){
//$gridRow[0] - Name
//$gridRow[1] - Class
//$gridRow[2] - ModoulPos1,ModoulPos2...
//$gridRow[3] - Holds content flag: true/false
	foreach($gridRow[2] as $mpostion){
	//$mpostion[0] - postion name 
	//$mpostion[1] - number of grid cells occupied by postion
	//$mpostion[2] - number of empty cells left of module
	
	  $mpwidth = $cell_size * $mpostion[1];  
	  $mpleft_off = $cell_size * $mpostion[2];  
	  if( $mpostion[0] == "joom_content"){
		if($mpleft_off){
?>
.mp_empty<?php echo $empty_no; ?>{
	width:<?php echo $mpleft_off; ?>px;
}

<?php
		 $empty_no++;
		}  
?>
.content_sparky {
	width:<?php echo $mpwidth; ?>px;
}

<?php
	  }else{
		if($mpleft_off){
?>
.mp_empty<?php echo $empty_no; ?>{
	width:<?php echo $mpleft_off; ?>px;
}

<?php
		  $empty_no++;
		} 
?>
.mp_<?php echo $mpostion[0];?>{
	width:<?php echo $mpwidth; ?>px;
}

<?php
	  }
	}
}
?>

/*------------ COMMON SETTINGS ---------------*/

a {
	color:<?php echo $linksColor; ?>;
    font-weight:<?php echo $linksWeight; ?>;
    font-style:<?php echo $linksStyle; ?>;
    text-decoration:<?php if($linksUnderline) { echo "underline"; }else{ echo "none"; } ?>;
}

h1, h1 a {
	color:<?php echo $h1Color; ?>;
    font-size:<?php echo $h1Size; ?>px;
    font-family:<?php echo $h1Family; ?>;
    text-align:<?php echo $h1Align; ?>;
    font-weight:<?php echo $h1Weight; ?>;
    font-style:<?php echo $h1Style; ?>;
    <?php if($h1Underline) { ?>text-decoration:underline;<?php } ?>
}

h2, h2 a {
	color:<?php echo $h2Color; ?>;
    font-size:<?php echo $h2Size; ?>px;
    font-family:<?php echo $h2Family; ?>;
    text-align:<?php echo $h2Align; ?>;
    font-weight:<?php echo $h2Weight; ?>;
    font-style:<?php echo $h2Style; ?>;
    <?php if($h2Underline) { ?>text-decoration:underline;<?php } ?>
}

h3 {
    color:<?php echo $h3Color; ?>;
    font-size:<?php echo $h3Size; ?>px;
    font-family:<?php echo $h3Family; ?>;
    text-align:<?php echo $h3Align; ?>;
    font-weight:<?php echo $h3Weight; ?>;
    font-style:<?php echo $h3Style; ?>;
    <?php if($h3Underline) { ?>text-decoration:underline;<?php } ?>
}

h4 {
    color:<?php echo $h4Color; ?>;
    font-size:<?php echo $h4Size; ?>px;
    font-family:<?php echo $h4Family; ?>;
    text-align:<?php echo $h4Align; ?>;
    font-weight:<?php echo $h4Weight; ?>;
    font-style:<?php echo $h4Style; ?>;
    <?php if($h4Underline) { ?>text-decoration:underline;<?php } ?>
}

img {
    border:none;
}

/*--------------LOGO----------------*/

.sparky_logo, .sparky_logo a {
	color:<?php echo $logoColor; ?>;
    font-size:<?php echo $logoSize; ?>px;
    font-family:<?php echo $logoFamily; ?>;
    font-weight:<?php echo $logoWeight; ?>;
    font-style:<?php echo $logoStyle; ?>;
	text-align:<?php echo $logoAlign; ?>;
    text-decoration:none;
}

.sparky_slogan {
	color:<?php echo $sloganColor; ?>;
    font-size:<?php echo $sloganSize; ?>px;
    font-family:<?php echo $sloganFamily; ?>;
    font-weight:<?php echo $sloganWeight; ?>;
    font-style:<?php echo $sloganStyle; ?>;
	text-align:<?php echo $sloganAlign; ?>;
}

<?php
foreach($mnucfg as $menu_name => $menu) {
if($menu['type'] == "standard") { ?>

/*--------------STANDARD----------------*/

ul.mnu_<?php echo $menu_name;?> {
    margin:0;
    padding:0;
    text-align:<?php echo $menu['text_align']; ?>;
}

ul.mnu_<?php echo $menu_name;?> ul {
    margin:<?php echo $menu['margin_sub']; ?>px;
    padding:0;
}

.mnu_<?php echo $menu_name;?> li {
    display:block;
}

<?php if($menu['direction'] == "horizontal") { ?>
.mnu_<?php echo $menu_name;?> > li {
    display:inline;
}
<?php } ?>

.mnu_<?php echo $menu_name;?> > li {
    margin-bottom:<?php echo $menu['bottom_margin']; ?>px;
    padding:<?php echo $menu['vertical_padding']; ?>px <?php echo $menu['horizontal_padding']; ?>px;
    font-size:<?php echo $menu['font_size']; ?>px;
    font-weight:<?php echo $menu['font_weight']; ?>;
    font-style:<?php echo $menu['font_style']; ?>;
    text-align:<?php echo $menu['text_align']; ?>;
}

.mnu_<?php echo $menu_name;?> > li > a {
    color:<?php echo $menu['text_color']; ?>;
    font-family:<?php echo $menu['font_family']; ?>;
    font-weight:<?php echo $menu['font_weight']; ?>;
    font-style:<?php echo $menu['font_style']; ?>;
}

.mnu_<?php echo $menu_name;?> > li > a:hover {
    color:<?php echo $menu['links_hover_color']; ?>;
}

.mnu_<?php echo $menu_name;?> > li li {
    margin:0;
    padding:0;
    font-size:<?php echo $menu['font_size_sub']; ?>px;
    line-height:<?php echo $menu['subitem_height']; ?>px;
    font-weight:<?php echo $menu['font_weight']; ?>;
    font-style:<?php echo $menu['font_style']; ?>;
    text-align:<?php echo $menu['text_align']; ?>;
}

.mnu_<?php echo $menu_name;?> > li li a {
    color:<?php echo $menu['text_color_sub']; ?>;
    font-family:<?php echo $menu['font_family_sub']; ?>;
    font-weight:<?php echo $menu['font_weight']; ?>;
    font-style:<?php echo $menu['font_style']; ?>;
    text-align:<?php echo $menu['text_align']; ?>;
}

.mnu_<?php echo $menu_name;?> > li li a:hover {
    color:<?php echo $menu['links_hover_color_sub']; ?>;   
}

<?php } elseif($menu['type'] == "acc") { ?>

/*--------------ACCORDION----------------*/

.mnu_<?php echo $menu_name;?> ul {
    background:<?php echo $menu['accordion_pane_bg']; ?>;
}
.mnu_<?php echo $menu_name;?> li, .mnu_<?php echo $menu_name;?> li li ul  {
    border:<?php echo $menu['accordion_pane_border_size']; ?>px solid <?php echo $menu['accordion_pane_border_color']; ?>;
    border-radius:<?php echo $menu['accordion_pane_border_radius']; ?>px;
    background:<?php echo $menu['accordion_pane_bg']; ?>;
}

.mnu_<?php echo $menu_name;?> li a {
    font-family:<?php echo $menu['font_family']; ?>;
    font-size:<?php echo $menu['font_size']; ?>px;
    color:<?php echo $menu['text_color']; ?>;
}

.mnu_<?php echo $menu_name;?> li a:hover {
	color:<?php echo $menu['links_hover_color']; ?> !important;
}

.mnu_<?php echo $menu_name;?> li ul li a {
    color:<?php echo $menu['text_color_sub']; ?>;
    font-size:<?php echo $menu['font_size_sub']; ?>px;
}

.mnu_<?php echo $menu_name;?> li ul li a:hover {
    color:<?php echo $menu['links_hover_color_sub']; ?> !important;
}
<?php } elseif($menu['type'] == "nav") { ?>

/*--------------DROP-DOWN----------------*/

.mnu_<?php echo $menu_name;?> {
    margin:0;
    padding:0;
    list-style-type:none;
    list-style-position:outside;
    position:absolute;
    z-index:100;
}

.mnu_<?php echo $menu_name;?> ul {
    margin:0;
    padding:0;
    list-style-type:none;
    list-style-position:outside;
    position:absolute;
    z-index:100;
    background:<?php echo $menu['drop_down_pane_bg']; ?>;
}

.mnu_<?php echo $menu_name;?> ul {
    width:<?php echo $menu['drop_down_pane_width']; ?>px;
    left:-1px;
    border:<?php echo $menu['border_size_sub_lvl']; ?>px solid <?php echo $menu['border_color_sub_lvl']; ?>;
    padding:<?php echo $menu['drop_down_pane_padding']; ?>px;
}

.mnu_<?php echo $menu_name;?> > li > a, .mnu_<?php echo $menu_name;?> > li > span {
    display:block;
    margin:0;
    text-decoration:none;
    color:<?php echo $menu['text_color']; ?>;
    font-size:<?php echo $menu['font_size']; ?>px;
    padding-left:<?php echo $menu['drop_down_button_horiz_padding']; ?>px;
    padding-right:<?php echo $menu['drop_down_button_horiz_padding']; ?>px;
    padding-top:<?php echo $menu['drop_down_button_top_padding']; ?>px;
    font-family:<?php echo $menu['font_family']; ?>;
    font-weight:<?php echo $menu['font_weight']; ?>;
    font-style:<?php echo $menu['font_style']; ?>;
    height:<?php echo $menu['drop_down_button_height']; ?>px;
    cursor:pointer;
}

.mnu_<?php echo $menu_name;?> > li.active > a, .mnu_<?php echo $menu_name;?> > li.active > span {
    color:<?php echo $menu['active_text_color']; ?> !important;
    cursor:pointer;
}

.mnu_<?php echo $menu_name;?> > li > a:hover, .mnu_<?php echo $menu_name;?> > li:hover > a,
.mnu_<?php echo $menu_name;?> > li > a:hover, .mnu_<?php echo $menu_name;?> > li:hover > span {
    color:<?php echo $menu['links_hover_color']; ?>;
}

.mnu_<?php echo $menu_name;?> > li {
    float:left;
    position:relative;
<?php if ($menu['drop_down_button_width']) { ?>width:<?php echo $menu['drop_down_button_width']; ?>px;<?php } ?>
    text-align:<?php echo $menu['text_align']; ?>;
    margin:0;
    border-right:<?php echo $menu['border_size_first_lvl']; ?>px solid <?php echo $menu['border_color_first_lvl']; ?>;
    border-bottom:<?php echo $menu['border_size_first_lvl']; ?>px solid <?php echo $menu['border_color_first_lvl']; ?>;
    border-top:<?php echo $menu['border_size_first_lvl']; ?>px solid <?php echo $menu['border_color_first_lvl']; ?>;
    background:<?php echo $menu['button_bg']; ?>;
}

.mnu_<?php echo $menu_name;?> > li.active {
    background:<?php echo $menu['active_button_bg']; ?>;
}

.mnu_<?php echo $menu_name;?> > li:first-child {
    border-left:<?php echo $menu['border_size_first_lvl']; ?>px solid <?php echo $menu['border_color_first_lvl']; ?>;
}

.mnu_<?php echo $menu_name;?> li:hover {
    position:relative;
    background:<?php echo $menu['button_hover_bg']; ?>;
}

.mnu_<?php echo $menu_name;?> li ul li:hover {
    background:<?php echo $menu['drop_down_hover_bg']; ?>;
}

.mnu_<?php echo $menu_name;?> li ul li {
    height:<?php echo $menu['drop_down_pane_height']; ?>px;
    border-bottom:<?php echo $menu['border_size_sub_lvl']; ?>px solid <?php echo $menu['border_color_sub_lvl']; ?>;
    padding:0 <?php echo $menu['drop_down_pane_horiz_padding']; ?>px;
    text-align:left;
}

.mnu_<?php echo $menu_name;?> li ul a, .mnu_<?php echo $menu_name;?> li ul span {
    line-height:<?php echo $menu['drop_down_pane_height']; ?>px;
    font-size:<?php echo $menu['font_size_sub']; ?>px;
    color:<?php echo $menu['text_color_sub']; ?>;
    font-weight:<?php echo $menu['font_weight_sub']; ?>;
    font-style:<?php echo $menu['font_style_sub']; ?>;
    padding-top:0;
    cursor:pointer;
}

.mnu_<?php echo $menu_name;?> li ul a:hover,
.mnu_<?php echo $menu_name;?> li ul span:hover {
    color:<?php echo $menu['links_hover_color_sub']; ?>;
}

.mnu_<?php echo $menu_name;?> li ul ul {
    left:<?php echo $menu['drop_down_pane_width']; ?>px;
    margin-top:-1px;
}

.mnu_<?php echo $menu_name;?> ul ul {
    top:0px;
}

<?php if($menu['arrows']) { ?>
.mnu_<?php echo $menu_name;?> > li.parent {
    background-image:url(<?php echo $template_path; ?>/images/arrow_down.png);
    background-repeat:no-repeat;
    background-position:right center;
    padding-right:15px;
}

.mnu_<?php echo $menu_name;?> li li.parent {
    background:url(<?php echo $template_path; ?>/images/arrow_right.png) no-repeat right center;
}
<?php } ?>

.mnu_<?php echo $menu_name;?> .sub {
    font-size:10px;
    line-height:normal;
    display:block;
}

<?php } elseif($menu['type'] == "mega") { ?>

/*--------------MEGA----------------*/

.mnu_<?php echo $menu_name;?> {
    color:<?php echo $menu['text_color']; ?>;  
    background:<?php echo $menu['bg_color']; ?>;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-menubar-item-normal a {
    color:<?php echo $menu['text_color']; ?>;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-menubar-item-hover {

}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-menubar-item-hover-current,
.mnu_<?php echo $menu_name;?>  > li#current, .mnu_<?php echo $menu_name;?>  > li.active {

}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-menubar-item-hover a,
.mnu_<?php echo $menu_name;?> .hjt-megamenu-menubar-item-hover-current a {
    color:<?php echo $menu['text_hover_color']; ?> !important;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-content a:link,
.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-content a:visited {
    color:<?php echo $menu['submenu_text_color']; ?> !important;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-content a:hover {
    color:<?php echo $menu['text_hover_color']; ?> !important;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-list {
    color:<?php echo $menu['submenu_text_color']; ?>;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-list-title {
    color:<?php echo $menu['submenu_text_color']; ?>;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-list-title span {
    color:<?php echo $menu['submenu_text_color']; ?>;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-list-title span:hover,
.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-list a span:hover {
    color:<?php echo $menu['submenu_text_hover_color']; ?> !important;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-content a:hover {
    color:<?php echo $menu['submenu_text_hover_color']; ?> !important;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-content {
    background:<?php echo $menu['submenu_bg_color']; ?> url(<?php echo $template_path ?>/images/hjt_megamenu-panel-separator.png) top right repeat-y;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-content:last {
    background:<?php echo $menu['submenu_bg_color']; ?>;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-bottom {
    background:<?php echo $menu['submenu_bg_color']; ?>;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-left {
    background:<?php echo $menu['submenu_bg_color']; ?>;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-right {
    background:<?php echo $menu['submenu_bg_color']; ?>;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-bottomleft {
    background:<?php echo $menu['submenu_bg_color']; ?>;
}

.mnu_<?php echo $menu_name;?> .hjt-megamenu-dropdown-panel-bottomright {
    background:<?php echo $menu['submenu_bg_color']; ?>;
}

<?php } elseif($menu['type'] == "navh") { ?>

/*--------------HORIZONTAL----------------*/

.mnu_<?php echo $menu_name;?> {
    background:<?php echo $menu['tab_color']; ?>;
    width:100%;
    height:<?php echo $menu['tab_height']; ?>px;
    font-family:<?php echo $menu['font_family']; ?>;
}

.mnu_<?php echo $menu_name;?> > li {
    background:<?php echo $menu['button_bg']; ?>;
    line-height:<?php echo $menu['tab_height']; ?>px;
    padding:0 <?php echo $menu['horiz_button_padding']; ?>px;
    margin:0;
    border:<?php echo $menu['border_size_first_lvl']; ?>px solid <?php echo $menu['border_color_first_lvl']; ?>;
<?php if (!$menu['margin_size']) { ?>border-left:none;<?php } ?>
    border-bottom:none;
    margin:0 <?php echo $menu['margin_size']; ?>px;
    -webkit-radius:<?php echo $menu['border_radius']; ?>px <?php echo $menu['border_radius']; ?>px 0 0;
    -moz-radius:<?php echo $menu['border_radius']; ?>px <?php echo $menu['border_radius']; ?>px 0 0;
    border-radius:<?php echo $menu['border_radius']; ?>px <?php echo $menu['border_radius']; ?>px 0 0;
}

.mnu_<?php echo $menu_name;?> > li:first-child {
    border-left:<?php echo $menu['border_size_first_lvl']; ?>px solid <?php echo $menu['border_color_first_lvl']; ?>;
}

.mnu_<?php echo $menu_name;?> > li:hover, .mnu_<?php echo $menu_name;?> > li.parent:hover  {
    background:<?php echo $menu['button_hover_bg']; ?>;
}

.mnu_<?php echo $menu_name;?> > li.active {
    background:<?php echo $menu['active_button_bg']; ?>;
    border-color:<?php echo $menu['border_color_active']; ?>;
    border-left:<?php echo $menu['border_size_first_lvl']; ?>px solid <?php echo $menu['border_color_active']; ?>;
}

.mnu_<?php echo $menu_name;?> > li.active a {
    color:<?php echo $menu['active_text_color']; ?>;
}

.mnu_<?php echo $menu_name;?> > li a:hover {
    color:#FFF;
}
 
.mnu_<?php echo $menu_name;?> > li > a {
    font-size:<?php echo $menu['font_size']; ?>px;
    color:<?php echo $menu['text_color']; ?>;
}

.mnu_<?php echo $menu_name;?> > li > a:hover {
    color:<?php echo $menu['links_hover_color']; ?>;
}

.mnu_<?php echo $menu_name;?>, .mnu_<?php echo $menu_name;?> ul {
    margin:0;
    padding:0;
    list-style-type:none;
    list-style-position:outside;
}

.mnu_<?php echo $menu_name;?> li a {
    display:block;
    text-decoration:none;
}

.mnu_<?php echo $menu_name;?> ul {
    position: absolute;
    z-index:200;
    float: left;
}

.mnu_<?php echo $menu_name;?> ul {
    display:none;
}

.mnu_<?php echo $menu_name;?> > li , .mnu_<?php echo $menu_name;?> > li  > ul > li {
    float:left;
}

.mnu_<?php echo $menu_name;?> > li:hover > ul {
    display:block;
}

.mnu_<?php echo $menu_name;?> > li.active > ul {
    display: block;
}

.navh_submenu {
    font-family:<?php echo $menu['font_family_sub']; ?>;
    float: left;
    clear: both;
}

.navh_submenu li {
    display: block;
}

div.navh_submenu {
    background:<?php echo $menu['tab_color_sub']; ?>;
    height:<?php echo $menu['tab_height_sub']; ?>px;
    line-height:<?php echo $menu['tab_height_sub']; ?>px;
    width:100%;
}

div.navh_submenu ul {
    margin: 0;
    padding: 0;
}

div.navh_submenu ul > li {
    padding:0 <?php echo $menu['horiz_button_padding_sub']; ?>px;
    margin:0;
    float:left;
}

div.navh_submenu ul > li > a {
    color:<?php echo $menu['text_color_sub']; ?> !important;
    font-size:<?php echo $menu['font_size_sub']; ?>px;
}

div.navh_submenu ul > li > a:hover {
    color:<?php echo $menu['links_hover_color_sub']; ?> !important;
}

div.navh_submenu ul > li > ul {
    padding:<?php echo $menu['horiz_pane_padding_sub_sub']; ?>px;
    background:<?php echo $menu['tab_color_sub_sub']; ?>;
    position: absolute;
    margin-left:-<?php echo $menu['horiz_button_padding_sub']; ?>px;
}

div.navh_submenu ul > li > ul > li {
    width:<?php echo $menu['tab_width_sub_sub']; ?>px;
    line-height:<?php echo $menu['horiz_pane_menu_item_height_sub_sub']; ?>px;
    padding:0;
    margin:0;
    float:none;
}

div.navh_submenu ul > li > ul > li > a {
    color:<?php echo $menu['text_color_sub_sub']; ?> !important;
    font-size:<?php echo $menu['font_size_sub_sub']; ?>px;
}

div.navh_submenu ul > li > ul > li > a:hover {
    color:<?php echo $menu['links_hover_color_sub_sub']; ?> !important;
}
  
<?php }
}
?>

<?php if ($topPanelSwitch) { ?>

/*--------------TOP PANEL ----------------*/

.sparky_top_panel_button {
	width:<?php echo $topPanelButtonWidth; ?>px;
	height:<?php echo $topPanelButtonHeight; ?>px;
	line-height:<?php echo $topPanelButtonHeight; ?>px;
	background:<?php echo $topPanelButtonBgColor; ?>;
	color:<?php echo $topPanelButtonTextColor; ?>;
	font-size:<?php echo $topPanelButtonTextSize; ?>px;
    border:1px solid <?php echo $topPanelButtonBorderColor; ?>;
    border-top:none;
    -webkit-border-radius:0 0 <?php echo $topPanelButtonBorderRadius; ?>px <?php echo $topPanelButtonBorderRadius; ?>px;
    -moz-border-radius:0 0 <?php echo $topPanelButtonBorderRadius; ?>px <?php echo $topPanelButtonBorderRadius; ?>px;
	border-radius:0 0 <?php echo $topPanelButtonBorderRadius; ?>px <?php echo $topPanelButtonBorderRadius; ?>px;
}

.sparky_top_panel_container h3 {
	color:<?php echo $topPanelH3Color; ?>;
}

.sparky_top_panel_container {
	color:<?php echo $topPanelTextColor; ?>;
    position:absolute;
    width:100%;
}

.sparky_top_panel_button {
    margin:0 auto;
    text-align:center;
    cursor:pointer;
}

.close_button {
    display:none;
}
<?php } ?>

<?php if ($scrollToTopSwitch) { ?>

/*--------------SCROLL TO TOP----------------*/

#scroll_to_top {
	<?php if($scrollToTopPosition=="bottom_right") { ?>
	bottom: 25px;
	right: 0;
    <?php }elseif($scrollToTopPosition=="bottom_left") { ?>
    bottom: 25px;
	left: 0;
    <?php }elseif($scrollToTopPosition=="top_right") { ?>
    top: 5px;
	right: 0;
    <?php }else{ ?>
    top: 5px;
	left: 0;
    <?php } ?>
}
<?php } ?>

/*--------------FONT RESIZE----------------*/

#font_resize {
    text-align:right;
}

#font_resize a {
    color:#fff;
    text-decoration:none;
    padding:0 2px;
}

.clr {
    clear:both;
}

/*--------------HOT CINEMA SPECIFIC PARAMETERS----------------*/

.shade_left {
    border-right:20px solid <?php echo $bodyBgColor; ?>;
}

.shade_right {
    border-left:20px solid <?php echo $bodyBgColor; ?>;
}

.shade_left,.shade_right {
    background:rgba(<?php echo $fullCarouselShade; ?>);
}

div.user_row div.moduletable {
    border:1px solid <?php echo $bordersColor; ?>;
}

div.header_menu, div.logo_area, div.catItemView, div.itemTagsBlock, dl.article-info {
    border-bottom:1px solid <?php echo $bordersColor; ?>;
}

div.footer_row, div.itemExtraFields {
    border-top:1px solid <?php echo $bordersColor; ?>;
}

div.catItemTagsBlock ul.catItemTags li {
    border-right:1px solid <?php echo $bordersColor; ?>;
}

.mnu_headermenu2 > li {
    border-left:1px solid <?php echo $bordersColor; ?>;
    border-right:none;
}

.mnu_headermenu2 > li:first-child {
    border-right:1px solid <?php echo $bordersColor; ?>;
}

.componentheading, .trailer_heading, .trailer_heading a {
    color:<?php echo $h2Color; ?>;
}

h2.catItemTitle, h2.catItemTitle a {
    color:<?php echo $k2Headings; ?>;
}

.mnu_topmenu > li > a, .mnu_topmenu > li > span {
    color:<?php echo $cinemaTopMenuTextColor; ?>;
}

.mnu_topmenu > li.active > a, .mnu_topmenu > li.active > span {
    color:<?php echo $cinemaTopMenuActiveColor; ?> !important;
}

.mnu_topmenu > li > a:hover, .mnu_topmenu > li:hover > a,
.mnu_topmenu > li > a:hover, .mnu_topmenu > li:hover > span {
    color:<?php echo $cinemaTopMenuHoverColor; ?>;
}