<?php

echo utility\htmlForm::formBuild('todos', 'store', $data);
echo utility\htmlTags::lineBreak(2);

?>

<form action="index.php?page=tasks&action=store&id=<?php $data['id'] ?> " method="post" id="form1">
    <button type="submit" form="form1" value="submit">Submit changes</button>
</form>

<form action="index.php?page=tasks&action=delete&id=<?php $data['id'] ?> " method="post" id="form1">
    <button type="submit" form="form1" value="delete">Delete</button>
</form>