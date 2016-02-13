<?php
include_once(__DIR__ . '/../verbum-php/core/Verbum.php');
include_once(__DIR__ . '/../src/Circle.php');

use \Verbum\Core\Verbum as Verbum;

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "BEGIN TEST FOR CIRCLE",
));

$radius = 90;
$obj = new Shapes\Circle($radius);

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Instantiated sphere with radius of $radius?",
    'assert' => get_class($obj) == 'Shapes\Circle'
));

$circumference = (2 * $radius) * pi();
Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Circumference is $circumference?",
    'assertwith' => $circumference,
    'gotvalue' => $obj->perimeter()
));

$area = pi() * pow($radius, 2);
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
    'message' => "TEST FOR CIRCLE SUCCESS!"
));

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "----"
));

