<?php

// login form
echo '<div class="container">';
   	echo '<label><b>Username</b></label>';
   	echo '<input type="text" placeholder="Enter Username" name="uname" required>';
	echo utility\htmlTags::lineBreak();
    echo '<label><b>Password</b></label>';
    echo '<input type="password" placeholder="Enter Password" name="psw" required>';
	echo utility\htmlTags::lineBreak();
    echo '<button type="submit">Login</button>';
echo '</div>';
?>