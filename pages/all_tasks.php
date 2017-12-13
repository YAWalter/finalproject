
<?php
//this is how you print something

echo utility\htmlTable::generateTableFromMultiArray($data);

?>

<form action="index.php?page=tasks&action=create" method="post" id="form1">
    <button type="submit" form="form1" value="create">New Task</button>
</form>