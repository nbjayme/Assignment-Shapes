<?php

namespace Shapes;

include_once('ShapeInterface.php');

class Square implements ShapeInterface {

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
		return pow($this->side, 2);
	}

	/**
	 * Get the perimeter
	 *
	 * @return int
	 */
	public function perimeter()
	{
		return 4 * $this->side;
	}
	
	public function volume()
	{
	    // 2d object no volume
	    return 0;
	}

}
