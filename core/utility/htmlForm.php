<?php
namespace utility;

class htmlForm {
	
	// ## form builder - table name, action, data
	public static function formBuild($table, $action, $data = NULL) {
		
		$id = $data->id ? $_REQUEST['id'] : NULL;
		
		// form title
		$form  = htmlTags::heading(ucwords($table));
		
		// form action
		$form .= htmlForm::formAction($table, $action, $id);
		
		// form inputs
		$form .= htmlForm::formInputs($data);

		// save button
		$form .= htmlForm::formButton('store', $table, $id);
		$form .= '&nbsp;&nbsp;&nbsp;';
		
		// delete link (not a button)
		$delete = 'index.php?page=' . $table . '&action=delete' . htmlForm::checkID($id);
		$form .= htmlTags::href($delete, 'Delete');
		//$form .= htmlForm::formButton('delete', $table, $id);
		
		$form .= '</form>';
		
		return $form;
	}
	
	// builds the action part of the form tag: page=XXX&action=XXX[&id=X]
	public static function formAction($table, $action, $id = NULL) {
		$form  = '<form action="index.php?';
		$form .= 'page=' . $table . '&action=' . $action;
		$form .= htmlForm::checkID($id);
		$form .= '" method="post" enctype="multipart/form-data">';
		
		return $form;
	}
	
	public static function formInput($name, $val = NULL, $type = 'text', $show = true) {
		
		// echo '--- ' . $val . ' ---' . htmlTags::lineBreak();
		$input = '<input type="' . $type . '" ' .
					 'name="' . $name . '" ' .
					 'id="'   . $name . '" ' . 
					 'value="'. $val  . '" ';
		if (!$show)
			$input .= 'readonly ';
			
		$input .= '>';
		
		return $input;
	}
	
	// button builder (store/delete)
	public static function formButton($name, $table, $id) {
		$button  = '<input type="submit" value="' . ucwords($name) . '"formaction="index.php?page=' . $table . '&action=' . $name;
		$button .= htmlForm::checkID($id);
		$button .= '" name="' . $name . '">';
		
		return $button;
	}
	
	// builds text inputs for forms
	public static function formInputs($data) {
		
		$datetime = date_create()->format('Y-m-d H:i:s'); // if we need the current time
		$inputs = '';	
		
		foreach ($data as $key=>$val) {
			// hide the id column
			if ($key == 'id') {
				continue;
			}
			
			$inputs .= strtoupper($key) . ': '; 
			// hides input for password field
			if ($key == 'password')
				$inputs .= htmlForm::formInput($key, $data->$key, 'password');
			// for new items, pull session info
			elseif (($_REQUEST['action'] == 'create') && ($key == 'owneremail'))
				$inputs .= htmlForm::formInput($key, $_SESSION['email'], 'text', false);
			elseif (($_REQUEST['action'] == 'create') && ($key == 'ownerid'))
				$inputs .= htmlForm::formInput($key, $_SESSION['userID'], 'text', false);
			elseif (($_REQUEST['action'] == 'create') && ($key == 'createddate'))
				$inputs .= htmlForm::formInput($key, $datetime, 'text', false);
			elseif (($_REQUEST['action'] != 'create') && ($key == 'owneremail' || $key == 'ownerid'))
				$inputs .= htmlForm::formInput($key, $data->$key, 'text', false);
			else
				$inputs .= htmlForm::formInput($key, $data->$key);
				
			$inputs .= htmlTags::lineBreak();
		}
	
		return $inputs;
	}
	
	// if an ID is passed, adds ID param to URL
	public static function checkID($id) {
		$form = '';
		if ($id != NULL)
			$form = '&id=' . $id;
		
		return $form;
	}
}
?>