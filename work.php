<?php
if (isset($_GET['x'])) $x = $_GET['x'];
if (isset($_GET['y'])) $y = $_GET['y'];
if (isset($_GET['r'])) $r = $_GET['r'];
$check = false;
$fail = "";
$y = preg_replace("/,/", ".", $y);
if (!(is_numeric($x))) $fail .= "Некорректное значение X\n";
elseif ($y<-5 || $y>5 || !is_numeric($y)) $fail .= "Некорректное значение Y\n";
elseif (!is_numeric($r) || $r < 0) $fail .= "Некорректное значение R";
if ($fail != "") die($fail);
if ($x<=0 && $x>=-$r && $y<=0 && $y>=-$r/2) $check=true;
elseif ((-$x*$r >= 0 && $x*$r-$r/2*($r-$y) >=0 && -$r/2*$y >=0) || (-$x*$r <= 0 && $x*$r-$r/2*($r-$y) <=0 && -$r/2*$y <=0)) $check=true;
elseif ($x>=0 && $y<=0 && sqrt($y*$y + $x*$x) <= $r/2) $check=true;
if ($check){
    echo "<center><b>Результат:</b><br>Точка (" . $x . "; " . $y . ") при r = " . $r . " лежит в заданной области<br></center>";
}
else {
    echo "<center><b>Результат:</b><br>Точка (" . $x . "; " . $y . ") при r = " . $r . " не лежит в заданной области<br></center>";
}

?>.