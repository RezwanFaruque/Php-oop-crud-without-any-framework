<?php
require_once 'database.php';
$db = new database();

if ($_GET['postid']) {
    $id = $_GET['postid'];

    $singlepost = $db->editData($id);
}



?>

<div>
    <h1>Edit Your Post</h1>
</div>

<form action="" method="post" style="display: flex; flex-direction:column; width: 400px;">
    <input type="text" name="name" value="<?php echo $singlepost->name;?>">
    <textarea name="title" id="" cols="30" rows="10"><?php echo $singlepost->title;?></textarea>
    <button type="submit" name="update">Update data</button>
</form>