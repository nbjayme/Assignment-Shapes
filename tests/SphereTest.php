<?php
include_once(__DIR__ . '/../src/Sphere.php');

class SphereTest extends \PHPUnit_Framework_TestCase {

	public function testArea()
	{
	    $radius = 90;
	    $sphere = new Shapes\Sphere($radius);
		$this->assertEquals(4 * pi() * pow($radius,2),$sphere->area());
	}

	public function testVolume()
	{
	    $radius = 90;
	    $sphere = new Shapes\Sphere($radius);
		$this->assertEquals((4/3) * pi() * pow($radius,3), $sphere->volume());
	}

	public function testPerimeter()
	{
	    $radius = 90;
	    $sphere = new Shapes\Sphere($radius);
		$this->assertEquals( 2 * pi() * $radius, $sphere->perimeter());
	}

}

