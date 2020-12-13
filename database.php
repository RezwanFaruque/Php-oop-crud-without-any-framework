<?php
    include_once 'connection.php';
    class database extends Dbconnection
    {
        function __construct()
        {
            parent::__construct();
        }

        // Get all the data from table
        function getData()
        {
            $query = $this->pdo->prepare('SELECT * FROM `database`');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS);
        }

        // save data in table
        function saveData($name,$title){
            
            
            if($name != '' && $title != ''){
                $sql = "INSERT INTO `database` (`name`, `title`) VALUES ('$name', '$title')";
                
                
                $query = $this->pdo->prepare($sql);
                $insert = $query->execute();
                
                if($insert){
                    header('Location:index.php');
                    exit();
                }else{
                    exit();
                }
            }
        }



        // Delete specific data from database
        function deleteData($id){
            $sql = "DELETE FROM `database` WHERE `id` = '$id'";
            $query = $this->pdo->prepare($sql);
            $delete = $query->execute();

            if($delete){
                header('Location:index.php');
                exit();
            }

        }


        // Edit specific data
        function editData($id){


            $sql = "SELECT * FROM `database` WHERE `id` = '$id'";

            $query = $this->pdo->prepare($sql);
            $query->execute();

            
            $row = $query->fetchObject();

            return $row;
                
            

            
        }


        // update data from database
        function updateData($postdata){

            $name = $postdata['name'];
            $title = $postdata['title'];
            $id = $postdata['postid'];

            $sql = "UPDATE `database` SET `name` = '$name',`title` = '$title' WHERE `database`.`id` = '$id'";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $message = "";
            
            if($query->execute()){
                $message = "your data updated successfully";
                header('Location:index.php?message='.$message);
                exit();
            }else{
                $message = "Your data update failed";
                header('Location:index.php?message='.$message);
            }
        }
    }
?>
