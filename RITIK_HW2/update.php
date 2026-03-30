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
        Salary:
        <input type="number" name="salary" id=""><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php

include "connection.php";

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id = $_POST["id"];;
    $salary = $_POST["salary"];

    $sql = $conn -> prepare("update employee set salary = ? where id = ?");
    $sql -> bind_param('ii',$salary, $id);

    if($sql -> execute()){
        echo "Data Updated Successfully....";
    }else{
        echo "Data Not Updated....";
    }
}
?>