<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Id:
        <input type="number" name="id" id=""><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php

include "connection.php";

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id = $_POST["id"];

    $sql = $conn -> prepare("delete from employee where id = ?");
    $sql -> bind_param('i',$id);

    if($sql -> execute()){
        echo "Data Deleted Successfully....";
    }else{
        echo "Data Not Deleted....";
    }
}
?>