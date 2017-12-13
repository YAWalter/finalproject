<?php

echo utility\htmlTable::generateTableFromOneRecord($data);
echo utility\htmlTags::href('index.php?page=tasks&action=edit&id=' . $data->id, 'Edit');
echo utility\htmlTags::lineBreak(2);
echo utility\htmlForm::formButton('delete', 'tasks', $data->id)

?>