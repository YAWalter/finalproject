<?php

echo utility\htmlTable::generateTableFromOneRecord($data);
echo utility\htmlTags::href('index.php?page=tasks&action=edit&id=' . $data->id, 'Edit');
echo '&nbsp;&nbsp;&nbsp;';
echo utility\htmlTags::href('index.php?page=tasks&action=delete&id=' . $data->id, 'Delete');
echo utility\htmlTags::lineBreak(2);

?>