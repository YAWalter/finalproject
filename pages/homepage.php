<?php

    //this how to print some data;
	echo utility\htmlTags::heading('Final Project');

	if (isset($_SESSION['userID'])) {
		echo utility\htmlTags::heading(utility\htmlTags::href('index.php?page=accounts&action=all', 'Show All Accounts'));
		echo utility\htmlTags::heading(utility\htmlTags::href('index.php?page=tasks&action=all', 'Show All Tasks'));
	} else {
		echo utility\htmlForm::formAction('accounts', 'login');
	}
?>

    <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
		<?php echo utility\htmlTags::lineBreak(); ?>
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
		<?php echo utility\htmlTags::lineBreak(); ?>
        <button type="submit">Login</button>
    </div>


</form>


