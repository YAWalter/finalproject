<?php
namespace utility;

class htmlTags {	

	// ## SIMPLE ONES: <title>, <h1>, <a>, <br>, <pre>
	public static function makeTitle($str, $id = NULL) {
		// returns a cleaner format for page titles ('all_accounts' becomes 'All Accounts'; maybe also adds ID?)
		$title = ucwords(str_replace('_', ' ', $str));
		/*if ($id)
			$title .= ' (id: ' . $id . ')';*/
						  
		return $title;
	}
	
	public static function heading($str) {
		return '<h1>' . $str . '</h1>';
	}

	public static function href($link, $str = NULL) {
		$text = ($str == NULL) ? $link : $str;
		
		return '<a href=' . $link . '>' . $text . '</a>';
	}
	
	public static function lineBreak($repeat = 1) {
		$breaks = '';
		for ($x = 1; $x <= $repeat; $x++)
			$breaks .= '<br>';
		
		return $breaks;
	}
	
	public static function pre($str) {
		return '<pre>' . $str . '</pre>';
	}
	
	// like the above, but for arrays/objects
	public static function preObj($obj) {
		return htmlTags::pre(print_r($obj, true));
	}
	
	// ## listMaker: <ol> & <ul>
	public static function listMaker($arr, $ordered = 0) {
		$list = htmlTags::listTag($ordered);
		foreach ($arr as $item) {
			$list .= '<li>' . $item . '</li>';
		}
		$list .= htmlTags::listTag($ordered, 1);
		
		return $list;
	}
	
	private static function listTag($ordered, $close = NULL) {
		if ($ordered) {
			$type = 'ol';
		} else {
			$type = 'ul';
		}
		
		if ($close)
			$close = '/';
		
		return '<' . $close . $type . '>';
	}

}
?>
