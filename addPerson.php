<?php
/**
 * Created by PhpStorm.
 * User: HP Pavilion 17
 * Date: 19.3.2017 г.
 * Time: 16:09
 */
if (isset($_POST['submit'])){
    if (isset($_POST['name']) && isset($_POST['surname']) && is_numeric($_POST['age']) && isset($_POST['email']) && isset($_POST['isSingle'])){
        $name = $_POST['name'];
        $name = htmlentities(trim($name));
        $surname = $_POST['surname'];
        $surname = htmlentities(trim($surname));
        $alias = $_POST['alias'];
        $alias = htmlentities(trim($alias));
        $age = $_POST['age'];
        $age = htmlentities(trim($age));
        $email = $_POST['email'];
        $email = htmlentities(trim($email));
        $isSingle = $_POST['isSingle'] + 0;
        $isSingle = htmlentities(trim($isSingle));
        $image = $_POST['image'];
        $image = htmlentities(trim($image));

        if ($image == ''){
            $image = 'https://cdn3.iconfinder.com/data/icons/vacation-4/32/vacation_26-512.png';
        }

        $connection = @mysqli_connect('localhost', 'root', '', 'project_short') or die("Could not connect to mysql " . mysqli_connect_error());
        $query = "INSERT INTO people (first_name, alias, last_name, age, email, is_single, image) VALUES (?, ?, ?,?,?,?,?);";
        //$name, $alias, $surname, $age, $email, $isSingle, $image

        $statement = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($statement, "sssisis", $name, $alias, $surname, $age, $email, $isSingle, $image);
        mysqli_stmt_execute($statement);

        mysqli_close($connection);

        header('Location: index.php');
    } else{
        echo 'Полетата за име, фамилия, имейл, възраст и обвързаност са задължителни!';
    }
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

<fieldset>
    <legend>Добави в указателя</legend>
    <form action="./addPerson.php" method="post">
        <div><label for="name">Име: </label><input type="text" name="name" id="name"></div>
        <div><label for="surname">Фамилия: </label><input type="text" name="surname" id="surname"></div>
        <div><label for="alias">Прякор: </label><input type="text" name="alias" id="alias"></div>
        <div><label for="age">Възраст: </label><input type="text" id="age" name="age"></div>
        <div><label for="email">Имейл: </label><input type="email" name="email" id="email"></div>
        <div><label for="isSingle">Обвързан: </label><select name="isSingle" id="isSingle">
                <option value="0">Да</option>
                <option value="1">Не</option></select></div>
        <div><label for="image">Снимка: </label><input type="url" id="image" name="image"></div>
        <div><input type="submit" value="Добави" name="submit"></div>
    </form>
</fieldset>

</body>
</html>
