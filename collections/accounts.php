<?php

class accounts extends \database\collection {
    protected static $modelName = 'account';

    //This is the function to write to find user by ID for login.
    //Don't forget to return the object see findOne in the collection class
    public static function findUserbyID($userid) {
		
	}
	
	public static function findUser($username) {
        
		$sql = sqlBuilder::sqlSelect('accounts', $username);
        //grab the only record for find one and return as an object
        $recordsSet = self::getResults($sql);
        
		return $recordsSet[0];
	}
	
	// query for related todos?
}

?>
