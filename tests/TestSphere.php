<?php
include_once(__DIR__ . '/../verbum-php/core/Verbum.php');
include_once(__DIR__ . '/../src/Sphere.php');

use \Verbum\Core\Verbum as Verbum;

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "BEGIN TEST FOR SPHERE",
));

$radius = 90;

$obj = new Shapes\Sphere($radius);

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Instantiated sphere with radius of $radius?",
    'assert' => get_class($obj) == 'Shapes\Sphere'
));

$circumference = 2 * pi() * $radius;
Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Circumference is $circumference?",
    'assertwith' => $circumference,
    'gotvalue' => $obj->perimeter()
));

$area = 4 * pi() * pow($radius,2);
Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Area is $area?",
    'assertwith' => $area,
    'gotvalue' => $obj->area()
));

$volume = (4/3) * pi() * pow($radius,3);
Verbum::Voco('Util::unittest!feedback', array(
    'message' => "Volume is $volume?",
    'assertwith' => $volume,
    'gotvalue' => $obj->volume()
));

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "TEST FOR SPHERE SUCCESS!"
));

Verbum::Voco('Util::unittest!feedback', array(
    'message' => "----"
));

