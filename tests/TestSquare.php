<?php
include_once(__DIR__ . '/../verbum-php/core/Verbum.php');
include_once(__DIR__ . '/../src/Square.php');

use \Verbum\Core\Verbum as Verbum;

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "BEGIN TEST FOR SQUARE",
));

$side = 25;
$obj = new Shapes\Square($side);

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Instantiated square with side length of $side?",
    'assert' => get_class($obj) == 'Shapes\Square'
));

$circumference = 4 * $side;
Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Circumference is $circumference?",
    'assertwith' => $circumference,
    'gotvalue' => $obj->perimeter()
));

$area = pow($side, 2);
Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Area is $area?",
    'assertwith' => $area,
    'gotvalue' => $obj->area()
));

$volume = 0;
Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Volume is $volume?",
    'assertwith' => $volume,
    'gotvalue' => $obj->volume()
));

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "TEST FOR SQUARE SUCCESS!"
));

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "----"
));

