<?php
    include_once 'connection.php';
    class database extends Dbconnection
    {
        function __construct()
        {
            parent::__construct();
        }

        function getData()
        {
            $query = $this->pdo->prepare('SELECT * FROM `database`');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS);
        }

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


        function deleteData($id){
            $sql = "DELETE FROM `database` WHERE `id` = '$id'";
            $query = $this->pdo->prepare($sql);
            $delete = $query->execute();

            if($delete){
                header('Location:index.php');
                exit();
            }

        }
    }
?>
