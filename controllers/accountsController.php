<?php

//each page extends controller and the index.php?page=accounts causes the controller to be called
class accountsController extends http\controller {

    //each method in the controller is named an action.
    //to call the show function the url is index.php?page=account&action=show
    public static function show() {
		session_start();
        $record = accounts::findOne($_REQUEST['id']);
        self::getTemplate('show_account', $record);
    }

    //to call the show function the url is index.php?page=account&action=list_account

    public static function all() {
		session_start();
        $records = accounts::findAll();
        // don't need this: self::getTemplate('all_accounts', $records);
		self::getTemplate('show_accounts', $records);

    }
    //to call the show function the url is called with a post to: index.php?page=account&action=create
    //this is a function to create new accounts

    //you should check the notes on the project posted in moodle for how to use active record here

    //this is to register an account i.e. insert a new account
    public static function create() {
		session_start();
        $record = accounts::create();
		if ($_POST)
			$record->body = $_REQUEST['body'];
		
		self::getTemplate('edit_account', $record);
    }

    //this is the function to save the user the user profile
    public static function store() {
		session_start();
        if (array_key_exists('id', $_REQUEST)) {
			$record = accounts::findOne($_REQUEST['id']);
			$login = false;
		} else {
			$record = new account;
			$login = true;
		}
		
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
			// if this is a new user, log them in
			if ($login)
				self::getTemplate('homepage', 'New login \''. $_POST['email'] .'\' activated! Please log in...');
			else
				self::getTemplate('show_account', $record);
		} else {
			echo 'Save failed! Try again...';
			self::getTemplate('edit_account', $record);
		}

    }

    public static function edit() {
		session_start();
        $record = accounts::findOne($_REQUEST['id']);

        self::getTemplate('edit_account', $record);

    }
	
	public static function delete() {
		session_start();
        $record = accounts::findOne($_REQUEST['id']);
		$record->delete();
        echo 'Deleted account id: ' . $_REQUEST['id'];
		
		// if we deleted the active user, logout
		if ($_SESSION['userID'] == $_REQUEST['id']) {
			unset($_SESSION['userID']);
			$_SESSION = array();
			session_destroy();
	        self::getTemplate('homepage', 'You deleted yourself! I hope you\'re happy...');
		} else {
			$record = accounts::findOne($_SESSION['id']);
		}

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
                //session_set_cookie_params(604800, '/');
				session_start();
                //echo 'login';
                $_SESSION['userID'] = $user->id;
				$_SESSION['email'] = $user->email;
				// the above works. Session starts, and those values are set correctly
				
				//echo utility\htmlTags::preObj($_SESSION);
				//exit;
				
                //forward the user to the show all todos page
				//$records = todos::findTasksbyID($_SESSION['userID']);	
				//echo utility\htmlTags::preObj($records);
				//self::getTemplate('all_tasks', $records);
				
				$location = 'Location: index.php?page=tasks&action=all';
				header($location);
            } else {
				self::getTemplate('homepage', 'Re-enter password');
			}
		}

    }
	
	public static function logout() { 
//		if (isset($_SESSION['userID'])) {
			session_start();
			unset($_SESSION['userID']);
			$_SESSION = array();
			session_destroy();
//			echo utility\htmlTags::preObj($_SESSION);
//		}
		
		self::getTemplate('homepage', 'Logged out of Final Project!');
	}

}