<?php
/**
 * Created by PhpStorm.
 * User: kwilliams
 * Date: 11/27/17
 * Time: 5:32 PM
 */


//each page extends controller and the index.php?page=tasks causes the controller to be called
class tasksController extends http\controller {
    //each method in the controller is named an action.
    //to call the show function the url is index.php?page=task&action=show&id=
    public static function show() {
        $record = todos::findOne($_REQUEST['id']);
        self::getTemplate('show_task', $record);
    }

    //to call the show function the url is index.php?page=tasks&action=all
    public static function all() {
        
		$records = todos::findAll();
        
		// pulls only the related tasks
		$records = todos::findTasksbyID($_SESSION['userID']);	
		echo utility\htmlTags::preObj($records);
		//self::getTemplate('all_tasks', $records);
    }
	
    //to call the show function the url is called with a post to: index.php?page=task&action=create
    //this is a function to create new tasks
    //you should check the notes on the project posted in moodle for how to use active record here

    public static function create() {
        //print_r($_POST);
		
		$record = todos::create();
		if ($_POST)
			$record->body = $_REQUEST['body'];

		self::getTemplate('edit_task', $record);
    }

    //this is the function to view edit record form
    public static function edit() {
        $record = todos::findOne($_REQUEST['id']);

       	self::getTemplate('edit_task', $record);
    }

    //this would be for the post for sending the task edit form
    public static function store() {

        if (array_key_exists('id', $_REQUEST))
			$record = todos::findOne($_REQUEST['id']);
		else
			$record = new todo;
		
		$record->owneremail = $_POST['owneremail'];
		$record->ownerid = $_POST['ownerid'];
		$record->createddate = $_POST['createddate'];
		$record->duedate = $_POST['duedate'];
		$record->message = $_POST['message'];
		$record->isdone = $_POST['isdone'];
		
//        $record->body = $_REQUEST['body'];
		if (self::validator($record)) {
	        $record->save();
			echo 'Saved task!';
			self::getTemplate('show_task', $record);
		} else {
			echo 'Save failed! Try again...';
			self::getTemplate('edit_task', $record);
		}
    }

    //this is the delete function.  You actually return the edit form and then there should be 2 forms on that.
    //One form is the todo and the other is just for the delete button
    public static function delete() {
        $record = todos::findOne($_REQUEST['id']);
		$record->delete();
        echo 'Deleted todo id: ' . $_REQUEST['id'];
        //print_r($_POST);
		
		$records = todos::findAll();
        self::getTemplate('all_tasks', $records);

    }

}