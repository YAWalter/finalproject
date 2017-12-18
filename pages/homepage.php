<?php

    //this how to print some data;
	echo utility\htmlTags::heading('Final Project');
	echo utility\htmlTags::href('index.php?page=accounts&action=create', 'Register New User');

	if (isset($_SESSION['userID'])) {
		echo utility\htmlTags::heading(utility\htmlTags::href('index.php?page=accounts&action=all', 'Show All Accounts'));
		echo utility\htmlTags::heading(utility\htmlTags::href('index.php?page=tasks&action=all', 'Show All Tasks'));
	} else {
		echo utility\htmlForm::formAction('accounts', 'login');
    	include 'login.php';
		echo '</form>';
	}

?>

