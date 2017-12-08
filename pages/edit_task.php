

<form action="index.php?page=tasks&action=delete&id=<?php $data['id'] ?> " method="post" id="form1">
    <button type="submit" form="form1" value="delete">Delete</button>
</form>

<form action="index.php?page=tasks&action=edit&id=<?php $data['id'] ?> " method="post" id="form1">
    <button type="submit" form="form1" value="Edit">Edit</button>
</form>