<?php
$x1 = $_GET['x1'];
$x2 = $_GET['x2'];
$operation = $_GET['operation'];

if (empty($_GET)) {
    return 'Ничего не передано';
}

if (empty($_GET['operation'])) {
    return 'Операция не передана';
}

if (!isset($_GET['x1']) || !isset($_GET['x2'])) {
    return 'Аргументы 1 или 2 не переданы';
} 

if (!is_numeric($x1) || !is_numeric($x2)) {
    return 'Аргументы должны быть числами';
}

$expression = $x1 . ' ' . $operation . ' ' . $x2 . ' = ';

switch ($operation) {
    case '+':
        $result = $x1 + $x2;
        break;
    case '-':
        $result = $x1 - $x2;
        break;
    case '/':
        if ($x2 = 0) {
            return 'На ноль делить нельзя';
        } elseif (is_float($x2)) {
            return 'делить нельзя';
        } else {
        $result = $x1 / $x2;
        break;
        }
    case '*':
        $result = $x1 * $x2;
        break;
}

return $expression . $result;
