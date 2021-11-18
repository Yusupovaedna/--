<?php
if( !( isset($_SESSION) ) ) // if the session is no  set then start to
{
     session_start();
}
$start = microtime(true);
if (isset($_GET['x'])) $x = $_GET['x'];
if (isset($_GET['y'])) $y = $_GET['y'];
if (isset($_GET['R'])) $R = $_GET['R'];




$check = false;
if ($x>=0 && $x<=$R && $y>=0 && $y<=$R) $check=true;//1ая четверть
elseif ($x<=0 && $y<=0 && $y>=$x + $R/2) $check=true;//2 четверть
elseif ($x<=0 && $y<=0 && $y<=sqrt($R*$R - $x*$x)) $check=true;//4 четверть
$finish = microtime(true);
$time = number_format($finish-$start,6);

try {
    $dt = new DateTime("now", new DateTimeZone('Europe/Moscow'));
} catch (Exception $e) {
}



if ($check){

    echo sprintf("<b>Результат:</b><br>
Точка (%s:%s) при R = %s лежит в заданной области<br>
Текущее время: ". $dt->format('H:i:s')."
Время выполнения скрипта: %s с", $x, $y, $R, $time);

}
else {
    echo sprintf("<b>Результат:</b><br>
Точка (%s:%s) при R = %s не лежит в заданной области<br>
Текущее время:". $dt->format('H:i:s')."
Время выполнения скрипта: %s с", $x, $y, $R, $time);
}
?>




