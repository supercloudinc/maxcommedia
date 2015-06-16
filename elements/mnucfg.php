<?php
/**
 * @version		$Id: text.php 15576 2010-03-25 12:43:26Z louis $
 * @package		Joomla.Framework
 * @subpackage	Form
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Form Field class for the Joomla Framework.
 *
 * @package		Joomla.Framework
 * @subpackage	Form
 * @since		1.6
 */
class JFormFieldMnucfg extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'mnucfg';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
	    require_once JPATH_ADMINISTRATOR . '/components/com_menus/helpers/menus.php';
		$menuTypes	= MenusHelper::getMenuTypes();
		
	    $OUT= '';
	    ob_start();
		?>
		
		<!-- THESE ARE MODELS FOR PARAMETER PANELS OF MENU TYPES -->
		
		<!-- DROP-DOWN MENU -->
		<div formenu="nav" class="menu_parms_panel" style="display:none">
		    <table>
		    	<tr>
		   			<td colspan="2" width="400px" class="hotspacer">Menu Script Settings</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ANIM_EFFECT'); ?></td>
					<td>
						<select parameter="animation_effect">
							<option value="fadeToggle" selected="selected">Fade</option>
							<option value="slideToggle">Slide</option>
							<option value="toggle">Show</option>
							<option value="show(0)">None</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ANIM_SPEED'); ?></td>
					<td><input parameter="animation_speed" type="text" value="300" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ARROWS'); ?></td>
					<td><input parameter="arrows" type="hidden" class="flipyesno" value="0" autocomplete="off" /></td>
				</tr>
				<tr>
					<td colspan="2" width="400px" class="hotspacer">Dimensions and Padding</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_DROP_DOWN_BUTTON_HEIGHT'); ?></td>
					<td><input parameter="drop_down_button_height" type="text" value="30" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_DROP_DOWN_BUTTON_WIDTH'); ?></td>
					<td><input parameter="drop_down_button_width" type="text" value="0" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_DROP_DOWN_BUTTON_TOP_PADDING'); ?></td>
					<td><input parameter="drop_down_button_top_padding" type="text" value="10" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_DROP_DOWN_BUTTON_HORIZ_PADDING'); ?></td>
					<td><input parameter="drop_down_button_horiz_padding" type="text" value="15" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_DROP_DOWN_PANE_WIDTH'); ?></td>
					<td><input parameter="drop_down_pane_width" type="text" value="160" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_DROP_DOWN_PANE_PADDING'); ?></td>
					<td><input parameter="drop_down_pane_padding" type="text" value="12" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_DROP_DOWN_PANE_HEIGHT'); ?></td>
					<td><input parameter="drop_down_pane_height" type="text" value="25" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_DROP_DOWN_PANE_HORIZ_PADDING'); ?></td>
					<td><input parameter="drop_down_pane_horiz_padding" type="text" value="10" autocomplete="off" /> </td>
				</tr>
				<tr>
		   			<td colspan="2" width="400px" class="hotspacer">Font Settings</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_FAMILY_LBL'); ?></td>
					<td>
						<input parameter="font_family" type="text" filter="raw" value="Arial, Helvetica, sans-serif" autocomplete="off" /> 
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_SIZE_LBL'); ?></td>
					<td><input parameter="font_size" type="text" value="14" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_TEXT_ALIGN_LBL'); ?></td>
					<td>
						<select parameter="text_align">
							<option value="left" selected="selected">Left</option>
							<option value="center">Center</option>
							<option value="right">Right</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_WEIGHT_LBL'); ?></td>
					<td>
						<select parameter="font_weight">
							<option value="normal" selected="selected">Normal</option>
							<option value="bold">Bold</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_STYLE_LBL'); ?></td>
					<td>
						<select parameter="font_style">
							<option value="normal" selected="selected">Normal</option>
							<option value="italic">Italic</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_TEXT_COLOR'); ?></td>
					<td><input parameter="text_color" type="text" class="pckcolor" value="#666666" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ACTIVE_TEXT_COLOR'); ?></td>
					<td><input parameter="active_text_color" type="text" class="pckcolor" value="#ffffff" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_LINKS_HOVER_COLOR'); ?></td>
					<td><input parameter="links_hover_color" type="text" class="pckcolor" value="#dddddd" autocomplete="off" /> </td>
				</tr>
				<tr>
		   			<td colspan="2" width="400px" class="hotspacer">Font Settings (Sublevels)</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_SIZE_LBL'); ?></td>
					<td><input parameter="font_size_sub" type="text" value="12" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_WEIGHT_LBL'); ?></td>
					<td>
						<select parameter="font_weight_sub">
							<option value="normal" selected="selected">Normal</option>
							<option value="bold">Bold</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_STYLE_LBL'); ?></td>
					<td>
						<select parameter="font_style_sub">
							<option value="normal" selected="selected">Normal</option>
							<option value="italic">Italic</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_TEXT_COLOR'); ?></td>
					<td><input parameter="text_color_sub" type="text" class="pckcolor" value="#666666" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_LINKS_HOVER_COLOR'); ?></td>
					<td><input parameter="links_hover_color_sub" type="text" class="pckcolor" value="#333333" autocomplete="off" /> </td>
				</tr>
				<tr>
		   			<td colspan="2" width="400px" class="hotspacer">Buttons and Panes Color</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BUTTON_BG'); ?></td>
					<td><input parameter="button_bg" type="text" class="pckcolor" value="#dddddd" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ACTIVE_BUTTON_BG'); ?></td>
					<td><input parameter="active_button_bg" type="text" class="pckcolor" value="#333333" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BUTTON_HOVER_BG'); ?></td>
					<td><input parameter="button_hover_bg" type="text" class="pckcolor" value="#666666" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_DROP_DOWN_PANE_BG'); ?></td>
					<td><input parameter="drop_down_pane_bg" type="text" class="pckcolor" value="#eeeeee" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_DROP_DOWN_PANE_HOVER_BG'); ?></td>
					<td><input parameter="drop_down_hover_bg" type="text" class="pckcolor" value="#e6e6e6" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td colspan="2" width="400px" class="hotspacer">Borders</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BORDER_SIZE_FIRST_LVL'); ?></td>
					<td><input parameter="border_size_first_lvl" type="text" value="1" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BORDER_COLOR_FIRST_LVL'); ?></td>
					<td><input parameter="border_color_first_lvl" type="text" class="pckcolor" value="#cccccc" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BORDER_SIZE_SUB_LVL'); ?></td>
					<td><input parameter="border_size_sub_lvl" type="text" value="1" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BORDER_COLOR_SUB_LVL'); ?></td>
					<td><input parameter="border_color_sub_lvl" type="text" class="pckcolor" value="#dddddd" autocomplete="off" /> </td>
				</tr>
			</table>
		</div>
		<!-- END DROP-DOWN -->
		 
		<!-- HORIZONTAL -->
		<div formenu="navh" class="menu_parms_panel" style="display:none">
			<table>
				<tr>
					<td><?php echo jText::sprintf('MNU_ANIM_SPEED'); ?></td>
					<td><input parameter="animation_speed" type="text"  value="450" autocomplete="off" /></td>
				</tr>
				<tr>
					<td colspan="2" width="400px" class="hotspacer">First Level</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_HORIZONTAL_PANE_COLOR_LBL'); ?></td>
					<td><input parameter="tab_color" type="text" class="pckcolor" value="#DDDDDD" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_HORIZONTAL_PANE_HEIGHT_LBL'); ?></td>
					<td><input parameter="tab_height" type="text" value="40" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_HORIZONTAL_PADDING_LBL'); ?></td>
					<td><input parameter="horiz_button_padding" type="text" value="20" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_FAMILY_LBL'); ?></td>
					<td>
						<input parameter="font_family" type="text" value="Arial, Helvetica, sans-serif" autocomplete="off" /> 
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_SIZE_LBL'); ?></td>
					<td><input parameter="font_size" type="text"  value="14" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_TEXT_COLOR'); ?></td>
					<td><input parameter="text_color" type="text" class="pckcolor" value="#333333" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BUTTON_BG'); ?></td>
					<td><input parameter="button_bg" type="text" class="pckcolor" value="#cccccc" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_LINKS_HOVER_COLOR'); ?></td>
					<td><input parameter="links_hover_color" type="text" class="pckcolor" value="#000000" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BUTTON_HOVER_BG'); ?></td>
					<td><input parameter="button_hover_bg" type="text" class="pckcolor" value="#aaaaaa" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ACTIVE_TEXT_COLOR'); ?></td>
					<td><input parameter="active_text_color" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ACTIVE_BUTTON_BG'); ?></td>
					<td><input parameter="active_button_bg" type="text" class="pckcolor" value="#333333" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BORDER_SIZE_FIRST_LVL'); ?></td>
					<td><input parameter="border_size_first_lvl" type="text" value="1" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BORDER_COLOR_FIRST_LVL'); ?></td>
					<td><input parameter="border_color_first_lvl" type="text" class="pckcolor" value="#666666" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BORDER_COLOR_ACTIVE'); ?></td>
					<td><input parameter="border_color_active" type="text" class="pckcolor" value="#333333" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_MARGIN_SIZE'); ?></td>
					<td><input parameter="margin_size" type="text" value="0" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_HORIZONTAL_BORDER_RADIUS'); ?></td>
					<td><input parameter="border_radius" type="text" value="0" autocomplete="off" /></td>
				</tr>
				<tr>
					<td colspan="2" width="400px" class="hotspacer">Second Level</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_HORIZONTAL_PANE_COLOR_LBL'); ?></td>
					<td><input parameter="tab_color_sub" type="text" class="pckcolor" value="#333333" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_HORIZONTAL_PANE_HEIGHT_LBL'); ?></td>
					<td><input parameter="tab_height_sub" type="text" value="25" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_HORIZONTAL_PADDING_LBL'); ?></td>
					<td><input parameter="horiz_button_padding_sub" type="text" value="15" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_FAMILY_LBL'); ?></td>
					<td>
						<input parameter="font_family_sub" type="text" value="Arial, Helvetica, sans-serif" autocomplete="off" /> 
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_SIZE_LBL'); ?></td>
					<td><input parameter="font_size_sub" type="text"  value="12" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_SUBMENU_TEXT_COLOR'); ?></td>
					<td><input parameter="text_color_sub" type="text" class="pckcolor" value="#dddddd" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_SUBMENU_TEXT_HOVER_COLOR'); ?></td>
					<td><input parameter="links_hover_color_sub" type="text" class="pckcolor" value="#ffffff" autocomplete="off" /></td>
				</tr>
				<tr>
					<td colspan="2" width="400px" class="hotspacer">Third Level and Deeper</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_PANE_COLOR_LBL'); ?></td>
					<td><input parameter="tab_color_sub_sub" type="text" class="pckcolor" value="#782320" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_HORIZONTAL_PANE_WIDTH_LBL'); ?></td>
					<td><input parameter="tab_width_sub_sub" type="text" value="150" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_HORIZONTAL_PANE_PADDING_LBL'); ?></td>
					<td><input parameter="horiz_pane_padding_sub_sub" type="text" value="15" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_HORIZONTAL_MENU_ITEM_HEIGHT'); ?></td>
					<td><input parameter="horiz_pane_menu_item_height_sub_sub" type="text" value="20" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_SIZE_LBL'); ?></td>
					<td><input parameter="font_size_sub_sub" type="text"  value="11" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_SUBMENU_TEXT_COLOR'); ?></td>
					<td><input parameter="text_color_sub_sub" type="text" class="pckcolor" value="#ffffff" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_SUBMENU_TEXT_HOVER_COLOR'); ?></td>
					<td><input parameter="links_hover_color_sub_sub" type="text" class="pckcolor" value="#cccccc" autocomplete="off" /></td>
				</tr>
			</table>
		</div>
		<!-- END HORIZONTAL -->
		
		<!-- MEGA -->
		  <div formenu="mega" class="menu_parms_panel" style="display:none">
		     <table>
			   <tr>
			   <td><?php echo jText::sprintf('MNU_FADE'); ?></td><td><input parameter="fade" type="hidden" class="flipyesno" value="1" autocomplete="off" /> </td>
			  </tr>
               <tr>
			   <td><?php echo jText::sprintf('MNU_SLIDE'); ?></td><td><input parameter="slide" type="hidden" class="flipyesno" value="1" autocomplete="off" /> </td>
			  </tr>			  
			  <tr>
			   <td><?php echo jText::sprintf('MNU_ANIM_SPEED'); ?></td><td><input parameter="animation_speed" type="text"  value="450" autocomplete="off" /> </td>
			  </tr>
			  <tr>
			   <td><?php echo jText::sprintf('MNU_DOWN_ARROWS'); ?></td><td><input parameter="downarrows" type="hidden" class="flipyesno" value="0" autocomplete="off" /> </td>
			  </tr>
			  <tr>
			   <td><?php echo jText::sprintf('MNU_MAX_COLUMNS'); ?></td><td><input parameter="max_columns" type="text"  value="4" autocomplete="off" /> </td>
			  </tr>
			  <tr>
			   <td><?php echo jText::sprintf('MNU_TEXT_COLOR'); ?></td><td><input parameter="text_color" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /> </td>
			  </tr>
			  <tr>
			   <td><?php echo jText::sprintf('MNU_LINKS_HOVER_COLOR'); ?></td><td><input parameter="text_hover_color" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /> </td>
			  </tr>
			  <tr>
			   <td><?php echo jText::sprintf('MNU_SUBMENU_TEXT_COLOR'); ?></td><td><input parameter="submenu_text_color" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /> </td>
			  </tr>
			  <tr>
			   <td><?php echo jText::sprintf('MNU_SUBMENU_TEXT_HOVER_COLOR'); ?></td><td><input parameter="submenu_text_hover_color" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /> </td>
			  </tr>
			  <tr>
			   <td><?php echo jText::sprintf('MNU_SUBMENU_BG_COLOR'); ?></td><td><input parameter="submenu_bg_color" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /> </td>
			  </tr>
			   <tr>
			   <td><?php echo jText::sprintf('MNU_BG_COLOR'); ?></td><td><input parameter="bg_color" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /> </td>
			  </tr>
			  
		   </table>
		  </div>
		<!-- END MEGA -->
		
		<!-- ACCORDION -->
		<div formenu="acc" class="menu_parms_panel" style="display:none">
			<table>
				<tr>
					<td colspan="2" width="400px" class="hotspacer">Menu Script Settings</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ACCORDION_COLAPSIBLE'); ?></td>
					<td><input parameter="collapsible" type="hidden" class="flipyesno" value="1" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ACCORDION_EQUAL_HEIGHT'); ?></td>
					<td><input parameter="equalheight" type="hidden" class="flipyesno" value="0" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_TRIGGER'); ?></td>
					<td>
						<select parameter="trigger" >
							<option value="click" selected="selected">Click</option>
							<option value="mouseover">Mouse over</option>
						</select> 
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ANIM_EFFECT'); ?></td>
					<td>
						<select parameter="animation" >
							<option value="slide" selected="selected">Slide</option>
							<option value="bounceslide">Bounceslide</option>
						</select> 
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ACCORDION_SUBPANEL_SLIDETO'); ?></td>
					<td>
						<select parameter="subpanelslide">
							<option value="right" selected="selected">To Right</option>
							<option value="down">Drop</option>
						</select> 
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_ANIM_SPEED'); ?></td>
					<td><input parameter="animation_speed" type="text"  value="450" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td colspan="2" class="hotspacer">Font Settings</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_FAMILY_LBL'); ?></td>
					<td>
						<input parameter="font_family" type="text" value="Arial, Helvetica, sans-serif" autocomplete="off" /> 
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_SIZE_LBL'); ?></td>
					<td><input parameter="font_size" type="text" value="12" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_TEXT_COLOR'); ?></td>
					<td><input parameter="text_color" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_LINKS_HOVER_COLOR'); ?></td>
					<td><input parameter="links_hover_color" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /> </td>
				</tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_SIZE_SUB_LBL'); ?></td>
					<td><input parameter="font_size_sub" type="text" value="12" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_TEXT_COLOR_SUB'); ?></td>
					<td><input parameter="text_color_sub" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_LINKS_HOVER_COLOR_SUB'); ?></td>
					<td><input parameter="links_hover_color_sub" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td colspan="2" class="hotspacer">Accordion Layout and Style</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_ACCORDION_PANE_BG'); ?></td>
					<td><input parameter="accordion_pane_bg" type="text" class="pckcolor" value="#CCCCCC" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_ACCORDION_PANE_BORDER_COLOR'); ?></td>
					<td><input parameter="accordion_pane_border_color" type="text" class="pckcolor" value="#000000" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_ACCORDION_PANE_BORDER_SIZE'); ?></td>
					<td><input parameter="accordion_pane_border_size" type="text" value="1" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_ACCORDION_PANE_BORDER_RADIUS'); ?></td>
					<td><input parameter="accordion_pane_border_radius" type="text" value="5" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_SUBMENU_TEXT_HOVER_COLOR'); ?></td>
					<td><input parameter="submenu_text_hover_color" type="text" class="pckcolor" value="#FFFFFF" autocomplete="off" /> </td>
				</tr>
			</table>
		</div>
		<!-- END ACCORDION -->
		
		<!-- JOOMLA STANDARD -->
		<div formenu="standard" class="menu_parms_panel" style="display:none">
		    <table>
		    	<tr>
					<td><?php echo jText::sprintf('MNU_DIRECTION'); ?></td>
					<td>
						<select parameter="direction">
							<option value="vertical" selected="selected">Vertical</option>
							<option value="horizontal">Horizontal</option>
						</select> 
					</td>
				</tr>
				<tr>
					<td width="400px" colspan="2" class="hotspacer">Main Level</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_FAMILY_LBL'); ?></td>
					<td>
						<input parameter="font_family" type="text" value="Arial, Helvetica, sans-serif" autocomplete="off" /> 
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_SIZE_LBL'); ?></td>
					<td><input parameter="font_size" type="text" value="14" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_TEXT_ALIGN_LBL'); ?></td>
					<td>
						<select parameter="text_align">
							<option value="left" selected="selected">Left</option>
							<option value="center">Center</option>
							<option value="right">Right</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_WEIGHT_LBL'); ?></td>
					<td>
						<select parameter="font_weight">
							<option value="normal" selected="selected">Normal</option>
							<option value="bold">Bold</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_STYLE_LBL'); ?></td>
					<td>
						<select parameter="font_style">
							<option value="normal" selected="selected">Normal</option>
							<option value="italic">Italic</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_TEXT_COLOR'); ?></td>
					<td><input parameter="text_color" type="text" class="pckcolor" value="#666666" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_LINKS_HOVER_COLOR'); ?></td>
					<td><input parameter="links_hover_color" type="text" class="pckcolor" value="#333333" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_VERTICAL_PADDING'); ?></td>
					<td><input parameter="vertical_padding" type="text" value="5" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_HORIZONTAL_PADDING'); ?></td>
					<td><input parameter="horizontal_padding" type="text" value="0" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_BOTTOM_MARGIN'); ?></td>
					<td><input parameter="bottom_margin" type="text" value="5" autocomplete="off" /></td>
				</tr>
				<tr>
					<td width="400px" colspan="2" class="hotspacer">Sub-Levels</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_FAMILY_LBL'); ?></td>
					<td>
						<input parameter="font_family_sub" type="text" value="Arial, Helvetica, sans-serif" autocomplete="off" /> 
					</td>
				</tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_SIZE_LBL'); ?></td>
					<td><input parameter="font_size_sub" type="text" value="11" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_TEXT_ALIGN_LBL'); ?></td>
					<td>
						<select parameter="text_align_sub">
							<option value="left" selected="selected">Left</option>
							<option value="center">Center</option>
							<option value="right">Right</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_WEIGHT_LBL'); ?></td>
					<td>
						<select parameter="font_weight_sub">
							<option value="normal" selected="selected">Normal</option>
							<option value="bold">Bold</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_FONT_STYLE_LBL'); ?></td>
					<td>
						<select parameter="font_style_sub">
							<option value="normal" selected="selected">Normal</option>
							<option value="italic">Italic</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_TEXT_COLOR'); ?></td>
					<td><input parameter="text_color_sub" type="text" class="pckcolor" value="#782320" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_LINKS_HOVER_COLOR'); ?></td>
					<td><input parameter="links_hover_color_sub" type="text" class="pckcolor" value="#333333" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('MNU_MARGIN_SIZE'); ?></td>
					<td><input parameter="margin_sub" type="text" value="10" autocomplete="off" /></td>
				</tr>
				<tr>
					<td><?php echo jText::sprintf('TPL_SPARKY_MNU_HORIZONTAL_MENU_ITEM_HEIGHT'); ?></td>
					<td><input parameter="subitem_height" type="text" value="15" autocomplete="off" /></td>
				</tr>
			</table>
		</div>
		<!-- END JOOMLA STANDARD -->
		
		<!-- PARAMETER PANELS ENDS -->
		
	    <input type="hidden" name="<?php echo $this->name; ?>" id="<?php echo $this->id; ?>" value="<?php echo $this->value; ?>" />
		<table id="mnupanel<?php echo $this->id; ?>" style="float:left;" >
		<?php
		
		foreach ($menuTypes as $menutype) {
		?>
		
		<tr>
		 <td style="border-bottom:2px solid #901F1E;" >
		   <h4 style="background:#ccc; padding:5px;"><?php echo $menutype;?> Settings</h4>
		   <select menu="<?php echo $menutype;?>" style="float:left;" class="MenuTypeSelect">
             <option value="nav" ><?php echo jText::sprintf('TPL_SPARKY_MNU_DROPDOWN');?></option>
			 <option value="navh" ><?php echo jText::sprintf('TPL_SPARKY_MNU_HOR');?></option>
             <option value="mega" ><?php echo jText::sprintf('TPL_SPARKY_MNU_MEGA');?></option>
             <option value="acc" ><?php echo jText::sprintf('TPL_SPARKY_MNU_ACC');?></option>
             <option value="standard" ><?php echo jText::sprintf('TPL_SPARKY_MNU_CLASSIC');?></option>
             <option value="none" ><?php echo jText::sprintf('TPL_SPARKY_MNU_NONE');?></option>
		   </select>
		   <div style="float:left;">
		   
		   </div>
		 </td>
		</tr>
		<?php
		}
		?>
		</table>
	     <script type="text/javascript">
		
		  window.setTimeout(function(){ 
		
		  window.loadMenuPanel<?php echo $this->id; ?> = function(fobject,menu_type,sparms){
		    if(!menu_type){
				menu_type = fobject.val();  
			}
			 
			var panel = fobject.parent().find('DIV').first();
			 
			if(!jQuery('.menu_parms_panel[formenu="' + menu_type + '"]')[0]) {
			   panel.html("");
			   fobject.val("none");
			   return;	
			}
			
			panel.html(jQuery('.menu_parms_panel[formenu="' + menu_type + '"]').html());
				 
			try{
			    
			     if(!sparms){
				   sparms = window.getMenuParms<?php echo $this->id; ?>(fobject);
				 }
		         var mnu_parms = sparms.split(',');
				 for(var j = 0; j < mnu_parms.length ; j++){
				   var parm =  mnu_parms[j].split(':')[0];
				   var pval =  mnu_parms[j].split(':')[1];
				   panel.find('*[parameter="'+ parm +'"]').val(pval);
				 }
 			}catch(e){}
			
			panel.find('.pckcolor').each(function(n){
				window.createpckcolor(jQuery(this));
			});		
            
			panel.find('.flipyesno').each(function(ind){
			    window.createFlipYesNo(jQuery(this));
		    });
			
		  };

          window.getMenuParms<?php echo $this->id; ?> = function(fobject){
		    var panel = fobject.parent().find('DIV').first();
			var sparms = "";
            panel.find('select, input, textarea').each(function(IndP){
			   if(sparms != "") sparms += ',';
			   sparms += (jQuery(this).attr('parameter') + ":" + jQuery(this).val());
			});            
  			return sparms;
		  };  

          window.saveMenuParms<?php echo $this->id; ?> = function(){
		        var newVal = "";
		        jQuery("#mnupanel<?php echo $this->id; ?> .MenuTypeSelect").each(function(ind){
				   if(newVal != "")newVal += "&";
				   newVal += (jQuery(this).attr("menu") + "=" + jQuery(this).val() + "=" + window.getMenuParms<?php echo $this->id; ?>(jQuery(this))); 
				});
		        jQuery("#<?php echo $this->id; ?>").val(newVal);
		  };		  
		  
		  jQuery("#mnupanel<?php echo $this->id; ?> .MenuTypeSelect").each(function(indx){
		     window.loadMenuPanel<?php echo $this->id; ?>(jQuery(this),'none',null);
		  });
		  
          var vals = '<?php echo $this->value; ?>'.split('&');		  
		  for(var i = 0; i < vals.length ; i++){
		     var mnu       = vals[i].split('=')[0];
			 var mnu_val   = vals[i].split('=')[1];
			 if(mnu_val == "") mnu_val = "standard";
			 
			 var fobject = jQuery('#mnupanel<?php echo $this->id; ?> select[menu="' + mnu + '"]');
			 fobject.val(mnu_val);
			 window.loadMenuPanel<?php echo $this->id; ?>(fobject,mnu_val,vals[i].split('=')[2]);
		  }

          jQuery("#mnupanel<?php echo $this->id; ?> .MenuTypeSelect").change(function(){
		     window.loadMenuPanel<?php echo $this->id; ?>(jQuery(this),null,null);   				
		  });
		  
		  window.setInterval(function(){
		    window.saveMenuParms<?php echo $this->id; ?>();
		  },350);
		  
		  
		  
		},700);
	  	</script>
		<?php
		$OUT = ob_get_contents();
        ob_end_clean();		
        
		return $OUT;
	}
}

?>