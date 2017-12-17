<?php

namespace http;
// this is the controller class that you use to connect models with views and business logic
class controller {

	//builds the HTML template for the application and accepts the model.  The model array can be used in the template
    static public function getTemplate($template, $data = NULL) {
		
		include 'pages/templates/header.php';
        include 'pages/' . $template . '.php'; 	// since this is an include, $data is now in state (i.e. we can directly access $data in $template)
		include 'pages/templates/footer.php';

    }
	
	// validates inputs for todos
	static public function validator($record) {
		
		$check = array();
		foreach ($record as $key=>$val) { 
			// skip ID field, since new objects won't have IDs yet (and it's pointless to check)
			if ($key == 'id')
				continue;
			$check[] = isset($val) ? true : false;
		}
		
		if (in_array(false, $check))
			return false;
		else
			return true;
	}
}