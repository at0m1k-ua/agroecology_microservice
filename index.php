<?php
include_once 'DatabaseConnector.php';
$db = DatabaseConnector::get_instance();
?>

<!DOCTYPE html>
<html lang="uk">
    <head>
        <title>Агроекологія полів</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </head>
    <body style="padding:30px">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Оберіть рік
            </button>
            <ul class="dropdown-menu">
                <?php
                    foreach ($db->fields->get_years() as $year) {
                        echo "<li><a class='dropdown-item' href='/index.php?year={$year}'>$year</a></li>";
                    }
                ?>
            </ul>
        </div>

        <?php
        $year = $_GET['year'];
        if ($year) {
            ?>
            <hr>
            <h2>Агрохімічний стан полів на <?=$year?> рік</h2>
            <hr>
            <table class="table">
                <tr>
                    <th rowspan="2">№ поля</th>
                    <th rowspan="2">Площа, га</th>
                    <th rowspan="2">Бал</th>
                    <th rowspan="2">pH</th>
                    <th rowspan="2">Вміст гумусу, %</th>
                    <th colspan="7">Елементи живлення, мг/кг</th>
                    <th colspan="3">Забруднення</th>
                </tr>
                <tr>
                    <th>N</th>
                    <th>P₂O₅</th>
                    <th>K₂O</th>
                    <th>Mn</th>
                    <th>Co</th>
                    <th>Cu</th>
                    <th>Zn</th>
                    <th>Pb, мг/кг</th>
                    <th>Цезій, Ки/кв.м</th>
                    <th>Стронцій, Ки/кв.м</th>
                </tr>
                <?php
                    foreach ($db->fields->get_by_year($year) as $field) {
                        ?>
                        <tr>
                            <th><?=$field->name?></th>
                            <td><?=$field->area?></td>
                            <td><?=$field->grade?></td>
                            <td><?=$field->ph?></td>
                            <td><?=$field->humus?></td>
                            <td><?=$field->n?></td>
                            <td><?=$field->p2o5?></td>
                            <td><?=$field->k2o?></td>
                            <td><?=$field->mn?></td>
                            <td><?=$field->co?></td>
                            <td><?=$field->cu?></td>
                            <td><?=$field->zn?></td>
                            <td><?=$field->pb?></td>
                            <td><?=$field->cs?></td>
                            <td><?=$field->sr?></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
            <?php
        }
        ?>

    </body>
</html>
