<?php
/**
 * Created by PhpStorm.
 * User: HP Pavilion 17
 * Date: 19.3.2017 г.
 * Time: 15:55
 */
session_start();



$connection = @mysqli_connect('localhost', 'root', '', 'project_short') or die("Could not connect to mysql " . mysqli_connect_error());
$query = 'SELECT id, first_name, alias, last_name, age, email, is_single, image from people ORDER by first_name';
$response = @mysqli_query($connection, $query);
mysqli_close($connection);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Имейл указател</h1>
    <table id="wrapper">
        <?php
            if($response) {
                while ($row = mysqli_fetch_array($response)) {
                    $img = $row['image'];
                    $id = $row['id'];
                    $name = $row['first_name'] . " " . $row['alias'];
                    echo '<tr id="' . $id . '"><td><a href="">' .
                        "<img src='$img'>" . $name . '<a/><td/>
                        <td class="fa fa-remove" onclick="deleteElement(' . $id . ')"> Мани го тоя</td></tr>';
                };
            }
        ?>
        <td><a href="addPerson.php">Добави айляк</a></td>
    </table>

    <script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>