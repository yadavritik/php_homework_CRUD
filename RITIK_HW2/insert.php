<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Name:
        <input type="text" name="name" id=""><br>
        Job Title:
        <select name="jobtitle" id="">
            <option value="Manager">Manager</option>
            <option value="Developer">Developer</option>
            <option value="Accountant">Accountant</option>
            <option value="HR">HR</option>
            <option value="Clerk">Clerk</option>
            <option value="Intern">Intern</option>
            <option value="Sales Executive">Sales Executive</option>
            <option value="Team Leader">Team Leader</option>
        </select><br>
        Salary:
        <input type="number" name="salary" id=""><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php
include "connection.php";

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name = $_POST["name"];
    $jobtitle = $_POST["jobtitle"];
    $salary = $_POST["salary"];

    $sql = $conn -> prepare("insert into employee (name, position, salary) values(?,?,?)");
    $sql -> bind_param('ssi',$name, $jobtitle, $salary);

    if($sql->execute()){
        echo "Data Inserted Successfully....";
    }else{
        echo "Data Not Inserted....";
    }
}
?>