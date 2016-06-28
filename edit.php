<?php
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

//Проверка на пост запрос об изменеии записи
if (isset($_POST['operation']))
{
    if ($_POST['operation']==='edit')
    {
        $rooms=$_POST['rooms'];
        $floor=$_POST['floor'];
        $adress=$_POST['adress'];
        $area=$_POST['area'];
        $price=$_POST['price'];
        $description=$_POST['description'];
        //Cоздание нового объекта класса Realty, с помощью конструктора класса, в который записываем данные из $_POST
        //Используем метод update_realty() к объекту $Updated_Realty
        $Updated_Realty = Realty::update_realty($id, $area, $rooms, $floor, $adress, $price, $description);
        header("Location:view.php?id={$id}");
        die();
    }
}
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
            <form action="" method="post">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>area</th>
                    <th>rooms</th>
                    <th>floor</th>
                    <th>adress</th>
                    <th>price</th>
                    <th>description</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php echo <<<HTML
        <td><input style="width: 100px" type="number" value="$realty->area" name="area"></td>
        <td><input style="width: 100px" type="number" value="$realty->rooms" name="rooms"></td>
        <td><input style="width: 100px" type="number" value="$realty->floor" name="floor"></td>
        <td><textarea name="adress" id="" cols="40" rows="2">{$realty->adress}</textarea></td>
        <td><input style="width: 100px" type="number" value="$realty->price" name="price"></td>
        <td><textarea name="description" id="" cols="40" rows="2">{$realty->description}</textarea></td> 
        <td><a href="index.php" class="btn btn-default">Back</a></td>
        <td><input type="hidden" name="operation" value="edit">
        <button class="btn btn-default" type="submit" >Изменить</button></td>
HTML
                    ?>
                </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>
    </body>
    </html>