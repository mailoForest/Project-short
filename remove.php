<?php
/**
 * Created by PhpStorm.
 * User: HP Pavilion 17
 * Date: 20.3.2017 г.
 * Time: 2:10
 */

if(isset($_GET['id'])){
    $connection = @mysqli_connect('localhost', 'root', '', 'project_short') or die("Could not connect to mysql " . mysqli_connect_error());
    $query = 'DELETE FROM people WHERE id = ' . $_GET['id'];
    mysqli_query($connection, $query);
    mysqli_close($connection);
    header('Location: index.php');
}
?>