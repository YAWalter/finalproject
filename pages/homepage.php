<?php

    //this how to print some data;
	echo utility\htmlTags::heading('Final Project');

//	if (isset($_SESSION['userID'])) {
		echo utility\htmlTags::heading(utility\htmlTags::href('index.php?page=accounts&action=all', 'Show All Accounts'));
		echo utility\htmlTags::heading(utility\htmlTags::href('index.php?page=tasks&action=all', 'Show All Tasks'));
//	} else {
		echo utility\htmlForm::formAction('accounts', 'login');

    	echo '<div class="container">';
        	echo '<label><b>Username</b></label>';
        	echo '<input type="text" placeholder="Enter Username" name="uname" required>';
			echo utility\htmlTags::lineBreak();
        	echo '<label><b>Password</b></label>';
        	echo '<input type="password" placeholder="Enter Password" name="psw" required>';
			echo utility\htmlTags::lineBreak();
        	echo '<button type="submit">Login</button>';
    		echo '</div>';
		echo '</form>';
//	}

?>

