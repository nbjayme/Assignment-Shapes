<?php
include_once(__DIR__ . '/../src/Circle.php');

class CircleTest extends \PHPUnit_Framework_TestCase {

	public function testArea()
	{
	    $radius = 90;
	    $circle = new Shapes\Circle($radius);
		$this->assertEquals(pi() * pow($radius, 2),$circle->area());
	}

	public function testVolume()
	{
	    $radius = 90;
	    $circle = new Shapes\Circle($radius);
		$this->assertEquals(0, $circle->volume());
	}

	public function testPerimeter()
	{
	    $radius = 90;
	    $circle = new Shapes\Circle($radius);
		$this->assertEquals((2 * $radius) * pi(), $circle->perimeter());
	}
}

