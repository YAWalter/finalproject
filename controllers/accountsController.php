<?php

//each page extends controller and the index.php?page=accounts causes the controller to be called
class accountsController extends http\controller {

    //each method in the controller is named an action.
    //to call the show function the url is index.php?page=account&action=show
    public static function show() {
        $record = accounts::findOne($_REQUEST['id']);
        self::getTemplate('show_account', $record);
    }

    //to call the show function the url is index.php?page=account&action=list_account

    public static function all() {

        $records = accounts::findAll();
        self::getTemplate('all_accounts', $records);

    }
    //to call the show function the url is called with a post to: index.php?page=account&action=create
    //this is a function to create new accounts

    //you should check the notes on the project posted in moodle for how to use active record here

    //this is to register an account i.e. insert a new account
    public static function create() {
        $record = accounts::create();
		if ($_POST)
			$record->body = $_REQUEST['body'];
		
		self::getTemplate('edit_account', $record);
    }

    //this is the function to save the user the user profile
    public static function store() {
        if (array_key_exists('id', $_REQUEST))
			$record = accounts::findOne($_REQUEST['id']);
		else
			$record = new account;
		
		$record->email = $_POST['email'];
		$record->fname = $_POST['fname'];
		$record->lname = $_POST['lname'];
		$record->phone = $_POST['phone'];
		$record->birthday = $_POST['birthday'];
		$record->gender = $_POST['gender'];
		$record->password = $record->setPassword($_POST['password']);
		
		if (self::validator($record)) {
	        $record->save();
			echo 'Saved account!';
			self::getTemplate('show_account', $record);
		} else {
			echo 'Save failed! Try again...';
			self::getTemplate('edit_account', $record);
		}

    }

    public static function edit() {
        $record = accounts::findOne($_REQUEST['id']);

        self::getTemplate('edit_account', $record);

    }
	
	public static function delete() {
        $record = accounts::findOne($_REQUEST['id']);
		$record->delete();
        echo 'Deleted account id: ' . $_REQUEST['id'];
		
		$records = accounts::findAll();
        self::getTemplate('all_accounts', $records);

    }

    //this is to login, here is where you find the account and allow login or deny.
    public static function login() {
		
        //you will need to fix this so we can find users username.  YOu should add this method findUser to the accounts collection
        //when you add the method you need to look at my find one, you need to return the user object.
        //then you need to check the password and create the session if the password matches.
        //you might want to add something that handles if the password is invalid, you could add a page template and direct to that
        //after you login you can use the header function to forward the user to a page that displays their accounts.
		
        
		$user = accounts::findUserbyEmail($_POST['uname']);
        if ($user == FALSE) {
			self::getTemplate('homepage', 'User not Found');
        } else {
            if($user->checkPassword($_POST['psw']) == TRUE) {
                session_set_cookie_params(604800, '/');
				session_start();
                echo 'login';
                $_SESSION['userID'] = $user->id;
				$_SESSION['email'] = $user->owneremail;
				echo utility\htmlTags::preObj($_SESSION);
				
                //forward the user to the show all todos page
				$records = todos::findAll($_SESSION['userID']);
				
				echo utility\htmlTags::preObj($records);
				
				//self::getTemplate('all_tasks', $records);
				//header("Location: index.php?page=tasks&action=all");
            } else {
                echo 'password does not match';
			}
		}

    }
	
	public static function logout() { 
		if (isset($_SESSION)) {
			$_SESSION = array();
			session_destroy();
		}
		
		self::getTemplate('homepage', 'Final Project');
	}

}