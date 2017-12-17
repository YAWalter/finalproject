<!doctype html>
<?php 
	session_start();
	if (isset($_SESSION['userID'])) { 	// if we destroyed the session (for logout), ID would not be set (or "un"set)
		echo 'logged in';
		$_SESSION['menu'] = true;
	} else {
		echo 'not logged in';
		//header("Location: index.php"); // kicks non-logged-in-usersto the homepage
	}
	echo utility\htmlTags::preObj($_SESSION);
?>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title><?php echo utility\htmlTags::makeTitle($template); ?></title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>

<body class="container" style="padding-top:50px;">

<?php 
	if (isset($_SESSION['userID'])) {		// check that we're logged in
		include 'menu.php';
		//echo utility\htmlTags::preObj($_SESSION);
	}
//	else {
//		echo utility\htmlTags::heading('NOT LOGGED IN');
//		echo '</body></html>';
//		exit;
//	}
?>
