<?php
/**
 * Created by PhpStorm.
 * User: drKox
 * Date: 26.06.2016
 * Time: 13:37
 */
require_once 'initial.php';
require_once 'db.php';
require_once 'classes.php';

if (isset($_GET['id']))
{
    $id=$_GET['id'];
}
else {
    header('Location:index.php');
    die();
}
//Создание, с помощью конструктора класса, объекта класса - Realty, с id переданным в get запросе
$realty = new Realty($id);
//С помощью метода get_realty_information записывается информация в остальные поля объекта
//$realty->get_realty_information();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Lesson_4</title>
</head>
<body>
<div class="row">
    <div class="col-xs-8 col-xs-pull-2 col-xs-push-2">
<h1>Lesson_4</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>area</th>
            <th>rooms</th>
            <th>floor</th>
            <th>adress</th>
            <th>price</th>
            <th>description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <tr>
<!--        Выводим информацию из полей объекта-->

        <td><?= $realty->get_id() ?></td>
        <td><?= $realty->area?></td>
        <td><?= $realty->rooms?></td>
        <td><?= $realty->floor?></td>
        <td><?= $realty->adress?></td>
        <td><?= $realty->price?></td>
        <td><?= $realty->description?></td>
        <td><a href="index.php" class="btn btn-default">Back</a></td>
    </tr>
    </tbody>
</table>
    </div>
</div>
</body>
</html>
