<?php

    //this how to print some data;
	echo utility\htmlTags::heading('Final Project');

	if (isset($_SESSION['userID'])) {
		echo utility\htmlTags::heading(utility\htmlTags::href('index.php?page=accounts&action=show&id=' . $_SESSION['userID'], 'Account Info'));
		
		echo utility\htmlTags::heading(utility\htmlTags::href('index.php?page=tasks&action=all', 'Show All Tasks'));
		echo utility\htmlTags::href('index.php?page=accounts&action=create', 'Register New User');
		echo utility\htmlTags::lineBreak();
		echo utility\htmlTags::href('index.php?page=tasks&action=create', 'Create a Task');
	} else {
		echo utility\htmlForm::formAction('accounts', 'login');
    	include 'login.php';
		echo '</form>';
	}

?>

