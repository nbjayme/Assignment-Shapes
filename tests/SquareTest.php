<?php
include_once(__DIR__ . '/../src/Cube.php');

class SquareTest extends \PHPUnit_Framework_TestCase {

	public function testArea()
	{
	    $side = 25;
	    $square = new Shapes\Square($side);
		$this->assertEquals(pow($side, 2),$square->area());
	}

	public function testVolume()
	{
	    $side = 25;
	    $square = new Shapes\Square($side);
		$this->assertEquals(0, $square->volume());
	}

	public function testPerimeter()
	{
	    $side = 25;
	    $square = new Shapes\Square($side);
		$this->assertEquals(4 * $side, $square->perimeter());
	}

}

