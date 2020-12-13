<?php
require_once 'database.php';
$db = new database();

if ($_GET['postid']) {
    $id = $_GET['postid'];

    $singlepost = $db->editData($id);
}

if(isset($_POST['update'])){
    $db->updateData($_POST);
}



?>

<div>
    <h1>Edit Your Post</h1>
</div>

<form action="editpost.php" method="POST" style="display: flex; flex-direction:column; width: 400px;">
    <input type="text" name="name" value="<?php echo $singlepost->name;?>">
    <textarea name="title" id="" cols="30" rows="10"><?php echo $singlepost->title;?></textarea>
    <input type="hidden" name="postid" value="<?php echo $singlepost->id?>">
    <button type="submit" name="update">Update data</button>
</form>