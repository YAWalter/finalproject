<?php

echo utility\htmlTags::heading('All Tasks for user \'' . $_SESSION['email'] . '\'');
echo utility\htmlTable::generateTableFromMultiArray($data);

echo utility\htmlTags::href('index.php?page=tasks&action=create', 'New Task');

?>