<?php

echo utility\htmlTable::generateTableFromOneRecord($data);
echo utility\htmlTags::href('index.php?page=tasks&action=edit&id=' . $data->id, 'Edit');
echo utility\htmlTags::lineBreak(2);

?>

<form action="index.php?page=tasks&action=delete&id=<?php echo $data->id; ?> " method="post" id="form1">
    <button type="submit" form="form1" value="delete">Delete</button>
</form>



