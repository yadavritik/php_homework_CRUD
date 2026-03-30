<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Full Name:
        <input type="text" name="name" id=""><br>
        Email:
        <input type="text" name="email" id=""><br>
        Password:
        <input type="password" name="pass" id=""><br>
        Confirm Password:
        <input type="password" name="cpass" id=""><br>
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
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php

include "connection.php";

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];
    $jobtitle = $_POST["jobtitle"];

    if(empty($name) || empty($email) || empty($pass) || empty($cpass) || empty($jobtitle)){
        echo "All fields are required";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "Invalid Email Format";
    }
    elseif($pass != $cpass){
        echo "Password does not match";
    }
    else{
        $hashed = password_hash($pass,PASSWORD_DEFAULT);
        
        $sql = $conn -> prepare("insert into empp (name,email,password,job_title) values(?,?,?,?)");
        $sql -> bind_param('ssss',$name, $email, $hashed, $jobtitle);

        if($sql -> execute()){
            echo "Registration Successfull";
        }else{
            echo "Registration Failed";
        }
    }
}
?>