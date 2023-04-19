<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This file is used to create bootstrap style form blocks
 *
 * @example $this->load->helper('bsform');
 *
 */
function bs_inputfield($display_name, $fieldname, $defaultvalue, $mandatory = false, $printlabel = true, $input_style = '')
{
    $error = form_error($fieldname, '<span class="help-inline">', '</span>');
    if ($error != '')
        echo "<div class=\"control-group error\">";
    else
        echo "<div class=\"control-group\">";
    
    if ($printlabel == true) {
	    echo "<label class=\"control-label\">";
	    echo $display_name;
	    if ($mandatory)
	        echo lang('txt_asterisk');
	    echo "</label>";
    }
    
    echo "<div class=\"controls\">";
    echo "<input type=\"text\" id=\"$fieldname\" name=\"$fieldname\" value=\"".set_value($fieldname, $defaultvalue)."\" $input_style />";
    echo $error;
    echo "</div></div>";
}

function bs_inputfield2($display_name, $fieldname, $defaultvalue, $mandatory = false, $printlabel = true, $input_style = '')
{

    $error = form_error($fieldname, '<span class="help-inline">', '</span>');
    if ($error != '')
        echo "<div class=\"control-group error\">";
    else
        echo "<div class=\"control-group\">";
    
    if ($printlabel == true) {
	    echo "<label class=\"control-label\">";
	    echo $display_name;
	    if ($mandatory)
	        echo lang('txt_asterisk');
	    echo "</label>";
    }
    
    echo "<div class=\"controls\">";
    echo "<input type=\"text\" id=\"$fieldname\" name=\"$fieldname\" value=\"".set_value($fieldname, $defaultvalue)."\" $input_style />";
//    echo "<br/><br/><label style='text-align: justify; margin-left: 50px'>".lang('present_address_details')."</label>";
    echo "<br/><br/><span class=\"help-block\" style='margin-left: 50px'>".lang('present_address_details')."</span>";
    echo $error;
    echo "</div>";
    
    echo "</div>";
}

function bs_inputfield_hidden($fieldname, $defaultvalue)
{
	echo "<input type=\"hidden\" id=\"$fieldname\" name=\"$fieldname\" value=\"$defaultvalue\" />";
}

function bs_inputfield_password($display_name, $fieldname, $defaultvalue, $mandatory = false, $printlabel = true, $input_style = '')
{

    $error = form_error($fieldname, '<span class="help-inline">', '</span>');
    if ($error != '')
        echo "<div class=\"control-group error\">";
    else
        echo "<div class=\"control-group\">";
    
    if ($printlabel == true) {
	    echo "<label class=\"control-label\">";
	    echo $display_name;
	    if ($mandatory)
	        echo lang('txt_asterisk');
	    echo "</label>";
    }
    
    echo "<div class=\"controls\">";
    echo "<input type=\"password\" id=\"$fieldname\" name=\"$fieldname\" value=\"".set_value($fieldname, $defaultvalue)."\" $input_style />";
    echo $error;
    echo "</div></div>";
}

function bs_inputfield_group($display_name, $items = array(), $mandatory = false, $printlabel = true)
{

    $error = form_error($fieldname, '<span class="help-inline">', '</span>');
    if ($error != '')
        echo "<div class=\"control-group error\">";
    else
        echo "<div class=\"control-group\">";
    
	if ($printlabel == true) {
	    echo "<label class=\"control-label\">";
	    echo $display_name;
	    if ($mandatory)
	        echo lang('txt_asterisk');
	    echo "</label>";
	}
	
    echo "<div class=\"controls\">";
    echo "<input type=\"text\" id=\"$fieldname\" name=\"$fieldname\" value=\"".set_value($fieldname, $defaultvalue)."\"/>";
    echo $error;
    echo "</div></div>";
}

function bs_inputfield_upload($display_name, $fieldname, $mandatory = false, $command_browse, $command_replace, $printlabel = true)
{
	echo "<div class=\"control-group\">";
    
		if ($printlabel == true) {
		    echo "<label class=\"control-label\">";
		    echo $display_name;
		    if ($mandatory)
		        echo lang('txt_asterisk');
		    echo "</label>";
		}
		
	    echo "<div class=\"controls\">";
			echo '<div class="fileinputs">';
			echo '<input id="'.$fieldname.'" name="'.$fieldname.'" type="file" class="file" />';
				echo '<div class="fakefile">';
					echo '<input id="faketext" name="faketext" value="" />';
					echo '<div style="top: -30px;">';
						echo '<a id="btnbrowse" class="btn btn-small btn-success" style="margin-left: 0px;">'.$command_browse.'</a>';
						echo '&nbsp';
						echo '<a id="btnUpload" class="btn btn-small btn-success">'.$command_replace.'</a>';
					echo '</div>';
				echo '</div>';
			echo '</div>';    		
	   echo "</div>";
   	echo "</div>";	
}

function bs_inputfield_color($display_name = '', $color_items = array(), $mandatory = false, $others = '', $printlabel = true)
{
	if (count($color_items) > 0) {
		$error = '';
		
		foreach ($color_items as $item)
		{
			$error = form_error($item[0], '<span class="help-inline">', '</span>');
			if ($error != '') break;
		}
	
		if ($error != '')
        	echo "<div class=\"control-group error\">";
    	else
        	echo "<div class=\"control-group\">";
	
        if ($printlabel == true) {
	        echo "<label class=\"control-label\">";	
	        echo $display_name;
	        if ($mandatory) {
	        	echo lang('txt_asterisk');
	        }
	        echo "</label>";
		}
        
        echo "<div class=\"controls\">";
		foreach ($color_items as $item)
		{
			echo "<input $others type=\"text\" id=\"$item[0]\" name=\"$item[0]\" value=\"".set_value($item[0], $item[1])."\"/>&nbsp;&nbsp;&nbsp;";
		}
		echo $error;
		echo "</div></div>";
	}
}

function bs_textarea($display_name, $fieldname, $defaultvalue, $rows, $mandatory = false, $printlabel = true)
{
    
    $error = form_error($fieldname, '<span class="help-inline">', '</span>');
    if ($error != '')
        echo "<div class=\"control-group error\">";
    else
        echo "<div class=\"control-group\">";
    
    if ($printlabel == true) {
	    echo "<label class=\"control-label\">";
	    echo $display_name;
	    if ($mandatory)
	        echo lang('txt_asterisk');
	    
	    echo "</label>";
    }
    
    echo "<div class=\"controls\">";
    echo "<textarea id=\"$fieldname\" name=\"$fieldname\" rows=\"$rows\">".html_entity_decode(set_value($fieldname, $defaultvalue))."</textarea>";
    echo $error;
    echo "</div></div>";
}



function bs_text_remarks ($label = '', $text = '', $printlabel = true)
{
	echo "<div class=\"control-group\">";
	
	if ($printlabel == true) {
    	echo "<label class=\"control-label\">";
    	echo $label;
    	echo "</label>";
	}
	
    echo "<div class=\"controls\">";
    echo "$text";
    echo "</div></div>";
}

function bs_checkbox_dropdown($label_name, $display_name, $checkbox_name, $checkbox_value, $dropdown_name, $dropdown_items = array(), $checkbox_selected = false, $mandatory_label = false, $printlabel = true)
{
	echo "<div class=\"control-group\">";
	
	if ($printlabel == true) {
		echo "<label class=\"control-label\">";
		echo $label_name;
		if ($mandatory_label)
			echo lang('txt_asterisk');
		echo "</label>";
	}
	
	echo "<div class=\"controls\">";
	$selected_str = "";
    if ($checkbox_selected == true) {
    	$selected_str = "checked='checked'";
    }
    
    echo "<input type='checkbox' id=\"$checkbox_name\" name=\"$checkbox_name\" value=\"$checkbox_value\" ".$selected_str." style='vertical-align: top;' /> ".$display_name;
    
    echo "<select name=\"$dropdown_name\" id=\"$dropdown_name\">";
	if (count($dropdown_items) > 0) {
		foreach ($dropdown_items as $item)
		{
			echo "<option value=\"$item[0]\" >".$item[1]."</option>";
		}
	}
    echo "</select>";
    
	echo "</div></div>";
}

function bs_checkbox_button($label_name, $display_name, $fieldname, $fieldid, $defaultvalue, $selected = false, $mandatory = false, $printlabel = true)
{
    $error = form_error($fieldname, '<span class="help-inline">', '</span>');
    if ($error != '')
        echo "<div class=\"control-group error\">";
    else
        echo "<div class=\"control-group\">";
    
	if ($printlabel == true) {
	    echo "<label class=\"control-label\">";
	    echo $label_name;
	    if ($mandatory)
	        echo lang('txt_asterisk');
	    echo "</label>";
    }
    
    echo "<div class=\"controls\">";
    $selected_str = "";
    if ($selected == true) {
    	$selected_str = "checked='checked'";
    }
    echo "<input type='checkbox' id=\"$fieldid\" name=\"$fieldname\" value=\"$defaultvalue\" ".$selected_str." style='vertical-align: top;' /> ".$display_name;
    echo $error;
    echo "</div></div>";
}

function bs_radio_button($label_name, $display_name, $fieldname, $defaultvalue, $selected = false, $mandatory = false, $printlabel = true)
{
    $error = form_error($fieldname, '<span class="help-inline">', '</span>');
    if ($error != '')
        echo "<div class=\"control-group error\">";
    else
        echo "<div class=\"control-group\">";
    
	if ($printlabel == true) {
	    echo "<label class=\"control-label\">";
	    echo $label_name;
	    if ($mandatory)
	        echo lang('txt_asterisk');	    
	    echo "</label>";
    }
    
    echo "<div class=\"controls\">";
    $selected_str = "";
    if ($selected == true) {
    	$selected_str = "checked='checked'";
    }
    echo "<input type='radio' id=\"$fieldname\" name=\"$fieldname\" value=\"$defaultvalue\" ".$selected_str." style='vertical-align: top;' /> ".$display_name;
    echo $error;
    echo "</div></div>";
}

function bs_radio_button_group($display_name, $fieldname, $items = array(), $mandatory = false, $printlabel = true)
{
	$error = form_error($fieldname, '<span class="help-inline">', '</span>');
    if ($error != '')
        echo "<div class=\"control-group error\">";
    else
        echo "<div class=\"control-group\">";
	
    if ($printlabel == true) {
	    echo "<label class=\"control-label\">";
	    echo $display_name;
	    if ($mandatory)
	        echo lang('txt_asterisk');
	    echo "</label>";
    }
    
	echo "<div class=\"controls\" style='vertical-align: bottom; padding-top: 5px;'>";
	
		if (count($items) > 0) {
			foreach ($items as $item)
			{
			$selected_str = "";
			    if ($item[2] == true) {
			    	$selected_str = "checked='checked'";
			    }
				echo "<input type='radio' id=\"$fieldname\" name=\"$fieldname\" value=\"$item[1]\" ".$selected_str." style='vertical-align: top;' /> ".$item[0]."&nbsp;";
			}
		}
	echo $error;
	echo "</div></div>";
}


function bs_inputfield_3($display_name, $fieldname1, $fieldname2, $fieldname3, $defaultvalue1, $defaultvalue2, $defaultvalue3, $mandatory = false, $printlabel = true, $input_style = '')
{
	$error = '';
    $error .= form_error($fieldname1, '<span class="help-inline">', '</span>');
    $error .= form_error($fieldname2, '<span class="help-inline">', '</span>');
    $error .= form_error($fieldname3, '<span class="help-inline">', '</span>');
    
    if ($error != '')
        echo "<div class=\"control-group error\">";
    else
        echo "<div class=\"control-group\">";
    
    if ($printlabel == true) {
	    echo "<label class=\"control-label\">";
	    echo $display_name;
	    if ($mandatory)
	        echo lang('txt_asterisk');
	    echo "</label>";
    }
    
    echo "<div class=\"controls\">";
    echo '<input type="text" id="'.$fieldname1.'" name="'.$fieldname1.'" value="'.set_value($fieldname1, $defaultvalue1).'" class="input-small" style="margin-right:4px;" />';
	echo '<input type="text" id="'.$fieldname2.'" name="'.$fieldname2.'" value="'.set_value($fieldname2, $defaultvalue2).'" class="input-small" style="margin-right:4px;" />';
	echo '<input type="text" id="'.$fieldname3.'" name="'.$fieldname3.'" value="'.set_value($fieldname3, $defaultvalue3).'" class="input-medium" />';
	if($error != '')
    	
    	echo '<span class="help-inline" style="padding-left: 8px;">The '.$display_name.' field is required.</span>';
    else
   		echo '';
    echo "</div></div>";
}


function bs_inputfield_4($display_name, $fieldname1, $fieldname2, $fieldname3,$fieldname4, $defaultvalue1, $defaultvalue2, $defaultvalue3,$defaultvalue4, $mandatory = false, $printlabel = true, $input_style = '')
{
	$error = '';
    $error .= form_error($fieldname1, '<span class="help-inline">', '</span>');
    $error .= form_error($fieldname2, '<span class="help-inline">', '</span>');
    $error .= form_error($fieldname3, '<span class="help-inline">', '</span>');
    $error .= form_error($fieldname4, '<span class="help-inline">', '</span>');
    
    if ($error != '')
        echo "<div class=\"control-group error\">";
    else
        echo "<div class=\"control-group\">";
    
    if ($printlabel == true) {
	    echo "<label class=\"control-label\">";
	    echo $display_name;
	    if ($mandatory)
	        echo lang('txt_asterisk');
	    echo "</label>";
    }
    
    echo "<div class=\"controls\">";
    echo '<input type="text" id="'.$fieldname1.'" name="'.$fieldname1.'" value="'.set_value($fieldname1, $defaultvalue1).'" class="input-small" style="margin-right:4px;" />';
	echo '<input type="text" id="'.$fieldname2.'" name="'.$fieldname2.'" value="'.set_value($fieldname2, $defaultvalue2).'" class="input-small" style="margin-right:4px;" />';
	echo '<input type="text" id="'.$fieldname3.'" name="'.$fieldname3.'" value="'.set_value($fieldname3, $defaultvalue3).'" class="input-medium" style="margin-right:4px;" />';
	echo '<input type="text" id="'.$fieldname4.'" name="'.$fieldname4.'" value="'.set_value($fieldname4, $defaultvalue4).'" class="input-mini"/>';
	if($error != '')
    	
    	echo '<span class="help-inline" style="padding-left: 8px;">The '.$display_name.' field is required.</span>';
    else
   		echo '';
    echo "</div></div>";
}
function bs_dropdown( $label_name,$dropdown_name, $dropdown_items = array(), $mandatory_label = false, $printlabel = true)
{
	echo "<div class=\"control-group\">";
		echo $label_name;
    echo "<select name=\"$dropdown_name\" id=\"$dropdown_name\">";
	if (count($dropdown_items) > 0) {
		foreach ($dropdown_items as $item)
		{
			echo "<option value=\"$item[0]\" >".$item[1]."</option>";
		}
	}
    echo "</select>";
    
	echo "</div>";
}