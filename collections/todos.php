<?php

class todos extends database\collection {
	
    protected static $modelName = 'todo';

    //This is the function to write to find tasks by user ID for listing on their homepage.
    //Don't forget to return the record set see findAll in the collection class
    public static function findTasksbyID($userid) {
		
		//$record = todos::findOne($userid);
		$sql = 'SELECT * FROM todos WHERE ownerid=' . $userid . ';';
		//echo 'userid: ' . $userid;
		
		$records = self::getResults($sql, $userid);
        
		if (is_null($records)) {
            return FALSE;
        } else {
            foreach ($records as $record) {
                unset($record->ownerid);
            }
        
			return $records;
		}
	}
	
}

?>
