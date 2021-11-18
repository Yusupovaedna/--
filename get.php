<?php

if( !( isset($_SESSION) ) )
{
    session_start();
}


date_default_timezone_set('Europe/Moscow');
$start_time = round(microtime(true) * 1000, 5);

if (!isset($_SESSION["row_results"])) {
    $_SESSION["row_results"] = [];
}

class RowResult
{
    private $x_coordinate;
    private $y_coordinate;
    private $radius;
    private $answer;
    private $current_time;
    private $run_time;

    public function __construct($init_x, $init_y, $init_radius, $init_answer, $init_current_time, $init_run_time)
    {
        $this->x_coordinate = $init_x;
        $this->y_coordinate = $init_y;
        $this->radius = $init_radius;
        $this->answer = $init_answer;
        $this->current_time = $init_current_time;
        $this->run_time = $init_run_time;
    }

    public function __get($key)
    {
        return $this->$key;
    }

    public function __set($key, $value)
    {
        $this->$key = $value;
    }
}

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table class="resultTab">
    <tr>
        <td>X</td>
        <td>Y</td>
        <td>R</td>
        <td>Result</td>
        <td>Time</td>
        <td>Ex. time</td>
    </tr>

    <?php


    $X = (double)$_GET["x"];
    $Y = (double)$_GET["y"];
    $R = (double)$_GET["R"];


    $check = false;
    if ($X >= 0 && $X <= $R && $Y >= 0 && $Y <= $R) $check = true;//1ая четверть
    elseif ($X <= 0 && $Y <= 0 && $Y >= $X + $R / 2) $check = true;//2 четверть
    elseif ($X <= 0 && $Y <= 0 && $Y <= sqrt($R * $R - $X * $X)) $check = true;//4 четверть
    if ($check) $answer = 'YES';
    else $answer = 'NO';

    $present_time = date('H:i:s', time());
    $time = round(microtime(true) * 1000 - $start_time, 5);
    assert($time >= 0.0);

    if ($check) {

        echo sprintf("<b>Результат:</b><br>
Точка (%s:%s) при R = %s лежит в заданной области<br>
Текущее время: " . $present_time . "
Время выполнения скрипта: %s с", $X, $Y, $R, $time);

    } else {
        echo sprintf("<b>Результат:</b><br>
Точка (%s:%s) при R = %s не лежит в заданной области<br>
Текущее время:" . $present_time . "
Время выполнения скрипта: %s с", $X, $Y, $R, $time);
    }


    $_SESSION["row_results"][] = new RowResult($X, $Y, $R, $answer, $present_time, $time);

    $row = [];
    foreach ($_SESSION["row_results"] as $current_row) {
        $row[] = "<tr>";
        $row[] = "<td>" . $current_row->x_coordinate . "</td>";
        $row[] = "<td>" . $current_row->y_coordinate . "</td>";
        $row[] = "<td>" . $current_row->radius . "</td>";
        $row[] = "<td>" . $current_row->answer . "</td>";
        $row[] = "<td>" . $current_row->current_time . "</td>";
        $row[] = "<td>" . $current_row->run_time . "ms" . "</td>";
        $row[] = "</tr>";
    }
    echo join("", $row);

    ?>

</body>
</html>
