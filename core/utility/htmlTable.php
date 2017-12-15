<?php

namespace utility;
//namespace MyProject\mvcName;

class htmlTable
{
    public static function generateTableFromMultiArray($array)
    {

        $tableGen = '<table class="table-striped table-hover" border="1" cellpadding="10">';
        $tableGen .= '<tr>';
        //this grabs the first element of the array so we can extract the field headings for the table
        $fieldHeadings = $array[0];
        $fieldHeadings = get_object_vars($fieldHeadings);
        $fieldHeadings = array_keys($fieldHeadings);
        //this gets the page being viewed so that the table routes requests to the correct controller
        $referingPage = $_REQUEST['page'];
        foreach ($fieldHeadings as $heading) {
            // print all headings except password
			$tableGen .= htmlTable::hidePass($heading, $heading);
        }
        $tableGen .= '</tr>';
        foreach ($array as $record) {
            $tableGen .= '<tr>';
            foreach ($record as $key => $value) {
                if ($key == 'id') {
                    $tableGen .= '<td><a href="index.php?page=' . $referingPage . '&action=show&id=' . $value . '">View</a></td>';
                } elseif ($key == 'password') {
					$tableGen .= '';
				} else {
                    $tableGen .= '<td>' . $value . '</td>';
                }
            }
            $tableGen .= '</tr>';
        }

        $tableGen .= '</table>' . htmlTags::lineBreak();

        return $tableGen;
    }

    public static function generateTableFromOneRecord($innerArray) {
        $tableGen = '<table class="table-striped" border="1" cellpadding="10"><tr>';

        $tableGen .= '<tr>';
        foreach ($innerArray as $innerRow => $value) {
            $tableGen .= htmlTable::hidePass($innerRow, $innerRow);
        }
        $tableGen .= '</tr>';

        foreach ($innerArray as $key=>$value) {
            $tableGen .= htmlTable::hidePass($key, $value, 'td');
        }

        $tableGen .= '</tr></table><hr>';
        return $tableGen;
    }
	
	private static function hidePass($key, $value, $type = 'th') {
		$cell = ($key != 'password') ?
					'<'. $type . '>' . $value . '</'. $type .'>' :
					'';
		return $cell;
	}
	

}

?>