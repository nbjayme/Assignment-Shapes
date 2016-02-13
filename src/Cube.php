<?php

namespace Shapes;

include_once('ShapeInterface.php');

class Cube implements ShapeInterface {

	protected $side;

	/**
	 * Square constructor.
	 *
	 * @param int $side
	 */
	public function __construct($side)
	{
	    $this->side = $side;
	}

	/**
	 * Get the area
	 *
	 * @return int
	 */
	public function area()
	{
		return 6 * pow($this->side ,2);
	}

	/**
	 * Get the perimeter
	 *
	 * @return int
	 */
	public function perimeter()
	{
		return 12 * $this->side;
	}
	
	public function volume()
	{
		return pow($this->side,3);
	}

}
