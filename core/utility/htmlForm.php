<?php
namespace utility;

class htmlForm {
	// ## form builder - table name, action, data
	public static function formBuild($table, $action, $data = NULL) {
		
		// 
		$id = $_REQUEST['id'];
		$form  = htmlTags::heading(ucwords($table));
		
		$form .= htmlForm::formAction($table, $action, $id);
		echo $form;
		
		// for deletes, don't show the form inputs
		if ($action != 'remove') {
			$form .= ($table == 'accounts') ?
				htmlForm::accountFormInputs($data) :
				htmlForm::todoFormInputs($data);
		} 
		
		if ($action == 'update') {
			$form .= '<input type="submit" value="remove" 
				formaction="/index.php?page=remove&table=' . $table .
				'&id=' . $id . '.php" name="remove">';
		}			
		
		$form .= '<input type="submit" value="'. $action .
				'" name="submit">';
		$form .= '</form> ';
		
		return $form;
	}
	
	// builds the action part of the form tag: page=XXX&action=XXX[&id=X]
	public static function formAction($table, $action, $id) {
		$form = '<form action="index.php?';
		$form .= 'page=' . $table . '&action=' . $action;
		if ($id != NULL)
			$form .= '&id=' . $id;
		$form .= '" method="post" enctype="multipart/form-data">';
		
		return $form;
	}
	
	public static function formInput($name, $val = NULL, $type = 'text') {
		// echo '--- ' . $val . ' ---' . htmlTags::lineBreak();
		$input = '<input type="' . $type . '" ' .
					 'name="' . $name . '" ' .
					 'id="'   . $name . '" ' . 
					 'value="'. $val  . '">';
		
		return $input;
	}
	
	public static function accountFormInputs($data) {
		// all 'account' form inputs
		$inputs  = 'EMAIL: ' . 
			htmlForm::formInput('email', $data->email) . 
			htmlTags::lineBreak();
		$inputs .= 'FIRST NAME: ' . 
			htmlForm::formInput('fname', $data->fname) . 
			htmlTags::lineBreak();
		$inputs .= 'LAST NAME: ' . 
			htmlForm::formInput('lname', $data->lname) .
			htmlTags::lineBreak();
		$inputs .= 'PHONE: ' . 
			htmlForm::formInput('phone', $data->phone) . 
			htmlTags::lineBreak();
		$inputs .= 'BIRTHDAY: ' . 
			htmlForm::formInput('birthday', $data->birthday, 'datetime') . 
			htmlTags::lineBreak();
		$inputs .= 'GENDER: ' . 
			htmlForm::formInput('gender', $data->gender) .
			htmlTags::lineBreak();
		$inputs .= 'PASSWORD: ' . 
			htmlForm::formInput('password', $data->password) . 
			htmlTags::lineBreak();
		
		return $inputs;
	}
	
	public static function todoFormInputs($data) {
		// all 'todo' form inputs
		$inputs  = 'OWNER EMAIL: ' . 
			htmlForm::formInput('owneremail', $data->owneremail) .
			htmlTags::lineBreak();
		$inputs .= 'OWNER ID: ' . 
			htmlForm::formInput('ownerid', $data->ownerid) .
			htmlTags::lineBreak();
		$inputs .= 'CREATED DATE: ' . 
			htmlForm::formInput('createddate', $data->createddate, 'datetime') . 
			htmlTags::lineBreak();
		$inputs .= 'DUE DATE: ' . 
			htmlForm::formInput('duedate', $data->duedate, 'datetime') .
			htmlTags::lineBreak();
		$inputs .= 'MESSAGE: ' . 
			htmlForm::formInput('message', $data->message) .
			htmlTags::lineBreak();
		$inputs .= 'IS DONE: ' . 
			htmlForm::formInput('isdone', $data->isdone) . 
			htmlTags::lineBreak();
		
		return $inputs;
	}
}
?>