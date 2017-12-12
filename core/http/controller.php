<?php

namespace http;
// this is the controller class that you use to connect models with views and business logic
class controller {

	//builds the HTML template for the application and accepts the model.  The model array can be used in the template
    static public function getTemplate($template, $data = NULL) {
		
		include 'pages/templates/header.php';
        include 'pages/' . $template . '.php'; 	// use $data to access the array in the template 
		include 'pages/templates/footer.php';

    }
}