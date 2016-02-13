<?php
include_once(__DIR__ . '/../src/Cube.php');

class CubeTest extends \PHPUnit_Framework_TestCase {

	public function testArea()
	{
	    $side = 25;
	    $cube = new Shapes\Cube($side);
		$this->assertEquals(6 * pow($side,2),$cube->area());
	}

	public function testVolume()
	{
	    $side = 25;
	    $cube = new Shapes\Cube($side);
		$this->assertEquals(pow($side, 3), $cube->volume());
	}

	public function testPerimeter()
	{
	    $side = 25;
	    $cube = new Shapes\Cube($side);
		$this->assertEquals($side * 12, $cube->perimeter());
	}

}

