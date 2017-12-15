<?php
// THIS WHOLE THING DUPLICATES model.php; NEED TO REMOVE
namespace database;

class sqlBuilder {
	
	// note that $id is a generic field name ('id' by default, but I don't feel like refactoring to fix the confusion)
    public static function sqlSelect($table, $id = NULL, $limit = NULL, $column = 'id') {
		$sql  = 'SELECT * FROM ' . $table;
		$sql .= sqlBuilder::where($id, $column);
		$sql .= $limit ? 'LIMIT ' . $limit : '';
		$sql .= ';';
		
		return $sql;
	}
	
	public static function sqlInsert($table, $data) {
		$columns = sqlBuilder::getColumns($table);
		
		$sql  = 'INSERT INTO '  . $table;
		$sql .= ' (' 			. $columns 		 . ')';
		$sql .= ' VALUES (' 	. implode($data) . ');';		
		
		return $sql;
	}
	
	public static function sqlUpdate($table, $id = NULL, $data) {
		$sql  = 'UPDATE ' . $table;
		$sql .= ' SET ';
		$sql .= sqlBuilder::where($id) . ';';
		
		return $sql;
	}
	
	public static function where($id = NULL, $column) {
		// sticks in a 'WHERE id=$id' clause, if needed
		$sql = '';
		if ($id)
			$sql = ' WHERE ' . $column . '=' . $id;
		
		return $sql;
	}
	
	// returns all columns except id
	private static function getColumns($table) {
		$record = sqlBuilder::sqlSelect($table, NULL, 1);
		$column = '';
		foreach ($record as $name=>$val) {
			if ($name != 'id')
				$column .= ',' . $name;
		}
		
		return $columns;
	}

}

?>