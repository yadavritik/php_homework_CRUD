<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 align = "center">Employee Table</h3>
    <?php
    include "connection.php";
    $result = $conn -> query("Select * from employee");
    ?>
    <table style = background:linear-gradient(Pink) border = "1" align = "center" cellpadding = "10" cellspacing = "5">
        <tr>
            <td>Name</td>
            <td>Position</td>
            <td>Salary</td>
        </tr>

        <?php
        while($row = $result -> fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['position'] ?></td>
            <td><?php echo $row['salary'] ?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>