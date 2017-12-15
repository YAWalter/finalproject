<?php
//this is how you print something  $data contains the record that was selected on the table.

echo utility\htmlTable::generateTableFromOneRecord($data);
echo utility\htmlTags::href('index.php?page=accounts&action=edit&id=' . $data->id, 'Edit');
echo utility\htmlTags::lineBreak(2);

?>