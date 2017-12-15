<?php

    //this how to print some data;
    echo utility\htmlTags::heading('This is my ' . $data['site_name'] . '; welcome!');

?>

<h1><a href="index.php?page=accounts&action=all">Show All Accounts</a></h1>
<h1><a href="index.php?page=tasks&action=all">Show All Tasks</a></h1>

<form action="index.php?page=accounts&action=login" method="POST">

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


