
<?php
//this is how you print something  $data contains the record that was selected on the table.

print_r($data);
?>
<form action="index.php?page=tasks&action=edit&id=<?php echo $data->id; ?> " method="post" id="form1">
    <button type="submit" form="form1" value="edit">Edit</button>
</form>
<form action="index.php?page=tasks&action=delete&id=<?php echo $data->id; ?> " method="post" id="form1">
    <button type="submit" form="form1" value="delete">Delete</button>
</form>



