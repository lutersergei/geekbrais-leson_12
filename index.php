<?php
require_once 'initial.php';
require_once 'db.php';
require_once 'classes.php';
//Запрос массива с информацией по все объектам недвижимости, с помощью статического метода класса RealtyArray(без создания объекта класса)
$Object_array = Realty::get_all_realty();
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
                <th></th>
            </tr>
            </thead>
            <tbody>
                                            <!--Pаспаковка данных-->
            <?php
//            var_dump($Object_array);
            foreach ($Object_array as $object)
            {
                echo <<<HTML
<tr>                                        
                                            <td>{$object->id}</td>
                                            <td>{$object->area}</td>
                                            <td>{$object->rooms }</td>
                                            <td>{$object->floor }</td>
                                            <td>{$object->adress}</td>
                                            <td>{$object->price}</td>
                                            <td>
                                            <div class="btn-group" role="group">
                                            <a href="view.php?id={$object->id}" class="btn btn-default">View</a>
                                            <a href="edit.php?id={$object->id}" class="btn btn-default">Edit</a>
                                            </div>
                                            </td>
                                            </tr>
                                            
HTML;
            }?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>