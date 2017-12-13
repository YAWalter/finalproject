<?php

echo utility\htmlTable::generateTableFromMultiArray($data);

echo utility\htmlTags::href('index.php?page=tasks&action=create', 'New Task');

?>