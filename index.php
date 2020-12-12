<?php
require_once 'database.php';
$db = new database();
$rows = $db->getData();

    // saving record
    if(isset($_POST['save'])){
   
        if($_REQUEST['name'] != '' && $_REQUEST['title'] !=  ''){
            $db->saveData($_REQUEST['name'],$_REQUEST['title']);
        }
    }

    // Deleteting record setup
    if(isset($_GET['postid']) && !empty($_GET['postid'])){

        $postid = $_GET['postid'];
        $db->deleteData($postid);
    }


foreach ($rows as $row) {
?>
   <div>
     <h1>
     <?php
         echo $row->name;
     ?>
     </h1>
     <?php
       echo $row->title;
     ?>
     <a style="text-decoration: none; border:1px solid blue;padding:2px;color:red;" href="index.php?postid=<?php echo $row->id?>">Delete</a>
   </div>
<?php
 }
?>

<div>
   <h4>save data to database</h4>
   <form action="index.php" method="post">
        <input type="text" name="name">
        <input type="text" name="title">
        <button type="submit" name="save">save data</button>
   </form>
</div>
