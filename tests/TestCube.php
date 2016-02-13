<?php
include_once(__DIR__ . '/../verbum-php/core/Verbum.php');
include_once(__DIR__ . '/../src/Cube.php');

use \Verbum\Core\Verbum as Verbum;

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "BEGIN TEST FOR CUBE",
    
));

$side = 25;

$obj = new Shapes\Cube($side);

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Instantiated cube with side length of $side?",
    'assert' => get_class($obj) == 'Shapes\Cube'
));

$circumference = $side * 12;
Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Circumference is $circumference?",
    'assertwith' => $circumference,
    'gotvalue' => $obj->perimeter()
));

$area = 6 * pow($side,2);
Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Area is $area?",
    'assertwith' => $area,
    'gotvalue' => $obj->area()
));

$volume = pow($side, 3);
Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Volume is $volume?",
    'assertwith' => $volume,
    'gotvalue' => $obj->volume()
));

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "TEST FOR CUBE SUCCESS!"
));

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "----"
));

