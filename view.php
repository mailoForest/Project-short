<?php
/**
 * Created by PhpStorm.
 * User: HP Pavilion 17
 * Date: 20.3.2017 г.
 * Time: 4:29
 */
$response = [];
if(isset($_GET['id'])){
    $connection = @mysqli_connect('localhost', 'root', '', 'project_short') or die("Could not connect to mysql " . mysqli_connect_error());
    $query = 'SELECT * FROM people WHERE id = ' . $_GET['id'];
    $response = mysqli_query($connection, $query);
    if ($response){
        header('Location: index.php');
        die();
    }
    $response = mysqli_fetch_array($response);
    mysqli_close($connection);
} else{
    header('Location: index.php');
    die();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="wrapper">
    <div id="person-block">
        <div id="img"><img src="<?= $response['image']?>" alt=""></div>
        <div id="info">
            <?php
                echo $response['first_name'] . " '" . $response['alias'] . "' " . $response['last_name'] . '<br/>';
                echo $response['age'] . '<br/>' . $response['is_single'] . '<br/>'
            ?>
        </div>
    </div>
</div>
</body>
</html>
