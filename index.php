<?php
require_once 'initial.php';
require_once 'db.php';
require_once 'classes.php';
//Запрос массива с информацией по все объектам недвижимости, с помощью статического метода класса RealtyArray(без создания объекта класса)
$Realty_array = Realty::get_all_realty();
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
            var_dump($Realty_array);
            foreach ($Realty_array as $realty_one)
            {
                echo <<<HTML
<tr>                                        
                                            <td>{$realty_one['realty_id']}</td>
                                            <td>{$realty_one['area']}</td>
                                            <td>{$realty_one['rooms']}</td>
                                            <td>{$realty_one['floor']}</td>
                                            <td>{$realty_one['adress']}</td>
                                            <td>{$realty_one['price']}</td>
                                            <td>
                                            <div class="btn-group" role="group">
                                            <a href="view.php?id={$realty_one['realty_id']}" class="btn btn-default">View</a>
                                            <a href="edit.php?id={$realty_one['realty_id']}" class="btn btn-default">Edit</a>
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